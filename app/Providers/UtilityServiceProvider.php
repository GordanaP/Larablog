<?php

namespace App\Providers;

use App\Utilities\RedirectTo;
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
        $this->app->bind('RedirectTo', function($app){
            return new RedirectTo;
        });
    }
}
