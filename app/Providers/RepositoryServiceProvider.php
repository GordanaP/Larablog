<?php

namespace App\Providers;

use App\Contracts\ImageManager;
use App\Repositories\UserRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\CommentRepository;
use App\Repositories\ProfileRepository;
use Illuminate\Support\ServiceProvider;
use App\Contracts\EloquentModelRepository;
use App\Services\ManageImage\ArticleImage;
use App\Services\ManageImage\ProfileImage;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserAjaxController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\User\UserArticleController;
use App\Http\Controllers\Article\ArticleAjaxController;
use App\Http\Controllers\Comment\CommentAjaxController;
use App\Http\Controllers\Profile\ProfileAjaxController;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when([
            CommentController::class,
            CommentAjaxController::class,
        ])
        ->needs(EloquentModelRepository::class)
        ->give(CommentRepository::class);

        $this->app->when(ProfileRepository::class)
            ->needs(ImageManager::class)
            ->give(ProfileImage::class);

        $this->app->when([
            ProfileController::class,
            ProfileAjaxController::class,
        ])
        ->needs(EloquentModelRepository::class)
        ->give(ProfileRepository::class);

        $this->app->when([
            UserController::class,
            UserAjaxController::class,
        ])
        ->needs(EloquentModelRepository::class)
        ->give(UserRepository::class);

        $this->app->when(ArticleRepository::class)
            ->needs(ImageManager::class)
            ->give(ArticleImage::class);

        $this->app->when([
            ArticleController::class,
            ArticleAjaxController::class,
            UserArticleController::class
        ])
        ->needs(EloquentModelRepository::class)
        ->give(ArticleRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
