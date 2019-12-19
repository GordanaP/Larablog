<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Utilities\CommenterType;

class CommenterTypeComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     */
    public function compose(View $view)
    {
        $view->with([
            'commenter_radio_name' => CommenterType::get()->name,
            'commenter_radio_inputs' => CommenterType::get()->all(),
            'commenter_radio_values' => CommenterType::get()->values(),
            'commenter_radio_ids' => collect(CommenterType::get()->values())
                ->map(function($value){
                    return Str::camel($value);
                })
        ]);
    }
}