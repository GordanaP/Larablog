@extends('layouts.admin')

@section('title', 'Edit category')

@section('content')
    <div class="w-3/4 mx-auto">
        @header(['title' => 'Edit category'])
            @viewAll(['route' => route('admin.categories.index')])
            @endviewAll
        @endheader
    </div>

    <div class="card p-3 w-3/4 mx-auto">
        <div class="card-body">
            @include('partials.categories._form_save', [
                'category' => $category,
                'route' => route('admin.categories.update', $category),
            ])
        </div>
    </div>
@endsection