@extends('layouts.admin')

@section('title', 'Edit profile')

@section('content')
    <div class="w-3/4 mx-auto">
        @header(['title' => 'Edit profile'])
            @viewAll(['route' => route('admin.profiles.index')])
            @endviewAll
        @endheader
    </div>

    <div class="card p-3 w-3/4 mx-auto">
        <div class="card-body">
            @include('partials.profiles._form', [
                'profile' => $profile,
                'route' => route('admin.profiles.update', $profile),
            ])
        </div>
    </div>
@endsection