<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "adsbarg";


// $conn = new mysqli($servername, $username, $password, $dbname);


// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }



$servername = "136.243.36.77";
$username = "wolffcod_admin";
$password = "6y2&uyR.+0&Y";
$dbname = "wolffcod_test;

$cfg['Lang'] = 'fa';
$cfg['Charset'] = 'utf8mb4';


$conn = mysqli_connect($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
