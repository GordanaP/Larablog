@if (Request::route('user'))
    <div class="form-check form-check-inline">
        @radio(['id' => 'doNotChangePassword', 'value' => 'do_not_change'])
            Do not change
        @endradio
    </div>
@endif

<div class="form-check form-check-inline">
    @radio(['id' => 'autoPassword', 'value' => 'auto_generate'])
        Auto generate
    @endradio
</div>

<div class="form-check form-check-inline">
    @radio(['id' => 'manualPassword', 'value' => 'manually_generate'])
        Generate manually
    @endradio
</div>