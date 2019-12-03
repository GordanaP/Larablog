<?php

namespace App\ViewComposers;

use App\Role;
use Illuminate\View\View;

class RolesCountComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     */
    public function compose(View $view)
    {
        $view->with([
            'roles_count' => Role::count(),
        ]);
    }
}