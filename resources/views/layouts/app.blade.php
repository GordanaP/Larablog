<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        @include('partials.app._head')

    </head>

    <body class="min-h-screen bg-white font-sans">
        <div id="app">

            @include('partials.app._navbar')

            <div class="container w-4/5 mt-4">
                <header class="blog-header">
                    <h1 class="blog-title">The LaraBlog</h1>
                    <p class="lead blog-description">An example blog template built with Bootstrap.</p>
                </header>

                <div class="row py-4" >
                    <main class="col-md-8">
                        @yield('content')
                    </main>

                    <aside class="col-sm-3 offset-sm-1">
                        @yield('sidebar')
                    </aside>
                </div>
            </div>
        </div>

        @include('partials.app._scripts')
    </body>

</html>
