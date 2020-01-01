<?php

namespace App\Repositories;

use App\User;
use App\Article;
use Laravelista\Comments\Comment;
use Illuminate\Support\Facades\Request;
use App\Services\ManageModel\DeleteModel;
use App\Contracts\EloquentModelRepository;

class CommentRepository extends DeleteModel implements EloquentModelRepository
{
    /**
     * The commented article.
     *
     * @var \App\Article
     */
    private $article;

    /**
     * The registered commenter.
     *
     * @var \App\User
     */
    private $user;

    /**
     * The guest commenter.
     *
     * @var boolean
     */
    private $guest;

    public function __construct()
    {
        $this->model = Comment::class;
        $this->article  = Article::find(request('commentable_id'));
        $this->user  = User::find(request('user') ?? request('commenter_id'));
        $this->guest  = request('user') == 'guest';
    }

    /**
     * All comments.
     *
     * @return Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->model::with('commenter', 'commentable')->get();
    }

    /**
     * Create a comment.
     *
     * @param  array  $data
     * @return \App\Comment
     */
    public function create(array $data)
    {
        if ($this->guest) {
            $comment = $this->fromForm($data);
        } else {
            $comment = $this->userComment($data);
        }

        $comment->save();

        return $comment;
    }

    /**
     * Update the comment.
     *
     * @param  \App\Comment $comment
     * @param  array  $data
     * @return \App\Comment
     */
    public function update($comment, array $data)
    {
        return $comment->update($data);
    }

    /**
     * The registered user's comment.
     *
     * @param  array $data
     * @return \App\Comment
     */
    private function userComment(array $data)
    {
        return $this->fromForm($data)
            ->commenter()
            ->associate($this->user);
    }

    /**
     * The new comment.
     *
     * @param  array $data
     * @return \App\Comment
     */
    private function fromForm(array $data)
    {
        return (new $this->model)->fill($data)
            ->commentable()
            ->associate($this->article);
    }
}
