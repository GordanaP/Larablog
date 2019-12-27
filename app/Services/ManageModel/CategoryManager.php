<?php

namespace App\Services\ManageModel;

use App\Category;
use App\Contracts\ModelManager;
use Illuminate\Support\Facades\Request;
use App\Services\ManageModel\DeleteModel;

class CategoryManager extends DeleteModel implements ModelManager
{
    public function __construct()
    {
        $this->model = Category::class;
    }

    public function save($data)
    {
        $category = $this->category()->fill($data);

        $category->save();

        return $category;
    }

    private function category()
    {
        return Request::route('category') ?? new $this->model;
    }
}
