@extends('layouts.admin')

@section('title', 'Show role')

@section('content')
    @header(['title' => $role->name])
        @viewAll(['route' => route('admin.roles.index')])
        @endviewAll
    @endheader

    @show(['model' => $role, 'records' => 'roles'])
        @rowInfo(['name' => 'Name'])
            {{ $role->name }}
        @endrowInfo
    @endshow

    <div id="cardUsers">
        @header(['title' => $role->name . " accounts", 'count' => $role->users_count])
            @addNew (['route' => route('admin.roles.users.create', $role)])
            @endaddNew
        @endheader
    </div>

    @dataTable(['records' => 'Users'])
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Roles</th>
    @enddataTable
@endsection

@section('scripts')
    <script>

        var records = 'Users';
        var parentId = "{{ $role->slug }}";
        var parentRecords = 'roles';

        @include('partials.users._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection
