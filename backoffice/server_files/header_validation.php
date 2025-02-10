<?php

// Check if a user is present
// If user is present send to the Home Page
// If not present use logout feature



// Get the url path
$url = $_SERVER['REQUEST_URI'];
$urlpath = substr($url,intval(strripos($url, "/")+1), 5);
$urlpath = $urlpath == "index" ? $urlpath : substr($url,intval(strripos($url, "/")+1), 20);




// Check the cookies
require 'cookiesvariables.php';


$cookie_present = false;


$decrypted_user_id = "";
$decrypted_user_fullname = "";
$decrypted_user_email = "";

if(isset($_COOKIE[$cookie_user_id]) && isset($_COOKIE[$cookie_user_fullname]) && isset($_COOKIE[$cookie_user_email])){
    $cookie_present = true;

    // Decryption Algorithm
    $decrypted_user_id = openssl_decrypt ($_COOKIE[$cookie_user_id], $ciphering, $decryption_key, $options, $decryption_iv);
    $decrypted_user_fullname = openssl_decrypt ($_COOKIE[$cookie_user_fullname], $ciphering, $decryption_key, $options, $decryption_iv);
    $decrypted_user_email = openssl_decrypt ($_COOKIE[$cookie_user_email], $ciphering, $decryption_key, $options, $decryption_iv);
}



// Logout Function
function logoutFunction($cookie_user_id, $cookie_user_fullname, $cookie_user_email){
    require 'cookiesvariables.php';
    setcookie($cookie_user_id, "", time() - 3600, "/");
    setcookie($cookie_user_fullname, "", time() - 3600, "/");
    setcookie($cookie_user_email, "", time() - 3600, "/");
}


// If cookie and index is present check the user information to enter auto login function
if($urlpath == "index" || $urlpath == "" || $urlpath == "forgot" || $urlpath == "signup"){


    if($cookie_present){
        $sql = 'SELECT id, name, email FROM backoffice_users WHERE id = '. $decrypted_user_id .' AND email = "'. $decrypted_user_email .'" AND approved = "Y";';
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
        }else{
            // Use Logout Function and Clear the Cookies and send the user to index
            logoutFunction($cookie_user_id, $cookie_user_fullname, $cookie_user_email);

        }
    }else{
        logoutFunction($cookie_user_id, $cookie_user_fullname, $cookie_user_email);
    }

}else{
    // Header for all exluding index
    if(!$cookie_present){
        // Use Logout Function and Clear the Cookies and send the user to index
        logoutFunction($cookie_user_id, $cookie_user_fullname, $cookie_user_email);
        header('Location: index');
    }


}






?>
