@extends('layouts.admin')

@section('title', 'Show article')

@section('content')
    @header(['title' => $article->title])
        @viewAll(['route' => route('admin.articles.index')])
        @endviewAll
    @endheader

    @show(['model' => $article, 'records' => 'articles'])
        @include('partials.articles._table', [
            'article' => $article
            ])
    @endshow

    @if ($article->is_published)
        <div id="cardComments">
            @header(['title' => 'Comments', 'count' => $article->comments->count()])
                @addNew (['route' => route('admin.articles.comments.create', $article)])
                @endaddNew
            @endheader
        </div>

        @dataTable(['records' => 'Comments'])
            <th>Id</th>
            <th width="40%">Comment</th>
            <th>Article</th>
            <th>Commenter</th>
        @enddataTable
    @endif
@endsection

@section('scripts')
    <script>
        @if ($article->is_published)
            var records = 'Comments';
            var parentId = "{{ $article->slug }}";
            var parentRecords = 'articles';

            @include('partials.comments._datatable')

            @include('partials.datatables._delete_records')
        @endif

    </script>
@endsection
