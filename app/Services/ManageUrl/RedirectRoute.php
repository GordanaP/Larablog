<?php

namespace App\Services\ManageUrl;

use Illuminate\Support\Str;

class RedirectRoute
{
    /**
     * The authenticated user.
     *
     * @var \App\User
     */
    protected $user;

    /**
     * Redirect to the show route.
     *
     * @param  string $name
     * @param  \App\Model $parameter
     * @return \Illuminate\Http\Response
     */
    protected function toShow($name, $parameter)
    {
        return redirect()->route($this->name($name, '.show'), $parameter);
    }

    /**
     * Redirect to the edit route.
     *
     * @param  string $name
     * @param  \App\Model $parameter
     * @return \Illuminate\Http\Response
     */
    protected function toEdit($name, $parameter)
    {
        return redirect()->route($this->name($name, '.edit'), $parameter);
    }

    /**
     * Redirect to the index route.
     *
     * @param  string $name
     * @return \Illuminate\Http\Response
     */
    protected function toIndex($name)
    {
        return redirect()->route($this->name($name, '.index'));
    }

    /**
     * Determine the route name depending upon the user type.
     *
     * @param  string $string
     * @param  string $extension
     * @return string
     */
    private function name($string, $extension)
    {
        return $this->user->is_admin
            ? $this->adminName($string, $extension)
            : $this->baseName($string, $extension);
    }

    /**
     * Create the route name for the admin.
     *
     * @param  string $string
     * @param  string $extension
     * @return string
     */
    private function adminName($string, $extension)
    {
        return Str::start($this->baseName($string, $extension), 'admin.');
    }

    /**
     * Create the route name for the non-admin user.
     *
     * @param  string $string
     * @param  string $extension
     * @return string
     */
    private function baseName($string, $extension)
    {
        return Str::finish($string, $extension);
    }
}
