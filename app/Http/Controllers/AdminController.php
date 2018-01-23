<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserLog;
use App\GuestLog;
use Carbon\Carbon;
use App\Event;
use App\Episode;
use App\Stream;
use App\Show;
use App\Subscription;

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
        $reg_count=UserLog::select('ip')->distinct()->get()->count();
        $guest_count=GuestLog::select('ip')->distinct()->get()->count();
        $logs = UserLog::all();
        return view('admin.user_logs')->with(['logs'=>$logs,'reg_count'=>$reg_count,'guest_count'=>$guest_count]);
    }

    public function postAddEvent(Request $request)
    {
        $event = new Event;
        $event->day = $request->day;
        $event->time = $request->time;
        $event->team1 = $request->team1;
        $event->team2 = $request->team2;
        $event->stream_id = $request->stream;
        $event->live = $request->live;
        if($request->sport == 'nhl')
            $event->sport='nhl';
        $event->save();
        return \Redirect::back();
    }

    public function postAddStream(Request $request)
    {
        $stream = new Stream;
        $stream->source=$request->source;
        $stream->running=0;
        $stream->save();

        \Session::flash('add_src');
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

    public function postSearchLogsa(Request $request)
    {
        $logs=UserLog::orderBy('user')->get();
        return \View::make('partials.searchedLogs')->with('logs',$logs);
    }

    public function postSearchLogsd(Request $request)
    {
        $logs=UserLog::orderbyDesc('user')->get();
        return \View::make('partials.searchedLogs')->with('logs',$logs);
    }

    public function postAddSub(Request $request)
    {
        $type=$request->input( '_type' );
        $email=$request->input( '_user' );
        $user= User::Where('email',$email)->first();

        if($type==0)
        {
            $sub = new Subscription();
            $sub->paid_at=Carbon::now();
            $sub->out_at=Carbon::now()->addDays(2);
            $sub->type=$type;
            $sub->user_id=$user->id;
            $sub->save(); 
        }
        if($type==1)
        {
            $sub = new Subscription();
            $sub->paid_at=Carbon::now();
            $sub->out_at=Carbon::now()->addMonths(1);
            $sub->type=$type;
            $sub->user_id=$user->id;
            $sub->save(); 
        }
        if($type==2)
        {
            $year=new Carbon('this year');
            $july=$year->addMonths(7)->addDays(2);

            $sub = new Subscription();
            $sub->paid_at=Carbon::now();
            $sub->out_at=$july;
            $sub->type=$type;
            $sub->user_id=$user->id;
            $sub->save(); 
        }
         
    }

    public function postDelSub(Request $request)
    {
        $email=$request->input( '_user' );
        $user=User::where('email',$email)->first();
        $sub=$user->getSub();
        $sub->delete();
    }

    public function getEditChannels()
    {
        $streams=Stream::all();
        return view('admin.edit_channels')->with('streams',$streams);
    }

    public function postEditStream(Request $request)
    {
        $source = $request->source;
        $id = $request->id;
        
        $stream=Stream::findOrFail($id);
        $stream->source=$source;
        $stream->save();

        \Session::flash('succs');
        return redirect('/admin/edit_channels');
    }

}
