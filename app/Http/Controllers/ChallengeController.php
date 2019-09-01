<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use \App\Http\Requests\ChallengeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChallengeController extends Controller
{
    public function index()
    {
        $challenges = \App\Challenge::paginate(5);
        $data['title'] = 'Challenges';
        $data['challenges'] = $challenges;
        return view('admin.challenges.index', $data);
    }

    public function add()
    {


        $category = \App\Category::get()->pluck('title', 'id');

        $data['title'] = 'Add Challenge';

        return view('admin.challenges.add-edit')->with('category', $category);
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

        dd($data);
        return view('admin.challenges.add-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
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

    /**
     * To get challenge lists
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList(Request $request)
    {
        $challenges = Challenge::orderBy('created_at', 'desc')->with(['user', 'categories'])->paginate(5);
        $challenges = Challenge::prepareAjaxData($challenges);

        return response()->json(['list' => $challenges, 'user' => \Auth::user()]);
    }

    /**
     * To like / unlike a challenge
     *
     * @param Request $request
     * @return array|int
     */
    public function toggleLike(Request $request)
    {
        $user = \Auth::user();
        if (!$user)
            return ['success' => 0, 'message' => 'Please login to continue'];

        $challange = Challenge::findOrFail($request->input('item_id'));

        if (!$challange)
            return ['success' => 0, 'message' => 'Invalid Challenge'];

        if ($challange->like()->whereUserId($user->id)->withTrashed()->exists()) {
            $like = $challange->like()->whereUserId($user->id)->withTrashed()->first();

            $like->toggleLike();
        } else {
            $like = $challange->like()->create([
                'user_id' => $user->id
            ]);
        }

        $liked = 'liked';
        if ($like->isDeleted())
            $liked = 'unliked';

        $log_message = ' has ' . $liked . ' the challenge ' . $challange->title;
        activity()
            ->performedOn($challange)
            ->log($log_message);

        return $like->isDeleted() ? 0 : 1;

    }

    public function show(Request $request)
    {
        $id = $request->id;
        $challanges = Challenge::where('id', '=', $id)->with(['user', 'categories'])->get();
        $challanges = Challenge::prepareAjaxData($challanges);
        if (count($challanges))
            $challanges = $challanges[0];
        return response()->json($challanges);
    }

    /**
     * Post a new comment/reply to the challenge
     * If the request has replay value then the action is for reply for a comment
     * and the replay value will be the parent comment id
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postComment(Request $request)
    {
        $challenge = Challenge::findOrFail($request->input('challenge_id'));

        $user = Auth::user();

        $challenge->comments()->create([
            'user_id' => $user->id,
            'comment' => $request->input('comment_text'),
            'comment_id' => $challenge->id,
            'comment_type' => Challenge::class,
            'parent_id' => $request->input('replay') ?? null
        ]);
        if ($request->input('replay'))
            $log_message = ' has commented on challenge ' . $challenge->title; // replay log message
        else
            $log_message = ' has commented on challenge ' . $challenge->title; // normal comment log message

        activity()
            ->performedOn($challenge)
            ->log($log_message);

        return response()->json(['success' => 1, 'message' => 'Comment Posted']);


    }

    /**
     * To get all the comments for a challenge
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getComments(Request $request)
    {
        $comments = Comment::with('childComments.user', 'user')
            ->withCount('like')
            ->whereChallengeId($request->input('challenge_id'))
            ->whereNull('parent_id')
            ->get();
        return response()->json($comments);
    }

    public function getFriendSuggestions(Request $request, $total = 5)
    {
        $user = \Auth::user();
        $list = $user->getFriendSuggestions($total);
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
        $toFollow = \App\User::where('id', '=', $item_id)->first();

        if (!$toFollow)
            return ['success' => 0, 'message' => 'Invalid Challenge'];

        $user->toggleFollow($toFollow);

        $status = (int)$user->isFollowing($toFollow);

        $liked = 'following';
        if (!$status)
            $liked = 'unfollowing';

        $log_message = ' is ' . $liked . ' ' . $toFollow->name;
        activity()
            ->performedOn($toFollow)
            ->log($log_message);

        return $status;
    }

    /**
     * To like / unlike owner like for a comment
     *
     * @param Request $request
     * @param $commentId
     * @return \Illuminate\Http\JsonResponse
     */
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
}
