<?php

namespace App\ViewComposers\Article;

use Illuminate\View\View;
use App\Utilities\ArticleApprovalStatus;

class ApprovalStatusesComposer
{
    public function compose(View $view)
    {
        $view->with([
            'approval_radio' => ArticleApprovalStatus::get()->radio_name,
            'approval_statuses' => ArticleApprovalStatus::get()->all(),
        ]);
    }
}