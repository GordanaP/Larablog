<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'Admin\AdminPageController@index')
    ->name('admin.pages.index');

Route::prefix('admin')->name('admin.')
    ->group(function(){
        Route::get('roles/list', 'Role\RoleAjaxController@index')
            ->name('roles.list');
        Route::resource('roles', 'Role\RoleController', [
            'parameters' => ['' => 'role']
        ]);
    });

