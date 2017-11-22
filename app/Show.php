<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $fillable = [
        'name','cover'
    ];

    public function episodes()
	{
		return $this->hasMany('\App\Episode');
	}

	protected $table = 'shows';

}
