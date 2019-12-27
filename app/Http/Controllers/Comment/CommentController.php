<?php

namespace App\Http\Controllers\Comment;

use App\Facades\RedirectTo;
use App\Contracts\ModelManager;
use Laravelista\Comments\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
// use App\Services\ManageModel\CommentManager;

class CommentController extends Controller
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
        // $comment = CommentManager::get($request->validated())->save();

        $comment = $this->modelManager->save($request->validated());

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
        // CommentManager::get($request->validated())->save();

        $this->modelManager->save($request->validated());

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
        // CommentManager::get($comment ?? $request->validated()['ids'])->remove();
        //
        $this->modelManager->remove($comment ?? $request->validated()['ids']);

        return RedirectTo::route('comments');
    }
}
