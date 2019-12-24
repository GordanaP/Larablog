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
    /**
     * The article.
     *
     * @var \App\Article
     */
    private $article;

    /**
     * The article's author.
     *
     * @var \App\User
     */
    private $author;

    /**
     * Tags.
     *
     * @var array
     */
    private $tags = [];

    /**
     * The image.
     *
     * @var string
     */
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

    /**
     * Save the article's relationships.
     *
     * @return \App\Article
     */
    public function save()
    {
        $article = $this->fromForm($this->data);

        $article->addTags($this->tags);

        ArticleImage::manage($article, $this->image);

        return $article;
    }

    /**
     * Save the article.
     *
     * @param  array $data
     * @return \App\Article
     */
    private function fromForm($data)
    {
        return $this->article->fill($this->filtered($data))
            ->assignAuthor($this->author);
    }

    /**
     * Filter the empty values.
     *
     * @param  array $data
     * @return array
     */
    private function filtered($data)
    {
        return collect($data)->reject(function($value){
            return $value == null;
        })->toArray();
    }
}
