<?php
  require 'server_files/header_server.php';


  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST["email"];
    $password = $_POST["password"];
    $remember = isset($_POST["remember_checkbox"]) ? "Y" : "N";



    // echo $remember;
    $sql = 'SELECT id, name, email FROM backoffice_users WHERE email = "'. $email .'" AND password = "'. $password .'" AND approved = "Y";';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Use openssl_encrypt() function to encrypt the data
            $userIdEncypt = openssl_encrypt($row["id"], $ciphering, $encryption_key, $options, $encryption_iv);
            $userNameEncypt = openssl_encrypt($row["name"], $ciphering, $encryption_key, $options, $encryption_iv);
            $userEmailEncypt = openssl_encrypt($row["email"], $ciphering, $encryption_key, $options, $encryption_iv);



            setcookie($cookie_user_id, $userIdEncypt, time() + (86400 * 7), "/"); // 86400 = 1 day
            setcookie($cookie_user_fullname, $userNameEncypt, time() + (86400 * 7), "/"); // 86400 = 1 day
            setcookie($cookie_user_email, $userEmailEncypt, time() + (86400 * 7), "/"); // 86400 = 1 day

            header('Location: home');
        }
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

  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <title>VESOPA | Epos Wales | BackOffice Web Login</title>
</head>

<body class="bg-white">

  <!--start wrapper-->
  <div class="wrapper">
    <div class="">
      <div class="row g-0 m-0">
        <div class="col-xl-6 col-lg-12">
          <div class="login-cover-wrapper">
            <div class="card shadow-none">
              <div class="card-body">
                <div class="text-center">
                  <h4>BackOffice Web Login</h4>
                  <p>Sign In to your account</p>
                </div>
                <form class="form-body row g-3" method="post" action="index">
                  <div class="col-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="inputEmail" required>
                  </div>
                  <div class="col-12">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="inputPassword" minlength="4" required>
                  </div>
                  <div class="col-12 col-lg-6">
                    <div class="form-check form-switch">
                      <input name="remember_checkbox" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckRemember">
                      <label class="form-check-label" for="flexSwitchCheckRemember">Remember Me</label>
                    </div>
                  </div>
                  <div class="col-12 col-lg-6 text-end">
                    <a href="forgot">Forgot Password?</a>
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary">Sign In</button>
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
                    <p class="mb-0">Don't have an account? <a href="signup">Request demo</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-12">
          <div class="position-fixed top-0 h-100 d-xl-block d-none login-cover-img">
          </div>
        </div>
      </div>
      <!--end row-->
    </div>
  </div>
  <!--end wrapper-->


</body>

</html>