<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Http\Controllers\Controller;

class ArticleCommentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function create(Article $article)
    {
        return view('comments.create', compact('article'));
    }
}
