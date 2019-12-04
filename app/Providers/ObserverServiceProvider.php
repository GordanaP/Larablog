<?php

namespace App\Providers;

use App\Tag;
use App\Role;
use App\Category;
use App\Observers\TagObserver;
use App\Observers\RoleObserver;
use App\Observers\CategoryObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
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
        Role::observe(RoleObserver::class);
        Category::observe(CategoryObserver::class);
        Tag::observe(TagObserver::class);
    }
}
