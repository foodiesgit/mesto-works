<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class AuthController extends Controller
{
    public function getLogin(){
        return view('backend.auth.login');
    }
    public function postLogin(Request $req){
        return redirect()->rote('admin.get.index');
    }
}
