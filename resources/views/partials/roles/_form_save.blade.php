<form action="{{ $route }}" method="POST">

    @csrf

    @if (Request::route('role'))
        @method('PUT')
    @endif

    @required @endrequired

    <div class="form-group">
        <label for="name">Name:@asterisks @endasterisks</label>
        <input type="text" name="name" id="name"
        class="form-control" placeholder="Enter name"
        value="{{ old('name', $role->name ?? null) }}">

        @isInvalid(['field' => 'name']) @endisInvalid
    </div>

    @buttonSubmit(['model' => 'role']) @endbuttonSubmit
</form>