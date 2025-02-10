<?php

require 'admin_server_files/header_server_validate.php';

$isSuccess = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {


    $stmt = $conn->prepare('DELETE FROM maintainance_request WHERE id = ?;');
    $stmt->bind_param("i", $member_id);

    $member_id = intval(stringPostReturn("profile_id"));


    if($stmt->execute()){
        $isSuccess = true;
    }



}

header('Location: ' . $serverhost .'maintenance');
exit();

?>
