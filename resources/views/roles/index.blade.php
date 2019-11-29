@extends('layouts.admin')

@section('title', 'Roles')

@section('content')

    <div class="container-fluid">
        <h1 class="h3 text-gray-800">Roles</h1>

        @dataTable(['records' => 'Roles'])
            <th>Id</th>
            <th>Name</th>
            <th>Users</th>
            <th class="w-1/5"></th>
        @enddataTable
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">

        var records = 'Roles';

        @include('partials.roles._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection