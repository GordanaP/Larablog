<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Contracts\EloquentModelRepository;

class ArticleAjaxController extends Controller
{
    /**
     * The repository implementation.
     *
     * @var \App\Contracts\EloquentModelRepository
     */
    private $articles;

    /**
     * Create a new controller instance.
     *
     * @param \App\Contracts\EloquentModelRepository $articles
     */
    public function __construct(EloquentModelRepository $articles)
    {
        $this->articles = $articles;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ArticleResource::collection($this->articles->all());
    }
}
