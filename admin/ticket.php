<?php

session_start();

// Check if the user data is set in the session
if (!isset($_SESSION["user_data"])) {
    // Redirect to the login page
    header("Location: login.php");
    exit(); // Stop further execution of the script
}
$id = $_SESSION["user_data"]["id"];
$admin = $_SESSION["user_data"]["admin"];
if($admin == 0){
  // Redirect to the home page if the user is not an admin
  header("Location: restricted.php");
  exit(); // Stop further execution of the script
}

?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="handheldfriendly" content="true">
    <meta name="MobileOptimized" content="width">
    <meta name="description">
    <!-- <meta name="keywords" content="Mordenize"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/datatable.css">
    <link rel="stylesheet" href="css/jalali.css">
    <link rel="stylesheet" href="css/style.min.css">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/mainstyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    


    <title>تیکت ها</title>
    <style>
      body {
        font-family: "tahoma" !important;
        /* font-family: "g" !important; */
      }
      /* Reset padding and margin for the body */
      body, html {
          margin: 0 !important;
          padding: 0 !important;
          overflow-x: hidden !important; /* Prevents horizontal scrolling */
      }

    </style>

  </head>
  <body id="mainArea" class="mainArea" >
    <!-- لــودر صفحات  -->
    <div class="preloader" style="display: none;">
      <img src="images/logo.png" alt="loader" class="lds-ripple img-fluid">
    </div>

    <!-- شروع صفحه -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" >
      <!-- سایدبار --> 
       <?php
            include 'sidebar.php';  
            include "../config.php";
            include "../functions.php";

        ?> 
      <div class="sidebarHolder"></div>
      <!-- کانتینر اصلی دیتا -->
      <div class="body-wrapper bg-light" >
        <!-- هدر بالای صفحه -->
        <?php
        include "header.php";
        ?>
        <div class="container-fluid">
          <div class="row" id="notify-content"></div>
          <div class="row">
            <style>
              @media screen and (max-width:800px) {
                #grid_invoices_wrapper {
                  overflow-x: auto;
                }
              }
            </style>
        

            <div class="container-fluid" id="dashboard">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-1 mb-md-3">
                        <div class="mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                            <div class="p-6 bg-light-primary rounded-2 me-6 d-flex align-items-center justify-content-center">
                                <i class="fa fa-file"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fs-4 fw-semibold">مدیریت تیکت ها</h6>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="shop-part d-flex w-100 flex-column">
                       
                          <div class="card-body p-0 pb-0 position-relative" style="min-height:1000px">
                              <div class="d-flex justify-content-end align-items-center mb-4">
                              <form class="position-relative">
                                  <input type="text" class="form-control search-chat py-2 ps-5 text-right" id="txtSearch" placeholder="جست و جو">
                                  <i class="fa fa-search position-absolute top-50  translate-middle-y fs-6 text-dark me-3" style="right:10px"></i>
                              </form>
                            

                              </div>

                              
                              <?php
                                if(isset($_GET['id_ticket'])){
                                    
                                    $id_ticket = $_GET['id_ticket'];
                                    $query = "SELECT * FROM tickets WHERE id = $id_ticket";
                                    $result = $conn->query($query);
                                    $row = $result->fetch_assoc();
                                    $user = $row['user_id'];
                                    ?>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea class="form-control" readonly rows="6"><?=$row['text1']?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        </div>
                                        <?php
                                        if(!isset($row['answer1']) || $row['answer1'] == NULL){
                                        ?>
                                        <div class="col-md-6">
                                            <form action="" method="POST">
                                              <textarea class="form-control" name="answer1" rows="6">
                                              </textarea>
                                              <button name="send_answer1" class="btn btn-primary">ارسال پاسخ</button>
                                            </form>
                                            
                                        </div>
                                        <?php
                                        }elseif(isset($row['answer1']) || $row['answer1'] != NULL){?>
                                          <div class="col-md-6">
                                              <textarea class="form-control" name="answer1" rows="6" readonly>
                                                 <?=$row['answer1']?>
                                              </textarea>
                                            </form>
                                            
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>



                                    <?php
                                    if(isset($row['answer1']) || $row['answer1'] != NULL){
                                      if(isset($row['text2']) || $row['text2'] != NULL){
                                      ?>
                                        <div class="row">
                                        
                                            <div class="col-md-6">
                                              <textarea class="form-control" readonly rows="6"><?=$row['text2']?></textarea>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                          </div>
                                          <?php
                                        if(!isset($row['answer2']) || $row['answer2'] == NULL){
                                        ?>
                                          <div class="col-md-6">
                                            <form action="" method="POST">
                                                <textarea class="form-control" name="answer2" rows="6">
                                                </textarea>
                                                <button name="send_answer2" class="btn btn-primary">ارسال پاسخ</button>
                                            </form>
                                          </div>
                                        <?php
                                        }elseif(isset($row['answer2']) || $row['answer2'] != NULL){
                                          ?>
                                          <div class="col-md-6">
                                                <textarea class="form-control" name="answer2" rows="6" readonly>
                                                  <?=$row['answer2']?>
                                                </textarea>
                                            </form>
                                          </div>
                                          <?php
                                          }
                                      
                                          ?>
                                      


                                        </div>
                                      <?php
                                      }
                                    }
                                    ?>

                                   

                                <?php
                                }else{
                                    echo "تیکتی انتخاب نشده";
                                }
                              ?>



                                  
                          </div>
                          
                        </div>
                    </div>
                    </div>
                </div>
            </div>


          </div>
        </div>
      </div>
    </div>
    
  
    <div id="modalContainer"></div>
    <?php include "footer.php"; ?>
 
    <script>
      function ticket_show(){
        // Show the form
        var form = document.getElementById("new_ticket");
        form.style.display = "";

        // Scroll to the form at the bottom
        form.scrollIntoView({ behavior: "smooth" });
      }

    </script>

    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://my.g-ads.org/assets/js/bootstrap-switch.js"></script> -->

    <!-- <script src="https://my.g-ads.org/assets/js/app-style-switcher.js"></script> -->

    <script src="js/app.min.js"></script>
    <script src="js/app.init.js"></script>
    <script src="js/jalali.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <!-- <script src="https://my.g-ads.org/assets/js/custom.js"></script>
    <script src="https://my.g-ads.org/assets/js/apex.js"></script>
    <script src="https://my.g-ads.org/assets/js/select2.js"></script>
    <script src="https://my.g-ads.org/assets/js/datatable/jqueryDatatable.js"></script> -->


    <script src="js/javascripts.js"></script>

    

    <jdp-container style="z-index: 1000;"></jdp-container>
    <jdp-overlay style="z-index: 999;"></jdp-overlay>
  </body>
  </body>
</html>



<?php

if(isset($_POST['send_answer1'])){

  $select = "SELECT * FROM users WHERE id= $user";
 
  $resultm = $conn->query($select);
  $rowm = $resultm->fetch_assoc();
  $phone = $rowm['phone'];
  // echo $phone;


  $answer1 = $_POST['answer1'];
  $id_ticket = $_GET['id_ticket'];



  
  // turn off the WSDL cache
  ini_set("soap.wsdl_cache_enabled", "0");
  try {
    $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
      $user = "arta9120469460";
      $pass = "43875910";
      $fromNum = "+983000505";
      $toNum = $phone;
      $messageContent = 'تیکت شما پاسخ داده شد';
      $op  = "send";
    //If you want to send in the future  ==> $time = '2016-07-30' //$time = '2016-07-30 12:50:50'
    
    $time = '';
    
    echo $client->SendSMS($fromNum,$toNum,$messageContent,$user,$pass,$time,$op);
    echo $status;
  } catch (SoapFault $ex) {
      echo $ex->faultstring;
  }





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

 
}


if(isset($_POST['send_answer2']) ){
  
  $select = "SELECT * FROM users WHERE id= $user";
 
  $resultm = $conn->query($select);
  $rowm = $resultm->fetch_assoc();
  $phone = $rowm['phone'];


  $answer1 = $_POST['answer2'];
  $id_ticket = $_GET['id_ticket'];



  
  // turn off the WSDL cache
  ini_set("soap.wsdl_cache_enabled", "0");
  try {
    $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
      $user = "arta9120469460";
      $pass = "43875910";
      $fromNum = "+983000505";
      $toNum = $phone;
      $messageContent = 'تیکت شما پاسخ داده شد';
      $op  = "send";
    //If you want to send in the future  ==> $time = '2016-07-30' //$time = '2016-07-30 12:50:50'
    
    $time = '';
    
    echo $client->SendSMS($fromNum,$toNum,$messageContent,$user,$pass,$time,$op);
    echo $status;
  } catch (SoapFault $ex) {
      echo $ex->faultstring;
  }





  $query = "UPDATE tickets SET answer2 = '$answer2', status = 1 WHERE id = $id_ticket";
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

}