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

    protected $appends = [
        'publish_at_formatted',
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
     * The user who owns the article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class)->with('profile');
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

    /**
     * The image that belongs to the article
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Determine if the article has an image.
     *
     * @return boolean
     */
    public function hasImage()
    {
        return $this->image;
    }
}
