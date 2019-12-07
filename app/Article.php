<?php

namespace App;

use App\Traits\DatePresenter;
use App\Traits\Article\Presentable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use DatePresenter, Presentable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'excerpt', 'body', 'category_id', 'publish_at', 'is_approved'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'publish_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array+
     */
    protected $casts = [
        'is_approved' => 'boolean',
    ];

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
     * The user that owns the article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // return $this->belongsTo(User::class)->with('profile');
        return $this->belongsTo(User::class);
    }

    /**
     * The category that has the article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The tags that have the article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->orderBy('name', 'asc');
    }

    /**
     * Add tags to the article
     *
     * @param array $tags
     */
    public function addTags($tags)
    {
        $this->tags()->sync($tags);
    }

    /**
     * Assign the author to the artisle.
     *
     * @param  \App\User $user
     * @return \App\Article
     */
    public function assignAuthor($user)
    {
        $this->user()->associate($user)->save();

        return $this;
    }
}
