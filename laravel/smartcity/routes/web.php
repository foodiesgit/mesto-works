<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    $data['banner'] =  DB::table('banners')->get();
    $data['categories'] =  DB::table('categories')->get();
    $data['project'] =  DB::table('projects')->orderBy('id', 'desc')->take(6)->get();
    $data['activities'] =  DB::table('activities')->orderBy('id', 'desc')->get();
    return view('pages.home', $data);
});

//public
Route::get('/getprojects', function(){
    $data['projects'] =  DB::table('projects')->orderBy('id', 'desc')->take(6)->get();
    return $data;
});

Route::get('/projectscategory/{category}', function($category){
    $data['projectscategory'] = DB::table('projects')->where('category', $category, 1)->get();
    return $data;
});

Route::get('/projectsdetails/{id}', function(Request $req, $id){
    $data['details'] = DB::table('projects')->where('id', $id)->get();
    $path = public_path('uploads/projects/'.$data['details'][0]->title);
    if(File::isDirectory($path)){
        $images = File::allFiles(public_path('uploads/projects/'.$data['details'][0]->title));
        return view('pages.projectsdetails', $data)->with(array('images'=>$images));
    } else {
        $data['details'] = 'Bu kritere uygun detay bulunamadi';
        return view('pages.projectsdetails', $data);
    }
});

Route::get('/activitiesdetails/{id}', function(Request $req, $id){
    $data['details'] = DB::table('activities')->where('id', $id)->get();
    $path = public_path('uploads/activities/'.$data['details'][0]->title);
    if(File::isDirectory($path)){
        $images = File::allFiles(public_path('uploads/activities/'.$data['details'][0]->title));
        return view('pages.activitiesdetails', $data)->with(array('images'=>$images));
    } else {
        $data['details'] = 'Bu kritere uygun detay bulunamadi';
        return view('pages.activitiesdetails', $data);
    }
});

//admin auth
Route::get('/login', function(){
    return view('pages.login');
});

Route::post('/login', function(Request $req){
    $data['result'] = DB::table('admins')->where('name', $req->name, 1)->get();
    if(count($data['result']) > 0 && $req->password === $data['result'][0]->password){
        $req->session()->put('admin', $req->name);
       return '200';
    } else {
       return '401';
    }
});

Route::delete('/logout', function (Request $req){
    if ($req->session()->exists('admin')) {
        $req->session()->forget('admin');
    }
});

Route::get('/resetpass', function(){
    return view('pages.resetpass');
});

Route::post('/resetpass', function (Request $req) {
    $data['result'] = DB::table('admins')->where('email', $req->email, 1)->get();
    if(count($data['result']) > 0){
        DB::table('admins')->where('email', $req->email)->update([
            'password' => $req->password
        ]);
        return redirect('/login');
    } else {
        $data['message'] = 'Geçersiz oturum!';
        return view('pages.resetpass', $data);
    }
});

//admin edit

Route::middleware('checkSession')->get('/admin/banner', function(){
    $data['result'] = DB::table('banners')->get();
    return view('pages.banner', $data);
});

Route::middleware('checkSession')->get('/admin/categories', function(){
    $data['result'] = DB::table('categories')->get();
    return view('pages.categories', $data);
});

Route::middleware('checkSession')->get('/admin/activities', function(){
    $data['result'] = DB::table('activities')->get();
    return view('pages.activities', $data);
});

Route::middleware('checkSession')->get('/admin/projects', function(){
    $data['result'] = DB::table('projects')->get();
    return view('pages.projects', $data);
});

//adding
Route::middleware('checkSession')->post('/admin/addbanner', function(Request $req){
    $fileName = $req->file->getClientOriginalName();
    $req->file->move(public_path('uploads/banner/'), $fileName);
    DB::table('banners')->insert([
        'title'=>$req->title,
        'text'=>$req->text,
        'img'=>$fileName,
        'link'=>$req->link
    ]);
    return redirect('admin/banner');
});

