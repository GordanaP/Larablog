<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\Controller;

class CategoryArticleController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('articles.create', compact('category'));
    }
}
