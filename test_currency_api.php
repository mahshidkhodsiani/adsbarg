<?php
// Database connection settings
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$dbname = 'adsbarg'; 

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
@$dom->loadHTML($response);

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
        $currencyValues[$key] = "اطلاعات موجود نیست";
    }
}

// Corrected calculations
$currencyValues['dollar'] = 0.04 * (float)$currencyValues['dollar'] + (float)$currencyValues['dollar'];
$currencyValues['derham'] = 0.07 * (float)$currencyValues['derham'] + (float)$currencyValues['derham'];
$currencyValues['lira'] = 0.07 * (float)$currencyValues['lira'] + (float)$currencyValues['lira'];
$currencyValues['bat'] = 0.11 * (float)$currencyValues['bat'] + (float)$currencyValues['bat'];

// Save the data to a JSON file
$filePath = 'currency_data.json';
file_put_contents($filePath, json_encode($currencyValues, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

echo "Currency data saved to $filePath";
?>
