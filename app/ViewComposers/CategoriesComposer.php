<?php

namespace App\ViewComposers;

use App\Category;
use Illuminate\View\View;

class CategoriesComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     */
    public function compose(View $view)
    {
        $view->with([
            'categories' => Category::orderBy('name', 'asc')->get(),
        ]);
    }
}