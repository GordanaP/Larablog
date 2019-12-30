<?php

namespace App\Repositories;

use App\User;
use Laravelista\Comments\Comment;
use Illuminate\Support\Facades\Request;

class ReplyRepository
{
    /**
     * The replier
     *
     * @var \App\User
     */
    private $replier;

    /**
     * The comment.
     *
     * @var \Laravelista\Comments\Comment
     */
    private $comment;

    /**
     * Create a new repository instance.
     */
    public function __construct()
    {
        $this->replier  = User::find(request('commenter_id'));
        $this->comment  = Comment::find(Request::route('comment'));
    }

    /**
     * Create a reply.
     *
     * @param array $data
     * @return \Laravelista\Comments\Comment
     */
    public function create(array $data)
    {
        $reply = (new Comment)->fill($data)
            ->commenter()->associate($this->replier)
            ->commentable()->associate($this->comment->commentable)
            ->parent()->associate($this->comment);

        $reply->save();

        return $reply;
    }
}
