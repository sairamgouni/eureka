<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\Comment;
use App\Gamify\Points\ChallengeCreated;
use App\Gamify\Points\ChallengeFinalized;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\ChallengeWinner;
use \App\Http\Requests\ChallengeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class ChallengeController extends Controller
{
    public function index()
    {
        $challenges = \App\Challenge::orderBy('id', 'desc')->paginate(5);
        $data['title'] = 'Challenges';
        $data['challenges'] = $challenges;
        return view('admin.challenges.index', $data);
    }

    public function add()
    {


        $categories = \App\Category::get()->pluck('title', 'id');

        $data['title'] = 'Add Challenge';

        return view('admin.challenges.add')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $result = (object)\App\Challenge::saveRecord($request);
        \Session::flash('type', $result->type);
        \Session::flash('message', $result->message);
        return redirect('admin/challenges');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data['title'] = 'edit';
        $data['record'] = \App\Challenge::getRecord($slug);
        $category = \App\Category::get()->pluck('title', 'id');
        $data['category'] = $category;
        $data['selectedCategories'] = $data['record']->categories->pluck('id')->toArray();

//     dd($data['selectedCategories']);

        // dd($data);
        return view('admin.challenges.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $result = (object)\App\Challenge::updateRecord($request, $slug);
        \Session::flash('type', $result->type);
        \Session::flash('message', $result->message);
        return redirect('admin/challenges');
    }


    public function saveRecord(Request $request)
    {

        $result = (object)\App\Challenge::saveRecord($request);
        return ['success' => 1, 'object' => $result];
    }

    public function getList(Request $request)
    {

        $challenges = Challenge::when($request->input('type') && $request->input('type') !== 'all', function ($query) use ($request) {
            $query->whereHas('challengeCategories', function ($q) use ($request) {
                $q->whereCategoryId($request->input('type'));
            });
        })
//            ->when($type == 'specific', function ($query) use ($userId) {
//            $query->where('created_by', '=', $userId);
//        })
//            ->when($type != 'specific', function ($query) use ($request) {
//            $query->orderBy('created_at', $request->input('sort_by'));
//        })
            ->when($request->input('userId') && $request->input('recordsType') == 'specific', function ($query, $userId) use ($request) {
                $query->where('created_by', $request->input('userId'));
            })
            ->orderBy('created_at', $request->input('sort_by') ?? 'desc')
            ->with(['user', 'categories']);
//        $challenges = null;
//        if ($type == 'specific')
//            $challenges = Challenge::
//        else
//            $challenges = Challenge::orderBy('created_at', 'desc')
//                ->with(['user', 'categories']);

        $challenges = $challenges->simplePaginate();

        $pagination = [
            'has_more' => $challenges->hasMorePages(),
            'current_page' => $challenges->currentPage(),
            'next_page' => $challenges->hasMorePages() ? $challenges->currentPage() + 1 : null
        ];

        $pagination['data'] = Challenge::prepareAjaxData($challenges);

        return response()->json($pagination);
        // return ['success'=>true, 'object'=>$challenges];
    }

    public function toggleLike(Request $request)
    {
        $user = \Auth::user();
        if (!$user)
            return ['success' => 0, 'message' => 'Please login to continue'];

        $challange = Challenge::findOrFail($request->input('item_id'));

        if (!$challange)
            return ['success' => 0, 'message' => 'Invalid Challenge'];

        $user->toggleLike($challange);
        $status = (int)$user->hasLiked($challange);

        $liked = 'liked';
        if (!$status) {
            $liked = 'unliked';
            // $user->undoPoint(new \App\Gamify\Points\ChallengeLikedBy($challange));

            // $challenger = \App\User::where('id','=',$challange->created_by)->first();
            // $challenger->undoPoint(new \App\Gamify\Points\ChallengeLiked($challange));
        } else {

            $user->givePoint(new \App\Gamify\Points\ChallengeLikedBy($challange));

            $challenger = \App\User::where('id', '=', $challange->created_by)->first();
            $challenger->givePoint(new \App\Gamify\Points\ChallengeLiked($challange));

            if($challenger->id != $user->id){
                $challenger->notify(new \App\Notifications\ChallengeLiked($challange, $user));
            }

        }

        $log_message = ' has ' . $liked . ' the challenge ' . '<a href="/#/challenge-details/'.$challange->id.'/'.$challange->slug.'">'.$challange->title.'</a>';
        activity()
            ->performedOn($challange)
            ->log($log_message);

        return $status;

    }

    public function show(Request $request)
    {
        $id = $request->id;
        $challanges = \App\Challenge::where('id', '=', $id)->with(['user', 'categories'])->get();
        $challanges = \App\Challenge::prepareAjaxData($challanges);
        if (count($challanges))
            $challanges = $challanges[0];
        return response()->json($challanges);
    }

    public function updateChallenge(Request $request, $id)
    {

        $challanges = \App\Challenge::find($id);

        $response = $challanges->doSaveOperation($request, $challanges);
        // return $response;
        $user = \Auth::user();

        $log_message = ' has updated challenge ' . '<a href="/#/challenge-details/'.$challanges->id.'/'.$challanges->slug.'">'.$challanges->title.'</a>';
        activity()
            ->performedOn($challanges)
            ->log($log_message);

        if ($response)
            return ['success' => 1, 'object' => $challanges];
        else
            return ['success' => 1, 'messsage' => 'update failed'];
    }

    public function postComment(Request $request)
    {

        $challenge = Challenge::findOrFail($request->input('challenge_id'));

        $user = Auth::user();

        $comment = $challenge->comments()->create([
            'user_id' => $user->id,
            'comment' => $request->input('comment_text'),
            'comment_id' => $challenge->id,
            'comment_type' => Challenge::class,
            'parent_id' => $request->input('replay') ?? null
        ]);

        if ($request->has('attachment')) {
            $path = $request->file('attachment')->storeAs(
                'challenges/' . $challenge->id . '/comment/' . $comment->id . '/', $request->file('attachment')->getClientOriginalName()
            );

            $comment->attachments()->create(['path' => $path]);
        }
        if ($request->input('replay'))

            $log_message = ' has commented on challenge ' . '<a href="/#/challenge-details/' . $challenge->id . '/' . $challenge->slug . '">' . $challenge->title . '</a>';

        else
            $log_message = ' has commented on challenge ' . '<a href="/#/challenge-details/' . $challenge->id . '/' . $challenge->slug . '">' . $challenge->title . '</a>'; // normal comment log message

        activity()
            ->performedOn($challenge)
            ->log($log_message);


        $user->givePoint(new \App\Gamify\Points\ChallengeCommentedBy($challenge));

        $challenger = \App\User::where('id', '=', $challenge->created_by)->first();
        $challenger->givePoint(new \App\Gamify\Points\ChallengeCommented($challenge));

        if($challenger->id != $user->id){
            $challenger->notify(new \App\Notifications\CommentAdded($challenge, $user));

        }
        return response()->json(['success' => 1, 'message' => 'Comment Posted']);

    }

    public function getComments(Request $request)
    {
        $comments = Comment::with('childComments.user', 'user','attachments')
            ->withCount('like')
            ->whereChallengeId($request->input('challenge_id'))
            ->whereNull('parent_id')
            ->get();
//        dd($comments);
        return response()->json(['comments' => $comments, 'winner' => $comments->where('winner', 1)->count()]);
    }
    public function getFriendSuggestions(Request $request, $total = 5)
    {
        $user = \Auth::user();
        $list = $user->getFriendSuggestions($total);
        return response()->json($list);

    }

    public function getChallenges(Request $request, $total = 5)
    {
        $challenge = \App\Challenge::get();
        $list = $challenge->getChallenges($total);
        return response()->json($list);


    }


    public function getFriends(Request $request, $total = 5)
    {
        $user = null;
        if ($request->has('userId')) {
            $userId = $request->userId;
            $user = \App\User::where('id', '=', $userId)->first();
        }
        if (!$user)
            $user = \Auth::user();

        $list = $user->getFriendsList($total);
        $total_following = $user->followings->count();
        return response()->json(['list' => $list, 'totalFollowings' => $total_following]);

    }

    public function toggleFollow(Request $request)
    {
        $user = \Auth::user();

        if (!$user)
            return ['success' => 0, 'message' => 'Please login to continue'];

        $item_id = $request->item_id;
        $toFollow = User::where('id', '=', $item_id)->first();

        if (!$toFollow)
            return ['success' => 0, 'message' => 'Invalid Challenge'];

        $user->toggleFollow($toFollow);

        $status = (int)$user->isFollowing($toFollow);

        $liked = 'following';
        if (!$status) {
            $liked = 'unfollowing';
            // $toFollow->undoPoint(new \App\Gamify\Points\UserFollowed($user));
        } else {
            try {
                $toFollow->givePoint(new \App\Gamify\Points\UserFollowed($user));
            } catch (\Exception $ex) {

            }

            // $toFollow->notify(new \App\Notifications\UserFollowed($user));
        }

        $log_message = ' is ' . $liked . ' ' . '<a href="/#/profile/'.$toFollow->id.'/'.$toFollow->slug.'">'.$toFollow->name.'</a>';
        activity()
            ->performedOn($toFollow)
            ->log($log_message);

        return $status;
    }

    public function toggleCommentOwnerLike(Request $request, $commentId)
    {


        $comment = Comment::findOrFail($commentId);
        $user = $request->user();
        if ($user) {
            if ($comment->like()->whereUserId($user->id)->withTrashed()->exists()) {
                $like = $comment->like()->whereUserId($user->id)->withTrashed()->first();

                $like->toggleLike();
            } else {
                $like = $comment->like()->create([
                    'user_id' => $user->id
                ]);
            }
            return response()->json($like->isDeleted() ? 0 : 1);
        } else
            return response()->json(['success' => 0, 'message' => 'Login required']);

    }

    public function toggleCommentOwnertick(Request $request, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        if ($comment->finalized == 0) {
            $comment->update(['finalized' => '1']);
            $comment->user->givePoint(new ChallengeFinalized($comment));
            activity()
                ->performedOn($comment)
            ->log(" has selected " .'<a href="/#/profile/'.$comment->user->id.'/'.$comment->user->slug.'">'.$comment->user->name.'</a>' . " as one of the Finalist for the challenge ". '<a href="/#/challenge-details/'.$comment->challenge->id.'/'.$comment->challenge->slug.'">'.$comment->challenge->title.'</a>');

        } else {
            $comment->update(['finalized' => '0']);
            $comment->user->undoPoint(new ChallengeFinalized($comment));
            activity()
                ->performedOn($comment)
                ->log("removed  " . $comment->user->name . " from the finalized");
        }
        return response()->json($comment->finalized == '0' ? 0 : 1);
    }
    public function toggleCommentOwnerwin(Request $request, $commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if ($comment->winner == 0) {
            $comment->update(['winner' => '1']);
            $comment->user->notify(new ChallengeWinner($comment));
            $comment->user->givePoint(new \App\Gamify\Points\ChallengeWinner($comment));

            activity()
                ->performedOn($comment)
                ->log("has selected " .'<a href="/#/profile/'.$comment->user->id.'/'.$comment->user->slug.'">'.$comment->user->name.'</a>' . " as the winner for the challenge " . '<a href="/#/challenge-details/'.$comment->challenge->id.'/'.$comment->challenge->slug.'">'.$comment->challenge->title.'</a>');
        } else {
            $comment->update(['winner' => '0']);
            $comment->user->undoPoint(new\App\Gamify\Points\ChallengeWinner($comment));
        }
        return response()->json($comment->winner == '0' ? 0 : 1);

    }

    public function gechallenge(Request $request)
    {

//            $user = \Auth::user();
//    $post_json = DB::table('challenges')->orderBy('challenges.created_at','desc') ->with(['user','categories'])->take(4)->get();
//return $post_json;

//        $challenges = \App\Challenge::orderBy('created_at','desc')
        $user = null;
        $userId = null;
        $type = 'all';
        if ($request->has('userId')) {
            $userId = $request->userId;
            $user = \App\User::where('id', '=', $userId)->first();
            $type = $request->recordsType;
        }

        if (!$user)
            $user = \Auth::user();

        // $challenges = \App\Challenge::with(['user','categories']);
        $challenges = null;
        if ($type == 'specific')
            $challenges = \App\Challenge::where('created_by', '=', $userId)
                ->with(['user', 'categories']);
        else
            $challenges = \App\Challenge::orderBy('created_at', 'desc')
                ->with(['user', 'categories']);

        $challenges = $challenges->paginate(5);
        $challenges = \App\Challenge::prepareAjaxData($challenges);
        return response()->json(['list' => $challenges, 'user' => \Auth::user()]);


    }
    public function search(Request $request)
    {
        $data= $request->all();
        $search = $data['q'];
        return Challenge::where('title', 'like', '%' . $search . '%')->get();
    }
    public function data()
    {
        $challenge = Challenge::with('categories')->select('challenges.id', 'challenges.slug', 'challenges.title', 'challenges.status', 'challenges.image');
        return DataTables::eloquent($challenge)
            ->addColumn('action', function ($row) {
                return '<a href="' . route('challenges_edit', $row->slug) . '" class="btn btn-success">Edit</a>
				      	 <a href="javascript:void(0)" class="btn btn-primary" onClick="deleteChallenge(\'' . $row->slug . '\')">Delete</a>';
            })
            ->addColumn('categories', function ($row) {
                $categories = '<ul class="custom-ul">';
                foreach ($row->categories as $category) {
                    $categories .= '<li>' . $category->title . '</li>';
                }
                $categories .= '</ul>';
                return $categories;
            })
            ->editColumn('image', function ($row) {

                return '<img width="100px" src="' . asset( $row->image) . '">';
            })
            ->rawColumns(['categories', 'action', 'image'])
            ->make(true);
    }

    public function destroy(Request $request)
    {
        $slug = $request->slug;
        $status = \App\Challenge::where('slug', $slug)->delete();
        return ['status' => $status, 'message' => 'record_deleted_successfully'];
    }

    public function deleteComment(Comment $comment)
    {
        if ($comment->user_id == Auth::id() || $comment->challenge->user_id == Auth::id()) {
            $delete = $comment->delete();
            if ($comment->parent_id)
                return response()->json($comment->comment()->with('childComments.user', 'user')
                    ->withCount('like')
                    ->whereNull('parent_id')->first());
            else  return response()->json($delete);
        } else return response()->json(0);
    }

    public function updateComment(Request $request, Comment $comment)
    {
        return response()->json(
            $comment->update([
                'comment' => $request->input('comment_text')
            ])
        );
    }

    public function deleteChallenge(Request $request, $id)
    {
        Challenge::destroy($id);
        return ['status' => 200, 'message' => 'challenge deleted successfully'];
    }
}
