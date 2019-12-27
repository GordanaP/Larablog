<?php

namespace App\Http\Controllers\Profile;

use App\Profile;
use App\Facades\RedirectTo;
use App\Contracts\ModelManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Services\ManageModel\ProfileManager;

class ProfileController extends Controller
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
        $profiles_count = Profile::count();

        return view('profiles.index', compact('profiles_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        // $profile = ProfileManager::get($request->validated())->save();
        //
        $profile = $this->modelManager->save($request->validated());

        return RedirectTo::route('profiles', $profile);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        // ProfileManager::get($request->validated())->save();
        //
        $this->modelManager->save($request->validated());

        return RedirectTo::route('profiles', $profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @param  \App\Profile|null $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileRequest $request, Profile $profile = null)
    {
        // ProfileManager::get($request->validated()['ids'])->remove();
        //
        $this->modelManager->remove($profile ?? $request->validated()['ids']);

        return RedirectTo::route('profiles');
    }
}
