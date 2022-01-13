<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class Signup
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
        if( $request->session()->get('Id') == null or empty($request->session()->get('Id')) or $request->session()->get('Id') == 0)
        return redirect('sign-up');
        else
        return $next($request);
    }
}
