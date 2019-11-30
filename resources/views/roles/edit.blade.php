@extends('layouts.admin')

@section('title', 'Edit role')

@section('content')
    @header(['title' => 'Edit role'])
        @viewAll(['route' => route('admin.roles.index')])
        @endviewAll
    @endheader

    <div class="card">
        <div class="card-body">
            @include('partials.roles._form_save', [
                'route' => route('admin.roles.update', $role),
            ])
        </div>
    </div>
@endsection