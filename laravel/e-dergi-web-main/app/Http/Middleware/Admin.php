<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::check()) {
            $onuser = Auth::user();
            if ($onuser->role->slug == 'admin' || $onuser->role->slug == 'author') {
                view()->share('onuser', $onuser);
            }
        }
        

        return $next($request);
    }
}
