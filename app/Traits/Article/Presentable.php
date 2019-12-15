<?php

namespace App\Traits\Article;

trait Presentable
{
    /**
     * The is published article's attribute.
     *
     * @return boolean
     */
    public function getIsPublishedAttribute()
    {
        return $this->is_approved && optional($this->publish_at)->isPast();
    }

    /**
     * The is future article's attribute.
     *
     * @return boolean
     */
    public function getIsFutureAttribute()
    {
        return $this->is_approved && optional($this->publish_at)->isFuture();
    }

    /**
     * The is draft article's attribute.
     *
     * @return boolean
     */
    public function getIsDraftAttribute()
    {
        return ! $this->is_approved;
    }
}
