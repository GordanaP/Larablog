@foreach ($commenter_radio_inputs as $key => $value)
    @radio(['name' => $commenter_radio_name, 'id' => Str::camel($value), 'value' => $value])

        @slot('is_checked')
            {{ checked(request('user') ?? 'registered', $value) }}
        @endslot

        {{ $key }}
    @endradio
@endforeach

@isInvalid(['field' => $commenter_radio_name]) @endisInvalid