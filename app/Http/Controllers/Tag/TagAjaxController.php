<?php

namespace App\Http\Controllers\Tag;

use App\Tag;
use App\Http\Resources\TagResource;
use App\Http\Controllers\Controller;

class TagAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TagResource::collection(Tag::all());
    }
}
