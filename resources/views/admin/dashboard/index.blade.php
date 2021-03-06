<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Royal Emelina') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="{{ asset('css/rylapp/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rylapp/vuetify-components.css') }}" rel="stylesheet">
    <script src="{{ asset('js/rylapp/main.js') }}" defer></script>
</head>
<body>
    <div id="rylapp">
        <App :user= {{ auth()->user() }} />      
    </div>
</body>
</html>