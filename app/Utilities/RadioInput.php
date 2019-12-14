<?php

namespace App\Utilities;

class RadioInput
{
    /**
     * The radio input name.
     *
     * @var string
     */
    public $name;

    /**
     * The radio input values.
     *
     * @var array
     */
    public $inputs = [];

    /**
     * Get all radio inputs.
     *
     * @return array
     */
    public function all()
    {
        return $this->inputs;
    }

    /**
     * Get the radio buttons' values.
     *
     * @return array
     */
    public function values()
    {
        return array_values($this->all());
    }

    /**
     * Get the radio button key for a specific value.
     *
     * @param  string $value
     * @return string
     */
    public function key($value)
    {
        return array_search($value, $this->all());
    }
}