<?php

$servername = "localhost";
$username = "u345429484_kLqerYUmdfTiXf";
$password = 'Iow98Myu4tyKjO7';
$dbname = "u345429484_ukolapqymudfrh";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "Database Communicatoin Error, Server in Maintainance, Call us immediately to solve this issue +447456289388.";
    die("Connection failed: " . $conn->connect_error);
    exit();
}
