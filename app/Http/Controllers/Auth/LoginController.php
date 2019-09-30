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
        $this->middleware('guest')->except('logout', 'postLogin');
    }

    public function postLogin(Request $request)
    {
        $login = 0;
        $user = null;
        $firstTimeLogin = false;

        if (\Auth::check()) {
            $login = 1;
            $user = \Auth::user()->with('campaign');
            $role = $user->role->role_id;

            $firstTimeLogin = $user->last_login ?? false;
            if ($firstTimeLogin)
                $user->update(['last_login', now()]);

            if ($role == 1) {
                $isAdmin = 1;
                $level = 'admin';
            } else {
                $level = 'user';
            }
            $result = ['success' => $login, 'object' => $user, 'level' => $level];
            return $result;
        }


        $credentials = $request->only('email', 'password');

        if (\Auth::attempt($credentials)) {
            // Authentication passed...
            $login = 1;
        }
        $isAdmin = 0;
        $level = '';
        if (\Auth::user()) {
            $login = 1;
            $user = \Auth::user();
            $role = $user->role()->first();

            $firstTimeLogin = $user->last_login ?? false;
            if ($firstTimeLogin)
                $user->update(['last_login', now()]);

            if ($role) {
                if ($role->id == 1) {
                    $isAdmin = 1;
                    $level = 'admin';
                } else {
                    $level = 'user';
                }
            }
        }

        $result = ['success' => $login, 'object' => $user, 'level' => $level];
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
        $credentials = ['username' => $request->email, 'password' => $request->password];

        if (\Auth::attempt($credentials)) {
            // Authentication passed...
            $login = 1;

        }
        $role_id = 0;
        $role = null;
        $isAdmin = 0;
        $firstTimeLogin = false;
        if (\Auth::user()) {
            $login = 1;
            $user = \Auth::user();
            $firstTimeLogin = $user->last_login ?? false;
            $role = $user->role()->first();
            // dd($role);
            $level = '';
            if ($firstTimeLogin)
                $user->update(['last_login', now()]);

            if ($role) {
                if ($role->id == 1) {
                    $isAdmin = 1;
                    $level = 'admin';
                } else {
                    $level = 'user';
                }
            }

        }
        return back();
        // $result = ['success' => $login, 'object' => $user, 'level' => $level];
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
        return ['success' => 1];
    }

    public function myTestCode()
    {

        die('here');
        $users = \App\User::get();
        $count = 0;
        foreach ($users as $user) {
            $user->password = bcrypt($user->employee_id);
            $user->slug = str_slug($user->username);
            $user->save();
            $count++;
        }
        dd($count . ' users Updated');
    }
}
