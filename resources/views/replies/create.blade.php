@extends('layouts.admin')

@section('title', 'Create reply')

@section('content')
    @include('alerts._error')

    <div class="w-3/4 mx-auto">
        <h4 class="mb-3">New reply on:
            <span class="italic font-semibold">
                {{ $comment->commentable->title }}
            </span>
        </h4>
    </div>

    <div class="card p-3 w-3/4 mx-auto">
        <div class="card-body">
            @include('partials.replies._form', [
                'route' => route('admin.comments.replies.store', $comment)
            ])
        </div>
    </div>
@endsection
