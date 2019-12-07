<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;

class CategoryArticleAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return ArticleResource::collection($category->articles);
    }
}
