<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\MagazineController;
use App\Http\Controllers\Backend\MagazineDraftController;
use App\Http\Controllers\Backend\MagazinePageController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SituationController;
use App\Http\Controllers\Backend\UserController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use lluminate\Support\Facades\Input;


Route::get('/register', [AuthController::class, 'getRegister'])->name('admin.get.register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('admin.post.register');

Route::get('/login', [AuthController::class, 'getLogin'])->name('admin.get.login');
Route::post('/giris-yap', [AuthController::class, 'postLogin'])->name('admin.post.login');
Route::get('/cikis-yap', [AuthController::class, 'logout'])->name('admin.get.logout');

Route::group(['middleware' => ['auth', 'admin']], function() {

  Route::get('/', [AdminController::class, 'getIndex'])->name('admin.get.index');
  Route::get('/profile', [UserController::class, 'getProfile'])->name('get.user.profile');
  Route::post('/profile', [UserController::class, 'postProfile'])->name('post.user.profile');

    Route::post('/saveimage', function(Request $req){
        if($req->file){
            $folderName = $req->folderName;

            $image = $req->file;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $folderName = $req->folderName;
            Storage::disk('public')->put('magazine/'.$folderName.'/'.$req->fileName.'.png', base64_decode($image));

            DB::table('magazine_pages')->insert([
                'magazine_id'=>$req->id,
                'magazine_name'=>$folderName,
                'image'=>$req->fileName
            ]);

            $data['msg'] = 'Sayfa kaydedildi.';
            return $data;
        } else{
            $data['msg'] = 'No Image.';
            return $data;
        }
    });
    Route::get('/getposts', function(){
        $data['posts'] =  Post::with('images')->get();
        return $data;
    });

    Route::get('/getpagecount', function(){
        $data['result'] = DB::table('magazine_pages')->get();
        return count($data['result']);
    });
    Route::get('/getebooks/{id}', function($id){
        $data['pages'] = DB::table('magazine_pages')->where('magazine_id',$id)->get();
        return $data;
    });

  Route::group(['middleware' => ['check.role:admin,editor,author']], function() {
    Route::group(['prefix' => 'post'], function () {
      Route::get('/', [PostController::class, 'index'])->name('post.index');
      Route::get('/create', [PostController::class, 'create'])->name('post.create');
      Route::post('/store', [PostController::class, 'store'])->name('post.store');
      Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
      Route::post('/update', [PostController::class, 'update'])->name('post.update');
      Route::get('/delete/{id}', [PostController::class, 'delete'])->name('post.destroy');
      Route::post('upload-image',[PostController::class, 'uploadImage'])->name('post.upload-image');
      Route::get('/{post_id}/delete-image/{id}',[PostController::class, 'deleteImage'])->name('get.delete-image');

      Route::get('/edit-show',[PostController::class, 'editShow'])->name('get.edit-show');
    });
  });

  Route::group(['middleware' => ['check.role:admin,editor']], function() {
    Route::group(['prefix' => 'user'], function () {
      Route::get('/', [UserController::class, 'index'])->name('user.index');
      Route::get('/create', [UserController::class, 'create'])->name('user.create');
      Route::post('/store', [UserController::class, 'store'])->name('user.store');
      Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
      Route::post('/update', [UserController::class, 'update'])->name('user.update');
      Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.destroy');
    });
    Route::group(['prefix' => 'magazine'], function () {
      Route::get('/', [MagazineController::class, 'index'])->name('magazine.index');
      Route::get('/create', [MagazineController::class, 'create'])->name('magazine.create');
      Route::post('/store', [MagazineController::class, 'store'])->name('magazine.store');
      Route::get('/edit/{id}', [MagazineController::class, 'edit'])->name('magazine.edit');
      Route::post('/update', [MagazineController::class, 'update'])->name('magazine.update');
      Route::get('/delete/{id}', [MagazineController::class, 'delete'])->name('magazine.destroy');

      Route::get('/ebook/{id}', function($id){
          return view('backend.magazine.ebook');
      })->name('magazine.ebook');

      Route::group(['prefix' => '/{magazine_id}/page'], function () {
        Route::get('/', [MagazinePageController::class, 'index'])->name('magazine-page.index');
        Route::get('/create', [MagazinePageController::class, 'create'])->name('magazine-page.create');
        Route::post('/store', [MagazinePageController::class, 'store'])->name('magazine-page.store');
        Route::get('/edit/{id}', [MagazinePageController::class, 'edit'])->name('magazine-page.edit');
        Route::post('/update', [MagazinePageController::class, 'update'])->name('magazine-page.update');
        Route::get('/delete/{id}', [MagazinePageController::class, 'delete'])->name('magazine-page.destroy');
      });
    });
  });

  Route::group(['middleware' => ['check.role:admin']], function() {

    Route::group(['prefix' => 'category'], function () {
      Route::get('/', [CategoryController::class, 'index'])->name('category.index');
      Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
      Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
      Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
      Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
      Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.destroy');
    });
    Route::group(['prefix' => 'magazine-draft'], function () {
      Route::get('/', [MagazineDraftController::class, 'index'])->name('magazinedraft.index');
      Route::get('/create', [MagazineDraftController::class, 'create'])->name('magazinedraft.create');
      Route::post('/store', [MagazineDraftController::class, 'store'])->name('magazinedraft.store');
      Route::get('/edit/{id}', [MagazineDraftController::class, 'edit'])->name('magazinedraft.edit');
      Route::post('/update', [MagazineDraftController::class, 'update'])->name('magazinedraft.update');
      Route::get('/delete/{id}', [MagazineDraftController::class, 'delete'])->name('magazinedraft.destroy');
    });
    Route::group(['prefix' => 'situation'], function () {
      Route::get('/', [SituationController::class, 'index'])->name('situation.index');
      Route::get('/create', [SituationController::class, 'create'])->name('situation.create');
      Route::post('/store', [SituationController::class, 'store'])->name('situation.store');
      Route::get('/edit/{id}', [SituationController::class, 'edit'])->name('situation.edit');
      Route::post('/update', [SituationController::class, 'update'])->name('situation.update');
      Route::get('/delete/{id}', [SituationController::class, 'delete'])->name('situation.destroy');
    });

    Route::get('/setting', [AdminController::class, 'getSetting'])->name('setting.index');
    Route::post('/setting', [AdminController::class, 'postSetting'])->name('setting.update');

  });

});
