@extends('layouts.admin')

@section('title', 'Show comment')

@section('content')
    @header(['title' => 'Comment'])
        @viewAll(['route' => route('admin.comments.index')])
        @endviewAll
    @endheader

    <h4>{{ $comment->comment }}</h4>

@endsection
