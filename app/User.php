<?php

namespace App;

use App\Traits\DatePresenter;
use App\Traits\User\HasRoles;
use App\Traits\User\Presentable;
use Laravelista\Comments\Comment;
use Laravelista\Comments\Commenter;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Commenter, DatePresenter, HasRoles, Notifiable, Presentable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Set the password.
     *
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    /**
     * The articles that belong to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /**
     * Determine if the user has articles.
     *
     * @return boolean
     */
    public function hasArticles()
    {
        return $this->articles->count();
    }

    /**
     * Add article to the user.
     *
     * @param \App\Article $article
     */
    public function addArticle($article)
    {
        $this->articles()->save($article);
    }

    /**
     * The profile that belongs to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Deterine if the user has profle.
     *
     * @return boolean
     */
    public function hasProfile()
    {
        return $this->profile;
    }

    /**
     * Add the profile to the user.
     *
     * @param \App\Profile $profile
     */
    public function addProfile($profile)
    {
        $this->profile()->save($profile);
    }

    /**
     * The comments that belong to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'commenter_id');
    }

    /**
     * Determine if the user owns the model.
     *
     * @param  \App\Model $model
     * @return boolean
     */
    public function owns($model)
    {
        return $this->id == $model->user_id;
    }

    /**
     * Create an article.
     *
     * @param  array $data
     * @return \App\Article
     */
    public function createArticle(array $data)
    {
        return $this->articles()->create($data);
    }
}
