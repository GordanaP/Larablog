@form(['route' => $route, 'model' => 'comment', 'id' => 'saveComment'])

    <!-- Commenter -->
    @if (request('user') == 'guest' || (isset($comment) && ! Request::route('comment')->commenter))
        @include('partials.comments._guest_credentials')
    @else
        @include('partials.comments._users_select_box')
    @endif

    <!-- Article -->
    @include('partials.comments._articles_select_box')

    <!-- Comment -->
    <div class="form-group">
        <label for="comment">Comment: @asterisks @endasterisks</label>
        <textarea name="comment" id="comment" class="form-control" rows="5"
        placeholder="Article comment">{{ old('comment', $comment->comment ?? null) }}</textarea>

        @isInvalid(['field' => 'comment']) @endisInvalid
    </div>

@endform