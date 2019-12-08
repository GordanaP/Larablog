@rowInfo(['name' => 'Username'])
    {{ $user->name }}
@endrowInfo

@rowInfo(['name' => 'Email'])
    {{ $user->email }}
@endrowInfo

@rowInfo(['name' => 'Roles'])
    @forelse ($user->roles as $role)
        <a href="{{ route('admin.roles.show', $role) }}">
            {{ ucfirst($role->name) }}
        </a>
    @empty
        Member
    @endforelse
@endrowInfo

@author($user)
    @rowInfo(['name' => 'Author profile'])
        <a href="{{ route('admin.profiles.show', $user->profile) }}">
            {{ $user->profile->full_name }}
        </a>
    @endrowInfo
@endauthor