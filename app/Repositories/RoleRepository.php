<?php

namespace App\Repositories;

use App\Role;
use App\Services\ManageModel\DeleteModel;

class RoleRepository extends DeleteModel
{
    /**
     * Create a new repository instance.
     */
    public function __construct()
    {
        $this->model = Role::class;
    }
}
