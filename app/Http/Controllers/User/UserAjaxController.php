<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }
}
