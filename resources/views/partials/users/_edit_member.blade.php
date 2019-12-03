@extends('layouts.app')

@section('title', 'Edit account')

@section('content')

    <h3 class="mb-3">Edit acccount</h3>

    <div class="card card-body">
        @include('partials.users._form_save', [
            'user' => $user,
            'route' => route('users.update', $user),
        ])
    </div>

@endsection