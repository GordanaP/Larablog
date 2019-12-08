@extends('layouts.admin')

@section('title', 'Show Profile')

@section('content')
    @header(['title' => $profile->full_name])
        @viewAll(['route' => route('admin.profiles.index')])
        @endviewAll
    @endheader

    @show(['model' => $profile, 'records' => 'profiles'])
        @include('partials.profiles._table_show', [
            'profile' => $profile,
        ])
    @endshow

    <div id="cardArticles">
        @header(['title' => $profile->first_name.' articles',
        'count' => $profile->user->articles->count()])
            @addNew (['route' => route('admin.profiles.articles.create', $profile)])
            @endaddNew
        @endheader
    </div>

    @dataTable(['records' => 'Articles'])
        <th>Id</th>
        <th width="40%">Title</th>
        <th>Author</th>
        <th>Status</th>
        <th class="text-center"><i class="far fa-calendar-alt"></i></th>
    @enddataTable
@endsection

@section('scripts')
    <script>

        var records = 'Articles';
        var parentId = "{{ $profile->id }}";
        var parentRecords = 'profiles';

        @include('partials.articles._datatable')

        @include('partials.datatables._delete_records')

    </script>
@endsection
