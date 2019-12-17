<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;
use Laravelista\Comments\Comment;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;

class CommentAjaxController extends Controller
{
    public function index()
    {
        return CommentResource::collection(Comment::all());
    }
}
