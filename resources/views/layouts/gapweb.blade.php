<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'GAPhub') }}</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://gappropertyhub.com/css/jquery-ui.min.css">
    {{-- <link rel="stylesheet" href="https://gappropertyhub.com/css/app.css"> --}}
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/gap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Styles -->  
    <link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}">
    <link rel="stylesheet" href="https://gappropertyhub.com/css/flexslider.css">
    <link rel="stylesheet" href="https://gappropertyhub.com/css/flexslider-direction-nav.css">
    {{-- <link rel="stylesheet" href="{{asset('css/flexslider.css')}}"> --}}

</head>
<body>
    <div id="app">
        <main class="row m-0 bg-white">
            <div class="col-md-2 side bg-white  hg-f1 gap-col-side"  style="">
                <div class="col-inner ">
                    <div class="logo">
                        <div class="wrapper">
                            <img class="img img-responsive" src="{{ asset('assets/images/logo.png') }}" alt="">
                        </div> 
                    </div>
                    @include('inc.usersidemenu')
                </div>
            </div>
            <div class="col-md-10 gap-col-main" style="">
                <div class="mob-nav">
                    @include('inc.usernav')
                </div>
                @if ((!Request::is('home') ) && (!Request::is('home/actionplan') && !Request::is('home/tools/profile') ) 
                        &&  !$welcome)
                   @include('inc.topbar')
                @endif
                @include('inc.messages')
                @yield('content') 
            </div>
        </main>
    </div>
    <!-- Scripts -->
   
    {{-- <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/lightbox.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>  --}}

    {{-- <script src="{{ asset('js/jquery.js') }}"></script> --}}
    <script src="https://gappropertyhub.com/js/app.js"></script>
    <script src="https://gappropertyhub.com/js/jquery-ui.min.js"></script>
    <script src="https://gappropertyhub.com/js/lightbox.min.js"></script>
    
   <script src="https://gappropertyhub.com/js/script.js"></script> 
   <script src="https://gappropertyhub.com/js/jquery.flexslider-min.js?ver=5.0.1"></script>

</body>
</html>
