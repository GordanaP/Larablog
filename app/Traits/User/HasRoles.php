<?php

namespace App\Traits\User;

use App\Role;

trait HasRoles
{
    /**
     * The roles owned by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Determine that the user has a specific role.
     *
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return (bool) $role->intersect($this->roles)->count();
    }

    /**
     * Add roles to the user.
     *
     * @param mixed $roles
     */
    public function addRoles($roles)
    {
        $this->roles()->sync($roles);
    }

    /**
     * Get the authors.
     *
     * @return Illuminate\Support\Collection
     */
    public function scopeAuthors()
    {
        return static::with('roles', 'profile')->whereHas('roles', function($query){
            return $query->whereName('author');
        });

    }

    /**
     * The authors without profiles.
     *
     * @return Illuminate\Suppot\Colesction
     */
    public function scopeAuthorsWithoutProfile()
    {
        return static::authors()->whereDoesntHave('profile');
    }
}
