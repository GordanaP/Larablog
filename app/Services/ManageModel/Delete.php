<?php

namespace App\Services\ManageModel;

use Illuminate\Support\Facades\Request;

abstract class Delete
{
    /**
     * The model instance or a request array
     *
     * @var mixed
     */
    protected $data;

    /**
     * The model.
     *
     * @var \App\Model
     */
    protected $model;

    /**
     * Create a new clas instance.
     *
     * @param mixed $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the class instance.
     *
     * @param  mixed $data
     * @return self
     */
    public static function get($data)
    {
        return new static($data);
    }

    /**
     * Delete one record or many records.
     */
    public function remove()
    {
        is_array($this->data) ? $this->deleteMany($this->data)
            : $this->data->delete();
    }

    /**
     * Delete multiple records.
     *
     * @param  mixed $data
     */
    private function deleteMany($data)
    {
        $this->model::findMany($data)->map->delete();
    }
}
