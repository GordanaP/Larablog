<?php

namespace App;

use App\Traits\DatePresenter;
use App\Scopes\UsersCountScope;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use DatePresenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name' ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new UsersCountScope);
    }

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
     * The users that belong to the role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
