<?php

namespace App\ViewComposers\Article;

use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;
use App\Services\Filters\ArticleFiltersMap;

class FiltersMapComposer
{
    public function compose(View $view)
    {
        $filters = ArticleFiltersMap::filters();

        $view->with([
            'article_filters' => Request::route('user')
            ? Arr::except($filters, 'user')
            : Arr::except($filters, 'status'),
        ]);
    }
}