<div class="form-group">
    <label for="user_id">Author: @asterisks @endasterisks</label>
    <select name="user_id" id="user_id" class="form-control"
        {{ Request::route('article') ? 'disabled' : ''  }}
    >
        @if (Request::route('profile'))
            <option value="{{ $profile->user->id }}" selected>
                {{ $profile->full_name }}
            </option>
        @elseif(Request::route('article'))
            <option value="{{ $article->user->id }}">
                {{ $article->user->profile->full_name }}
            </option>
        @else
            <option value="">Select the author</option>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}"
                    {{ getSelected($author->id, old('user_id', $article->user_id ?? null)) }}
                >
                    {{ optional($author->profile)->full_name}}
                </option>
            @endforeach
        @endif
    </select>

    @isInvalid(['field' => 'user_id']) @endisInvalid
</div>

