<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Article;
use App\Facades\RedirectTo;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Services\Filters\ArticleFilters;
use App\Services\ManageModel\ArticleManager;

class UserArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, ArticleFilters $articleFilters)
    {
        $user_articles = Article::filter($articleFilters)
            ->ownedBy($user)
            ->newest()
            ->paginate(5);

        return view('articles.index')->with([
            'articles' => $user_articles,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('articles.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request, User $user)
    {
        $article = ArticleManager::get($request->validated())->save();

        return RedirectTo::route('articles', $article);
    }
}
