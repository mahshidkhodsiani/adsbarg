<?php


$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api2.ippanel.com/api/v1/sms/pattern/normal/send',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
    "code": "0k068nitw294w5p",
    "sender": "+983000505",
    "recipient": "09130109552",
    "variable": {
        "variable":"123"
    }
    }',
    CURLOPT_HTTPHEADER => array(
    'apikey: aVshzgWwgz4BCmQ7ZJKtNll65Sdb0ruEzSmqonMjt1o=',
    'Content-Type: application/json',
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;