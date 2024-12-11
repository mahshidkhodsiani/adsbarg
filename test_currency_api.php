<?php
header('Content-Type: application/json');


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
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit;
}
$conn->set_charset("utf8");


include "PersianCalendar.php";
// Fetch the latest currency data
$sql = "SELECT * FROM currencys ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    // Convert the date format
    $formatted_date = mds_date("l j F Y H:i:s", strtotime($data['updated']), 0);

    // Decode HTML entities to convert to Persian characters
    $formatted_date = html_entity_decode($formatted_date, ENT_QUOTES, 'UTF-8');

    // Rename keys and create a new array
    $formatted_data = [
        'USD' => $data['dollar'],
        'AED' => $data['derham'],
        'TRY' => $data['lira'],
        'THB' => $data['bat'],
        'updated' => $formatted_date
    ];

    // Output the new formatted data
    echo json_encode($formatted_data);
} else {
    echo json_encode(["error" => "No data available"]);
}

// Close the database connection
$conn->close();
?>