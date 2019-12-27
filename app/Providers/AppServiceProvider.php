<?php

namespace App\Providers;

use App\Contracts\ModelImage;
use App\Contracts\ModelManager;
use Illuminate\Support\ServiceProvider;
use App\Services\ManageModel\TagManager;
use App\Services\ManageModel\RoleManager;
use App\Services\ManageModel\UserManager;
use App\Services\ManageImage\ArticleImage;
use App\Services\ManageImage\ProfileImage;
use App\Services\ManageModel\ReplyManager;
use App\Http\Controllers\Tag\TagController;
use App\Services\ManageModel\ArticleManager;
use App\Services\ManageModel\CommentManager;
use App\Services\ManageModel\ProfileManager;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\User\UserController;
use App\Services\ManageModel\CategoryManager;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Comment\CommentReplyController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(ArticleController::class)
          ->needs(ModelManager::class)
          ->give(ArticleManager::class);

        $this->app->when(ProfileController::class)
          ->needs(ModelManager::class)
          ->give(ProfileManager::class);

        $this->app->when(CategoryController::class)
          ->needs(ModelManager::class)
          ->give(CategoryManager::class);

        $this->app->when(RoleController::class)
          ->needs(ModelManager::class)
          ->give(RoleManager::class);

        $this->app->when(UserController::class)
          ->needs(ModelManager::class)
          ->give(UserManager::class);

        $this->app->when(TagController::class)
          ->needs(ModelManager::class)
          ->give(TagManager::class);

        $this->app->when(CommentController::class)
          ->needs(ModelManager::class)
          ->give(CommentManager::class);

        $this->app->when(CommentReplyController::class)
          ->needs(ModelManager::class)
          ->give(ReplyManager::class);

        $this->app->when(ArticleManager::class)
          ->needs(ModelImage::class)
          ->give(ArticleImage::class);

        $this->app->when(ProfileManager::class)
          ->needs(ModelImage::class)
          ->give(ProfileImage::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
