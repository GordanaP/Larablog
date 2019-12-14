<form action="{{ $route }}" method="POST"
    @if ($id ?? null) id = "{{ $id }}" @endif
    @if ($hasImage ?? null == true) enctype="multipart/form-data" @endif
>

    @csrf

    @if (Request::route($model))
        @method('PUT')
    @endif

    @required @endrequired

    {{ $slot }}

    @include('partials.admin._submit_form')
</form>