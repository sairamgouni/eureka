<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function postLogin(Request $request)
    {
           $login = 0;
        $user = null;
        if(\Auth::user())
        {
            $login = 1;
            $user = \Auth::user();
            $result = ['success' => $login, 'object' => $user, 'level' => 'user'];
            return $result;
        }

        
     
        $credentials = $request->only('email', 'password');

        if (\Auth::attempt($credentials)) {
            // Authentication passed...
             $login = 1;
        }

        if(\Auth::user())
        {
            $login = 1;
            $user = \Auth::user();
        }

        $result = ['success' => $login, 'object' => $user, 'level' => 'user'];
        return $result;
    }

    public function postWebLogin(Request $request)
    {
           $login = 0;
        $user = null;
        // if(\Auth::user())
        // {
        //     $login = 1;
        //     $user = \Auth::user();
        //     $result = ['success' => $login, 'object' => $user, 'level' => 'user'];
        //     return $result;
        // }

        
     
        // $credentials = $request->only('email', 'password');
        $credentials = [ 'username' => $request->email,  'password'=>$request->password];

        if (\Auth::attempt($credentials)) {
            // Authentication passed...
             $login = 1;
        }

        if(\Auth::user())
        {
            $login = 1;
            $user = \Auth::user();
        }
        return back();
        // $result = ['success' => $login, 'object' => $user, 'level' => 'user'];
        // return $result;
    }

    public function isUserLoggedIn()
    {
        return response()->json(\Auth::user());
    }

    public function setLocalStorage()
    {
        // dd(\Auth::user());
    }

    public function logout()
    {
        \Auth::logout();
        return ['success'=>1];
    }

    public function myTestCode()
    {
        $users = \App\User::get();
        $count = 0;
        foreach($users as $user)
        {
            $user->password = bcrypt($user->employee_id);
            $user->slug = str_slug($user->username);
            $user->save();
            $count++;
        }
        dd($count.' users Updated');
    }
}
