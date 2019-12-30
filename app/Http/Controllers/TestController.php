<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Filters\ArticleFilters;
use App\Contracts\EloquentModelRepository;

class TestController extends Controller
{
    private $repo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EloquentModelRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ArticleFilters $filters)
    {
        return $this->repo->published($filters);
    }
}
