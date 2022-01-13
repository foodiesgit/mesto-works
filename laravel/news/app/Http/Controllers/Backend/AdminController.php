<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\News;

class AdminController extends Controller
{
    // main page-------------------------------------------------
    public function getIndex(){
        return view('backend.index');
    }

    //users------------------------------------------------------
    public function getUser(){
        return view('backend.admin.users.index');
    }
    public function editUser(){
        return view('backend.admin.users.edit-users');
    }
    public function addUser(){
        return view('backend.admin.users.add-users');
    }
    public function setUser(){
        return 'Add new user';
    }

    //news-----------------------------------------------------
    public function getNews(){
        return view('backend.admin.news.index');
    }
    public function editNews(){
        return view('backend.admin.news.edit-news');
    }
    public function addNews(){
        return view('backend.admin.news.add-news');
    }
    public function setNews(){
        return 'Add new news';
    }

    //announcement---------------------------------------------
    public function getAnnouncement(){
        return view('backend.admin.announcement.index');
    }
    public function editAnnouncement(){
        return view('backend.admin.announcement.edit-announcement');
    }
    public function addAnnouncement(){
        return view('backend.admin.announcement.add-announcement');
    }
    public function setAnnouncement(){
        return 'Add new announcement';
    }
}
