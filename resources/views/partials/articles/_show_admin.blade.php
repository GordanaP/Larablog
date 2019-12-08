@rowInfo(['name' => 'Status'])
    <span class="font-bold" style="color: {{ $article->getStatus()['color'] }}">
        {{ $article->getStatus()['name'] }}
    </span>
@endrowInfo

@rowInfo(['name' => 'Publishing date'])
    @if ($article->is_approved)
        <i class="{{ $article->getStatus()['icon'] }} mr-1 text-gray-500"></i> {{ $article->publish_at_from_DB }}
    @else
        n/a
    @endif
@endrowInfo

@rowInfo(['name' => 'Approved for publishing'])
    {{ $article->is_approved ? 'yes' : 'no' }}
@endrowInfo

@rowInfo(['name' => 'Title'])
    {{ $article->title }}
@endrowInfo

@rowInfo(['name' => 'Author'])
    <a href="{{ route('admin.profiles.show', $article->user->profile) }}">
        {{ $article->user->profile->full_name }}
    </a>
@endrowInfo

@rowInfo(['name' => 'Category'])
    <a href="{{ route('admin.categories.show', $article->category) }}">
        {{ $article->category->name }}
    </a>
@endrowInfo

@rowInfo(['name' => 'Excerpt'])
    <span class="w-4/5">{{ $article->excerpt }}</span>
@endrowInfo

@rowInfo(['name' => 'Body'])
    <a class="btn btn-outline-primary btn-sm" data-toggle="collapse"
        href="#articleBody" aria-expanded="false" aria-controls="collapseExample">
        View
    </a>

    <div class="collapse w-4/5" id="articleBody">
        {{ $article->body }}
    </div>
@endrowInfo

@rowInfo(['name' => 'Tags'])
    @forelse ($article->tags as $tag)
        <a href="{{ route('admin.tags.show', $tag) }}">
            {{ $tag->name }}
        </a>
    @empty
        n/a
    @endforelse
@endrowInfo

{{-- @rowInfo(['name' => 'Image'])
    @if ($article->hasImage())
        <div class="w-1/2">
            <img src="{{ ArticleImageService::getUrl($article->image) }}"
            alt="{{ $article->title }}" class="img-thumbnail">
        </div>
    @else
        n/a
    @endif
@endrowInfo
 --}}
