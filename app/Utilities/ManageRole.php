<?php

namespace App\Utilities;

use App\Utilities\ManageDelete;
use Illuminate\Support\Facades\Request;

class ManageRole extends ManageDelete
{
    /**
     * Create a class instance.
     */
    public function __construct()
    {
        $this->model = 'App\Role';
        $this->role = Request::route('role') ?? request('ids');
    }

    public static function get()
    {
        return new static;
    }

    /**
     * Delete the role.
     */
    public function delete()
    {
        $this->setModel($this->model)
            ->setInstance($this->role)
            ->remove();
    }
}
