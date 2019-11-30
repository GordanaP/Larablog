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