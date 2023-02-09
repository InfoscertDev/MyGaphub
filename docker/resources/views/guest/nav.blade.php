<nav id="navigation" class="navbar navbar-inverse navbar-custom" data-spy="affix" data-offset-top="35">
    <div class="container">
        <!-- === NAVBAR-HEADER ===  -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle hamburger" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
            <a href="{{url('/')}}" class="navbar-brand logo-1">
            
            </a>
        </div>
        <!-- ===MAIN-NAVBAR=== -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#header">Home</a></li>
                <li><a href="#about-us">About us</a></li>
                <li><a href="#our-service">How IT Works</a></li>
                <li><a href="#other-blog">Story</a></li>
                {{-- <li><a href="#counter">counter</a></li> --}}
                <li><a href="#counter">Transactions</a></li>
                @auth
                <li><a href="{{ url('/home') }}">Dashboard</a></li>
                @else   
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </div> 
    </div>
</nav>