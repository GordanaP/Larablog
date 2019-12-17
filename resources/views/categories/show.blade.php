@extends('layouts.admin')

@section('title', 'Show category')

@section('content')
    @header(['title' => $category->name])
        @viewAll(['route' => route('admin.categories.index')])
        @endviewAll
    @endheader

    @show(['model' => $category, 'records' => 'categories'])
        @rowInfo(['name' => 'Name'])
            {{ $category->name }}
        @endrowInfo
    @endshow

    <div id="cardArticles">
        @header(['title' => $category->name.' articles', 'count' => $category->articles->count()])
            @addNew (['route' => route('admin.categories.articles.create', $category)])
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
        var parentId = "{{ $category->slug }}";
        var parentRecords = 'categories';

        @include('partials.articles._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection
