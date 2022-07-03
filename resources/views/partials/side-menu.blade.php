<div class="left-menu">
    <div class="header-logo-box">
        <div class="img-box">
            <img src="{{ asset('img/logo-meu-portal.svg') }}">
        </div>
    </div>

    <div class="menu">
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->route()->named('classes.builder.*') ? 'active-lnk' : ''}}" href="{{ route('classes.builder.index') }}"> 
                <span class="menu-icon"><img src="{{ asset('img/icon-class-builder.svg')}}"></span> 
                Class Builder
            </a>

            <a class="nav-link {{ request()->route()->named('classes.live*') ? 'active-lnk' : ''}}" href="{{ route('classes.live') }}">
                <span class="menu-icon"><img src="{{ asset('img/icon-live-classes.svg')}}"></span> 
                Live Classes
            </a>

            <a class="nav-link {{ request()->route()->named('messages*') ? 'active-lnk' : ''}}" href="{{ route('messages') }}">
                <span class="menu-icon"><img src="{{ asset('img/icon-messages.svg')}}"></span> 
                Messages
            </a>

            <a class="nav-link {{ request()->route()->named('profile*') ? 'active-lnk' : ''}}" href="{{ route('profile') }}">
                <span class="menu-icon"><img src="{{ asset('img/icon-profile.svg')}}"></span> 
                Profile
            </a>
        </nav>
    </div>

    <div class="bottom-box">
        <div class="ad-box">
            <div class="img-box">
                <a href=""> <img src="{{ asset('img/Ad.svg')}}"></a>
            </div>
        </div>

        <div class="language-box">
            <div class="d-lg-block d-none dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink78"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                        class="flag-icon flag-icon-us"></span> English</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink78">
                    <a class="dropdown-item" href="de/index.html"><span
                            class="flag-icon flag-icon-de"></span> Deutsch</a>
                </div>
            </div>
        </div>
    </div>
</div>