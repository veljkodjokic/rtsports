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
        $feed->enable_cache(false);
        $feed->init();
        $feed->handle_content_type();

        $feed1 = new \SimplePie();
        $feed1->set_feed_url('http://rss.cbssports.com/rss/headlines/nba');
        $feed1->enable_cache(false);
        $feed1->init();
        $feed1->handle_content_type();

        $feed1=$feed1->get_items();

        return view('pages.news')->with(['feed'=>$feed, 'feed1'=>$feed1]);
    }

    public function getHighlights()
    {
        $feed = new \SimplePie();
        $feed->set_feed_url('https://www.youtube.com/feeds/videos.xml?channel_id=UCoh_z6QB0AGB1oxWufvbDUg');
        $feed->enable_cache(false);
        $feed->init();
        $feed->handle_content_type();

        $feed1 = new \SimplePie();
        $feed1->set_feed_url('https://www.youtube.com/feeds/videos.xml?channel_id=UCEjOSbbaOfgnfRODEEMYlCw');
        $feed1->enable_cache(false);
        $feed1->init();
        $feed1->handle_content_type();

        $feed=$feed->get_items();
        $feed1=$feed1->get_items();

        return view('pages.highlights')->with(['feed'=>$feed, 'feed1'=>$feed1]);
    }

    public function getVideo($url)
    {
        $video="https://www.youtube.com/embed/".$url;

        return view('pages.highlight')->with('video',$video);
    }

    public function postSearchVideos()
    {
        $feed = new \SimplePie();
        $feed->set_feed_url('https://www.youtube.com/feeds/videos.xml?channel_id=UCoh_z6QB0AGB1oxWufvbDUg');
        $feed->enable_cache(false);
        $feed->init();
        $feed->handle_content_type();

        $feed1 = new \SimplePie();
        $feed1->set_feed_url('https://www.youtube.com/feeds/videos.xml?channel_id=UCEjOSbbaOfgnfRODEEMYlCw');
        $feed1->enable_cache(false);
        $feed1->init();
        $feed1->handle_content_type();

        $feed=$feed->get_items();
        $feed1=$feed1->get_items();
        $feeds=array_merge($feed,$feed1);

        $searchVideos=[];
        $keywords = \Request::input('keywords');

        if(!$keywords){
            $searchVideos=$feeds;
            return \View::make('pages.searchedVideos')->with('searchVideos',$searchVideos);
        }

        foreach ($feeds as $feed) {
            $title=strtolower($feed->get_title());
            if(str_contains($title, $keywords))
                array_push($searchVideos , $feed);
        }

        return \View::make('pages.searchedVideos')->with('searchVideos',$searchVideos);
    }

    public function getInjuries()
    {
        $feed = new \SimplePie();
        $feed->set_feed_url('http://www.rotoworld.com/rss/feed.aspx?sport=nba&ftype=news&count=12&format=rss');
        $feed->enable_cache(false);
        $feed->init();
        $feed->handle_content_type();

        return view('pages.injuries')->with('feed',$feed);
    }
}
