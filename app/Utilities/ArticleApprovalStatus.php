<?php

namespace App\Utilities;

use App\Utilities\RadioInput;

class ArticleApprovalStatus extends RadioInput
{
    /**
     * { @inheritDocs }
     */
    public $radio_inputs = [
        'yes' => 1,
        'no' => 0,
    ];

    /**
     * { @inheritDocs }
     */
    public $radio_name = 'is_approved';

    /**
     * Get the new instance of the class.
     *
     * @return self
     */
    public static function get()
    {
        return new static;
    }
}