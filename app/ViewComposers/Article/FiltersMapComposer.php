<?php

namespace App\ViewComposers\Article;

use Illuminate\View\View;
use App\Services\Filters\ArticleFiltersMap;

class FiltersMapComposer
{
    public function compose(View $view)
    {
        $view->with([
            'article_filters' => ArticleFiltersMap::filters(),
        ]);
    }
}