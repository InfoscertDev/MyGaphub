<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyGaphub') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <!-- Styles --> 
    
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- {{-- <link href="{{ asset('assets/css/Chart.css') }}" rel="stylesheet"> 2.4--}} -->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/mygap.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <!-- {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> --}} -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script> 
    
    @yield('header')
    @if( App::environment() == "locals" )
    @else
        @yield('secure_header')
    @endif
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
            <div class="col-lg-10 gap-col-main" style="">
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
            <div class="fixed-bottom mob-nav">
                @include('inc.navbottom')
            </div>
        </main>
    </div>
    <script src="{{ asset('assets/js/app.js') }}"></script>
   
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.8/push.min.js"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script> 
    
    
    @yield('script') 
    @if(false) 
        <script>
        var pusher = new Pusher('{{env("MIX_PUSHER_APP_KEY","68b4813f8472fce44d8f")}}', {
            cluster: '{{env("PUSHER_APP_CLUSTER","eu")}}',
            encrypted: true
        }); 
        var channel = pusher.subscribe('presence-chat');
        channel.bind('App\\Events\\NewMessage', function(data) {
            console.log(data);
            Push.create("MyGaphub Reminder",{ 
                body: data.message,  
                icon: 'https://www.mygaphub.com/app/assets/images/logo.png',
                timeout: 5000,
                onClick: function () { 
                    window.focus(); 
                    this.close(); 
                } 
            });  
        }); 
        </script>
    @else 
      <!-- @yield('secure_script') -->
      <script>
        var _0x5fbe=["\x7B\x7B\x65\x6E\x76\x28\x22\x4D\x49\x58\x5F\x50\x55\x53\x48\x45\x52\x5F\x41\x50\x50\x5F\x4B\x45\x59\x22\x2C\x22\x36\x38\x62\x34\x38\x31\x33\x66\x38\x34\x37\x32\x66\x63\x65\x34\x34\x64\x38\x66\x22\x29\x7D\x7D","\x7B\x7B\x65\x6E\x76\x28\x22\x50\x55\x53\x48\x45\x52\x5F\x41\x50\x50\x5F\x43\x4C\x55\x53\x54\x45\x52\x22\x2C\x22\x65\x75\x22\x29\x7D\x7D","\x70\x72\x65\x73\x65\x6E\x63\x65\x2D\x63\x68\x61\x74","\x73\x75\x62\x73\x63\x72\x69\x62\x65","\x41\x70\x70\x5C\x45\x76\x65\x6E\x74\x73\x5C\x4E\x65\x77\x4D\x65\x73\x73\x61\x67\x65","\x6C\x6F\x67","\x4D\x79\x47\x61\x70\x68\x75\x62\x20\x52\x65\x6D\x69\x6E\x64\x65\x72","\x6D\x65\x73\x73\x61\x67\x65","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x77\x77\x77\x2E\x6D\x79\x67\x61\x70\x68\x75\x62\x2E\x63\x6F\x6D\x2F\x61\x70\x70\x2F\x61\x73\x73\x65\x74\x73\x2F\x69\x6D\x61\x67\x65\x73\x2F\x6C\x6F\x67\x6F\x2E\x70\x6E\x67","\x66\x6F\x63\x75\x73","\x63\x6C\x6F\x73\x65","\x63\x72\x65\x61\x74\x65","\x62\x69\x6E\x64"];var pusher= new Pusher(_0x5fbe[0],{cluster:_0x5fbe[1],encrypted:true});var channel=pusher[_0x5fbe[3]](_0x5fbe[2]);channel[_0x5fbe[12]](_0x5fbe[4],function(_0xc0dax3){console[_0x5fbe[5]](_0xc0dax3);Push[_0x5fbe[11]](_0x5fbe[6],{body:_0xc0dax3[_0x5fbe[7]],icon:_0x5fbe[8],timeout:5000,onClick:function(){window[_0x5fbe[9]]();this[_0x5fbe[10]]()}})})
    </script> 
    @endif

</body>
</html>
