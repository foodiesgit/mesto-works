<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class CategoriesController extends Controller
{
    public function Index()
    {
        $data['categories'] = Category::get();
        $data['articles'] = Article::with('category')->orderBy('created_at', 'DESC')->paginate(3);
        $data['articlescount'] = Article::count();
        return view('frontend.pages.home', $data);
    }
    public function categoryFilter($id)
    {
        $data['categories'] = Category::get();
        $data['articles'] = Article::with('category')->where('category_id', $id)->orderBy('created_at', 'DESC')->paginate(3);
        $data['articlescount'] = Article::count();
        return view('frontend.pages.home', $data);
    }
}
