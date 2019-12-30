@extends('layouts.admin')

@section('title', 'Create comment')

@section('content')
    @include('alerts._error')

    <div class="w-3/4 mx-auto">
        @header(['title' => 'New comment'])
            @viewAll(['route' => route('admin.comments.index')])
            @endviewAll
        @endheader

        @if (! Request::route('user'))
            @include('partials.comments._commenter_radio')
        @endif
    </div>

    <div class="card p-3 w-3/4 mx-auto">
        <div class="card-body">
            @include('partials.comments._form', [
                'route' => UrlManager::addQueryToRouteWithoutParameter(
                    'admin.comments.store', ['user' => request('user')]
                ),

            ])
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        var url = "{{ URL::current() }}";
        var name = @json($commenter_radio_name);
        var values = @json($commenter_radio_values);

        appendQueryUsingRadio(name, values, url)

    </script>
@endsection