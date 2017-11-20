<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'team1', 'team2', 'stream', 'day', 'time'
    ];

    protected $dates =['day'];

    public function scopeRelevant($query)
	{
		$query->where('day','>=',Carbon::yesterday());
	}

    public function stream()
	{
		return $this->belongsTo('\App\Stream');
	}
}
