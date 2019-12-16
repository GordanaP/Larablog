<ul class="list-unstyled mb-0">
    @if (request()->route('user') && $filter == 'status')
        <li>
            <a href="{{ route('users.articles.index', request()->route('user')) }}">
                All articles
            </a>
        </li>
    @endif
</ul>

@foreach ($query as $key => $value)
    <ul class="list-unstyled mb-0">
        @filter([
            'filter' => $filter,
            'key' => $key,
            'value' => $value,
            'route' => UrlManager::addQuery(
                'users.articles.index', 'articles.index', [$filter=>$key]
            )
        ])
        @endfilter
    </ul>
@endforeach

