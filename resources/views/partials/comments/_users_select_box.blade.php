<div class="form-group">
    <label for="commenter_id">Commenter: @asterisks @endasterisks</label>
    <select name="commenter_id" id="commenter_id" class="form-control">
        @if (Request::route('user'))
            <option value="{{ $user->id }}" selected>
                {{ $user->email }}
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