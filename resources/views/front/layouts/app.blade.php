<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Print 4 Less') }}</title>
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.printit4less.com/wp-content/themes/PrintIt4Less/favicon-32x32.png">
    <link rel='stylesheet' href="{{asset('/front/css/bootstrap.min.css')}}" />
    <link rel='stylesheet' href="{{asset('/front/css/owl.carousel.min.css')}}" />
    <link rel='stylesheet' href="{{asset('/front/css/style.css')}}" media='' />
    <link rel='stylesheet' href="{{asset('/front/css/font-awesome.css')}}" />
</head>

<body>
    <div class="container">
        <div class="header-sec">

            <div class="logo"><a href="#"><img src="{{asset('')}}front/images/logo.png" alt=""></a></div>
            <div class="search-desktop">
                <div class="aws-container" data-url="/?wc-ajax=aws_action" data-siteurl="https://www.printit4less.com" data-lang="" data-show-loader="true" data-show-more="false" data-show-page="true" data-ajax-search="true" data-show-clear="false" data-mobile-screen="false" data-use-analytics="false" data-min-chars="1" data-buttons-order="1" data-timeout="300" data-is-mobile="false" data-page-id="18" data-tax="">
                    <form class="aws-search-form" action="https://www.printit4less.com/" method="get" role="search">
                        <div class="aws-wrapper"><input type="search" name="" id="" value="" class="aws-search-field" placeholder="Search" autocomplete="">
                            <input type="hidden" name="post_type" value="product"><input type="hidden" name="type_aws" value="true">
                        </div>
                    </form>
                </div>
            </div>
            <div class="right-utility">

                <div class="head-right-box">
                    <a href="#"><img class="head-icon" src="{{asset('')}}front/images/contact-us.png" data-src="" alt=""><strong>Contact us</strong></a>
                </div>

                @auth
                    <div class="head-right-box">
                        <a href="{{ route('admin.home') }}">
                            <img class="head-icon" src="{{ asset('front/images/shop-user.png') }}" alt="My Account">
                            <strong>My Account</strong>
                        </a>
                    </div>
                @endauth

                @guest
                    <div class="head-right-box">
                        <a href="{{ route('admin.login') }}">
                            <img class="head-icon" src="{{ asset('front/images/shop-user.png') }}" alt="Login">
                            <strong>Login</strong>
                        </a>
                    </div>
                @endguest

                <div class="head-right-box">
                    <a href="#"><img class="head-icon" src="{{asset('')}}front/images/cart.png" data-src="" alt=""><strong>Basket</strong></a>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Home
                        </a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a class="dropdown-item" href="#">About Us</a></li>
                                <li><a class="dropdown-item" href="#">Blog</a></li>
                                <li><a class="dropdown-item" href="#">Contact Us</a></li>
                                <li><a class="dropdown-item" href="#">Conditions of Use</a></li>

                            </ul>
                            <ul>
                                <li><a class="dropdown-item" href="#">Privacy Notice</a></li>
                                <li><a class="dropdown-item" href="#">Reorder</a></li>
                                <li><a class="dropdown-item" href="#">Shipping Info</a></li>
                                <li><a class="dropdown-item" href="#">Quotes & Proofs</a></li>
                            </ul>

                        </div>
                    </li>



                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Forms by Type
                        </a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a class="dropdown-item" href="#">Bills of Lading</a></li>
                                <li><a class="dropdown-item" href="#">State of Texas</a></li>
                                <li><a class="dropdown-item" href="#">Custom Forms</a></li>
                                <li><a class="dropdown-item" href="#">Invoice Forms</a></li>
                                <li><a class="dropdown-item" href="#">Receipt Books</a></li>

                            </ul>
                            <ul>
                                <li><a class="dropdown-item" href="#">Register Forms</a></li>
                                <li><a class="dropdown-item" href="#">Work Order Forms</a></li>
                                <li><a class="dropdown-item" href="#">Door Hangers</a></li>
                                <li><a class="dropdown-item" href="#">Labels - Tags</a></li>
                                <li><a class="dropdown-item" href="#">Parking Signs</a></li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Products by Industry
                        </a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a class="dropdown-item" href="#">Apparel Sales</a></li>
                                <li><a class="dropdown-item" href="#">Appliance Repair Forms</a></li>
                                <li><a class="dropdown-item" href="#">Auto Service</a></li>
                                <li><a class="dropdown-item" href="#">Electrical Contractor Forms</a></li>
                                <li><a class="dropdown-item" href="#">Flooring Contractors</a></li>
                                <li><a class="dropdown-item" href="#">Flower Shops</a></li>
                                <li><a class="dropdown-item" href="#">Food Services</a></li>

                            </ul>
                            <ul>
                                <li><a class="dropdown-item" href="#">Garage Door Companies</a></li>
                                <li><a class="dropdown-item" href="#">General Contractors Forms</a></li>
                                <li><a class="dropdown-item" href="#">HVAC Service</a></li>
                                <li><a class="dropdown-item" href="#">Janitorial Forms</a></li>
                                <li><a class="dropdown-item" href="#">Landscaping Companies</a></li>
                                <li><a class="dropdown-item" href="#">Locksmith Business</a></li>
                                <li><a class="dropdown-item" href="#">Medical Office Forms</a></li>
                            </ul>

                            <ul>
                                <li><a class="dropdown-item" href="#">Pest Control Forms</a></li>
                                <li><a class="dropdown-item" href="#">Plumbing Companies</a></li>
                                <li><a class="dropdown-item" href="#">Pool-Spa Services</a></li>
                                <li><a class="dropdown-item" href="#">Property Management</a></li>
                                <li><a class="dropdown-item" href="#">Retail Stores</a></li>
                                <li><a class="dropdown-item" href="#">Towing - Roadside Services Forms</a></li>
                                <li><a class="dropdown-item" href="#">Trucking Companies</a></li>
                            </ul>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Office Supplies
                        </a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a class="dropdown-item" href="#">Aluminum Portfolios</a></li>
                                <li><a class="dropdown-item" href="#">Custom Forms</a></li>
                                <li><a class="dropdown-item" href="#">Receipt Books</a></li>
                                <li><a class="dropdown-item" href="#">Business Cards</a></li>
                                <li><a class="dropdown-item" href="#">Envelopes</a></li>
                                <li><a class="dropdown-item" href="#">Letterheads</a></li>

                            </ul>
                            <ul>
                                <li><a class="dropdown-item" href="#">Personalized Notepads</a></li>
                                <li><a class="dropdown-item" href="#">Address Labels</a></li>
                                <li><a class="dropdown-item" href="#">Shipping Labels</a></li>
                                <li><a class="dropdown-item" href="#">Register Forms</a></li>
                                <li><a class="dropdown-item" href="#">Register Machines</a></li>
                                <li><a class="dropdown-item" href="#">Marketing Postcards</a></li>

                            </ul>
                        </div>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Labels - Tags
                        </a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a class="dropdown-item" href="#">Auto Stickers</a></li>
                                <li><a class="dropdown-item" href="#">Electrical Labels</a></li>
                                <li><a class="dropdown-item" href="#">Plumbing Labels</a></li>
                                <li><a class="dropdown-item" href="#">Call for Service Labels</a></li>
                                <li><a class="dropdown-item" href="#">Custom Printed Labels</a></li>
                                <li><a class="dropdown-item" href="#">Fire Equipment Labels</a></li>
                                <li><a class="dropdown-item" href="#">Shipping Labels</a></li>

                            </ul>
                            <ul>
                                <li><a class="dropdown-item" href="#">HVAC Labels & Tags</a></li>
                                <li><a class="dropdown-item" href="#">Apparel Tags</a></li>
                                <li><a class="dropdown-item" href="#">Inventory Tags</a></li>
                                <li><a class="dropdown-item" href="#">Repair Tags</a></li>
                                <li><a class="dropdown-item" href="#">Custom Printed Tags</a></li>
                                <li><a class="dropdown-item" href="#">Fire Equipment Tags</a></li>
                                <li><a class="dropdown-item" href="#">Valet Parking Tags</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Labels - Tags
                        </a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a class="dropdown-item" href="#">Brochures</a></li>
                                <li><a class="dropdown-item" href="#">Business Cards</a></li>
                                <li><a class="dropdown-item" href="#">Coasters</a></li>
                                <li><a class="dropdown-item" href="#">Door Hangers</a></li>
                                <li><a class="dropdown-item" href="#">Flyers</a></li>

                            </ul>
                            <ul>
                                <li><a class="dropdown-item" href="#">Notepads</a></li>
                                <li><a class="dropdown-item" href="#">PostCards</a></li>
                                <li><a class="dropdown-item" href="#">Printing Posters</a></li>
                                <li><a class="dropdown-item" href="#">Promotional Bags</a></li>
                                <li><a class="dropdown-item" href="#">Stationery</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Labels - Tags
                        </a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a class="dropdown-item" href="#">Upload Your Logo</a></li>
                                <li><a class="dropdown-item" href="#">Shop By Brands</a></li>
                                <li><a class="dropdown-item" href="#">Embroidery</a></li>
                                <li><a class="dropdown-item" href="#">Maintenance</a></li>
                                <li><a class="dropdown-item" href="#">Security Uniform</a></li>
                                <li><a class="dropdown-item" href="#">Staff Uniform</a></li>
                                <li><a class="dropdown-item" href="#">Valet Parking</a></li>

                            </ul>
                            <ul>
                                <li><a class="dropdown-item" href="#">Automotive</a></li>
                                <li><a class="dropdown-item" href="#">Contractor</a></li>
                                <li><a class="dropdown-item" href="#">Electrical</a></li>
                                <li><a class="dropdown-item" href="#">Food Industry</a></li>
                                <li><a class="dropdown-item" href="#">Group Shirts</a></li>
                                <li><a class="dropdown-item" href="#">Hi-Vis Safety</a></li>
                                <li><a class="dropdown-item" href="#">HVAC</a></li>
                            </ul>
                            <ul>
                                <li><a class="dropdown-item" href="#">Landscaping</a></li>
                                <li><a class="dropdown-item" href="#">Locksmith</a></li>
                                <li><a class="dropdown-item" href="#">Pest Control</a></li>
                                <li><a class="dropdown-item" href="#">Plumbing</a></li>
                                <li><a class="dropdown-item" href="#">Roofing</a></li>
                                <li><a class="dropdown-item" href="#">Towing</a></li>
                                <li><a class="dropdown-item" href="#">US Armed Forces</a></li>
                            </ul>


                    <li><a class="btn" href="#">Get A Quote</a></li>
            </div>
            </li>



            </ul>

        </div>
        </div>
    </nav>
    @yield('contents')
    <footer class="footer">

        <div class="container">
            <a href="#" class="footer-logo">
                <img class="footer-logo" src="{{asset('')}}front/images/logo.png" alt="Printit4less">
            </a>


            <div class="cc-logos">
                <svg class="svg-inline--fa fa-cc-visa fa-w-18" aria-hidden="true" data-prefix="fab" data-icon="cc-visa" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M470.1 231.3s7.6 37.2 9.3 45H446c3.3-8.9 16-43.5 16-43.5-.2.3 3.3-9.1 5.3-14.9l2.8 13.4zM576 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h480c26.5 0 48 21.5 48 48zM152.5 331.2L215.7 176h-42.5l-39.3 106-4.3-21.5-14-71.4c-2.3-9.9-9.4-12.7-18.2-13.1H32.7l-.7 3.1c15.8 4 29.9 9.8 42.2 17.1l35.8 135h42.5zm94.4.2L272.1 176h-40.2l-25.1 155.4h40.1zm139.9-50.8c.2-17.7-10.6-31.2-33.7-42.3-14.1-7.1-22.7-11.9-22.7-19.2.2-6.6 7.3-13.4 23.1-13.4 13.1-.3 22.7 2.8 29.9 5.9l3.6 1.7 5.5-33.6c-7.9-3.1-20.5-6.6-36-6.6-39.7 0-67.6 21.2-67.8 51.4-.3 22.3 20 34.7 35.2 42.2 15.5 7.6 20.8 12.6 20.8 19.3-.2 10.4-12.6 15.2-24.1 15.2-16 0-24.6-2.5-37.7-8.3l-5.3-2.5-5.6 34.9c9.4 4.3 26.8 8.1 44.8 8.3 42.2.1 69.7-20.8 70-53zM528 331.4L495.6 176h-31.1c-9.6 0-16.9 2.8-21 12.9l-59.7 142.5H426s6.9-19.2 8.4-23.3H486c1.2 5.5 4.8 23.3 4.8 23.3H528z"></path>
                </svg><!-- <i class="fab fa-cc-visa"></i> -->
                <svg class="svg-inline--fa fa-cc-mastercard fa-w-18" aria-hidden="true" data-prefix="fab" data-icon="cc-mastercard" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M482.9 410.3c0 6.8-4.6 11.7-11.2 11.7-6.8 0-11.2-5.2-11.2-11.7 0-6.5 4.4-11.7 11.2-11.7 6.6 0 11.2 5.2 11.2 11.7zm-310.8-11.7c-7.1 0-11.2 5.2-11.2 11.7 0 6.5 4.1 11.7 11.2 11.7 6.5 0 10.9-4.9 10.9-11.7-.1-6.5-4.4-11.7-10.9-11.7zm117.5-.3c-5.4 0-8.7 3.5-9.5 8.7h19.1c-.9-5.7-4.4-8.7-9.6-8.7zm107.8.3c-6.8 0-10.9 5.2-10.9 11.7 0 6.5 4.1 11.7 10.9 11.7 6.8 0 11.2-4.9 11.2-11.7 0-6.5-4.4-11.7-11.2-11.7zm105.9 26.1c0 .3.3.5.3 1.1 0 .3-.3.5-.3 1.1-.3.3-.3.5-.5.8-.3.3-.5.5-1.1.5-.3.3-.5.3-1.1.3-.3 0-.5 0-1.1-.3-.3 0-.5-.3-.8-.5-.3-.3-.5-.5-.5-.8-.3-.5-.3-.8-.3-1.1 0-.5 0-.8.3-1.1 0-.5.3-.8.5-1.1.3-.3.5-.3.8-.5.5-.3.8-.3 1.1-.3.5 0 .8 0 1.1.3.5.3.8.3 1.1.5s.2.6.5 1.1zm-2.2 1.4c.5 0 .5-.3.8-.3.3-.3.3-.5.3-.8 0-.3 0-.5-.3-.8-.3 0-.5-.3-1.1-.3h-1.6v3.5h.8V426h.3l1.1 1.4h.8l-1.1-1.3zM576 81v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V81c0-26.5 21.5-48 48-48h480c26.5 0 48 21.5 48 48zM64 220.6c0 76.5 62.1 138.5 138.5 138.5 27.2 0 53.9-8.2 76.5-23.1-72.9-59.3-72.4-171.2 0-230.5-22.6-15-49.3-23.1-76.5-23.1-76.4-.1-138.5 62-138.5 138.2zm224 108.8c70.5-55 70.2-162.2 0-217.5-70.2 55.3-70.5 162.6 0 217.5zm-142.3 76.3c0-8.7-5.7-14.4-14.7-14.7-4.6 0-9.5 1.4-12.8 6.5-2.4-4.1-6.5-6.5-12.2-6.5-3.8 0-7.6 1.4-10.6 5.4V392h-8.2v36.7h8.2c0-18.9-2.5-30.2 9-30.2 10.2 0 8.2 10.2 8.2 30.2h7.9c0-18.3-2.5-30.2 9-30.2 10.2 0 8.2 10 8.2 30.2h8.2v-23zm44.9-13.7h-7.9v4.4c-2.7-3.3-6.5-5.4-11.7-5.4-10.3 0-18.2 8.2-18.2 19.3 0 11.2 7.9 19.3 18.2 19.3 5.2 0 9-1.9 11.7-5.4v4.6h7.9V392zm40.5 25.6c0-15-22.9-8.2-22.9-15.2 0-5.7 11.9-4.8 18.5-1.1l3.3-6.5c-9.4-6.1-30.2-6-30.2 8.2 0 14.3 22.9 8.3 22.9 15 0 6.3-13.5 5.8-20.7.8l-3.5 6.3c11.2 7.6 32.6 6 32.6-7.5zm35.4 9.3l-2.2-6.8c-3.8 2.1-12.2 4.4-12.2-4.1v-16.6h13.1V392h-13.1v-11.2h-8.2V392h-7.6v7.3h7.6V416c0 17.6 17.3 14.4 22.6 10.9zm13.3-13.4h27.5c0-16.2-7.4-22.6-17.4-22.6-10.6 0-18.2 7.9-18.2 19.3 0 20.5 22.6 23.9 33.8 14.2l-3.8-6c-7.8 6.4-19.6 5.8-21.9-4.9zm59.1-21.5c-4.6-2-11.6-1.8-15.2 4.4V392h-8.2v36.7h8.2V408c0-11.6 9.5-10.1 12.8-8.4l2.4-7.6zm10.6 18.3c0-11.4 11.6-15.1 20.7-8.4l3.8-6.5c-11.6-9.1-32.7-4.1-32.7 15 0 19.8 22.4 23.8 32.7 15l-3.8-6.5c-9.2 6.5-20.7 2.6-20.7-8.6zm66.7-18.3H408v4.4c-8.3-11-29.9-4.8-29.9 13.9 0 19.2 22.4 24.7 29.9 13.9v4.6h8.2V392zm33.7 0c-2.4-1.2-11-2.9-15.2 4.4V392h-7.9v36.7h7.9V408c0-11 9-10.3 12.8-8.4l2.4-7.6zm40.3-14.9h-7.9v19.3c-8.2-10.9-29.9-5.1-29.9 13.9 0 19.4 22.5 24.6 29.9 13.9v4.6h7.9v-51.7zm7.6-75.1v4.6h.8V302h1.9v-.8h-4.6v.8h1.9zm6.6 123.8c0-.5 0-1.1-.3-1.6-.3-.3-.5-.8-.8-1.1-.3-.3-.8-.5-1.1-.8-.5 0-1.1-.3-1.6-.3-.3 0-.8.3-1.4.3-.5.3-.8.5-1.1.8-.5.3-.8.8-.8 1.1-.3.5-.3 1.1-.3 1.6 0 .3 0 .8.3 1.4 0 .3.3.8.8 1.1.3.3.5.5 1.1.8.5.3 1.1.3 1.4.3.5 0 1.1 0 1.6-.3.3-.3.8-.5 1.1-.8.3-.3.5-.8.8-1.1.3-.6.3-1.1.3-1.4zm3.2-124.7h-1.4l-1.6 3.5-1.6-3.5h-1.4v5.4h.8v-4.1l1.6 3.5h1.1l1.4-3.5v4.1h1.1v-5.4zm4.4-80.5c0-76.2-62.1-138.3-138.5-138.3-27.2 0-53.9 8.2-76.5 23.1 72.1 59.3 73.2 171.5 0 230.5 22.6 15 49.5 23.1 76.5 23.1 76.4.1 138.5-61.9 138.5-138.4z"></path>
                </svg><!-- <i class="fab fa-cc-mastercard"></i> -->
                <svg class="svg-inline--fa fa-cc-amex fa-w-18" aria-hidden="true" data-prefix="fab" data-icon="cc-amex" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M576 255.4c-37.9-.2-44.2-.9-54.5 5v-5c-45.3 0-53.5-1.7-64.9 5.2v-5.2h-78.2v5.1c-11.4-6.5-21.4-5.1-75.7-5.1v5.6c-6.3-3.7-14.5-5.6-24.3-5.6h-58c-3.5 3.8-12.5 13.7-15.7 17.2-12.7-14.1-10.5-11.6-15.5-17.2h-83.1v92.3h82c3.3-3.5 12.9-13.9 16.1-17.4 12.7 14.3 10.3 11.7 15.4 17.4h48.9c0-14.7.1-8.3.1-23 11.5.2 24.3-.2 34.3-6.2 0 13.9-.1 17.1-.1 29.2h39.6c0-18.5.1-7.4.1-25.3 6.2 0 7.7 0 9.4.1.1 1.3 0 0 0 25.2 152.8 0 145.9 1.1 156.7-4.5v4.5c34.8 0 54.8 2.2 67.5-6.1V432c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V228.3h26.6c4.2-10.1 2.2-5.3 6.4-15.3h19.2c4.2 10 2.2 5.2 6.4 15.3h52.9v-11.4c2.2 5 1.1 2.5 5.1 11.4h29.5c2.4-5.5 2.6-5.8 5.1-11.4v11.4h135.5v-25.1c6.4 0 8-.1 9.8.2 0 0-.2 10.9.1 24.8h66.5v-8.9c7.4 5.9 17.4 8.9 29.7 8.9h26.8c4.2-10.1 2.2-5.3 6.4-15.3h19c6.5 15 .2.5 6.6 15.3h52.8v-21.9c11.8 19.7 7.8 12.9 13.2 21.9h41.6v-92h-39.9v18.4c-12.2-20.2-6.3-10.4-11.2-18.4h-43.3v20.6c-6.2-14.6-4.6-10.8-8.8-20.6h-32.4c-.4 0-2.3.2-2.3-.3h-27.6c-12.8 0-23.1 3.2-30.7 9.3v-9.3h-39.9v5.3c-10.8-6.1-20.7-5.1-64.4-5.3-.1 0-11.6-.1-11.6 0h-103c-2.5 6.1-6.8 16.4-12.6 30-2.8-6-11-23.8-13.9-30h-46V157c-7.4-17.4-4.7-11-9-21.1H22.9c-3.4 7.9-13.7 32-23.1 53.9V80c0-26.5 21.5-48 48-48h480c26.5 0 48 21.5 48 48v175.4zm-186.6-80.6c-.3.2-1.4 2.2-1.4 7.6 0 6 .9 7.7 1.1 7.9.2.1 1.1.5 3.4.5l7.3-16.9c-1.1 0-2.1-.1-3.1-.1-5.6 0-7 .7-7.3 1zm-19.9 130.9c9.2 3.3 11 9.5 11 18.4l-.1 13.8h-16.6l.1-11.5c0-11.8-3.8-13.8-14.8-13.8h-17.6l-.1 25.3h-16.6l.1-69.3h39.4c13 0 27.1 2.3 27.1 18.7-.1 7.6-4.2 15.3-11.9 18.4zm-6.3-15.4c0-6.4-5.6-7.4-10.7-7.4h-21v15.6h20.7c5.6 0 11-1.3 11-8.2zm181.7-7.1H575v-14.6h-32.9c-12.8 0-23.8 6.6-23.8 20.7 0 33 42.7 12.8 42.7 27.4 0 5.1-4.3 6.4-8.4 6.4h-32l-.1 14.8h32c8.4 0 17.6-1.8 22.5-8.9v-25.8c-10.5-13.8-39.3-1.3-39.3-13.5 0-5.8 4.6-6.5 9.2-6.5zm-99.2-.3v-14.3h-55.2l-.1 69.3h55.2l.1-14.3-38.6-.3v-13.8H445v-14.1h-37.8v-12.5h38.5zm42.2 40.1h-32.2l-.1 14.8h32.2c14.8 0 26.2-5.6 26.2-22 0-33.2-42.9-11.2-42.9-26.3 0-5.6 4.9-6.4 9.2-6.4h30.4v-14.6h-33.2c-12.8 0-23.5 6.6-23.5 20.7 0 33 42.7 12.5 42.7 27.4-.1 5.4-4.7 6.4-8.8 6.4zm-78.1-158.7c-17.4-.3-33.2-4.1-33.2 19.7 0 11.8 2.8 19.9 16.1 19.9h7.4l23.5-54.5h24.8l27.9 65.4v-65.4h25.3l29.1 48.1v-48.1h16.9v69H524l-31.2-51.9v51.9h-33.7l-6.6-15.3h-34.3l-6.4 15.3h-19.2c-22.8 0-33-11.8-33-34 0-23.3 10.5-35.3 34-35.3h16.1v15.2zm14.3 24.5h22.8l-11.2-27.6-11.6 27.6zm-72.6-39.6h-16.9v69.3h16.9v-69.3zm-38.1 37.3c9.5 3.3 11 9.2 11 18.4v13.5h-16.6c-.3-14.8 3.6-25.1-14.8-25.1h-18v25.1h-16.4v-69.3l39.1.3c13.3 0 27.4 2 27.4 18.4.1 8-4.3 15.7-11.7 18.7zm-6.7-15.3c0-6.4-5.6-7.4-10.7-7.4h-21v15.3h20.7c5.7 0 11-1.3 11-7.9zm-59.5-7.4v-14.6h-55.5v69.3h55.5v-14.3h-38.9v-13.8h37.8v-14.1h-37.8v-12.5h38.9zm-84.6 54.7v-54.2l-24 54.2H124l-24-54.2v54.2H66.2l-6.4-15.3H25.3l-6.4 15.3H1l29.7-69.3h24.5l28.1 65.7v-65.7h27.1l21.7 47 19.7-47h27.6v69.3h-16.8zM53.9 188.8l-11.5-27.6-11.2 27.6h22.7zm253 102.5c0 27.9-30.4 23.3-49.3 23.3l-.1 23.3h-32.2l-20.4-23-21.3 23h-65.4l.1-69.3h66.5l20.5 22.8 21-22.8H279c15.6 0 27.9 5.4 27.9 22.7zm-112.7 11.8l-17.9-20.2h-41.7v12.5h36.3v14.1h-36.3v13.8h40.6l19-20.2zM241 276l-25.3 27.4 25.3 28.1V276zm48.3 15.3c0-6.1-4.6-8.4-10.2-8.4h-21.5v17.6h21.2c5.9 0 10.5-2.8 10.5-9.2z"></path>
                </svg><!-- <i class="fab fa-cc-amex"></i> -->
                <svg class="svg-inline--fa fa-cc-paypal fa-w-18" aria-hidden="true" data-prefix="fab" data-icon="cc-paypal" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M186.3 258.2c0 12.2-9.7 21.5-22 21.5-9.2 0-16-5.2-16-15 0-12.2 9.5-22 21.7-22 9.3 0 16.3 5.7 16.3 15.5zM80.5 209.7h-4.7c-1.5 0-3 1-3.2 2.7l-4.3 26.7 8.2-.3c11 0 19.5-1.5 21.5-14.2 2.3-13.4-6.2-14.9-17.5-14.9zm284 0H360c-1.8 0-3 1-3.2 2.7l-4.2 26.7 8-.3c13 0 22-3 22-18-.1-10.6-9.6-11.1-18.1-11.1zM576 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h480c26.5 0 48 21.5 48 48zM128.3 215.4c0-21-16.2-28-34.7-28h-40c-2.5 0-5 2-5.2 4.7L32 294.2c-.3 2 1.2 4 3.2 4h19c2.7 0 5.2-2.9 5.5-5.7l4.5-26.6c1-7.2 13.2-4.7 18-4.7 28.6 0 46.1-17 46.1-45.8zm84.2 8.8h-19c-3.8 0-4 5.5-4.2 8.2-5.8-8.5-14.2-10-23.7-10-24.5 0-43.2 21.5-43.2 45.2 0 19.5 12.2 32.2 31.7 32.2 9 0 20.2-4.9 26.5-11.9-.5 1.5-1 4.7-1 6.2 0 2.3 1 4 3.2 4H200c2.7 0 5-2.9 5.5-5.7l10.2-64.3c.3-1.9-1.2-3.9-3.2-3.9zm40.5 97.9l63.7-92.6c.5-.5.5-1 .5-1.7 0-1.7-1.5-3.5-3.2-3.5h-19.2c-1.7 0-3.5 1-4.5 2.5l-26.5 39-11-37.5c-.8-2.2-3-4-5.5-4h-18.7c-1.7 0-3.2 1.8-3.2 3.5 0 1.2 19.5 56.8 21.2 62.1-2.7 3.8-20.5 28.6-20.5 31.6 0 1.8 1.5 3.2 3.2 3.2h19.2c1.8-.1 3.5-1.1 4.5-2.6zm159.3-106.7c0-21-16.2-28-34.7-28h-39.7c-2.7 0-5.2 2-5.5 4.7l-16.2 102c-.2 2 1.3 4 3.2 4h20.5c2 0 3.5-1.5 4-3.2l4.5-29c1-7.2 13.2-4.7 18-4.7 28.4 0 45.9-17 45.9-45.8zm84.2 8.8h-19c-3.8 0-4 5.5-4.3 8.2-5.5-8.5-14-10-23.7-10-24.5 0-43.2 21.5-43.2 45.2 0 19.5 12.2 32.2 31.7 32.2 9.3 0 20.5-4.9 26.5-11.9-.3 1.5-1 4.7-1 6.2 0 2.3 1 4 3.2 4H484c2.7 0 5-2.9 5.5-5.7l10.2-64.3c.3-1.9-1.2-3.9-3.2-3.9zm47.5-33.3c0-2-1.5-3.5-3.2-3.5h-18.5c-1.5 0-3 1.2-3.2 2.7l-16.2 104-.3.5c0 1.8 1.5 3.5 3.5 3.5h16.5c2.5 0 5-2.9 5.2-5.7L544 191.2v-.3zm-90 51.8c-12.2 0-21.7 9.7-21.7 22 0 9.7 7 15 16.2 15 12 0 21.7-9.2 21.7-21.5.1-9.8-6.9-15.5-16.2-15.5z"></path>
                </svg><!-- <i class="fab fa-cc-paypal"></i> -->
                <p class="text-center">
                    <a href="#" target="_blank" rel="nofollow">
                        <img class="lazyloaded" src="https://seal-seflorida.bbb.org/seals/blue-seal-293-61-bbb-90365891.png" data-src="https://seal-seflorida.bbb.org/seals/blue-seal-293-61-bbb-90365891.png" style="border: 0;" alt="PRINTIT4LESS.COM BBB Business Review" height="61" width="293"></a></p>
                <div id="block-2" class="business-hrs">
                    <h4><strong>1 (800) 370-5591</strong></h4>
                </div>
            </div>
        </div>


        <div class="bottom-nav">
            <ul>
                <li id="menu-item-55" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-18 current_page_item menu-item-55"><a href="https://www.printit4less.com/" aria-current="page">Home</a></li>
                <li class="menu-item"><a href="#">Shipping &amp; Returns</a></li>
                <li class="menu-item"><a href="#">Privacy Notice</a></li>
                <li class="menu-item"><a href="#">Conditions</a></li>
                <li class="menu-item"><a href="#">Reviews</a></li>
                <li class="menu-item"><a href="#">Quotes &amp; Proofs</a></li>
                <li class="menu-item"><a href="#">Blog</a></li>
                <li class="menu-item"><a href="#">Sitemap</a></li>
                <li class="menu-item"><a href="#">Contact Us</a></li>
            </ul>
        </div>


        <ul class="social-icons">

            <li>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
            </li>


        </ul>

        <div class="copyright">Copyright © 2024 PrintIt4Less Delray Beach, FL 33432, USA - Tel: 1.800.370.5591</div>

    </footer>
</body>
<script type="text/javascript" src="{{asset('/front/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/font-awesome.js')}}"></script>
</html>