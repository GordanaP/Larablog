<?php

namespace App;

use App\Traits\DatePresenter;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use DatePresenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name' ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * The article that belongs to the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

}
