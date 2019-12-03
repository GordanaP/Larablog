<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'Admin\AdminPageController@index')
    ->name('admin.pages.index');

/**
 * User
 */
Route::middleware('account.owner')->resource('users', 'User\UserController')
    ->only('show','edit', 'update', 'destroy');

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
        // Route::resource('categories.articles', 'CategoryArticleController', [
        //     'parameters' => ['' => 'category'],
        //     'as' => 'admin'
        // ])->only('create');
        // Route::get('categories/{category}/articles/list', 'CategoryArticleAjaxController@index');
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
    });
