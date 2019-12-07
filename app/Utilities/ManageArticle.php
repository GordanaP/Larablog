<?php

namespace App\Utilities;

use App\User;
use App\Article;
use Illuminate\Support\Str;
use App\Utilities\ManageDelete;
use Illuminate\Support\Facades\Request;

class ManageArticle extends ManageDelete
{
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
        $this->model = 'App\Article';
        $this->article  = Request::route('article') ?? request('ids');
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
        tap($this->article)->update($data)
            ->addTags($this->tags);
    }

    /**
     * Delete the article.
     */
    public function delete()
    {
        $this->setModel($this->model)
            ->setInstance($this->article)
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
        return (new Article)->fill($data)
            ->assignAuthor($this->author);
    }
}
