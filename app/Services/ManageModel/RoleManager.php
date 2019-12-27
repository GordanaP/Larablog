<?php

namespace App\Services\ManageModel;

use App\Role;
use App\Contracts\ModelManager;
use Illuminate\Support\Facades\Request;
use App\Services\ManageModel\DeleteModel;

class RoleManager extends DeleteModel implements ModelManager
{
    public function __construct()
    {
        $this->model = Role::class;
    }

    public function save($data)
    {
        $model = $this->model()->fill($data);

        $model->save();

        return $model;
    }

    private function model()
    {
        return Request::route('role') ?? new $this->model;
    }
}
