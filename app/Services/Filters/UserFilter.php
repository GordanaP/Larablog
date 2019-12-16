<?php

namespace App\Services\Filters;

use App\Services\Filters\Filter;

class UserFilter extends Filter
{
    /**
     * @inheritDocs
     */
    protected $name = 'user';

    /**
     * @inheritDocs
     */
    protected function apply()
    {
        return $this->builder->whereHas('user', function($query) {
            $query->where('name', request($this->name));
        });
    }
}
