@extends('layouts.admin')

@section('title', 'New profile')

@section('content')
    <div class="w-3/4 mx-auto">
        @header(['title' => 'New profile'])
            @viewAll(['route' => route('admin.profiles.index')])
            @endviewAll
        @endheader
    </div>

    <div class="card p-3 w-3/4 mx-auto">
        <div class="card-body">
            @include('partials.profiles._form_save', [
                'route' => route('admin.profiles.store'),
            ])
        </div>
    </div>
@endsection