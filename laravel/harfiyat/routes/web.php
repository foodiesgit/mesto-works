<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SaveController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CrediCartController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\AlarmController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ThreeDPayController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TestController;

// use App\Models\ArventoArac;

///
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



// Route::get('/crontest',function(){
// 	$arventoarac = new ArventoArac();
// 	$arventoarac->Plaka = "11EF100";
// 	$arventoarac->AracTakipId ="5";
// 	$arventoarac->save();
// })->name('ctest');

Route::get('/',function(){
	return view('home.internet');
})->name('internet');

Route::get('/credicart',[CrediCartController::class,'index'])->name('credicart')->middleware('signup');
Route::post('/save',[SaveController::class,'index'])->name('save');
Route::post('/update',[UpdateController::class,'index'])->name('update');
Route::get('/sign-up',[SignupController::class,'index'])->name('sign-up');
Route::get('/exit',[SignupController::class,'exit'])->name('exit');
Route::post('/sign',[SignupController::class,'sign'])->name('sign');
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('signup');
Route::post('/dashboard/cities',[DashboardController::class,'cities'])->name('loadStates');
Route::post('/upload',[UploadController::class,'index'])->name('upload');
Route::get('/documents',[DocumentController::class,'index'])->name('documents')->middleware('signup');
Route::any('/edit',[DocumentController::class,'edit'])->name('edit')->middleware('signup');
// Route::get('/edit/{key}',[DocumentController::class,'edit'])->name('edit')->middleware('signup');
Route::post('/payment',[PaymentController::class,'show'])->name('payment')->middleware('signup');
Route::post('/3D',[ThreeDPayController::class,'index'])->name('threedDPay')->middleware('signup');
Route::get('/notification',[NotificationController::class,'index'])->name('notification')->middleware('signup');
Route::get('/payment',function(){
	  return redirect('dashboard')->with('message','Erişim Engellendi');
})->middleware('signup');



Route::get('/map', [MapController::class,'index'])->name('map.index');
Route::get('/map-vehicle', [MapController::class,'getVehicle'])->name('map.vehicle');
Route::get('/vehicle-device', [MapController::class,'getVehicleDevice'])->name('map.vehicle-device');
Route::get('/map-test', [MapController::class,'test'])->name('map-test.index');

Route::get('/alarm', [AlarmController::class,'index'])->name('alarm.index');
Route::get('/alarm-status', [AlarmController::class,'getStatus'])->name('alarm.get');

Route::get('/test', [TestController::class,'index'])->name('test');

////  WEB
