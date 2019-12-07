@extends('layouts.admin')

@section('title', 'Edit tag')

@section('content')
    <div class="w-3/4 mx-auto">
        @header(['title' => 'Edit tag'])
            @viewAll(['route' => route('admin.tags.index')])
            @endviewAll
        @endheader
    </div>

    <div class="card p-3 w-3/4 mx-auto">
        <div class="card-body">
            @include('partials.tags._form_save', [
                'tag' => $tag,
                'route' => route('admin.tags.update', $tag),
            ])
        </div>
    </div>
@endsection