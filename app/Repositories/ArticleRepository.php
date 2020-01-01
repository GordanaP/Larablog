<?php

namespace App\Repositories;

use App\User;
use App\Article;
use App\Contracts\ImageManager;
use Illuminate\Support\Facades\Request;
use App\Services\ManageModel\DeleteModel;
use App\Contracts\EloquentModelRepository;

class ArticleRepository extends DeleteModel implements EloquentModelRepository
{
    /**
     * The author.
     *
     * @var \App\Uer
     */
    private $author;

    /**
     * The tags.
     *
     * @var array
     */
    private $tags = [];

    /**
     * The image.
     *
     * @var \Illuminate\Http\File
     */
    private $image;

    /**
     * The image manager.
     *
     * @var App\Contracts\ImageManager
     */
    private $imageManager;

    /**
     * Create a new class instance.
     *
     * @param App\Contracts\ImageManager $imageManager
     */
    public function __construct(ImageManager $imageManager)
    {
        $this->model = Article::class;
        $this->author =  User::find(request('user_id'));
        $this->tags = request('tag_id');
        $this->image = request('image');
        $this->imageManager = $imageManager;
    }

    /**
     * All articles.
     *
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->model::with('comments','user')->get();
    }

    /**
     * Published articles.
     *
     * @param  App\Services\Filters\ArticleFilters $filters
     * @param  integer $perPage
     * @return Illuminate\Support\Collection
     */
    public function published($filters, $perPage = 5)
    {
        return $this->model::filter($filters)
            ->published()
            ->newest()
            ->paginate($perPage);
    }

    /**
     * Articles owned by a specific author.
     *
     * @param \App\User $user
     * @param  App\Services\Filters\ArticleFilters $filters
     * @param  integer $perPage
     * @return Illuminate\Support\Collection
     */
    public function ownedBy($user, $filters, $perPage = 5)
    {
        return $this->model::filter($filters)
            ->ownedBy($user)
            ->newest()
            ->paginate($perPage);
    }

    /**
     * Create an article.
     *
     * @param  array $data
     * @return \App\Article
     */
    public function create(array $data)
    {
        $article = $this->fromForm($data);

        $article->addTags($this->tags);

        $this->imageManager->manage($article, $this->image);

        return $article;
    }

    /**
     * Update the article.
     *
     * @param  \App\Article $article [description]
     * @param  array $data
     * @return \App\Article
     */
    public function update($article, array $data)
    {
        $article->update($data);

        $article->addTags($this->tags);

        $this->imageManager->manage($article, $this->image);

        return $article;
    }

    /**
     * Create an article from form.
     *
     * @param  array  $data
     * @param  \App\User $author
     * @return \App\Article
     */
    private function fromForm(array $data)
    {
        return $this->author->createArticle($this->filtered($data));
    }

    private function filtered(array$data)
    {
        return collect($data)->reject(function($value){
            return $value == null;
        })->toArray();
    }
}