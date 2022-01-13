<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;

class ShareFrontend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $settings = Setting::all();
        View::share( 'settings', $settings);

        $header_posts = Post::published()->showHeader()->whereNotNull('slug')->orderBy('published_at', 'DESC')->get();
        View::share( 'header_posts', $header_posts);
        $header_categories = Category::active()->showHeader()->whereNotNull('slug')->orderBy('order', 'DESC')->get();
        View::share( 'header_categories', $header_categories);

        $footer_posts = Post::published()->showFooter()->whereNotNull('slug')->orderBy('published_at', 'DESC')->get();
        View::share( 'footer_posts', $footer_posts);
        $footer_categories = Category::active()->showFooter()->whereNotNull('slug')->orderBy('order', 'DESC')->get();
        View::share( 'footer_categories', $footer_categories);

        return $next($request);
    }

}