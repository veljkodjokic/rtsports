<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Stream extends Model
{
    protected $fillable = [
        'source', 'running'
    ];

    public function events()
	{
		return $this->hasMany('\App\Event');
	}

	public function Live()
	{
		$events=\App\Event::where('stream_id',$this->id)->get();
		foreach($events as $event)
		{
			if($event->Relevant()){
			$date=substr($event->day, 0,10);
			$start=Carbon::parse($date.' '.$event->time);
			$end=$start->addHours(4);
			$start=Carbon::parse($date.' '.$event->time);
			if($start <  Carbon::Now()  && Carbon::Now()  <$end)
				return true;
			}
		}
		return false;
	}

	public $theEvent;

	public function upNext()
	{
		$inf = Carbon::now()->addHours(24)->diffInMinutes(Carbon::now());
		$events=\App\Event::where('stream_id',$this->id)->get();
		foreach($events as $event)
		{
			if($event->Relevant()){
				$date=substr($event->day, 0,10);
				$start=Carbon::parse($date.' '.$event->time);
				$end=$start->addHours(4);
				$start=Carbon::parse($date.' '.$event->time);
	
				$end = Carbon::parse($end);
				$now = Carbon::now();
				$diff = $end->diffInMinutes($now);
				if($diff <  $inf ){
					$inf=$diff;
					$this->theEvent=Event::find($event->id);
				}
			}
		}
		return $this->theEvent;
	}
}
