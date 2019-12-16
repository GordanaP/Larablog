<?php

namespace App\Services\Filters;

use App\Tag;
use App\User;
use App\Category;

class ArticleFiltersMap
{
    public static function filters()
    {
        return [
            'status' => [
                'published' => 'Published',
                'future' => 'Approved for Publishing',
                'draft' => 'Draft',
            ],
            'archive' => [
                'this_month' => 'This month',
                'last_month' => 'Last month',
                'older' => 'Older'
            ],
            'sort' => [
                'latest' => 'latest first',
                'oldest' => 'oldest first'
            ],
            'category' => Category::orderBy('name', 'asc')
                ->pluck('name', 'name'),
            'tag' => Tag::orderBy('name', 'asc')
                ->pluck('name', 'name'),
            'user' => User::authors()
                ->orderBy('name', 'asc')
                ->pluck('name', 'name')
        ];
    }
}