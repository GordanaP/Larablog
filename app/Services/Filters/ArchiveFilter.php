<?php

namespace App\Services\Filters;

use App\Services\Filters\Filter;

class ArchiveFilter extends Filter
{
    /**
     * @inheritDocs
     */
    protected $name = 'archive';

    /**
     * @inheritDocs
     */
    protected function apply()
    {
        $filters = ['this_month', 'last_month', 'older'];

        if (in_array(request($this->name), $filters)) {
            if(request($this->name) == 'this_month') {
                return $this->builder->whereBetween('publish_at', [
                    today()->subDays(30), today()
                ]);
            }

            if(request($this->name) == 'last_month') {
                return $this->builder->whereBetween('publish_at', [
                    today()->subDays(60), today()->subDays(30)
                ]);
            }

            if(request($this->name) == 'older') {
                return $this->builder->where('publish_at', '<', today()->subDays(60));
            }
        }

        return $this->builder;
    }
}
