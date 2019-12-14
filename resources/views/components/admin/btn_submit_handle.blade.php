@if (Request::route($model))
    @submit(['value' => 'do_and_show',
    'title' => Auth::user()->is_admin ? 'Edit & view' : 'Save changes'])
    @endsubmit

    @admin
        @submit(['value' => 'do_and_repeat',
        'title' => 'Edit & edit again'])
        @endsubmit
    @endadmin
@else
    @submit(['value' => 'do_and_show',
    'title' => Auth::user()->is_admin ? 'Create & view' : 'Create' .$model])
    @endsubmit

    @admin
        @submit(['value' => 'do_and_repeat','title' => 'Create & create new'])
        @endsubmit
    @endadmin
@endif

@isInvalid(['field' => 'handle_submission']) @endisInvalid