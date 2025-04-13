<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="main-profile">
            <div class="image-bx">
                @if(!empty(auth()->user()->profile_image))
                <img src="{{ Storage::url(auth()->user()->profile_image) }}" alt="User profile">
                @else
                <img src="https://demo.w3cms.in/lemars/public/images/no-user.png" alt="User profile">
                @endif
            </div>
            <h5 class="name"><span class="font-w400">Hello,</span> {{auth()->user()->name}} </h5>
            {{-- <p class="role">{{implode(', ',auth()->user()->getRoleNames()->toArray()) }}</p> --}}
            {{-- <p class="email">{{auth()->user()->email}}</p> --}}
    </div>
    <div class="sb-sidenav-menu">
        <div class="nav">

            <li class="">
                <a class="nav-link {{ request()->is('restaurant-dashboard') || request()->is('dashboard') ? 'active' : '' }}" href="{{ dashboard_url() }}">
                    <div class="sb-nav-link-icon">
                        <svg class="svg-inline--fa fa-user" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path>
                        </svg>
                    </div>
                    Dashboard
                </a>
            </li>
            
            
            {!! generate_sidebar() !!}
        </div>
    </div>
    </nav>
</div>