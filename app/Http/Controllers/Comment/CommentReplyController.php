<?php

namespace App\Http\Controllers\Comment;

use App\Facades\RedirectTo;
use Laravelista\Comments\Comment;
use App\Http\Requests\ReplyRequest;
use App\Http\Controllers\Controller;
use App\Repositories\ReplyRepository;

class CommentReplyController extends Controller
{
    /**
     * The repository implementation
     *
     * @var \App\Repositories\ReplyRepository
     */
    private $replies;

    /**
     * Create a new controller instance.
     *
     * @param \App\Repositories\ReplyRepository $replies
     */
    public function __construct(ReplyRepository $replies)
    {
        $this->replies = $replies;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Laravelista\Comments\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function create(Comment $comment)
    {
        return view('replies.create', compact('comment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ReplyRequest  $request
     * @param \Laravelista\Comments\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function store(ReplyRequest $request, Comment $comment)
    {
        $comment = $this->replies->create($request->validated());

        return RedirectTo::route('comments', $comment);
    }
}
