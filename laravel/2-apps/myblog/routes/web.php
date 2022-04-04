<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CategoriesController;
use App\Http\Controllers\frontend\ArticlesController;
use App\Http\Controllers\frontend\ContactController;

use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\AdminController;

//frontend
Route::get('/', [CategoriesController::class, 'Index'])->name('home');
Route::get('/category/{id}', [CategoriesController::class, 'categoryFilter'])->name('category.filter');
Route::get('/blog/{id}', [ArticlesController::class, 'Index'])->name('article.content');
Route::get('/contact', [ContactController::class, 'Index'])->name('contact');
Route::post('/send', [ContactController::class, 'SendMessage'])->name('contact.send.message');

//backend get
Route::get('/login', [AuthController::class, 'Login'])->name('login');
Route::get('/register', [AuthController::class, 'Register'])->name('register');
Route::get('/forgetpassword', [AuthController::class, 'ForgetPassword'])->name('forget.password');


Auth::routes();
//admin
Route::middleware(['auth'])->group(function () {
  Route::get('/admin', [AdminController::class, 'Index'])->name('admin');
  Route::get('/admin/profile', [AdminController::class, 'Profile'])->name('admin.profile');
});
