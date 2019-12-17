@extends('layouts.admin')

@section('title', 'Profiles')

@section('content')
    @include('alerts._error')

    @header(['title' => 'Profiles', 'count' => 2])
        @addNew(['route' => route('admin.profiles.create')])
        @endaddNew
    @endheader

    @dataTable(['records' => 'Profiles'])
        <th>Id</th>
        <th>Name</th>
        <th>Account</th>
        <th class="text-center">Articles</th>
    @enddataTable
@endsection

@section('scripts')
    <script>

        var records = 'Profiles';
        var parentId = null;
        var parentRecords = null;

        @include('partials.profiles._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection