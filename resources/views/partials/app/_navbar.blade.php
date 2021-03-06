<nav class="navbar navbar-expand-md bg-blue-600 shadow-sm">
    <div class="container-fluid">

        <a class="navbar-brand text-white" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-white uppercase"
                     href="{{ route('articles.index') }}">
                        Articles
                    </a>
                </li>
                @can('create', 'App\Article')
                    <li class="nav-item">
                        <a class="nav-link text-white uppercase-xs"
                         href="{{ route('users.articles.create', Auth::user()) }}">
                            New article
                        </a>
                    </li>
                @endcan
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white uppercase-xs"
                         href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white uppercase-xs"
                            href="{{ route('register') }}">
                                Register
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white"
                        href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"
                                href="{{ route('users.edit', Auth::user()) }}">
                                Account settings
                            </a>
                            @can('viewAny', 'App\Article')
                                <a class="dropdown-item"
                                    href="{{ route('users.articles.index', Auth::user()) }}">
                                    My articles
                                </a>
                            @endcan

                            @can('touch', Auth::user()->profile)
                                <a class="dropdown-item"
                                    href="{{ route('profiles.edit', Auth::user()->profile) }}">
                                    Edit profile
                                </a>
                            @endcan

                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}"
                            method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>