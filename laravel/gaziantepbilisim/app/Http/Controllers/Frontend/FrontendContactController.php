<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class FrontendContactController extends Controller
{
    public function index(){
        $contact  = Contact::first();
        return view('frontend.iletisim', compact('contact'));
    }
}
