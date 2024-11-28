<?php
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

// Define currencies to search for
$currencies = [
    "دلار آمریکا" => "//tr[@data-market-nameslug='price_dollar_rl']//td[@class='nf']",
    "درهم امارات" => "//tr[contains(@data-market-nameslug, 'price_aed')]//td[@class='nf']",
    "لیر ترکیه" => "//tr[contains(@data-market-nameslug, 'price_try')]//td[@class='nf']",
    "بات تایلند" => "//tr[contains(@data-market-nameslug, 'price_thb')]//td[@class='nf']"
];

// Extract prices
foreach ($currencies as $name => $query) {
    $nodes = $xpath->query($query);
    if ($nodes->length > 0) {
        $price = $nodes[0]->textContent;
        echo "{$name}: {$price}<br>";
    } else {
        echo "{$name}: اطلاعات موجود نیست.<br>";
    }
}
?>
