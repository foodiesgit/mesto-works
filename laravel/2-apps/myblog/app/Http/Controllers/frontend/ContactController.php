<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestContact;
use function PHPUnit\Framework\returnSelf;
use App\Models\Contact;

class ContactController extends Controller
{
    public function Index()
    {
        return view('frontend.pages.contact');
    }

    public function SendMessage(RequestContact $request)
    {
        $contact = Contact::create($request->post());
        return redirect()->route('contact')->withSuccess('Message Send Succesfully');
    }
}