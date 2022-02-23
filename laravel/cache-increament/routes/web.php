<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
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

Route::get('/users', function () {
//    $users = DB::table('users')->increment('viewer', 1);//increment whole table
//    $users = DB::table('users')->where('name', 'Mustafa')->increment('viewer', 1);//increment as name
//    $users = DB::table('users')->find(1);//find as id

//     $auth = true;//when user is auth get named Mustafa
//    $users = DB::table('users')->when($auth, function($query){
//     $query->where('name','Mustafa');
//    })->get();

//cache
    //first go to env file and change cache mode as file
    if(Cache::has('users')){
        dd(Cache::get('users'));
    } else {
        $users = DB::table('users')->get();
        Cache::put('users',$users, 120);
        dd($users);
    }
   
    // return view('users');
});
