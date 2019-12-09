<?php

namespace App;

use App\Traits\DatePresenter;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use DatePresenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'biography'];

    /**
     * Get the profile's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) .' '.ucfirst($this->last_name);
    }

    /**
     * The user who owns the article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Assign the user acccount to the profile.
     *
     * @param  \App\User $user
     * @return \App\Profile
     */
    public function assignAuthor($user)
    {
        $this->user()->associate($user)->save();

        return $this;
    }
}
