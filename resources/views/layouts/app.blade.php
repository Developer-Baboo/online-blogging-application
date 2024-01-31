<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Developer Baboo Kumar">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style_frontend_footer.css') }}" rel="stylesheet">


    {{-- Owl Carousel --}}
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @include('layouts.inc.frontend-navbar')
        <main class="">
            @yield('content')
        </main>
        @include('layouts.inc.frontend-footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('status'))
                // console.log("Session Status:", "{{ session('status') }}");
                Toastify({
                    text: "{{ session('status') }}",
                    duration: 3000,
                    gravity: "top",
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();
            @endif
        });
    </script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>


    {{-- Owl Carousel --}}
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    <script>
        console.log("lhisflk");
    </script>
    <script>
        $(document).ready(function() {
            console.log('Bootstrap JavaScript initialized.');
        });
    </script>
    <script>
        $('.category-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
    @yield('scripts')
</body>

</html>
