<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;

class UserCommentAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return CommentResource::collection($user->comments);
    }
}
