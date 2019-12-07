@extends('layouts.admin')

@section('title', 'Edit role')

@section('content')
    <div class="w-3/4 mx-auto">
        @header(['title' => 'Edit role'])
            @viewAll(['route' => route('admin.roles.index')])
            @endviewAll
        @endheader
    </div>

    <div class="card p-3 w-3/4 mx-auto">
        <div class="card-body">
            @include('partials.roles._form_save', [
                'role' => $role,
                'route' => route('admin.roles.update', $role),
            ])
        </div>
    </div>
@endsection