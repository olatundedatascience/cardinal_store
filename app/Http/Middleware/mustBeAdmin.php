<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mustBeAdmin
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
        if(Session::has('is_admin')) {
            $isAdmin =  Session::get('is_admin');

            if($isAdmin == false || $isAdmin == 0) {
                return response()->redirectTo(route('not_allowed'));
            }
        }
        return $next($request);
    }
}
