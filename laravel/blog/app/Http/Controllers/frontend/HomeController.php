<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class HomeController extends Controller
{
    public function Index()
    {
        $data['categories'] = Category::get();
        return view('frontend.pages.home', $data);
    }
}
