<?php

namespace App\Services\ManageImage;

use App\Contracts\ModelImage;
use App\Services\ManageImage\Image;

class ProfileImage extends Image implements ModelImage
{
    public function manage($profile, $data)
    {
        $this->setDisk('profiles')
            ->setRelationship($profile->avatar())
            ->handle($profile->avatar, $data);
    }
}
