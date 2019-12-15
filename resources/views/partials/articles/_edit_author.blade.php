@extends('layouts.app')

@section('title', 'Edit article')

@section('content')

    <h3 class="mb-3">Edit article</h3>

    <div class="card card-body">
        @include('partials.articles._form_save', [
            'route' => route('articles.update', $article),
            'article' => $article
        ])
    </div>

@endsection