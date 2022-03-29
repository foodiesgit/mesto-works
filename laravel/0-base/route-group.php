<?php
//route group---------------------------------------------------------------------------
Route::prefix("admin")->group(function () {

    Route::get('/details/{id}', function ($id) {
        return $id;
    });

    Route::get('/profile/{id}', function ($id) {
        return $id;
    });
});

//middleware-------------------------------------------------------------------------
Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/admin', function () {
        return '<h1>You ara an admin</h1>';
    });
});

//or specific role
Route::middleware(['role:admin'])->group(function () {
    Route::get('/user', function () {
        return 'You are a user';
    });
});

//or specific role
Route::middleware(['role:user'])->group(function () {
    Route::get('/user', function () {
        return 'You are a user';
    });
});