<?php
  require 'server_files/header_server.php';

  $title = "VESOPA Epos | BackOffice Report";
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
                    <li class="breadcrumb-item active" aria-current="page">Report</li>
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

   
           

            <div class="row row-cols-1 row-cols-lg-3">
               <div class="col">
                <div class="card">
                  <img src="assets/images/cards/01.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">X Report</h5>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <a href="#" class="btn btn-primary">Print X Report</a>
                  </div>
                </div>
               </div>
               <div class="col">
                <div class="card">
                  <img src="assets/images/cards/02.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Z Report</h5>
                    <a href="#" class="btn btn-danger">Print Z Report</a>
                  </div>
                </div>
               </div>
            </div><!--end row-->







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