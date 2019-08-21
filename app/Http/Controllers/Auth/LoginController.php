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

    public function logout()
    {
        \Auth::logout();
        return ['success'=>1];
    }
}
