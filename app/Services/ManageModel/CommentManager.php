<?php

namespace App\Services\ManageModel;

use App\User;
use Laravelista\Comments\Comment as Comment;
use App\Services\ManageModel\Delete;
use Illuminate\Support\Facades\Request;

class CommentManager extends Delete
{
    private $comment;
    private $user;

    public function __construct($data)
    {
        parent::__construct($data);

        $this->model = Comment::class;
        $this->comment = Request::isMethod('POST') ? new $this->model : Request::route('comment') ;
        $this->user  = Request::route('user') ?? User::find(request('commenter_id'));

    }

    public function save()
    {
        $this->comment->commenter_type = 'App\User';
        $this->comment->commenter_id = $this->data['commenter_id'];
        $this->comment->commentable_type = 'App\Article';
        $this->comment->commentable_id = $this->data['commentable_id'];
        $this->comment->comment = $this->data['comment'];
        $this->comment->save();

        return $this->comment;
    }

    private function fromForm($data)
    {
        //
    }
}
