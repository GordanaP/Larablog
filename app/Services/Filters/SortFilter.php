<?php

namespace App\Services\Filters;

use App\Services\Filters\Filter;

class SortFilter extends Filter
{
    /**
     * @inheritDocs
     */
    protected $name = 'sort';

    /**
     * @inheritDocs
     */
    protected function apply()
    {
        $filters = ['latest', 'oldest'];

        if ( in_array(request($this->name), $filters)) {
            if(request($this->name) == 'latest') {
                return $this->builder->orderBy('publish_at', 'desc');
            }

            if(request($this->name) == 'oldest') {
                return $this->builder->orderBy('publish_at', 'asc');
            }
        }

        return $this->builder;
    }
}
