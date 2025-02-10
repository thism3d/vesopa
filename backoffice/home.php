<?php
  require 'server_files/header_server.php';

  $title = "VESOPA Epos | BackOffice Home";
  require 'server_files/header.php';


?>

    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
      <!-- start page content-->
      <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Dashboard</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0 align-items-center">
                <li class="breadcrumb-item"><a href="javascript:;">
                    <ion-icon name="home-outline"></ion-icon>
                  </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Home</li>
              </ol>
            </nav>
          </div>
          <div class="ms-auto">
            <div class="btn-group">
              <button type="button" class="btn btn-outline-primary">Today</button>
              <button type="button"
                class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                  href="javascript:;">Yesterday</a>
                <a class="dropdown-item" href="javascript:;">This Week</a>
                <a class="dropdown-item" href="javascript:;">Last Week</a>
                <a class="dropdown-item" href="javascript:;">This Month</a>
                <a class="dropdown-item" href="javascript:;">Last Month</a>
                <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">This Year</a>
              </div>
            </div>
          </div>
        </div>
        <!--end breadcrumb-->


        <!-- Responsive Filter Form -->
        <div class="container mt-4 mb-4" style="padding-left: 0; padding-right: 0;">
          <div class="card shadow-sm">
              <div class="card-body">
                  <h5 class="card-title mb-3">Filter Options</h5>
                  <form class="row gx-2 gy-3 align-items-end">
                      <div class="col-12 col-md-2">
                          <label for="startDate" class="form-label">Start Date</label>
                          <input type="date" class="form-control" id="startDate" placeholder="Start Date">
                      </div>
                      <div class="col-12 col-md-2">
                          <label for="endDate" class="form-label">End Date</label>
                          <input type="date" class="form-control" id="endDate" placeholder="End Date">
                      </div>
                      <div class="col-12 col-md-2">
                          <label for="startTime" class="form-label">Start Time</label>
                          <input type="time" class="form-control" id="startTime" placeholder="Start Time">
                      </div>
                      <div class="col-12 col-md-2">
                          <label for="endTime" class="form-label">End Time</label>
                          <input type="time" class="form-control" id="endTime" placeholder="End Time">
                      </div>
                      <div class="col-12 col-md-2">
                          <label for="selectClerk" class="form-label">Select Clerk</label>
                          <select class="form-select" id="selectClerk">
                              <option selected>Choose...</option>
                              <option value="1">Clerk 1</option>
                              <option value="2">Clerk 2</option>
                              <option value="3">Clerk 3</option>
                          </select>
                      </div>
                      <div class="col-12 col-md-2 d-grid">
                          <label class="form-label invisible">Submit</label>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </form>
              </div>
          </div>
        </div>
        <!-- end Responsive Filter Form -->

        <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-4">
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-start gap-2">
                  <div>
                    <p class="mb-0 fs-6">Gross Sales</p>
                  </div>
                  <div class="ms-auto widget-icon-small text-white bg-gradient-purple">
                    <ion-icon name="wallet-outline"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <div>
                    <h4 class="mb-0">£92,854</h4>
                  </div>
                  <div class="ms-auto">+6.32%</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-start gap-2">
                  <div>
                    <p class="mb-0 fs-6">Net Sales</p>
                  </div>
                  <div class="ms-auto widget-icon-small text-white bg-gradient-success">
                    <ion-icon name="cash-outline"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <div>
                    <h4 class="mb-0">£48,789</h4>
                  </div>
                  <div class="ms-auto">+12.45%</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-start gap-2">
                  <div>
                    <p class="mb-0 fs-6">Total Orders</p>
                  </div>
                  <div class="ms-auto widget-icon-small text-white bg-gradient-info">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <div>
                    <h4 class="mb-0">2,234</h4>
                  </div>
                  <div class="ms-auto">+3.12%</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-start gap-2">
                  <div>
                    <p class="mb-0 fs-6">Expenses</p>
                  </div>
                  <div class="ms-auto widget-icon-small text-white bg-gradient-danger">
                    <ion-icon name="pricetag-outline"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <div>
                    <h4 class="mb-0">£4,539</h4>
                  </div>
                  <div class="ms-auto">+8.52%</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->


        <div class="row row-cols-1 row-cols-lg-2">
          <div class="col">
            <div class="card radius-10 w-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <h6 class="mb-0">Finalise Key</h6>
                </div>
                <hr />
                <div>
                  <div id="finalise_chart"></div>
                </div>
                <div class="table-responsive mb-4">
                  <table class="table table-bordered table-hover text-center sortable-table">
                      <thead class="table-dark">
                          <tr>
                              <th scope="col">Descriptor &#x21C5;</th>
                              <th scope="col">Quantity &#x21C5;</th>
                              <th scope="col">Total (£) &#x21C5;</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr><td>CASH</td><td>237.00</td><td>3,639.50</td></tr>
                          <tr><td>CREDIT CARD</td><td>52.00</td><td>1,822.29</td></tr>
                          <tr><td>£10</td><td>71.00</td><td>1,195.29</td></tr>
                          <tr><td>£20</td><td>10.00</td><td>412.32</td></tr>
                          <tr><td>£50</td><td>7.00</td><td>195.97</td></tr>
                      </tbody>
                  </table>
                </div> 
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <h6 class="mb-0">Fixed Totals</h6>
                </div>
                <hr>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover text-center sortable-table">
                      <thead class="table-dark">
                          <tr>
                              <th scope="col">Totaliser &#x21C5;</th>
                              <th scope="col">Quantity &#x21C5;</th>
                              <th scope="col">Total &#x21C5;</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr><td>NET sales</td><td>351.00</td><td>£6,657.08</td></tr>
                          <tr><td>GROSS Sales</td><td>1642.00</td><td>£6,809.70</td></tr>
                          <tr><td>CASH in Drawer</td><td>308.00</td><td>£4,834.79</td></tr>
                          <tr><td>CREDIT in Drawer</td><td>52.00</td><td>£1,822.29</td></tr>
                          <tr><td>TOTAL in Drawer</td><td>360.00</td><td>£6,657.08</td></tr>
                          <tr><td>Training Mode</td><td>3.00</td><td>£73.74</td></tr>
                          <tr><td>Discount Total</td><td>235.00</td><td>£153.06</td></tr>
                          <tr><td>Covers</td><td>351.00</td><td>Avg / cover £18.97</td></tr>
                          <tr><td>Grand Total Net</td><td>351.00</td><td>£6,657.08</td></tr>
                          <tr><td>Grand Total All +ve</td><td>1710.00</td><td>£7,054.50</td></tr>
                          <tr><td>CUST VERIFY1</td><td>70.00</td><td>£0.00</td></tr>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10 overflow-hidden w-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <h6 class="mb-0">Group Sales Total</h6>
                </div>
                <hr>
                <div id="group_sales_chart"></div>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover text-center sortable-table">
                      <thead class="table-dark">
                          <tr>
                              <th scope="col">Group &#x21C5;</th>
                              <th scope="col">Quantity &#x21C5;</th>
                              <th scope="col">Total (£) &#x21C5;</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr><td>Drinks</td><td>1256.00</td><td>3,455.93</td></tr>
                          <tr><td>Food</td><td>424.00</td><td>3,557.16</td></tr>
                          <tr><td>Not Allocated</td><td>54.00</td><td>0.00</td></tr>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10 overflow-hidden w-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <h6 class="mb-0">Department Sales Total</h6>
                </div>
                <hr>
                <div id="department_sales_chart"></div>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover text-center sortable-table">
                      <thead class="table-dark">
                          <tr>
                              <th scope="col">Department &#x21C5;</th>
                              <th scope="col">Quantity &#x21C5;</th>
                              <th scope="col">Total (£) &#x21C5;</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr><td>Whiskey</td><td>538.00</td><td>1,836.59</td></tr>
                        <tr><td>Bottled Beers</td><td>201.00</td><td>722.68</td></tr>
                        <tr><td>Soft Drinks</td><td>217.00</td><td>476.94</td></tr>
                        <tr><td>Food</td><td>212.00</td><td>2,593.56</td></tr>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10 overflow-hidden w-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <h6 class="mb-0">Clerks Breakdown</h6>
                </div>
                <hr>
                <div id="clerk_breakdown_chart"></div>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover text-center sortable-table">
                      <thead class="table-dark">
                          <tr>
                              <th scope="col">Number &#x21C5;</th>
                              <th scope="col">Clerk &#x21C5;</th>
                              <th scope="col">Sales &#x21C5;</th>
                              <th scope="col">Total (£) &#x21C5;</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr><td>1</td><td>Mo</td><td>158</td><td>£3,043.00</td></tr>
                        <tr><td>3</td><td>Darren</td><td>24</td><td>£489.13</td></tr>
                        <tr><td>4</td><td>Eduard</td><td>116</td><td>£2,144.91</td></tr>
                        <tr><td>5</td><td>Steve</td><td>71</td><td>£1,336.05</td></tr>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10 overflow-hidden w-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <h6 class="mb-0">Top Customers</h6>
                </div>
                <hr>
                <div id="top_customers_chart"></div>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover text-center sortable-table">
                      <thead class="table-dark">
                          <tr>
                              <th scope="col">Account Num &#x21C5;</th>
                              <th scope="col">Name &#x21C5;</th>
                              <th scope="col">Total (£) &#x21C5;</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr><td>3</td><td>Arpita Dee-Anne</td><td>£138.64</td></tr>
                        <tr><td>4</td><td>Joe Blogs</td><td>£130.07</td></tr>
                        <tr><td>2</td><td>Hamza Jones</td><td>£98.75</td></tr>
                        <tr><td>9</td><td>Muzahid</td><td>£78.84</td></tr>
                        <tr><td>1</td><td>James Smith</td><td>£74.17</td></tr>
                        <tr><td>7</td><td>Niha</td><td>£66.68</td></tr>
                        <tr><td>10</td><td>Niharika</td><td>£66.49</td></tr>
                        <tr><td>6</td><td>Arek</td><td>£63.30</td></tr>
                        <tr><td>8</td><td>Gustavo</td><td>£61.01</td></tr>
                        <tr><td>5</td><td>Trev Long</td><td>£43.30</td></tr>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10 overflow-hidden w-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <h6 class="mb-0">PLU Sales</h6>
                </div>
                <hr>
                <div id="top_customers_chart"></div>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover text-center sortable-table" style="max-height: 500px; overflow-y: auto; display: block;">
                      <thead class="table-dark">
                          <tr>
                              <th scope="col">Number &#x21C5;</th>
                              <th scope="col">Descriptor &#x21C5;</th>
                              <th scope="col">Quantity &#x21C5;</th>
                              <th scope="col">Total (£) &#x21C5;</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr><td>1</td><td>Test</td><td>75.00</td><td>£269.87</td></tr>
                        <tr><td>2</td><td>Ringwood Best</td><td>67.00</td><td>£202.47</td></tr>
                        <tr><td>3</td><td>Fuggle De Dum</td><td>194.00</td><td>£674.17</td></tr>
                        <tr><td>4</td><td>Salcombe Seahorse</td><td>54.00</td><td>£190.70</td></tr>
                        <tr><td>5</td><td>Bottle Milk 1 Litre</td><td>75.00</td><td>£222.94</td></tr>
                        <tr><td>6</td><td>Guinness</td><td>73.00</td><td>£276.44</td></tr>
                        <tr><td>10</td><td>Ringwood Best</td><td>67.00</td><td>£240.84</td></tr>
                        <tr><td>11</td><td>Corona</td><td>134.00</td><td>£481.84</td></tr>
                        <tr><td>17</td><td>Coke</td><td>150.00</td><td>£329.72</td></tr>
                        <tr><td>19</td><td>Lemonade</td><td>67.00</td><td>£147.22</td></tr>
                        <tr><td>26</td><td>Vodka</td><td>150.00</td><td>£209.86</td></tr>
                        <tr><td>29</td><td>Rum</td><td>150.00</td><td>£209.86</td></tr>
                        <tr><td>50</td><td>Soup Of The Day</td><td>54.00</td><td>£245.40</td></tr>
                        <tr><td>51</td><td>Potted Shrimps</td><td>52.00</td><td>£236.40</td></tr>
                        <tr><td>52</td><td>Terrine of Chicken</td><td>52.00</td><td>£236.40</td></tr>
                        <tr><td>54</td><td>Garlic Mushrooms</td><td>54.00</td><td>£245.40</td></tr>
                        <tr><td>100</td><td>Sirloin</td><td>54.00</td><td>£647.28</td></tr>
                        <tr><td>103</td><td>Scallops</td><td>52.00</td><td>£623.52</td></tr>
                        <tr><td>105</td><td>Lamb</td><td>54.00</td><td>£647.28</td></tr>
                        <tr><td>106</td><td>Vension</td><td>52.00</td><td>£675.48</td></tr>
                        <tr><td>312</td><td>Medium/Rare</td><td>54.00</td><td>£0.00</td></tr>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10 overflow-hidden w-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <h6 class="mb-0">Last 100 Sales</h6>
                </div>
                <hr>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover text-center sortable-table" style="max-height: 500px; overflow-y: auto; display: block;">
                      <thead class="table-dark">
                          <tr>
                              <th scope="col">Time &#x21C5;</th>
                              <th scope="col">Sale ID &#x21C5;</th>
                              <th scope="col">Shop &#x21C5;</th>
                              <th scope="col">Total (£) &#x21C5;</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr><td>18:54</td><td>1124294150171224</td><td>Test Vesopa Shop</td><td>£7.20</td></tr>
                        <tr><td>18:52</td><td>1124294149171224</td><td>Test Vesopa Shop</td><td>£7.20</td></tr>
                        <tr><td>18:51</td><td>1124294148171224</td><td>Test Vesopa Shop</td><td>£12.46</td></tr>
                        <tr><td>18:50</td><td>1124294147171224</td><td>Test Vesopa Shop</td><td>£7.20</td></tr>
                        <tr><td>18:49</td><td>1124294146171224</td><td>Test Vesopa Shop</td><td>£33.10</td></tr>
                        <tr><td>18:46</td><td>1124294145171224</td><td>Test Vesopa Shop</td><td>£34.10</td></tr>
                        <tr><td>18:46</td><td>1124294144171224</td><td>Test Vesopa Shop</td><td>£41.17</td></tr>
                        <tr><td>18:45</td><td>1124294143171224</td><td>Test Vesopa Shop</td><td>£24.06</td></tr>
                        <tr><td>18:41</td><td>1124294142171224</td><td>Test Vesopa Shop</td><td>£14.70</td></tr>
                        <tr><td>18:41</td><td>1124294141171224</td><td>Test Vesopa Shop</td><td>£41.60</td></tr>
                        <tr><td>18:36</td><td>1124294140171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>18:36</td><td>1124294139171224</td><td>Test Vesopa Shop</td><td>£7.20</td></tr>
                        <tr><td>18:32</td><td>1124294138171224</td><td>Test Vesopa Shop</td><td>£6.66</td></tr>
                        <tr><td>18:32</td><td>1124294137171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>18:31</td><td>1124294136171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>18:29</td><td>1124294132171224</td><td>Test Vesopa Shop</td><td>£24.06</td></tr>
                        <tr><td>18:27</td><td>1124294135171224</td><td>Test Vesopa Shop</td><td>£33.10</td></tr>
                        <tr><td>18:26</td><td>1124294134171224</td><td>Test Vesopa Shop</td><td>£12.46</td></tr>
                        <tr><td>18:22</td><td>1124294133171224</td><td>Test Vesopa Shop</td><td>£33.10</td></tr>
                        <tr><td>18:21</td><td>1124294131171224</td><td>Test Vesopa Shop</td><td>£12.46</td></tr>
                        <tr><td>18:19</td><td>1124294130171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>18:18</td><td>1124294129171224</td><td>Test Vesopa Shop</td><td>£7.20</td></tr>
                        <tr><td>18:15</td><td>1124294128171224</td><td>Test Vesopa Shop</td><td>£6.66</td></tr>
                        <tr><td>18:14</td><td>1124294127171224</td><td>Test Vesopa Shop</td><td>£6.66</td></tr>
                        <tr><td>18:11</td><td>1124294126171224</td><td>Test Vesopa Shop</td><td>£14.16</td></tr>
                        <tr><td>18:10</td><td>1124294125171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>18:09</td><td>1124294124171224</td><td>Test Vesopa Shop</td><td>£34.10</td></tr>
                        <tr><td>18:06</td><td>1124294123171224</td><td>Test Vesopa Shop</td><td>£6.66</td></tr>
                        <tr><td>18:06</td><td>1124294122171224</td><td>Test Vesopa Shop</td><td>£7.20</td></tr>
                        <tr><td>18:05</td><td>1124294121171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>18:03</td><td>1124294120171224</td><td>Test Vesopa Shop</td><td>£12.46</td></tr>
                        <tr><td>18:02</td><td>1124294119171224</td><td>Test Vesopa Shop</td><td>£14.16</td></tr>
                        <tr><td>18:01</td><td>1124294117171224</td><td>Test Vesopa Shop</td><td>£46.87</td></tr>
                        <tr><td>17:56</td><td>1124294118171224</td><td>Test Vesopa Shop</td><td>£32.76</td></tr>
                        <tr><td>17:55</td><td>1124294116171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>17:54</td><td>1124294115171224</td><td>Test Vesopa Shop</td><td>£34.10</td></tr>
                        <tr><td>17:50</td><td>1124294114171224</td><td>Test Vesopa Shop</td><td>£7.20</td></tr>
                        <tr><td>17:49</td><td>1124294113171224</td><td>Test Vesopa Shop</td><td>£23.83</td></tr>
                        <tr><td>17:45</td><td>1124294112171224</td><td>Test Vesopa Shop</td><td>£34.10</td></tr>
                        <tr><td>17:43</td><td>1124294111171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>17:42</td><td>1124294110171224</td><td>Test Vesopa Shop</td><td>£6.66</td></tr>
                        <tr><td>17:40</td><td>1124294109171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>17:38</td><td>1124294108171224</td><td>Test Vesopa Shop</td><td>£34.10</td></tr>
                        <tr><td>17:38</td><td>1124294106171224</td><td>Test Vesopa Shop</td><td>£24.06</td></tr>
                        <tr><td>17:36</td><td>1124294107171224</td><td>Test Vesopa Shop</td><td>£34.10</td></tr>
                        <tr><td>17:34</td><td>1124294105171224</td><td>Test Vesopa Shop</td><td>£33.10</td></tr>
                        <tr><td>17:33</td><td>1124294104171224</td><td>Test Vesopa Shop</td><td>£6.66</td></tr>
                        <tr><td>17:32</td><td>1124294103171224</td><td>Test Vesopa Shop</td><td>£6.66</td></tr>
                        <tr><td>17:31</td><td>1124294102171224</td><td>Test Vesopa Shop</td><td>£7.20</td></tr>
                        <tr><td>17:29</td><td>1124294101171224</td><td>Test Vesopa Shop</td><td>£33.10</td></tr>
                        <tr><td>17:28</td><td>1124294100171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>17:28</td><td>1124294099171224</td><td>Test Vesopa Shop</td><td>£19.96</td></tr>
                        <tr><td>17:25</td><td>1124294098171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>17:24</td><td>1124294097171224</td><td>Test Vesopa Shop</td><td>£12.46</td></tr>
                        <tr><td>17:23</td><td>1124294096171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>17:21</td><td>1124294095171224</td><td>Test Vesopa Shop</td><td>£12.46</td></tr>
                        <tr><td>17:19</td><td>1124294094171224</td><td>Test Vesopa Shop</td><td>£14.16</td></tr>
                        <tr><td>17:17</td><td>1124294093171224</td><td>Test Vesopa Shop</td><td>£33.75</td></tr>
                        <tr><td>17:16</td><td>1124294092171224</td><td>Test Vesopa Shop</td><td>£33.10</td></tr>
                        <tr><td>17:15</td><td>1124294091171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>17:13</td><td>1124294090171224</td><td>Test Vesopa Shop</td><td>£34.10</td></tr>
                        <tr><td>17:12</td><td>1124294089171224</td><td>Test Vesopa Shop</td><td>£33.75</td></tr>
                        <tr><td>17:11</td><td>1124294088171224</td><td>Test Vesopa Shop</td><td>£34.10</td></tr>
                        <tr><td>17:11</td><td>1124294087171224</td><td>Test Vesopa Shop</td><td>£14.16</td></tr>
                        <tr><td>17:08</td><td>1124294086171224</td><td>Test Vesopa Shop</td><td>£33.10</td></tr>
                        <tr><td>17:07</td><td>1124294085171224</td><td>Test Vesopa Shop</td><td>£34.10</td></tr>
                        <tr><td>17:04</td><td>1124294084171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>17:04</td><td>1124294083171224</td><td>Test Vesopa Shop</td><td>£14.70</td></tr>
                        <tr><td>17:01</td><td>1124294082171224</td><td>Test Vesopa Shop</td><td>£7.20</td></tr>
                        <tr><td>17:00</td><td>1124294081171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>16:59</td><td>1124294080171224</td><td>Test Vesopa Shop</td><td>£7.20</td></tr>
                        <tr><td>16:59</td><td>1124294079171224</td><td>Test Vesopa Shop</td><td>£12.46</td></tr>
                        <tr><td>16:57</td><td>1124294076171224</td><td>Test Vesopa Shop</td><td>£24.06</td></tr>
                        <tr><td>16:56</td><td>1124294078171224</td><td>Test Vesopa Shop</td><td>£33.10</td></tr>
                        <tr><td>16:54</td><td>1124294077171224</td><td>Test Vesopa Shop</td><td>£34.10</td></tr>
                        <tr><td>16:52</td><td>1124294075171224</td><td>Test Vesopa Shop</td><td>£33.10</td></tr>
                        <tr><td>16:50</td><td>1124294074171224</td><td>Test Vesopa Shop</td><td>£16.58</td></tr>
                        <tr><td>16:49</td><td>1124294073171224</td><td>Test Vesopa Shop</td><td>£12.46</td></tr>
                        <tr><td>16:45</td><td>1124294072171224</td><td>Test Vesopa Shop</td><td>£7.20</td></tr>
                        <tr><td>16:44</td><td>1124294071171224</td><td>Test Vesopa Shop</td><td>£33.10</td></tr>
                        <tr><td>16:43</td><td>1124294070171224</td><td>Test Vesopa Shop</td><td>£12.46</td></tr>
                        <tr><td>16:43</td><td>1124294069171224</td><td>Test Vesopa Shop</td><td>£6.66</td></tr>
                        <tr><td>16:40</td><td>1124294068171224</td><td>Test Vesopa Shop</td><td>£33.10</td></tr>
                        <tr><td>16:40</td><td>1124294066171224</td><td>Test Vesopa Shop</td><td>£40.60</td></tr>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->


        <div class="row">
          <div class="col-12 col-lg-12 col-xl-6 d-flex">
            <div class="card radius-10 w-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <h6 class="mb-0">Customers</h6>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-3 align-items-center">
                  <div class="col-lg-7 col-xl-7 col-xxl-7 order-2">
                    <div id="chart6"></div>
                  </div>
                  <div class="col-lg-5 col-xl-5 col-xxl-5">
                    <div class="">
                       <div class="mb-4">
                         <h2 class="mb-0">846</h2>
                         <p class="mb-0">Total Customers</p>
                       </div>
                      <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="widget-icon-small rounded bg-light-purple text-purple">
                          <ion-icon name="gift-outline"></ion-icon>
                        </div>
                        <div>
                          <p class="mb-1">Current Customers</p>
                          <p class="mb-0 h5">124</p>
                        </div>
                      </div>
                      <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="widget-icon-small rounded bg-light-info text-info">
                          <ion-icon name="briefcase-outline"></ion-icon>
                        </div>
                        <div>
                          <p class="mb-1">New Customers</p>
                          <p class="mb-0 h5">386</p>
                        </div>
                      </div>
                      <div class="d-flex align-items-start gap-3">
                        <div class="widget-icon-small rounded bg-light-orange text-orange">
                          <ion-icon name="book-outline"></ion-icon>
                        </div>
                        <div>
                          <p class="mb-1">Retargeted Customers</p>
                          <p class="mb-0 h5">425</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        </div>
        <!--end row-->


      </div>
      <!-- end page content-->
    </div>
    <!--end page content wrapper-->


    <!--start footer-->
    <footer class="footer">
      <div class="footer-text">
        Copyright © 2025. All right reserved by Vesopa Ltd.
      </div>
    </footer>
    <!--end footer-->


    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top">
      <ion-icon name="arrow-up-outline"></ion-icon>
    </a>
    <!--End Back To Top Button-->

    <!--start switcher-->
    <!--     
    <div class="switcher-body">
      <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
        <ion-icon name="color-palette-outline" class="me-0"></ion-icon>
      </button>
      <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false"
        tabindex="-1" id="offcanvasScrolling">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <h6 class="mb-0">Theme Variation</h6>
          <hr>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked>
            <label class="form-check-label" for="LightTheme">Light</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
            <label class="form-check-label" for="DarkTheme">Dark</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDark" value="option3">
            <label class="form-check-label" for="SemiDark">Semi Dark</label>
          </div>
          <hr />
          <h6 class="mb-0">Header Colors</h6>
          <hr />
          <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
              <div class="col">
                <div class="indigator headercolor1" id="headercolor1"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor2" id="headercolor2"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor3" id="headercolor3"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor4" id="headercolor4"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor5" id="headercolor5"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor6" id="headercolor6"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor7" id="headercolor7"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor8" id="headercolor8"></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
     -->
    <!--end switcher-->


    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

  </div>
  <!--end wrapper-->


  <!-- JS Files-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <!--plugins-->
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
  <script src="assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
  <script src="assets/plugins/chartjs/chart.min.js"></script>
  <script src="assets/js/index.js"></script>
  <!-- Main JS-->
  <script src="assets/js/main.js"></script>

  <script>
    $(function () {
      "use strict";
      
      const MATERIAL_COLORS = ["#F44336", "#E91E63", "#9C27B0", "#673AB7", "#3F51B5", "#2196F3", "#03A9F4", "#00BCD4", "#009688", "#4CAF50", "#8BC34A", "#CDDC39", "#FFEB3B", "#FFC107", "#FF9800", "#FF5722", "#795548", "#9E9E9E", "#607D8B", "#000000"];

      var options = {
        series: [44, 55, 13, 43, 22],
        chart: {
          foreColor: '#9ba7b2',
          height: 220,
          type: 'pie',
        },
        colors: MATERIAL_COLORS,
        labels: ['Cash', 'Credit Card', '£10', '£20', '£50'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              height: 360
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
      };
      var chart = new ApexCharts(document.querySelector("#finalise_chart"), options);
      chart.render();



      var options = {
        series: [3455.93, 3557.16], 
        chart: {
            foreColor: '#9ba7b2',
            height: 220,
            type: 'pie'
        },
        colors: MATERIAL_COLORS,
        labels: ['Drinks', 'Food'], 
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 360
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
      var chart = new ApexCharts(document.querySelector("#group_sales_chart"), options);
      chart.render();


      var options = {
        series: [1836.59, 722.68, 476.94, 2593.56],
        chart: {
            type: 'pie',
            height: 220
        },
        labels: ['Whiskey', 'Bottled Beers', 'Soft Drinks', 'Food'], 
        colors: MATERIAL_COLORS,
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 350
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
      var chart = new ApexCharts(document.querySelector("#department_sales_chart"), options);
      chart.render();
      
      var options = {
          series: [3043.00, 489.13, 2144.91, 1336.05],  
          chart: {
              type: 'pie', 
              height: 220
          },
          labels: ['Mo', 'Darren', 'Eduard', 'Steve'], 
          colors: MATERIAL_COLORS, 
          responsive: [{
              breakpoint: 480,
              options: {
                  chart: {
                      height: 300
                  },
                  legend: {
                      position: 'bottom'
                  }
              }
          }]
      };
      var chart = new ApexCharts(document.querySelector("#clerk_breakdown_chart"), options);
      chart.render();
      
    });


    document.addEventListener("DOMContentLoaded", function () {
        const tables = document.querySelectorAll(".sortable-table");

        tables.forEach((table) => {
            const headers = table.querySelectorAll("th");

            headers.forEach((header, columnIndex) => {
                header.addEventListener("click", () => sortTable(table, columnIndex, header));
            });
        });

        function sortTable(table, columnIndex, header) {
            const rows = Array.from(table.querySelectorAll("tbody tr"));
            const direction = header.dataset.sort === "asc" ? "desc" : "asc";

            rows.sort((rowA, rowB) => {
                let cellA = rowA.cells[columnIndex].innerText.trim();
                let cellB = rowB.cells[columnIndex].innerText.trim();

                // Handle numeric sorting (remove £ and commas)
                const isNumeric = !isNaN(cellA.replace(/[£,]/g, '')) && !isNaN(cellB.replace(/[£,]/g, ''));
                if (isNumeric) {
                    cellA = parseFloat(cellA.replace(/[£,]/g, ''));
                    cellB = parseFloat(cellB.replace(/[£,]/g, ''));
                    return direction === "asc" ? cellA - cellB : cellB - cellA;
                } else {
                    return direction === "asc" ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
                }
            });

            // Toggle sort direction
            header.dataset.sort = direction;

            // Append sorted rows
            const tbody = table.querySelector("tbody");
            tbody.innerHTML = "";
            rows.forEach(row => tbody.appendChild(row));
        }
    });
  </script>


</body>

</html>