<?php

namespace App\Services\ManageImage;

use App\Services\ManageImage\Image;

class ArticleImage extends Image
{
    public function manage($article, $data)
    {
        $this->setDisk('articles')
            ->setRelationship($article->image())
            ->handle($article->image, $data);
    }
}
