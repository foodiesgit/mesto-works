<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees', [EmployeesController::class, 'getEmployees']);
Route::get('/employees/{id}', [EmployeesController::class, 'detailsEmployee']);
Route::post('/employees/add', [EmployeesController::class, 'addEmployee']);
Route::put('/employees/{id}/update', [EmployeesController::class, 'updateEmployee']);
Route::delete('/employees/{id}/delete', [EmployeesController::class, 'deleteEmployee']);
Route::get('/employees/search/{name}', [EmployeesController::class, 'searchEmployees']);
