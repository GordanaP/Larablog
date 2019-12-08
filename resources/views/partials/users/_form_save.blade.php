@form(['route' => $route, 'id' => 'saveUser', 'model' => 'user'])

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
            @isInvalid(['field' => 'generate_password']) @endisInvalid
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

@endform

@section('scripts')
    @admin
        <script>

            var passwordRadioIds = @json($password_radio_ids);
            var passwordRadio = @json($password_radio_name);

            var userExists = "{{ Request::route('user') }}";
            var doNotChangePassword = createById(passwordRadioIds[0]);
            var autoPassword = createById(passwordRadioIds[1]);
            var manualPassword = createById(passwordRadioIds[2]);
            var hiddenInput = $('#password');
            var hiddenError = $('p.password');

            clearErrorOnNewInput();

            hiddenInput.hide();

            userExists ? check(doNotChangePassword) : check(autoPassword);

            toggleHidden(passwordRadio, manualPassword, hiddenInput, hiddenError)

        </script>
    @endadmin
@endsection