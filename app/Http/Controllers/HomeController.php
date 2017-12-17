<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stream;
use Carbon\Carbon;
use App\Event;
use App\Team;
use App\Subscription;
use App\UserLog;

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

        $teams_array = array();
        $teams=Team::all();
        foreach($teams as $team)
            $teams_array[$team->team] = $team->name;

        return view('pages.schedule')->with(['events'=>$events,'range'=>$range, 'teams'=>$teams_array]);
    }

    public function getSubs()
    {
        $arch=Subscription::where('user_id',\Auth::id())->where('out_at','<',Carbon::now())->get();
        $subs=Subscription::where('user_id',\Auth::id())->where('out_at','>',Carbon::now())->get();
        return view('pages.subs')->with(['subs'=>$subs, 'arch'=>$arch]);
    }

    public function getNews()
    {
        $feed = new \SimplePie();
        $feed->set_feed_url('http://www.nba.com/rss/nba_rss.xml');
        $feed->set_cache_location('/var/www/html/rtsports/bootstrap/cache'); //C:\xampp
        $feed->init();
        $feed->handle_content_type();
        return view('pages.news')->with('feed',$feed);
    }
}
