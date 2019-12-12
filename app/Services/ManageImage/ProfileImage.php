<?php

namespace App\Services\ManageImage;

use App\Services\ManageImage\Image;

class ProfileImage extends Image
{
    public function manage($profile, $data)
    {
        $this->setDisk('profiles')
            ->setRelationship($profile->avatar())
            ->handle($profile->avatar, $data);
    }
}
