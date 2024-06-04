<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = 'fruitables';

$conn = new mysqli($server, $username, $password, $dbname);

// echo "<pre>";
// print_r($conn);
// echo "</pre>";

if(isset($conn->connect_error)){
    echo "Something went wrong! connection failed";
}

