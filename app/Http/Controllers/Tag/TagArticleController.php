<?php

namespace App\Http\Controllers\Tag;

use App\Tag;
use App\Http\Controllers\Controller;

class TagArticleController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function create(Tag $tag)
    {
        return view('articles.create', compact('tag'));
    }
}
