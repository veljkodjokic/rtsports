<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Mail;
use Carbon\Carbon;
use App\Subscription;

class expMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends emails to all users whos trial subscription has expired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $subs=Subscription::select('user_id')->where('type',0)->where('out_at','<',Carbon::now())->distinct()->get();
        if(!$subs->isEmpty())
        {
            for($i=0;$i<$subs->count();$i++){
                $user=User::findOrFail($subs[$i]->user_id);
                Subscription::where('user_id',$user->id)->delete();
                app('App\Http\Controllers\StatusController')->sendTrialExp($user);
                $user->payment=1;
                $user->save();
            }
        }
    }
}
