@if (Request::route($model))
    @foreach ($edit_buttons as $key => $value)
        @submit(['name' => $button_name, 'value' => $value, 'title' => $key])
        @endsubmit
    @endforeach
@else
    @foreach ($create_buttons as $key => $value)
        @submit(['name' => $button_name, 'value' => $value, 'title' => $key])
        @endsubmit
    @endforeach
@endif

@isInvalid(['field' => $button_name]) @endisInvalid
