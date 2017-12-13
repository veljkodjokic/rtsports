<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserLog;
use App\GuestLog;
use Mail;
use App\Mail\verifyEmail;

class StatusController extends Controller
{
    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function welcome()
    {
        if(\Auth::User())
            return redirect('/channels');
            
        $ip=\Request::ip();
        $ex=0;
        $user_logs=UserLog::select('ip')->distinct()->get();
        foreach($user_logs as $log)
            if($log->ip==$ip)
                $ex=1;

        if(!$ex)
        {
            $guest_log= new GuestLog();
            $guest_log->ip=$ip;
            $guest_log->save();
        }

        return view('welcome');
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
        Mail::to('markolipozencic@gmail.com')->send(new \App\Mail\RegistrationInfo($thisUser));
    }

    public function checkExp()
    {
        if(\Auth::guest())
            return '/';
        return null;   
    }

    public function sendTrialExp(User $user)
    {
        Mail::to($user->email)->send(new \App\Mail\Trial_Exp($user));
    }
}

    
