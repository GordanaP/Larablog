<?php

namespace App\Services\ManageModel;

use App\Contracts\ModelManager;
use Laravelista\Comments\Comment;
use Illuminate\Support\Facades\Request;
use App\Services\ManageModel\DeleteModel;

class ReplyManager extends DeleteModel implements ModelManager
{
    /**
     * The reply.
     *
     * @var \Laravelista\Comments\Comment
     */
    private $reply;

    /**
     * The comment.
     *
     * @var \Laravelista\Comments\Comment
     */
    private $comment;

    /**
     * The commenter type.
     *
     * @var string
     */
    private $commenter_type;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->model = Comment::class;
        $this->commenter_type  = 'App\User';
    }

    /**
     * Save the reply.
     *
     * @return \Laravelista\Comments\Comment
     */
    public function save($data)
    {
        $reply = $this->reply()->fill($data)
            ->commenter()->associate($this->replier($data))
            ->commentable()->associate($this->comment()->commentable)
            ->parent()->associate($this->comment());

        $reply->save();

        return $reply;
    }

    /**
     * The replier.
     *
     * @param  array $data
     * @return \App\User
     */
    private function replier($data)
    {
        return $this->commenter_type::findOrFail($data['commenter_id']);
    }

    private function reply()
    {
        return new $this->model;
    }

    private function comment()
    {
        return Request::route('comment');
    }
}
