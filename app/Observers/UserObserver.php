<?php

namespace App\Observers;

class UserObserver
{

    public function deleting($model)
    {
        $model->profile()->delete();

        $model->comments()->delete();
    }
}
