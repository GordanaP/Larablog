@extends('layouts.admin')

@section('title', 'Roles')

@section('content')
    @include('alerts._error')

    @header(['title' => 'Roles', 'records_count' => \App\Role::count()])
        @addNew(['route' => route('admin.roles.create')])
        @endaddNew
    @endheader

    @dataTable(['records' => 'Roles'])
        <th>Id</th>
        <th>Name</th>
        <th>Users</th>
    @enddataTable
@endsection

@section('scripts')
    <script>

        var records = 'Roles';

        @include('partials.roles._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection