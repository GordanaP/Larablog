<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Article;
use App\Facades\RedirectTo;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Services\Filters\ArticleFilters;
use App\Contracts\EloquentModelRepository;

class UserArticleController extends Controller
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
     * @param \App\User $user
     * @param \App\Services\Filters\ArticleFilters $filters
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, ArticleFilters $filters)
    {
        return view('articles.index')->with([
            'articles' => $this->articles->ownedBy($user, $filters),
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('articles.create', compact('user'));
    }

}
