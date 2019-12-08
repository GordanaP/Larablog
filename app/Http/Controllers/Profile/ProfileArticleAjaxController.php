<?php

namespace App\Http\Controllers\Profile;

use App\Profile;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;

class ProfileArticleAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function index(Profile $profile)
    {
        return ArticleResource::collection($profile->user->articles);
    }
}
