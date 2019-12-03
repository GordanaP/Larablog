<?php

namespace App\Traits\User;

trait Presentable
{
    /**
     * Determine if the authenticated user is the request user.
     *
     * @param  \App\User  $user
     * @return boolean
     *
     */
    public function isMe($user)
    {
        return $this->id == $user->id;
    }

    /**
     * Determine if the user is admin.
     *
     * @return boolean
     */
    public function getIsAdminAttribute()
    {
        return $this->hasRole('admin');
    }

    /**
     * Determine if the user is author.
     *
     * @return boolean
     */
    public function getIsAuthorAttribute()
    {
        return $this->hasRole('author');
    }

    /**
     * Determine if the user is member.
     *
     * @return bool
     */
    public function getIsMemberAttribute()
    {
        return $this->roles->isEmpty();
    }
}
