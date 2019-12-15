@extends('layouts.admin')

@section('title', 'Show article')

@section('content')
    @header(['title' => $article->title])
        @viewAll(['route' => route('admin.articles.index')])
        @endviewAll
    @endheader

    @show(['model' => $article, 'records' => 'articles'])
        @include('partials.articles._table', [
            'article' => $article
            ])
    @endshow
@endsection
