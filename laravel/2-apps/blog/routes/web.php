<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CategoriesController;
use App\Http\Controllers\frontend\ArticlesController;
use App\Http\Controllers\frontend\ContactController;

Route::get('/', [CategoriesController::class,'Index'])->name('home');
Route::get('/contact', [ContactController::class,'Index'])->name('contact');
Route::post('/send', [ContactController::class,'SendMessage'])->name('contact.send.message');
Route::get('/{id}', [CategoriesController::class,'categoryFilter'])->name('category.filter');
Route::get('/blog/{id}', [ArticlesController::class,'Index'])->name('article.content');