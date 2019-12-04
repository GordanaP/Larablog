<?php

namespace App\Utilities;

abstract class ManageDelete
{
    /**
     * The model name.
     *
     * @var string
     */
    private $model;

    /**
     * The model instance.
     *
     * @var \App\Model
     */
    private $instance;

    /**
     * Delete a specific model's record'
     */
    protected abstract function delete();

    /**
     * Delete the record.
     */
    final function remove()
    {
        is_array($this->instance) ? $this->deleteMany($this->instance)
            : $this->instance->delete();
    }

    /**
     * Get the new instance of the class.
     *
     * @return \App\Model
     */
    public static function get()
    {
        return new static;
    }

    /**
     * Set the model name.
     *
     * @param string $model
     * @return self;
     */
    protected function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Set the model instance.
     *
     * @param \App\Model $instance
     * @return self;
     */
    protected function setInstance($instance)
    {
        $this->instance = $instance;

        return $this;
    }

    /**
     * Delete multiple records.
     *
     * @param  \App\Model $instance
     */
    private function deleteMany($instance)
    {
        $this->model::findMany($instance)->map->delete();
    }
}
