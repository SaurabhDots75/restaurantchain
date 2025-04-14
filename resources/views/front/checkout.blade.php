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

            <div class="checkout-sec res-mt">
                <h1>Checkout</h1>
                <nav class="breadcrumb" role="navigation">
                    <ul>
                        <li><a href="#">PrintIt4Less</a></li>
                        <li>Checkout</li>
                    </ul>
                </nav>
                <h3>Billing details</h3>

                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="contact-form-sec checkout-form">
                            <form>
                                <span class="woocommerce-input-wrapper">
                                    <label class="checkbox">
                                        <input type="checkbox" name="" id="" value="0" class="input-checkbox "
                                            data-gtm-form-interact-field-id="0"> This is a Residential Address&nbsp;
                                        <span class="optional">(optional)</span>
                                    </label>
                                </span>

                                <div class="quote-filed quote-filedtwo">
                                    <label>Name</label>
                                    <input class="input-box" placeholder="First Name">
                                    <input class="input-box" placeholder="Last Name">
                                </div>

                                <div class="quote-filed">
                                    <label>Company Name (optional)</label>
                                    <input class="input-box" placeholder="Company Name (optional)">
                                </div>

                                <div class="quote-filed">
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
                                </div>

                                <div class="quote-filed">
                                    <label>Street address <span>*</span></label>
                                    <input class="input-box address-one" placeholder="House number and street name">
                                    <input class="input-box address-two"
                                        placeholder="Apartment, suite, unit, etc. (optional)">
                                </div>

                                <div class="quote-filed">
                                    <label>Town / City <span>*</span></label>
                                    <input class="input-box" placeholder="Town / City">
                                </div>

                                <div class="quote-filed">
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

                                <div class="quote-filed">
                                    <label>PIN Code <span>*</span></label>
                                    <input class="input-box" placeholder="PIN Code">
                                </div>

                                <div class="quote-filed">
                                    <label>Phone <span>*</span></label>
                                    <input class="input-box" placeholder="Phone">
                                </div>

                                <div class="quote-filed">
                                    <label>Email address <span>*</span></label>
                                    <input class="input-box" placeholder="Email address">
                                </div>

                                <div class="checkbox-create-acc">
                                    <input type="checkbox" id="transcript">
                                    <p class="episode-content-title">
                                        <label for="transcript">Create an account?</label>
                                    </p>
                                    <div class="episode-accordion">
                                        <div class="quote-filed">
                                            <label>Email address <span>*</span></label>
                                            <input class="input-box" placeholder="Email address">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6 res-mt">
                        <div class="contact-form-sec checkout-form">
                            <form>
                                <span class="woocommerce-input-wrapper">
                                    <label class="checkbox">
                                        <input type="checkbox" name="" id="" value="0" class="input-checkbox"> This is a
                                        Residential Address&nbsp;
                                        <span class="optional">(optional)</span>
                                    </label>
                                </span>

                                <div class="quote-filed">
                                    <label>Order notes (optional)</label>
                                    <textarea class="inhut-box"
                                        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div>
                        <table class="table desk-mt">
                            <tr>
                                <th>Product</th>
                                <th>Subtotal</th>
                            </tr>
                            <tr>
                                <td data-th="Product"><a class="product-heading" href="#" alt="">General Contractor
                                        Invoice Forms <strong>× 1</strong></a>
                                    <a href="#" class="tm-cart-edit-options">Edit options</a>
                                    <dl>
                                        <dt>Quantity:</dt>
                                        <dd>500</dd>

                                        <dt>Paper Type:</dt>
                                        <dd>3 part (white/yellow/manila)</dd>

                                        <dt>Ink Color:</dt>
                                        <dd>Blue</dd>

                                        <dt>Sequential Numbering:</dt>
                                        <dd>None</dd>

                                        <dt>Bindery Options:</dt>
                                        <dd>Shrink-Wrap - Loose</dd>

                                        <dt>Request digital proof:</dt>
                                        <dd>Yes. Approval needed before print.</dd>
                                    </dl>
                                </td>
                                <td data-th="Subtotal" class="product-amount">$185.00</td>
                            </tr>

                            <tr>
                                <th>Subtotal</th>
                                <td>$57.00</td>
                            </tr>

                            <tr>
                                <th>Shipping</th>
                                <td>Enter your address to view shipping options.</td>
                            </tr>

                            <tr>
                                <th>Tax</th>
                                <td>$0.00</td>
                            </tr>

                            <tr>
                                <th>Total</th>
                                <td>$57.00</td>
                            </tr>

                        </table>


                        <div class="captcha">
                            <img src="/front/images/robot.png" data-src="" alt="Invoice Forms">
                        </div>


                        <div class="checkbox-create-acc payment-create-acc">
                            <div class="checkbox-create-radio">
                                <input type="radio" id="paypaltranscript">
                                <p class="episode-content-title">
                                    <label for="paypaltranscript">Paypal Checkout</label>
                                </p>
                                <div class="episode-accordion">
                                    <div class="payment_box">
                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                            account.</p>
                                    </div>
                                </div>
                            </div>


                            <div class="checkbox-create-radio checkbox-create-card">
                                <input type="radio" id="credittranscript">
                                <p class="episode-content-title">
                                    <label for="credittranscript">Credit Card
                                        <img src="/front/images/discover.svg" data-src="" alt="Invoice Forms">
                                        <img src="/front/images/amex.svg" data-src="" alt="Invoice Forms">
                                        <img src="/front/images/mastercard.svg" data-src="" alt="Invoice Forms">
                                        <img src="/front/images/visa.svg" data-src="" alt="Invoice Forms">
                                    </label>
                                </p>
                                <div class="episode-accordion">
                                    <div class="payment_box">
                                        <div class="payment_box-field">
                                            <label>Card number <span>*</span></label>
                                            <input class="input-box" placeholder="•••• •••• •••• ••••">
                                        </div>

                                        <div class="payment_box-field">
                                            <label>Expiry (MM/YY) <span>*</span></label>
                                            <input class="input-box" placeholder="MM / YY">
                                        </div>

                                        <div class="payment_box-field">
                                            <label>Card code <span>*</span></label>
                                            <input class="input-box" placeholder="CVC">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <form>
                                <input type="checkbox" id="" name="" value="">
                                <label for="fruit1">I have read and agree to the website <a href="#">terms and
                                        conditions</a> *</label>
                            </form>

                        </div>

                    </div>

                    <a href="#" class="paypal-btn"><img src="/front/images/paypal.svg" data-src=""
                            alt="Invoice Forms"></a>

                </div>

            </div>
        </div>
    </div>
</div>
</div>

@endsection