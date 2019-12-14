<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use App\Facades\SubmitForm;
use Illuminate\Support\Str;
use App\Utilities\GeneratePassword;

class GeneratePasswordComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     */
    public function compose(View $view)
    {
        $view->with([
            'password_radio_name' => GeneratePassword::get()->name,
            'password_radio_inputs' => GeneratePassword::get()->all(),
            'password_radio_ids' => collect(GeneratePassword::get()->values())
                ->map(function($value){
                    return Str::camel($value);
                })
        ]);
    }
}