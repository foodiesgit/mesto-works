<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    // $isAdmin = true;
    // return User::when($isAdmin, function($data){
    //     $data->whereRole('user');
    // })->get();

    // return User::whereRole('user')->get();
    // return User::whereRole('user')->orderBy('name')->get();
    // return User::whereRole('user')->orderBy('name','DESC')->get();

    // return User::whereId(4)->first();
    // return User::whereId(4)->whereName('admin')->first();



    return view('welcome');
});
