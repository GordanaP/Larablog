<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
class="text-gray-900 antialiased leading-tight">

    <head>
        @include('partials.app._head')

        <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    </head>

    <body id="page-top" class="min-h-screen font-sans text-gray-800">
        <div id="wrapper">

            @include('partials.admin._side')

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">

                    @include('partials.admin._navbar')

                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>

                @include('partials.admin._footer')
            </div>
        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        @include('partials.app._scripts')

        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    </body>

</html>