Route::middleware('checkSession')->post('/admin/addprojects', function(Request $req){
    $data['category'] = DB::table('categories')->where('category', $req->category)->get();
    if(count($data['category']) > 0){
        $fileName = $req->file->getClientOriginalName();
        $req->file->move(public_path('uploads/projects/'.$req->title), $fileName);
        DB::table('projects')->insert([
            'category'=>$req->category,
            'title'=>$req->title,
            'text'=>$req->text,
            'img'=>$fileName,
            'link'=>$req->link
        ]);
        return redirect('admin/projects');
    } else{
        $data['msg'] = 'Kategory bulunamadı!';
        return view('pages.projects', $data);
    }
});

Route::middleware('checkSession')->post('/admin/addactivities', function(Request $req){
    $fileName = $req->file->getClientOriginalName();
    $req->file->move(public_path('uploads/activities/'.$req->title), $fileName);
    DB::table('activities')->insert([
        'title'=>$req->title,
        'text'=>$req->text,
        'img'=>$fileName,
        'link'=>$req->link
    ]);
    return redirect('admin/activities');
});

//edit
Route::middleware('checkSession')->post('/admin/categories', function(Request $req){
    $fileName = $req->file->getClientOriginalName();
    $req->file->move(public_path('uploads/categories/'.$req->category), $fileName);
    DB::table('categories')->insert([
        'category'=>$req->category,
        'img'=>$fileName
    ]);
    return redirect('admin/categories');
});

Route::middleware('checkSession')->get('/admin/categories/edit/{category}', function(Request $req, $category){
    $data['result'] = DB::table('categories')->where('category',$category,1)->get();
    return view('pages.categoriesedit', $data);
});

Route::middleware('checkSession')->post('/admin/categories/edit/{category}', function(Request $req, $category){
    $fileName = $req->file->getClientOriginalName();
    $req->file->move(public_path('uploads/categories/'.$category), $fileName);
    DB::table('categories')->where('category', $category)->update(['img' => $fileName]);
    return redirect('admin/categories');
});

//delete
Route::middleware('checkSession')->post('/admin/banner/delete', function(Request $req){
    DB::table('banners')->where('id', $req->id, 1)->delete();
    File::deleteDirectory(public_path('uploads/banner'));
    return '200';
});

Route::middleware('checkSession')->post('/admin/categories/delete', function(Request $req){
    DB::table('categories')->where('id', $req->id, 1)->delete();
    File::deleteDirectory(public_path('uploads/categories/'.$req->category));

    $data = DB::table('projects')->where('category', $req->category)->get(['title']);
    foreach($data as $item){
        DB::table('projects')->where('title', $item->title)->delete();
        File::deleteDirectory(public_path('uploads/projects/'.$item->title));
    }
    return $data;
});

Route::middleware('checkSession')->post('/admin/project/delete', function(Request $req){
    DB::table('projects')->where('id', $req->id, 1)->delete();
    File::deleteDirectory(public_path('uploads/projects/'.$req->project));
    return '200';
});

Route::middleware('checkSession')->post('/admin/activiti/delete', function(Request $req){
    DB::table('activities')->where('id', $req->id, 1)->delete();
    File::deleteDirectory(public_path('uploads/activities/'.$req->activiti));
    return '200';
});


//image
Route::middleware('checkSession')->get('/admin/uploadimage', function(){
    return view('pages.uploadimage');
});

Route::middleware('checkSession')->post('/admin/uploadimage/', function(Request $req){
    $fileName = $req->file->getClientOriginalName();
    $req->file->move(public_path('/uploads/'.$req->maincategory.'/'.$req->subcategory.'/'), $fileName);
    return $fileName;
});

Route::middleware('checkSession')->post('/admin/uploadimage/type', function(Request $req){
    $data['result'] = DB::table($req->type)->orderBy('title')->get();
    return $data;
});
