<?php

namespace App\Providers;

use App\ViewComposers\TagsComposer;
use App\ViewComposers\RolesComposer;
use App\ViewComposers\UsersComposer;
use Illuminate\Support\Facades\View;
use App\ViewComposers\AuthorsComposer;
use Illuminate\Support\ServiceProvider;
use App\ViewComposers\CategoriesComposer;
use App\ViewComposers\SubmitFormComposer;
use App\ViewComposers\CommenterTypeComposer;
use App\ViewComposers\GeneratePasswordComposer;
use App\ViewComposers\Article\PublishedComposer;
use App\ViewComposers\Article\FiltersMapComposer;
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
        View::composer(['partials.comments._commenter_radio', 'comments.create'],
            CommenterTypeComposer::class);
        View::composer('partials.comments._users_select_box', UsersComposer::class);
        View::composer('partials.users._form_save', GeneratePasswordComposer::class);
        View::composer('partials.users._roles_checkboxes', RolesComposer::class);
        View::composer('partials.comments._articles_select_box', PublishedComposer::class);
        View::composer('partials.articles._form_save', CategoriesComposer::class);
        View::composer('partials.articles._form_save', TagsComposer::class);
        View::composer('partials.articles._form_save', IsApprovedComposer::class);
        View::composer( 'partials.articles._authors_select_box', AuthorsComposer::class);
        View::composer( 'partials.profiles._authors_select_box', AuthorsWithoutProfileComposer::class);
        View::composer( 'partials.admin._submit_form', SubmitFormComposer::class);
        View::composer( 'partials.app._side', FiltersMapComposer::class);
    }
}
