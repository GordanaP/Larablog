<?php

namespace App\Http\Controllers\Tag;

use App\Tag;
use App\Facades\RedirectTo;
use App\Http\Requests\TagRequest;
use App\Repositories\TagRepository;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * The repository implementation.
     *
     * @var \App\Contracts\TagRepository
     */
    private $tags;

    /**
     * Create a new controller instance.
     *
     * @param \App\Contracts\TagRepository $tags
     */
    public function __construct(TagRepository $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with([
            'tags_count' => Tag::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $tag = Tag::create($request->validated());

        return RedirectTo::route('tags', $tag);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TagRequest  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return RedirectTo::route('tags', $tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\TagRequest  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(TagRequest $request, Tag $tag = null)
    {
        $this->tags->remove($tag ?? $request->validated()['ids']);

        return RedirectTo::route('tags');
    }
}
