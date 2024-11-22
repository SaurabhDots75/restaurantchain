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
                <div class="banner">
                    <img src="{{asset('')}}front/images/banner.jpg" data-src="" alt="Invoice Forms"></a>
                </div>
                <div class="heading-box">
                    <div class="headings">
                        <h1>Featured Products and Offers</h1>
                        <a href="/shop/" class="print-btn button btns">Shop All</a>
                    </div>
                </div>
                <div class="featured-box">
                    <div class="featured-item">
                        <div class="featured-thumb">
                            <a href="#">
                                <img src="{{asset('')}}front/images/INVOICESv2.jpg" data-src="" alt="Invoice Forms"></a>
                        </div>
                        <div class="featured-content">
                            <p><a href="#">Invoice Forms</a>
                                Starting at $47.00 </p>
                        </div>
                    </div>
                    <div class="featured-item">
                        <div class="featured-thumb">
                            <a href="#">
                                <img src="{{asset('')}}front/images/INVOICESv2.jpg" data-src="" alt="Invoice Forms" class="img-fluid lazyloaded" height="500" width="500"></a>
                        </div>
                        <div class="featured-content">
                            <p><a href="#">Invoice Forms</a>
                                Starting at $47.00 </p>
                        </div>
                    </div>
                    <div class="featured-item">
                        <div class="featured-thumb">
                            <a href="#">
                                <img src="{{asset('')}}front/images/INVOICESv2.jpg" data-src="" alt="Invoice Forms" class="img-fluid lazyloaded" height="500" width="500"></a>
                        </div>
                        <div class="featured-content">
                            <p><a href="#">Invoice Forms</a>
                                Starting at $47.00 </p>
                        </div>
                    </div>
                    <div class="featured-item">
                        <div class="featured-thumb">
                            <a href="#">
                                <img src="{{asset('')}}front/images/INVOICESv2.jpg" data-src="" alt="Invoice Forms" class="img-fluid lazyloaded" height="500" width="500"></a>
                        </div>
                        <div class="featured-content">
                            <p><a href="#">Invoice Forms</a>
                                Starting at $47.00 </p>
                        </div>
                    </div>
                    <div class="featured-item">
                        <div class="featured-thumb">
                            <a href="#">
                                <img src="{{asset('')}}front/images/INVOICESv2.jpg" data-src="" alt="Invoice Forms" class="img-fluid lazyloaded" height="500" width="500"></a>
                        </div>
                        <div class="featured-content">
                            <p><a href="#">Invoice Forms</a>
                                Starting at $47.00 </p>
                        </div>
                    </div>
                    <div class="featured-item">
                        <div class="featured-thumb">
                            <a href="#">
                                <img src="{{asset('')}}front/images/INVOICESv2.jpg" data-src="" alt="Invoice Forms" class="img-fluid lazyloaded" height="500" width="500"></a>
                        </div>
                        <div class="featured-content">
                            <p><a href="#">Invoice Forms</a>
                                Starting at $47.00 </p>
                        </div>
                    </div>
                    <div class="featured-item">
                        <div class="featured-thumb">
                            <a href="#">
                                <img src="{{asset('')}}front/images/INVOICESv2.jpg" data-src="" alt="Invoice Forms" class="img-fluid lazyloaded" height="500" width="500"></a>
                        </div>
                        <div class="featured-content">
                            <p><a href="#">Invoice Forms</a>
                                Starting at $47.00 </p>
                        </div>
                    </div>
                    <div class="featured-item">
                        <div class="featured-thumb">
                            <a href="#">
                                <img src="{{asset('')}}front/images/INVOICESv2.jpg" data-src="" alt="Invoice Forms" class="img-fluid lazyloaded" height="500" width="500"></a>
                        </div>
                        <div class="featured-content">
                            <p><a href="#">Invoice Forms</a>
                                Starting at $47.00 </p>
                        </div>
                    </div>
                    <div class="featured-item">
                        <div class="featured-thumb">
                            <a href="#">
                                <img src="{{asset('')}}front/images/INVOICESv2.jpg" data-src="" alt="Invoice Forms" class="img-fluid lazyloaded" height="500" width="500"></a>
                        </div>
                        <div class="featured-content">
                            <p><a href="#">Invoice Forms</a>
                                Starting at $47.00 </p>
                        </div>
                    </div>
                    <div class="featured-item">
                        <div class="featured-thumb">
                            <a href="#">
                                <img src="{{asset('')}}front/images/INVOICESv2.jpg" data-src="" alt="Invoice Forms" class="img-fluid lazyloaded" height="500" width="500"></a>
                        </div>
                        <div class="featured-content">
                            <p><a href="#">Invoice Forms</a>
                                Starting at $47.00 </p>
                        </div>
                    </div>
                    <div class="featured-item">
                        <div class="featured-thumb">
                            <a href="#">
                                <img src="{{asset('')}}front/images/INVOICESv2.jpg" data-src="" alt="Invoice Forms" class="img-fluid lazyloaded" height="500" width="500"></a>
                        </div>
                        <div class="featured-content">
                            <p><a href="#">Invoice Forms</a>
                                Starting at $47.00 </p>
                        </div>
                    </div>
                    <div class="featured-item">
                        <div class="featured-thumb">
                            <a href="#">
                                <img src="{{asset('')}}front/images/INVOICESv2.jpg" data-src="" alt="Invoice Forms" class="img-fluid lazyloaded" height="500" width="500"></a>
                        </div>
                        <div class="featured-content">
                            <p><a href="#">Invoice Forms</a>
                                Starting at $47.00 </p>
                        </div>
                    </div>
                    <div class="featured-item">
                        <div class="featured-thumb">
                            <a href="#">
                                <img src="{{asset('')}}front/images/INVOICESv2.jpg" data-src="" alt="Invoice Forms" class="img-fluid lazyloaded" height="500" width="500"></a>
                        </div>
                        <div class="featured-content">
                            <p><a href="#">Invoice Forms</a>
                                Starting at $47.00 </p>
                        </div>
                    </div>
                </div>
                <section class="middle">
                    <div class="print-home-form">
                        <div class="print-top-point-inner">
                            <a href="#">
                                <div class="print-top-box">
                                    <img class="lazyloaded" src="{{asset('')}}front/images/home-form-icon-1.png" data-src="" alt="" height="50" width="58">
                                    <h4>Custom Forms</h4>
                                </div>
                            </a>
                            <a href="#">
                                <div class="print-top-box">
                                    <img class="lazyloaded" src="{{asset('')}}front/images/home-form-icon-2.png" data-src="" alt="" height="50" width="58">
                                    <h4>Invoice Forms</h4>
                                </div>
                            </a>
                            <a href="#">
                                <div class="print-top-box">
                                    <img class="lazyloaded" src="{{asset('')}}front/images/home-form-icon-3.png" data-src="" alt="" height="50" width="58">
                                    <h4>Contractor Service Forms</h4>
                                </div>
                            </a>
                            <a href="#">
                                <div class="print-top-box">
                                    <img class="lazyloaded" src="{{asset('')}}front/images/home-form-icon-4.png" data-src="" alt="" height="50" width="58">
                                    <h4>Work Order Forms</h4>
                                </div>
                            </a>

                        </div>
                    </div>
                </section>
                <section class="sale-block">
                    <div class="sale-tag">
                        <img decoding="async" class=" ls-is-cached lazyloaded" src="{{asset('')}}front/images/hp-saletag.jpg" alt="Sale!" width="110" height="66" src="">
                        <p>Get <strong>200 forms FREE</strong> with orders of 1,000 or <strong>100 forms FREE</strong> with orders of 500.</p>
                    </div>
                </section>
                <section>
                    <div class="home-mid-content">
                        <div class="print-contentinvoice">
                            <h3><span> Custom Printing - Multi-Part Carbonless Invoices &amp; Forms</span></h2>
                                <p>At PrintIt4Less.com we produce professional quality multi-part, <a title="Custom Printed NCR Forms" href="/product-category/custom-forms-2" data-cke-saved-href="index.php?main_page=index&amp;cPath=25">custom forms</a> such as <a title="Custom Invoice Forms" href="/product-category/invoice-forms-2" data-cke-saved-href="index.php?main_page=index&amp;cPath=106"> invoice forms</a>, <a title="Custom Service Forms" href="/product-category/products-by-industry/products-by-industry" data-cke-saved-href="index.php?main_page=index&amp;cPath=1"> Contractor service forms</a>, <a title="Custom Work Order Forms" href="/product-category/work-order-invoices" data-cke-saved-href="index.php?main_page=index&amp;cPath=103"> work order forms</a> and more. You can add your company name, address and logo to any of our invoice templates or service form templates or email us your&nbsp; <a title="HVAC Forms" href="/product-category/products-by-industry/hvac-service" data-cke-saved-href="index.php?main_page=index&amp;cPath=1_11_12"> HVAC service repair forms</a>, <a title="Pest Business forms" href="/product-category/products-by-industry/pest-control-forms/pest-control-forms" data-cke-saved-href="index.php?main_page=index&amp;cPath=1_21"> pest control invoices</a>, <a title="Custom Landscaping Business Forms" href="/product-category/products-by-industry/landscaping-companies" data-cke-saved-href="index.php?main_page=index&amp;cPath=1_15"> landscaping forms</a> design and have us print them on 2, 3 or 4 part carbonless paper. We accept all file format including, Quark, Photo Shop, Publisher, Word, Excel.</p>
                                <p>You can even send us a scanned copy of your current business Invoice forms or one that you like to reproduce and we will create and print them for you. All our Invoice form templates can be changed to meet your individual business needs.</p>
                                <p>100% Satisfaction Guarantee on all multi-part carbonless business forms. We want you to be delighted with your printed invoice forms and our expert service! If for any reason you aren’t fully satisfied with your printed business forms, please contact us to see how we can help you.</p>
                                <p>Printit4less.com has been recognized as one of Top 300 Small Businesses in Southeastern United States for 2010 and 2011 and Top 50 Small businesses in Florida for 2009. For over 25 years Printit4Less has been a reliable printing source for Businesses, Government Agencies and Universities in all 50 states &amp; Canada. Our wholesale printing prices even appeal to clients abroad. Our list of clients include companies in Europe and as far as Australia.</p>
                                <p>While providing top notch products and services, we find it’s important to be environmentally friendly. We have been Green Certified because we use Soy Based Bio-Degradable Ink on our printed products and we use 100% recycled papers. We limit our waste by recycling 98% of scraps, packaging and other business necessities.</p>
                                <p>At Printit4Less, we strive to produce professional quality multi-part, carbonless (NCR) forms for a wide range of industries and trades. In addition to the selection of forms that we carry, we offer many other custom printed products for your business needs such as <a href="/product/full-color-brochures/">brochures</a>, <a href="/product-category/stationery/">stationery</a>, <a href="/product-category/uniforms-work-t-shirts/">work shirts</a> and <a href="/product-category/marketing-advertising/promotional-bags/">promotional bags</a>. We specialize in providing forms for contractors, but we are not limited to only those industries.</p>
                                <p>For that professional look, all of your forms or custom printed products can include your company name, address, phone number and logo. See a form on our website that you like, but need to make a slight change? No problem! We will gladly accommodate our customer’s wishes so they have the perfect product to make their daily business operations run smoothly. If you have been comfortably using another form or would like to design your own, feel free to upload your file or scanned copy of your current form when selecting any of our Custom Products.</p>
                                <div class="clear"></div>
                        </div>
                </section>
                <section>
                    <div class="review-section">
                        <div class="rating-section">
                            <h3>Our Customer Love Us</h3>
                                <p>See all 32057 reviews at <a href="#" class="shopperlink new-sa-seals placement-default">
                                <a href=""><img class=" ls-is-cached lazyloaded" src="" data-src="" alt="" oncontextmenu=""></a></p>
                        </div>
                        <div class="contain">
                            <div id="owl-carousel" class="owl-carousel owl-theme">
                                <div class="item">
                                    <div class="review-item">
                                        <h3><strong>Eric R</strong></h3>
                                        <span class="stars" id="review-1" data-rating="5" data-stars="5">
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                        </span>
                                        <p>Ordered here a few times and have always had a positive experience</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="review-item">
                                        <h3><strong>Mark L</strong></h3>
                                        <span class="stars" id="review-1" data-rating="5" data-stars="5">
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                        </span>
                                        <p>Very nice to deal with!</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="review-item">
                                        <h3><strong>Ralph J</strong></h3>
                                        <span class="stars" id="review-1" data-rating="5" data-stars="5">
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                        </span>
                                        <p>Good service with a fair price. They reached out to let us know something wouldn't print well and let us alter it, which was appreciated.</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="review-item">
                                        <h3><strong>Kalvin W</strong></h3>
                                        <span class="stars" id="review-1" data-rating="5" data-stars="5">
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                        </span>
                                        <p>Quick and easy to decide on products</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="review-item">
                                        <h3><strong>Don B</strong></h3>
                                        <span class="stars" id="review-1" data-rating="5" data-stars="5">
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                        </span>
                                        <p>always done professionally and in a timely manner at a fair price!</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="review-item">
                                        <h3><strong>Kenneth C</strong></h3>
                                        <span class="stars" id="review-1" data-rating="5" data-stars="5">
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                            </svg>
                                        </span>
                                        <p>Good product and very affordable</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="middle-banner_logos">
                        <div class="middlehome-logo">
                            <img src="{{asset('')}}front/images/Drop-Box.png" alt="" title="">
                        </div>
                        <div class="middlehome-logo">
                            <img src="{{asset('')}}front/images/fpl_logo.png" alt="" title="">
                        </div>
                        <div class="middlehome-logo">
                            <img src="{{asset('')}}front/images/American-Legion.png" alt="" title="">
                        </div>
                        <div class="middlehome-logo">
                            <img src="{{asset('')}}front/images/Toyota-removebg-preview.png" alt="" title="">
                        </div>
                        <div class="middlehome-logo">
                            <img src="{{asset('')}}front/images/Habitat_for_Humanity-removebg-preview.png" alt="" title="">
                        </div>
                        <div class="middlehome-logo">
                            <img src="{{asset('')}}front/images/Spencers-removebg-preview.png" alt="" title="">
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection