<?php

namespace App\Http\Controllers;
use App\Challenge;
use App\Country;
use App\User;
use Illuminate\Http\Request;
use \App\Http\Requests\UsersRequest;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['title'] = 'Users';
        return view('admin.users.index', $data);
    }


    public function add()
    {
        $data['title'] = 'Add User';
        $data['button_text'] = 'Save User';
        return view('admin.users.add-edit', $data);
    }

    /**
     * This method will save the new record
     * @param UsersRequest $request [description]
     * @return [type]                [description]
     */
    public function store(UsersRequest $request)
    {

        $result = (object)\App\User::saveRecord($request);
        flash($result->message, $result->type);

        return redirect(URL_USERS_LIST);
    }

    public function edit($slug)
    {
        $data['title'] = 'Edit User';
        $data['record'] = \App\User::getRecord($slug);
        $campaign = \App\Campaign::get()->pluck('campaign', 'id');
        $data['campaign'] = $campaign;
        $data['button_text'] = 'Update User';
        $data['active_class'] = 'users';
        return view('admin.users.edit', $data);
    }

    /**
     * This method will update the user record
     * @param UsersRequest $request [description]
     * @param  [type]       $slug    [description]
     * @return [type]                [description]
     */
    public function update(UsersRequest $request, $slug)
    {
        $result = (object)\App\User::updateRecord($request, $slug);
        flash($result->message, $result->type);
        return redirect(route('users_list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $slug = $request->slug;
        $user = \App\User::find($slug);
        if ($user) {
            $user->status = 0;
            $user->save();
        }
        return ['status' => $user, 'message' => 'record_deleted_successfully'];
    }

    public function updateProfile(Request $request)
    {

        $user = \Auth::user();
//        $user->name = $request->fullname;
        $user->nickname = $request->nickname;
        $user->about = $request->about;
        $user->save();
        $this->uploadPics($request, $user, 'image');
        $this->uploadPics($request, $user, 'background_image');
        $result = \Auth::user();
        return response()->json($result);
    }

    public function uploadPics(Request $request, $record, $field_name = 'image')
    {
        if ($request->hasFile($field_name)) {
            $path = $request->file($field_name);
            $url = "";
            if ($field_name == 'image') {
                $resize = \Image::make($path)->resize(124, 124)->encode('jpg');
                $hash = md5($resize->__toString()) . '.jpg';
                $path = 'public/users/thumbs/' . $hash;

                \Storage::disk('local')->put($path, $resize, 'public');
                $url = $hash;
            } elseif ($field_name == 'background_image') {
                $resize = \Image::make($path)->resize(1078, 360)->encode('jpg');
                $hash = md5($resize->__toString());
                $path = "users/backgrounds/{$hash}.jpg";

                $resize->save(public_path($path));
                $url = "/" . $path;
            }

            //Delete the old files
            \File::delete($record->field_name);


            $record->$field_name = $url;
            $response = $record->save();
            return $response;
        }
    }

    public function getProfile($userId)
    {

        $users = \App\User::where('id', '=', $userId)->with('campaign')->get();
        $users = \App\User::processFrendSuggestions($users);
        if (count($users))
            $users = $users[0];
        return response()->json($users);
    }

    public function getActivities(Request $request, $user_id = null)
    {

        $user = null;
        if ($user_id)
            $user = \App\User::where('id', '=', $user_id)->first();
        if (!$user)
            $user = \Auth::user();
        if($user_id){
            $activities = Activity::orderBy('id', 'desc')->where('causer_id', $user_id)->paginate(10);
        }
        else{
            $activities = Activity::orderBy('id', 'desc')->paginate(10);
        }

        $data = $this->processActivities($activities);

        return response()->json($data);
    }

    public function getProfilePath()
    {
        return '/profile/' . $this->id . '/' . $this->slug;
    }

    public function processActivities($activities)
    {
        $list = [];
        foreach ($activities as $activity) {
            $user = \App\User::where('id', '=', $activity->causer_id)->first();
//          dd($user);
            $item['id'] = $activity->id;
            $item['username'] = $user->name;
            $item['image'] = $user->getProfileImage();
            $item['user_id'] = $user->id;
            $item['user_slug'] = $user->slug;
            $item['profile_link'] = '$user->getProfilePath()';
            $item['message'] = $activity->description;
            $item['created_at'] = \Carbon\Carbon::createFromTimeStamp(strtotime($activity->created_at))->diffForHumans();
            $list[] = $item;
        }

        return $list;
    }


    public function getFollowers(Request $request)
    {
        $userId = null;
        $user = null;
        if ($request->has('userId')) {
            $userId = $request->userId;
            $user = \App\User::where('id', '=', $userId)->first();
        }
        if (!$user)
            $user = \Auth::user();

        $following_users = $user->followings()->get();
        $following = \App\User::processFrendSuggestions($following_users);

        $follower_users = $user->followers()->get();
        $followers = \App\User::processFrendSuggestions($follower_users);

        $total_following = $user->followings->count();
        $total_followers = $user->followers->count();
        $result = [];
        $result['followers'] = $followers;
        $result['following'] = $following;
        $result['total_followers'] = $total_followers;
        $result['total_following'] = $total_following;
        return response()->json($result);

    }

    public function topContributors(Request $request)
    {
        $top_contributors = \App\User::where('reputation', '>', '0')->with('campaign')
            ->orderBy('reputation', 'desc')
            ->limit(10)
            ->get();
        $list = \App\User::processFrendSuggestions($top_contributors);
        $country_records = \App\Country::getTopContributors();
        $data['top_contributors'] = $list;
        $data['country_contributors'] = $country_records;
        return response()->json($data);

    }

    public function allNotifications(Request $request)
    {
        $user = \Auth::user();

        $notifications = $user->notifications()->simplePaginate();

        $response = [
            'has_more' => $notifications->hasMorePages(),
            'current_page' => $notifications->currentPage(),
            'data' => $user->processNotifications($notifications),
        ];

        $notifications->markAsRead();

        return response()->json($response);
    }

    public function topNotifications(Request $request)
    {
        $user = \Auth::user();

        $notifications = $user->unreadNotifications()->get();
        $unreadCount = count($notifications);

        return response()->json([
            'unreadCount' => $unreadCount,
            'notifications' => $user->processNotifications($notifications)
        ]);
    }

    public function readTopNotifications(Request $request)
    {
        $user = \Auth::user();

        $user->unreadNotifications->markAsRead();

        return $this->topNotifications($request);
    }

    public function getusers(Request $request)
    {

        $data = $request->all();
        $query = $data['q'];
        $paginateLength = $request->input('page_limit') ?? 15;
        // perfform search in database or algolia
        $users = \App\User::where('name', 'LIKE', '%' . $query . '%')->simplePaginate($paginateLength);

        $challenges = Challenge::where('title', 'LIKE', "%$query%")
            ->select('title AS name', 'image', 'id', 'id as search_type', 'slug')
            ->simplePaginate($paginateLength);


        $result = collect($users->items());
        $result = $result->merge($challenges->items());
        $result = collect($result->sortBy('name')->values()->all());
        return response()->json(
            $result->splice(0, ($result->count() > $paginateLength ? $paginateLength : $result->count()))
        );
    }


    public function searchUsers($param)
    {
        // perfform search in database or algolia
        $users = \App\User::all();

        return response()->json(
            $users
        );
    }
    public function data(){
        $User = User::with(['campaign', 'role'])->select('users.id','users.cid','users.slug' , 'users.name', 'users.email','users.image','users.status');
//        dd($User->take(5)->get());
        return DataTables::eloquent($User)
            ->addColumn('action', function($row){
                return '<a href="' . route('users_edit', $row->slug) . '" class="btn btn-danger">Edit</a>
            <a href="javascript:void(0)" class="btn btn-primary" onClick="deleteUser(\''.$row->slug.'\')">Deactivate</a>
				      	 ';
            })

            ->addColumn('campaign', function($row){
                if($row->campaign) {
                    return $row->campaign->campaign;
                }
                return '-';
            })
            ->addColumn('role', function($row){
                if($row->role) {
                    $rolename = '';
                    foreach ($row->role as $role) {
                        $rolename = $role->display_name;

                    }
                    return $rolename;
                }
                return '-';
            })
            ->editColumn('image', function($row){

                return '<img width="100px" src="'.$row->image.'">';
            })
            ->editColumn('status', function ($row) {
                if ($row->status == 1) {
                    $label = '<span class="label label-success">Active</span>';
                } else {
                    $label = '<span class="label label-danger">Inactive</span>';
                }

                return $label;
            })

            ->rawColumns(['campaign', 'action','image','status'])
            ->make(true);
    }

    public function getUsersByCountry(Country $country)
    {
        return response()->json([
            'country' => $country,
            'users' => $country->users()
                ->where('reputation', '>', '0')
                ->latest('reputation')
                ->simplePaginate()
        ]);

    }

    public function search(Request $request)
    {

        $data= $request->all();
        $search = $data['q'];
        return User::where('name', 'like', '%' . $search . '%')->get();
    }

    public function getUserActivities(Request $request)
    {

        $userId = null;
        $user = null;
        if ($request->has('userId')) {
            $userId = $request->userId;
            $user = \App\User::where('id', '=', $userId)->first();
        }
        $activities = Activity::orderBy('id', 'desc')->get();
dd($activities);
//       $data = $this->processUserActivities($activities);
        return response()->json($data);

    }

    public function processUserActivities($activities)
    {
        $list = [];
        foreach ($activities as $activity) {
            $user = \App\User::where('id', '=', $activity->causer_id)->first();
//          dd($user);
            $item['id'] = $activity->id;
            $item['username'] = $user->name;
            $item['image'] = $user->getProfileImage();
            $item['user_id'] = $user->id;
            $item['user_slug'] = $user->slug;
            $item['profile_link'] = '$user->getProfilePath()';
            $item['message'] = $activity->description;
            $item['created_at'] = \Carbon\Carbon::createFromTimeStamp(strtotime($activity->created_at))->diffForHumans();
            $list[] = $item;
        }

        return $list;
    }


}
