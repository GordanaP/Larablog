<?php

namespace App\Services\ManageImage;

use App\Contracts\ModelImage;
use App\Services\ManageImage\Image;

class ArticleImage extends Image implements ModelImage
{
    public function manage($article, $data)
    {
        $this->setDisk('articles')
            ->setRelationship($article->image())
            ->handle($article->image, $data);
    }
}
