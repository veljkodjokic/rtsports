<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'team1', 'team2', 'stream', 'day', 'time'
    ];
}
