<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendAboutusController extends Controller
{
    public function index(){
        return view('frontend.hakkimizda');
    }
}
