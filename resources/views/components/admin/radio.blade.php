<input class="form-check-input" type="radio" name="generate_password"
    id="{{ $id }}" value="{{ $value }}"

    @if (Request::route('user'))
        {{ getChecked($value, 'do_not_change') }}
    @else
        {{ getChecked($value, 'auto_generate') }}
    @endif
>
<label class="form-check-label" for="{{ $id }}">
    {{ $slot }}
</label>