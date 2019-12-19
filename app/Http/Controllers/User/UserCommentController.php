<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;

class UserCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('comments.create', compact('user'));
    }
}
