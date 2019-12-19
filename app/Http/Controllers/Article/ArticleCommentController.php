<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Http\Controllers\Controller;

class ArticleCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Article $article)
    {
        return view('comments.create', compact('article'));
    }
}
