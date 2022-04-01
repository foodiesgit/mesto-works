<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\Frontend\FrontendIndexController;
use App\Http\Controllers\Frontend\FrontendAboutusController;
use App\Http\Controllers\Frontend\FrontendServicesController;
use App\Http\Controllers\Frontend\FrontendProductsController;
use App\Http\Controllers\Frontend\FrontendContactController;
use App\Http\Controllers\Frontend\FrontendEmailController;

Route::get('/', [FrontendIndexController::class, 'index'])->name('index');
Route::get('/hakkimizda', [FrontendAboutusController::class, 'index'])->name('hakkimizda');
Route::get('/hizmetler', [FrontendServicesController::class, 'index'])->name('hizmetler');
Route::get('/urunler', [FrontendProductsController::class, 'index'])->name('urunler');
Route::get('/urunler-detay/{id}', [FrontendProductsController::class, 'urunlerDetay'])->name('urunler.detay');
Route::get('/iletisim', [FrontendContactController::class, 'index'])->name('iletisim');
Route::post('/iletisim/email', [FrontendEmailController::class, 'index'])->name('iletisim.email');

Auth::routes();

Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');


Route::group(['middleware' => ['auth']], function(){
    Route::resource('/admin/dashboard/users', UsersController::class);
    Route::resource('/admin/dashboard/services', ServicesController::class);
    Route::resource('/admin/dashboard/products', ProductsController::class);
    Route::resource('/admin/dashboard/contact', ContactController::class);
});
