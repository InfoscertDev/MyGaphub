<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MYGAPHUB') }}</title>
    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <!-- Styles -->  
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    {{-- <link href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</head> 
<body>
    <div id="app">
        @include('guest.navigation')
        <main class="content">
            @yield('header')
            @include('inc.messages')
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('assets/js/app.js') }}" ></script>
    @yield('script')
    <script src="https://www.google.com/recaptcha/api.js"></script>
</body>
</html> 