<?php

namespace App\Services\Filters;

use App\Services\Filters\Filter;

class TagFilter extends Filter
{
    /**
     * @inheritDocs
     */
    protected $name = 'tag';

    /**
     * @inheritDocs
     */
    protected function apply()
    {
        return $this->builder->whereHas('tags', function($query) {
            $query->where('name', request($this->name));
        });
    }
}