<?php

namespace App\Services\Filters;

use App\Article;
use Illuminate\Pipeline\Pipeline;
use App\Services\Filters\TagFilter;
use App\Services\Filters\SortFilter;
use App\Services\Filters\UserFilter;
use App\Services\Filters\StatusFilter;
use App\Services\Filters\ArchiveFilter;
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
                StatusFilter::class,
                ArchiveFilter::class,
                SortFilter::class,
                CategoryFilter::class,
                TagFilter::class,
                UserFilter::class,
            ])
            ->thenReturn();
    }
}