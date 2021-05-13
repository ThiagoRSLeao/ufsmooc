<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isTeacher
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
        if (Auth::user() && (Auth::user()->type_user == 2 || Auth::user()->type_user == 1)){
            return $next($request);
        }
        else{
            return redirect('home')->with('error','You have not admin access');
        }
    }
}
