<?php  
  require 'server_files/header_server.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $request_type = $_POST["request_type"];

    if ($request_type == "Save") {
        $sql = "SELECT pluid FROM bo_products WHERE email = ? ORDER BY id DESC LIMIT 1;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $decrypted_user_email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $pluid = intval($row["pluid"]);
            $pluid++;
        } else {
            $pluid = 1;
        }

        $product_name = $_POST["product_name"];
        $department_name = $_POST["department_name"];
        $accounting_code = $_POST["accounting_code"];
        $price = $_POST["price"];
        $tax_percentage = $_POST["tax_percentage"];
        $stock_quantity = $_POST["stock_quantity"];

        $sql = "INSERT INTO bo_products(email, pluid, product_name, department_name, accounting_code, price, tax_percentage, stock_quantity) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisssddd", $decrypted_user_email, $pluid, $product_name, $department_name, $accounting_code, $price, $tax_percentage, $stock_quantity);
        $stmt->execute();
    } else if ($request_type == "Update") {
        $id = $_POST["id"];
        $product_name = $_POST["product_name"];
        $department_name = $_POST["department_name"];
        $accounting_code = $_POST["accounting_code"];
        $price = $_POST["price"];
        $tax_percentage = $_POST["tax_percentage"];
        $stock_quantity = $_POST["stock_quantity"];

        $sql = "UPDATE bo_products SET product_name = ?, department_name = ?, accounting_code = ?, price = ?, tax_percentage = ?, stock_quantity = ? WHERE id = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssdddi", $product_name, $department_name, $accounting_code, $price, $tax_percentage, $stock_quantity, $id);
        $stmt->execute();
    } else if ($request_type == "Delete") {
        $id = $_POST["id"];
        $sql = "DELETE FROM bo_products WHERE id = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

  }


?>



