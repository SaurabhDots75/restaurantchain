<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="main-profile">
            <div class="image-bx">
                <img src="https://demo.w3cms.in/lemars/public/images/no-user.png" alt="User profile">
                <a href="#"><i class="fa fa-cog" aria-hidden="true"></i></a>
            </div>
            <h5 class="name"><span class="font-w400">Hello,</span> {{auth()->user()->name}} </h5>
            <p class="role">{{implode(', ',auth()->user()->getRoleNames()->toArray()) }}</p>
            <p class="email">{{auth()->user()->email}}</p>
    </div>
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link active" href="{{ url('/admin/home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSettings" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                    Settings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSettings" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.settings') }}">Basic Website Setting</a>
                        <a class="nav-link active" href="{{ route('admin.header-settings') }}">Header Setting</a>
                        <a class="nav-link" href="{{ route('admin.footer-settings') }}">Footer Setting</a>
                        <a class="nav-link" href="{{ route('admin.menus') }}">Menu</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-signs-post"></i></div>
                    Posts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePosts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav aria-label="Close" class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.postcategories') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div> Post Category</a>
                        <a class="nav-link" href="{{ route('admin.posts.index') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-signs-post"></i></div> Post</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-file"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav aria-label="Close" class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.pages.index') }}"><div class="sb-nav-link-icon"><i class="fa-regular fa-file"></i></div> Pages</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFaqs" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-question"></i></div>
                    Faqs
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFaqs" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav aria-label="Close" class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.faqcategories.index') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>FAQ Category</a>
                        <a class="nav-link" href="{{ route('admin.faqs.index') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-question"></i></div> FAQ</a>
                    </nav>
                </div>
                <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div> -->
                <div class="sb-sidenav-menu-heading">Masters</div>
                <a class="nav-link" href="{{ route('admin.roles.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Roles
                </a>
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                </a>
                <a class="nav-link" href="{{ route('admin.image-gallery') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Media
                </a>
            </div>
        </div>
    </nav>
</div>