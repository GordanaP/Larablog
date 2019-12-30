<?php

namespace App\Http\Controllers\Comment;

use App\Facades\RedirectTo;
use Illuminate\Http\Request;
use Laravelista\Comments\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Contracts\EloquentModelRepository;

class CommentController extends Controller
{
    /**
     * The repository implementation.
     *
     * @var App\Contracts\EloquentModelRepository
     */
    private $comments;

    /**
     * Create a new controller instance.
     *
     * @param \App\Contracts\EloquentModelRepository $comments
     */
    public function __construct(EloquentModelRepository $comments)
    {
        $this->comments = $comments;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comments.index')->with([
            'comments_count' => Comment::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $comment = $this->comments->create($request->all());

        return RedirectTo::route('comments', $comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Laravelista\Comments\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Laravelista\Comments\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @param  \Laravelista\Comments\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $this->comments->update($comment, $request->validated());

        return RedirectTo::route('comments', $comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @param  \Laravelista\Comments\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentRequest $request, Comment $comment = null)
    {
        $this->comments->remove($comment ?? $request->validated()['ids']);

        return RedirectTo::route('comments');
    }
}
