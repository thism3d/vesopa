<?php

require '../admin_server_files/header_server_validate.php';

$isSuccess = true;
$deleteTagCategory = "blog";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $tagToDelete = stringPostReturn("tagToDelete");



    $sql = 'SELECT * FROM homepage;';
    $result = $conn->query($sql);

    $homepage = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $homepage[$row["tag"]] = array(
                "data1" => $row["data1"],
                "data2" => $row["data2"],
                "data3" => $row["data3"],
                "data4" => $row["data4"],
                "data5" => $row["data5"],
            );
        }
    }

    $x = 1;
    while(isset($homepage[$deleteTagCategory . $x])){
        $x++;
    }
    $x--;
    $totalTags = $x;


    // $lastTag = $deleteTagCategory . $x;

    // echo "$x<br>$lastTag";


    $i = 0;
    for($i = 1; $i <= $x; $i++){
        $tagIteration = $deleteTagCategory . $i;
        if($tagToDelete == $tagIteration) break;
    }

    // echo "Tag To Delete: $tagToDelete<br>Total Tags: $totalTags<br>$i<br>";

    $conn->begin_transaction();
    try {

        $stmt = $conn->prepare('DELETE FROM homepage WHERE tag = ?;');
        $stmt->bind_param("s", $tagToDelete);
        $stmt->execute();

        if ($stmt === false){
            throw new Exception("Error Deleting Tag");
        }


        for($i = $i++; $i <= $x; $i++){
            $tagIteration = $deleteTagCategory . $i;
            $updatedTag = $deleteTagCategory . ($i-1);

            $sql = 'UPDATE homepage SET tag = ? WHERE tag = ?;';  
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $updatedTag, $tagIteration);
            $stmt->execute();

            if ($stmt === false) {
                throw new Exception("Error Updating Tag " . $conn->error);
            }
        }




        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        $isSuccess = false;
        // echo "Transaction failed: " . $e->getMessage();
    }




}

if($isSuccess) header("Location: ../home");
// exit();

?>
