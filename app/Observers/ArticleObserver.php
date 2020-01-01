<?php

namespace App\Observers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;

class ArticleObserver
{
    public function creating($model)
    {
        $model->slug = Str::slug($model->title);
    }

    public function updating($model)
    {
        $model->slug = Str::slug($model->title);
    }

    public function deleting($model)
    {
        App::make('article_image')->removeStoragePath($model->image);

        $model->image()->delete();
    }
}
