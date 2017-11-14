<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $fillable = [
        'user', 'time'
    ];//

    protected $table = 'user_logs';
}
