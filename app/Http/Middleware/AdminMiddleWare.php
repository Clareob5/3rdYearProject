<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AdminMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->usertype == 'admin'){
            return $next($request);
        }
        else{
            return redirect('/home')->with('status','You are Not Allowed to Admin Dashboard!');
        }
        return $next($request);
    }
}
