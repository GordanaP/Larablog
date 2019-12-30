<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Facades\RedirectTo;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentModelRepository;

class UserController extends Controller
{
    /**
     * The repository implementation.
     *
     * @var App\Contracts\EloquentModelRepository $users
     */
    private $users;

    /**
     * Create a new controller instance.
     *
     * @param \App\Contracts\EloquentModelRepository
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
        return view('users.index')->with([
            'users_count' => $this->users->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserReque  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = $this->users->create($request->validated());

        return RedirectTo::route('users', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $this->users->update($user, $request->validated());

        return RedirectTo::route('users', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User|null  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRequest $request, User $user = null)
    {
        $this->users->remove($user ?? $request->validated()['ids']);

        return RedirectTo::route('users');
    }
}
