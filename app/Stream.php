<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Stream extends Model
{
    protected $fillable = [
        'id', 'source', 'running'
    ];

    public function events()
	{
		return $this->hasMany('\App\Event');
	}

	public function Live()
	{
		$events=\App\Event::where('stream_id',$this->id)->Relevant()->get();
		foreach($events as $event)
		{
			$date=substr($event->day, 0,10);
			$start=Carbon::parse($date.' '.$event->time);
			$end=$start->addHours(4);
			$start=Carbon::parse($date.' '.$event->time);
			if($start <  Carbon::Now() && Carbon::Now() <$end)
				return true;
		}
		return false;
	}
}
