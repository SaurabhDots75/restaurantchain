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
            {!! generate_sidebar() !!}
        </div>
    </div>
    </nav>
</div>