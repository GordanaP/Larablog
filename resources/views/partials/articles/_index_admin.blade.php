@extends('layouts.admin')

@section('title', 'Articles')

@section('content')
    @include('alerts._error')

    @header(['title' => 'Articles', 'count' => $articles_count])
        @addNew(['route' => route('admin.articles.create')])
        @endaddNew
    @endheader

    @dataTable(['records' => 'Articles'])
        <th>Id</th>
        <th width="30%">Title</th>
        <th>Author</th>
        <th>Status</th>
        <th class="text-center">Comments</th>
        <th class="text-center"><i class="far fa-calendar-alt"></i></th>
    @enddataTable
@endsection

@section('scripts')
    <script>

        var records = 'Articles';
        var parentId = null;
        var parentRecords = null;

        @include('partials.articles._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection