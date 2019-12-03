<?php

namespace App\Providers;

use App\ViewComposers\RolesComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\ViewComposers\RolesCountComposer;
use App\ViewComposers\UsersCountComposer;

class ViewComposerServiceProvider extends ServiceProvider
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
        View::composer('partials.users._roles_checkboxes', RolesComposer::class);
        View::composer('roles.index', RolesCountComposer::class);
        View::composer('users.index', UsersCountComposer::class);
    }
}
