<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="main-profile">
            <div class="image-bx">
                <img src="https://demo.w3cms.in/lemars/public/images/no-user.png" alt="User profile">
            </div>
            <h5 class="name"><span class="font-w400">Hello,</span> {{auth()->user()->name}} </h5>
            <p class="role">{{implode(', ',auth()->user()->getRoleNames()->toArray()) }}</p>
            <p class="email">{{auth()->user()->email}}</p>
    </div>
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ Request::is('admin/home') ? 'active' : '' }}" href="{{ url('/admin/home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link {{ Request::is('admin/settings*') ? 'active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSettings" aria-expanded="{{ Request::is('admin/settings*') ? 'true' : 'false' }}" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                    Settings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/settings*') ? 'show' : '' }}" id="collapseSettings" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/settings/basic-setting') ? 'active' : '' }}" href="{{ route('admin.settings') }}"><i class="fa-solid fa-gear"></i>&nbsp;Basic Website Setting</a>
                        {{-- <a class="nav-link active" href="{{ route('admin.header-settings') }}">Header Setting</a> --}}
                        {{-- <a class="nav-link {{ Request::is('admin/settings/footer-settings') ? 'active' : '' }}" href="{{ route('admin.footer-settings') }}"><i class="fa-solid fa-gear"></i> &nbsp;Footer Setting</a> --}}
                        <a class="nav-link {{ Request::is('admin/settings/menus') ? 'active' : '' }}" href="{{ route('admin.menus') }}"><i class="fa-solid fa-bars"></i> &nbsp;Menu</a>
                    </nav>
                </div>
                {{-- <a class="nav-link {{ Request::is('admin/posts*') ? 'active' : 'collapsed' }}" href="{{ route('admin.posts.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-signs-post"></i></div>
                    Posts
                </a>
                <div class="collapse" id="collapsePosts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav aria-label="Close" class="sb-sidenav-menu-nested nav">
                        <!-- <a class="nav-link" href="{{ route('admin.postcategories') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div> Post Category</a> -->
                        <a class="nav-link" href="{{ route('admin.posts.index') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-signs-post"></i></div> Post</a>
                    </nav>
                </div> --}}
                <a class="nav-link {{ Request::is('admin/pages*') ? 'active' : 'collapsed' }}" href="{{ route('admin.pages.index') }}" >
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-file"></i></div>
                    Pages
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav aria-label="Close" class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.pages.index') }}"><div class="sb-nav-link-icon"><i class="fa-regular fa-file"></i></div> Pages</a>
                    </nav>
                </div>
                <a class="nav-link {{ Request::is('admin/faqcategories*') || Request::is('admin/faqs*') ? 'active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFaqs" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-question"></i></div>
                    Faqs
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/faqcategories*') || Request::is('admin/faqs*') ? 'show' : '' }}" id="collapseFaqs" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav aria-label="Close" class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/faqcategories*') ? 'active' : '' }}" href="{{ route('admin.faqcategories.index') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>FAQ Category</a>
                        <a class="nav-link {{ Request::is('admin/faqs*') ? 'active' : '' }}" href="{{ route('admin.faqs.index') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-question"></i></div> FAQ</a>
                    </nav>
                </div>

                {{-- <div class="sb-sidenav-menu-heading">Product Section</div>
                <a class="nav-link {{ (Request::is('admin/products*') || Request::is('admin/product-pages*')) ? 'active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseReports" aria-expanded="{{ Request::is('admin/settings*') ? 'true' : 'false' }}" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                    Products
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ (Request::is('admin/products*') || Request::is('admin/product-pages*')) ? 'show' : '' }}" id="collapseReports" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/products/categories') ? 'active' : '' }}" href="{{ route('admin.categories') }}"><i class="fa-solid fa-list"></i>&nbsp;Category</a>
                        <a class="nav-link {{ Request::is('admin/products/product-attributes') ? 'active' : '' }}" href="{{ route('admin.products.product-attributes.index') }}"><i class="fa-solid fa-gear"></i>&nbsp;Attributes</a>
                        <a class="nav-link {{ Request::is('admin/product-pages*') ? 'active' : '' }}" href="{{ route('admin.product-pages.index') }}"><i class="fa-solid fa-gear"></i>&nbsp;Products</a>
                    </nav>
                </div> --}}
                <div class="sb-sidenav-menu-heading">Reports Section</div>
                <a class="nav-link {{ Request::is('admin/reports*') ? 'active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseReports" aria-expanded="{{ Request::is('admin/settings*') ? 'true' : 'false' }}" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                    Reports
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/reports*') ? 'show' : '' }}" id="collapseReports" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/reports/enq-report') ? 'active' : '' }}" href="{{ route('admin.enq-report') }}"><i class="fa-solid fa-gear"></i>&nbsp;Enquiry Report</a>
                        <a class="nav-link {{ Request::is('admin/reports/proofs-quotes-report') ? 'active' : '' }}" href="{{ route('admin.proofs-quotes-report') }}"><i class="fa-solid fa-receipt"></i>&nbsp;Quotes & Proofs Report</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Masters</div>
                <a class="nav-link {{ Request::is('admin/roles*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Roles
                </a>
                @can('user-list')
                <a class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                </a>
                @endcan
                <a class="nav-link {{ Request::is('admin/restaurants*') ? 'active' : '' }}" href="{{ route('admin.restaurants.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Restaurant Management
                </a>
                <a class="nav-link {{ Request::is('admin/image-gallery*') ? 'active' : '' }}" href="{{ route('admin.image-gallery') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Media
                </a>
            </div>
        </div>
    </nav>
</div>