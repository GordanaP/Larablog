<div class="form-group">
    <label for="role" class="mr-3"> Role:</label>
    @if ($role = Request::route('role'))
        @checkbox(['name'=>'role', 'model' => $role])
        @endcheckbox
    @else
        @foreach ($roles as $role)
            @checkbox(['name'=>'role', 'model' => $role])
                @if ($ids = old('role_id', isset($user) ? $user->roles->pluck('id') : null))
                    @foreach ($ids as $role_id)
                        {{ checked($role->id, $role_id) }}
                    @endforeach
                @endif
            @endcheckbox
        @endforeach
    @endif

    @isInvalid(['field' => 'role_id'])@endisInvalid
</div>