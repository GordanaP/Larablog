<div class="form-group">
    <label for="commentable_id">Article: @asterisks @endasterisks</label>
    <select name="commentable_id" id="commentable_id" class="form-control">
        @if (Request::route('article'))
            <option value="{{ $article->id }}" selected>
                {{ $article->title }}
            </option>
        @else
            <option value="">Select the article</option>
            @foreach ($published_articles as $article)
                <option value="{{ $article->id }}"
                    {{ getSelected($article->id, old('commentable_id', $comment->commentable_id ?? null)) }}
                >
                    {{ $article->title }}
                </option>
            @endforeach
        @endif
    </select>

    @isInvalid(['field' => 'commentable_id']) @endisInvalid
</div>