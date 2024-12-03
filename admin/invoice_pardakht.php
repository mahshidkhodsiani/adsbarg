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
    <link rel="shortcut icon" type="image/png" href="../images/logo.png">

    


    <title>صفحه اصلی</title>
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
      <img src="../images/logo.png" alt="loader" class="lds-ripple img-fluid">
    </div>

    
    
        <div class="container border mt-3 rounded  mb-3">
            <div class="row">
                <div class="col-md-6">
                    <img src="../images/logo.png" alt="ادز برگ" height="100px" width="100px">

                </div>
                <div class="col-md-6" style="text-align: left;">
                    <a id="back" class="btn btn-outline-primary btn-sm" href="payments.php">بازگشت <i class="fa fa-arrow-left me-1"></i></a>
                </div>
            </div>

            <?php 
            if (isset($_POST['charge'])){
                // echo $_POST['id_account'];
                $id_payments = $_POST['show_invoice'];
                // echo "<script>alert('$show_invoice');</script>";
                include "../config.php";
                include "../functions.php";
                include '../PersianCalendar.php';

                $sql = "SELECT payments.*, orders.user_id, orders.* 
                FROM payments 
                LEFT JOIN orders ON payments.order_id = orders.id
                WHERE payments.id = '$id_payments'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $account_id = $row['account_id'];


                if($_POST['type_account'] == 'charge'){
                   // مشخصات اکانت
                    $acount = "SELECT * from accounts where id =$account_id";
                    $account = $conn->query($acount);
                    $acc = $account->fetch_assoc(); 
                }
                

 
            ?>
        

        
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="page-header text-center">
                        <h2 class="page-title">فاکتور پرداخت</h2>
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">صفحه اصلی</a></li>
                            <li class="breadcrumb-item active">صفحه اصلی</li>
                        </ol>
                    </div>
                </div>
            </div>





            <div class="row mt-4 bg-light py-4">
                <div class="col-md-4 d-flex flex-column">
                    <p class="text-primary fs-4 mb-2">‌نام کاربر: <strong id="fullName"><?= isset($acc['user_id']) ? get_name($acc['user_id']): get_name($row['user_id'])  ?></strong></p>

                    <p class="text-primary fs-4 mb-0">
                        نوع فاکتور: <strong id="isOfficialInvoice">فاکتور غیر رسمی</strong>
                    </p>
                </div>

                <div class="col-md-4 d-flex flex-column">
                    <p class="text-primary fs-4 mb-2">تاریخ ثبت: 
                        <strong id="insertDate">
                            <?php 
                            if (isset($row['created_at'])) {
                                echo mds_date("l j F Y", strtotime($row['created_at']), 0); 
                            } else {
                                echo mds_date("l j F Y ", time(), 0); 
                            }
                            ?>
                        </strong>
                    </p>
                    <p class="text-primary fs-4 mb-0">
                        وضعیت:
                            <?php
                            if($row['confirm'] == 1) echo "<span class='badge text-white fw-bold bg-success' >تایید شده</span>";
                            elseif($row['confirm'] == 0) echo "<span class='badge text-white fw-bold bg-warning' >منتظر تایید</span>";
                            ?>
                        
                    </p>
                </div>
                <div class="col-md-4 d-flex flex-column">
                    <p class="text-primary fs-4 mb-0">
                        شناسه سفارش: <br> <strong class="fs-6 fw-boler" id="trackNo"><?= $row['shenaseh']?></strong>
                    </p>
                </div>


                <!-- -------------------------------- -->
                <div class="col-md-4 d-flex flex-column mt-4">
                    <p class="text-primary fs-4 mb-0">
                        سفارش : <strong class="fs-6 fw-boler" id="trackNo">
                            <?php
                            if($row['type']== 'charge') echo "شارژ اکانت";
                            if($row['type']== 'click') echo "ابزار کلیک فیک";
                            ?>
                        </strong>
                    </p>
                </div>
                <div class="col-md-4 d-flex flex-column mt-4">
                    <p class="text-primary fs-4 mb-0">
                        <?php
                        if($_POST['type_account'] == 'charge'){
                        ?>

                            آیدی اکانت : <strong class="fs-6 fw-boler" id="trackNo"><?= cidAccount($row['account_id'])?></strong>
                        
                        <?php
                        }
                        ?>
                    </p>
                </div>
                <div class="col-md-4 d-flex flex-column mt-4">
                    <p class="text-primary fs-4 mb-0 ">
                    <?php
                    if($_POST['type_account'] == 'charge'){
                    ?>
                        نوع اکانت : <strong class="fs-6 fw-boler border" id="trackNo">
                            <?php
                            if($acc['managed']== 1) echo "مدیریت شده";
                            else echo "اختصاصی"
                            ?>
                        </strong>
                    <?php
                    }
                    ?>
                    </p>
                </div>
            </div>
            

         


            <hr>
          



            <?php
                }else{
                    echo "<h1>اکانتی را انتخاب نکردید </h1> " ;
                }
            ?>

    


        </div>

    
    

  
    <?php include "footer.php"; ?>


    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="js/app.min.js"></script>
    <script src="js/app.init.js"></script>
    <script src="js/jalali.js"></script>
    <script src="js/sidebarmenu.js"></script>


    <script src="js/javascripts.js"></script>

    <script>
        function showpardakht(){
            document.getElementById("pardakhtmethod").style.display = "block";
        }

        function show_methods(){
           document.getElementById("methods").style.display = "block"; 
        }

        function show_cart(){
            document.getElementById("cardtocard").style.display = "";
        }
    </script>

    

    <jdp-container style="z-index: 1000;"></jdp-container>
    <jdp-overlay style="z-index: 999;"></jdp-overlay>
  </body>
  </body>
</html>

<?php

if (isset($_POST['submit'])) {
    // include 'config.php';

    $idOrder = $_POST['id_order'];
    $cardNumber = $_POST['card_number'];
    $explain = $_POST['explain'];
    $fish = $_FILES['fish'];

    // Check if the file is uploaded
    if ($fish['error'] === UPLOAD_ERR_OK) {
        // Define the target directory and file name
        $targetDir = "uploads/infos/";
        $targetFile = $targetDir . basename($fish['name']);
        
        // Move the uploaded file to the target directory
        if (move_uploaded_file($fish['tmp_name'], $targetFile)) {
            // Insert the data into the database, saving the file path
            $sql_insert = "INSERT INTO payments (order_id, card_number, explains, fish, pardakht) 
                           VALUES ('$idOrder', '$cardNumber', '$explain', '$targetFile', 1)";
            
            $result = $conn->query($sql_insert);

            if ($result) {
                $update = "UPDATE orders SET status = 1 WHERE id = '$idOrder'";
                
                if ($conn->query($update)) 
                    echo "پرداخت شما با موفقیت انجام شد";
            } else {
                echo "خطا در پرداخ��ت";
            }
        } else {
            echo "خطا در آپلود فایل";
        }
    } else {
        echo "مشکلی در آپلود فایل پیش آمده است.";
    }
}
