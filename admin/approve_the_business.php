<?php

require 'admin_server_files/header_server_validate.php';

$isSuccess = $backoffice_user_found = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {


    $id = intval(stringPostReturn("profile_id"));
    $password = stringPostReturn("password");
    



    $conn->begin_transaction();
    try {
        $sql = "SELECT timeadded, id, name, email, phone, business_name, business_brief FROM demo_request WHERE approved = 'N' AND id = ?;";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result === false) {
            throw new Exception("Error executing the SELECT query (User Table): " . $conn->error);
        }else{
            if ($result->num_rows > 0) {
                $demo_request = $result->fetch_assoc();
                $email = $demo_request["email"];
                $name = $demo_request["name"];
                $company = $demo_request["business_name"];
            }
        }

        
        $sql = 'UPDATE demo_request SET  approved = "Y" WHERE id = ?;';  
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt === false) {
            throw new Exception("Error updating record (Users Table) " . $conn->error);
        } else {
            if($stmt->affected_rows > 0){
                $approved = "Y";
            }
        }
        
        
        
        $sql = "SELECT id FROM backoffice_users WHERE email = ?;";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result === false) {
            throw new Exception("Error executing the SELECT query (User Table): " . $conn->error);
        }else{
            if ($result->num_rows > 0) {
                $backoffice_user_found = true;
            }
        }
        



        if(!$backoffice_user_found){

            $sql = "INSERT INTO backoffice_users(email, password, name, company, approved) VALUES (?, ?, ?, ?, ?);";  
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $email, $password, $name, $company, $approved);
            $stmt->execute();
    
            if ($stmt === false){
                throw new Exception("Error inserting into (Premium Log Table): ");
            }else{
                if($stmt->affected_rows > 0){
                    $isSuccess = true;
                }
            }
        }else{
            $sql = 'UPDATE backoffice_users SET approved = "Y", password = ? WHERE email = ?;';  
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $password, $email);
            $stmt->execute();

            if ($stmt === false) {
                throw new Exception("Error updating record (Users Table) " . $conn->error);
            } else {
                if($stmt->affected_rows > 0){
                    $isSuccess = true;
                }
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
