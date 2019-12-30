@form(['route' => $route, 'model' => '', 'id' => 'saveComment'])

    <!-- Comment -->
    <div class="form-group">
        <label for="comment">Comment:</label>
        <input type="text" class="form-control" value="{{ $comment->comment }}"
            {{ Request::route('comment') ? 'disabled' : '' }}
        >
    </div>

    <!-- Reply -->
    <div class="form-group">
        <label for="comment">Reply: @asterisks @endasterisks</label>
        <textarea name="comment" id="comment" class="form-control" rows="5"
        placeholder="Reply">{{ old('comment') }}</textarea>

        @isInvalid(['field' => 'comment']) @endisInvalid
    </div>

    <!-- Replier -->
    @include('partials.replies._repliers_select_box')

@endform