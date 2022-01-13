<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\AcceptanceCertificateController;
use App\Http\Controllers\Api\VehicleMovementController;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/area', [AreaController::class, 'index'])->name('area');
Route::get('/unauthenticated', [AuthController::class, 'getError'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/update-profile', [AuthController::class, 'updateProfile']);

    Route::group(['prefix' => '/acceptance-certificate'], function() {
        Route::get('/', [AcceptanceCertificateController::class, 'index']);
    });

    Route::group(['prefix' => '/vehicle-movement'], function() {
        Route::get('/', [VehicleMovementController::class, 'index']);
        Route::get('/show', [VehicleMovementController::class, 'show']);
        Route::post('/store', [VehicleMovementController::class, 'store']);
        Route::post('/update', [VehicleMovementController::class, 'update']);
        Route::post('/check', [VehicleMovementController::class, 'check']);
        Route::post('/start', [VehicleMovementController::class, 'start']);
    });

});
