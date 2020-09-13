<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @meta_tags
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Центральный Дропшиппинг</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('client/img/favicon/favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('client/img/favicon/favicon.png') }}">

    <!-- Inlude css -->
    <link rel="stylesheet" href="{{ URL::asset('client/libs/fontawesome/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('client/libs/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('client/libs/owlcarousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('client/css/auch.css') }}">

    {!! $settings->getAttribute('code_insert') !!}
</head>
<body>
    <div id="app" class="wrapper">
        @yield('content')
    </div>

    <script src="{{ URL::asset('common/js/routes.js') }}"></script>
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script src="{{ URL::asset('client/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('client/libs/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('client/js/common.js') }}"></script>
    @yield('scripts')
</body>
</html>
