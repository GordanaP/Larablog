<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;

class ArticleCommentAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
        return CommentResource::collection($article->comments);
    }
}
