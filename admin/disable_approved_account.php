<?php

require 'admin_server_files/header_server_validate.php';

$isSuccess = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {


    $id = intval(stringPostReturn("profile_id"));
    

    $conn->begin_transaction();
    try {
        $sql = "SELECT timeadded, id, name, email, password, company FROM backoffice_users WHERE approved = 'Y' AND id = ?;";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result === false) {
            throw new Exception("Error executing the SELECT query (User Table): " . $conn->error);
        }else{
            if ($result->num_rows > 0) {
                $approved_user = $result->fetch_assoc();
                $email = $approved_user["email"];
            }
        }

        
        $sql = 'UPDATE demo_request SET approved = "N" WHERE email = ?;';  
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        if ($stmt === false) {
            throw new Exception("Error updating record (Users Table) " . $conn->error);
        } else {
            if($stmt->affected_rows > 0){
                $approved = "N";
            }
        }
        
        $sql = 'UPDATE backoffice_users SET approved = "N" WHERE email = ?;';  
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        if ($stmt === false) {
            throw new Exception("Error updating record (Users Table) " . $conn->error);
        } else {
            if($stmt->affected_rows > 0){
                $isSuccess = true;
            }
        }
        
        
    

        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Transaction failed: " . $e->getMessage();
    }


}

header('Location: ' . $serverhost .'approved');
exit();

?>
