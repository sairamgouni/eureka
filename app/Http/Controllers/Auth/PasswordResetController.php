<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class PasswordResetController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */


    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function changePassword(Request $request)
    {

        $user = auth()->user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password_confirmation)
            ]);

            return response()->json([
                'message' => 'Password updated',
                'user' => $user
            ]);

        } else {

            return response()->json(['errors' => ['current_password' => ['Current password does not match']]], 422);

        }
    }

    public function myTestCode()
    {

        $users = User::get();
        $count = 0;

        foreach ($users as $user) {
            $user->password = bcrypt($user->employee_id);
            $user->slug = str_slug($user->username);
            $user->save();
//            $user->update([
//                'password' => bcrypt($user->employee_id)
//            ]);
            $count++;
        }
        dd($count . ' users Updated');

    }
}
