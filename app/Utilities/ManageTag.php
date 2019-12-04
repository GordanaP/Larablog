<?php

namespace App\Utilities;

use App\Utilities\ManageDelete;
use Illuminate\Support\Facades\Request;

class ManageTag extends ManageDelete
{
    /**
     * Create a class instance.
     */
    public function __construct()
    {
        $this->model = 'App\Tag';
        $this->tag = Request::route('tag') ?? request('ids');
    }

    /**
     * Delete the tag.
     */
    public function delete()
    {
        $this->setModel($this->model)
            ->setInstance($this->tag)
            ->remove();
    }
}
