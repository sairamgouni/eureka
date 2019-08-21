<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\ChallengeRequest;
use Illuminate\Support\Facades\DB;

class ChallengeController extends Controller
{
    public function index()
    {
    	$challenges = \App\Challenge::paginate(5);
    	$data['title'] = 'Challenges';
    	$data['challenges'] = $challenges;
    	return view('admin.challenges.index',$data);
    }

    public function add()
    {

      
        $category = \App\Category::get()->pluck('title', 'id');
       
        $data['title'] = 'Add Challenge';
  
    	return view('admin.challenges.add-edit')->with('category',$category);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	
        $result = (object) \App\Challenge::saveRecord($request);
        \Session::flash('type',$result->type);
    	\Session::flash('message',$result->message);
        return redirect('admin/challenges');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data['title'] = 'edit';
        $data['record'] = \App\Challenge::getRecord($slug);

        dd($data);
        return view('admin.challenges.add-edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $result = (object) \App\Challenge::updateRecord($request, $slug);
        \Session::flash('type',$result->type);
    	\Session::flash('message',$result->message);
        return redirect('admin/challenges');
    }


    public function saveRecord(Request $request)
    {
          $result = (object) \App\Challenge::saveRecord($request);
          return ['success' => 1, 'object'=>$result];
    }

    public function getList()
    {

        $user=\Auth::user();
        // dd($user->challenges);
        $challenges = \App\Challenge::orderBy('created_at','desc')->with(['user','categories'])->paginate(5);
        $challenges = \App\Challenge::prepareAjaxData($challenges);
        return response()->json($challenges);
        // return ['success'=>true, 'object'=>$challenges];
    }

    public function toggleLike(Request $request)
    {
        $user = \Auth::user();
        if(!$user)
        return ['success'=>0, 'message'=>'Please login to continue'];
        
        $item_id = $request->item_id;
        $challange = \App\Challenge::where('id','=',$item_id)->first();
        
        if(!$challange)
            return ['success'=>0, 'message'=>'Invalid Challenge'];
        
        $user->toggleLike($challange);
        return (int) $user->hasLiked($challange);
        // return $request->item_id;

    }

    public function show(Request $request)
    {
        $id = $request->id;
        $challanges = \App\Challenge::where('id', '=', $id)->with(['user','categories'])->get();
        $challanges = \App\Challenge::prepareAjaxData($challanges);
        if(count($challanges))
            $challanges = $challanges[0];
        return response()->json($challanges);
    }

    public function postComment(Request $request)
    {
        $challenge_id = $request->challenge_id;
        $challenge = \App\Challenge::where('id', '=', $challenge_id)->first();

        if(!$challenge)
            return response()->json(['success'=>0,'message'=>'invalid challenge']);

        $user = \Auth::user();

        if(!$user)
        return response()->json(['success'=>0,'message'=>'Invalid User']);

         $user->comment($challenge, $request->comment_text,1);

         return response()->json(['success'=>1,'message'=>'Comment Posted']);


    }

    public function getComments(Request $request)
    {
         $challenge_id = $request->challenge_id;
        $challenge = \App\Challenge::where('id', '=', $challenge_id)->first();

        if(!$challenge)
            return response()->json(['success'=>0,'message'=>'invalid challenge']);

        $comments = \App\Challenge::prepareAjaxComments($challenge->comments()->orderBy('created_at','desc')->get());
        return response()->json($comments);
    }

    public function getFriends(Request $request)
    {
        $user = \Auth::user();
        $list = $user->getFriendSuggestions();
       return response()->json($list);

    }

    public function toggleFollow(Request $request)
    {
        $user = \Auth::user();
        if(!$user)
        return ['success'=>0, 'message'=>'Please login to continue'];
        
        $item_id = $request->item_id;
        $toFollow = \App\User::where('id','=',$item_id)->first();
        
        if(!$toFollow)
            return ['success'=>0, 'message'=>'Invalid Challenge'];
        
        $user->toggleFollow($toFollow);
        return (int) $user->isFollowing($toFollow);
    }
}
