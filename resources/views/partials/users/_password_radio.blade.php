@foreach ($password_radio_inputs as $key => $value)

    @if ($value == 'do_not_change' && ! Request::route('user'))
        @continue
    @endif

    @radio(['name' => $password_radio_name, 'id' => Str::camel($value), 'value' => $value])
        {{ $key }}
    @endradio

@endforeach