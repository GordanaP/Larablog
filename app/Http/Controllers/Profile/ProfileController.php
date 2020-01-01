<?php

namespace App\Http\Controllers\Profile;

use App\Profile;
use App\Facades\RedirectTo;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Contracts\EloquentModelRepository;

class ProfileController extends Controller
{
    /**
     * The repository implementation.
     *
     * @var App\Contracts\EloquentModelRepository
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
        return view('profiles.index')->with([
            'profiles_count' => Profile::count()
        ]);
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
        $profile = $this->profiles->create($request->validated());

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
        $this->profiles->update($profile, $request->validated());

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
        $this->profiles->delete($profile ?? $request->validated()['ids']);

        return RedirectTo::route('profiles');
    }
}
