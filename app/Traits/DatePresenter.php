<?php

namespace App\Traits;

use Carbon\Carbon;

trait DatePresenter
{
    /**
     * Get the formatted date of creation.
     *
     * @param  string $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d M Y');
    }

    /**
     * Get the formatted date of update.
     *
     * @param  string $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d M Y');
    }

    public function getPublishAtFormattedAttribute()
    {
        return optional($this->publish_at)->format('Y-m-d');
    }

    public function getPublishAtReadableAttribute()
    {
        return optional($this->publish_at)->diffForHumans();
    }

    public function getPublishAtFromDBAttribute()
    {
        return optional($this->publish_at)->format('d M Y') ?? 'n/a';
    }
}
