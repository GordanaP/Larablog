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
     * Determine that the user is admin.
     *
     * @return bool
     */
    public function getIsAdminAttribute()
    {
        return $this->hasRole('admin');
    }

    /**
     * Determine that the user is author.
     *
     * @return bool
     */
    public function getIsAuthorAttribute()
    {
        return $this->hasRole('author');
    }

    /**
     * Determine that the user is member.
     *
     * @return bool
     */
    public function getIsMemberAttribute()
    {
        return $this->roles->isEmpty();
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
}