<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    @php
        $setting = App\Models\Setting::find(1);
    @endphp
    @if ($setting)
        <link rel="shortcut icon" href=" {{ asset('uploads/settings/' . $setting->favicon) }}" type="image/x-icon">
    @endif
    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Toastify --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- Styles --}}
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    {{-- Summernote CSS CDN Link: --}}

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">


    {{-- Data Table --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">


    {{-- pagaination button and number of rows --}}
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0px !important;
            margin: 0px !important;
        }

        div.dataTables_wrapper div.dataTables_length select {
            width: 40% !important;
        }
    </style>
</head>

<body>

    {{-- navbar --}}
    @include('layouts.inc.admin-navbar')

    <div id="layoutSidenav">
        @include('layouts.inc.admin-sidebar')
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('layouts.inc.admin-footer')
        </div>
    </div>

    {{-- Toastify Script --}}
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

    {{-- Other Scripts --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
    {{-- Jquery CDN link --}}
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    {{-- Summernote js link --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#mySummernote").summernote({
                height: 150,
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>

    {{-- Data Table --}}
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        let table = new DataTable('#myDataTable');
    </script>
</body>

</html>
