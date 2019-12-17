@extends('layouts.admin')

@section('title', 'Show user')

@section('content')
    @header(['title' => $user->name])
        @viewAll(['route' => route('admin.users.index')])
        @endviewAll
    @endheader

    @show(['model' => $user, 'records' => 'users'])
        @include('partials.users._table_show', [
            'user' => $user,
        ])
    @endshow

    <div id="cardComments">
        @header(['title' => 'Comments', 'count' => $user->comments->count()])
            @addNew (['route' => '#'])
            @endaddNew
        @endheader
    </div>

    @dataTable(['records' => 'Comments'])
        <th>Id</th>
        <th width="40%">Comment</th>
        <th>Article</th>
        <th>Commenter</th>
    @enddataTable
@endsection

@section('scripts')
    <script>

        var records = 'Comments';
        var parentId = "{{ $user->id }}";
        var parentRecords = 'users';

        @include('partials.comments._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection

