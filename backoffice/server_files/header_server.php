<?php


// Basic Modules
require 'cookiesvariables.php';
require 'modules.php';
require 'connectserver.php';



// // Check if we get the access for android
// $android_access = false;
//
//
// if (isset($_SESSION['access_from_android'])){
//     if($_SESSION['access_from_android']=="8643"){
//         $android_access = true;
//     }
// }else{
//     if(isset($_GET['android'])){
//         if($_GET['android']=="8643"){
//             $_SESSION['access_from_android'] = "8643";
//             $android_access = true; 
//         }
//     }
// }

// if(!$android_access){
//     sysout("Adnroid Access Not Found");
//     // Android Access Not Found
//     header('Location: ' . $serverhost .'shop');
// }

// Check if the user is present or not
require 'header_validation.php';





?>
