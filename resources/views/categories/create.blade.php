@extends('layouts.admin')

@section('title', 'New category')

@section('content')
    <div class="w-3/4 mx-auto">
        @header(['title' => 'New category'])
            @viewAll(['route' => route('admin.categories.index')])
            @endviewAll
        @endheader
    </div>

    <div class="card p-3 w-3/4 mx-auto">
        <div class="card-body">
            @include('partials.categories._form_save', [
                'route' => route('admin.categories.store'),
            ])
        </div>
    </div>
@endsection