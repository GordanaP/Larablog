<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Contracts\EloquentModelRepository;

class CommentAjaxController extends Controller
{
    /**
     * The repository implementation.
     *
     * @var App\Contracts\EloquentModelRepository
     */
    private $comments;

    /**
     * Create a new controller instance.
     *
     * @param \App\Contracts\EloquentModelRepository $comments
     */
    public function __construct(EloquentModelRepository $comments)
    {
        $this->comments = $comments;
    }

    public function index()
    {
        return CommentResource::collection($this->comments->all());
    }
}
