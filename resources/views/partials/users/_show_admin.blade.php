@extends('layouts.admin')

@section('title', 'Show user')

@section('content')
    @header(['title' => $user->name])
        @viewAll(['route' => route('admin.users.index')])
        @endviewAll
    @endheader

    @show(['model' => $user, 'records' => 'users'])
        @include('partials.users._table_show', [
            'user' => $user,
        ])
    @endshow
@endsection
