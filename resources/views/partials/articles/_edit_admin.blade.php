@extends('layouts.admin')

@section('title', 'Edit article')

@section('content')
    <div class="w-3/4 mx-auto">
        @header(['title' => 'Edit article'])
            @viewAll(['route' => route('admin.articles.index')])
            @endviewAll
        @endheader
    </div>

    <div class="card p-3 w-3/4 mx-auto">
        <div class="card-body">
            @include('partials.articles._form_save', [
                'route' => route('admin.articles.update', $article),
                'article' => $article
            ])
        </div>
    </div>
@endsection