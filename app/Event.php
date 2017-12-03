<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'team1', 'team2', 'stream_id', 'day', 'time'
    ];

    protected $dates =['day'];

    public function Relevant()
	{
		$date=substr($this->day, 0,10);
		$start=Carbon::parse($date.' '.$this->time);
		$end=$start->addHours(4);
		if(Carbon::now()>$end)
			return false;
		return true;
	}

    public function stream()
	{
		return $this->belongsTo('\App\Stream');
	}
}
