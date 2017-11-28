<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Subscription extends Model
{
    protected $fillable = [
        'paid_at', 'out_at', 'type', 'user_id'
    ];

    protected $dates =['paid_at', 'out_at'];

    public function user()
	{
		return $this->belongsTo('\App\User');
	}
}
