<?php

namespace App;

use App\Traits\DatePresenter;
use Laravelista\Comments\Comment;

class CustomComment extends Comment
{
    use DatePresenter;

    protected $table = 'comments';

    public function getIsChildAttribute()
    {
        return $this->parent;
    }

    public function getIsParentAttribute()
    {
        return $this->children;
    }
}
