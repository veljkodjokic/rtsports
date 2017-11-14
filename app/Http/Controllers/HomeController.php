<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Stream;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $streams = Stream::all();
        if(\Auth::user()->id == 21)
            \Session::flash('msg_sale1211');
        return view('home')->with('streams',$streams);
    }

    public function getSchedule()
    {
        return view('pages.schedule');
    }

    public function getSubs()
    {
        return view('pages.subs');
    }
}
