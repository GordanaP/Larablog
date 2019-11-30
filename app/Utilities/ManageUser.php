<?php

namespace App\Utilities;

use App\Utilities\ManageDelete;

class ManageUser extends ManageDelete
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
     * @var \App\User
     */
    private $user;

    /**
     * Create a class instance.
     */
    public function __construct()
    {
        $this->model = 'App\User';
        $this->user = request()->route('user') ?? request('ids');
    }

    /**
     * Delete the user.
     */
    public function delete()
    {
        $this->setModel($this->model)
            ->setInstance($this->user)
            ->destroy();
    }
}
