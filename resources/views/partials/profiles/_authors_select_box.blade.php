<div class="form-group">
    <label for="user_id">User: @asterisks @endasterisks</label>
    <select name="user_id" id="user_id" class="form-control">
        @if (Request::route('user'))
            <option value="{{ $user->id }}" selected>
                {{ $user->email }}
            </option>
        @else
            <option value="">Select the account</option>
            @foreach ($authors_without_profile as $author)
                <option value="{{ $author->id }}"
                    {{ getSelected($author->id, old('user_id', $profile->user_id ?? null)) }}
                >
                    {{ $author->email}}
                </option>
            @endforeach
        @endif
    </select>

    @isInvalid(['field' => 'user_id']) @endisInvalid
</div>