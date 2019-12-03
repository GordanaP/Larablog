@extends('layouts.admin')

@section('title', 'Edit category')

@section('content')
    @header(['title' => 'Edit category'])
        @viewAll(['route' => route('admin.categories.index')])
        @endviewAll
    @endheader

    <div class="card">
        <div class="card-body">
            @include('partials.categories._form_save', [
                'category' => $category,
                'route' => route('admin.categories.update', $category),
            ])
        </div>
    </div>
@endsection