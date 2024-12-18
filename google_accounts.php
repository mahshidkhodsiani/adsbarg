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

if($admin == 1){
  header("Location: logout_proccess.php");
  exit(); 
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
    <link rel="shortcut icon" type="image/png" href="images/logo.png">


    
    <script type="text/javascript">
      !function(){var i="CPbbUM",a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/"+i,l=localStorage.getItem("goftino_"+i);g.async=!0,g.src=l?s+"?o="+l:s;d.getElementsByTagName("head")[0].appendChild(g);}"complete"===d.readyState?g():a.attachEvent?a.attachEvent("onload",g):a.addEventListener("load",g,!1);}();
    </script>


    <title>اکانت های من</title>
    <style>
      
      body {
        /* font-family: "tahoma" !important; */
        font-family: 'Yekan', sans-serif;
        font-weight: bold !important;
        /* font-family: "g" !important; */
      }
      /* Reset padding and margin for the body */
      body, html {
          margin: 0 !important;
          padding: 0 !important;
          overflow-x: hidden !important; /* Prevents horizontal scrolling */
      }

      @font-face {
          font-family: 'Yekan';
          src: url('yekan/Yekan.woff2') format('woff2'),
              url('yekan/Yekan.woff') format('woff'),
              url('yekan/Yekan.ttf') format('truetype');
          font-weight: bold !important;
          font-style:normal
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



            
            <div class="row mt-2" id="accountsgoogle_g">
                <?php
                $count = 0;
                $webs = [];
                $this_word_has = 0;
                foreach ($accounts as $account) {
                    // Check if it's the start of a new row
                    if ($count % 3 == 0 && $count != 0) {
                        echo '</div><div class="row" id="accountsgoogle_g">';
                    }
                    $id1 = $account['id'] ;
                    $website_find = "SELECT * FROM robot_words WHERE account_id =$id1";
                    $website_result = $conn->query($website_find);
                    if($website_result->num_rows > 0) {
                      while($website_rows = $website_result->fetch_assoc()){
                        $webs[]= $website_rows["account_id"];
                      }
                    
                    }

                    if (in_array($account['id'], $webs)) {
                      $this_word_has = TRUE ;
                    }else{
                      $this_word_has = FALSE ;
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
                                    <?php
                                      if(isset($this_word_has) AND $this_word_has == 1){
                                        ?>
                                        <p>
                                          سایت مورد نظر جزو لیست پر ریسک در گوگل ادز قراردارد : 6% افزایش
                                        </p>

                                      <?php
                                      }
                                    ?>
                                    
                                
                                </div>
                            </div>

                            <?php 
                         
                              // $currencys = "SELECT * FROM currencys ORDER BY id DESC LIMIT 1";
                              // $result_currency = $conn->query($currencys);
                              // if ($result_currency->num_rows > 0) {
                              //     $row_currency = $result_currency->fetch_assoc();

                              //     if ($account['currency'] == 'USD') {
                              //         $price = number_format(floatval($row_currency['dollar']) * 100);
                              //     } elseif ($account['currency'] == 'AED') {
                              //         $price = number_format(floatval($row_currency['derham']) * 100);
                              //     } elseif ($account['currency'] == 'TRY') {
                              //         $price = number_format(floatval($row_currency['lira']) * 100);
                              //     } elseif ($account['currency'] == 'THB') {
                              //         $price = number_format(floatval($row_currency['bat']) * 100);
                              //     }
                              // }

                              
                          
                              
                              $ch = curl_init("https://api.ratebox.ir/apijson.php?token=6396cded07a5df6ff6979e013db38535");
                
                              // Set cURL options
                              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects if any
                              
                              // Execute the cURL request
                              $jsonData = curl_exec($ch);
                              
                              // Check if there was an error during the request
                              if (curl_errno($ch)) {
                                  die("cURL error: " . curl_error($ch));
                              }
                              
                              // Check if the response is empty
                              if (empty($jsonData)) {
                                  die("No data returned from the API.");
                              }
                              
                              // Decode the JSON response
                              $data = json_decode($jsonData, true);
                              
                              // Check if decoding was successful
                              if ($data === null) {
                                  die("Error decoding JSON: " . json_last_error_msg());
                              }
                              

                              $row_currency = [];


                              $row_currency = [];

                              // کلیدهای مربوط به ارزهای موردنظر
                              $currencies = ["usd", "aed", "try", "thb"];

                              // پیمایش داده‌ها و استخراج قیمت‌ها
                              foreach ($data as $key => $value) {
                                  // بررسی اینکه مقدار فعلی یک آرایه است و ارز درخواستی را بررسی می‌کنیم
                                  if (is_array($value) && isset($value['slug']) && in_array($value['slug'], $currencies)) {
                                      $price = (float)$value['h']; // قیمت ارز

                                      // برای هر ارز، قیمت جدید با درصد موردنظر محاسبه می‌شود
                                      if ($value['slug'] == 'usd') {
                                          $row_currency['dollar'] = $price + ($price * 0.04); // افزایش 4 درصدی
                                          $row_currency['updated'] = $value['updated_at'];
                                      } elseif ($value['slug'] == 'aed') {
                                          $row_currency['derham'] = $price + ($price * 0.07); // افزایش 7 درصدی
                                          $row_currency['updated'] = $value['updated_at'];
                                      } elseif ($value['slug'] == 'try') {
                                          $row_currency['lira'] = $price + ($price * 0.07); // افزایش 7 درصدی
                                          $row_currency['updated'] = $value['updated_at'];
                                      } elseif ($value['slug'] == 'thb') {
                                          $row_currency['bat'] = $price + ($price * 0.11); // افزایش 11 درصدی
                                          $row_currency['updated'] = $value['updated_at'];
                                      }
                                  }
                              }

                              // پس از دریافت قیمت‌ها، می‌توانید بر اساس ارز حساب کاربر قیمت را محاسبه کنید
                              if ($account['currency'] == 'USD') {
                                  $price = number_format(floatval($row_currency['dollar']) * 100);
                              } elseif ($account['currency'] == 'AED') {
                                  $price = number_format(floatval($row_currency['derham']) * 100);
                              } elseif ($account['currency'] == 'TRY') {
                                  $price = number_format(floatval($row_currency['lira']) * 100);
                              } elseif ($account['currency'] == 'THB') {
                                  $price = number_format(floatval($row_currency['bat']) * 100);
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
                                            min="<?= $account['currency'] === 'USD' ? 50 : ($account['currency'] === 'THB' ? 2000 : ($account['currency'] === 'TRY' ? 500 : ($account['currency'] === 'AED' ? 300 : 0))) ?>" 
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
                                  const isHighRisk = <?= json_encode($this_word_has); ?>; // وضعیت پر ریسک بودن

                                 
                                  amountInput.addEventListener('input', () => {
                                    const amount = parseFloat(amountInput.value) || 0;
                                    let total = price * amount;
                                    let feePercentage = 0;

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
                                    } else if (account.currency === 'THB') {
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

                                    // اگر حساب مدیریت‌شده است، کارمزد اضافی اضافه کنید
                                    let managedFeePercentage = 0;
                                    if (account.managed == 1) {
                                        managedFeePercentage = feePercentage; // کارمزد اضافی برابر با مقدار فعلی است
                                    }

                                    // اضافه کردن 6٪ اگر سایت جزو پر ریسک باشد
                                    if (isHighRisk) {
                                        total *= 1.06;
                                    }

                                    // محاسبه مبلغ کارمزد
                                    const feeAmount = (total * feePercentage) / 100;
                                    const managedFeeAmount = (total * managedFeePercentage) / 100;
                                    const finalAmount = total + feeAmount + managedFeeAmount;

                                    // به‌روزرسانی مقادیر در صفحه
                                    if (managedFeePercentage > 0) {
                                        feeSpan.textContent = `${feePercentage}% کارمزد شارژ + ${managedFeePercentage}% کارمزد مدیریت`;
                                    } else {
                                        feeSpan.textContent = `${feePercentage}% کارمزد شارژ`;
                                    }

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
            <a href="https://wa.me/989120469460" class="whatsapp" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/2111/2111728.png" alt="واتساپ">
            </a>
            <a href="https://t.me/adsbargsupports" class="telegram" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/2111/2111646.png" alt="تلگرام">
            </a>
            <a href="https://wa.me/989120469465" class="whatsapp" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/2111/2111728.png" alt="واتساپ">
            </a>
            <a href="https://t.me/adsbargsupport" class="telegram" target="_blank">
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