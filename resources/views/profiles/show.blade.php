@includeWhen(Auth::user()->is_admin, 'partials.profiles._show_admin')

@includeWhen(! Auth::user()->is_admin, 'partials.profiles._show_author')