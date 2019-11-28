<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
class="text-gray-900 antialiased leading-tight">

    <head>
        @include('partials.app._head')
    </head>

    <body class="min-h-screen bg-gray-100 font-sans">
        <div id="app">

            <nav>
                @include('partials.app._navbar')
            </nav>

            <main>
                <div class="py-4 container mt-2">
                    @yield('content')
                </div>
            </main>
        </div>

        @include('partials.app._scripts')
    </body>

</html>
