<?php

session_start();

// Check if the user data is set in the session
if (!isset($_SESSION["user_data"])) {
    // Redirect to the login page
    header("Location: login.php");
    exit(); // Stop further execution of the script
}

$id = $_SESSION["user_data"]["id"];
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
    <link rel="shortcut icon" type="image/png" href="images/logo.png">


    


    <title>صفحه اصلی</title>
    <style>
      body {
        /* font-family: "g", 'sans-serif' !important; */
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
          <div class="col-md-12">
            <div class="card mb-2 mb-md-3">
              <div class="card-body pb-0 px-2 px-md-3">
                <div class="d-flex align-items-center justify-content-between mb-1 mb-md-3">
                  <div class="mb-3 mb-sm-0">
                    <div class="d-flex align-items-center">
                      <div class="p-2 p-md-6 bg-light-primary rounded-2 me-6 d-flex align-items-center justify-content-center">
                        <i class="fa fa-add"></i>
                      </div>
                      <div>
                        <h6 class="mb-0 fs-4 fw-semibold">ساخت اکانت جدید </h6>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex align-items-start">
                    <a href="new_acount" class="btn btn-success mb-2 font-medium me-2 px-2 rounded-pill cursor-pointer" >
                      <span class="d-md-inline d-none">اکانت جدید</span>
                      <i class="fa fa-plus"></i>
                    </a>
               
                  </div>
                </div>

            
              </div>
            </div>


            <div class="row">
              <div class="col-md-6 offset-md-1 border">
                <p style="color: yellowgreen;">کاربر گرامی لطفا نام اکانت را همان وبسایت خود بگذارید</p>
              </div>

              <div class="col-md-6 offset-md-1 border" style="background-color: white;">
                <div class="offcanvas-body ">
                  <form class="" method="POST">
                    <h2>فرم ساخت اکانت جدید</h2>

                    <div class="my-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input success" type="radio" id="accountGoogle_i_currencyCode1" value="USD" name="currencyCode" checked="">
                            <lable class="form-check-label" for="accUsd">دلار</lable>
                        </div>
                      <div class="form-check form-check-inline">
                            <input class="form-check-input success" type="radio" id="accountGoogle_i_currencyCode2" value="AED" name="currencyCode">
                            <lable class="form-check-label" for="accAed">درهم</lable>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input success" type="radio" id="accountGoogle_i_currencyCode3" value="TL" name="currencyCode">
                            <lable class="form-check-label" for="accTry">لیر</lable>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input success" type="radio" id="accountGoogle_i_currencyCode4" value="BHT" name="currencyCode">
                            <lable class="form-check-label" for="accTry">بات</lable>
                        </div>
                        
                    </div>

                    <div class="input-group mb-3">
                        <!-- ولید بشه فقط کاراکتر انگلیسی خط تیره و شارپ همون هشتگ بتونه وارد کنه -->
                        <span class="input-group-text bg-light-primary fs-6" id="accountGoogle_i_name_lable"><i class="fa fa-ad me-1"></i></span>
                        <input type="text" dv="required" dir="ltr" autocomplete="off" id="accountGoogle_i_name" name="name" class="form-control" placeholder="نام اکانت - فقط انگلیسی" aria-label="accountGoogle_i_name_lable" aria-describedby="gAccNameLabel">
                    </div>

                    <div class="input-group mb-3">
                        <!-- ولید بشه برای آدرس ایمیل -->
                        <span class="input-group-text bg-light-primary fs-6" id="accountGoogle_i_email_lable"><i class="fa fa-at me-1"></i></span>
                        <input type="email" dv="required" autocomplete="off" id="accountGoogle_i_email" name="email" class="form-control" placeholder="ایمیل اکانت" aria-label="accountGoogle_i_email_lable" aria-describedby="accountGoogle_i_email_lable">
                    </div>

                    <div class="input-group mb-3 d-none">
                        <span class="input-group-text bg-light-primary fs-6" id="accountGoogle_i_customerId_lable"><i class="fa fa-123 me-1"></i></span>
                        <!-- وقتی کاربر داره اکانت میسازه نمیتونه کاستومر آی دی بزنه، نشونش نده -->
                        <input type="tel" autocomplete="off" name="customerId" id="accountGoogle_i_customerId" class="form-control" placeholder="کاستومر آی دی" aria-label="accountGoogle_i_customerId_lable" aria-describedby="accountGoogle_i_customerId_lable" disabled="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-light-primary fs-6"><i class="fa fa-star me-1"></i></span>
                        <select class="form-control form-select" dv="required" data-placeholder="یک کزینه را انتخاب کنید" tabindex="1" id="accountGoogle_i_network" name="network">
                            <option disabled="" selected="" value="">شبکه تبلیغاتی را انتخاب کنید</option>
                            <!-- وقتی یوتیوب رو میزنه آدرس چنل رو باید بزنه،‌و ولیدیشن باید انجام بشه . راه های ولید کردنش زیاده -->
                            <option description="آدرس کانال یوتیوب" value="Youtube">یوتیوب</option>
                            <!-- وقتی اپلیکیشن رو میزنه باید آدرس اپ رو بزنه حتما که باید ولیدیشن انجام بشه روش -->
                            <option description="آدرس گوگل پلی اپ" value="App">اپلیکیشن</option>
                            <!-- وقتی سرج رو میزنه باید آدرس سایت رو بزنه فرمتش باید ولید باشه. حواست باشه که دامنه با کاراکتر فارسی هم وجود داره  -->
                            <option description="لطفا آدرس سایت وارد شود" value="Search">سرچ</option>
                            <option description="" value="display">دیسپلی</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <!-- اگر اپ بود آدرس اپ، اگر یوتیوب بود آدرس یوتیوب و ادرس سایت و... نیاز به ولیدیشن آدرس -->
                        <span class="input-group-text bg-light-primary fs-6" id="accountGoogle_i_url_lable"><i class="fa fa-link me-1"></i></span>
                        <!-- وقتی سرچ رو انتخاب کرده پلیس هولدر بشه آدرس سایت، اپ باشه بشه آدرس اپلیکیشن و یوتیوب بشه آدرس چنل یوتیوب -->

                        <input type="text" dir="ltr" autocomplete="off" dv="required" name="url" id="accountGoogle_i_url" class="form-control border-end" 
                        placeholder="آدرس سایت" aria-label="accountGoogle_i_url_lable" aria-describedby="accountGoogle_i_url_lable">
                    </div>

                    <div class="input-group mb-3">
                      <select class="form-select" aria-label="Default select example" name="managed_personal">
                        <option selected>مدیریت شده یا اختصاصی</option>
                        <option value="managed">مدیریت شده</option>
                        <option value="personal">اختصاصی</option>
                      </select>
                    </div>

                
                    <button type="submit" class="btn btn-primary">ایجاد اکانت</button>
                    
                  </form>
                </div>
              </div>

                
            </div>
          </div>
        </div>


      </div>
    </div>
    

  
    <?php include "footer.php"; ?>


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

include "config.php"; // Ensure this file contains the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and validate form inputs
    $currencyCode = $_POST['currencyCode'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $network = $_POST['network'];
    $url = $_POST['url'];
    if($_POST['managed_personal'] == 'managed') {
      $managed_personal = 1 ; 
    }else{
      $managed_personal = 0 ;
    }

    // Check for validation errors
    if (!$email) {
        die("Invalid email format.");
    }
    if (!$url) {
        die("Invalid URL format.");
    }

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO accounts (currency, username, managed, email, user_id, method, website, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssissss", $currencyCode, $name, $managed_personal, $email, $id, $network, $url);


    if ($stmt->execute()) {

      $lastInsertedId = $conn->insert_id;

      $insert_website = "INSERT INTO user_websites (user_id, user_website, account_id) VALUES ( $id, '$url', $lastInsertedId)";
      if($conn->query($insert_website)){


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
                    window.location.href = 'google_accounts';
                }, 2000);
            });
        </script>";
      }else{
        echo "مشکلی پیش آمده";
      }
    } else {
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
                  window.location.href = 'google_accounts';
              }, 3000);
          });
      </script>";
    }




    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
