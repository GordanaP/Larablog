@form(['route' => $route, 'model' => 'tag'])

    <div class="form-group">
        <label for="name">Name:@asterisks @endasterisks</label>
        <input type="text" name="name" id="name"
        class="form-control" placeholder="Enter name"
        value="{{ old('name', $tag->name ?? null) }}">

        @isInvalid(['field' => 'name']) @endisInvalid
    </div>

@endform

@section('scripts')
    <script>

        clearErrorOnNewInput();

    </script>
@endsection