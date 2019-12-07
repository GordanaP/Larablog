@if (Request::route('user'))
    @radio(['name' => 'generate_password', 'id' => 'doNotChangePassword',
    'value' => 'do_not_change'])
        Do not change
    @endradio
@endif

@radio(['name' => 'generate_password', 'id' => 'autoPassword',
'value' => 'auto_generate'])
    Auto generate
@endradio

@radio(['name' => 'generate_password', 'id' => 'manualPassword',
'value' => 'manually_generate'])
    Generate manually
@endradio
