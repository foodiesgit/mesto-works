
<?php
//check params------------------------------------------------------------------
Route::get('/user/{name}/{id?}', function ($name, $id = null) {
    return 'Hello ' . $name . ' ' . $id;
})->where("id", '[0-9]+');

//array
Route::get('/user/{name}/{id?}', function ($name, $id = null) {
    return 'Hello ' . $name . ' ' . $id;
})->where(["name" => "[a-z]+", "id" => "[0-9]+"]);

//shorhend
Route::get('/user/{name}/{id?}', function ($name, $id = null) {
    return 'Hello ' . $name . ' ' . $id;
})->whereNumber("id")->whereAlpha("name");