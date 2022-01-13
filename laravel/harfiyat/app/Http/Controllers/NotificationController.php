<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panel\Document;

class NotificationController extends Controller
{
    //
    function index(){
       
      return Document::where('IsletenKullaniciId' , session('Id'))->where('BasvuruDurumId',2)->get()->count();
;
    }
}
