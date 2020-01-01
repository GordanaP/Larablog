<?php

namespace App\Services\ManageModel;

abstract class DeleteModel
{
    /**
     * The model.
     *
     * @var \App\Model
     */
    protected $model;

    /**
     * Delete one record or many records.
     *
     * @param  mixed $data
     *
     */
    public function delete($data)
    {
        is_array($data) ? $this->removeMany($data)
            : $this->removeOne($data);
    }

    /**
     * Delete a single record.
     *
     * @param  \App\Model $model
     */
    private function removeOne($model)
    {
        method_exists($this->model, 'remove')
            ? $model->remove()
            : $model->delete();
    }

    /**
     * Delete multiple records.
     *
     * @param  array $data
     */
    private function removeMany($data)
    {
        method_exists($this->model, 'remove')
            ? $this->records($data)->map->remove()
            : $this->records($data)->map->delete();
    }

    /**
     * The records.
     *
     * @param  array $data
     * @return \Illuminate\Support\Cllection
     */
    private function records($data)
    {
        return $this->model::findMany($data);
    }
}
