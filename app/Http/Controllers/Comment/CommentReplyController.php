<?php

namespace App\Http\Controllers\Comment;

use App\Facades\RedirectTo;
use Laravelista\Comments\Comment;
use App\Http\Requests\ReplyRequest;
use App\Http\Controllers\Controller;
use App\Services\ManageModel\ReplyManager;

class CommentReplyController extends Controller
{
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
     * @param  \App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReplyRequest $request, Comment $comment)
    {
        $comment = ReplyManager::get($request->validated())->save();

        return RedirectTo::route('comments', $comment);
    }
}
