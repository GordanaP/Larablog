<?php

namespace App\Services\ManageModel;

use App\Tag;
use App\Services\ManageModel\Delete;

class TagManager extends Delete
{
    public function __construct($data)
    {
        parent::__construct($data);

        $this->model = Tag::class;
    }
}
