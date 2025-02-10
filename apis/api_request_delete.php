<?php
$row_affected = false;  

if($_SERVER["REQUEST_METHOD"] == "POST"){
    require '../server_files/cookiesvariables.php';
    require '../server_files/connectserver.php';


    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if ($contentType === "application/json") {
        $content = trim(file_get_contents("php://input"));
        $decoded = json_decode($content, true);
        if(! is_array($decoded)) {
        } else {
        }
    }



    $user_email = input_checking($decoded["email"]);
    $user_pass = input_checking($decoded["password"], true);

    $stmt = $conn->prepare('SELECT id, subscription_end_date, email FROM users WHERE email = ? AND password = ?;');
    $stmt->bind_param("ss", $user_email, $user_pass);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){  
            $row = $result->fetch_assoc();
          
            $deletion_date = date("Y-m-d H:i:s") > $row["subscription_end_date"] ? date("Y-m-d H:i:s") : $row["subscription_end_date"];
            $deletion_date = date("Y-m-d H:i:s" , strtotime('+7 days', strtotime($deletion_date)));

            $stmt = $conn->prepare('UPDATE users SET delete_request = "YES", deletion_date = ? WHERE email = ? AND password = ?;');
            $stmt->bind_param("sss", $deletion_date, $user_email, $user_pass);
            if($stmt->execute()){
              $row_affected = $stmt->affected_rows > 0;
            }
            

            
        }
    }
}






if($row_affected){
  echo '{ "status" : "SUCCESS", "deletion_date" : "'. date("F j, Y", strtotime($deletion_date)) .'" }';
}else{
  echo '{ "status" : "FAILED" }';
}