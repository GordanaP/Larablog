@rowInfo
    <div class="flex">
        @edit(['route' => route('admin.roles.edit', $role)])
        @endedit

        @delete(['route' => route('admin.roles.destroy', $role)])
        @enddelete
    </div>
@endrowInfo

@rowInfo(['name' => 'ID'])
    {{ $role->id }}
@endrowInfo

@rowInfo(['name' => 'Name'])
    {{ $role->name }}
@endrowInfo

@rowInfo(['name' => 'Created'])
    {{ $role->created_at }}
@endrowInfo

@rowInfo(['name' => 'Last update'])
    {{ $role->updated_at }}
@endrowInfo