<?php
  require 'server_files/header_server.php';

  $title = "VESOPA Epos | BackOffice Departments";

  $extra_header = '
  <style>
    .product-header, .product-item {
      display: flex;
      align-items: center;
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 10px;
    }
    .product-header {
      font-weight: bold;
      background-color: #f8f9fa;
    }
    .product-header > div, .product-item > div {
      flex: 1;
      text-align: center;
    }
    .action-buttons {
      display: flex;
      justify-content: center;
      gap: 5px;
    }
    .product-item ion-icon{
      padding-left: 7px;
    }

    .pagination {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
    }
    .pagination a {
      margin: 0 5px;
      text-decoration: none;
      color: #007bff;
    }
    .pagination a:hover {
      text-decoration: underline;
    }


    @media (max-width: 768px) {
      .product-header, .product-item {
        flex-direction: column;
        text-align: left;
      }
      .product-header > div, .product-item > div {
        flex: none;
        width: 100%;
        padding: 5px 0;
        text-align: left;
      }
      .action-buttons {
        justify-content: flex-start;
      }
    }
  </style>';



  require 'server_files/header.php';



?>


        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">

             <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">EPOS</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item"><a href="index"><ion-icon name="home-outline"></ion-icon></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Departments</li>
                  </ol>
                </nav>
              </div>
              <div class="ms-auto">
                <button type="button" class="btn btn-success px-5">New</button>
              </div>
            </div>
            <!--end breadcrumb-->



            <!-- Pagination -->
            <!-- 
            <div class="pagination">
                <a href="#">«First</a>
                <a href="#">Prev</a>
                <span>Page 1 of 11</span>
                <a href="#">Next</a>
                <a href="#">Last»</a>
            </div> 
            -->

            <!-- Products List -->
            <div class="container mt-4">
              <div class="product-header">
                <div>Number</div>
                <div>Department</div>
                <div>Accounting Code</div>
                <div>Actions</div>
              </div>

              <div class="product-item">
                <div>1</div>
                <div>Food</div>
                <div>1234</div>
                <div class="action-buttons">
                  <button class="btn btn-sm btn-warning">
                    <ion-icon name="create-outline"></ion-icon>
                  </button>
                  <button class="btn btn-sm btn-danger">
                    <ion-icon name="trash-outline"></ion-icon>
                  </button>
                </div>
              </div>

              <div class="product-item">
                <div>2</div>
                <div>Drinks</div>
                <div>1235</div>
                <div class="action-buttons">
                  <button class="btn btn-sm btn-warning">
                    <ion-icon name="create-outline"></ion-icon>
                  </button>
                  <button class="btn btn-sm btn-danger">
                    <ion-icon name="trash-outline"></ion-icon>
                  </button>
                </div>
              </div>


            </div>
            <!-- Products List -->











   
           




          </div>
          <!-- end page content-->
         </div>
         <!--end page content wrapper-->


         <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><ion-icon name="arrow-up-outline"></ion-icon></a>
         <!--End Back To Top Button-->
  


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

    <!-- Main JS-->
    <script src="assets/js/main.js"></script>


  </body>
</html>