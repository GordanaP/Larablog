<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
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
        Blade::component('components.admin.nav_item_collapsed', 'navItemCollapsed');
        Blade::component('components.admin.datatable', 'dataTable');
        Blade::component('components.admin.btn_add_new', 'addNew');
        Blade::component('components.admin.btn_view_all', 'viewAll');
        Blade::component('components.admin.btn_submit', 'submit');
        Blade::component('components.admin.btn_submit_handle', 'buttonSubmit');
        Blade::component('components.admin.page_header', 'header');
        Blade::component('components.error', 'isInvalid');
        Blade::component('components.asterisks', 'asterisks');
        Blade::component('components.required_fields', 'required');
    }
}
