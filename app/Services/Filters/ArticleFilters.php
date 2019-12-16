<?php

namespace App\Services\Filters;

use App\Article;
use Illuminate\Pipeline\Pipeline;
use App\Services\Filters\CategoryFilter;

class ArticleFilters
{
    /**
     * Apply the article filters.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply()
    {
        return app(Pipeline::class)
            ->send(Article::query()
                ->with('category', 'user', 'tags', 'image')
            )
            ->through([
                // order == order in filter Map ?
                CategoryFilter::class,
            ])
            ->thenReturn();
    }
}