@extends('layouts.app')

@section('title', 'Edit profile')

@section('content')

    <h3 class="mb-3">Edit profile</h3>

    <div class="card card-body">
        @include('partials.profiles._form_save', [
            'profile' => $profile,
            'route' => route('profiles.update', $profile),
        ])
    </div>

@endsection