<?php

namespace App\Providers;

use App\Utilities\ManageUser;
use App\Utilities\RedirectTo;
use App\Utilities\ManageArticle;
use App\Utilities\ManageProfile;
use Illuminate\Support\ServiceProvider;

class UtilityServiceProvider extends ServiceProvider
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
        $this->app->bind('ManageProfile', function($app) {
            return new ManageProfile;
        });

        $this->app->bind('ManageArticle', function($app) {
            return new ManageArticle;
        });

        $this->app->bind('ManageUser', function($app) {
            return new ManageUser;
        });

        $this->app->bind('RedirectTo', function($app) {
            return new RedirectTo;
        });
    }
}
