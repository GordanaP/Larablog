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
        Blade::component('components.admin.btn_delete', 'delete');
        Blade::component('components.admin.btn_edit', 'edit');
        Blade::component('components.admin.btn_view_all', 'viewAll');
        Blade::component('components.admin.btn_submit', 'submit');
        Blade::component('components.admin.checkbox', 'checkbox');
        Blade::component('components.admin.page_header', 'header');
        Blade::component('components.admin.radio', 'radio');
        Blade::component('components.admin.row_info', 'rowInfo');
        Blade::component('components.admin.table_show', 'show');
        Blade::component('components.error', 'isInvalid');
        Blade::component('components.asterisks', 'asterisks');
        Blade::component('components.required_fields', 'required');
        Blade::component('components.form', 'form');
        Blade::component('components.filters', 'filters');
        Blade::component('components.filter', 'filter');
        Blade::component('components.filter_title', 'filterTitle');
    }
}
