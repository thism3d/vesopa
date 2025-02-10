<?php
$row_affected = false;  

if($_SERVER["REQUEST_METHOD"] == "POST"){
    require '../server_files/cookiesvariables.php';
    require '../server_files/connectserver.php';



    if($is_user_found){

      $stmt = $conn->prepare('UPDATE users SET auto_payment = "OFF" WHERE email = ? AND id = ? AND auto_payment = "ON";');
      $stmt->bind_param("si", $decrypted_useremail, $decrypted_userid);
      if($stmt->execute()){
        $row_affected = $stmt->affected_rows > 0;
      }     
  
    }

    
}






if($row_affected){
  echo '{ "status" : "SUCCESS" }';
}else{
  echo '{ "status" : "FAILED" }';
}