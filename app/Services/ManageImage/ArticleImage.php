<?php

namespace App\Services\ManageImage;

use App\Contracts\ImageManager;
use App\Services\ManageImage\AbstractImage;

class ArticleImage extends AbstractImage implements ImageManager
{
    public function manage($article, $data)
    {
        $this->setDisk('articles')
            ->setRelationship($article->image())
            ->handle($article->image, $data);
    }
}
