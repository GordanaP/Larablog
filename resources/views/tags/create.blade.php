@extends('layouts.admin')

@section('title', 'New tag')

@section('content')
    @header(['title' => 'New tag'])
        @viewAll(['route' => route('admin.tags.index')])
        @endviewAll
    @endheader

    <div class="card">
        <div class="card-body">
            @include('partials.tags._form_save', [
                'route' => route('admin.tags.store'),
            ])
        </div>
    </div>
@endsection