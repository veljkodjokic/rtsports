<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $fillable = [
        'id', 'source', 'running'
    ];

    public function events()
	{
		return $this->hasMany('\App\Event');
	}
}
