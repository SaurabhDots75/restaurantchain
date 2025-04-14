@extends('front.layouts.app')

@section('contents')
<div class="printit4less-mid">
    <div class="row">
        <div class="col-lg-2 side-panel">
            <div class="card">
                <!-- this is commented area -->
                <div class="bg-primary card-header">Products</div>
                <div class="component">
                    <div class="demo">
                        <ul class="accordion">
                            <li>
                                <p class="nest">Forms by Type</p>
                                <ul class="inner">
                                    <li><a href="#">Invoice Forms</a> </li>
                                    <li><a href="#">Texas Forms</a> </li>
                                    <li>
                                        <p class="nest">Custom Forms</p>
                                        <ul class="inner">
                                            <li><a href="#">Standard - 1 Color</a></li>
                                            <li><a href="#">Standard Manila</a></li>
                                            <li><a href="#">Full Color Forms</a></li>
                                            <li><a href="#">Full Color Manila</a></li>
                                        </ul>
                                    <li><a href="#">Bills of Lading</a></li>
                                    <li><a href="#">Receipt Books</a></li>
                                    <li><a href="#">Register Forms</a></li>
                                    <li><a href="#">Work Order Forms</a></li>
                                    <li><a href="#">Proposal Forms</a></li>
                            </li>
                        </ul>
                        </li>
                        <li>
                            <p class="nest">Products by Industry</p>


                            <ul class="inner">



                                <li>
                                    <p class="nest">HVAC Service</p>
                                    <ul class="inner">
                                        <li><a href="#">Service Invoices</a></li>
                                        <li><a href="#">Contracts</a></li>
                                        <li><a href="#">HVAC Receipts</a></li>
                                        <li><a href="#">HVAC Labels & Tags</a></li>
                                        <li><a href="#">Business Cards</a></li>
                                        <li><a href="#">HVAC Shirts</a></li>
                                        <li><a href="#">Door Hangers</a></li>
                                        <li><a href="#">Aluminum Portfolios</a></li>
                                    </ul>

                                    <p class="nest">Apparel Sales</p>
                                    <ul class="inner">
                                        <li><a href="#">Purchase Orders</a></li>
                                        <li><a href="#">Sales Receipts</a></li>
                                        <li><a href="#">Apparel Tags</a></li>
                                    </ul>
                                </li>

                                <li><a href="#">Appliance Repair Forms</a></li>

                                <li>
                                    <p class="nest">Auto Service</p>
                                    <ul class="inner">
                                        <li><a href="#">Repair Forms</a></li>
                                        <li><a href="#">Auto Body Shop</a></li>
                                        <li><a href="#">California Auto Forms</a></li>
                                        <li><a href="#">Florida Auto Forms</a></li>
                                        <li><a href="#">Wisconsin Automotive Forms</a></li>
                                        <li><a href="#">Auto Business Cards</a></li>
                                        <li><a href="#">Floor Mats</a></li>
                                        <li><a href="#">Service Stickers</a></li>
                                        <li><a href="#">Automotive TShirts</a></li>
                                        <li><a href="#">Aluminum Portfolios</a></li>
                                    </ul>
                                </li>

                                <li><a href="#">General Contractors</a></li>
                                <li><a href="#">Electrical Contractors</a></li>
                                <li><a href="#">Food Services</a></li>
                                <li><a href="#">Flooring Contractors</a></li>
                                <li><a href="#">Flower Shops</a></li>
                                <li><a href="#">Garage Door Companies</a></li>
                                <li><a href="#">Janitorial Forms</a></li>
                                <li><a href="#">Landscaping Companies</a></li>



                                <li>
                                    <p class="nest">Locksmith Business</p>
                                    <ul class="inner">
                                        <li><a href="#">Invoice Forms</a></li>
                                        <li><a href="#">Register Forms</a></li>
                                        <li><a href="#">Register Machines</a></li>
                                        <li><a href="#">Business Cards</a></li>
                                        <li><a href="#">Customized Labels</a></li>
                                        <li><a href="#">Work Uniforms</a></li>
                                        <li><a href="#">Aluminum Portfolios</a></li>
                                    </ul>
                                </li>


                                <li><a href="#">Medical Office Forms</a></li>
                                <li><a href="#">Pest Control Forms</a></li>
                                <li><a href="#">Plumbing Companies</a></li>
                                <li><a href="#">Pool-Spa Services</a></li>
                                <li><a href="#">Pressure Washing</a></li>

                                <li>
                                    <p class="nest">Property Management</p>
                                    <ul class="inner">
                                        <li><a href="#">Aluminum Clipboards</a></li>
                                        <li><a href="#">Rent Receipts</a></li>
                                        <li><a href="#">Cleaning Forms</a></li>
                                        <li><a href="#">Custom Envelopes</a></li>
                                        <li><a href="#">Landscaping Work Orders</a></li>
                                        <li><a href="#">Maintenance Work Orders</a></li>
                                        <li><a href="#">Pest Control Work Order</a></li>
                                        <li><a href="#">Maintenance Door Hangers</a></li>
                                        <li><a href="#">Maintenance Shirts</a></li>
                                        <li><a href="#">Building Management Stationary</a></li>
                                    </ul>
                                </li>



                                <li><a href="#">Retail Stores</a> </li>
                                <li><a href="#">Sanitizing Companies</a> </li>
                                <li><a href="#">Towing Services Forms</a> </li>
                                <li><a href="#">Trucking Companies</a> </li>

                            </ul>
                        </li>
                        <li><a href="#">Aluminum Portfolios</a></li>
                        <li><a href="#">Appointment Cards</a></li>
                        <li><a href="#">Banners</a></li>
                        <li><a href="#">Bills of Lading</a></li>
                        <li><a href="#">Aluminum Portfolios</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-10 content-area">
            <div class="mid-section-home">
                <h1>My account</h1>
                <div class="myaccount-panel">
                    <div class="myaccount-box">
                        <h2>Login</h2>
                        <div class="myaccount-form">
                            <div class="account-field">
                                <label>Username or email address <span>*</span></label>
                                <input class="input-box" placeholder="Username or email address">
                            </div>
                            <div class="account-field">
                                <label>Password <span>*</span></label>
                                <input class="input-box" placeholder="Username or email address">
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember me
                                </label>
                            </div>

                            <a href="#" class="print-btn button btns">Shop All</a>

                            <a href="#" class="lost-pass">Lost your password?</a>

                        </div>
                    </div>

                    <div class="myaccount-box">
                        <h2>Register</h2>
                        <div class="myaccount-form">
                            <div class="account-field account-register">
                                <label>First Name <span>*</span></label>
                                <input class="input-box" placeholder="First Name">
                            </div>
                            <div class="account-field account-register">
                                <label>Last Name <span>*</span></label>
                                <input class="input-box" placeholder="Last Name">
                            </div>

                            <div class="account-field account-register">
                                <label>Email address <span>*</span></label>
                                <input class="input-box" placeholder="Email address">
                            </div>
                            <div class="account-field account-register">
                                <label>Password <span>*</span></label>
                                <input class="input-box" placeholder="Password">
                            </div>


                            <a href="#" class="print-btn button btns">Register</a>


                        </div>
                    </div>


                </div>

            </div>
        </div>

    </div>
</div>
</div>
</div>
</div>

@endsection