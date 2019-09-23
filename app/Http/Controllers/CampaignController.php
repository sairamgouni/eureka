<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Category;
use Illuminate\Http\Request;
use \App\Http\Requests\ChallengeRequest;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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
    public function data(){
        $category = Campaign::select('eureka_campaigns.id','eureka_campaigns.campaign','eureka_campaigns.slug');
        return DataTables::eloquent($category)
            ->addColumn('action', function($row){
                return '<a href="'.action('CategoriesController@edit',$row->slug).'" class="btn btn-success">Edit</a>
				      	 <a href="javascript:void(0)" class="btn btn-primary" onClick="deleteCategory(\''.$row->slug.'\')">Delete</a>';
            })

            ->rawColumns(['action'])
            ->make(true);
    }
}
