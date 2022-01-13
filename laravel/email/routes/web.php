<?php

use Illuminate\Support\Facades\Route;
use Mail as Mail;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email', function(){
    return view('emailpage');
});

Route::post('/email', function(Request $req){
    $emailTo = 'mesto1830@outlook.com';
    //send view with emailpage
    // Mail::send('emailpage', $array, function($message) use($emailTo){
    //     $message->subject('Info');
    //     $message->to($emailTo);
    // });

    //send with text
    $emailTo = 'mesto1830@outlook.com';
    Mail::raw('Hello guys!Where are you?', function($message) use($emailTo) {
        $message->subject('Info');
        $message->to($emailTo);
    });
});
