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

            <div class="cart-panel">
                <h1>Cart</h1>
                <nav class="breadcrumb" role="navigation">
                    <ul>
                        <li><a href="#">PrintIt4Less</a></li>
                        <li>Cart</li>
                    </ul>
                </nav>


                <table class="table">
                    <tr>
                        <th>Close</th>
                        <th>Product Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                    <tr>
                        <td data-th="Close" class="close"><i class="fa-solid fa-xmark"></i></td>
                        <td data-th="Product Image" class="product-img"><img src="/front/images/INVOICESv2.jpg" data-src="" alt="Invoice Forms"></td>
                        <td data-th="Product"><a class="product-heading" href="#" alt="">Custom Form 3 part Small-Hard Back</a>
                            <a href="#" class="tm-cart-edit-options">Edit options</a>
                            <dl>
                                <dt>Quantity:</dt>
                                <dd>500</dd>

                                <dt>Paper Type:</dt>
                                <dd>3 part (white/yellow/manila)</dd>

                                <dt>Ink Color:</dt>
                                <dd>Blue</dd>

                                <dt>Back Printing:</dt>
                                <dd>Front & Back + $18.00</dd>

                                <dt>Sequential Numbering:</dt>
                                <dd>Red + $15.00</dd>

                                <dt>Starting Number:</dt>
                                <dd>4</dd>

                                <dt>Perforating All Pages:</dt>
                                <dd>4Yes + $15.00</dd>

                                <dt>Drilling:</dt>
                                <dd>2 holes top + $15.00 </dd>

                                <dt>Request digital proof:</dt>
                                <dd>Yes. Approval needed before print.</dd>
                            </dl>
                        </td>
                        <td data-th="Price" class="product-amount">$185.00</td>
                        <td data-th="Subtotal" class="product-amount">$185.00</td>
                    </tr>



                    <tr>
                        <td data-th="Close" class="close"><i class="fa-solid fa-xmark"></i></td>
                        <td data-th="Product Image" class="product-img"><img src="/front/images/INVOICESv2.jpg" data-src="" alt="Invoice Forms"></td>
                        <td data-th="Product"><a class="product-heading" href="#" alt="">Custom Form 3 part Small-Hard Back</a>
                            <a href="#" class="tm-cart-edit-options">Edit options</a>
                            <dl>
                                <dt>Quantity:</dt>
                                <dd>500</dd>

                                <dt>Paper Type:</dt>
                                <dd>3 part (white/yellow/manila)</dd>

                                <dt>Ink Color:</dt>
                                <dd>Blue</dd>

                                <dt>Back Printing:</dt>
                                <dd>Front & Back + $18.00</dd>

                                <dt>Sequential Numbering:</dt>
                                <dd>Red + $15.00</dd>
                            </dl>
                        </td>
                        <td data-th="Price" class="product-amount">$185.00</td>
                        <td data-th="Subtotal" class="product-amount">$185.00</td>
                    </tr>



                </table>

                <div class="cart-totals">
                    <h2>Cart totals</h2>
                    <table class="table">
                        <tr>
                            <th>Subtotal</td>
                            <td data-th="Subtotal">$185.00</td>
                        </tr>
                        <tr>
                            <th>Shipping</td>
                            <td data-th="Shipping">Enter your address to view shipping options.<a href="#"
                                    class="shipping-calculator-button"><i class="fa-solid fa-calculator"></i>Calculate
                                    shipping</a></td>
                        </tr>
                        <tr>
                            <th>Tax</td>
                            <td data-th="Tax">$12.95</a></td>
                        </tr>
                        <tr>
                            <th>Total</td>
                            <td data-th="Total"><strong>$197.95</strong></td>
                        </tr>

                    </table>

                    <a href="/shop/" class="print-btn button btns">Proceed to checkout</a>
                </div>



            </div>
        </div>
    </div>
</div>
</div>

@endsection