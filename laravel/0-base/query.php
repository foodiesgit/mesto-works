<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {

    //when
    $isAdmin = true;
    return User::when($isAdmin, function($data){
        $data->whereRole('user');
    })->get();

    //order
    return User::whereRole('user')->get();
    return User::whereRole('user')->orderBy('name')->get();
    return User::whereRole('user')->orderBy('name','DESC')->get();
    //custom order
    return books::orderByRaw(DB::raw("FIELD(price,12.00,15.00,price)"))->get();

    //where
    return User::whereId(4)->first();
    return User::whereId(4)->whereName('admin')->first();
    return User::whereIdAndName(1,'admin')->first();

    return view('welcome');
});
