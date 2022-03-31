<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function Index($id)
    {
        $article = Article::whereId($id)->first() ?? abort('404','Not found');
        $article->increment('hit');
        return view('frontend.pages.article', compact('article'));
    }
}
