<?php

namespace App\Providers;

use App\ViewComposers\TagsComposer;
use App\ViewComposers\RolesComposer;
use Illuminate\Support\Facades\View;
use App\ViewComposers\AuthorsComposer;
use Illuminate\Support\ServiceProvider;
use App\ViewComposers\CategoriesComposer;
use App\ViewComposers\GeneratePasswordComposer;
use App\ViewComposers\Article\IsApprovedComposer;
use App\ViewComposers\AuthorsWithoutProfileComposer;

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
        View::composer('partials.users._form_save', GeneratePasswordComposer::class);
        View::composer('partials.users._roles_checkboxes', RolesComposer::class);
        View::composer('partials.articles._form_save', CategoriesComposer::class);
        View::composer('partials.articles._form_save', TagsComposer::class);
        View::composer('partials.articles._form_save', IsApprovedComposer::class);
        View::composer( 'partials.articles._authors_select_box', AuthorsComposer::class);
        View::composer( 'partials.profiles._authors_select_box', AuthorsWithoutProfileComposer::class);
    }
}
