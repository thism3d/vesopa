<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header("Access-Control-Allow-Headers: X-Requested-With");

$serverDataVersion = 80;

$row_affected = $is_premium_found = $is_upgraded = false;
$should_log_out = "No";
$userLoggedData = '"empty"';
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


    $serverVersion = 1;
    $device_uid = $email = $operating_system = $operating_system_version = $isPremium = NULL;
    
    if(isset($decoded["device_uid"])) if(strlen(trim($decoded["device_uid"]))>0) $device_uid = $decoded["device_uid"];
    if(isset($decoded["email"])) if(strlen(trim($decoded["email"]))>0) $email = input_checking($decoded["email"]);
    
    if(isset($decoded["isPremium"])) if(strlen(trim($decoded["isPremium"]))>0) $isPremium = input_checking($decoded["isPremium"]);
    if(isset($decoded["serverVersion"])) if(strlen(trim($decoded["serverVersion"]))>0) $serverVersion = intval(input_checking($decoded["serverVersion"]));
    
    // $timer = NULL;
    // if(isset($decoded["timer"])) if(strlen(trim($decoded["timer"]))>0) $timer = input_checking($decoded["timer"]);
    // if($timer != NULL){
    //     $sql = "INSERT INTO counter(timer) VALUES(?);";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bind_param("s", $timer);
    //     $stmt->execute();
    // }
    
    if(isset($decoded["operating_system"])) if(strlen(trim($decoded["operating_system"]))>0) $operating_system = $decoded["operating_system"];
    if(isset($decoded["operating_system_version"])) if(strlen(trim($decoded["operating_system_version"]))>0) $operating_system_version = $decoded["operating_system_version"];
    


    $conn->begin_transaction();

    try {
        if($device_uid != NULL){
            
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
                // Previous User
                $sql = "SELECT timeadded, nickname, email, password_last_updated, subscription_type, subscription_start_date, subscription_end_date, billing_cycle_time, billing_cycle_type, auto_payment FROM users WHERE email = ?;";
                $stmt = $conn->prepare($sql); 
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result === false) {
                    throw new Exception("Error executing the SELECT query (Previous User): " . $conn->error);
                }else{
                    if ($result->num_rows > 0) {
                        $user = $result->fetch_assoc();
                        $valid_till = $user["subscription_end_date"];
                        if($user["subscription_type"] == "Subscribed") $is_premium_found = true;
                        $userLoggedData = 
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
                            
                        $row_affected = true;
                    }
                }

                
            }else{
                // First Time User
                // Check if the user is the first time user or not, if not insert the data
                $is_first_time = false;
                $sql = "INSERT IGNORE INTO trials (device_uid, valid_till, operating_system, os_version) VALUES (?, NOW() + INTERVAL 1 HOUR, ?, ?);";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $device_uid, $operating_system, $operating_system_version);
                $stmt->execute();

                if ($stmt === false){
                    throw new Exception("Error inserting into (First Time User Table): ");
                }else{
                    if($stmt->affected_rows > 0) $is_first_time = true;
                }
            }
        
            
            
            if($is_premium_found){
                
                // Premium Device Active Check
                $is_active_premium_device = false;
                $sql = "SELECT device_uid FROM premium_log WHERE email = ? ORDER BY timeadded DESC LIMIT 5;";
                $stmt = $conn->prepare($sql); 
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result === false) {
                    throw new Exception("Error executing the SELECT query (Premium Device Active Check): " . $conn->error);
                }else{
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if($row["device_uid"]==$device_uid){
                                $is_active_premium_device = true;
                                break;
                            }
                        }
                    }
                    
                    if(!$is_active_premium_device && $isPremium == "Trial"){
                        // If the Trial User Upgraded For The First Time
                        $sql = "INSERT INTO premium_log (device_uid, email, operating_system, os_version) VALUES (?, ?, ?, ?);";  
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssss", $device_uid, $email, $operating_system, $operating_system_version);
                        $stmt->execute();

                        if ($stmt === false){
                            throw new Exception("Error inserting into (First Time User Table): ");
                        }else{
                            if($stmt->affected_rows > 0){
                                $is_upgraded = true;
                            }
                        }
                        
                    }else if(!$is_active_premium_device){
                        $should_log_out = "Yes";
                    } 
                    
                    
                }


                
                
                
            }else{
                // Trial User
                $sql = "SELECT id, device_uid, valid_till, is_email_verified FROM trials WHERE device_uid = ?;";
                $stmt = $conn->prepare($sql); 
                $stmt->bind_param("s", $device_uid);
                $stmt->execute();
                $result = $stmt->get_result(); 

                if ($result === false) {
                    throw new Exception("Error executing the SELECT query (Trial User): " . $conn->error);
                }else{
                    if ($result->num_rows > 0) {
                        $trial_user = $result->fetch_assoc();
                        $valid_till = $trial_user["valid_till"];
                        $row_affected = true;
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
  
    // $fetched_json_data = 
    // '"device_uid" : "'. $device_user["device_uid"] .'",
    // "valid_till" : "'. $device_user["valid_till"] .'",
    // "is_email_verified" : "'. $device_user["is_email_verified"] .'",';
    
    $serverInfo = 
    '"serverinfo": "empty"';
        
    if($serverDataVersion > $serverVersion){
        $serverInfo = 
        '"serverinfo": {
            "us1": {
                "isPremium": "No",
                "iso": "us",
                "name": "United States",
                "extraData": "Los Angeles",
                "serverAddress": "vless://f43501ea-d00f-48dd-b290-6e1a322a46f3@vultlosangel.heat6.com:443?hiddify=1&sni=vultlosangel.heat6.com&type=ws&alpn=http/1.1&path=/msp5J70Em4s8tynHTfoXJwYPcv&host=vultlosangel.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#United%20States"
            },
            "hk1": {
                "isPremium": "No",
                "iso": "hk",
                "name": "Hong Kong",
                "extraData": "Hong Kong Region",
                "serverAddress": "vless://1885b251-20dd-494f-aa60-bbe1e790d7db@gglhong.heat6.com:443?hiddify=1&sni=gglhong.heat6.com&type=ws&alpn=http/1.1&path=/wqkrVxxpKvrWyhhd7ny54CKkS&host=gglhong.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#Hong%20Kong"
            },
            "au1": {
                "isPremium": "Yes",
                "iso": "au",
                "name": "Australia",
                "extraData": "Sydney",
                "serverAddress": "vless://77241492-3c49-420f-b790-0053384a483d@ovaustralia.heat6.com:443?hiddify=1&sni=ovaustralia.heat6.com&type=ws&alpn=http/1.1&path=/c9VpNm93pXXNTC0Hv5edKomYzNx&host=ovaustralia.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#Australia"
            },
            "br1": {
                "isPremium": "Yes",
                "iso": "br",
                "name": "Brazil",
                "extraData": "São Paulo",
                "serverAddress": "vless://8f1645f0-1e87-47f6-bca1-659af9d24e51@vulbrazil.heat6.com:443?hiddify=1&sni=vulbrazil.heat6.com&type=ws&alpn=http/1.1&path=/ajzHm1rhTx457y0SZxvQ&host=vulbrazil.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#Brazil"
            },
            "ca1": {
                "isPremium": "Yes",
                "iso": "ca",
                "name": "Canada",
                "extraData": "Vancouver",
                "serverAddress": "vless://df42f029-ee07-42d6-929c-08be173bd10f@ovcanada.heat6.com:443?hiddify=1&sni=ovcanada.heat6.com&type=ws&alpn=http/1.1&path=/X7ihoHPqxownJkd12f2YzO6g&host=ovcanada.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#Canada"
            },
            "cl1": {
                "isPremium": "Yes",
                "iso": "cl",
                "name": "Chile",
                "extraData": "Santiago",
                "serverAddress": "vless://5c1116ca-ae15-42e8-b50b-cc4dbbf7b890@vulchile.heat6.com:443?hiddify=1&sni=vulchile.heat6.com&type=ws&alpn=http/1.1&path=/mL4EqswBFIn2dVfo&host=vulchile.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#Chile"
            },
            "fr1": {
                "isPremium": "Yes",
                "iso": "fr",
                "name": "France",
                "extraData": "Gravelines",
                "serverAddress": "vless://5b3a6fc1-39c2-4afc-8ff3-cdb7d06dce77@ovhfranc.heat6.com:443?hiddify=1&sni=ovhfranc.heat6.com&type=ws&alpn=http/1.1&path=/iYoO3IqmtKKX3sWm&host=ovhfranc.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#France"
            },
            "de1": {
                "isPremium": "Yes",
                "iso": "de",
                "name": "Germany",
                "extraData": "Frankfurt",
                "serverAddress": "vless://5e278b89-1752-4ea4-a9cb-f5b1381dfb9f@ovgerman.heat6.com:443?hiddify=1&sni=ovgerman.heat6.com&type=ws&alpn=http/1.1&path=/dP7NuLgbhbtCGtPEutaG&host=ovgerman.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#Germany"
            },
            "in1": {
                "isPremium": "Yes",
                "iso": "in",
                "name": "India",
                "extraData": "Delhi",
                "serverAddress": "vless://da3f085b-943e-4e06-98bc-d1d3a4f9567e@vultindiaa.heat6.com:443?hiddify=1&sni=vultindiaa.heat6.com&type=ws&alpn=http/1.1&path=/oKe1Gd9HnjVyT47zlpkBjdWJE&host=vultindiaa.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#India"
            },
            "id1": {
                "isPremium": "Yes",
                "iso": "id",
                "name": "Indonesia",
                "extraData": "Jakarta",
                "serverAddress": "vless://42d6c6d5-9c46-4df9-9759-11f923b42210@linindonn.heat6.com:443?hiddify=1&sni=linindonn.heat6.com&type=grpc&alpn=h2&path=QebDIKEtjfqko7i&host=linindonn.heat6.com&serviceName=QebDIKEtjfqko7i&mode=gun&encryption=none&fp=chrome&headerType=None&security=tls#Indonesia"
            },
            "jp1": {
                "isPremium": "Yes",
                "iso": "jp",
                "name": "Japan",
                "extraData": "Tokyo",
                "serverAddress": "vless://c0d2bcca-a770-4eb4-b419-629328bb19cd@vultrjapann.heat6.com:443?hiddify=1&sni=vultrjapann.heat6.com&type=ws&alpn=http/1.1&path=/e3hZVZTAZ5zQtcYFJXj&host=vultrjapann.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#Japan"
            },
            "kr1": {
                "isPremium": "Yes",
                "iso": "kr",
                "name": "Korea",
                "extraData": "Seoul",
                "serverAddress": "vless://59a2c4e6-51b3-45fe-a561-096f7db8d13e@vulkorae.heat6.com:443?hiddify=1&sni=vulkorae.heat6.com&type=ws&alpn=http/1.1&path=/H3lrhqBEhzjNBfumcaMc75FL&host=vulkorae.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#Korea"
            },
            "nl1": {
                "isPremium": "Yes",
                "iso": "nl",
                "name": "Netherlands",
                "extraData": "Amsterdam",
                "serverAddress": "vless://31bce1a9-ead5-4a09-9d32-2c164e7baa9a@donedaa.heat6.com:443?hiddify=1&sni=donedaa.heat6.com&type=ws&alpn=http/1.1&path=/yEIxzrBiZ6uOtYPMLCue&host=donedaa.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#Netherlands"
            },
            "pl1": {
                "isPremium": "Yes",
                "iso": "pl",
                "name": "Poland",
                "extraData": "Warsaw",
                "serverAddress": "trojan://af7e06db-05de-4aca-b8d2-afe735d79642@ovpoland.heat6.com:443?hiddify=1&sni=ovpoland.heat6.com&type=ws&alpn=http/1.1&path=/SYsMcJpv1gj7oHSc2Z&host=ovpoland.heat6.com&fp=chrome&headerType=None&security=tls#Poland"
            },
            "sg1": {
                "isPremium": "Yes",
                "iso": "sg",
                "name": "Singapore",
                "extraData": "PR Singapore",
                "serverAddress": "vless://5d3c436e-fca5-47aa-938b-ec9a982a0729@linodesgp.heat6.com:443?hiddify=1&sni=linodesgp.heat6.com&type=ws&alpn=http/1.1&path=/QStyC6E6hGTqLNp45QG0L&host=linodesgp.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#Singapore"
            },
            "sg2": {
                "isPremium": "Yes",
                "iso": "sg",
                "name": "Singapore",
                "extraData": "Singapore 2",
                "serverAddress": "vless://846ac623-ddd3-449a-8f14-36791d5a814e@vultrsingap.heat6.com:443?hiddify=1&sni=vultrsingap.heat6.com&type=ws&alpn=http/1.1&path=/FUs92XF8S1rPlN2YW33Lg1&host=vultrsingap.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#Singapore"
            },
            "za1": {
                "isPremium": "Yes",
                "iso": "za",
                "name": "South Africa",
                "extraData": "Johannesburg",
                "serverAddress": "vless://d06ad70a-5181-49ac-9619-4c54e24be410@vltafrica.heat6.com:443?hiddify=1&sni=vltafrica.heat6.com&type=ws&alpn=http/1.1&path=/1qQihHUbGB0EDgNBgE6t6jWW&host=vltafrica.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#South%20Africa"
            },
            "es1": {
                "isPremium": "Yes",
                "iso": "es",
                "name": "Spain",
                "extraData": "Madrid",
                "serverAddress": "vless://456d29e8-d504-4d2e-ae14-44d7e4b035ad@vltspain.heat6.com:443?hiddify=1&sni=vltspain.heat6.com&type=ws&alpn=http/1.1&path=/bZmiWMKfYYB15RnVpnBrEmn1W&host=vltspain.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#Spain"
            },
            "se1": {
                "isPremium": "Yes",
                "iso": "se",
                "name": "Sweden",
                "extraData": "Stockholm",
                "serverAddress": "vless://85a66d86-c955-462d-9481-d3b79645c907@linodeswe.heat6.com:443?hiddify=1&sni=linodeswe.heat6.com&type=ws&alpn=http/1.1&path=/usM1zQu2oYyjw4xuxu9t1kz8a&host=linodeswe.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#Sweden"
            },
            "tw1": {
                "isPremium": "Yes",
                "iso": "tw",
                "name": "Taiwan",
                "extraData": "Taipei",
                "serverAddress": "vless://e23461cd-028e-449e-9beb-1dccbc586122@ggltaiwnn.heat6.com:443?hiddify=1&sni=ggltaiwnn.heat6.com&type=ws&alpn=http/1.1&path=/s29pWhO2tziQy0hTUjF58fTo&host=ggltaiwnn.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#Taiwan"
            },
            "gb1": {
                "isPremium": "Yes",
                "iso": "gb",
                "name": "United Kingdom",
                "extraData": "London",
                "serverAddress": "vless://7ec6eeaf-5504-4b07-a3a2-51213ba52bbc@vltlondon.heat6.com:443?hiddify=1&sni=vltlondon.heat6.com&type=ws&alpn=http/1.1&path=/fk6EorDL01h2YijiE4j1wSmsR&host=vltlondon.heat6.com&encryption=none&fp=chrome&headerType=None&security=tls#United%20Kingdom"
            }
        }';
    }
    
    
    echo 
    '{  
        "status": "Success",
        "version" : "2",
        "appUpdateVersion": "0",
        "serverDataVersion": "'. $serverDataVersion .'",
        "deviceUid" : "'. $device_uid .'",
        "currentTime" : "'. $current_time .'",
        "validTill" : "'. $valid_till .'",
        "shouldLogOut" : "'. $should_log_out .'",
        "userLoggedData": '. $userLoggedData .',
        "isUpgraded": "'. ($is_upgraded ? "Yes" : "No") .'",
        '. $serverInfo .'
    }';


}else{
    echo 
    '{
        "status": "Failed"
    }';
}


?>