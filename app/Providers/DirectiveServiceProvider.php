<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class DirectiveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('author', function ($user) {
            return optional(optional($user)->load('roles'))->is_author;
        });

        Blade::if('admin', function () {
            return Auth::check() && Auth::user()->is_admin;
        });
    }
}
