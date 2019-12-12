<?php

namespace App\Utilities;

class Test
{
    protected $data;
    protected $food;
    protected $drink;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public static function get($data)
    {
        return new static($data);
    }
}