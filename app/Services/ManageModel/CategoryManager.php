<?php

namespace App\Services\ManageModel;

use App\Category;
use App\Services\ManageModel\Delete;

class CategoryManager extends Delete
{
    public function __construct($data)
    {
        parent::__construct($data);

        $this->model = Category::class;
    }
}
