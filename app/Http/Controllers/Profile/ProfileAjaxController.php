<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Contracts\EloquentModelRepository;

class ProfileAjaxController extends Controller
{
    /**
     * The repository implementation.
     *
     * @var \App\Contracts\EloquentModelRepository
     */
    private $profiles;

    /**
     * Create a new controller instance.
     *
     * @param \App\Contracts\EloquentModelRepository $profiles
     */
    public function __construct(EloquentModelRepository $profiles)
    {
        $this->profiles = $profiles;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProfileResource::collection($this->profiles->all());
    }
}
