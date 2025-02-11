<?php  
require 'server_files/header_server.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_type = $_POST["request_type"];

    if ($request_type == "Save") {
        // Get the last PLUID from bo_clarks instead of bo_product_departments
        $sql = "SELECT pluid FROM bo_clarks WHERE email = ? ORDER BY id DESC LIMIT 1;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $decrypted_user_email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $pluid = intval($row["pluid"]) + 1;
        } else {
            $pluid = 1;
        }

        $clark_name = $_POST["name"];
        $pin_code = $_POST["pin_code"];
        
        $sql = "INSERT INTO bo_clarks(email, pluid, clark_name, pin_code) VALUES (?, ?, ?, ?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siss", $decrypted_user_email, $pluid, $clark_name, $pin_code);
        $stmt->execute();
    } 
    else if ($request_type == "Update") {
        $id = $_POST["id"];
        $clark_name = $_POST["name"];
        $pin_code = $_POST["pin_code"];

        $sql = "UPDATE bo_clarks SET clark_name = ?, pin_code = ? WHERE id = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $clark_name, $pin_code, $id);
        $stmt->execute();
    } 
    else if ($request_type == "Delete") {
        $id = $_POST["id"];
        $sql = "DELETE FROM bo_clarks WHERE id = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
?>



<?php

  $title = "VESOPA Epos | BackOffice Clerks";

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
                    <li class="breadcrumb-item active" aria-current="page">Clerks</li>
                  </ol>
                </nav>
              </div>
              <div class="ms-auto">
                <button type="button" class="btn btn-success px-5"  data-bs-toggle="modal" data-bs-target="#exampleModal">New</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Clerks</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form class="row g-3" style="padding: 20px;" method="POST" action="clerks.php">
                        <input name="request_type" type="hidden" class="form-control" required value="Save">
                        <div class="col-12">
                          <label class="form-label">Clerk Name</label>
                          <input name="name" type="text" class="form-control" required>
                        </div>
                        <div class="col-12">
                          <label class="form-label">PIN Code</label>
                          <input name="pin_code" type="number" class="form-control" pattern="\d{4}" minlength="4" maxlength="4" required>
                        </div>
                        <div class="col-12">
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </form>
                      <!-- <div class="modal-footer">
                        
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div> -->
                    </div>
                  </div>
                </div>
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
                <div>Name</div>
                <div>Secret Code</div>
                <div>Actions</div>
              </div>


              <?php
                $sql = "SELECT id, pluid, clark_name, pin_code FROM bo_clarks WHERE email = ?;";
                $stmt = $conn->prepare($sql); 
                $stmt->bind_param("s", $decrypted_user_email);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo '
                      <div class="product-item">
                        <div>'. $row["pluid"] .'</div>
                        <div>'. $row["clark_name"] .'</div>
                        <div>'. $row["pin_code"] .'</div>
                        <div class="action-buttons">
                          <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateGroupModal'. $row["id"] .'">
                            <ion-icon name="create-outline"></ion-icon>
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="updateGroupModal'. $row["id"] .'" tabindex="-1" aria-labelledby="updateGroupModal'. $row["id"] .'Label" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="updateGroupModal'. $row["id"] .'Label">Edit Clerk</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form class="row g-3" style="padding: 20px;" method="POST" action="clerks.php">
                                  <input name="request_type" type="hidden" class="form-control" required value="Update">
                                  <input name="id" type="hidden" class="form-control" required value="'. $row["id"] .'">
                                  <div class="col-12">
                                    <label style="display: block; text-align: left;" class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control" required value="'. $row["clark_name"] .'">
                                  </div>
                                  <div class="col-12">
                                    <label style="display: block; text-align: left;" class="form-label">PIN Code</label>
                                    <input name="pin_code" type="number" class="form-control" value="'. $row["pin_code"] .'" pattern="\d{4}" minlength="4" maxlength="4" required>
                                  </div>
                                  <div class="col-12">
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                  </div>
                                </form>
                                <!-- <div class="modal-footer">
                                  
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div> -->
                              </div>
                            </div>
                          </div>

                          <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteGroupModal'. $row["id"] .'">
                            <ion-icon name="trash-outline"></ion-icon>
                          </button>


                          <!-- Modal -->
                          <div class="modal fade" id="deleteGroupModal'. $row["id"] .'" tabindex="-1" aria-labelledby="deleteGroupModal'. $row["id"] .'Label" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="deleteGroupModal'. $row["id"] .'Label">Delete Clerk ?</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form class="row g-3" style="padding: 20px;" method="POST" action="clerks.php">
                                  <input name="request_type" type="hidden" class="form-control" required value="Delete">
                                  <input name="id" type="hidden" class="form-control" required value="'. $row["id"] .'">
                                  <div class="col-12">
                                    <label style="display: block; text-align: left;" class="form-label">Do you really want to delete the group: '. $row["clark_name"] .' ?</label>
                                  </div>
                                  <div class="col-12">
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    ';
                  }
                }
              ?>



              <!-- <div class="product-item">
                <div>1</div>
                <div>Sample</div>
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
                <div>Bob</div>
                <div>1235</div>
                <div class="action-buttons">
                  <button class="btn btn-sm btn-warning">
                    <ion-icon name="create-outline"></ion-icon>
                  </button>
                  <button class="btn btn-sm btn-danger">
                    <ion-icon name="trash-outline"></ion-icon>
                  </button>
                </div>
              </div> -->


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