<?php


$host = '185.141.212.171'; // Change as needed
$username = 'adsbarg_admin'; // Your database username
$password = 'HL(to{PCYL=b'; // Your database password
$dbname = 'adsbarg_dashboard'; // Replace with your database name

// $host = 'localhost'; // Change as needed
// $username = 'root'; // Your database username
// $password = ''; // Your database password
// $dbname = 'adsbarg'; // Replace with your database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}



$sql = "UPDATE accounts 
        SET active = 0
        WHERE created_at < NOW() - INTERVAL 6 MONTH";


// اجرای کوئری
if ($conn->query($sql) === TRUE) {
    echo "اکانت غیرفعال شد.";
} else {
    echo "خطا: " . $conn->error;
}
?>
