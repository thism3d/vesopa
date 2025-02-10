<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header("Access-Control-Allow-Headers: X-Requested-With");


$row_affected = false;
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


    $device_uid = $operating_system = $operating_system_version = NULL;
    if(isset($decoded["device_uid"])) if(strlen(trim($decoded["device_uid"]))>0) $device_uid = $decoded["device_uid"];
    if(isset($decoded["operating_system"])) if(strlen(trim($decoded["operating_system"]))>0) $operating_system = $decoded["operating_system"];
    if(isset($decoded["operating_system_version"])) if(strlen(trim($decoded["operating_system_version"]))>0) $operating_system_version = $decoded["operating_system_version"];
    
    $email_is_no = $decoded["email"];
    $login_code = $decoded["login_code"];
    



    $conn->begin_transaction();
    try {

    
        if ($email_is_no == "NO" && strlen($login_code)==4) {
            
            $is_valid_login_code = false;
            $sql = 'SELECT login_code, created_by_email, expired_time FROM login_codes WHERE login_code = ? AND is_used = "NO" AND expired_time > "'. date('Y-m-d H:i:s') .'";';      // On Mac Remove NOW(), so that it will work
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("s",$login_code);
            $stmt->execute();
            $result = $stmt->get_result(); 
            if ($result === false) {
                throw new Exception("Error executing the SELECT query (Login Codes Table): " . $conn->error);
            }else{
                if ($result->num_rows > 0) {
                    $login_code_information = $result->fetch_assoc();
                    $is_valid_login_code = true;
                }
            }
            
            
            if($is_valid_login_code){
                
                $email = $login_code_information["created_by_email"];
                
                $sql = "SELECT timeadded, nickname, email, password_last_updated, subscription_type, subscription_start_date, subscription_end_date, billing_cycle_time, billing_cycle_type, auto_payment FROM users WHERE email = ?;";
                $stmt = $conn->prepare($sql); 
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result === false) {
                    throw new Exception("Error executing the SELECT query (Users Table): " . $conn->error);
                }else{
                    if ($result->num_rows > 0) {
                        $user = $result->fetch_assoc();
                        if($user["subscription_type"] == "Subscribed") $is_premium_found = true;
                        if($is_premium_found) $valid_till = $user["subscription_end_date"];
                        $row_affected = true;
                    }
                }
                
                
                if($is_premium_found && $device_uid != NULL){
                    
                    
                    // Use the login code
                    if($is_premium_found){
                        $sql = 'UPDATE login_codes SET used_time = ?, used_device_uid = ?, used_operating_system = ?, used_os_version = ?, is_used = "YES" WHERE login_code = ? AND is_used = "NO";';  
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("sssss", $current_time, $device_uid, $operating_system, $operating_system_version, $login_code);
                        $stmt->execute();

                        if ($stmt === false) {
                            throw new Exception("Error updating record (Login Code Table) " . $conn->error);
                        } else {
                            if($stmt->execute()) {
                                if($stmt->affected_rows > 0){
                                    // Login Code Used
                                }
                            }
                        }
                    }
                    
                    
                    
                    // Check if the device already logged in premium table
                    $is_active_premium_device = false;
                    $sql = "SELECT device_uid FROM premium_log WHERE email = ? ORDER BY timeadded DESC LIMIT 5;";
                    $stmt = $conn->prepare($sql); 
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result === false) {
                        throw new Exception("Error executing the SELECT query (Premium Log Table): " . $conn->error);
                    }else{
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if($row["device_uid"]==$device_uid){
                                    $is_active_premium_device = true;
                                    break;
                                }
                            }
                        }
                    }
                    
                    // If not logged in premium device add the device now
                    if(!$is_active_premium_device){
                        $sql = "INSERT INTO premium_log (device_uid, email, operating_system, os_version) VALUES (?, ?, ?, ?);";  
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssss", $device_uid, $email, $operating_system, $operating_system_version);
                        $stmt->execute();

                        if ($stmt === false){
                            throw new Exception("Error inserting into (First Time User Table): ");
                        }else{
                            if($stmt->affected_rows > 0){
                                // Premium Table Added
                            }
                        }

                    }
                    
                }
                
            }
            
        }


        $conn->commit();
        // $row_affected = true;
    } catch (Exception $e) {
        $conn->rollback();
        // echo "Transaction failed: " . $e->getMessage();
    }
    



}






if($row_affected){
    
    $user_logged_data = 
    '{
        "nickname" : "'. $user["nickname"] .'",
        "email" : "'. $user["email"] .'",
        "password_last_updated" : "'. $user["password_last_updated"] .'",
        "subscription_type" : "'. $user["subscription_type"] .'",
        "subscription_start_date" : "'. $user["subscription_start_date"] .'",
        "subscription_end_date" : "'. $user["subscription_end_date"] .'",
        "billing_cycle_time" : "'. $user["billing_cycle_time"] .'",
        "billing_cycle_type" : "'. $user["billing_cycle_type"] .'",
        "auto_payment" : "'. $user["auto_payment"] .'"
    }';
    
    echo 
    '{
        "status": "Success",
        "email": "'. $user["email"] .'",
        "currentTime" : "'. $current_time .'",
        "validTill" : "'. $valid_till .'",
        "subscriptionType": "'. $user["subscription_type"] .'",
        "userLoggedData": '. $user_logged_data .'
    }';


}else{
    echo 
    '{
        "status": "Failed",
        "warning": "Failed with Login Code"
    }';
}


?>