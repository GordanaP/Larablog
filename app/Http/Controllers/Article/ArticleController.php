<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Facades\RedirectTo;
use Illuminate\Http\Request;
use App\Facades\ManageArticle;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles_count = Article::count();

        return view('articles.index', compact('articles_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = ManageArticle::create($request->validated());

        return RedirectTo::route('articles', $article);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        ManageArticle::update($request->all());

        return RedirectTo::route('articles', $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @param  \App\Article | null  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleRequest $request, Article $article = null)
    {
        ManageArticle::delete();

        return RedirectTo::route('articles', $article);
    }
}
