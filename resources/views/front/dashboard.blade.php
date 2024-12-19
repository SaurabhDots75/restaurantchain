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
                <div class="front-dashboard">
                <h1>My account</h1>
                <div class="myaccount-dashboard">
                    <ul class="nav nav-pills mb-3 border-bottom border-2" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Dashboard</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Orders</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Addresses</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="paymentmethod-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#paymentmethod" type="button" role="tab" aria-controls="paymentmethod-contact"
                                aria-selected="false">Payment Methods</button>
                        </li>


                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="accountdetail-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#accountdetail" type="button" role="tab" aria-controls="accountdetail-contact"
                                aria-selected="false">Account Methods</button>
                        </li>

                        
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="logout-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#logout" type="button" role="tab" aria-controls="logout-contact"
                                aria-selected="false">Log Out</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <h5>Hello dotsquares (not dotsquares? <a href="#">Log out</a>)</h5>
                            <p> From your account dashboard you can view your <a href="#">resent order</a>, manage your
                                <a href="#">shipping and billing addresses,</a> and
                                <a href="#">edit your password and account details</a>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="tablescroll-tableroll">
                                <table id="example2" class="management-table table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="">
                                            <td>#813883</td>
                                            <td>December 07, 2024</td>
                                            <td>Cancelled</td>
                                            <td>$170.50 for 1 item</td>
                                            <td><a class="print-btn button btns" href="#">View</a></td>
                                        </tr>


                                        <tr class="">
                                            <td>#813883</td>
                                            <td>December 07, 2024</td>
                                            <td>Cancelled</td>
                                            <td>$170.50 for 1 item</td>
                                            <td><a class="print-btn button btns" href="#">View</a></td>
                                        </tr>


                                        <tr class="">
                                            <td>#813883</td>
                                            <td>December 07, 2024</td>
                                            <td>Cancelled</td>
                                            <td>$170.50 for 1 item</td>
                                            <td><a class="print-btn button btns" href="#">View</a></td>
                                        </tr>



                                        <tr class="">
                                            <td>#813883</td>
                                            <td>December 07, 2024</td>
                                            <td>Cancelled</td>
                                            <td>$170.50 for 1 item</td>
                                            <td><a class="print-btn button btns" href="#">View</a></td>
                                        </tr>



                                        <tr class="">
                                            <td>#813883</td>
                                            <td>December 07, 2024</td>
                                            <td>Cancelled</td>
                                            <td>$170.50 for 1 item</td>
                                            <td><a class="print-btn button btns" href="#">View</a></td>
                                        </tr>



                                        <tr class="">
                                            <td>#813883</td>
                                            <td>December 07, 2024</td>
                                            <td>Cancelled</td>
                                            <td>$170.50 for 1 item</td>
                                            <td><a class="print-btn button btns" href="#">View</a></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <h5>The Following addresses will be used on the checkout page by default.</h5>
                            <div class="billing-address">
                                <div class="billing-address-box">
                                    <h2>Billing Address</h2>
                                    <a href="#">Edit Billing Address</a>
                                    <ul>
                                        <li>Test Order </li>
                                        <li>2194 Drew ST </li>
                                        </li>Clearwater, Fl 33765-3286</li>
                                    </ul>
                                </div>
                                <div class="billing-address-box">
                                    <h2>Billing Address</h2>
                                    <a href="#">Edit Billing Address</a>
                                    <ul>
                                        <li>Test Order </li>
                                        <li>2194 Drew ST </li>
                                        </li>Clearwater, Fl 33765-3286</li>
                                    </ul>
                                </div>
                            </div>


                            <div class="billingaddressform">
                                <h2>Billing address</h2>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        This is a residential address (optional)
                                    </label>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="tabing-field-sec">
                                            <form>

                                                <div class="tabing-filed quote-filedtwo">
                                                    <label>Name</label>
                                                    <input class="input-box" placeholder="First Name">
                                                    <input class="input-box" placeholder="Last Name">
                                                </div>

                                                <div class="tabing-filed">
                                                    <label>Company Name (optional)</label>
                                                    <input class="input-box" placeholder="Company Name (optional)">
                                                </div>

                                                <div class="tabing-filed">
                                                    <label>Country / Region <span>*</span></label>
                                                    <select class="form-select" aria-label="">
                                                        <option selected="">Afghanistan</option>
                                                        <option value="1">Åland Islands</option>
                                                        <option value="2">Albania</option>
                                                        <option value="3">Algeria</option>
                                                        <option value="4">American Samoa</option>
                                                        <option value="5">Andorra</option>
                                                        <option value="6">Angola</option>
                                                        <option value="7">Anguilla</option>
                                                        <option value="8">Antarctica</option>
                                                        <option value="9">Antigua and Barbuda</option>
                                                    </select>
                                                    <input class="input-box address-one" placeholder="Appatment">
                                                </div>

                                                <div class="tabing-filed">
                                                    <label>Phone <span>*</span></label>
                                                    <input class="input-box" placeholder="Phone">
                                                </div>
                                        </div>
                                        </form>
                                    </div>

                                    <div class="col-md-12 col-lg-6">
                                        <div class="tabing-field-sec">
                                            <form>
                                                <div class="tabing-filed">
                                                    <label>State <span>*</span></label>
                                                    <select class="form-select" aria-label="">
                                                        <option selected="">Andhra Pradesh</option>
                                                        <option value="1">Arunachal Pradesh</option>
                                                        <option value="2">Assam</option>
                                                        <option value="3">Bihar</option>
                                                        <option selected="">Chhattisgarh</option>
                                                        <option value="1">Goa</option>
                                                        <option value="2">Gujarat</option>
                                                        <option value="3">Haryana</option>
                                                        <option value="2">Himachal Pradesh</option>
                                                        <option value="3">Jammu and Kashmir</option>
                                                    </select>
                                                </div>

                                                <div class="tabing-filed">
                                                    <label>Street address <span>*</span></label>
                                                    <input class="input-box address-one"
                                                        placeholder="House number and street name">
                                                </div>

                                                <div class="tabing-filed">
                                                    <label>Town / City <span>*</span></label>
                                                    <input class="input-box" placeholder="Town / City">
                                                </div>



                                                <div class="tabing-filed">
                                                    <label>Zip Code <span>*</span></label>
                                                    <input class="input-box" placeholder="PIN Code">
                                                </div>



                                                <div class="tabing-filed">
                                                    <label>Email address <span>*</span></label>
                                                    <input class="input-box" placeholder="Email address">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="btns">Save Address</a>
                            </div>

                        </div>

                        <div class="tab-pane fade show" id="paymentmethod" role="tabpanel"
                            aria-labelledby="paymentmethod-contact-tab">
                            <div class="add-payment-method">
                            <div class="payment-msg"><h5>No saved methods found</h5></div>
                                <a href="#" class="btns">Add Payment Method</a>
                            </div>
                        </div>


                        <div class="tab-pane fade show" id="accountdetail" role="tabpanel"
                            aria-labelledby="accountdetail-contact-tab">
                            <form>
                                <div class="paymethod">
                                <div class="account-detail">
                                    <div class="accountdetailfiled">
                                        <label>First Name <span>*</span></label>
                                        <input class="input-box" placeholder="First Name">
                                    </div>
                                    <div class="accountdetailfiled">
                                        <label>Last Name <span>*</span></label>
                                        <input class="input-box" placeholder="Last Name">
                                    </div>
                                    <div class="accountdetailfiled">
                                        <label>Display Name <span>*</span></label>
                                        <input class="input-box" placeholder="Display Name">
                                    </div>
                                    <div class="accountdetailfiled">
                                        <label>Email Address <span>*</span></label>
                                        <input class="input-box" placeholder="Email Address">
                                    </div>
                                </div>

                                <div class="account-detail accpassword">
                                    <h2>Password Change</h2>
                                    <div class="accountdetailfiled">
                                        <label>Current password (leave blank to leave unchanged)</label>
                                        <input class="input-box" placeholder="First Name">
                                    </div>
                                    <div class="accountdetailfiled">
                                        <label>New password (leave blank to leave unchanged)</label>
                                        <input class="input-box" placeholder="Last Name">
                                    </div>
                                    <div class="accountdetailfiled">
                                        <label>Confirm new password</label>
                                        <input class="input-box" placeholder="Display Name">
                                    </div>
                                </div>
                                </div>
                            </form>
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
</div>

@endsection