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


    public function sendEmailDone($id, $verifyToken)
    {
        $user = USER::where(['id'=>$id,'verifytoken'=>$verifyToken])->first();
        if($user){
        $user->update(['status'=>'1', 'verifytoken'=>'nill']);
        \Session::flash('msg', $user->name);
        return redirect('/login');
        }
    }

    public function sendInfo($thisUser)
    {
        Mail::to('administration@rtsportsbackend.work')->send(new \App\Mail\RegistrationInfo($thisUser));
    }

    public function checkExp()
    {
        if(\Auth::guest())
            return '/';
        return null;   
    }
}

    
