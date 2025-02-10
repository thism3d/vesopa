<?php

    require '../admin_server_files/header_server_validate.php';


    $error_on_image = false;
    $isSuccess = false;

    $addTagCategory = "blog";
    $data1 = $data2 = $data3 = $data4 = $data5 = NULL;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


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
        while(isset($homepage[$addTagCategory . $x])){
            $x++;
        }




        $data1 = stringPostReturn("data1");
        $data2 = stringPostReturn("data2");
        $data3 = stringPostReturn("data3");
        $data4 = stringPostReturn("data4");
        $data5 = stringPostReturn("data5");



        if($_FILES["fileToUpload"]["size"]>0){


            // Check the image and upload the image
            $target_dir = __DIR__ . '/../../assets/blogs/';
            // echo $target_dir . "<br>";
            $target_file = basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


            $filenameforserver = preg_replace("/[^a-zA-Z0-9.]+/", "", $target_file);
            $filenameforserver = pathinfo($filenameforserver, PATHINFO_FILENAME) . base_convert(round(microtime(true)), 10, 30) . "." . $imageFileType;
            $target_file_name = $target_dir . $filenameforserver;


            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

            if($check == false) $error_on_image = true;
            if (file_exists($target_dir . $filenameforserver)) $error_on_image = true;
            if ($_FILES["fileToUpload"]["size"] > 500000000) $error_on_image = true;  // 5000 KB LIMIT

           
            if (!$error_on_image) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_name)) {
                    // echo "The file ". $filenameforserver. " has been uploaded.<br>";
                    $data3 =  $filenameforserver;
                    $data4 = date("Y-m-d H:i:s");
                    $tagName = $addTagCategory . $x;
                    // echo "Reached Here";
                    

                    // echo "$data2<br>$tagName";

                    $stmt = $conn->prepare('INSERT INTO homepage( data1, data2, data3, data4, data5, tag) VALUES(?, ?, ?, ?, ?, ?);');
                    $stmt->bind_param("ssssss", $data1, $data2, $data3, $data4, $data5, $tagName);
                    if($stmt->execute()){
                        $isSuccess = true;
                        // echo "Success Changed";
                    }else{
                        echo "Error: " . $stmt->error;
                    }

                }
            }

        }


        




    }





    // Go To Page
    if($isSuccess) header("Location: ../home");



 ?>
