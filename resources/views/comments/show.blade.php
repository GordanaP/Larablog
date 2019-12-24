@extends('layouts.admin')

@section('title', 'Show comment')

@section('content')

    @header(['title' => 'Comment'])
        @viewAll(['route' => route('admin.comments.index')])
        @endviewAll
    @endheader

    @show(['model' => $comment, 'records' => 'comments'])
        @include('partials.comments._table', [
            'comment' => $comment
        ])
    @endshow

    @if ($comment->is_parent)
        <div id="cardComments">
            @header(['title' => 'Replies', 'count' => $comment->children->count()])
                @addNew (['route' => route('admin.comments.replies.create', $comment)])
                @endaddNew
            @endheader
        </div>

        @dataTable(['records' => 'Comments'])
            <th>Id</th>
            <th width="40%">Comment</th>
            <th>Article</th>
            <th>Commenter</th>
            <th>Replies</th>
        @enddataTable
    @endif
@endsection

@section('scripts')
    <script>

        @if ($comment->is_parent)
            var records = 'Comments';
            var parentId = "{{ $comment->id }}";
            var parentRecords = 'comments';

            @include('partials.comments._datatable')

            @include('partials.datatables._delete_records')
        @endif

    </script>
@endsection

