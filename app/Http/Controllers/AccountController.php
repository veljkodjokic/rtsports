<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Auth;
use Hash;
use Session;
use App\User;

class AccountController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function getAccount()
    {
    	return view('pages.account');
    }

    public function getSettings()
    {
        $user=Auth::User();
        return view('pages.account_settings')->with('user', $user);
    }

    public function getFinances()
    {
        return view('pages.account_finances');
    }

    public function getDelete()
    {
        return view('pages.account_delete');
    }

    public function postDeleteAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:60',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return \Redirect::back()
                        ->withErrors($validator);
        }

        $email=$request->email;
        $pass=$request->password;
        if($email == Auth::user()->email)
        {
            if (Hash::check($pass, Auth::user()->password))
            {
                Auth::user()->delete();
                return redirect('/');
            }
            else{
                Session::flash('email_pass');
            return \Redirect::back();
            }
        }
        else{
            Session::flash('email_err');
            return \Redirect::back();
        }
    }

    public function postEditEmail(Request $request)
    {
    	$email=$request->email;
    	$email_ver=$request->email_confirmation;
    	
    	if($email == $email_ver)
    	{
    		if(User::where('email',$email)->exists())
    			{
    				Session::flash('fail_email');
    				return \Redirect::back();
    			}
    		$user=Auth::user();
    		$user->email=$email;
    		$user->save();

    		Session::flash('sucs_email');
    		return \Redirect::back();
    	}

    	Session::flash('err_email');
    	return \Redirect::back();
    }

    public function postEditUsername(Request $request)
    {
    	$username=$request->username;
    	$username_ver=$request->username_confirmation;
    	if($username == $username_ver)
    	{
    		$user=Auth::user();
    		$user->name=$username;
    		$user->save();
    		
    		Session::flash('sucs_name');
    		return \Redirect::back();
    	}

    	Session::flash('err_name');
    	return \Redirect::back();
    }

    public function postEditPass(Request $request)
    {
    	$rules = [
            'old_pass' => 'required|min:6|max:60',
            'password' => 'required|min:6|max:60|confirmed',
        ];
        $input = Input::only(
            'old_pass',
            'password',
            'password_confirmation'
        );
        $validator =Validator::make($input, $rules);
        if($validator->fails())
        {
            Session::flash('err_pass');
            return \Redirect::back();
        }
        $current = $request->input('old_pass');
        $new = $request->input('password');
        $user = Auth::user();

        if (Hash::check($current, $user->password))
        {
            $user->password = bcrypt($new);
            $user->save();
            Session::flash('pass_edited');
            return \Redirect::back();
        }
        else
        {
        	Session::flash('pass_fail');
            return redirect()->back();
        }
    }
}
