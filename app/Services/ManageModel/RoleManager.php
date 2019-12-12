<?php

namespace App\Services\ManageModel;

use App\Role;
use App\Services\ManageModel\Delete;

class RoleManager extends Delete
{
    public function __construct($data)
    {
        parent::__construct($data);

        $this->model = Role::class;
    }
}
