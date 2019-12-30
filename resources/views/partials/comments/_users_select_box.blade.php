<div class="form-group">
    <label for="commenter_id">Commenter: @asterisks @endasterisks</label>
    <select name="commenter_id" id="commenter_id" class="form-control"
        {{ Request::route('comment') || Request::route('user') ? 'disabled' : '' }}
    >
        @if (Request::route('user'))
            <option>
                {{ $user->email }}
            </option>
        @elseif(Request::route('comment'))
            <option>
                {{ $comment->commenter->email }}
            </option>
        @else
            <option value="">Select the commenter</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    {{ getSelected($user->id, old('commenter_id',
                    Route::currentRouteName() == 'admin.comments.edit'
                    ? ($comment->commenter_id ?? null) : '')) }}
                >
                    {{ $user->email }}
                </option>
            @endforeach
        @endif
    </select>

    @isInvalid(['field' => 'commenter_id']) @endisInvalid
</div>