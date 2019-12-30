<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Contracts\EloquentModelRepository;

class UserAjaxController extends Controller
{
    /**
     * The repository implementation.
     *
     * @var App\Contracts\EloquentModelRepository
     */
    private $users;

    /**
     * Create a new controller instance.
     *
     * @param \App\Contracts\EloquentModelRepository $users
     */
    public function __construct(EloquentModelRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection($this->users->all());
    }
}
