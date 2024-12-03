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

    
    
        <div class="container border mt-3 rounded  mb-3">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/logo.png" alt="ادز برگ" height="100px" width="100px">

                </div>
                <div class="col-md-6" style="text-align: left;">
                    <?php if (isset($_POST['show_invoice'])):  ?>
                        <a id="back" class="btn btn-outline-primary btn-sm" href="invoices.php">بازگشت <i class="fa fa-arrow-left me-1"></i></a>
                    <?php
                        else: ?>
                        <a id="back" class="btn btn-outline-primary btn-sm" href="google_accounts.php">بازگشت <i class="fa fa-arrow-left me-1"></i></a>
                    <?php
                        endif; ?>
                </div>
            </div>

            <?php 
            if (isset($_POST['charge'])){
                // echo $_POST['id_account'];
                include "config.php";
                include "functions.php";
                include 'PersianCalendar.php';

                // 1
                if (isset($_POST['id_account'])){
                    $id_account = $_POST['id_account'];
                    $query = "SELECT * FROM `accounts` WHERE id = '$id_account'";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                    }
                }
              
                // 2
                if (isset($_POST['amount_charge']) && is_numeric($_POST['amount_charge']) && isset($_POST['total_amount'])) {
                    $amount_charge = floatval($_POST['amount_charge']);
                    $amount = floatval($_POST['total_amount']);

                    $stmt = $conn->prepare("INSERT INTO orders (user_id, amount, status, shenaseh, account_id, type, created_at) VALUES (?, ?, ?, ?, ?, 'charge', NOW())");
                    $random = generateRandomID(); 
                    $status = 2; 


                    $stmt->bind_param("isisi", $id, $amount, $status, $random, $id_account);
                    // Execute the statement
                    if ($stmt->execute()) {
                        $last_id = $conn->insert_id;
                        
                        // Prepare the SELECT query
                        $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ? AND user_id = ? AND status = ?");
                        $stmt->bind_param("iii", $last_id, $id, $status); 
                        $stmt->execute();
                        
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $last_row = $result->fetch_assoc();
                            $shenaseh = $last_row['shenaseh'];
                            $id_order =$last_row['id'];
                            $status =$last_row['status'];

                        } else {
                            echo "No records found.";
                        }
                    }
                    $stmt->close();

                // 3
                } elseif (isset($_POST['amount_service']) && $_POST['amount_service'] != '') {
                    $amount = "6/500/000" . " تومان";
                    $stmt = $conn->prepare("INSERT INTO orders (user_id, amount, status, shenaseh, type) VALUES (?, ?, ?, ?, 'sefaresh')");
                    $random = generateRandomID(); 
                    $status = 2; 
                    $stmt->bind_param("isis", $id, $amount, $status, $random);
                    // Execute the statement
                    if ($stmt->execute()) {
                        $last_id = $conn->insert_id;
                        
                        // Prepare the SELECT query
                        $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ? AND user_id = ? AND status = ?");
                        $stmt->bind_param("iii", $last_id, $id, $status); 
                        $stmt->execute();
                        
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $last_row = $result->fetch_assoc();
                            $shenaseh = $last_row['shenaseh'];
                            $cid = $last_row['account_id'];
                        } else {
                            echo "No records found.";
                        }
                    }
                    $stmt->close();
                }elseif(isset($_POST['show_invoice']) && $_POST['show_invoice'] != '') {
                    $idinvoice = $_POST['show_invoice'];
                    $sql1 = "SELECT * FROM payments WHERE order_id = $idinvoice";
                    $sql2 = "SELECT * FROM orders WHERE id = $idinvoice";
                    $result1= $conn->query($sql1);
                    if ($result1->num_rows > 0) {
                        $row1 = $result1->fetch_assoc();
                        $id_invoice = $row1['id'];
                        $id_order = $row1['order_id'];
                    }
                    $result2= $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                        $row2 = $result2->fetch_assoc();
                        $shenaseh = $row2['shenaseh'];
                        $amount = $row2['amount'];
                        $id_order =$row2['id'];
                        $account_id = $row2['account_id'];
                        $status =$row2['status'];

                        $this_acount = "SELECT * FROM accounts WHERE id = $account_id";
                        $acc_result = $conn->query($this_acount);
                        if ($acc_result->num_rows > 0) {
                            $acc_row = $acc_result->fetch_assoc();
                        }

                    }
                }

 
            ?>
        

        
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="page-header text-center">
                        <h2 class="page-title">صفحه اصلی</h2>
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">صفحه اصلی</a></li>
                            <li class="breadcrumb-item active">صفحه اصلی</li>
                        </ol>
                    </div>
                </div>
            </div>





            <div class="row mt-4 bg-light py-4">
                <div class="col-md-4 d-flex flex-column">
                    <p class="text-primary fs-4 mb-2">‌نام کاربر: <strong id="fullName"><?= isset($_POST['id_account']) ? get_name($row['user_id']) : get_name($id) ?></strong></p>

                    <p class="text-primary fs-4 mb-0">
                        نوع فاکتور: <strong id="isOfficialInvoice">فاکتور غیر رسمی</strong>
                    </p>
                </div>

                <div class="col-md-4 d-flex flex-column">
                    <p class="text-primary fs-4 mb-2">تاریخ ثبت: 
                    <strong id="insertDate">
                        <?php 
                        if (isset($row2['created_at'])) {
                            echo mds_date("l j F Y", strtotime($row2['created_at']), 0); 
                        } else {
                            echo mds_date("l j F Y ", time(), 0); 
                        }
                        ?>
                    </strong>

                    </p>
                    <p class="text-primary fs-4 mb-0">
                        وضعیت:
                            <?php
                            if(isset($row2['status'])){
                            echo ' <span class="badge text-white fw-bold bg-warning" id="invoiceState">';
                            if ($row2['status'] == 2) echo "در حالت پرداخت";
                            echo '</span>';
                            echo ' <span class="badge text-white fw-bold bg-success" id="invoiceState">';
                            if ($row2['status'] == 1) echo "پرداخت شده";
                            echo '</span>';
                            echo ' <span class="badge text-white fw-bold bg-danger" id="invoiceState">';
                            if ($row2['status'] == 0) echo "لغو سیستمی";
                            echo '</span>';
                            }else{
                                echo ' <span class="badge text-white fw-bold bg-warning" id="invoiceState">';
                                echo "در حالت پرداخت";
                                echo '</span>';
                            }

                            ?>
                       
                    </p>
                </div>
                <div class="col-md-4 d-flex flex-column">
                    <p class="text-primary fs-4 mb-0">
                        شناسه سفارش: <br> <strong class="fs-6 fw-boler" id="trackNo"><?= $shenaseh?></strong>
                    </p>
                </div>

                  <!-- -------------------------------- -->
                  <div class="col-md-4 d-flex flex-column mt-4">
                    <p class="text-primary fs-4 mb-0">
                        سفارش : <strong class="fs-6 fw-boler" id="trackNo">
                            <?php
                            if(isset($row2['type'])){
                                if($row2['type']== 'charge') echo "شارژ اکانت";
                            }
                            if(isset($_POST['amount_charge'])){
                                echo "شارژ اکانت";
                            }
                            ?>
                        </strong>
                    </p>
                </div>
                <div class="col-md-4 d-flex flex-column mt-4">
                    <p class="text-primary fs-4 mb-0">
                        آیدی اکانت : <strong class="fs-6 fw-boler" id="trackNo">
                            <?php
                                if(isset($acc_row['id'])){
                                    echo cidAccount($acc_row['id']);
                                }else{
                                     echo cidAccount($row['id']);
                                }
                            ?>
                        </strong>
                    </p>
                </div>
                <div class="col-md-4 d-flex flex-column mt-4">
                    <p class="text-primary fs-4 mb-0 ">
                        نوع اکانت : <strong class="fs-6 fw-boler border" id="trackNo">
                            <?php
                            if(isset($acc_row['managed'])){
                                if($acc_row['managed']== 1) echo "مدیریت شده";
                                else echo "اختصاصی";
                            }else{
                                if($row['managed']== 1) echo "مدیریت شده";
                                else echo "اختصاصی";
                            }
                           
                            ?>
                        </strong>
                    </p>
                </div>
                <!-- ------------------------------- -->

            </div>


            <hr>
            <div class="row justify-content-center">
                <div class="col-md-6" >

                    <?php
                        if(!isset($id_invoice) AND $status == 2){
                    ?>
                    <!-- Checkbox and Button to Open Modal -->
                    <div class="form-check form-check-inline align-items-center d-flex justify-content-center" id="condition">
                        <input id="termsAccept" class="form-check-input success" type="checkbox" style="width: 25px;height: 25px;margin-left: 10px;" onclick="showpardakht()">
                        <label class="fs-4 text-primary">
                            قوانین عمومی، پروموشن و عودت ادز برگ را می پذیرم. 
                            <span data-bs-toggle="modal" data-bs-target="#termsModal" class="btn btn-sm btn-outline-primary ms-2">
                                مشاهده قوانین
                            </span>
                        </label>
                    </div>
                    <?php
                        }else{
                            ?>
                              <p>جمع کل : <?= number_format($amount). " تومان" ?></p>
                              <?php
                                if($row2['status']== 1 ){
                                    echo "<span>پرداخت شده</span>";
                                }
                                if($row2['status']== 0) {
                                    echo "<span>لغو سیستمی </span>";
                                }
                              ?>

                        <?php
                        }
                    ?>

                    <!-- Modal for Terms and Conditions -->
                    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="termsModalLabel">قوانین و شرایط</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>شرایط و قوانین استفاده:</h6>
                                    <ul>
                                        <li>تمامی خدمات ادز برگ طبق قوانین و مقررات کشور ارائه می‌شود.</li>
                                        <li>کاربران باید از حساب کاربری خود محافظت کنند و اطلاعات شخصی خود را به اشتراک نگذارند.</li>
                                        <li>مدیران سرویس مسئولیتی در قبال خسارت‌های ناشی از استفاده غیرمجاز از حساب کاربری ندارند.</li>
                                        <li>سرویس‌ها و پروموشن‌ها تنها برای مدت محدود و طبق شرایط خاص ارائه می‌شوند.</li>
                                        <li>تمامی تراکنش‌ها مشمول شرایط بازگشت و عودت وجه هستند که در اینجا شرح داده شده است.</li>
                                    </ul>
                                    <h6>بازگشت وجه:</h6>
                                    <ul>
                                        <li>در صورتی که مشتری درخواست بازگشت وجه داشته باشد، باید دلایل معتبر ارائه دهد.</li>
                                        <li>بازگشت وجه تنها در صورت عدم استفاده از خدمات و پس از بررسی وضعیت امکان‌پذیر است.</li>
                                    </ul>
                                    <h6>پروموشن‌ها:</h6>
                                    <ul>
                                        <li>پروموشن‌ها تنها برای کاربرانی که شرایط ویژه را داشته باشند، معتبر است.</li>
                                        <li>تاریخ انقضای پروموشن‌ها مشخص شده است و پس از آن قابل استفاده نیستند.</li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="text-align: left;">
                    <div id="pardakhtmethod" style="display: none;">
                        <p>جمع کل : <?= number_format($amount) ." تومان"  ?></p> 
                        <?php
                        if(isset($id_invoice)){
                        ?>
                            <span>پرداخت شده</span>
                        <?php
                        }else{
                        ?>
                            <button class="btn btn-success btn" onclick="show_methods()">انتخاب روش پرداخت</button>
                        <?php
                        }
                        ?>
                    </div>
                </div>


                <div class="col-md-12 text-center" style="display: none;" id="methods">
                    <a class="btn btn-sm btn-outline-primary" data-bs-toggle="tab" href="#navpill-2"  aria-selected="false" tabindex="-1"  onclick="show_cart()">
                        <span>کارت به کارت</span>
                    </a>
                    <a class="btn btn-sm btn-outline-primary" >
                        <span>واریز به کیف پول آنلاین</span>
                    </a>

                    <br>
                    <br>
                    
                </div>
                
                

            </div>
            <hr>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row" id="cardtocard" style="display: none;">
                
                    <div class="col-md-6">
                        <label for="payCard_i_cardNumber">
                            شماره کارت واریز
                            کننده:
                        </label>
                        <input type="text" dir="ltr" class="form-control text-center" name="card_number" data-inputmask="'mask': '9999 9999 9999 9999'" placeholder="0000-0000-0000-0000" minlength="16" maxlength="16" autocomplete="off" id="payCard_i_cardNumber" 
                            dv="required"  required>
                    </div>  
                    <div class="col-md-6">
                        <label for="payCard_i_description">توضیحات تراکنش:</label>
                            <textarea name="explain" id="payCard_i_description" autocomplete="off" class="form-control" required>توضیحات پرداخت شامل کد پیگیری و....</textarea> 
                    </div>  
                    <div class="col-md-6">
                        اپلود فیش واریزی
                        <input type="file" class="form-control" name="fish" required>
                    </div> 
                    <div class="col-md-6" >
                    </div>  
                    <div class="col-md-6" style="text-align: left;">
                        <input type="hidden" name="id_order" value="<?=$id_order?>">
                    </div> 
                    <div class="col-md-6" style="text-align: left;">
                        <button name="submit" class="btn btn-success btn" data-bs-toggle="tab" href="" role="tab" aria-selected="false" tabindex="-1">
                            <span>پرداخت</span>
                        </button>
                    </div>         
                </div>
            </form>



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
    include 'config.php';

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
                    echo "<div id='successToast' class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-delay='3000' style='position: fixed; top: 20px; right: 20px; width: 300px; z-index: 1055;'>
                    <div class='toast-header bg-success text-white'>
                        <strong class='mr-auto'>Success</strong>
                    </div>
                    <div class='toast-body'>
                    پرداخت شما با موفقیت انجام شد!
                    </div>
                    </div>
                    <script>
                    $(document).ready(function(){
                        $('#successToast').toast({
                            autohide: true,
                            delay: 3000
                        }).toast('show');
                        setTimeout(function(){
                            window.location.href = 'payments';
                        }, 3000);
                    });
                </script>";
            } else {
                echo "خطا در پرداخت";
            }
        } else {
            echo "خطا در آپلود فایل";
        }
    } else {
        echo "مشکلی در آپلود فایل پیش آمده است.";
    }
}
