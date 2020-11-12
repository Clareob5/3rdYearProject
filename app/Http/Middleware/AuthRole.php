<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles) //...$roles is passing in a list of arguments
    {
      //condition that checks if user exists and has a specific role, allow them to go to where they're trying to go.
      if (!$request->user() || !$request->user()->authorizeRoles($roles)){
        return redirect()->route('home'); //if user doesn't have the role then redirect them to home route.

      }
        return $next($request); //path user is trying to go to
    }
}
