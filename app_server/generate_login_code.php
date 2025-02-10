<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header("Access-Control-Allow-Headers: X-Requested-With");


$row_affected = false;
$login_code = NULL;
$time_to_use_seconds = 90; // Maximum time to use this code
$current_time = date("Y-m-d H:i:s");



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
    
    $conn->begin_transaction();

    try {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && $device_uid != NULL) {
            
            $generated_code = rand(1001, 9999);
            
            $expired_time = new DateTime();
            $expired_time->modify('+'. $time_to_use_seconds .' seconds');
            $expired_time = $expired_time->format('Y-m-d H:i:s');
            
            $sql = "INSERT INTO login_codes (login_code, created_by_email, expired_time, created_device_uid, created_operating_system, created_os_version) VALUES(?, ?, ?, ?, ?, ?);";    // NOW() + INTERVAL 1 HOUR
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $generated_code, $email, $expired_time, $device_uid, $operating_system, $operating_system_version);
            $stmt->execute();


            if ($stmt === false){
                throw new Exception("Error inserting into (First Time User Table): ");
            }else{
                if($stmt->affected_rows > 0){
                    $row_affected = true;
                }
            }
        
            
        }


        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        // echo "Transaction failed: " . $e->getMessage();
    }

    
   

}






if($row_affected){
    
    echo 
    '{
        "status": "Success",
        "generatedCode": "'. $generated_code .'",
        "time_left": "'. $time_to_use_seconds .'",
        "expiredTime" : "'. $expired_time .'"
    }';


}else{
    echo 
    '{
        "status": "Failed",
        "warning": "Failed To Generate, Try Again."
    }';
}


?>