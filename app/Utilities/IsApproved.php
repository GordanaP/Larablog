<?php

namespace App\Utilities;

use App\Utilities\RadioInput;

class IsApproved extends RadioInput
{
    /**
     * { @inheritDocs }
     */
    public $name = 'is_approved';

    /**
     * { @inheritDocs }
     */
    public $inputs = [
        'yes' => 1,
        'no' => 0,
    ];

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