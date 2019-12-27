<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Facades\RedirectTo;
use App\Contracts\ModelManager;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Services\ManageUrl\Redirect;
// use App\Services\ManageModel\UserManager;

class UserController extends Controller
{
    private $modelManager;

    public function __construct(ModelManager $modelManager)
    {
        $this->modelManager = $modelManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_count = User::count();

        return view('users.index', compact('users_count'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // $user = UserManager::get($request->validated())->save();
        $user = $this->modelManager->save($request->validated());

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
        // UserManager::get($request->validated())->save();
        $this->modelManager->save($request->validated());

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
        // UserManager::get($user ?? $request->validated()['ids'])->remove();

        $user = $this->modelManager->remove($user ?? $request->validated()['ids']);

        return RedirectTo::route('users');
    }
}
