@extends('layouts.admin')

@section('title', 'Show category')

@section('content')
    @header(['title' => $category->name])
        @viewAll(['route' => route('admin.categories.index')])
        @endviewAll
    @endheader

    @show(['model' => $category, 'records' => 'categories'])
        @rowInfo(['name' => 'Name'])
            {{ $category->name }}
        @endrowInfo
    @endshow
@endsection
