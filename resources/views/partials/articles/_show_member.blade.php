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
@endsection