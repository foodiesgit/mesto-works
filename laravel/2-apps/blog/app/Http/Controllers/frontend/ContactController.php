<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class ContactController extends Controller
{
    public function Index()
    {
        return view('frontend.pages.contact');
    }

    public function SendMessage(Request $request)
    {
       return $request->post();
    }
}
