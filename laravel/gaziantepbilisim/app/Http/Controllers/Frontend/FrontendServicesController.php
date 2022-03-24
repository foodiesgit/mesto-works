<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;

class FrontendServicesController extends Controller
{
    public function index(){
        $services = Services::get();
        return view('frontend.hizmetler', compact('services'));
    }
}
