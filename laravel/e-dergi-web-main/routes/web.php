<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\MagazineController;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Frontend\PostController;


Route::group(['middleware' => ['share.frontend']], function() {
	Route::get('/', [SiteController::class, 'getIndex'])->name('get.index');
	Route::get('/hakkimizda', [SiteController::class, 'getAbout'])->name('get.about');
	Route::get('/kullanim-sartlari', [SiteController::class, 'getTermsOfUse'])->name('get.terms_of_use');
	Route::get('/gizlilik-sozlesmesi', [SiteController::class, 'getConfidentialityAgreement'])->name('get.confidentiality_agreement');
	Route::get('/iletisim', [SiteController::class, 'getContact'])->name('get.contact');
	Route::post('/iletisim', [SiteController::class, 'postContact'])->name('post.contact');

	Route::get('/post/{category_slug?}', [PostController::class, 'getAll'])->name('post.all');
	Route::get('/post/d/{slug}', [PostController::class, 'getDetail'])->name('post.detail');
	Route::get('/post-like', [PostController::class, 'likePost'])->name('post.like');
	Route::get('/author/d/{slug}', [PostController::class, 'getAuthorDetail'])->name('author.detail');
	
	Route::get('/magazine', [MagazineController::class, 'getAll'])->name('magazine.all');
	Route::get('/magazine/d/{slug}', [MagazineController::class, 'getDetail'])->name('magazine.detail');
	Route::get('/magazine-like', [MagazineController::class, 'likeMagazine'])->name('magazine.like');
});