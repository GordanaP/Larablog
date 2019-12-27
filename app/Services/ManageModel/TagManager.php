<?php

namespace App\Services\ManageModel;

use App\Tag;
use App\Contracts\ModelManager;
use Illuminate\Support\Facades\Request;
use App\Services\ManageModel\DeleteModel;

class TagManager extends DeleteModel implements ModelManager
{
    public function __construct()
    {
        $this->model = Tag::class;
    }

    public function save($data)
    {
        $tag = $this->tag()->fill($data);

        $tag->save();

        return $tag;
    }

    private function tag()
    {
        return Request::route('tag') ?? new $this->model;
    }
}
