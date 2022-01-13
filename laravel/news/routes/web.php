<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\AdminController;

Route::get('/', function () {
    return view('backend.index');
});

//login--------------------------------------------
Route::get('/login', [AuthController::class, 'getLogin'])->name('admin.get.login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('admin.post.login');

//route group---------------------------------------
Route::group(['prefix' => 'admin'], function (){
    //main page---------------------------------------
    Route::get('/', [AdminController::class, 'getIndex'])->name('admin.get.index');

    //users-------------------------------------------
    Route::get('/users', [AdminController::class, 'getUser'])->name('admin.get.users');

    Route::get('/addusers', [AdminController::class, 'addUser'])->name('admin.add.users');
    Route::post('/addusers', [AdminController::class, 'setUser'])->name('admin.set.users');

    Route::get('/editusers', [AdminController::class, 'editUser'])->name('admin.edit.users');
    Route::post('/editusers', [AdminController::class, 'setEditUser'])->name('admin.set.edit.users');

    //news----------------------------------------------
    Route::get('/news', [AdminController::class, 'getNews'])->name('admin.get.news');

    Route::get('/addnews', [AdminController::class, 'addNews'])->name('admin.add.news');
    Route::post('/addnews', [AdminController::class, 'setNews'])->name('admin.set.news');

    Route::get('/editnews', [AdminController::class, 'editNews'])->name('admin.edit.news');
    Route::post('/editnews', [AdminController::class, 'setEditNews'])->name('admin.set.edit.news');

    //anonucement---------------------------------------
    Route::get('/announcement', [AdminController::class, 'getAnnouncement'])->name('admin.get.announcement');

    Route::get('/addannouncement', [AdminController::class, 'addAnnouncement'])->name('admin.add.announcement');
    Route::post('/addannouncement', [AdminController::class, 'setAnnouncement'])->name('admin.set.announcement');

    Route::get('/editannouncement', [AdminController::class, 'editAnnouncement'])->name('admin.edit.announcement');
    Route::post('/editannouncement', [AdminController::class, 'setEditAnnouncement'])->name('admin.set.edit.announcement');
});

