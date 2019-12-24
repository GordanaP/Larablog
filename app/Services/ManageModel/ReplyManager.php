<?php

namespace App\Services\ManageModel;

use Laravelista\Comments\Comment;
use App\Services\ManageModel\Delete;
use Illuminate\Support\Facades\Request;

class ReplyManager extends Delete
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
    public function __construct($data)
    {
        parent::__construct($data);

        $this->model = Comment::class;
        $this->reply = Request::isMethod('POST') ? new $this->model : Request::route('comment') ;
        $this->comment = Request::route('comment') ;
        $this->commenter_type  = 'App\User';
        $this->commentable_type  = 'App\Article';
    }

    /**
     * Save the reply.
     *
     * @return \Laravelista\Comments\Comment
     */
    public function save()
    {
        $this->reply->fill($this->data)
            ->commenter()->associate($this->replier($this->data))
            ->commentable()->associate($this->comment->commentable)
            ->parent()->associate($this->comment)
            ->save();

        return $this->reply;
    }

    /**
     * The replier.
     *
     * @param  array $data
     * @return array
     */
    private function replier($data)
    {
        return $this->commenter_type::findOrFail($data['commenter_id']);
    }
}
