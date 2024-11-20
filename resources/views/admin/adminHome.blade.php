@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
     <div class="row">
          <div class="col-md-8">
               <div class="dashboard-report-sec">
                    <div class="dashboard-salesreport">
                         <div class="card">
                              <div class="card-report-content">
                                   <h3><span></span>Total Income</h3>
                                   <p class="amount">$8,55,450</p>
                                   <p class="info"><span class="green">+12%</span> From last month</p>
                              </div>
                              <div class="mini-bar-chart">
                                   <div class="bar"></div>
                                   <div class="bar active"></div>
                                   <div class="bar"></div>
                                   <div class="bar"></div>
                              </div>
                         </div>
                         <div class="card">
                              <div class="card-report-content">
                                   <h3><span></span>Total Order</h3>
                                   <p class="amount">25,450</p>
                                   <p class="info"><span class="green">+12%</span> From last month</p>
                              </div>
                              <div class="mini-bar-chart">
                                   <div class="bar"></div>
                                   <div class="bar active"></div>
                                   <div class="bar"></div>
                                   <div class="bar"></div>
                              </div>
                         </div>
                         <div class="card">
                              <div class="card-report-content">
                                   <h3><span></span>Average Sale</h3>
                                   <p class="amount">$12,25.00</p>
                                   <p class="info"><span class="red">-12%</span> From last month</p>
                              </div>
                              <div class="mini-bar-chart">
                                   <div class="bar"></div>
                                   <div class="bar active"></div>
                                   <div class="bar"></div>
                                   <div class="bar"></div>
                              </div>
                         </div>
                         <div class="card">
                              <div class="card-report-content">
                                   <h3><span></span>Total Sale</h3>
                                   <p class="amount">$99,44.00</p>
                                   <p class="info"><span class="green">+20%</span> From last month</p>
                              </div>
                              <div class="mini-bar-chart">
                                   <div class="bar"></div>
                                   <div class="bar active"></div>
                                   <div class="bar"></div>
                                   <div class="bar"></div>
                              </div>
                         </div>
                    </div>
                    <div class="sales-report">
                         <div class="last-sales-report">
                              <h3>Sale Report</h3>
                              <select name="cars" id="">
                                   <option value="">Last 7 days</option>
                                   <option value="">Last 6 days</option>
                                   <option value="">Last 5 days</option>
                                   <option value="">Last 4 days</option>
                                   <option value="">Last 3 days</option>
                                   <option value="">Last 2 days</option>
                                   <option value="">Last 1 days</option>
                              </select>
                         </div>
                         <div class="pie-chart">
                              <div class="slice slice-1"></div>
                              <div class="slice slice-2"></div>
                              <div class="slice slice-3"></div>
                         </div>
                    </div>
               </div>
               <div class="product-list">
                    <div class="card">
                         <!-- end card body -->
                         <div class="table-responsive table-centered">
                              <table class="table mb-0">
                                   <thead class="bg-light bg-opacity-50">
                                        <tr>
                                             <th class="ps-3">
                                                  Order ID.
                                             </th>
                                             <th>
                                                  Date
                                             </th>
                                             <th>
                                                  Product
                                             </th>
                                             <th>
                                                  Customer Name
                                             </th>
                                             <th>
                                                  Email ID
                                             </th>
                                             <th>
                                                  Phone No.
                                             </th>
                                             <th>
                                                  Address
                                             </th>
                                             <th>
                                                  Status
                                             </th>
                                        </tr>
                                   </thead>
                                   <!-- end thead-->
                                   <tbody>
                                        <tr>
                                             <td class="ps-3">
                                                  <a href="#">#RB5625</a>
                                             </td>
                                             <td>29 April 2024</td>
                                             <td>
                                                  <img src="assets/img/tshirt-same.png" alt="product-1(1)"
                                                       class="img-fluid avatar-sm">
                                             </td>
                                             <td>
                                                  <a href="#!">Anna M. Hines</a>
                                             </td>
                                             <td>anna.hines@mail.com</td>
                                             <td>(+1)-555-1564-261</td>
                                             <td>Burr Ridge/Illinois</td>
                                             <td>
                                                  <i class="bx bxs-circle text-success me-1"></i>Completed
                                             </td>
                                        </tr>
                                        <tr>
                                             <td class="ps-3">
                                                  <a href="#">#RB9652</a>
                                             </td>
                                             <td>25 April 2024</td>
                                             <td>
                                                  <img src="assets/img/tshirt-black.png" alt="product-4"
                                                       class="img-fluid avatar-sm">
                                             </td>
                                             <td>
                                                  <a href="#!">Judith H. Fritsche</a>
                                             </td>
                                             <td>judith.fritsche.com</td>
                                             <td>(+57)-305-5579-759</td>
                                             <td>SULLIVAN/Kentucky</td>
                                             <td>
                                                  <i class="bx bxs-circle text-success me-1"></i>Completed
                                             </td>
                                        </tr>
                                        <tr>
                                             <td class="ps-3">
                                                  <a href="#">#RB5984</a>
                                             </td>
                                             <td>25 April 2024</td>
                                             <td>
                                                  <img src="assets/img/tshirt-blue.png" alt="product-5"
                                                       class="img-fluid avatar-sm">
                                             </td>
                                             <td>
                                                  <a href="#!">Peter T. Smith</a>
                                             </td>
                                             <td>peter.smith@mail.com</td>
                                             <td>(+33)-655-5187-93</td>
                                             <td>Yreka/California</td>
                                             <td>
                                                  <i class="bx bxs-circle text-success me-1"></i>Completed
                                             </td>
                                        </tr>
                                        <tr>
                                             <td class="ps-3">
                                                  <a href="#">#RB3625</a>
                                             </td>
                                             <td>21 April 2024</td>
                                             <td>
                                                  <img src="assets/img/tshirt-black.png" alt="product-6"
                                                       class="img-fluid avatar-sm">
                                             </td>
                                             <td>
                                                  <a href="#!">Emmanuel J. Delcid</a>
                                             </td>
                                             <td>
                                                  emmanuel.delicid@mail.com
                                             </td>
                                             <td>(+30)-693-5553-637</td>
                                             <td>Atlanta/Georgia</td>
                                             <td>
                                                  <i class="bx bxs-circle text-primary me-1"></i>Processing
                                             </td>
                                        </tr>
                                        <tr>
                                             <td class="ps-3">
                                                  <a href="#">#RB8652</a>
                                             </td>
                                             <td>18 April 2024</td>
                                             <td>
                                                  <img src="assets/img/tshirt-white.png" alt="product-1(2)"
                                                       class="img-fluid avatar-sm">
                                             </td>
                                             <td>
                                                  <a href="#!">William J. Cook</a>
                                             </td>
                                             <td>william.cook@mail.com</td>
                                             <td>(+91)-855-5446-150</td>
                                             <td>Rosenberg/Texas</td>
                                             <td>
                                                  <i class="bx bxs-circle text-primary me-1"></i>Processing
                                             </td>
                                        </tr>
                                   </tbody>
                                   <!-- end tbody -->
                              </table>
                              <!-- end table -->
                         </div>
                         <!-- table responsive -->
                         <div class="card-footer border-top">
                              <div class="col-sm">
                                   <div class="text-muted">
                                        Showing
                                        <span class="fw-semibold">5</span>
                                        of
                                        <span class="fw-semibold">90,521</span>
                                        orders
                                   </div>
                              </div>
                              <div class="col-sm-auto">
                                   <ul class="pagination m-0">
                                        <li class="page-item">
                                             <a href="#" class="page-link pagination-left"><i
                                                       class="fa-solid fa-arrow-left-long"></i></a>
                                        </li>
                                        <li class="page-item active">
                                             <a href="#" class="page-link">1</a>
                                        </li>
                                        <li class="page-item">
                                             <a href="#" class="page-link">2</a>
                                        </li>
                                        <li class="page-item">
                                             <a href="#" class="page-link">3</a>
                                        </li>
                                        <li class="page-item pagination-right">
                                             <a href="#" class="page-link"><i
                                                       class="fa-solid fa-arrow-right-long"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                    </div>
                    <!-- end card -->
               </div>
          </div>
          <div class="col-md-4">
               <div class="sales-locations">
                    <h3>Most Sales Locations</h3>
                    <div class="total-sales">
                         <p class="sales-amount">76,345</p>
                         <p class="percentage"><span class="badge">+12.00%</span></p>
                         <p class="comparison">Compared to last month</p>
                    </div>
                    <div class="locations">
                         <div class="location">
                              <div class="location-name">
                                   <span class="dot" style="background-color: #ffd700;"></span> Brasilia
                              </div>
                              <div class="amount">$14,432.00</div>
                         </div>
                         <div class="location">
                              <div class="location-name">
                                   <span class="dot" style="background-color: #6c5ce7;"></span> California
                              </div>
                              <div class="amount">$13,457.00</div>
                         </div>
                         <div class="location">
                              <div class="location-name">
                                   <span class="dot" style="background-color: #3498db;"></span> Paris
                              </div>
                              <div class="amount">$24,789.00</div>
                         </div>
                         <div class="location">
                              <div class="location-name">
                                   <span class="dot" style="background-color: #e67e22;"></span> Bengaluru
                              </div>
                              <div class="amount">$9,569.00</div>
                         </div>
                    </div>
               </div>
               <div class="latest-sale">
                    <h3>Most Sales Locations</h3>
                    <div class="latest-sale-product">
                         <div class="latest-sale-left">
                              <span><img src="assets/img/tshirt-same.png" alt=""></span>
                              <div class="amount-date">
                                   <h4>Moving Company Work Uniform</h4>
                                   <span class="amount-pay">$10.95</span>
                                   <span class="sale-date">November 18, 2024</span>
                              </div>
                         </div>
                         <span class="sales-persent">
                              <h4 class="green">+324.25</h4>
                         </span>
                    </div>
                    <div class="latest-sale-product">
                         <div class="latest-sale-left">
                              <span><img src="assets/img/tshirt-same.png" alt=""></span>
                              <div class="amount-date">
                                   <h4>Moving Company Work Uniform</h4>
                                   <span class="amount-pay">$10.95</span>
                                   <span class="sale-date">November 18, 2024</span>
                              </div>
                         </div>
                         <span class="sales-persent">
                              <h4 class="red">+324.25</h4>
                         </span>
                    </div>
                    <div class="latest-sale-product">
                         <div class="latest-sale-left">
                              <span><img src="assets/img/tshirt-same.png" alt=""></span>
                              <div class="amount-date">
                                   <h4>Moving Company Work Uniform</h4>
                                   <span class="amount-pay">$10.95</span>
                                   <span class="sale-date">November 18, 2024</span>
                              </div>
                         </div>
                         <span class="sales-persent">
                              <h4 class="green">+324.25</h4>
                         </span>
                    </div>
                    <div class="latest-sale-product">
                         <div class="latest-sale-left">
                              <span><img src="assets/img/tshirt-same.png" alt=""></span>
                              <div class="amount-date">
                                   <h4>Moving Company Work Uniform</h4>
                                   <span class="amount-pay">$10.95</span>
                                   <span class="sale-date">November 18, 2024</span>
                              </div>
                         </div>
                         <span class="sales-persent">
                              <h4 class="red">+324.25</h4>
                         </span>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection