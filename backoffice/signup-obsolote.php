<?php  
  require 'server_files/header_server.php';
  $is_registered = "No";

  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    $sql = 'INSERT INTO backoffice_users(email, password, name) VALUES ("'. $email .'", "'. $password .'", "'. $name .'");';
    $result = $conn->query($sql);
    if ($result === TRUE) {
      $is_registered = "Yes";
        // // Use openssl_encrypt() function to encrypt the data
        // $userIdEncypt = openssl_encrypt($row["id"], $ciphering, $encryption_key, $options, $encryption_iv);
        // $userNameEncypt = openssl_encrypt($name, $ciphering, $encryption_key, $options, $encryption_iv);
        // $userEmailEncypt = openssl_encrypt($email, $ciphering, $encryption_key, $options, $encryption_iv);



        // setcookie($cookie_user_id, $userIdEncypt, time() + (86400 * 7), "/"); // 86400 = 1 day
        // setcookie($cookie_user_fullname, $userNameEncypt, time() + (86400 * 7), "/"); // 86400 = 1 day
        // setcookie($cookie_user_email, $userEmailEncypt, time() + (86400 * 7), "/"); // 86400 = 1 day

        // header('Location: home');

        // echo $is_registered;
    }else{
      $is_registered = "Failed";
    }

    
  }
?>

<!doctype html>
<html lang="en" class="light-theme">

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
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <title>VESOPA Epos | Request a demo</title>
</head>

<body>

  <!--start wrapper-->
  <div class="wrapper">
    <div class="">
      <div class="row g-0 m-0">
        <div class="col-xl-6 col-lg-12">
          <div class="login-cover-wrapper">
            <div class="card shadow-none">
              <div class="card-body">

              <?php
              if($is_registered == "Yes"){
                echo '
                <div class="alert alert-dismissible fade show py-2 bg-success">
                  <div class="d-flex align-items-center">
                    <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp"></ion-icon>
                    </div>
                    <div class="ms-3">
                      <div class="text-white">Requested Successfully! Wait a moment for verification.</div>
                    </div>
                  </div>
                </div>
                ';
              }
              ?>
                
              
                <div class="text-center">
                  <h4>Request a demo</h4>
                  <p>Enter your email and password to register</p>
                </div>
                <form class="form-body row g-3" method="post" action="signup">
                  <div class="col-12">
                    <label for="inputName" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="inputName" minlength="4" required>
                  </div>
                  <div class="col-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="inputEmail" required>
                  </div>
                  <div class="col-12">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="inputPassword" minlength="4" required>
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" required>
                      <label class="form-check-label" for="flexCheckChecked">
                        I agree the Terms and Conditions
                      </label>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="position-relative border-bottom my-3">
                      <div class="position-absolute seperator translate-middle-y">or continue with</div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="social-login d-flex flex-row align-items-center justify-content-center gap-2 my-2">
                      <a href="javascript:;" class=""><img src="assets/images/icons/facebook.png" alt=""></a>
                      <a href="javascript:;" class=""><img src="assets/images/icons/apple-black-logo.png" alt=""></a>
                      <a href="javascript:;" class=""><img src="assets/images/icons/google.png" alt=""></a>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12 text-center">
                    <p class="mb-0">Already have an account? <a href="index">Sign in</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-12">
          <div class="position-fixed top-0 h-100 d-xl-block d-none register-cover-img">
          </div>
        </div>
      </div>
      <!--end row-->
    </div>
  </div>
  <!--end wrapper-->


</body>

</html>