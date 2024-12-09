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


    
    <script type="text/javascript">
      !function(){var i="CPbbUM",a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/"+i,l=localStorage.getItem("goftino_"+i);g.async=!0,g.src=l?s+"?o="+l:s;d.getElementsByTagName("head")[0].appendChild(g);}"complete"===d.readyState?g():a.attachEvent?a.attachEvent("onload",g):a.addEventListener("load",g,!1);}();
    </script>


    <title>اکانت های من</title>
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
        ?> 
      <div class="sidebarHolder"></div>
      <!-- کانتینر اصلی دیتا -->
      <div class="body-wrapper bg-light" >
        <!-- هدر بالای صفحه -->
        <?php
        include "header.php";
        include "config.php";
        

        $query = "SELECT * FROM accounts WHERE user_id = $id ";

        if (!empty($_POST['search'])) {
          $search = $_POST['search'];
          $query .= " AND cid LIKE '%$search%'"; // شرط جستجو فقط برای CID
        }
        $query .= " ORDER BY id DESC"; // مرتب‌سازی
        
        $result = $conn->query($query);
        $accounts = [];

        while ($row = $result->fetch_assoc()) {
            $accounts[] = $row;
        }
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
                        <i class="fa fa-ad text-primary fs-6 fs-md-6"></i>
                      </div>
                      <div>
                        <h6 class="mb-0 fs-4 fw-semibold">لیست اکانت های تبلیغاتی </h6>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex align-items-start">
                    <a href="new_acount" class="btn btn-success mb-2 font-medium me-2 px-2 rounded-pill cursor-pointer" >
                      <span class="d-md-inline d-none">اکانت جدید</span>
                      <i class="fa fa-plus"></i>
                    </a>
                    <a class="btn btn-light-info font-medium text-info px-2 rounded-pill cursor-pointer" data-bs-toggle="collapse" href="#filteringBox" role="button" aria-expanded="true" aria-controls="filteringBox">
                      <span class="d-md-inline d-none">فیلتر</span>
                      <i class="fa fa-filter"></i>
                    </a>

                    <form class="position-relative" action="" method="POST">
                      <input type="text" class="form-control search-chat py-2 ps-5 text-right" 
                      name="search" id="txtSearch" placeholder="جست و جو بر اساس cid">
                      <i class="fa fa-search position-absolute top-50  translate-middle-y fs-6 text-dark me-3" style="right:10px"></i>
                    </form>

                  </div>
                </div>
                <div class="collapse" id="filteringBox">
                  <div class=" border border-1 rounded p-3">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-floating mb-2">
                          <input id="query" type="text" class="form-control" placeholder="جستجو‌" autocomplete="off">
                          <label>
                            <i class="fa fa-123 me-2 fs-4"></i>جستجو‌ </label>
                        </div>
                      </div>
                      <div class="col-md-3">
                      
                      </div>
                      <div class="col-12 mt-4 text-end">
                        <button id="btnExecFilter" type="button" class="d-inline-flex align-items-center justify-content-center btn btn-success btn-circle">
                          <i class="fs-5 fa fa-check"></i>
                        </button>
                        <button id="brnResetFilter" type="button" class="d-inline-flex align-items-center justify-content-center btn btn-danger btn-circle collapsed" data-bs-toggle="collapse" href="#filteringBox" role="button" aria-expanded="false" aria-controls="filteringBox">
                          <i class="fs-5 fa fa-x"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="d-flex justify-content-center">
                <button class="btn btn-outline-success mx-2" onclick="show_personal()">کارمزد اکانت اختصاصی</button>
                <button class="btn btn-outline-success mx-2" onclick="show_manage()">کارمزد اکانت مدیریت شده</button>
            </div>



            <div class="container" id="card_personal">
              <div class="row mt-2">
                <!-- دلار آمریکا -->
                <div class="col-md-3">
                  <div class="card shadow-sm border-0" style="background-color: #eafaf1; border-left: 5px solid #28a745;">
                    <div class="card-body">
                      <h5 class="card-title text-success fw-bold">کارمزد دلار آمریکا <img src="images/usd.jpg" alt="دلار" width="17px"></h5>
                      <ul class="list-unstyled text-dark">
                        <li>50 تا 99 دلار : 10 درصد</li>
                        <li>100 تا 199 دلار : 9 درصد</li>
                        <li>200 تا 299 دلار : 8 درصد</li>
                        <li>300 تا 499 دلار : 7.5 درصد</li>
                        <li>500 تا 749 دلار : 7 درصد</li>
                        <li>750 تا 999 دلار : 6.5 درصد</li>
                        <li>1000 دلار به بالا : 6 درصد</li>
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- درهم امارات -->
                <div class="col-md-3">
                  <div class="card shadow-sm border-0" style="background-color: #eafaf1; border-left: 5px solid #28a745;">
                    <div class="card-body">
                      <h5 class="card-title text-success fw-bold">کارمزد درهم امارات <img src="images/aed.png" alt="درهم" width="17px"></h5>
                      <ul class="list-unstyled text-dark">
                        <li>300 تا 499 : 10 درصد</li>
                        <li>500 تا 999 : 9 درصد</li>
                        <li>1000 تا 1999 : 8 درصد</li>
                        <li>2000 تا 3499 : 7 درصد</li>
                        <li>3500 به بالا : 6 درصد</li>
                      </ul>
                    </div>
                  </div>
                </div>
                
                <!-- بات تایلند -->
                <div class="col-md-3">
                  <div class="card shadow-sm border-0" style="background-color: #eafaf1; border-left: 5px solid #28a745;">
                    <div class="card-body">
                      <h5 class="card-title text-success fw-bold">کارمزد بات تایلند <img src="images/bat.jpg" alt="بات" width="17px"></h5>
                      <ul class="list-unstyled text-dark">
                        <li>2000 تا 3499 : 10 درصد</li>
                        <li>3500 تا 4999 : 9 درصد</li>
                        <li>5000 تا 7999 : 8.5 درصد</li>
                        <li>8000 تا 9999 : 8 درصد</li>
                        <li>10000 تا 19999 : 7.5 درصد</li>
                        <li>20000 به بالا : 6.5 درصد</li>
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- لیر ترکیه -->
                <div class="col-md-3">
                  <div class="card shadow-sm border-0" style="background-color: #eafaf1; border-left: 5px solid #28a745;">
                    <div class="card-body">
                      <h5 class="card-title text-success fw-bold">کارمزد لیر ترکیه <img src="images/tur.jpg" alt="لیر" width="20px"></h5>
                      <ul class="list-unstyled text-dark">
                        <li>500 تا 999 : 10 درصد</li>
                        <li>1000 تا 1999 : 9 درصد</li>
                        <li>2000 تا 2999 : 8.5 درصد</li>
                        <li>3000 تا 4999 : 8 درصد</li>
                        <li>5000 تا 9999 : 7.5 درصد</li>
                        <li>10000 به بالا : 6.5 درصد</li>
                      </ul>
                    </div>
                  </div>
                </div>

                
              </div>
            </div>

            <div class="container" id="card_manage" style="display: none;">
              <div class="row mt-2">
                <!-- دلار آمریکا -->
                <div class="col-md-3">
                  <div class="card shadow-sm border-0" style="background-color: #eafaf1; border-left: 5px solid #28a745;">
                    <div class="card-body">
                      <h5 class="card-title text-success fw-bold">کارمزد دلار آمریکا <img src="images/usd.jpg" alt="دلار" width="17px"></h5>
                      <ul class="list-unstyled text-dark">
                        <li>50 تا 99 دلار : 20 درصد</li>
                        <li>100 تا 199 دلار : 18 درصد</li>
                        <li>200 تا 299 دلار : 16 درصد</li>
                        <li>300 تا 499 دلار : 15 درصد</li>
                        <li>500 تا 749 دلار : 14 درصد</li>
                        <li>750 تا 999 دلار : 13 درصد</li>
                        <li>1000 دلار به بالا : 12 درصد</li>
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- درهم امارات -->
                <div class="col-md-3">
                  <div class="card shadow-sm border-0" style="background-color: #eafaf1; border-left: 5px solid #28a745;">
                    <div class="card-body">
                      <h5 class="card-title text-success fw-bold">کارمزد درهم امارات <img src="images/aed.png" alt="درهم" width="17px"></h5>
                      <ul class="list-unstyled text-dark">
                        <li>300 تا 499 : 20 درصد</li>
                        <li>500 تا 999 : 18 درصد</li>
                        <li>1000 تا 1999 : 16 درصد</li>
                        <li>2000 تا 3499 : 14 درصد</li>
                        <li>3500 به بالا : 12 درصد</li>
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- بات تایلند -->
                <div class="col-md-3">
                  <div class="card shadow-sm border-0" style="background-color: #eafaf1; border-left: 5px solid #28a745;">
                    <div class="card-body">
                      <h5 class="card-title text-success fw-bold">کارمزد بات تایلند <img src="images/bat.jpg" alt="بات" width="17px"></h5>
                      <ul class="list-unstyled text-dark">
                        <li>2000 تا 3499 : 20 درصد</li>
                        <li>3500 تا 4999 : 18 درصد</li>
                        <li>5000 تا 7999 : 17 درصد</li>
                        <li>8000 تا 9999 : 16 درصد</li>
                        <li>10000 تا 19999 : 15 درصد</li>
                        <li>20000 به بالا : 13 درصد</li>
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- لیر ترکیه -->
                <div class="col-md-3">
                  <div class="card shadow-sm border-0" style="background-color: #eafaf1; border-left: 5px solid #28a745;">
                    <div class="card-body">
                      <h5 class="card-title text-success fw-bold">کارمزد لیر ترکیه <img src="images/tur.jpg" alt="لیر" width="20px"></h5>
                      <ul class="list-unstyled text-dark">
                        <li>500 تا 999 : 20 درصد</li>
                        <li>1000 تا 1999 : 18 درصد</li>
                        <li>2000 تا 2999 : 17 درصد</li>
                        <li>3000 تا 4999 : 16 درصد</li>
                        <li>5000 تا 9999 : 15 درصد</li>
                        <li>10000 به بالا : 13 درصد</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <script>
              function show_personal(){
                document.getElementById('card_personal').style.display = 'block';
                document.getElementById('card_manage').style.display = 'none';
              }
              function show_manage(){
                document.getElementById('card_manage').style.display = 'block';
                document.getElementById('card_personal').style.display = 'none';
              }
            </script>

            
            <div class="row mt-2" id="accountsgoogle_g">
                <?php
                $count = 0;
                foreach ($accounts as $account) {
                    // Check if it's the start of a new row
                    if ($count % 3 == 0 && $count != 0) {
                        echo '</div><div class="row" id="accountsgoogle_g">';
                    }
                    ?>
                    <div class="accountGoogle_item col-12 col-md-12 mb-2" data-accounttype="0" data-id="<?= $account['id'] ?>" data-currencycode="<?= $account['currency'] ?>" data-customerid="">
                        <div class="card mb-0">
                            <div class="card-header text-end pb-2 cursor-pointer position-relative bg-white">
                                <div class="px-0 rounded-pill collapsed accBoxHed">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="campTypeBadge"> <?= $account['method'] ?> </span>
                                        </div>
                                        <div class="d-flex flex-row justify-content-end mb-1">
                                            <span class="accountGoogle_accountType badge bg-light-warning border rounded-5 border-primary text-primary flex-row fs-2 me-1">
                                                <i class="fa fa-shield-off"></i>
                                                <b>
                                                  <?php
                                                  if ($account['managed'] == 1) {
                                                      echo 'مدیریت شده';
                                                  } else {
                                                      echo 'اختصاصی';
                                                  }
                                                  ?>
                                                </b>
                                            </span>
                                            <span class="badge bg-primary border rounded-5 border-primary text-white flex-row fs-2 text-uppercase"><?= $account['currency'] ?></span>
                                        </div>
                                    </div>
                                    <p class="accountGoogle_name fw-bolder fs-7 mb-0" style="direction: ltr;"><?= $account['username'] ?></p>
                                    <p class="mb-1" style="direction:ltr">CID: <span><?=$account['cid'] ?? "هنوز آیدی ایجاد نشده" ?> </span></p>
                                    
                                    <p class="text-start mt-2">
                                        <button class="btn btn-sm btn-success icoAccordian text-white" data-bs-toggle="collapse" data-bs-target="#acc_<?= $account['id'] ?>" aria-expanded="false" aria-controls="acc_<?= $account['id'] ?>">
                                            <i class="fa fa-circle-arrow-down"></i> شارژ کنید
                                        </button>
                                   
                                    </p>
                                
                                </div>
                            </div>

                            <?php 
                         
                              $currencys = "SELECT * FROM currencys ORDER BY id DESC LIMIT 1";
                              $result_currency = $conn->query($currencys);
                              if ($result_currency->num_rows > 0) {
                                  $row_currency = $result_currency->fetch_assoc();

                                  if ($account['currency'] == 'USD') {
                                      $price = number_format(floatval($row_currency['dollar']) * 100);
                                  } elseif ($account['currency'] == 'AED') {
                                      $price = number_format(floatval($row_currency['derham']) * 100);
                                  } elseif ($account['currency'] == 'TRY') {
                                      $price = number_format(floatval($row_currency['lira']) * 100);
                                  } elseif ($account['currency'] == 'BHT') {
                                      $price = number_format(floatval($row_currency['bat']) * 100);
                                  }
                              }
                            ?>



                            <div class="card-body p-0 shadow-none">
                              <div class="collapse p-3" id="acc_<?= $account['id'] ?>">
                                  <form action="invoice.php" method="POST">
                                      <div class="form-floating mb-2">
                                          <input type="hidden" name="id_account" value="<?= $account['id'] ?>">
                                          <input type="hidden" name="total_amount" id="hidden_total_price_<?= $account['id'] ?>" value="0">
                                          <input 
                                            type="number" 
                                            name="amount_charge" 
                                            id="amount_charge_<?= $account['id'] ?>" 
                                            class="accountGoogle_amount form-control mb-2 text-end"  
                                            placeholder="عدد وارد کنید" 
                                            min="<?= $account['currency'] === 'USD' ? 50 : ($account['currency'] === 'BHT' ? 2000 : ($account['currency'] === 'TRY' ? 500 : ($account['currency'] === 'AED' ? 300 : 0))) ?>" 
                                            required>
                                          <label>
                                              <i class="fa fa-USD me-2 fs-5 text-primary fw-bolder"></i> 
                                              مقدار را وارد کنید
                                          </label>
                                      </div>
                                  
                                      <p class="form-control-feedback text text-center">
                                          قیمت حواله : 
                                          <span class="accountGoogle_currencyIranAmount" id="price_<?= $account['id'] ?>">
                                              <?= $price ?>
                                          </span>
                                      </p>
                                      <p class="form-control-feedback text text-center">
                                          کارمزد: 
                                          <span class="accountGoogle_currencyIranAmount text-danger fw-bolder" id="fee_<?= $account['id'] ?>">
                                              0
                                          </span>
                                      </p>
                                      <p class="accountGoogle_serviceCost_parent text-center">
                                          قابل پرداخت: 
                                          <span class="accountGoogle_serviceCost fw-bolder text-success fs-6" 
                                                id="total_price_<?= $account['id'] ?>">
                                              0
                                          </span>
                                      </p>
                                      <div class="text-center">
                                          <button class="accountGoogle_submit btn btn-primary" name="charge">
                                              شارژ کن <i class="fa fa-rocket"></i>
                                          </button>
                                      </div>
                                  </form>
                              </div>
                            </div>


                            <script>
                               document.addEventListener('DOMContentLoaded', () => {
                                  const account = <?= json_encode($account); ?>; // انتقال متغیر account از PHP به جاوااسکریپت
                                  const amountInput = document.getElementById('amount_charge_<?= $account['id'] ?>');
                                  const priceSpan = document.getElementById('price_<?= $account['id'] ?>');
                                  const totalPriceSpan = document.getElementById('total_price_<?= $account['id'] ?>');
                                  const feeSpan = document.getElementById('fee_<?= $account['id'] ?>');
                                  const hiddenTotalInput = document.getElementById('hidden_total_price_<?= $account['id'] ?>');

                                  const price = parseFloat(priceSpan.textContent.replace(/,/g, '')) || 0;

                                  amountInput.addEventListener('input', () => {
                                      const amount = parseFloat(amountInput.value) || 0;
                                      let total = price * amount;
                                      let feePercentage = 0;

                                        // اگر حساب مدیریت شده باشد، مبلغ کل را ضرب در 2 کنید
                                        if (account.managed == 1) {
                                          total *= 2;
                                        }

                                      // اضافه کردن منطق برای محاسبه کارمزد بر اساس ارز و مقدار وارد شده
                                      if (account.currency === 'USD') {
                                          if (amount >= 50 && amount < 100) {
                                              feePercentage = 10;
                                          } else if (amount >= 100 && amount < 200) {
                                              feePercentage = 9;
                                          } else if (amount >= 200 && amount < 300) {
                                              feePercentage = 8;
                                          } else if (amount >= 300 && amount < 500) {
                                              feePercentage = 7.5;
                                          } else if (amount >= 500 && amount < 750) {
                                              feePercentage = 7;
                                          } else if (amount >= 750 && amount < 1000) {
                                              feePercentage = 6.5;
                                          } else if (amount >= 1000) {
                                              feePercentage = 6;
                                          }
                                      } else if (account.currency === 'BHT') {
                                          if (amount >= 2000 && amount < 3500) {
                                              feePercentage = 10;
                                          } else if (amount >= 3500 && amount < 5000) {
                                              feePercentage = 9;
                                          } else if (amount >= 5000 && amount < 8000) {
                                              feePercentage = 8.5;
                                          } else if (amount >= 8000 && amount < 10000) {
                                              feePercentage = 8;
                                          } else if (amount >= 10000 && amount < 20000) {
                                              feePercentage = 7.5;
                                          } else if (amount >= 20000) {
                                              feePercentage = 6.5;
                                          }
                                      } else if (account.currency === 'TRY') {
                                          if (amount >= 500 && amount < 1000) {
                                              feePercentage = 10;
                                          } else if (amount >= 1000 && amount < 2000) {
                                              feePercentage = 9;
                                          } else if (amount >= 2000 && amount < 3000) {
                                              feePercentage = 8.5;
                                          } else if (amount >= 3000 && amount < 5000) {
                                              feePercentage = 8;
                                          } else if (amount >= 5000 && amount < 10000) {
                                              feePercentage = 7.5;
                                          } else if (amount >= 10000) {
                                              feePercentage = 6.5;
                                          }
                                      } else if (account.currency === 'AED') {
                                          if (amount >= 300 && amount < 500) {
                                              feePercentage = 10;
                                          } else if (amount >= 500 && amount < 1000) {
                                              feePercentage = 9;
                                          } else if (amount >= 1000 && amount < 2000) {
                                              feePercentage = 8;
                                          } else if (amount >= 2000 && amount < 3500) {
                                              feePercentage = 7;
                                          } else if (amount >= 3500) {
                                              feePercentage = 6;
                                          }
                                      }

                                    

                                      // محاسبه مبلغ کارمزد
                                      const feeAmount = (total * feePercentage) / 100;
                                      const finalAmount = total + feeAmount;

                                      // به‌روزرسانی مقادیر در صفحه
                                      feeSpan.textContent = feeAmount.toLocaleString('en-US');
                                      totalPriceSpan.textContent = finalAmount.toLocaleString('en-US');
                                      hiddenTotalInput.value = finalAmount; // ذخیره مبلغ نهایی در فیلد مخفی
                                  });
                              });

                            </script>




                        </div>
                    </div>
                    <?php
                    $count++;
                }
                ?>
            </div>
           
          </div>
        </div>






      </div>
    </div>
    

        <div class="contact-circle" onclick="toggleIcons()">
            <img src="https://cdn-icons-png.flaticon.com/512/724/724664.png" alt="تماس">
        </div>

        <div class="social-icons" id="socialIcons">
            <a href="https://wa.me/1234567890" class="whatsapp" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/2111/2111728.png" alt="واتساپ">
            </a>
            <a href="https://t.me/yourtelegram" class="telegram" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/2111/2111646.png" alt="تلگرام">
            </a>
        </div>
        
        <script>
            function toggleIcons() {
                const icons = document.getElementById('socialIcons');
                icons.style.display = icons.style.display === 'flex' ? 'none' : 'flex';
            }
        </script>
  
    <?php include "footer.php"; ?>


    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="js/app.min.js"></script>
    <script src="js/app.init.js"></script>
    <script src="js/jalali.js"></script>
    <script src="js/sidebarmenu.js"></script>


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