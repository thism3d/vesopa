<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header("Access-Control-Allow-Headers: X-Requested-With");


$row_affected = false;
$warning = "Failed to send, resend again!";

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
    $otp = $decoded["otp"];
    



    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $sql = "SELECT email FROM users WHERE email = ?;";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result(); 
        if ($result->num_rows > 0) {
            $warning = "Email is already registered, try another email or forget password.";
        }else{
            $row_affected = true;
            
            $jsonData = array(
                'email' => $email,
                'otp' => $otp,
            );
            
            $jsonString = json_encode($jsonData);
            $apiUrl = 'https://amzro.com/mail/email-verification';
            
            $ch = curl_init($apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonString);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($jsonString)
            ));
            
            $response = curl_exec($ch);
            // echo $response;
            // if (curl_errno($ch)) {
            //     echo 'Curl error: ' . curl_error($ch);
            // }
            curl_close($ch);
            
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
        "warning": "'. $warning .'"
    }';
}


?>