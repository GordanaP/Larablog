<?php

namespace App\ViewComposers;

use App\User;
use Illuminate\View\View;

class UsersComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     */
    public function compose(View $view)
    {
        $view->with([
            'users' => User::orderBy('email')->get()
        ]);
    }
}