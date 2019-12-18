@form(['route' => $route, 'model' => 'comment', 'id' => 'saveComment'])

    @include('partials.comments._users_select_box')

    @include('partials.comments._articles_select_box')

    <!-- Body -->
    <div class="form-group">
        <label for="comment">Comment: @asterisks @endasterisks</label>
        <textarea name="comment" id="comment" class="form-control" rows="5"
        placeholder="Article comment">{{ old('comment', $comment->comment ?? null) }}</textarea>

        @isInvalid(['field' => 'comment']) @endisInvalid
    </div>

@endform
