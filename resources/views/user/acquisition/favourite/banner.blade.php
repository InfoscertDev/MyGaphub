<div class="wd-f" style="margin-left: 2rem;">
    <div class="gap-header d-flex " >
        <h5 class="gt">
            <span class="h3 pl-1"> Favourite Assets</span> 
            <span class="line-step mt-2" style="width: 20%;margin-left: 3px;"></span>
        </h5>
    </div> 

    <div class="wd-5 sm-wdf pl-3">
        <ul class="nav nav-tabs full-tab">
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('home/favourite') ? 'active' : '' }}" href="{{ route('favourite') }}">REAP</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home/favourite/ganp') ? 'active' : '' }}" href="{{ route('favourite_ganp') }}">GANP</a>
            </li>
        </ul>
    </div>
</div>