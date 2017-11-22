<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserLog;
use App\Event;
use App\Episode;
use App\Show;

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

    public function getUserLog()
    {
        $logs = UserLog::all();
        return view('admin.user_logs')->with('logs',$logs);
    }

    public function postAddEvent(Request $request)
    {
        $event = new Event;
        $event->day = $request->day;
        $event->time = $request->time;
        $event->team1 = $request->team1;
        $event->team2 = $request->team2;
        $event->stream_id = $request->stream;
        $event->save();
        return \Redirect::back();
    }

    public function postDelEvent(Request $request)
    {
        $id=$request->id;
        $event = Event::find($id);
        $event->delete();
        return \Redirect::back();
    }

    public function postAddEpisode(Request $request)
    {
        $episode = new Episode;
        $episode->season = $request->season;
        $episode->number = $request->number;
        $episode->show_id = $request->show;
        $episode->source = $request->source .'.mp4';
        $episode->save();
        return \Redirect::back();
    }

}
