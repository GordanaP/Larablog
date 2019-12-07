<?php

namespace App\Traits\Article;

trait Presentable
{
    public function getIsPublishedAttribute()
    {
        return $this->is_approved && optional($this->publish_at)->isPast();
    }

    public function getIsFutureAttribute()
    {
        return $this->is_approved && optional($this->publish_at)->isFuture();
    }

    public function getIsDraftAttribute()
    {
        return ! $this->is_approved;
    }

    public function getStatus()
    {
        if ($this->is_published) {
            $status['name'] = 'Published';
            $status['icon'] = 'fas fa-calendar-check';
            $status['color'] = '#4fd1c5';
        } elseif($this->is_future) {
            $status['name'] = 'Future';
            $status['icon'] = 'fas fa-calendar-day';
            $status['color'] = '#f6ad55';
        } elseif ($this->is_draft) {
            $status['name'] = 'Draft';
            $status['icon'] = 'far fa-file-alt';
            $status['color'] = '#a0aec0';
        }

        return $status;
    }
}
