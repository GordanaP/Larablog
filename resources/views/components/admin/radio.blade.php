<div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="{{ $name }}"
        id="{{ $id }}" value="{{ $value }}"

        {{ $is_checked ?? null }}
    >

    <label class="form-check-label" for="{{ $id }}">
        {{ $slot }}
    </label>
</div>