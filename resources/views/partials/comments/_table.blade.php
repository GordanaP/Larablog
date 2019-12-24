@rowInfo(['name' => 'Body'])
    {{ $comment->comment }}
@endrowInfo

@rowInfo(['name' => 'Article'])
    <a href="{{ route('admin.articles.show', $comment->commentable) }}">
        {{ $comment->commentable->title }}
    </a>
@endrowInfo

@rowInfo(['name' => 'Commenter'])
    @if ($comment->commenter)
        <a href="{{ route('admin.users.show', $comment->commenter) }}">
            {{ $comment->commenter->email }}
        </a>
    @else
        {{ $comment->guest_email }}
    @endif
@endrowInfo

@rowInfo(['name' => 'Commenter status'])
    {{ $comment->commenter ? 'registered' : 'guest' }}
@endrowInfo

@if ($comment->is_child)
    @rowInfo(['name' => 'Replied to'])
        <a href="{{ route('admin.comments.show', $comment->parent) }}">
            {{ $comment->parent->comment }}
        </a>
    @endrowInfo
@endif