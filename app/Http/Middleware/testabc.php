<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class testabc
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
        if(Auth::check()) {
            if( Auth::user()->user_level ==2)
            {
              return $next($request);
            }
            if( Auth::user()->user_level == 5)
            {
                return redirect('/student');
            }
            if( Auth::user()->user_level == 3)
            {
                return redirect('/school');
            }
            if( Auth::user()->user_level == 4)
            {
                return redirect('/teacher');
            }
            if( Auth::user()->user_level == 1)
            {
                return redirect('/admin');
            }
        }
         return redirect('/');
    }
}
