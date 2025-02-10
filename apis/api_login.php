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

    $stmt = $conn->prepare('SELECT id, email FROM users WHERE email = ? AND password = ?;');
    $stmt->bind_param("ss", $user_email, $user_pass);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){  
            $row = $result->fetch_assoc();
          
            $user_id_encrypted = encrypt_data($row["id"]);
            $user_email_encrypted = encrypt_data($row["email"]);

            setcookie($cookie_id, $user_id_encrypted, time() + (86400 * 1), "/");
            setcookie($cookie_email, $user_email_encrypted, time() + (86400 * 1), "/");

            $row_affected = true;
        }
    }
}






if($row_affected){
  echo '{ "status" : "SUCCESS" }';
}else{
  echo '{ "status" : "FAILED" }';
}


