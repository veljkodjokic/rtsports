<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Stream;
use Carbon\Carbon;
use \App\Subscription;

class StreamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getStream($id)
    {
    	$theStream = Stream::find($id);
    	$streams = Stream::where('id', '!=', $id)->get();

        $user=\Auth::user();
        $sub=Subscription::where('user_id',$user->id)->where('type',0)->where('out_at','>',Carbon::now())->get();
        if(!$sub->isEmpty() && !$user->admin)
            \Session::flash('trl');
        

    	return view('player')->with(['streams'=>$streams, 'theStream'=>$theStream]);
    }
}
