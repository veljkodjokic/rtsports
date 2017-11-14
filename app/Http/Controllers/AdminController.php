<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserLog;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function getAuthUser()
    {
    	$users=User::all();
    	return view('admin.auth_user')->with('users',$users);
    }

    public function getUserLog()
    {
        $logs = UserLog::all();
        return view('admin.user_logs')->with('logs',$logs);
    }

}
