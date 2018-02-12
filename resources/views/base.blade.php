<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
</head>
<body>

    @if(Auth::check())
    <a>{{ Auth::user()->name }}</a>
    <button type="button" onclick="window.location='{{ url("logout") }}'">Logout</button>
    @else
    <button type="button" onclick="window.location='{{ url("login") }}'">Login</button>
    <button type="button" onclick="window.location='{{ url("register") }}'">Register</button>
    @endif

    <div id="app">
        <app user-id="{{ Auth::user()->id }}"></app>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
