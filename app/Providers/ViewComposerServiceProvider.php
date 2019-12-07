<?php

namespace App\Providers;

use App\ViewComposers\TagsComposer;
use App\ViewComposers\RolesComposer;
use Illuminate\Support\Facades\View;
use App\ViewComposers\AuthorsComposer;
use Illuminate\Support\ServiceProvider;
use App\ViewComposers\CategoriesComposer;
use App\ViewComposers\Article\ApprovalStatusesComposer;

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
        View::composer('partials.articles._form_save', CategoriesComposer::class);
        View::composer('partials.articles._form_save', TagsComposer::class);
        View::composer('partials.articles._form_save', ApprovalStatusesComposer::class);
        View::composer('partials.articles._authors_select_box', AuthorsComposer::class);
    }
}
