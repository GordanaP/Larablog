<?php

namespace App\ViewComposers;

use App\User;
use Illuminate\View\View;

class AuthorsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     */
    public function compose(View $view)
    {
        $view->with([
            'authors' => User::authors()->get(),
        ]);
    }
}