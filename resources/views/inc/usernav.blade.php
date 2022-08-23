
<nav id="usernav" class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="https://www.mygaphub.com/">
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
                @else 
                    <li class="nav-item menu-nav">
                        <a href="{{ Route('home') }}" class="nav-link {{ Request::is('home') ? 'txt-primary' : '' }} "> Dashboard </a> 
                    </li>
                    <li class="nav-item menu-nav">
                        <a href="{{ Route('seed', ['preview' => 'sdwdcfuhghdsedxijdn'] ) }}" class="nav-link {{ Request::is('home/seed') ? 'txt-primary' : '' }}">SEED</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a href="{{ Route('user.actionplan') }}" class="nav-link {{ Request::is('home/actionplan') ? 'txt-primary' : '' }}">Action Plan</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a href="{{ Route('user.acquisition') }}" class="nav-link {{ Request::is('home/acquisition') ? 'txt-primary' : '' }}">Acquisition</a>
                    </li>
                   
                    <li class="nav-item menu-nav">
                      <a href="{{ route('portfolio') }}" class="nav-link {{ Request::is('home/portfolio') ? 'txt-primary' : '' }}">Portfolio</a>  
                    </li>
                    <li class="nav-item menu-nav">
                        <a href="{{ Route('7g') }}" class="nav-link {{ Request::is('home/7g') ? 'txt-primary' : '' }}">Analytics</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a href="{{ route('360') }}" class="nav-link {{ Request::is('home/360') ? 'txt-primary' : '' }}">360<sup>o</sup> </a>
                    </li>
                    <li class="nav-item menu-nav">
                       <a href="{{ Route('tools') }}" class="nav-link {{ Request::is('home/tools') ? 'txt-primary' : '' }}">Other Tools</a>  
                    </li> 
                    <br> 
                     
                    <li class="nav-item menu-nav">
                        <a href="{{ route('logout') }}"  class="nav-link"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                           Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<script>
    var navbar = document.getElementById("usernav");
    var sticky = navbar.offsetTop;
    // console.log('User Nav',window.pageYOffset , sticky);
     window.onscroll = function() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    };
</script> 
<!-- <script type="text/javascript">
    (function() {
        window.sib = {
            equeue: [], 
            client_key: "xwrdk9srs6n8xv2z6dt3d8ip"
        };
        /* OPTIONAL: email for identify request*/
        window.sendinblue = {};
        
        for (var j = ['track', 'identify', 'trackLink', 'page'], i = 0; i < j.length; i++) {
        (function(k) {
            window.sendinblue[k] = function() {
                var arg = Array.prototype.slice.call(arguments);
                (window.sib[k] || function() {
                        var t = {};
                        t[k] = arg;
                        window.sib.equeue.push(t);
                    })(arg[0], arg[1], arg[2]);
                };
            })(j[i]);
        }
        console.log(window.sendinblue);
        var n = document.createElement("script"),
            i = document.getElementsByTagName("script")[0];
        n.type = "text/javascript", n.id = "sendinblue-js", n.async = !0, n.src = "https://sibautomation.com/sa.js?key=" + window.sib.client_key, i.parentNode.insertBefore(n, i), window.sendinblue.page();
    })();
</script> -->

