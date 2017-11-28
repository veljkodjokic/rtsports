<?php

namespace App\Http\Middleware;

use Closure;

class Paid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=\Auth::user();
        if(!$user->Paid() && !$user->admin){
            \Session::flash('err_$');
            return \Redirect::back();
        }
        return $next($request);
    }
}
