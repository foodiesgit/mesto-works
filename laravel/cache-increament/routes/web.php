<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
//    $users = DB::table('users')->increment('viewer', 1);//increment whole table
    DB::table('users')->whereId(1)->increment('viewer', 1);//increment as name
    $users = DB::table('users')->find(1);//find as id

    $auth = true;//when user is auth get named mesto
   $users = DB::table('users')->when($auth, function($query){
    $query->where('name','mesto');
   })->get();

//cache
    //first go to env file and change cache mode as file and read value from cache
    if(Cache::has('users')){
      $users = Cache::get('users');
      return view('users', compact('users'));
    } else {
        $users = DB::table('users')->get();
        Cache::put('users',$users, 1);//cache expire 1 is 1 second
        return view('users', compact('users'));
    }
   
    
});
