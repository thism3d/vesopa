<?php
$cookie_id = "___server_wTunMifOmfaW";
$cookie_email = "__server_uIpmLfeRunCv";
$version = "0.1.0";
$serverhost = '';



// Decryption System Starts Here
$ciphering = "AES-256-CBC"; // Store the cipher method
$iv_length = openssl_cipher_iv_length($ciphering);  // Use OpenSSl Encryption method
$options = 0;
$encryption_iv = '5287125415230941';  // Non-NULL Initialization Vector for encryption
$encryption_key = "GWYDNVZFIGNWOURHSLDFGWTFSLZ";  // Store the encryption key
$decryption_iv = '5287125415230941';  // Non-NULL Initialization Vector for decryption
$decryption_key = "GWYDNVZFIGNWOURHSLDFGWTFSLZ";  // Store the decryption key

function encrypt_data($value = ''){
    global $ciphering, $encryption_key, $options, $encryption_iv;
    return openssl_encrypt($value, $ciphering, $encryption_key, $options, $encryption_iv);
}
function decrypt_data($value = ''){
    global $ciphering, $decryption_key, $options, $decryption_iv;
    return openssl_decrypt ($value, $ciphering, $decryption_key, $options, $decryption_iv);
}

$is_user_found = false;
if(isset($_COOKIE[$cookie_id]) && isset($_COOKIE[$cookie_email])){
    $is_user_found = true;
    $decrypted_userid = decrypt_data($_COOKIE[$cookie_id]);
    $decrypted_useremail = decrypt_data($_COOKIE[$cookie_email]);
    $cookie_text = $decrypted_userid . " - " . $decrypted_useremail;
}





/* Get Operating System and Download Link */
$operating_system = "Unknown";   // Android, iOS, Mac, Linux, Unknown
$download_link = "vpn_for_ios";//vpn_for_android, vpn_for_ios(default), vpn_for_mac, vpn_for_windows, vpn_for_linux

$user_agent = $_SERVER['HTTP_USER_AGENT'];
if (strpos($user_agent, 'Android') !== false){
    $operating_system = 'Android';  $download_link = "vpn_for_android"; 
}else if (strpos($user_agent, 'iPhone') !== false || strpos($user_agent, 'iPad') !== false || strpos($user_agent, 'iPod') !== false){
    $operating_system = 'iOS';      $download_link = "vpn_for_ios"; 
}else if (strpos($user_agent, 'Macintosh') !== false || strpos($user_agent, 'Mac OS X') !== false){
    $operating_system = 'Mac';      $download_link = "vpn_for_mac"; 
}else if (strpos($user_agent, 'Windows') !== false){
    $operating_system = 'Windows';  $download_link = "vpn_for_windows"; 
}else if (strpos($user_agent, 'Linux') !== false){
    $operating_system = 'Linux';    $download_link = "vpn_for_linux"; 
}  


/* Set the title if not set before */
if(!isset($title)) $title = 'Amzro VPN | Best secure elevated online VPN service';

/* Vesopa EPOS Pricing Plan */
// Plan in PHP
// Previous Pricing Plan


$pricing_plan = array(
  "1" => array(
      "name" => "Starter Plan",
      "price_per_month" => 80.00,
      "total_price" => 80.00,
      "discounted_price" => 75.00,
      "save_percentage" => 6,
      "vat" => 15.00,
      "total_with_vat" => 90.00,
      "interval" => "Month",
      "interval_count" => 1,
      "paypal_image" => "https://vesopa.com/assets/paypal/paypal_starter_plan.png",
  ),
  "12" => array(
      "name" => "Business Plan",
      "price_per_month" => 70.00,
      "total_price" => 840.00,
      "discounted_price" => 780.00,
      "save_percentage" => 7,
      "vat" => 117.00,
      "total_with_vat" => 897.00,
      "interval" => "Year",
      "interval_count" => 1,
      "paypal_image" => "https://vesopa.com/assets/paypal/paypal_business_plan.png",
  ),
  "24" => array(
      "name" => "Enterprise Plan",
      "price_per_month" => 60.00,
      "total_price" => 1440.00,
      "discounted_price" => 1300.00,
      "save_percentage" => 10,
      "vat" => 195.00,
      "total_with_vat" => 1495.00,
      "interval" => "Year",
      "interval_count" => 2,
      "paypal_image" => "https://vesopa.com/assets/paypal/paypal_enterprise_plan.png",
  )
);


// Plan in JSON
/*
<script>
    const pricing_plan = {
        "24" : {
            name: "2 Year Plan",
            price_per_month: 12.00,
            total_price: 288.00,
            discounted_price: 138.24,
            save_percentage: 52,
        },
        "12" : {
            name: "1 Year Plan",
            price_per_month: 15.00,
            total_price: 180.00,
            discounted_price: 108.00,
            save_percentage: 40,
        },
        "1" : {
            name: "1 Month Plan",
            price_per_month: 20.00,
            total_price: 20.00,
            discounted_price: 18.00,
            save_percentage: 10,
        }
    };
</script>
*/









// Common Functions
function input_checking($data, $allow_special_characters = false) {
  $data = trim($data);
  $data = stripslashes($data);
  if (!$allow_special_characters) $data = htmlspecialchars($data, ENT_QUOTES);
  return $data;
}

// Printing Function
function sysout($object) {
  echo $object . '<br>';
}

// Post String Return
function stringPostReturn($value) {
  if(isset($_POST[$value])){
    return input_checking($_POST[$value]);
  }else{
    return NULL;
  }
}

// Get String Return
function stringGetReturn($value) {
  if(isset($_GET[$value])){
    return input_checking($_GET[$value]);
  }else{
    return NULL;
  }
}

function only_let_num_verification($variable){
  if (!preg_match('/[^A-Za-z0-9]/', $variable)){
  // string contains only english letters & digits
    return true;
  }else{
    return false;
  }
}



