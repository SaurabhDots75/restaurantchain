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

                <div class="order">
                    <h1>Order</h1>

                    <h5>Thank You. Your order has been received.</h5>
                <div class="order-received">
                    <ul>
                        <li>Order Number: <span>190</span></li>
                        <li>Date: <span>December 06, 2024</span></li>
                        <li>Email: <span><a href="#">customer@email.com</a></span></li>
                        <li>total: <span>$150.00</span></li>
                    </ul>
                </div>

                    <div class="payment-method">
                        <h5>Payment Method <span>Check Payments</span></h4>
                    </div>

                    <div class="order-detail-table">
                    <h2>Order Detail</h2>
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Product</th>
                            <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>Album x 1</th>
                            <td>$15.00</td>
                            </tr>
                            <tr>
                            <td>Album x 1</th>
                            <td>$15.00</td>
                            </tr>
                            <tr>
                            <td>Belt x 1</th>
                            <td colspan="2">$55.00</td>   
                            </tr>
                            <tr>
                            <td>Belt x 1</th>
                            <td colspan="2">$55.00</td>   
                            </tr>
                            <tr>
                            <td>Subtotal:</th>
                            <td colspan="2">$140.00</td>   
                            </tr>

                            <tr>
                            <td>Payment Method:</th>
                            <td colspan="2">Check Payment</td>   
                            </tr>

                            <tr>
                            <td>Total:</th>
                            <td colspan="2">$140.00</td>   
                            </tr>

                        </tbody>
                    </table>
                    </div>

                    <div class="order-billingaddress">
                        <h2>Billing Address</h2>

                        <div class="bill-detail">
                            <ul>
                                <li>Customer Name</li>
                                <li>Business Name</li>
                                <li>XXXX Lorem ipsum dolar simple dummy text</li>
                                <li><i class="fa-solid fa-phone"></i><a href="#">123 456 7890</a></li>
                                <li><i class="fa-solid fa-envelope"></i><a href="#">customer@email.com</a></li>
                            </ul>
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