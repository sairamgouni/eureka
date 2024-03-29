<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class CategoriesController extends Controller
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
    	$categories = \App\Category::paginate(PAGINATE);
    	$data['title'] = 'Categories';
    	$data['categories'] = $categories;
    	return view('admin.categories.index',$data);
    }

    public function add()
    {
        $data['title'] = 'Add Category';
    	$data['button_text'] = 'Save Category';
    	return view('admin.categories.add',$data);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
            'title' => 'required',
            'about_user' => 'required',
        ]);

        $result = (object) \App\Category::saveRecord($request);
        \Session::flash('type',$result->type);
    	\Session::flash('message',$result->message);
        return redirect(route('category_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data['title'] = 'Edit Category';
        $data['record'] = \App\Category::getRecord($slug);
        $data['button_text'] = 'Update Category';
        return view('admin.categories.edit',$data);
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
        $request->validate([
            'title' => 'required',
            'about_user' => 'required',
        ]);
        $result = (object) \App\Category::updateRecord($request, $slug);
        flash($result->type,$result->message);
        return redirect('admin/categories');
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
        $result = \App\Category::deleteRecord($slug);
        return $result;
    }

    public function getList()
    {
        $list = \App\Category::getList();
        return ['success'=> 1, 'object'=>$list];
    }

    public function data(){
        $category = Category::select('categories.id','categories.title','categories.slug');
        return DataTables::eloquent($category)
            ->addColumn('action', function($row){
                return '<a href="'.action('CategoriesController@edit',$row->slug).'" class="btn btn-success">Edit</a>
				      	 <a href="javascript:void(0)" class="btn btn-primary" onClick="deleteCategory(\''.$row->slug.'\')">Delete</a>';
            })

            ->rawColumns(['action'])
            ->make(true);
    }


}
