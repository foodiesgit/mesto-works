<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CategoriesController;
use App\Http\Controllers\frontend\ArticlesController;

Route::get('/', [CategoriesController::class,'Index'])->name('home');
Route::get('/{id}', [CategoriesController::class,'categoryFilter'])->name('category.filter');
Route::get('/blog/{id}', [ArticlesController::class,'Index'])->name('article.content');
//firstOrCreate
//insertOrIgnore