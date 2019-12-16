<?php

namespace App\Traits\Article;

trait Scopeable
{
    /**
     * Scope a query to only include published articles.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where([
            ['is_approved', 1],
            ['publish_at', '<=', today()]
        ]);
    }

    /**
     * Scope a query to order articles by publishing date in a desceneding order.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNewest($query)
    {
        return $query->orderBy('publish_at', 'desc');
    }

    /**
     * Scope a query to only include articles owned by a specific user.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \App\User  $user
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOwnedBy($query, $user)
    {
        return $query->where('user_id', $user->id);
    }

    /**
     * Scope a query to only include articles fitered by a query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \App\Sevices\Filters\ArticleFilters  $articleFilters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, $articleFilters)
    {
        return $articleFilters->apply($query);
    }
}
