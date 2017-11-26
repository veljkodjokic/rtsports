<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Stream;
use Carbon\Carbon;
use \App\Event;

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
        return view('home')->with('streams',$streams);
    }

    public function getSchedule()
    {
        $events= Event::orderBy('day')->orderBy('time')->get();
        $count=Stream::all()->count();
        $range=range(1,$count);
        array_unshift($range, 0);
        unset($range[0]);

        return view('pages.schedule')->with(['events'=>$events,'range'=>$range]);
    }

    public function getSubs()
    {
        return view('pages.subs');
    }
}
