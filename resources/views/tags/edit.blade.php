@extends('layouts.admin')

@section('title', 'Edit tag')

@section('content')
    @header(['title' => 'Edit tag'])
        @viewAll(['route' => route('admin.tags.index')])
        @endviewAll
    @endheader

    <div class="card">
        <div class="card-body">
            @include('partials.tags._form_save', [
                'tag' => $tag,
                'route' => route('admin.tags.update', $tag),
            ])
        </div>
    </div>
@endsection