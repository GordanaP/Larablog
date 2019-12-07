<?php

namespace App\ViewComposers;

use App\Tag;
use Illuminate\View\View;

class TagsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     */
    public function compose(View $view)
    {
        $view->with([
            'tags' => Tag::orderBy('name', 'asc')->get(),
        ]);
    }
}