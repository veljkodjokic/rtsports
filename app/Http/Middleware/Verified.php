<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class Verified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$user)
    {
        if($user){
       if (!$user->status) {
           return redirect('/login')->withErrors(['Account is not verified.']);
       }
   }
 
       return $next($request);
    }
}
