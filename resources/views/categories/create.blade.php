@extends('layouts.admin')

@section('title', 'New category')

@section('content')
    @header(['title' => 'New category'])
        @viewAll(['route' => route('admin.categories.index')])
        @endviewAll
    @endheader

    <div class="card">
        <div class="card-body">
            @include('partials.categories._form_save', [
                'route' => route('admin.categories.store'),
            ])
        </div>
    </div>
@endsection