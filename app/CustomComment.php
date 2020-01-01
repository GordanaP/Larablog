<?php

namespace App;

use App\Traits\DatePresenter;
use Laravelista\Comments\Comment;

class CustomComment extends Comment
{
    use DatePresenter;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * Get is_child attribute.
     *
     * @return boolean
     */
    public function getIsChildAttribute()
    {
        return $this->parent;
    }

    /**
     * Get is_parent attribute.
     *
     * @return boolean
     */
    public function getIsParentAttribute()
    {
        return $this->children;
    }
}
