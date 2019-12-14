<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use App\Utilities\SubmitForm;

class SubmitFormComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     */
    public function compose(View $view)
    {
        $view->with([
            'button_name' => SubmitForm::get()->button_name,
            'create_buttons' => SubmitForm::get()->buttons()['create'],
            'edit_buttons' => SubmitForm::get()->buttons()['edit'],
        ]);
    }
}