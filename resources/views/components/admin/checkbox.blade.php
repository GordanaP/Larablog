<div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox"
        name="role_id[]" id="role_{{ $role->id }}" value="{{ $role->id }} "
        {{ Request::route('role') ? 'checked' : '' }}

        {{ $slot }}
    >
    <label class="form-check-label">
        {{ $role->name }}
    </label>
</div>