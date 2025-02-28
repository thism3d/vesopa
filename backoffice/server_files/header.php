<?php
    $title = isset($title) ? $title : "VESOPA Epos | BackOffice";
    $extra_header = isset($extra_header) ? $extra_header : "";
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Icon -->
  <link rel="icon" type="image/webp" href="logo.webp" />

  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>

  <!--plugins-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <!--Theme Styles-->
  <link href="assets/css/dark-theme.css" rel="stylesheet" />
  <link href="assets/css/semi-dark.css" rel="stylesheet" />
  <link href="assets/css/header-colors.css" rel="stylesheet" />

  <title><?php echo $title; ?></title>

  <?php echo $extra_header; ?>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">

    <!--start sidebar -->
    <aside class="sidebar-wrapper" data-simplebar="true">
      <div class="sidebar-header">
        <div>
          <img src="assets/images/logo-icon-2.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
          <h4 class="logo-text">VESOPA</h4>
        </div>
      </div>
      <!--navigation-->
      <ul class="metismenu" id="menu">
        <li>
          <a href="index">
            <div class="parent-icon">
              <ion-icon name="home-outline"></ion-icon>
            </div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>
        <li>
          <a href="report">
            <div class="parent-icon">
              <ion-icon name="document-text-outline"></ion-icon>
            </div>
            <div class="menu-title">Report</div>
          </a>
        </li>
        <li>
          <a href="products">
            <div class="parent-icon">
              <ion-icon name="cube-outline"></ion-icon>
            </div>
            <div class="menu-title">Products</div>
          </a>
        </li>
        <!-- <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <ion-icon name="layers-outline"></ion-icon>
            </div>
            <div class="menu-title">Stock</div>
          </a>
          <ul>
            <li> <a href="stock_list">
                <ion-icon name="ellipse-outline"></ion-icon>List
              </a>
            </li>
            <li> <a href="stock_orders">
                <ion-icon name="ellipse-outline"></ion-icon>Orders
              </a>
            </li>
            <li> <a href="stock_transfers">
                <ion-icon name="ellipse-outline"></ion-icon>Transfers
              </a>
            </li>
            <li> <a href="stock_wastages">
                <ion-icon name="ellipse-outline"></ion-icon>Wastages
              </a>
            </li>
            <li> <a href="stock_returns">
                <ion-icon name="ellipse-outline"></ion-icon>Returns
              </a>
            </li>
            <li> <a href="stock_suppliers">
                <ion-icon name="ellipse-outline"></ion-icon>Suppliers
              </a>
            </li>
            <li> <a href="stock_case_sizes">
                <ion-icon name="ellipse-outline"></ion-icon>Case Sizes
              </a>
            </li>
          </ul>
        </li> -->
        <li>
          <a href="clerks">
            <div class="parent-icon">
              <ion-icon name="person-outline"></ion-icon>
            </div>
            <div class="menu-title">Clerks</div>
          </a>
        </li>
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <ion-icon name="layers-outline"></ion-icon>
            </div>
            <div class="menu-title">Programming</div>
          </a>
          <ul>
            <li> <a href="program_departments">
                <ion-icon name="ellipse-outline"></ion-icon>Departments
              </a>
            </li>
            <li> <a href="program_groups">
                <ion-icon name="ellipse-outline"></ion-icon>Groups
              </a>
            </li>
            <li> <a href="mix_match">
                <ion-icon name="ellipse-outline"></ion-icon>Mix and Match
              </a>
            </li>
            <li> <a href="finalise_keys">
                <ion-icon name="ellipse-outline"></ion-icon>Finalise Keys
              </a>
            </li>
            <li> <a href="error_reasons">
                <ion-icon name="ellipse-outline"></ion-icon>Error Reasons
              </a>
            </li>
            <li> <a href="tax">
                <ion-icon name="ellipse-outline"></ion-icon>Tax
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <ion-icon name="cash-outline"></ion-icon>
            </div>
            <div class="menu-title">Sales</div>
          </a>
          <ul>
            <li> <a href="sales_explorer">
                <ion-icon name="ellipse-outline"></ion-icon>Explorer
              </a>
            </li>
            <li> <a href="till_report">
                <ion-icon name="ellipse-outline"></ion-icon>Till Report
              </a>
            </li>
            <li> <a href="bill_report">
                <ion-icon name="ellipse-outline"></ion-icon>Bill Report
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="customers">
            <div class="parent-icon">
              <ion-icon name="person-outline"></ion-icon>
            </div>
            <div class="menu-title">Customers</div>
          </a>
        </li>
        <li>
          <a href="vouchers">
            <div class="parent-icon">
              <ion-icon name="ticket-outline"></ion-icon>
            </div>
            <div class="menu-title">Vouchers</div>
          </a>
        </li>
        
      </ul>
      <!--end navigation-->
    </aside>
    <!--end sidebar -->

    <!--start top header-->
    <header class="top-header">
      <nav class="navbar navbar-expand gap-3">
        <div class="toggle-icon">
          <ion-icon name="menu-outline"></ion-icon>
        </div>
       
        <div class="top-navbar-right ms-auto">

          <ul class="navbar-nav align-items-center">
            
            <li class="nav-item">
              <a class="nav-link dark-mode-icon" href="javascript:;">
                <div class="mode-icon">
                  <ion-icon name="moon-outline"></ion-icon>
                </div>
              </a>
            </li>
           
           
            <li class="nav-item dropdown dropdown-user-setting">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                <div class="user-setting">
                  <img src="assets/images/avatars/logo.png" class="user-img" alt="">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex flex-row align-items-center gap-2">
                      <img src="assets/images/avatars/logo.png" alt="" class="rounded-circle" width="54" height="54">
                      <div class="">
                        <h6 class="mb-0 dropdown-user-name">Vesopa EPOS Test</h6>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="log-out-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Logout</span></div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>

          </ul>

        </div>
      </nav>
    </header>
    <!--end top header-->
