<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header("Access-Control-Allow-Headers: X-Requested-With");


$row_affected = false;
$updatedValidTillTime = new DateTime();
$current_time = $valid_till = date("Y-m-d H:i:s");

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


    $device_uid = $nickname = NULL;
    
    if(isset($decoded["device_uid"])) if(strlen(trim($decoded["device_uid"]))>0) $device_uid = $decoded["device_uid"];
    if(isset($decoded["nickname"])) if(strlen(trim($decoded["nickname"]))>0) $nickname = input_checking($decoded["nickname"]);
    
    
    $email = $decoded["email"];
    $password = $decoded["password"];



    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {        // Validate Email
        
        
        // First try to register to user
        $is_regisredted_already = false;
        $sql = "INSERT IGNORE INTO users (nickname, email, password) VALUES (?, ?, ?);";    // NOW() + INTERVAL 1 HOUR
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nickname, $email, $password);
        if($stmt->execute()) {
            if($stmt->affected_rows > 0){
                $row_affected = true;
            }else{
                $is_regisredted_already = true;
            }
        }
        
        // Once registered, update the value of current device only
        $got_the_free_trial = false;
        if($device_uid != NULL && $row_affected){
            
            $sql = 'UPDATE trials SET is_email_verified = "YES", verified_with_email = ?, valid_till = NOW() + INTERVAL 24 HOUR WHERE device_uid = ? AND is_email_verified = "NO";';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $email, $device_uid);
            if($stmt->execute()) {
                if($stmt->affected_rows > 0){
                    $got_the_free_trial = true;
                    $updatedValidTillTime->modify('+24 hours');
                    $valid_till = $updatedValidTillTime->format('Y-m-d H:i:s');
                } 
            }
            
            $sql = 'UPDATE users SET subscription_end_date = "'. $valid_till .'" WHERE email = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
        }
        
        
        
        
    }
    
   

}






if($row_affected){
    
    $user_logged_data = 
    '{
        "nickname" : "'. $nickname .'",
        "email" : "'. $email .'",
        "password_last_updated" : "'. $current_time .'",
        "subscription_type" : "Trial",
        "subscription_start_date" : "'. $current_time .'",
        "subscription_end_date" : "'. $valid_till .'",
        "billing_cycle_time" : "1",
        "billing_cycle_type" : "Month",
        "auto_payment" : "OFF"
    }';
    
    echo 
    '{
        "status": "Success",
        "email": "'. $email .'",
        "currentTime" : "'. $current_time .'",
        "validTill" : "'. $valid_till .'",
        "gotFreeTrial": "'. ($got_the_free_trial ? "Yes" : "No") .'",
        "userLoggedData": '. $user_logged_data .'
    }';


}else{
    echo 
    '{
        "status": "Failed",
        "warning": "'. ($is_regisredted_already ? 'Already registered, try to Login' : 'Server communication error, try again') .'"
    }';
}


?>