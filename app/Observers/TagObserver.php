<?php

namespace App\Observers;

use Illuminate\Support\Str;

class TagObserver
{
    public function creating($model)
    {
        $model->slug = Str::slug($model->name);
    }

    public function updating($model)
    {
        $model->slug = Str::slug($model->name);
    }
}