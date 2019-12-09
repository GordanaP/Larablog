<?php

namespace App\Utilities;

use App\User;
use App\Article;
use Illuminate\Support\Str;
use App\Utilities\ManageDelete;
use Illuminate\Support\Facades\Request;

class ManageArticle extends ManageDelete
{
    private $article;

    /**
     * The author.
     *
     * @var [type]
     */
    private $author;

    /**
     * The tags.
     *
     * @var array
     */
    private $tags = [];

    /**
     * Create the class instance.
     */
    public function __construct()
    {
        $this->model = Article::class;
        $this->instance  = Request::route('article') ?? request('ids');
        $this->article = Request::isMethod('POST') ? new $this->model : $this->instance;
        $this->author  = Request::route('user') ?? User::find(request('user_id'));
        $this->tags = request('tag_id');
    }

    /**
     * Create the article;
     *
     * @param  array $data
     */
    public function create($data)
    {
        $article = $this->fromForm($data);

        $article->addTags($this->tags);

        return $article;

    }

    /**
     * Update the article.
     *
     * @param  array $data
     */
    public function update($data)
    {
        $article = $this->fromForm($data);

        $article->addTags($this->tags);
    }

    /**
     * Delete the article.
     */
    public function delete()
    {
        $this->setModel($this->model)
            ->setInstance($this->instance)
            ->remove();
    }

    /**
     * Create the article from the form.
     *
     * @param  array $data
     * @return \App\Article
     */
    private function fromForm($data)
    {
        return $this->article->fill($data)->assignAuthor($this->author);
        // return ($this->model)->fill($this->filtered($data))
        //     ->assignAuthor($this->author);
    }

    /**
     * Remove empty values.
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
