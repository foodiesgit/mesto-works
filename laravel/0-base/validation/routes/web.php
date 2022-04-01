<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', function (Request $req) {
    $req->validate([
        'user'=>'required | min:3',
        'pass'=> 'required | max:5'
    ]);
    return $req;
});
