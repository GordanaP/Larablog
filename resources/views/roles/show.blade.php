@extends('layouts.admin')

@section('title', 'Show role')

@section('content')
    @header(['title' => $role->name])
        @viewAll(['route' => route('admin.roles.index')])
        @endviewAll
    @endheader

    @show
        @include('partials.roles._table_show', [
            'role' => $role
        ])
    @endshow

    <div id="cardUsers">
        @header(['title' => $role->name . " accounts", 'records_count' => $role->users_count])
            @addNew (['route' => '#'])
            @endaddNew
        @endheader
    </div>

    @dataTable(['records' => 'Users'])
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Roles</th>
        <th class="w-1/5"></th>
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
