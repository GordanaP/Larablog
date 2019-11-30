<table class="table show-table shadow-sm">
    <tbody class="bg-white border">

        @rowInfo
            <div class="flex">
                @edit(['route' => route('admin.'.$records.'.edit', $model)])
                @endedit

                @delete(['route' => route('admin.'.$records.'.destroy', $model)])
                @enddelete
            </div>
        @endrowInfo

        @rowInfo(['name' => 'ID'])
            {{ $model->id }}
        @endrowInfo

        {{ $slot }}

        @rowInfo(['name' => $records == 'users' ? 'Joined' : 'Created'])
            {{ $model->created_at }}
        @endrowInfo

        @rowInfo(['name' => 'Last update'])
            {{ $model->updated_at }}
        @endrowInfo

    </tbody>
</table>