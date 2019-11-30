<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'Admin\AdminPageController@index')
    ->name('admin.pages.index');

Route::prefix('admin')->name('admin.')->namespace('Role')
    ->group(function(){
        Route::get('roles/list', 'RoleAjaxController@index')
            ->name('roles.list');
        Route::delete('roles/{role?}', 'RoleController@destroy')
            ->name('roles.destroy');
        Route::resource('roles', 'RoleController', [
            'parameters' => ['' => 'role']
        ])->except('destroy');
        Route::resource('roles.users', 'RoleUserController', [
            'parameters' => ['' => 'role']
        ])->only('create');
    });

