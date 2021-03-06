<!-- Remove Filters-->
@if (QueryManager::detectsAny($article_filters))
    <p class="mb-3">
        <a href="{{ Request::route('user') ? route('users.articles.index', $user)
        : route('articles.index') }}"
        class="text-sm text-gray-700 uppercase font-semibold" >
            &times; Remove all filters
        </a>
    </p>
@endif

<!-- Filters -->
@foreach ($article_filters as $filter => $query)
    @include('partials.articles._filters', [
        'categoriesQuery' => $article_filters['category']->split(2),
        'filter' => $filter,
        'query' => $query,
    ])
@endforeach
