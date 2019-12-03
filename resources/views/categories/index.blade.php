@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    @include('alerts._error')

    @header(['title' => 'Categories', 'count' => $categories_count])
        @addNew(['route' => route('admin.categories.create')])
        @endaddNew
    @endheader

    @dataTable(['records' => 'Categories'])
        <th>Id</th>
        <th>Name</th>
        <th>Articles</th>
    @enddataTable
@endsection

@section('scripts')
    <script>

        var records = 'Categories';

        @include('partials.categories._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection