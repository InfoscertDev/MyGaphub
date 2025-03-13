<nav class="sidenav">
    <ul class="list">
        <p class="list-item current-page {{ Request::is('gapadmin/dashboard') ? 'active' : '' }} ">
            <a href="{{ url('gapadmin/dashboard') }}" class=" {{ Request::is('gapadmin/dashboard') ? 'txt-primary' : '' }} ">
                {{-- <img src="{{  Request::is('gapadmin/dashboard') ? asset('/assets/icon/dashboard_red.png') : asset('/assets/icon/dashboard.png') }}" class="icon" alt=""> --}}
                  <span  class="bold">Dashboard</span>  </a>
        </p>

        <li class="list-item {{ Request::is('gapadmin/admins') ? 'active' : '' }}">
            <a href="{{ route('admins') }}" class="{{ Request::is('gapadmin/admins') ? 'txt-primary' : '' }}">
                {{-- <img src="{{ asset('/assets/icon/admins.png') }}" class="icon" alt=""> --}}
                    <span  class="bold">Admins</span>
            </a>
        </li>
        <li class="list-item {{ Request::is('gapadmin/users') ? 'active' : '' }}">
            <a href="{{ route('gap.users') }}" class="{{ Request::is('gapadmin/users') ? 'txt-primary' : '' }}">
                {{-- <img src="{{ asset('/assets/icon/portfolio.png') }}" class="icon" alt=""> --}}
                    <span  class="bold">Users</span>
            </a>
        </li>
        <li class="list-item {{ Request::is('gapadmin/report') ? 'active' : '' }}">
            <a href="{{ route('gap.report') }}" class="{{ Request::is('gapadmin/report') ? 'txt-primary' : '' }}">
                {{-- <img src="{{ asset('/assets/icon/portfolio.png') }}" class="icon" alt=""> --}}
                    <span  class="bold">Reports</span>
            </a>
        </li>
        <div class="seperate"></div>
         <h6 class="list-group-head">GAPhub Projects</h6>
         <li class="list-item {{ Request::is('gapadmin/products') ? 'active' : '' }}">
             <a href="{{ route('gap.products') }}" class="{{ Request::is('gapadmin/products') ? 'txt-primary' : '' }}">
                <span  class="bold">Products</span>
             </a>
         </li>
         <li class="list-item {{ Request::is('gapadmin/market-opportunities') ? 'active' : '' }}">
             <a href="{{ route('market-opportunities.index') }}" class="{{ Request::is('gapadmin/market-opportunities') ? 'txt-primary' : '' }}">
                <span  class="bold">Market Opportunities</span>
             </a>
         </li>
         <li class="list-item {{ Request::is('gapadmin/products') ? 'active' : '' }}">
             <a href="{{ route('gap.products') }}" class="{{ Request::is('gapadmin/products') ? 'txt-primary' : '' }}">
                <span  class="bold">Financial Intelligent</span>
             </a>
         </li>
        <div class="seperate"></div>
        <h6 class="list-group-head">Site Options</h6>
        <li class="list-item {{ Request::is('gapadmin/preference/exchange') ? 'active' : '' }}">
            <a href="{{ route('gap.exchange') }}" class="{{ Request::is('gapadmin/preference/exchange') ? 'txt-primary' : '' }}">
                    <span  class="bold">Preference</span>
            </a>
        </li>
        <li class="list-item {{ Request::is('gapadmin//pereference/exchange') ? 'active' : '' }}">
            <a href="{{ route('gap.acqusition') }}" class="{{ Request::is('gapadmin/analytics') ? 'txt-primary' : '' }}">
                    <span  class="bold">Acquisition CMS</span>
            </a>
        </li>
        <li class="list-item {{ Request::is('gapadmin//pereference/exchange') ? 'active' : '' }}">
            <a href="{{ route('gap.asset_type') }}" class="{{ Request::is('gapadmin/analytics') ? 'txt-primary' : '' }}">
                <span  class="bold">Asset Type</span>
            </a>
        </li>
        <div class="seperate"></div>
        <h6 class="list-group-head">Support</h6>

        <li class="list-item {{ Request::is('gapadmin/support') ? 'active' : '' }}">
            <a href="{{ route('gap.support') }}" class="{{ Request::is('gapadmin/support') ? 'txt-primary' : '' }}">
                {{-- <img src="{{  Request::is('gapadmin/support') ? asset('/assets/icon/support_red.png') : asset('/assets/icon/analytics.png') }}" class="icon" alt=""> --}}
                    <span  class="bold">Support</span>
            </a>
        </li>
        <li class="list-item {{ Request::is('gapadmin/feedbacks') ? 'active' : '' }}">
            <a href="{{ route('gap.support.feedbacks') }}" class="{{ Request::is('gapadmin/feedbacks') ? 'txt-primary' : '' }}">
                {{-- <img src="{{ asset('/assets/icon/portfolio.png') }}" class="icon" alt=""> --}}
                    <span  class="bold">Feedbacks</span>
            </a>
        </li>
        <div class="seperate"></div>
        <li class="list-item bg-none">
            <a href="{{ route('logout') }}" class="d-flex"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
               <span class="gt bold" >Logout</span>
               <span class="pull-right">
                   {{-- <img src="{{ asset('/assets/images/mygap.png') }}" alt="" class="icon text-right"> --}}
               </span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
