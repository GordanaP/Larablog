<?php

namespace App\Utilities;

use App\Utilities\ManageDelete;

class ManageRole extends ManageDelete
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
     * @var \App\Role
     */
    private $role;

    /**
     * Create a class instance.
     */
    public function __construct()
    {
        $this->model = 'App\Role';
        $this->role = request()->route('role') ?? request('ids');
    }

    /**
     * Delete the role.
     */
    public function delete()
    {
        $this->setModel($this->model)
            ->setInstance($this->role)
            ->destroy();
    }
}
