@extends('layouts.app')

@section('title', $article->title)

@section('content')

    @can('touch', $article)
        @include('partials.articles._action_buttons', [
            'article' => $article
        ])

        @include('partials.articles._status_bar', [
            'article' => $article
        ])
    @endcan

    @include('partials.articles._single', [
        'article' => $article
    ])

    <div id="comments">
        <h4 class="mb-3">Comments ({{ $article->comments->count() }})</h4>
        @comments(['model' => $article])
    </div>
@endsection