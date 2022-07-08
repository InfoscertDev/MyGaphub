<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <!-- Styles --> 
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    {{-- <link href="{{ asset('assets/css/Chart.css') }}" rel="stylesheet"> 2.4--}}
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/mygap.css') }}" rel="stylesheet">
     
    <!-- Scripts -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script> 
    {{-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>   --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap');
        body{
          font-family: 'Roboto', sans-serif;
        }
        .big-message-error{
          font-size: 290%;
          color: rgb(82, 82, 82);
          margin: 0 auto;
          width: 75%;
        }
        .error-container{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .error-code{
          font-weight: 1900;
          /* font-weight: bold; */
          margin-bottom: 0;
          font-size: 900%;
          color: #ED3237;
          letter-spacing: 15px; 
        }
        .last{
            margin-bottom: 0;
            width: 40%;
            font-size: 18px;
            margin-top: 15px;
        }
        .home-page-text{
          color: #ED3237;
          font-weight: 800;
        }
        a{
          text-decoration: none !important;
        }
        form{
          margin-top: 25px;
        }
        button{
          background-color: #ED3237;
          color: white;
          border: 0 solid transparent;
          text-align: center;
          width: 13%;
          margin-left: 1%;
          border-radius: 40px;
          height: 50px;
        }
        .search-input{
          height: 50px;
          width: 28%;
          border: 1px solid rgb(122, 122, 122);
        }
        .search-input:focus{
  
        }
      </style>
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
                @include('inc.messages')
                <div class="my-4">
                    <div class="error-container">
                        <div>
                            <h1 class="error-code">@yield('code') </h1>
                        </div>
                        <div class="mt-4 mb-2 wd-f">
                            <p class="big-message-error text-center"> @yield('title')   </p>
                            <p class="big-message-error second text-center"> Error @yield('code')!</p>
                            <p class="last wd-8 text-center mx-auto">@yield('message') 
                                {{-- Can't find what you need? Take a moment and do a search below or start from our  --}}
                                <a  href="{{ route('home') }}"> 
                                    <span class="home-page-text">Go to home page! </span>
                                </a>
                            </p>
                        </div>
                        <div class="wd-f mt-2 mx-auto text-center">
                          <form action="" method="post">
                            <input class="search-input" type="text" placeholder="To search, type and hit enter">
                            <button>
                              Enter
                            </button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixed-bottom mob-nav">
                @include('inc.navbottom')
            </div>
        </main>
    </div>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    {{-- @yield('script') --}}
    {{-- @yield('script2') --}}
    {{-- <script src="{{ asset('assets/js/script.js') }}"></script> --}}
    
</body>
</html>
