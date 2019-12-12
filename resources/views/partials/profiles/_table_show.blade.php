@rowInfo(['name' => 'First name'])
    {{ $profile->first_name }}
@endrowInfo

@rowInfo(['name' => 'Last name'])
    {{ $profile->last_name }}
@endrowInfo

@rowInfo(['name' => 'Biography'])
    <a class="btn btn-outline-primary btn-sm" data-toggle="collapse"
        href="#profileBiography" aria-expanded="false" aria-controls="profileBiography">
        View
    </a>

    <div class="collapse w-4/5" id="profileBiography">
        {{ $profile->biography ?? 'n/a' }}
    </div>
@endrowInfo

@rowInfo(['name' => 'Account'])
    <a href="{{ route('admin.users.show', $profile->user) }}">
        {{ $profile->user->email }}
    </a>
@endrowInfo

@rowInfo(['name' => 'Avatar'])
    @if ($profile->hasAvatar())
        <div class="w-1/2">
            <img src="{{ ProfileImage::getUrl($profile->avatar) }}"
            alt="{{ $profile->title }}" class="img-thumbnail">
        </div>
    @else
        n/a
    @endif
@endrowInfo
