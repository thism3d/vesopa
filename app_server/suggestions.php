<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header("Access-Control-Allow-Headers: X-Requested-With");


$row_affected = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    require 'connectserver.php';

    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if ($contentType === "application/json") {
        $content = trim(file_get_contents("php://input"));
        $decoded = json_decode($content, true);
        if(! is_array($decoded)) {
        } else {
        }
    }


    $device_uid = $operating_system = $operating_system_version = NULL;
    if(isset($decoded["device_uid"])) if(strlen(trim($decoded["device_uid"]))>0) $device_uid = $decoded["device_uid"];
    if(isset($decoded["operating_system"])) if(strlen(trim($decoded["operating_system"]))>0) $operating_system = $decoded["operating_system"];
    if(isset($decoded["operating_system_version"])) if(strlen(trim($decoded["operating_system_version"]))>0) $operating_system_version = $decoded["operating_system_version"];
    
    $email = $decoded["email"];
    $suggestions = $decoded["suggestions"];
    


    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $sql = "INSERT INTO suggestions (email, suggestions, device_uid, operating_system, os_version) VALUES(?, ?, ?, ?, ?);";  
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $email, $suggestions, $device_uid, $operating_system, $operating_system_version);
        if($stmt->execute()) {
            if($stmt->affected_rows > 0){
                $row_affected = true;
            }
        }
        
              
    }
    



}






if($row_affected){
    echo 
    '{
        "status": "Success"
    }';


}else{
    echo 
    '{
        "status": "Failed",
        "warning": "Failed with Login Code"
    }';
}


?>