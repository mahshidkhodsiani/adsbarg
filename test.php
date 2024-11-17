<?php
$url = "https://api.tgju.org/api/endpoint"; // Replace with actual API endpoint
$response = file_get_contents($url);
$data = json_decode($response, true);

if (isset($data['usd_irr'])) { // Replace with the actual JSON key for USD to IRR
    $usdRate = $data['usd_irr'];
    echo "1 USD = $usdRate IRR (Market Rate)";
} else {
    echo "Error: Unable to fetch market rate.";
}
?>
