<?php

use App\Utilities\Worker;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/test', 'TestController@index');
Route::get('/error', 'ErrorController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'Admin\AdminPageController@index')
    ->name('admin.pages.index');

/**
 * User
 */
Route::resource('users', 'User\UserController')
    ->only('show','edit', 'update', 'destroy')
    ->middleware('can:touch,user');

/**
 * UserArticle
 */
Route::resource('users.articles', 'User\UserArticleController')
    ->only('index')
    ->middleware('can:viewAny, App\Article', 'can:touch, user');
Route::resource('users.articles', 'User\UserArticleController')
    ->only('create')
    ->middleware('can:create, App\Article', 'can:create, App\Article');

/**
 * Profile
 */
Route::resource('profiles', 'Profile\ProfileController')
    ->only('show');
Route::resource('profiles', 'Profile\ProfileController')
    ->only('edit', 'update')
    ->middleware('can:touch,profile');

/**
 * Article
 */
Route::resource('articles', 'Article\ArticleController')
    ->only('index');
Route::resource('articles', 'Article\ArticleController')
    ->only('show')
    ->middleware('can:view,article');
Route::resource('articles', 'Article\ArticleController')
    ->only('edit', 'update', 'destroy')
    ->middleware('can:touch,article');

/**
 * Admin Profile
 */
Route::middleware('admin')->prefix('admin')->namespace('Profile')
    ->group(function () {
        Route::get('profiles/list', 'ProfileAjaxController@index');
        Route::delete('profiles/{profile?}', 'ProfileController@destroy')
            ->name('admin.profiles.destroy');
        Route::resource('profiles', 'ProfileController', [
            'parameters' => ['' => 'profile'],
            'as' => 'admin'
        ])->except('destroy');
        Route::resource('profiles.articles', 'ProfileArticleController', [
            'parameters' => ['' => 'profile'],
            'as' => 'admin'
        ])->only('create');
        Route::get('/profiles/{profile}/articles/list', 'ProfileArticleAjaxController@index');
    });


/**
 * Admin Comment
 */
Route::middleware('admin')->prefix('admin')->namespace('Comment')
    ->group(function () {
        Route::get('comments/list', 'CommentAjaxController@index');
        Route::delete('comments/{comment?}', 'CommentController@destroy')
            ->name('admin.comments.destroy');
        Route::resource('comments', 'CommentController', [
            // 'parameters' => ['' => 'comment'],
            'as' => 'admin'
        ])->except('destroy');
        Route::resource('comments.replies', 'CommentReplyController', [
            'as' => 'admin'
        ])->only('create', 'store');
        Route::get('comments/{comment}/comments/list', 'CommentReplyAjaxController@index');
    });


/**
 * Admin Article
 */
Route::middleware('admin')->prefix('admin')->namespace('Article')
    ->group(function () {
        Route::get('articles/list', 'ArticleAjaxController@index');
        Route::delete('articles/{article?}', 'ArticleController@destroy')
            ->name('admin.articles.destroy');
        Route::resource('articles', 'ArticleController', [
            'parameters' => ['' => 'article'],
            'as' => 'admin'
        ])->except('destroy');
        Route::resource('articles.comments', 'ArticleCommentController', [
            'parameters' => ['' => 'article'],
            'as' => 'admin'
        ])->only('create');
        Route::get('articles/{article}/comments/list', 'ArticleCommentAjaxController@index');
    });

/**
 * Admin Tag
 */
Route::middleware('admin')->prefix('admin')->namespace('Tag')
    ->group(function(){
        Route::get('tags/list', 'TagAjaxController@index');
        Route::delete('tags/{tag?}', 'TagController@destroy')
            ->name('admin.tags.destroy');
        Route::resource('tags', 'TagController', [
            'parameters' => ['' => 'tag'],
            'as' => 'admin'
        ])->except('destroy');
        Route::resource('tags.articles', 'TagArticleController', [
            'parameters' => ['' => 'tag'],
            'as' => 'admin'
        ])->only('create');
        Route::get('tags/{tag}/articles/list', 'TagArticleAjaxController@index');
    });

/**
 * Admin Category
 */
Route::middleware('admin')->prefix('admin')->namespace('Category')
    ->group(function(){
        Route::get('categories/list', 'CategoryAjaxController@index');
        Route::delete('categories/{category?}', 'CategoryController@destroy')
            ->name('admin.categories.destroy');
        Route::resource('categories', 'CategoryController', [
            'parameters' => ['' => 'category'],
            'as' => 'admin'
        ])->except('destroy');
        Route::resource('categories.articles', 'CategoryArticleController', [
            'parameters' => ['' => 'category'],
            'as' => 'admin'
        ])->only('create');
        Route::get('categories/{category}/articles/list', 'CategoryArticleAjaxController@index');
    });

/**
 * Admin User
 */
Route::middleware('admin')->prefix('admin')->namespace('User')
    ->group(function () {
        Route::get('users/list', 'UserAjaxController@index');
        Route::delete('users/{user?}', 'UserController@destroy')
            ->name('admin.users.destroy');
        Route::resource('users', 'UserController', [
            'parameters' => ['' => 'user'],
            'as' => 'admin'
        ])->except('destroy');
        Route::resource('users.comments', 'UserCommentController', [
            'parameters' => ['' => 'user'],
            'as' => 'admin'
        ])->only('create');
        Route::get('users/{user}/comments/list', 'UserCommentAjaxController@index');
    });

/**
 * Admin Role
 */
Route::middleware('admin')->prefix('admin')->namespace('Role')
    ->group(function(){
        Route::get('roles/list', 'RoleAjaxController@index');
        Route::delete('roles/{role?}', 'RoleController@destroy')
            ->name('admin.roles.destroy');
        Route::resource('roles', 'RoleController', [
            'parameters' => ['' => 'role'],
            'as' => 'admin'
        ])->except('destroy');
        Route::resource('roles.users', 'RoleUserController', [
            'parameters' => ['' => 'role'],
            'as' => 'admin'
        ])->only('create');
        Route::get('roles/{role}/users/list', 'RoleUserAjaxController@index');
    });