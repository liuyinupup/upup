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
    public function article_display(Category $subcate)
    {
        return view('article_display',compact('subcate'));
    }
    public function article_list()
    {
        return view('admin.admin_home');
    }
}
