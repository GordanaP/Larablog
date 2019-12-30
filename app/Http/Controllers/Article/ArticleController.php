<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Facades\RedirectTo;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Services\Filters\ArticleFilters;
use App\Contracts\EloquentModelRepository;

class ArticleController extends Controller
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
     * @param \App\Services\Filters\ArticleFilters $filters
     * @return \Illuminate\Http\Response
     */
    public function index(ArticleFilters $filters)
    {
        return view('articles.index')->with([
            'articles' => $this->articles->published($filters),
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
        $article = $this->articles->create($request->validated());

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
        $this->articles->update($article, $request->validated());

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
        $this->articles->remove($article ?? $request->validated()['ids']);

        return RedirectTo::route('articles');
    }
}
