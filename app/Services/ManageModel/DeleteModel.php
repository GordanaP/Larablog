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
     * The records' count.
     *
     * @return int
     */
    public function count()
    {
        return $this->model::count();
    }

    /**
     * Delete one record or many records.
     *
     * @param  mixed $data
     *
     */
    public function remove($data)
    {
        is_array($data) ? $this->deleteMany($data)
            : $data->delete();
    }

    /**
     * Delete multiple records.
     *
     * @param  array $data
     */
    private function deleteMany($data)
    {
        $this->model::findMany($data)->map->delete();
    }
}
