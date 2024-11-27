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
                <nav class="breadcrumb" role="navigation">
                    <ul>
                        <li><a href="#">PrintIt4Less</a></li>
                        <li><a href="#">Products by Industry</a></li>
                        <li><a href="#">Trucking Companies</a></li>
                        <li>Delivery Notes</li>
                    </ul>
                </nav>

                <div class="detail-product-area">
                    <div class="product-detail">
                        <div class="product-gallery">
                            <img src="http://127.0.0.1:8000/front/images/carboless-paper.jpg" data-src=""
                                alt="custom-carbonless">
                        </div>

                        <div class="product-info">
                            <div class="group-stars product_just_stars">
                                <span class="on"><img src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                        data-src="" alt="review star"></span>
                                <span class="on"><img src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                        data-src="" alt="review star"></span>
                                <span class="on"><img src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                        data-src="" alt="review star"></span>
                                <span class="on"><img src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                        data-src="" alt="review star"></span>
                                <span class="on"><img src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                        data-src="" alt="review star"></span>
                                <span class="startreview">
                                    <span class="ind_cnt_num">5</span>
                                    <span class="ind_cnt_desc">reviews</span>
                                </span>
                            </div>

                            <div class="product-details">
                                <ul>
                                    <li>Size: 8.5 x 5.5</li>
                                    <li>Paper: 2 Part NCR (white/yellow)</li>
                                    <li>Upload your design or scan a clean copy</li>
                                    <li>Books of 50, numbered, 2nd side, hole punching</li>
                                    <li>Check our <a href="/faq">FAQ</a>&nbsp;for current production times.</li>
                                </ul>
                            </div>

                            <div class="product_meta">
                                <span class="sku_wrapper">SKU: <span class="sku">900-12</span></span>
                                <span class="tagged_as">Tag: <a
                                        href="https://www.printit4less.com/product-tag/custom-printed-invoices/"
                                        rel="tag">Custom Printed Invoices</a></span>
                            </div>

                            <div class="social-media">
                                <h5>Share this:</h5>

                                <ul>
                                    <li><a href="#"><svg fill="#000000" viewBox="0 0 1920 1920"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M1168.737 487.897c44.672-41.401 113.824-36.889 118.9-36.663l289.354-.113 6.317-417.504L1539.65 22.9C1511.675 16.02 1426.053 0 1237.324 0 901.268 0 675.425 235.206 675.425 585.137v93.97H337v451.234h338.425V1920h451.234v-789.66h356.7l62.045-451.233H1126.66v-69.152c0-54.937 14.214-96.112 42.078-122.058"
                                                        fill-rule="evenodd"></path>
                                                </g>
                                            </svg></a></li>
                                    <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                shape-rendering="geometricPrecision" text-rendering="geometricPrecision"
                                                image-rendering="optimizeQuality" fill-rule="evenodd"
                                                clip-rule="evenodd" viewBox="0 0 512 462.799">
                                                <path fill-rule="nonzero"
                                                    d="M403.229 0h78.506L310.219 196.04 512 462.799H354.002L230.261 301.007 88.669 462.799h-78.56l183.455-209.683L0 0h161.999l111.856 147.88L403.229 0zm-27.556 415.805h43.505L138.363 44.527h-46.68l283.99 371.278z" />
                                            </svg></a></li>
                                    <li><a href="#"><svg version="1.1" id="svg2"
                                                xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                xmlns:cc="http://creativecommons.org/ns#"
                                                xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                xmlns:svg="http://www.w3.org/2000/svg"
                                                xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                                xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                                                sodipodi:docname="reddit.svg" inkscape:version="0.48.4 r9939"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1200 1200"
                                                enable-background="new 0 0 1200 1200" xml:space="preserve"
                                                fill="#000000">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path id="path18251" inkscape:connector-curvature="0"
                                                        d="M799.146,879.54c13.596,22.015-0.893,31.198-13.234,41.597 c-53.096,39.525-127.408,53.974-188.446,54.201c-57.102-1.121-140.478-14.579-183.403-54.201 c-14.659-11.579-23.414-30.209-9.453-42.856c14.785-12.4,28.186,0.729,39.706,10.714c49.688,34.624,94.54,36.267,153.15,42.228 c63.417-3.087,105.899-12.523,160.084-43.486C770.424,876.545,785.096,865.886,799.146,879.54L799.146,879.54z M1018.238,93.579 c-47.734,0-88.537,29.66-105.018,71.542L680.66,108.092l-97.074,274.811c-68.908,1.68-133.605,11.342-194.111,28.989 c-60.504,17.646-114.264,41.182-161.322,70.594c-25.21-22.689-55.474-34.043-90.768-34.043c-19.327,0-37.185,3.57-53.571,10.714 c-16.386,7.144-30.898,17.029-43.503,29.636c-12.605,12.604-22.454,27.305-29.597,44.111C3.571,549.709,0,567.341,0,585.829 c0,24.369,5.677,46.663,17.021,66.831s26.645,36.559,45.973,49.164c-0.841,6.723-1.667,13.64-2.508,20.781 c-0.84,7.145-1.254,14.513-1.254,22.075c0,49.579,14.06,96.422,42.211,140.539c28.15,44.117,66.835,82.538,115.995,115.312 c49.16,32.773,106.302,58.638,171.428,77.546c65.127,18.907,135.051,28.343,209.841,28.343c73.951,0,143.724-9.436,209.271-28.343 c65.547-18.908,122.877-44.772,172.037-77.546c49.158-32.773,87.844-71.194,115.994-115.312 c28.15-44.117,42.211-90.96,42.211-140.539c0-13.445-1.277-27.317-3.799-41.604c20.168-12.605,36.146-29.224,47.91-49.812 S1200,610.197,1200,585.827c0-18.487-3.572-36.119-10.715-52.926c-7.145-16.807-17.029-31.507-29.635-44.11 c-12.605-12.605-27.307-22.492-44.111-29.636c-16.807-7.144-34.891-10.714-54.217-10.714c-33.615,0-63.84,11.354-90.73,34.042 c-45.377-28.571-97.068-51.691-155.053-69.34c-57.982-17.646-120.162-27.722-186.551-30.242l79.406-223.101l197.037,46.201 c0,0.139,0,0.279,0,0.418c0,62.306,50.498,112.804,112.805,112.804s112.842-50.498,112.842-112.804S1080.543,93.579,1018.238,93.579 L1018.238,93.579z M598.709,425.76c68.066,0,132.353,8.384,192.857,25.19c60.504,16.806,113.248,39.513,158.205,68.085 c44.959,28.571,80.484,62.406,106.535,101.48c26.053,39.076,39.059,80.468,39.059,124.164c0,43.698-13.006,84.862-39.059,123.52 c-26.049,38.654-61.574,72.265-106.535,100.836c-44.957,28.571-97.701,51.278-158.207,68.085 c-60.504,16.807-124.789,25.188-192.855,25.188c-68.067,0-132.354-8.383-192.857-25.188 c-60.502-16.806-113.022-39.514-157.561-68.085c-44.537-28.571-79.8-62.182-105.851-100.836 c-26.051-38.656-39.096-79.82-39.096-123.52c0-43.696,13.045-85.088,39.096-124.164c26.051-39.074,61.314-72.91,105.851-101.48 c44.538-28.572,97.057-51.279,157.561-68.085C466.356,434.144,530.642,425.76,598.709,425.76L598.709,425.76z M781.65,594.947 c-46.992,0-85.107,37.816-85.107,84.46c0,46.643,38.115,84.461,85.107,84.461c46.988,0,85.066-37.818,85.066-84.461 C866.717,632.764,828.641,594.947,781.65,594.947z M428.344,596.276c-46.99,0-85.068,37.817-85.068,84.461 c0,46.643,38.078,84.46,85.068,84.46c46.99,0,85.106-37.817,85.106-84.46C513.451,634.094,475.334,596.276,428.344,596.276z M1131.916,704.979c-0.402,0.209-0.799,0.451-1.217,0.76C1131.111,705.431,1131.504,705.183,1131.916,704.979z">
                                                    </path>
                                                </g>
                                            </svg></a></li>
                                    <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" version="1.1"
                                                id="Layer_1" viewBox="-271 283.9 256 235.1" xml:space="preserve">
                                                <g>
                                                    <rect x="-264.4" y="359.3" width="49.9" height="159.7" />
                                                    <path
                                                        d="M-240.5,283.9c-18.4,0-30.5,11.9-30.5,27.7c0,15.5,11.7,27.7,29.8,27.7h0.4c18.8,0,30.5-12.3,30.4-27.7   C-210.8,295.8-222.1,283.9-240.5,283.9z" />
                                                    <path
                                                        d="M-78.2,357.8c-28.6,0-46.5,15.6-49.8,26.6v-25.1h-56.1c0.7,13.3,0,159.7,0,159.7h56.1v-86.3c0-4.9-0.2-9.7,1.2-13.1   c3.8-9.6,12.1-19.6,27-19.6c19.5,0,28.3,14.8,28.3,36.4V519h56.6v-88.8C-14.9,380.8-42.7,357.8-78.2,357.8z" />
                                                </g>
                                            </svg></a></li>
                                </ul>
                            </div>

                            <div class="ds_custom_desc">
                                <h3>Custom NCR Form 2 Part – Half Sheet</h3>
                                <p>Carbonless custom 2 part 8.5 x 5.5 forms, you design them, we will print them. Custom
                                    forms are printed on carbonless 2 part paper, this size is also known as the half
                                    sheet form. When you order 2 part forms from PrintIt4Less.com, your design will be
                                    printed on white and yellow NCR papers in a one color ink of your choice. You will
                                    have the option of backside printing, sequential numbering, perforating and binding
                                    your forms into booklets. When uploading your own design, you will have complete
                                    control of what will work for you and your business.</p>
                                <p>Have any questions? Give us a call at 1-800-370-5591, we are here to help.</p>
                            </div>

                        </div>

                    </div>


                    <div class="detailinfo-form">
                        <h3>Delivery Notes</h3>
                        <div class="price-review"><span class="from">From: </span><span
                                class="woocommerce-Price-amount amount"><bdi><span
                                        class="woocommerce-Price-currencySymbol">$</span>68.00</bdi></span></div>

                        <div class="review-sa-plugin">
                            <div class="detail-review"><img src="http://127.0.0.1:8000/front/review.gif" data-src=""
                                    alt="review star"></div>
                            <div class="madeincountry"><img src="http://127.0.0.1:8000/front/images/madeincountry.png"
                                    data-src="" alt="country"></div>
                        </div>


                        <div class="customize-form">
                            <div class="form-heading"><span>1</span>Customize Your Form</div>

                            <p>Enter the information as it should appear on your form.</p>

                            <form action="">

                                <div class="form-field">
                                    <label>Company Name</label>
                                    <input type="text" class="input-box" value="" placeholder="">
                                </div>

                                <div class="form-field">
                                    <label>Address</label>
                                    <input type="text" class="input-box" value="" placeholder="">
                                </div>

                                <div class="form-field">
                                    <label>City, State, Zip</label>
                                    <input type="text" class="input-box" value="" placeholder="">
                                </div>

                                <div class="form-field">
                                    <label>Telephone #</label>
                                    <input type="text" class="input-box" value="" placeholder="">
                                </div>

                                <div class="form-field">
                                    <label>Additional Imprint Line</label>
                                    <input type="text" class="input-box" value="" placeholder="">
                                </div>

                                <label class="form-field upload-file">
                                    <span class="cpf-upload-wrap">
                                        <span class="cpf-upload-text">Upload Your Logo</span><input type="file"
                                            class="btns" data-file=""
                                            accept=".jpg, .jpeg, .jpe, .gif, .png, .bmp, .tiff, .tif, .webp, .avif, .ico, .heic, .asf, .asx, .wmv, .wmx, .wm, .avi, .divx, .flv, .mov, .qt, .mpeg, .mpg, .mpe, .mp4, .m4v, .ogv, .webm, .mkv, .3gp, .3gpp, .3g2, .3gp2, .txt, .asc, .c, .cc, .h, .srt, .csv, .tsv, .ics, .rtx, .css, .htm, .html, .vtt, .dfxp, .mp3, .m4a, .m4b, .aac, .ra, .ram, .wav, .ogg, .oga, .flac, .mid, .midi, .wma, .wax, .mka, .rtf, .js, .pdf, .swf, .class, .tar, .zip, .gz, .gzip, .rar, .7z, .exe, .psd, .xcf, .doc, .pot, .pps, .ppt, .wri, .xla, .xls, .xlt, .xlw, .mdb, .mpp, .docx, .docm, .dotx, .dotm, .xlsx, .xlsm, .xlsb, .xltx, .xltm, .xlam, .pptx, .pptm, .ppsx, .ppsm, .potx, .potm, .ppam, .sldx, .sldm, .onetoc, .onetoc2, .onetmp, .onepkg, .oxps, .xps, .odt, .odp, .ods, .odg, .odc, .odb, .odf, .wp, .wpd, .key, .numbers, .pages">
                                    </span>
                                    <small class="tc-max-file-size">(max file size 25 MB)</small>
                                </label>

                            </form>
                        </div>



                        <div class="customize-form">
                            <div class="form-heading"><span>2</span>Configure & Price</div>

                            <form action="">
                                <div class="form-field">
                                    <label><span>*</span>Quantity</label>
                                    <select class="form-select">
                                        <option>Choose an option</option>
                                        <option>250</option>
                                        <option>500+100 FREE</option>
                                        <option>1000+200 FREE</option>
                                        <option>2000+400 FREE</option>
                                    </select>
                                </div>


                                <div class="form-field">
                                    <label><span>*</span>Paper Type</label>
                                    <select class="form-select">
                                        <option>Choose an option</option>
                                        <option>2 part (white/yellow)</option>
                                        <option>3 part (white/yellow/pink)</option>
                                    </select>
                                </div>

                                <div class="form-field">
                                    <label>Ink Color</label>
                                    <select class="form-select">
                                        <option>Choose an option</option>
                                        <option>Black</option>
                                        <option>Full Color Logo – White Part Only</option>
                                    </select>
                                </div>

                                <div class="form-field">
                                    <label>Bindery Options</label>
                                    <select class="form-select">
                                        <option>Shrink-Wrap – Loose</option>
                                        <option>Books of 50 stapled with wrap-around cover</option>
                                        <option>Books of 50 stapled with wrap-around cover</option>
                                        <option>Books of 50 stapled with wrap-around cover</option>
                                    </select>
                                </div>

                                <div class="form-field">
                                    <label>Request digital proof</label>

                                    <div class="filds-radio-button">
                                        <input class="form-check-input" type="radio" name="" id="">
                                        <label class="form-check-label" for=""> Yes. Approval needed
                                            before print. </label>
                                    </div>

                                    <div class="filds-radio-button">
                                        <input class="form-check-input" type="radio" name="" id="">
                                        <label class="form-check-label" for=""> No. Everything is
                                            correct. Please print. </label>
                                    </div>

                                    <div class="form-field">
                                        <label>Email my proof to</label>
                                        <input type="text" class="input-box" value="" placeholder="">
                                    </div>
                                    <div class="proff-email">
                                        <p>Proof will be emailed to you after the order is placed.</p>
                                    </div>

                                    <a href="#" class="btns">Add to Cart</a>


                            </form>
                        </div>


                    </div>

                </div>

            </div>


            <div class="product-detail-tabing">
                <nav>
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">Additional information</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews</button>
                    </div>
                </nav>

                <div class="tab-content p-3 bg-light" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <table class="table">
                            <thead colspan="2" style="font"><strong style>Billing Summary</strong></thead>
                            <tbody>
                                <tr>
                                    <td>Billing Account Status</td>
                                    <td>Error</td>
                                </tr>
                                <tr>
                                    <td>Billing Account Status Detail</td>
                                    <td>Chargeback</td>
                                </tr>
                                <tr>
                                    <td>Total Fees (Chargent)</td>
                                    <td>$12,000.00</td>
                                </tr>
                                <tr>
                                    <td>Amount Paid To Date</td>
                                    <td>$3,000.00</td>
                                </tr>
                                <tr>
                                    <td>Percentage Paid</td>
                                    <td>20%</td>
                                </tr>
                                <tr>
                                    <td>Balance Owed (Chargent)</td>
                                    <td>$9,000.00</td>
                                </tr>
                                <tr>
                                    <td>Payment Due Amount</td>
                                    <td>$960.00</td>
                                </tr>
                                <tr>
                                    <td>Payment Due Date</td>
                                    <td>4/20/2020</td>
                                </tr>
                                <tr>
                                    <td>Past Due Amount</td>
                                    <td>$0.00</td>
                                </tr>
                                <tr>
                                    <td>Auto Pay</td>
                                    <td>On</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="review_header">
                            <div class="merchantheader">We're currently collecting product reviews for this item. In
                                the meantime, here are some reviews from our past customers sharing their overall
                                shopping experience. </div>
                            <div class="review-sec">
                                <div class="review-box rating-product">
                                    <div class="numbers color5">4.7</div>
                                    <div class="outof">
                                        <div>
                                            Out of 5.0</div>
                                    </div>
                                </div>
                                <div class="review-box graph-bar">
                                    <img class="graph block" alt="A graph showing this site's review totals."
                                        src="http://127.0.0.1:8000/front/images/gold-bars.png">
                                </div>

                                <div class="review-box stars-block">
                                    <div class="desc">Overall Rating</div>
                                    <span class="on"></span>
                                    <span class="on"></span>
                                    <span class="on"></span>
                                    <span class="on"></span>
                                    <span class="on half"></span>
                                </div>

                                <div class="review-box percentage block">
                                    <div class="numbers">95%</div>
                                    of customers that buy<br> from this merchant give <br>them a 4 or 5-Star rating.
                                </div>
                                <div id="sa_media_background"></div>
                            </div>

                        </div>


                        <div class="sa_review_section">

                            <div class="product_review">
                                <div class="main-questions">
                                    <div class="rating">
                                        <div class="stars">
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                        </div>
                                    </div>

                                    <div class="info" style="margin-top: 10px;">November 25, 2024 by
                                        <span class="name">Brandon W.</span> (TX, US)
                                    </div>
                                    <div class="comments">“Great!”</div>
                                </div>
                            </div>

                            <div class="product_review">
                                <div class="main-questions">
                                    <div class="rating">
                                        <div class="stars">
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                        </div>
                                    </div>

                                    <div class="info" style="margin-top: 10px;">November 25, 2024 by
                                        <span class="name">Brandon W.</span> (TX, US)
                                    </div>
                                    <div class="comments">“Great!”</div>
                                </div>
                            </div>


                            <div class="product_review">
                                <div class="main-questions">
                                    <div class="rating">
                                        <div class="stars">
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                        </div>
                                    </div>
                                    <div class="info" style="margin-top: 10px;">November 25, 2024 by
                                        <span class="name">Brandon W.</span> (TX, US)
                                    </div>
                                    <div class="comments">“Great!”</div>
                                </div>
                            </div>



                            <div class="product_review">
                                <div class="main-questions">
                                    <div class="rating">
                                        <div class="stars">
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                        </div>
                                    </div>
                                    <div class="info" style="margin-top: 10px;">November 25, 2024 by
                                        <span class="name">Brandon W.</span> (TX, US)
                                    </div>
                                    <div class="comments">“Great!”</div>
                                </div>
                            </div>



                            <div class="product_review">
                                <div class="main-questions">
                                    <div class="rating">
                                        <div class="stars">
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                            <span class="on"><img
                                                    src="http://127.0.0.1:8000/front/images/star-full-sm.png"
                                                    data-src="" alt="review star"></span>
                                        </div>
                                    </div>
                                    <div class="info" style="margin-top: 10px;">November 25, 2024 by
                                        <span class="name">Brandon W.</span> (TX, US)
                                    </div>
                                    <div class="comments">“Great!”</div>
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