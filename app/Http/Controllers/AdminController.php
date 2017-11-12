<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

}
