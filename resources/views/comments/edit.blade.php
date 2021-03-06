@extends('layouts.admin')

@section('title', 'Edit comment')

@section('content')
    @include('alerts._error')

    <div class="w-3/4 mx-auto">
        @header(['title' => 'Edit comment'])
            @viewAll(['route' => route('admin.comments.index')])
            @endviewAll
        @endheader
    </div>

    <div class="card p-3 w-3/4 mx-auto">
        <div class="card-body">
            @include('partials.comments._form', [
                'route' => route('admin.comments.update', $comment),
                'comment' => $comment
            ])
        </div>
    </div>
@endsection
