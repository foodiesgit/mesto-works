<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('admin.get.login')->withError('Giriş yapmanız gerekmektedir!');
        }
        
        $onuser = Auth::user();
        if (in_array($onuser->role->slug, $roles)) {
            view()->share('onuser', $onuser);
        } else {
            return redirect()->route('admin.get.index')->withError('Sayfaya yetkiniz bulunmamaktadır.!');
        }
        

        return $next($request);
    }
}
