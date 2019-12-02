<?php

namespace App\ViewComposers;

use App\Role;
use Illuminate\View\View;

class RolesComposer
{
    public function compose(View $view)
    {
        $view->with([
            'roles' => Role::orderBy('name', 'asc')->get(),
        ]);
    }
}