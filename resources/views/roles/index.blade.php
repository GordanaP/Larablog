@extends('layouts.admin')

@section('title', 'Roles')

@section('content')
    @header(['title' => 'roles', 'records_count' => \App\Role::count()])
        @addNew(['record' => 'role', 'route' => route('admin.roles.create')])
        @endaddNew
    @endheader

    @dataTable(['records' => 'Roles'])
        <th>Id</th>
        <th>Name</th>
        <th>Users</th>
        <th class="w-1/5"></th>
    @enddataTable
@endsection

@section('scripts')
    <script>

        var records = 'Roles';

        @include('partials.roles._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection