@includeWhen(Auth::user()->is_admin, 'partials.pages._home_admin')

@includeWhen(! Auth::user()->is_admin, 'partials.pages._home_member')