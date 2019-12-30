@form(['route' => $route, 'model' => 'profile', 'id' => 'saveProfile', 'hasImage' => true])

    <!-- Roles -->
    @includeWhen(Auth::user()->is_admin, 'partials.profiles._authors_select_box')

    <!-- First Name -->
    <div class="form-group">
        <label for="first_name">First name:@asterisks @endasterisks</label>
        <input type="text" name="first_name" id="first_name"
        class="form-control" placeholder="Enter first name"
        value="{{ old('first_name', $profile->first_name ?? null) }}">

        @isInvalid(['field' => 'first_name']) @endisInvalid
    </div>

    <!-- Last Name -->
    <div class="form-group">
        <label for="last_name">Last name:@asterisks @endasterisks</label>
        <input type="text" name="last_name" id="last_name"
        class="form-control" placeholder="Enter last name"
        value="{{ old('last_name', $profile->last_name ?? null) }}">

        @isInvalid(['field' => 'last_name']) @endisInvalid
    </div>

    <!-- Biography -->
    <div class="form-group">
        <label for="biography">Biography:</label>
        <textarea name="biography" id="biography" class="form-control" rows="5"
        placeholder="Biography">{{ old('biography', $profile->biography ?? null) }}</textarea>

        @isInvalid(['field' => 'biography'])@endisInvalid
    </div>

    <!-- Avatar -->
    <div class="flex form-group mt-3">
        <div>
            <label for="avatar">Upload avatar:</label>
            <input type="file" name="avatar" id="avatar"
            class="form-control-file">

            @isInvalid(['field' => 'avatar'])@endisInvalid
        </div>

        @if (optional($profile ?? null)->hasAvatar())
            <div class="w-1/4">
                <img src="{{ App::make('profile_image')->getUrl($profile->avatar) }}"
                alt="Profile Avatar">
            </div>`
        @endif
    </div>
@endform
