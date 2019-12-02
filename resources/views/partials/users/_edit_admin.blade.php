@extends('layouts.admin')

@section('title', 'Edit user')

@section('content')
    <div class="w-3/4 mx-auto">
        @header(['title' => 'Edit user'])
            @viewAll(['route' => route('admin.users.index')])
            @endviewAll
        @endheader
    </div>

    <div class="card p-3 w-3/4 mx-auto">
        <div class="card-body">
            @include('partials.users._form_save', [
                'route' => route('admin.users.update',$user),
            ])
        </div>
    </div>
@endsection