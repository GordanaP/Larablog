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
    final function destroy()
    {
        is_array($this->instance)
            ? $this->removeMany($this->instance)
            : $this->instance->remove();
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
     * Set the model's instance.
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
     * Remove multiple records.
     *
     * @param  \App\Model $instance
     */
    private function removeMany($instance)
    {
        $this->model::findMany($instance)->map->remove();
    }
}
