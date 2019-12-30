<?php

namespace App\Repositories;

use App\Tag;
use App\Services\ManageModel\DeleteModel;

class TagRepository extends DeleteModel
{
    /**
     * Create a new repository instance.
     */
    public function __construct()
    {
        $this->model = Tag::class;
    }
}
