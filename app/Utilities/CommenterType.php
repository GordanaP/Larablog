<?php

namespace App\Utilities;

use App\Utilities\RadioInput;

class CommenterType extends RadioInput
{
    /**
     * { @inheritDocs }
     */
    public $name = 'commenter_type';

    /**
     * { @inheritDocs }
     */
    public $inputs = [
        'Registered user' => 'registered',
        'Guest' => 'guest',
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