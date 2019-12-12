<?php

namespace App\Utilities;

use App\Utilities\Test;

class ModelTest extends Test
{
    private $user;
    private $address;

    public function __construct($data)
    {
        parent::__construct($data);

        $this->food = 'bread';
        $this->drink = 'water';
        $this->user = 'Gordana';
        $this->address = 'Bulevar';
    }

    public function display()
    {
        return $this->data .' from '.$this->user .' '. $this->address
        .' '.$this->food .' '.$this->drink;
    }
}