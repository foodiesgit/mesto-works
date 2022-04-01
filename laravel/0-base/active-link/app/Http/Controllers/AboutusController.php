<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function Aboutus()
    {
        return view('layouts.aboutus');
    }
}
