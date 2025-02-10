<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header("Access-Control-Allow-Headers: X-Requested-With");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  

    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if ($contentType === "application/json") {
        $content = trim(file_get_contents("php://input"));
        $decoded = json_decode($content, true);
        if(! is_array($decoded)) {
        } else {
        }
    }
    
    
    
    // $apiUrl = 'https://sandbox.itunes.apple.com/verifyReceipt';
    $apiUrl = 'https://buy.itunes.apple.com/verifyReceipt';
    $appSpecificSharedSecret = 'f2f2fa0f50714a55aca35efe3bd45fc8';
    $receipt_data = $decoded["receipt_data"];
    
    
    $jsonData = array(
        'receipt-data' => $receipt_data,
        'password' => $appSpecificSharedSecret,
        'exclude-old-transactions' => 'true',
    );
    
    $jsonString = json_encode($jsonData);
    
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonString);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonString)
    ));
    
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        // echo 'Curl error: ' . curl_error($ch);
        echo  '{ "status": "Failed" }';
    }else{
        echo $response;
    }
   
}
?>

