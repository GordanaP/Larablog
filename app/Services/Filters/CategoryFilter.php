<?php

namespace App\Services\Filters;

use App\Services\Filters\Filter;

class CategoryFilter extends Filter
{
    /**
     * @inheritDocs
     */
    protected $name = 'category';

    /**
     * @inheritDocs
     */
    protected function apply()
    {
        return $this->builder->whereHas('category', function($query) {
            $query->where('name', request($this->name));
        });
    }
}