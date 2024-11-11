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

    


    <title>صفحه اصلی</title>
    <style>
      body {
        font-family: "g", 'sans-serif' !important;
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
                    <a id="back" class="btn btn-outline-primary btn-sm" href="google_accounts.php">بازگشت <i class="fa fa-arrow-left me-1"></i></a>
                </div>
            </div>

            <?php 
            if (isset($_POST['id_account'])){
                // echo $_POST['id_account'];
                include "config.php";
                include "functions.php";
                include 'PersianCalendar.php';

                $id_account = $_POST['id_account'];
                $query = "SELECT * FROM `accounts` WHERE id = '$id_account'";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
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
                    <p class="text-primary fs-4 mb-2">‌نام کاربر: <strong id="fullName"><?=get_name($row['user_id'])?></strong></p>
                    <p class="text-primary fs-4 mb-0">
                        نوع فاکتور: <strong id="isOfficialInvoice">فاکتور غیر رسمی</strong>
                    </p>
                </div>

                <div class="col-md-4 d-flex flex-column">
                    <p class="text-primary fs-4 mb-2">تاریخ ثبت: <strong id="insertDate"><?php echo mds_date("l j F Y ", time(), 0); ?></strong></p>
                    <p class="text-primary fs-4 mb-0">
                        وضعیت: <span class="badge text-white fw-bold bg-info" id="invoiceState">در انتظار پرداخت</span>
                    </p>
                </div>
                <div class="col-md-4 d-flex flex-column">
                    <p class="text-primary fs-4 mb-0">
                        شناسه سفارش: <br> <strong class="fs-6 fw-boler" id="trackNo">G1-12065-8-87194</strong>
                    </p>
                </div>
            </div>


            <hr>
            <div class="row justify-content-center">
                <div class="col-md-6" >

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
                        <p>جمع کل : 1/200/000</p>
                        <button class="btn btn-success btn" onclick="show_methods()">انتخاب روش پرداخت</button>
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

            <form>
                <div class="row" id="cardtocard" style="display: none;">
                
                    <div class="col-md-6">
                        <label for="payCard_i_cardNumber">
                            شماره کارت واریز
                            کننده:
                        </label>
                        <input type="text" dir="ltr" class="form-control text-center" name="title" data-inputmask="'mask': '9999 9999 9999 9999'" placeholder="0000-0000-0000-0000" minlength="19" maxlength="19" autocomplete="off" id="payCard_i_cardNumber" dv="required" aria-label="payCard_i_cardNumber" aria-describedby="payCard_i_cardNumber">
                    </div>  
                    <div class="col-md-6">
                        <label for="payCard_i_description">توضیحات تراکنش:</label>
                            <textarea name="title" id="payCard_i_description" autocomplete="off" class="form-control">توضیحات پرداخت شامل کد پیگیری و....</textarea> 
                    </div>  
                    <div class="col-md-6">
                        اپلود فیش واریزی
                        <input type="file" class="form-control">
                    </div> 
                    <div class="col-md-6" >
                    </div>  
                    <div class="col-md-6" style="text-align: left;">
                    </div> 
                    <div class="col-md-6" style="text-align: left;">
                        <a class="btn btn-success btn" data-bs-toggle="tab" href="#navpill-2" role="tab" aria-selected="false" tabindex="-1">
                            <span>پرداخت</span>
                        </a>
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

