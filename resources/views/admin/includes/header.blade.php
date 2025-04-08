<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="main-profile">
            <div class="image-bx">
                <img src="https://demo.w3cms.in/lemars/public/images/no-user.png" alt="User profile">
            </div>
            <h5 class="name"><span class="font-w400">Hello,</span> {{auth()->user()->name}} </h5>
            {{-- <p class="role">{{implode(', ',auth()->user()->getRoleNames()->toArray()) }}</p> --}}
            {{-- <p class="email">{{auth()->user()->email}}</p> --}}
    </div>
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ url('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                
                @can('role-list')

                <a class="nav-link {{ Request::is('roles*') ? 'active' : '' }}" href="javascript:void(0)">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Roles
                </a>
                @endcan

                @can('user-list')
                <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="javascript:void(0)">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                </a>
                @endcan
                <a class="nav-link {{ Request::is('image-gallery*') ? 'active' : '' }}" href="javascript:void(0)">
                    <div class="sb-nav-link-icon"><i class="fa fa-file-image"></i></div>
                    Media
                </a>
            </div>
        </div>
    </nav>
</div>