<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/web/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/web/app.js') }}" defer></script>
    <script src="{{ asset('js/web/materialize.min.js') }}" defer></script>

    <!-- External Styles -->
    @yield('styles')
</head>
<body>
    <div id="app">
        <!-- Page Content -->
        @yield('content')
    </div>

    <!-- External Scripts -->
    @yield('scripts')
</body>
</html>
