<?php
    require 'connectserver.php';
    $is_active_premium_device = false;

    $row_affected = false;
    $device_uid = 'c779439d81b44419';
    $email = 'muzahid222@gmail.com';
    $password = '1234567908';
    $nickname = NULL;
    
    $current_time = $valid_till = date("Y-m-d H:i:s");
    $null_value = NULL;
    



        
        $sql = "INSERT IGNORE INTO users (nickname, email, password) VALUES (?, ?, ?);";    // NOW() + INTERVAL 1 HOUR
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nickname, $email, $password);
        if($stmt->execute()) {
            if($stmt->affected_rows > 0){
                $row_affected = true;
            }
        }
        
        
        if($row_affected){
            $sql = "SELECT nickname, email, password_last_updated, subscription_type, subscription_start_date, subscription_end_date, billing_cycle_time, billing_cycle_type, auto_payment FROM users WHERE email = ? AND password = ?;";
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
            }
        }
        
        
        
        
        
        if($row_affected){
            echo "<br>MySQL Response: <br>";
            echo '{
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
            
            echo "<br><br>";
            echo "<br>Server Response: <br>";
            echo '{
                "nickname" : "'. $nickname .'",
                "email" : "'. $email .'",
                "password_last_updated" : "'. $current_time .'",
                "subscription_type" : "Trial",
                "subscription_start_date" : "0000-00-00 00:00:00",
                "subscription_end_date" : "0000-00-00 00:00:00",
                "billing_cycle_time" : "'. $null_value .'",
                "billing_cycle_type" : "'. $null_value .'",
                "auto_payment" : "OFF"
            }';
            
            
            echo "<br><br>Final Response<br>";
            $user_logged_data = 
    '{
        "nickname" : "'. $nickname .'",
        "email" : "'. $email .'",
        "password_last_updated" : "'. $current_time .'",
        "subscription_type" : "Trial",
        "subscription_start_date" : "0000-00-00 00:00:00",
        "subscription_end_date" : "0000-00-00 00:00:00",
        "billing_cycle_time" : "'. $null_value .'",
        "billing_cycle_type" : "'. $null_value .'",
        "auto_payment" : "OFF"
    }';
    
    echo 
    '{
        "status": "Success",
        "email": "'. $email .'",
        "currentTime" : "'. date("Y-m-d H:i:s") .'",
        "validTill" : "'. date("Y-m-d H:i:s") .'",
        "gotFreeTrial": "'. ($got_the_free_trial ? "Yes" : "No") .'",
        "userLoggedData": '. $user_logged_data .'
    }';
            
        }
        
?>