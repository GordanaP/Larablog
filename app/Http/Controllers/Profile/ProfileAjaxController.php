<?php

namespace App\Http\Controllers\Profile;

use App\Profile;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;

class ProfileAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProfileResource::collection(Profile::all());
    }
}
