<div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="generate_password"
        id="{{ $id }}" value="{{ $value }}">

    <label class="form-check-label" for="{{ $id }}">
        {{ $slot }}
    </label>
</div>