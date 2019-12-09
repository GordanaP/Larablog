<?php

namespace App\ViewComposers;

use App\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Request;

class AuthorsWithoutProfileComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     */
    public function compose(View $view)
    {
        $view->with([
            'authors_without_profile' => ! ($profile = Request::route('profile'))
                ? User::authorsWithoutProfile()->get()
                : User::authorsWithoutProfile()->get()->prepend($profile->user),
        ]);
    }
}