<div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox"
        name="{{ $name }}_id[]" id="{{ $name }}_{{ $model->id }}" value="{{ $model->id }} "
        {{ Request::route($name) ? 'checked' : '' }}

        {{ $slot }}
    >
    <label class="form-check-label">
        {{ $model->name }}
    </label>
</div>