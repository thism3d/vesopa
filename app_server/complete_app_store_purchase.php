<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header("Access-Control-Allow-Headers: X-Requested-With");


$row_affected = false;
$current_time = $date_to_update = $valid_till = date("Y-m-d H:i:s");
$is_premium_found = false;
$warning_text = "Subscription Failed ! Contact Support";

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
    
    
    $product_id = $decoded["product_id"];
    $purchase_id = $decoded["purchase_id"];
    $purchase_status = $decoded["purchase_status"];
    $purchase_transaction_date = $decoded["purchase_transaction_date"];
    $purchase_verification_source = $decoded["purchase_verification_source"];
    $purchase_local_verification_data = $decoded["purchase_local_verification_data"];
    $purchase_server_verification_data = $decoded["purchase_server_verification_data"];
    

    
    $period_time = 1;
    if($product_id == "com.amzro.vpn.oneyearplan"){
        $period_time = 12;
    }else if($product_id == "com.amzro.vpn.sixmonthsplan"){
        $period_time = 6;
    }
    $period_type = "Month";

    
    $conn->begin_transaction();
    try {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            $is_in_app_purchased = false;
            $sql = "INSERT INTO in_app_purchases(email, device_uid, operating_system, os_version, product_id, purchase_id, purchase_status, purchase_transaction_date, purchase_verification_source, purchase_local_verification_data, purchase_server_verification_data, period_time, period_type) VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? );";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssssssis", $email, $device_uid, $operating_system, $operating_system_version, $product_id, $purchase_id, $purchase_status, $purchase_transaction_date, $purchase_verification_source, $purchase_local_verification_data, $purchase_server_verification_data, $period_time, $period_type);
            $stmt->execute();

            if ($stmt === false){
                throw new Exception("Error inserting into (In App Purchase Table): ");
            }else{
                if($stmt->affected_rows > 0){
                    $is_in_app_purchased = true;
                    $row_affected = true;
                }
            }
            
            
            
            
            $months_add = $period_time . ' month' . ($period_time > 1 ? 's ' : '');
            $total_time_to_add = $months_add;
            
            
                
            $sql = "SELECT timeadded, nickname, email, password_last_updated, subscription_type, subscription_start_date, subscription_end_date, billing_cycle_time, billing_cycle_type, auto_payment FROM users WHERE email = ?;";
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result === false) {
                throw new Exception("Error executing the SELECT query (User Table): " . $conn->error);
            }else{
                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    if($user["subscription_type"] == "Subscribed") $is_premium_found = true;
                    if($is_premium_found) $valid_till = $user["subscription_end_date"];
                    if($date_to_update < $user["subscription_end_date"]) $date_to_update = $user["subscription_end_date"];
                }
            }
            
            
            
            
            $temp_date_to_update = new DateTime($date_to_update);
            $temp_date_to_update->modify($total_time_to_add);
            $final_date_to_update = $temp_date_to_update->format('Y-m-d H:i:s');

            
            
            $is_premium_activated = false;
            
            $sql = 'UPDATE users SET subscription_type = "Subscribed", subscription_end_date = ?, premium_source = ?, billing_cycle_time = ?, billing_cycle_type = ?, auto_payment = "ON" WHERE email = ?;';  
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssiss", $final_date_to_update, $purchase_verification_source, $period_time, $period_type, $email);
            $stmt->execute();

            if ($stmt === false) {
                throw new Exception("Error updating record (Users Table) " . $conn->error);
            } else {
                if($stmt->affected_rows > 0){
                    $is_premium_activated = true;
                    $row_affected = true;
                }
            }
           
            
            
            
            
            $sql = "INSERT INTO premium_log (device_uid, email, operating_system, os_version) VALUES (?, ?, ?, ?);";  
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $device_uid, $email, $operating_system, $operating_system_version);
            $stmt->execute();

            if ($stmt === false){
                throw new Exception("Error inserting into (Premium Log Table): ");
            }else{
                if($stmt->affected_rows > 0){
                    // Premium Table Added
                }
            }
            
            
        }
    

        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Transaction failed: " . $e->getMessage();
    }



}






if($row_affected){
    
    $user_logged_data = 
    '{
        "nickname" : "'. $user["nickname"] .'",
        "email" : "'. $user["email"] .'",
        "password_last_updated" : "'. $user["password_last_updated"] .'",
        "subscription_type" : "Subscribed",
        "subscription_start_date" : "'. $user["subscription_start_date"] .'",
        "subscription_end_date" : "'. $final_date_to_update .'",
        "billing_cycle_time" : "'. $period_time .'",
        "billing_cycle_type" : "'. $period_type .'",
        "auto_payment" : "ON"
    }';
    
    echo 
    '{
        "status": "Success",
        "email": "'. $user["email"] .'",
        "currentTime" : "'. $current_time .'",
        "validTill" : "'. $final_date_to_update .'",
        "subscriptionType": "Subscribed",
        "userLoggedData": '. $user_logged_data .'
    }';


}else{
    echo 
    '{
        "status": "Failed",
        "warning": "'. $warning_text .'"
    }';
}


?>