<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3g02KZRSXamK3M8NR2XA3RIkrNwypJWc&libraries=places"></script>
    <script>
        var autocomplete;
        function initialize() {
            if (document.getElementById('autocomplete')) {
                window.autocomplete = new google.maps.places.Autocomplete(
                    (document.getElementById('autocomplete')),
                    { types: ['geocode'] }
                );
            }
        }
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body onload="initialize()">
    <div id="app">
        @yield('header')
        @yield('content')
        @yield('footer')
    </div>
</body>
</html>
