<?php
//for photo path run------------------------------
//php artisan storage:link then change .env API = http://127.0.0.1:8000

//with new name--------------------------
$fileName = session()->get( 'email' ).'.'.$req->file->getClientOriginalExtension();
//with original name--------------------------
$req->file->move(public_path('images'), $req->file->getClientOriginalName());

//store to public folder---------------------
$req->file->move(public_path('uploads'), $fileName);

//store to storage/public folder-------------
$req->file->storeAs('public', $fileName);

//storage base64 image---------------------
$folderName = $req->folderName;
$image = $req->file;
$image = str_replace('data:image/png;base64,', '', $image);
$image = str_replace(' ', '+', $image);
$folderName = $req->folderName;
Storage::disk('public')->put('magazine/'.$folderName.'/'.$req->fileName.'.png', base64_decode($image));

//change this code with public code in config/filesystem file to use publci folder
// 'public' => [
//     'driver' => 'local',
//     'root'   => public_path() . '/upload',
//     'url' => env('APP_URL').'/public',
//     'visibility' => 'public',
// ]