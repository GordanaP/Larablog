@includeWhen(Auth::user()->is_admin, 'partials.users._show_admin')

@includeWhen(! Auth::user()->is_admin, 'partials.users._show_member')