<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\ChallengeRequest;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    public function index()
    {
    	$campaigns = \App\Campaign::paginate(5);
    	$data['title'] = 'Campaigns';
    	$data['campaigns'] = $campaigns;
    	return view('admin.campaigns.index',$data);
    }

    public function add()
    {

        $campaigns = \App\Campaign::pluck('campaign', 'id');
        $data['title'] = 'Add Campaigne';
        $data['campaigns'] = $campaigns;
    	return view('admin.campaigns.add-edit');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	
        $result = (object) \App\Campaign::saveRecord($request);
        \Session::flash('type',$result->type);
    	\Session::flash('message',$result->message);
        return redirect('admin/campaigns');
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
        $data['record'] = \App\Campaign::getRecord($slug);
        return view('admin.campaigns.add-edit',$data);
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

        $result = (object) \App\Campaign::updateRecord($request, $slug);
        \Session::flash('type',$result->type);
    	\Session::flash('message',$result->message);
        return redirect('admin/campaigns');
    }
}
