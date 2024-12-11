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


// کوئری برای غیرفعال کردن سفارشات که مال یک ربع پیش هستند
$sql = "UPDATE orders 
        SET status = 0 
        WHERE status = 2
        AND created_at < NOW() - INTERVAL 15 MINUTE";

// اجرای کوئری
if ($conn->query($sql) === TRUE) {
    echo "سفارشات قدیمی غیرفعال شدند.";
} else {
    echo "خطا: " . $conn->error;
}

?>
