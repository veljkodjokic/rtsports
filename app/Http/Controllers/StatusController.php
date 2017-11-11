<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;
use App\Mail\verifyEmail;

class StatusController extends Controller
{
    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function verifyEmailFirst()
    {
        return view('email.verifyEmailFirst');
    }

    public function sendEmailDone($id, $verifyToken)
    {
        $user = USER::where(['id'=>$id,'verifytoken'=>$verifyToken])->first();
        if($user){
        $user->update(['status'=>'1', 'verifytoken'=>'nill']);
        \Session::flash('msg', $user->name);
        return redirect('/login');
        }
    }

    public function checkExp()
    {
        $response='/';
        if(\Auth::guest())
            return \Response::json($response);
            
    }
}

    
