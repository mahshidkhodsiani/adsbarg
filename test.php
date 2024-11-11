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

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2 class="page-title">فاکتور</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">فاکتور</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Invoice Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>فاکتور شماره: #12345</h4>
                    <p>تاریخ: 12/11/2024</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>مشتری:</h5>
                            <p>نام: علی احمدی</p>
                            <p>آدرس: تهران، ایران</p>
                            <p>تلفن: 09123456789</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <h5>فروشنده:</h5>
                            <p>نام: شرکت فناوری</p>
                            <p>آدرس: تهران، ایران</p>
                            <p>تلفن: 02112345678</p>
                        </div>
                    </div>

                    <!-- Table of Items -->
                    <h5 class="mt-4">جزئیات کالاها:</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام کالا</th>
                                <th>تعداد</th>
                                <th>قیمت واحد</th>
                                <th>مجموع</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>کامپیوتر</td>
                                <td>1</td>
                                <td>500,000 تومان</td>
                                <td>500,000 تومان</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>پرینتر</td>
                                <td>2</td>
                                <td>150,000 تومان</td>
                                <td>300,000 تومان</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Total Amount -->
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>مجموع کل: </strong>800,000 تومان</p>
                            <p><strong>مالیات (9%): </strong>72,000 تومان</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <h4><strong>مبلغ قابل پرداخت: </strong>872,000 تومان</h4>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <p>با تشکر از خرید شما!</p>
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

if(isset($_POST['charge'])){
  echo "<h1>". $_POST['id_account'] ."</h1>";
}