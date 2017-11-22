<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = [
        'season','show_id','number','source'
    ];

    public function show()
	{
		return $this->belongsTo('\App\Show');
	}

	protected $table = 'episodes';
}
