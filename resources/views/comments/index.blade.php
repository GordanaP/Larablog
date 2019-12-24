@extends('layouts.admin')

@section('title', 'Comments')

@section('content')
    @include('alerts._error')

    @header(['title' => 'Comments', 'count' => $comments_count])
        @addNew(['route' => route('admin.comments.create')])
        @endaddNew
    @endheader

    @dataTable(['records' => 'Comments'])
        <th>Id</th>
        <th width="40%">Comment</th>
        <th>Article</th>
        <th>Commenter</th>
        <th>Replies</th>
    @enddataTable
@endsection

@section('scripts')
    <script>

        clearErrorOnNewInput();

        var records = 'Comments';
        var parentId = null;
        var parentRecords = null;

        @include('partials.comments._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection