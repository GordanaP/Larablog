@extends('layouts.app')

@section('title', 'New article')

@section('content')

    <h3 class="mb-3">New article</h3>

    <div class="card card-body">
        @include('partials.articles._form', [
            'route' => route('users.articles.store', $user),
        ])
    </div>

@endsection
