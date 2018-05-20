<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>X-men Evidence</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('styles')
    </head>

    <body>
        @yield('content')

        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('scripts')
    </body>
</html>