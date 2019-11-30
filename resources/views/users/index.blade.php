@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    @include('alerts._error')

    @header(['title' => 'Users', 'records_count' => \App\User::count()])
        @addNew(['route' => route('admin.users.create')])
        @endaddNew
    @endheader

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
        var parentId = null;
        var parentRecords = null;


        @include('partials.users._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection