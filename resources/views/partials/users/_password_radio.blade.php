@if (Request::route('user'))
    @radio(['id' => 'doNotChangePassword', 'value' => 'do_not_change'])
        Do not change
    @endradio
@endif

@radio(['id' => 'autoPassword', 'value' => 'auto_generate'])
    Auto generate
@endradio

@radio(['id' => 'manualPassword', 'value' => 'manually_generate'])
    Generate manually
@endradio
