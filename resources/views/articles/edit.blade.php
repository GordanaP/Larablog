@includeWhen(Auth::user()->is_admin, 'partials.articles._edit_admin')

@includeWhen(! Auth::user()->is_admin, 'partials.articles._edit_author')
