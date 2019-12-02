<form action="{{ $route }}" method="POST" id="saveUser">

    @csrf

    @if (Request::route('user'))
        @method('PUT')
    @endif

    @required @endrequired

    <!-- Roles -->
    @includeWhen(Auth::user()->is_admin, 'partials.users._roles_checkboxes')

    <!-- Name -->
    <div class="form-group">
        <label for="name">Userame:@asterisks @endasterisks</label>
        <input type="text" name="name" id="name"
        class="form-control" placeholder="Enter name"
        value="{{ old('name', $user->name ?? null) }}">

        @isInvalid(['field' => 'name']) @endisInvalid
    </div>

    <!-- Email -->
    <div class="form-group">
        <label for="name">Email:@asterisks @endasterisks</label>
        <input type="text" name="email" id="email"
        class="form-control" placeholder="example@domain.com"
        value="{{ old('email', $user->email ?? null) }}">

        @isInvalid(['field' => 'email']) @endisInvalid
    </div>

    <!-- Password -->
    <div class="form-group">
        <label for="password" class="mr-3"> Password:
            @if (! request()->route('user'))
                @asterisks @endasterisks
            @endif
        </label>

        @includeWhen(Auth::user()->is_admin, 'partials.users._password_radio')

        <input type="password" class="form-control mt-2"
        id="password" name="password" placeholder="********" >

        @isInvalid(['field' => 'password'])@endisInvalid

        @admin
            @isInvalid(['field' => 'generate_password'])@endisInvalid
        @endadmin

        <!-- Password confirm -->
        @unless(Auth::user()->is_admin)
            <div class="form-group mt-3">
                <label for="password-confirm">Confirm password:</label>

                <input type="password" name="password_confirmation" id="password-confirm"
                    class="form-control" placeholder="Retype password">
            </div>
        @endunless
    </div>

    @buttonSubmit(['model' => 'user']) @endbuttonSubmit
</form>

@section('scripts')
    @admin
        <script>

            var form = $('#saveUser');
            var radioOption = $('#manualPassword');
            var hiddenInput = $('#password').hide();
            var hiddenError = $('p.password');

            toggleHidden(radioName(form), optionValue(radioOption), hiddenInput, hiddenError)

        </script>
    @endadmin
@endsection