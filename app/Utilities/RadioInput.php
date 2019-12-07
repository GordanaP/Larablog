<?php

namespace App\Utilities;

class RadioInput
{
    /**
     * The radio input values.
     *
     * @var array
     */
    public $radio_inputs = [];

    /**
     * The radio input name.
     *
     * @var string
     */
    public $radio_name;

    /**
     * Get all radio inputs.
     *
     * @return array
     */
    public function all()
    {
        return $this->radio_inputs;
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