<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Profile;
use Illuminate\Http\Request;

class ProfileArticleController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function create(Profile $profile)
    {
        return view('articles.create', compact('profile'));
    }
}
