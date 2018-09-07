<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function admin_home()
    {
        return view('admin.admin_home');
    }
    public function article_display(Article $article)
    {
        dd($article['title']);
        return view('article_display',compact('subcate'));
    }
    public function article_list()
    {
        return view('admin.admin_home');
    }
    public function category_article(Category $category,Article $article){
        $articles=$category->articles;
        return view('articles.article_show',compact('category','articles','article'));
    }
}
