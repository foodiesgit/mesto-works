<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Index()
    {
      return view('backend.pages.dashboard');
    }
    public function Profile()
    {
       return view('backend.pages.profile');
    }
}
