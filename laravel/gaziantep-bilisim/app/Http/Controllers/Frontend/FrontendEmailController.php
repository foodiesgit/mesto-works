<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Mail as Mail;

class FrontendEmailController extends Controller
{
    public function index(Request $req){
        $email = $req->email;
        $emailFrom = 'noreply@gaziantepbilisim.com.tr';
        $text = $req->text;
        $emailTo = 'info@gaziantepbilisim.com.tr';
        Mail::raw($text, function($message) use($emailFrom, $emailTo, $email) {
            $message->subject($email);
            $message->from($emailFrom);
            $message->to($emailTo);
        });
        return redirect()->route('index');
    }
}
