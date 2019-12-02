@includeWhen(Auth::user()->is_admin, 'partials.pages._admin_home')

@includeWhen(! Auth::user()->is_admin, 'partials.pages._member_home')