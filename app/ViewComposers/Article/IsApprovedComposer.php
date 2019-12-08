<?php

namespace App\ViewComposers\Article;

use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Utilities\IsApproved;

class IsApprovedComposer
{
    public function compose(View $view)
    {
        $view->with([
            'approval_radio_name' => IsApproved::get()->name,
            'approval_radio_inputs' => IsApproved::get()->all(),
            'approval_radio_ids' => collect(IsApproved::get()->values())
                ->map(function($value){
                    return Str::camel($value);
                })
        ]);
    }
}