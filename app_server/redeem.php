<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header("Access-Control-Allow-Headers: X-Requested-With");


$row_affected = false;
$current_time = $date_to_update = $valid_till = date("Y-m-d H:i:s");
$is_premium_found = false;
$warning_text = "Invalid Voucher Code";

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
    $voucher = $decoded["voucher"];
    



    
    $conn->begin_transaction();
    try {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            $valid_voucher = false;
            $sql = 'SELECT voucher_code, days_add, months_add, year_add, is_used FROM vouchers WHERE voucher_code = ?';
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("s",$voucher);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            if ($result->num_rows > 0) {
                $warning_text = "Voucher Already Used";
                $voucher_result = $result->fetch_assoc();
                
                $days_add = $voucher_result["days_add"] != "0" ? $voucher_result["days_add"] . ' day' . (intval($voucher_result["days_add"]) > 1 ? 's' : '') : '';
                $months_add = $voucher_result["months_add"] != "0" ? $voucher_result["months_add"] . ' month' . (intval($voucher_result["months_add"]) > 1 ? 's ' : ' ') : '';
                $year_add = $voucher_result["year_add"] != "0" ? $voucher_result["year_add"] . ' year' . (intval($voucher_result["year_add"]) > 1 ? 's ' : ' ') : '';
            
                $total_time_to_add = $year_add . $months_add . $days_add;
                
                
                $valid_voucher = $voucher_result["is_used"] == "NO" ? true : false;
            }
            
            
            if($valid_voucher){
                
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
                
                
                $is_voucher_used = false;
                $sql = 'UPDATE vouchers SET is_used = "YES", used_by_email = ?, used_time = ?, device_uid = ?, operating_system = ?, os_version = ? WHERE voucher_code = ? AND is_used = "NO";';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssss", $email, $current_time, $device_uid, $operating_system, $operating_system_version, $voucher);
                $stmt->execute();

                if ($stmt === false) {
                    throw new Exception("Error updating record (Voucher Code Table) " . $conn->error);
                } else {
                    if($stmt->affected_rows > 0){
                        $is_voucher_used = true;
                    } 
                }
                
                
                
                
                
                
                
                $temp_date_to_update = new DateTime($date_to_update);
                $temp_date_to_update->modify($total_time_to_add);
                $final_date_to_update = $temp_date_to_update->format('Y-m-d H:i:s');

                
                
                $is_premium_activated = false;
                if($is_voucher_used){
                    $sql = 'UPDATE users SET subscription_type = "Subscribed", subscription_end_date = ? WHERE email = ?;';  
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $final_date_to_update, $email);
                    $stmt->execute();

                    if ($stmt === false) {
                        throw new Exception("Error updating record (Users Table) " . $conn->error);
                    } else {
                        if($stmt->affected_rows > 0){
                            $is_premium_activated = true;
                            $row_affected = true;
                        }
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
            
        }
    

        $conn->commit();
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
        "subscription_type" : "Subscribed",
        "subscription_start_date" : "'. $user["subscription_start_date"] .'",
        "subscription_end_date" : "'. $final_date_to_update .'",
        "billing_cycle_time" : "'. $user["billing_cycle_time"] .'",
        "billing_cycle_type" : "'. $user["billing_cycle_type"] .'",
        "auto_payment" : "'. $user["auto_payment"] .'"
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