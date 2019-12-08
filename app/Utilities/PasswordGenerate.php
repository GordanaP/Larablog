<?php

namespace App\Utilities;

use App\Utilities\RadioInput;

class PasswordGenerate extends RadioInput
{
    /**
     * { @inheritDocs }
     */
    public $name = 'generate_password';

    /**
     * { @inheritDocs }
     */
    public $inputs = [
        'Do not change' => 'do_not_change',
        'Auto password' => 'auto_generate',
        'Manual password' => 'manually_generate',
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