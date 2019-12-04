@extends('layouts.admin')

@section('title', 'Show tag')

@section('content')
    @header(['title' => $tag->name])
        @viewAll(['route' => route('admin.tags.index')])
        @endviewAll
    @endheader

    @show(['model' => $tag, 'records' => 'tags'])
        @rowInfo(['name' => 'Name'])
            {{ $tag->name }}
        @endrowInfo
    @endshow
@endsection
