<div class="form-group">
    <label for="user_id">Author: @asterisks @endasterisks</label>
    <select name="user_id" id="user_id" class="form-control">
        @if (Request::route('user'))
            <option value="{{ $user->id }}" selected>
                {{ $user->email }}
            </option>
        @else
            <option value="">Select the author</option>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}"
                    {{ getSelected($author->id, old('user_id', $article->user_id ?? null)) }}
                >
                    {{ $author->email}}
                </option>
            @endforeach
        @endif
    </select>

    @isInvalid(['field' => 'user_id']) @endisInvalid
</div>