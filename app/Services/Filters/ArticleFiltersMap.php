<?php

namespace App\Services\Filters;

use App\Category;

class ArticleFiltersMap
{
    public static function filters()
    {
        return [
            'category' =>  Category::orderBy('name', 'asc')
                ->get()
                ->pluck('name', 'name'),
        ];
    }
}