@extends('layouts.admin')

@section('title', 'Show tag')

@section('content')
    @header(['title' => $tag->name])
        @viewAll(['route' => route('admin.tags.index')])
        @endviewAll
    @endheader

    @show(['model' => $tag, 'records' => 'tags'])
        @rowInfo(['name' => 'Name'])
            {{ $tag->name }}
        @endrowInfo
    @endshow

    <div id="cardArticles">
        @header(['title' => $tag->name.' articles', 'count' => $tag->articles->count()])
            @addNew (['route' => route('admin.tags.articles.create', $tag)])
            @endaddNew
        @endheader
    </div>

    @dataTable(['records' => 'Articles'])
        <th>Id</th>
        <th width="40%">Title</th>
        <th>Author</th>
        <th>Status</th>
        <th class="text-center">Comments</th>
        <th class="text-center"><i class="far fa-calendar-alt"></i></th>
    @enddataTable
@endsection

@section('scripts')
    <script>

        var records = 'Articles';
        var parentId = "{{ $tag->slug }}";
        var parentRecords = 'tags';

        @include('partials.articles._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection
