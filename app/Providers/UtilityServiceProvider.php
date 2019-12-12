<?php

namespace App\Providers;

use App\Services\ManageUrl\RedirectTo;
use Illuminate\Support\ServiceProvider;
use App\Services\ManageImage\ArticleImage;
use App\Services\ManageImage\ProfileImage;

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
        $this->app->bind('ProfileImage', function($app){
            return new ProfileImage;
        });

        $this->app->bind('ArticleImage', function($app){
            return new ArticleImage;
        });

        $this->app->bind('RedirectTo', function($app) {
            return new RedirectTo;
        });
    }
}
