

<nav id="gapnav" class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="https://mygaphub.com">
            <img src="{{ asset('/assets/images/logo.png')}}" class="logo_main" alt="Logo_Src-Small_71_243" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://mygaphub.com">Home</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/gap-budgeting/">Budgeting</a>
                    </li>
                    
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/acquisition/">Acquisition</a>
                    </li>
                    <li class="nav-item menu-nav"> 
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/portfolio/">Portfolio</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/analytics/">Analytics</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/personal-finance-360-degree/">360<sup>o</sup></a>
                    </li> 
                    <li class="nav-item menu-nav">
                        <div class="dropdown" onmouseover="showDrop()" onmouseout="removeDrop()">
                            <a class="nav-link"  href="#" style="color: #222;" role="button" id="dropdownMenuLink" data-toggle="dropdown" >
                               More
                            </a>

                            <div class="dropdown-menu" id="gapDropdown" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('register') }}">Sign Up</a>
                                <a class="dropdown-item" href="https://www.mygaphub.com/index.php/masonry/">Blog</a>
                                <a class="dropdown-item" href="https://www.mygaphub.com/index.php/contact-us/">Contact Us</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item menu-nav access">
                        <a class="nav-link" href="{{ route('login') }}">Get Access</a>
                    </li>
                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif  --}}
                    {{-- <li class="nav-item menu-nav">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li> --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<script>
    var navbar = document.getElementById("gapnav");
    var sticky = navbar.offsetTop;
     window.onscroll = function() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    };
    function showDrop(){
        var dropdown = document.getElementById('gapDropdown');
        dropdown.classList.add('show');
    }
    function removeDrop(){
        var dropdown = document.getElementById('gapDropdown');
        dropdown.classList.remove('show');
    }
    // function sticky() {
    //     if (window.pageYOffset >= sticky) {
    //         navbar.classList.add("sticky")
    //     } else { 
    //         navbar.classList.remove("sticky");
    //     }
    // }
   

</script>

{{-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav> --}}