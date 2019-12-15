<?php

namespace App\Services\ManageModel;

use App\User;
use App\Article;
use Illuminate\Support\Str;
use App\Facades\ArticleImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Services\ManageModel\Delete;

class ArticleManager extends Delete
{
    private $article;
    private $author;
    private $tags = [];
    private $image;

    public function __construct($data)
    {
        parent::__construct($data);

        $this->model = Article::class;
        $this->article = Request::isMethod('POST') ? new $this->model : Request::route('article') ;
        $this->author  = Request::route('user') ?? User::find(request('user_id'));
        $this->tags = request('tag_id');
        $this->image = request('image');
    }

    public function save()
    {
        $article = $this->fromForm($this->data);

        $article->addTags($this->tags);

        ArticleImage::manage($article, $this->image);

        return $article;
    }

    private function fromForm($data)
    {
        return $this->article->fill($this->filtered($data))
            ->assignAuthor($this->author);
    }

    private function filtered($data)
    {
        return collect($data)->reject(function($value){
            return $value == null;
        })->toArray();
    }
}
