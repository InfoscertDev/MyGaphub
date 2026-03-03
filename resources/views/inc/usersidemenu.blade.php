<nav class="sidenav">
    <ul class="list">
        <p class="list-item current-page {{ Request::is('home') ? 'active' : '' }} "> 
            <a href="{{ Route('home') }}" class=" {{ Request::is('home') ? 'txt-primary' : '' }} ">
                <img src="{{  Request::is('home') ? asset('/assets/icon/dashboard_red.png') : asset('/assets/icon/dashboard.png') }}" class="icon" alt="">
                  <span  class="bold">Dashboard</span>  </a> 
        </p> 
        <div class="seperate"></div>
        <h6 class="list-group-head">Planning</h6> 
        <li class="list-item {{str_contains(Request::url(),'home/seed') ? 'active' : '' }}">
            <a href="{{ Route('seed', ['preview' => 'sdwdcfuhghdsedxijdn'] ) }}" class="{{str_contains(Request::url(),'home/seed') ? 'txt-primary' : '' }}"> 
                {{-- <i class="fa fa-md fa-home mr-2"></i>  --}}
                <img src="{{str_contains(Request::url(),'home/seed') ? asset('/assets/icon/Seed_red.png') : asset('/assets/icon/Seed.png') }}" class="icon" alt="" style="width: 32px;height: 30px;margin-right: 4px;">
                <span class="bold" >SEED</span> <br>
                <h6 class="list-item-subtitle jp">(Budgeting)</h6>
            </a>
        </li>  

        <li class="list-item {{ Request::is('home/actionplan') ? 'active' : '' }}">
            <a href="{{ Route('user.actionplan') }}" class="{{ Request::is('home/actionplan') ? 'txt-primary' : '' }}">
             {{-- <i class="fa fa-md fa-home mr-2"></i> --}}
             <img src="{{  Request::is('home/actionplan') ? asset('/assets/icon/strategy_red.png') : asset('/assets/icon/strategy.png')  }}" class="icon" alt="" style="width: 36px;height: 34px;margin-right: 0px;">
             <span class="bold">Action Plan</span>  <br>
             <h6 class="list-item-subtitle jp">(Strategy)</h6> 
            </a>  
         </li> 
        <div class="seperate"></div>
        <h6 class="list-group-head">Execution</h6>
        <li class="list-item {{ str_contains(Request::url(),'acquisition') ? 'active' : '' }}">
            <a href="{{ Route('user.acquisition') }}" class="{{  str_contains(Request::url(),'acquisition') ? 'txt-primary' : '' }}"> 
                <img src="{{   str_contains(Request::url(),'acquisition') ? asset('/assets/icon/Acquisition_red.png') : asset('/assets/icon/Acquisition.png') }}" class="icon" alt="">
                <span  class="bold">Acquisition</span>
            </a>
        </li>
        <div class="seperate"></div>
        <h6 class="list-group-head">Management</h6>
        <li class="list-item {{ str_contains(Request::url(),'home/portfolio') ? 'active' : '' }}">
            <a href="{{ route('portfolio') }}" class="{{ str_contains(Request::url(),'home/portfolio') ? 'txt-primary' : '' }}">
                <img src="{{ str_contains(Request::url(),'home/portfolio') ? asset('/assets/icon/portfolio_red.png') : asset('/assets/icon/portfolio.png') }}" class="icon" alt="">
                    <span  class="bold">Portfolio</span>
            </a>  
        </li>
        <li class="list-item {{  str_contains(Request::url(),'home/7g') ? 'active' : '' }}">
            <a href="{{ Route('7g') }}" class="{{  str_contains(Request::url(),'home/7g') ? 'txt-primary' : '' }}">
                <img src="{{   str_contains(Request::url(),'home/7g') ? asset('/assets/icon/analytics_red.png') : asset('/assets/icon/analytics.png') }}" class="icon" alt="">
                <span  class="bold">Analytics</span>
            </a>
        </li>
        <li class="list-item {{  str_contains(Request::url(),'home/360') ? 'active' : '' }}">
            <a href="{{ route('360') }}" class="{{  str_contains(Request::url(),'home/360') ? 'txt-primary' : '' }}">
                <img src="{{   str_contains(Request::url(),'home/360') ? asset('/assets/icon/360_red.png') : asset('/assets/icon/360.png') }}" class="icon" style="width:34px; height:34px;" alt="">
                <span  class="bold">360<sup>o</sup></span>
            </a>
        </li>
        <div class="seperate"></div> 
        <h6 class="list-group-head"></h6>
         <li class="list-item {{ Request::is('home/feedback') ? 'active' : '' }}">
            <a href="{{ Route('feedback') }}" class=" {{ Request::is('home/feedback') ? 'txt-primary' : '' }}"> 
                <img src="{{  Request::is('home/feedback') ? asset('/assets/icon/feedback.png') : asset('/assets/icon/feedback.png') }}" class="icon" style="width:36px; height:36px;" alt="">
                <span  class="bold">Feedback</span>
            </a>  
         </li>
         <li class="list-item {{ Request::is('home/tools') ? 'active' : '' }}">
            <a href="{{ Route('tools') }}" class=" {{ Request::is('home/tools') ? 'txt-primary' : '' }}"> 
                <img src="{{  Request::is('home/tools') ? asset('/assets/icon/Other_tools_red.png') : asset('/assets/icon/Other_tools.png') }}" class="icon" style="width:36px; height:36px;" alt="">
                <span  class="bold">Other Tools</span>
            </a>  
         </li>
        {{-- <li class="list-item">
           <a href="{{ Route('reminder.index') }}" class=" {{ Request::is('home/reminders') ? 'txt-primary' : '' }}"> <i class="fa fa-md fa-home mr-2"></i>Reminder</a>  
        </li> 
        <li class="list-item">
           <a href="">Help</a>  
        </li>
        <li class="list-item">
           <a href="">Settings</a>   
        </li> --}}
        <div class="seperate"></div>
        
        <li class="list-item bg-none">
            <a href="{{ route('logout') }}" class="d-flex"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
               <span class="gt bold" >Logout</span>
               <span class="pull-right">    
                   <img src="{{ asset('/assets/images/mygap.png') }}" alt="" class="icon text-right">
               </span>
            </a> 
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>