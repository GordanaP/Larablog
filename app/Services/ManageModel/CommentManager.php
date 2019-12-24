<?php

namespace App\Services\ManageModel;

use Laravelista\Comments\Comment;
use App\Services\ManageModel\Delete;
use Illuminate\Support\Facades\Request;

class CommentManager extends Delete
{
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
     * The guest.
     *
     * @var boolean
     */
    private $guest;

    /**
     * Create a new class instance.
     *
     * @param array $data
     */
    public function __construct($data)
    {
        parent::__construct($data);

        $this->model = Comment::class;
        $this->comment = Request::isMethod('POST') ? new $this->model : Request::route('comment') ;
        $this->commenter_type  = 'App\User';
        $this->commentable_type  = 'App\Article';
        $this->guest = ! Request::route('comment') ? request('user') == 'guest'
            : ! Request::route('comment')->commenter;
    }

    /**
     * Save the comment related to the user's type.
     *
     * @return \Laravelista\Comments\Comment
     */
    public function save()
    {
        if ($this->guest) {
            $this->comment = $this->fromForm($this->data);
        } else {
            $this->comment = $this->registeredComment($this->data);
        }

        $this->comment->save();

        return $this->comment;
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
        return $this->comment->fill($data)->commentable()
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
}
