<?php

namespace App\Repositories;

use App\Category;
use App\Services\ManageModel\DeleteModel;

class CategoryRepository extends DeleteModel
{
    /**
     * Create a new repository instance.
     */
    public function __construct()
    {
        $this->model = Category::class;
    }
}
