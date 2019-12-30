<?php

namespace App\Services\ManageImage;

use App\Contracts\ImageManager;
use App\Services\ManageImage\AbstractImage;

class ProfileImage extends AbstractImage implements ImageManager
{
    public function manage($profile, $data)
    {
        $this->setDisk('profiles')
            ->setRelationship($profile->avatar())
            ->handle($profile->avatar, $data);
    }
}
