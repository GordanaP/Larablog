@includeWhen(Auth::user()->is_admin, 'partials.profiles._edit_admin')

@includeWhen(! Auth::user()->is_admin, 'partials.profiles._edit_author')
