<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\UsersRequest;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;

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
    	$users = \App\User::paginate(PAGINATE);
    	$data['title'] = 'Users';
    	$data['users'] = $users;
    	return view('admin.users.index',$data);
    }


    public function add()
    {
        $data['title'] = 'Add User';
    	$data['button_text'] = 'Save User';
    	return view('admin.users.add-edit',$data);
    }

    /**
     * This method will save the new record
     * @param  UsersRequest $request [description]
     * @return [type]                [description]
     */
    public function store(UsersRequest $request)
    {

        $result = (object) \App\User::saveRecord($request);
        flash($result->message, $result->type);

        return redirect(URL_USERS_LIST);
    }

    public function edit($slug)
    {
        $data['title'] = 'Edit User';
        $data['record'] = \App\User::getRecord($slug);
        $data['button_text'] = 'Update User';
        $data['active_class'] = 'users';
        return view('admin.users.add-edit', $data);
    }

    /**
     * This method will update the user record
     * @param  UsersRequest $request [description]
     * @param  [type]       $slug    [description]
     * @return [type]                [description]
     */
    public function update(UsersRequest $request, $slug)
    {
        $result = (object) \App\User::updateRecord($request, $slug);
        flash($result->message, $result->type);
        return redirect(URL_USERS_LIST);
    }

       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $slug = $request->slug;
        $result = \App\User::deleteRecord($slug);
        return $result;
    }

    public function updateProfile(Request $request)
    {
        $user = \Auth::user();
        $user->name = $request->fullname;
        $user->nickname = $request->nickname;
        $user->about = $request->about;
        $result = $user->save();
        $this->uploadPics($request, $user, 'image');
        $this->uploadPics($request, $user, 'background_image');
         $result = \Auth::user();
        return response()->json($result);
    }

    public function uploadPics(Request $request, \App\User $record, $field_name='image')
    {
        if($request->hasFile($field_name))
        {
            $path   = $request->file($field_name);
            $url = "";
            if($field_name=='image')
            {
                $resize = \Image::make($path)->resize(124,124)->encode('jpg');
                $hash = md5($resize->__toString());
                $path = "users/thumbs/{$hash}.jpg";

                $resize->save(public_path($path));
                $url = "/" . $path;    
            }

            elseif ($field_name=='background_image')
            {
                $resize = \Image::make($path)->resize(1268,122)->encode('jpg');
                $hash = md5($resize->__toString());
                $path = "users/backgrounds/{$hash}.jpg";

                $resize->save(public_path($path));
                $url = "/" . $path;    
            }
            
            //Delete the old files
            \File::delete($record->field_name);


            $record->$field_name = $url;
            $response =    $record->save();
            return $response;
        }
    }

    public function getProfile($userId)
    {
        $users = \App\User::where('id','=',$userId)->get();
        $users = \App\User::processFrendSuggestions($users);
        if(count($users))
            $users = $users[0];
        return response()->json($users);
    }

    public function getActivities(Request $request, $user_id='')
    {
        $user = null;
        if($user_id)
            $user = \App\User::where('id', '=', $user_id)->first();
        if(!$user)
        $user = \Auth::user();
        
        $activities = Activity::orderBy('id','desc')->paginate(10);

        $data = $this->processActivities($activities);

        return response()->json($data);
    }

    public function getProfilePath()
    {
        return '/profile/'.$this->id.'/'.$this->slug;
    }

    public function processActivities($activities)
    {
        $list = [];
        foreach($activities as $activity)
        {
            $user = \App\User::where('id','=',$activity->causer_id)->first();
            // dd($user);
            $item['id'] = $activity->id;
            $item['username'] = $user->name;
            $item['image'] = $user->getProfileImage();
            $item['user_id'] = $user->id;
            $item['user_slug'] = $user->slug;
            $item['profile_link'] = '$user->getProfilePath()';
            $item['message'] = $activity->description;
            $item['created_at'] =   \Carbon\Carbon::createFromTimeStamp(strtotime($activity->created_at))->diffForHumans();
            $list[] = $item;
        }

        return $list;
    }




}
