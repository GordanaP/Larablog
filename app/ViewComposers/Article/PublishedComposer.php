<?php

namespace App\ViewComposers\Article;

use App\Article;
use Illuminate\View\View;

class PublishedComposer
{
    public function compose(View $view)
    {
        $view->with([
            'published_articles' => Article::published()->get(),
        ]);
    }
}