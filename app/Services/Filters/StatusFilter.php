<?php

namespace App\Services\Filters;

use App\Services\Filters\Filter;

class StatusFilter extends Filter
{
    /**
     * @inheritDocs
     */
    protected $name = 'status';

    /**
     * @inheritDocs
     */
    protected function apply()
    {
        $filters = ['published', 'future', 'draft'];

        if (in_array(request($this->name), $filters)) {
            if(request($this->name) == 'published') {
                return $this->builder->where([
                    ['is_approved', 1],
                    ['publish_at', '<=', today()]
                ]);
            }

            if(request($this->name) == 'future') {
                return $this->builder->where([
                    ['is_approved', 1],
                    ['publish_at', '>', today()]
                ]);
            }

            if(request($this->name) == 'draft') {
                return $this->builder->where('is_approved', 0);
            }
        }
    }
}
