<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\UsersRequest;

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


}
