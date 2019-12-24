<?php

namespace App\Http\Controllers\Comment;

use Laravelista\Comments\Comment;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;

class CommentReplyAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Comment $comment)
    {
        return CommentResource::collection($comment->children);
    }
}
