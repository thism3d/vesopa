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

    $stmt = $conn->prepare('SELECT id, subscription_type, email, delete_request, deletion_date FROM users WHERE email = ? AND password = ?;');
    $stmt->bind_param("ss", $user_email, $user_pass);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){  
            $row = $result->fetch_assoc();
          
            $user_id = $row["id"];
            $user_subscription = $row["subscription_type"];
            $user_delete_request = $row["delete_request"];
            $user_delete_expiry_date = strlen($row["deletion_date"]) > 0 ? date("F j, Y", strtotime($row["deletion_date"])) : "Not Found";

            $row_affected = true;
        }
    }
}






if($row_affected){
  echo '{ "status" : "SUCCESS", "is_delete_requested" : "'. $user_delete_request .'", "deletion_date" : "'. $user_delete_expiry_date .'", "subscription" : "'. $user_subscription .'" }';
}else{
  echo '{ "status" : "FAILED" }';
}