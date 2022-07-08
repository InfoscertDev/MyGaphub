<ul class="nav nav-tabs full-tab">
    <li class="nav-item">
        <a class="nav-link  {{ Request::is('home/tools/profile') ? 'active' : '' }}" href="{{ route('profile') }}">Personal Profile</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('home/tools/security') ? 'active' : '' }}" href="{{ route('security') }}">Security</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('home/tools/compliance') ? 'active' : '' }}" href="{{ route('compliance') }}">Compliance</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('home/tools/preference') ? 'active' : '' }}" href="{{ route('preference') }}">Preference</a>
    </li>
</ul>