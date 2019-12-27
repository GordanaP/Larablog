<?php

namespace App\Services\ManageModel;

use App\Contracts\ModelManager;
use Laravelista\Comments\Comment;
use Illuminate\Support\Facades\Request;
use App\Services\ManageModel\DeleteModel;

class CommentManager extends DeleteModel implements ModelManager
{
    /**
     * The commenter type.
     *
     * @var string
     */
    private $commenter_type;

    /**
     * The commentable type.
     *
     * @var string
     */
    private $commentable_type;

    /**
     * Create a new class instance.
     *
     * @param array $data
     */
    public function __construct()
    {
        $this->model = Comment::class;
        $this->commenter_type  = 'App\User';
        $this->commentable_type  = 'App\Article';
    }

    /**
     * Save the comment related to the user's type.
     *
     * @return \Laravelista\Comments\Comment
     */
    public function save($data)
    {
        if ($this->guest()) {
            $comment = $this->fromForm($data);
        } else {
            $comment = $this->registeredComment($data);
        }

        $comment->save();

        return $comment;
    }

    /**
     * The registered user's comment.
     *
     * @param  array $data
     * @return \Laravelista\Comments\Comment
     */
    private function registeredComment($data)
    {
        return $this->fromForm($data)->commenter()
            ->associate($this->commenter($data));
    }

    /**
     * The guest's comment.
     *
     * @param  array $data
     * @return \Laravelista\Comments\Comment
     */
    private function fromForm($data)
    {
        return $this->comment()->fill($data)->commentable()
            ->associate($this->article($data));
    }

    /**
     * The comentable article.
     *
     * @param  array $data
     * @return \App\Article
     */
    private function article($data)
    {
        return $this->commentable_type::findOrFail($data['commentable_id']);
    }

    /**
     * The registered commenter.
     *
     * @param  array $data
     * @return \App\User
     */
    private function commenter($data)
    {
        return $this->commenter_type::findOrFail($data['commenter_id']);
    }

    private function comment()
    {
        return Request::route('comment') ?? new $this->model;
    }

    private function guest()
    {
        return  ! Request::route('comment') ? request('user') == 'guest'
            : ! Request::route('comment')->commenter;
    }
}
