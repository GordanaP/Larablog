@extends('layouts.admin')

@section('title', 'Tags')

@section('content')
    @include('alerts._error')

    @header(['title' => 'Tags', 'count' => $tags_count])
        @addNew(['route' => route('admin.tags.create')])
        @endaddNew
    @endheader

    @dataTable(['records' => 'Tags'])
        <th>Id</th>
        <th>Name</th>
        <th>Articles</th>
    @enddataTable
@endsection

@section('scripts')
    <script>

        var records = 'Tags';

        @include('partials.tags._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection