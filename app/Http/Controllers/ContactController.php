<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;
use App\Mail\ContactUsMail;

class ContactController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	
    public function getContact()
    {
        return view('pages.contact');
    }

    public function getAbout()
    {
        return view('pages.about');
    }

    public function sendContact(Request $request)
    {
        $user=\Auth::user();
        $email=$user->email;
        $content=$request->input('content');
        $category=$request->input('category');
        $formular=['email'=>$email,'content'=>$content, 'category'=>$category];
        Mail::to('info@rtsportsbackend.work')->send(new ContactUsMail($formular));
        \Session::flash('succs');
        return \Redirect::back();
    }
}
