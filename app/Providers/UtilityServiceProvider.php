<?php

namespace App\Providers;

use App\Utilities\UrlManager;
use App\Utilities\QueryManager;
use App\Utilities\ArticleStatus;
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
        $this->app->instance('article_image', new ArticleImage);
        $this->app->instance('profile_image', new ProfileImage);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('UrlManager', function($app) {
            return new UrlManager;
        });

        $this->app->bind('QueryManager', function($app) {
            return new QueryManager;
        });

        $this->app->bind('ArticleStatus', function($app) {
            return new ArticleStatus;
        });

        $this->app->bind('RedirectTo', function($app) {
            return new RedirectTo;
        });
    }
}
