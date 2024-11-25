
<?php


  $curl = curl_init();

  curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://ippanel.com/api/select',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
      "op": "pattern",
      "user": "arta9120469460",
      "pass": "43875910",
      "fromNum": "3000505",
      "toNum": "09130109552",
      "patternCode": "5d43det7mmbukgk",
      "inputData": [
      {
          "verification-code": "122245"
      }
      ]
      }',
      CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  echo $response;
