<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive Laravel Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="Polarys">
    <title>ADMIN - Polinema Room System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/logo.svg') }}">
    <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
    @stack('plugin-styles')
    @vite(['public/css/app.css', 'resources/js/app.js'])
    @stack('style')
</head>

<body data-base-url="{{ url('/') }}">
    @include('sweetalert::alert')
    <div class="main-wrapper" id="app">
        @include('layout.admin.sidebar')
        <div class="page-wrapper">
            @include('layout.admin.header')
            <div class="page-content">
                @yield('content')
            </div>
            @include('layout.admin.footer')
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    @stack('plugin-scripts')
    <script src="{{ asset('assets/js/template.js') }}"></script>
    @stack('custom-scripts')
</body>

</html>
