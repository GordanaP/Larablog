@if (Request::route($model))
    @submit(['value' => 'do_and_show','title' => 'Edit & view'])
    @endsubmit

    @submit(['value' => 'do_and_repeat', 'title' => 'Edit & edit again'])
    @endsubmit
@else
    @submit(['value' => 'do_and_show', 'title' => 'Create & view'])
    @endsubmit

    @submit(['value' => 'do_and_repeat','title' => 'Create & create new'])
    @endsubmit
@endif