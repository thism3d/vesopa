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

    $email = $decoded["email"];
    



    
    $conn->begin_transaction();
    try {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            $is_active_premium_device = false;
            $sql = "SELECT device_uid, timeadded, operating_system, os_version FROM premium_log WHERE email = ? ORDER BY timeadded DESC LIMIT 5;";
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result === false) {
                throw new Exception("Error executing the SELECT query (Premium Logs Table): " . $conn->error);
            }else{
                if ($result->num_rows > 0) {
                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                    $row_affected = true;
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

    echo 
    '{
        "status": "Success",
        "devices": '. json_encode($rows) .'
    }';


}else{
    echo 
    '{
        "status": "Failed",
        "warning": "User Not Found!"
    }';
}


?>
