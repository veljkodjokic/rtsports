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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getResend()
    {
        return view('auth.resend');
    }

    public function postResend(Request $request)
    {
        $user=\App\User::where('email',$request->email)->first();
        if($user)
        {
            if($user->status)
            {
                \Session::flash('alrd');
                return \Redirect::back();
            }
            
            app('App\Http\Controllers\StatusController')->sendEmail($user);
            \Session::flash('succs');
            return \Redirect::back();
        }
        \Session::flash('nope');
        return \Redirect::back();
    }
}
