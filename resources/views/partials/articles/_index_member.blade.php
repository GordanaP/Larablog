@extends('layouts.app')

@section('title', 'All article')

@section('content')
    @forelse($articles as $article)
        @if (Request::route('user'))
            @can('touch', $article)
                @include('partials.articles._action_buttons', [
                    'article' => $article
                ])

                @include('partials.articles._status_bar', [
                    'article' => $article
                ])
            @endcan
        @endif

        @include('partials.articles._single', [
            'article' => $article
        ])
    @empty
        <p>There are no articles at present.</p>
    @endforelse

    <div class="mx-auto" href="#pagination">
        {{ $articles->appends(Request::query())->links() }}
    </div>
@endsection

@section('sidebar')
    @include('partials.app._side')
@endsection
