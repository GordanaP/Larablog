<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;

class ArticleAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
        return ArticleResource::collection(
            Article::with('comments', 'category', 'user', 'tags', 'image')->get()
        );
    }
}
