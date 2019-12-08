<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Utilities\PasswordGenerate;

class PasswordGenerateComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     */
    public function compose(View $view)
    {
        $view->with([
            'password_radio_name' => PasswordGenerate::get()->name,
            'password_radio_inputs' => PasswordGenerate::get()->all(),
            'password_radio_ids' => collect(PasswordGenerate::get()->values())
                ->map(function($value){
                    return Str::camel($value);
                })
        ]);
    }
}