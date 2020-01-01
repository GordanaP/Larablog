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
     * Delete (a) record(s).
     *
     * @param  mixed $data
     *
     */
    public function delete($data)
    {
        is_array($data) ? $this->model::destroy($data)
            : $data->delete();
    }
}