<?php

  $title = "VESOPA Epos | BackOffice Products";

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
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                  </ol>
                </nav>
              </div>
              <div class="ms-auto">
                <button type="button" class="btn btn-success px-5"  data-bs-toggle="modal" data-bs-target="#exampleModal">New</button>

                
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form class="row g-3" style="padding: 20px;" method="POST" action="products.php">
                        <input name="request_type" type="hidden" class="form-control" required value="Save">
                        <div class="col-12">
                          <label class="form-label">Product Name</label>
                          <input name="product_name" type="text" class="form-control" required>
                        </div>
                        <div class="col-12">
                          <label class="form-label">Department</label>
                          <select name="department_name" class="form-select select2-hidden-accessible" id="single-select-field" data-placeholder="Choose one thing" data-select2-id="select2-data-single-select-field" tabindex="-1" aria-hidden="true">
                            <option data-select2-id="select2-data-2-6ln0"></option>
                            <?php
                             $sql = "SELECT id, pluid, department_name, accounting_code FROM bo_product_departments WHERE email = ?;";
                             $stmt = $conn->prepare($sql);  $stmt->bind_param("s", $decrypted_user_email); $stmt->execute(); $result = $stmt->get_result();
                             if ($result->num_rows > 0) {
                               while($row = $result->fetch_assoc()) {
                                  echo '<option data-select2-id="select2-data-2-6ln0" value="'.$row["department_name"].'">'.$row["department_name"].'</option>';
                               }
                             }
                            ?>
                          </select>
                        </div>
                        <div class="col-12">
                          <label class="form-label">Price</label>
                          <input name="price" type="number" step="0.01" class="form-control" required>
                        </div>
                        <div class="col-12">
                          <label class="form-label">Tax % Rate</label>
                          <input name="tax_percentage" type="number" step="0.01" class="form-control" value="15" reuired>
                        </div>
                        <div class="col-12">
                          <label class="form-label">Stock Quantity</label>
                          <input name="stock_quantity" type="number" class="form-control">
                        </div>
                        <div class="col-12">
                          <label class="form-label">Accounting Code</label>
                          <input name="accounting_code" type="text" class="form-control">
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
            <div class="pagination">
                <a href="#">«First</a>
                <a href="#">Prev</a>
                <span>Page 1 of 11</span>
                <a href="#">Next</a>
                <a href="#">Last»</a>
            </div>

            <!-- Products List -->
            <div class="container mt-4">
              <div class="product-header">
                <div>PLU</div>
                <div>Product</div>
                <div>Department</div>
                <div>Price</div>
                <div>Tax Rate</div>
                <div>Stock Quantity</div>
                <div>Accounting Code</div>
                <div>Actions</div>
              </div>


              <?php
                $sql = "SELECT id, pluid, product_name, department_name, accounting_code, price, tax_percentage, stock_quantity 
                        FROM bo_products WHERE email = ?;";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $decrypted_user_email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                            <div class="product-item">
                                <div>' . $row["pluid"] . '</div>
                                <div>' . $row["product_name"] . '</div>
                                <div>' . $row["department_name"] . '</div>
                                <div>' . number_format($row["price"], 2) . '</div>
                                <div>' . number_format($row["tax_percentage"], 2) . '%</div>
                                <div>' . number_format($row["stock_quantity"], 2) . '</div>
                                <div>' . $row["accounting_code"] . '</div>
                                <div class="action-buttons">
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateProductModal' . $row["id"] . '">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </button>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="updateProductModal' . $row["id"] . '" tabindex="-1" aria-labelledby="updateProductModal' . $row["id"] . 'Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateProductModal' . $row["id"] . 'Label">Edit Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form class="row g-3" style="padding: 20px;" method="POST" action="products.php">
                                                    <input name="request_type" type="hidden" value="Update">
                                                    <input name="id" type="hidden" value="' . $row["id"] . '">
                                                    
                                                    <div class="col-12">
                                                        <label style="display: block; text-align: left;" class="form-label">Product Name</label>
                                                        <input name="product_name" type="text" class="form-control" required value="' . $row["product_name"] . '">
                                                    </div>
                                                    <div class="col-12">
                                                        <label style="display: block; text-align: left;" class="form-label">Department</label>
                                                        <select name="department_name" class="form-select select2-hidden-accessible" id="single-select-field" data-placeholder="Choose one thing" data-select2-id="select2-data-single-select-field" tabindex="-1" aria-hidden="true">
                                                          <option data-select2-id="select2-data-2-6ln0"></option>';
                                                          
                                                          $sql = "SELECT department_name FROM bo_product_departments WHERE email = ?;";
                                                          $stmt = $conn->prepare($sql);  $stmt->bind_param("s", $decrypted_user_email); $stmt->execute(); $resultOther = $stmt->get_result();
                                                          if ($resultOther->num_rows > 0) {
                                                            while($rowOther = $resultOther->fetch_assoc()) {
                                                                echo '<option value="'.$rowOther["department_name"].'" '. ( $rowOther["department_name"] == $row["department_name"] ? 'selected' : '' )  .'>'. $rowOther["department_name"] .'</option>';
                                                            }
                                                          }

                                                        echo 
                                                        '</select>
                                                    </div>
                                                    <div class="col-12">
                                                        <label style="display: block; text-align: left;" class="form-label">Price</label>
                                                        <input name="price" type="number" class="form-control" step="0.01" required value="' . $row["price"] . '">
                                                    </div>
                                                    <div class="col-12">
                                                        <label style="display: block; text-align: left;" class="form-label">Tax Rate (%)</label>
                                                        <input name="tax_percentage" type="number" class="form-control" step="0.01" required value="' . $row["tax_percentage"] . '">
                                                    </div>
                                                    <div class="col-12">
                                                        <label style="display: block; text-align: left;" class="form-label">Stock Quantity</label>
                                                        <input name="stock_quantity" type="number" class="form-control" step="0.01" required value="' . $row["stock_quantity"] . '">
                                                    </div>
                                                    <div class="col-12">
                                                        <label style="display: block; text-align: left;" class="form-label">Accounting Code</label>
                                                        <input name="accounting_code" type="text" class="form-control" value="' . $row["accounting_code"] . '">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProductModal' . $row["id"] . '">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteProductModal' . $row["id"] . '" tabindex="-1" aria-labelledby="deleteProductModal' . $row["id"] . 'Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteProductModal' . $row["id"] . 'Label">Delete Product?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form class="row g-3" style="padding: 20px;" method="POST" action="products.php">
                                                    <input name="request_type" type="hidden" value="Delete">
                                                    <input name="id" type="hidden" value="' . $row["id"] . '">
                                                    <div class="col-12">
                                                        <label class="form-label">Do you really want to delete the product: ' . $row["product_name"] . '?</label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
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
                
                <div>12345</div>
                <div>Sample Product</div>
                <div>Electronics</div>
                <div>Gadgets</div>
                <div>$100</div>
                <div>10%</div>
                <div>50</div>
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
                <div>67890</div>
                <div>Another Product</div>
                <div>Appliances</div>
                <div>Home</div>
                <div>$200</div>
                <div>8%</div>
                <div>30</div>
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