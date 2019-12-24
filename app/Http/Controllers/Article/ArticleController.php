<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Facades\RedirectTo;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Services\Filters\ArticleFilters;
use App\Services\ManageModel\ArticleManager;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ArticleFilters $articleFilters)
    {
        $published = Article::filter($articleFilters)
            ->published()
            ->newest()
            ->paginate(5);

        return view('articles.index')->with([
            'articles' => $published,
            'articles_count' => Article::count(),
        ]);
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
        $article = ArticleManager::get($request->validated())->save();

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
        ArticleManager::get($request->validated())->save();

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
        ArticleManager::get($article ?? $request->validated()['ids'])->remove();

        return RedirectTo::route('articles');
    }
}
