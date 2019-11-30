@extends('layouts.admin')

@section('title', 'New role')

@section('content')
    @header(['title' => 'New role'])
        @viewAll(['route' => route('admin.roles.index')])
        @endviewAll
    @endheader

    <div class="card">
        <div class="card-body">
            @include('partials.roles._form_save', [
                'route' => route('admin.roles.store'),
            ])
        </div>
    </div>
@endsection