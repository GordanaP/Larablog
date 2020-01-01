<?php

namespace App\Observers;

use Illuminate\Support\Facades\App;

class ProfileObserver
{
    public function deleting($model)
    {
        App::make('profile_image')->removeStoragePath($model->avatar);

        $model->avatar()->delete();
    }
}
