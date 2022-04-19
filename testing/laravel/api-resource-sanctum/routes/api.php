<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;

//original
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//auth routes
Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

//public routes
Route::get('/products', [ProductsController::class,'index'])->name('products');
Route::get('/products/{id}', [ProductsController::class,'show']);
Route::get('/products/search/{name}', [ProductsController::class, 'search']);

//admin routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products/add', [ProductsController::class,'store']);
    Route::put('/products/update/{id}', [ProductsController::class,'update']);
    Route::delete('/products/delete/{id}', [ProductsController::class,'destroy']);
    Route::post('/logout', [AuthController::class,'logout']);
});

