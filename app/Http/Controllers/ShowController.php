<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Show;
use App\Episode;

class ShowController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$shows = Show::orderBy('name')->get();
        return view('tvshows.shows')->with('shows',$shows);
    }

    public function getShow($id)
    {
    	$show=Show::find($id);
    	$episodes=$show->episodes()->get();
    	$epnmr = $episodes->unique('season');
    	$epse = array();
    	foreach($epnmr as $season)
    	{
    		array_push($epse, $season->season);
    	}
    	sort($epse);
        return view('tvshows.showlist')->with(['show'=>$show,'episodes'=>$episodes,'epse'=>$epse]);
    }

    public function getEpisode($id,$ep)
    {
    	$episode = Episode::where('show_id',$id)->where('number',$ep)->first();
    	$show = Show::find($id);
    	$episodes=$show->episodes()->get();
    	return view('tvshows.showplayer')->with(['episodes'=>$episodes,'show'=>$show,'episode'=>$episode]);
    }
}
