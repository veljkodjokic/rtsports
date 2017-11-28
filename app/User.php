<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verifytoken', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function subscriptions()
    {
        return $this->hasMany('\App\Subscription');
    }

    public function Paid()
    {
        $subs=$this->subscriptions()->get();
        foreach($subs as $sub)
            if($sub->paid_at <= Carbon::now() && Carbon::now() <= $sub->out_at)
                return true;
        return false;
    }
}
