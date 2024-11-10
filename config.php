<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adsbarg";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// $servername = "5.75.97.157";
// $username = "adsbarg_admin";
// $password = "ur%{dBr~x5kn";
// $dbname = "adsbarg_dashboard";

// $cfg['Lang'] = 'fa';
// $cfg['Charset'] = 'utf8mb4';


// $conn = mysqli_connect($servername, $username, $password, $dbname);


// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $conn->set_charset("utf8");
