<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ProfileImage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ProfileImage';
    }
}