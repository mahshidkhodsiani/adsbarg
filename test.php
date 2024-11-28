
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

















if(isset($_POST['send_answer'])){

  $select = "SELECT * FROM users WHERE id= $user";
 
  $resultm = $conn->query($select);
  $rowm = $resultm->fetch_assoc();
  $phone = $rowm['phone'];
  echo $phone;


  $answer1 = $_POST['answer1'];
  $id_ticket = $_GET['id_ticket'];



  
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
          "code": "zilwfodf0dm025w" ,
          "sender": "3000505" ,
          "recipient": "'.$phone.'" ',
      CURLOPT_HTTPHEADER => array(
      'apikey: tlx26aCDjiYqOdvtKOBvwEkbu9laYEE5DfTp9Y5a4ro=',
      'Content-Type: application/json',
      ),
  ));

  $response = curl_exec($curl);
  curl_close($curl);

  if($response){



    $query = "UPDATE tickets SET answer1 = '$answer1', status = 1 WHERE id = $id_ticket";
    $result = $conn->query($query);
    if ($result) {
      echo "<div id='successToast' class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-delay='3000' style='position: fixed; top: 20px; right: 20px; width: 300px; z-index: 1055;'>
      <div class='toast-header bg-success text-white'>
          <strong class='mr-auto'>Success</strong>
      </div>
      <div class='toast-body'>
        با موفقیت انجام شد!
      </div>
      </div>
      <script>
          $(document).ready(function(){
              $('#successToast').toast({
                  autohide: true,
                  delay: 3000
              }).toast('show');
              setTimeout(function(){
                  window.location.href = 'tickets';
              }, 3000);
          });
      </script>";
    }else{
      echo "<div id='errorToast' class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-delay='3000' style='position: fixed; top: 20px; right: 20px; width: 300px; z-index: 1055;'>
        <div class='toast-header bg-danger text-white'>
            <strong class='mr-auto'>Error</strong>
        </div>
        <div class='toast-body'>
            خطایی رخ داده، دوباره امتحان کنید!<br>Error: " . htmlspecialchars($stmt->error) . "
        </div>
        </div>
        <script>
            $(document).ready(function(){
                $('#errorToast').toast({
                    autohide: true,
                    delay: 3000
                }).toast('show');
                setTimeout(function(){
                    window.location.href = 'tickets';
                }, 3000);
            });
        </script>";
    }

  }else{
    echo "ارسال پیامک ناموفق بود. لطفاً مجدداً تلاش کنید.";
  }
}