<?php

namespace App\Utilities;

use App\Utilities\ManageDelete;
use Illuminate\Support\Facades\Request;

class ManageCategory extends ManageDelete
{
    /**
     * Create a class instance.
     */
    public function __construct()
    {
        $this->model = 'App\Category';
        $this->category = Request::route('category') ?? request('ids');
    }

    /**
     * Delete the category.
     */
    public function delete()
    {
        $this->setModel($this->model)
            ->setInstance($this->category)
            ->remove();
    }
}
