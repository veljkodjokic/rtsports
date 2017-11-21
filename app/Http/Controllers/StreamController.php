<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Stream;

class StreamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getStream($id)
    {
    	$stream = Stream::find($id);
    	$streams = Stream::where('id', '!=', $id)->get();
    	return view('player')->with(['streams'=>$streams, 'stream'=>$stream]);
    }

    public function getShow()
    {
        return view('showplayer');
    }
}
