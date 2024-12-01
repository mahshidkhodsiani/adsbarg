<?php
// Database connection settings
// $host = '185.141.212.171'; // Change as needed
// $username = 'adsbarg_admin'; // Your database username
// $password = 'HL(to{PCYL=b'; // Your database password
// $dbname = 'adsbarg_dashboard'; // Replace with your database name

$host = 'localhost'; // Change as needed
$username = 'root'; // Your database username
$password = ''; // Your database password
$dbname = 'adsbarg'; // Replace with your database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// URL to scrape
$url = "https://www.tgju.org/currency";

// Initialize cURL
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; PHP bot)');

// Execute the request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
    exit;
}

// Close cURL session
curl_close($ch);

// Load HTML into DOMDocument
$dom = new DOMDocument();
@$dom->loadHTML($response); // Suppress warnings from malformed HTML

// XPath to query the DOM
$xpath = new DOMXPath($dom);

// Define XPath queries for all currencies
$currencyQueries = [
    "dollar" => "//tr[@data-market-nameslug='price_dollar_rl']//td[@class='nf']",
    "derham" => "//tr[contains(@data-market-nameslug, 'price_aed')]//td[@class='nf']",
    "lira" => "//tr[contains(@data-market-nameslug, 'price_try')]//td[@class='nf']",
    "bat" => "//tr[contains(@data-market-nameslug, 'price_thb')]//td[@class='nf']"
];

// Initialize an array to store the currency values
$currencyValues = [
    "dollar" => null,
    "derham" => null,
    "lira" => null,
    "bat" => null
];

// Fetch the currency prices
foreach ($currencyQueries as $key => $query) {
    $nodes = $xpath->query($query);
    if ($nodes->length > 0) {
        $currencyValues[$key] = trim($nodes[0]->textContent);
    } else {
        $currencyValues[$key] = "اطلاعات موجود نیست"; // No data available
    }
}

// Prepare the SQL statement for inserting all currencies
$stmt = $conn->prepare("INSERT INTO currencys (dollar, derham, lira, bat) VALUES (?, ?, ?, ?)");

// Bind parameters to the query
$stmt->bind_param(
    "ssss",
    $currencyValues['dollar'],
    $currencyValues['derham'],
    $currencyValues['lira'],
    $currencyValues['bat']
);

// Execute the query
if ($stmt->execute()) {
    echo "Currency data inserted successfully:<br>";
    foreach ($currencyValues as $currency => $value) {
        echo ucfirst($currency) . ": $value<br>";
    }
} else {
    echo "Error inserting data into the database: " . $stmt->error;
}

// Close the statement and the database connection
$stmt->close();
$conn->close();
?>
