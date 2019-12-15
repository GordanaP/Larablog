<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ArticleStatus extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ArticleStatus';
    }
}