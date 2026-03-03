<nav class="sidenav">
    <p class="current-page"> 
        <a href="{{ Route('home') }}" class=" {{ Request::is('home') ? 'txt-primary' : '' }} "> My Dashboard </a> 
    </p>
    <ul class="list">
        {{-- <li class="list-item">
            <a href="">SEED</a>
        </li>  --}}
        <li class="list-item">
            <a href="{{ Route('user.acquisition') }}" class="{{ Request::is('home/acquisition') ? 'txt-primary' : '' }}">Acquisition</a>
        </li>
        <li class="list-item">
          <a href="" class="{{ Request::is('home/portfolio') ? 'txt-primary' : '' }}">Portfolio</a>  
        </li>
        <li class="list-item">
            <a href="{{ Route('7g') }}" class="{{ Request::is('home/7g') ? 'txt-primary' : '' }}">Analytics</a>
        </li>
        <li class="list-item">
            <a href="" class="{{ Request::is('home/360') ? 'txt-primary' : '' }}">360<sup>o</sup> </a>
        </li>
        <li class="list-item">
           <a href="{{ Route('user.actionplan') }}" class="{{ Request::is('home/actionplan') ? 'txt-primary' : '' }}">Action Plan</a>  
        </li> 
        <li class="list-item">
           <a href="{{ Route('reminder.index') }}" class=" {{ Request::is('home/reminders') ? 'txt-primary' : '' }}">Reminder</a>  
        </li>
        <li class="list-item">
           <a href="">Help</a>  
        </li>
        <li class="list-item">
           <a href="">Settings</a>   
        </li>
        <br>
        
        <li class="list-item">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
               Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>