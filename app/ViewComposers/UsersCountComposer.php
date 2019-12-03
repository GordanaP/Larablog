<?php

namespace App\ViewComposers;

use App\User;
use Illuminate\View\View;

class UsersCountComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     */
    public function compose(View $view)
    {
        $view->with([
            'users_count' => User::count(),
        ]);
    }
}