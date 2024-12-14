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
      <img src="images/logo.png" alt="loader" class="lds-ripple img-fluid">
    </div>

    <!-- شروع صفحه -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" >
      <!-- سایدبار --> 
       <?php
            include 'sidebar.php';  
            include '../config.php';  
        ?> 
      <div class="sidebarHolder"></div>
      <!-- کانتینر اصلی دیتا -->
      <div class="body-wrapper bg-light" >
        <!-- هدر بالای صفحه -->
        <?php
          // تعداد رکوردها در هر صفحه
          $limit = 10;
          $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
          $page = max($page, 1);
          $offset = ($page - 1) * $limit;

          // مقدار جستجو
          $search = isset($_GET['search']) ? $_GET['search'] : '';


          // شمارش کل رکوردها
          $total_query = "SELECT COUNT(*) as total FROM accounts";
          if (!empty($search)) {
              $total_query .= " WHERE cid LIKE '%$search%'"; // اضافه کردن شرط جستجو
          }
          $total_result = $conn->query($total_query);
          $total_row = $total_result->fetch_assoc();
          $total_accounts = $total_row['total'];

          // محاسبه تعداد کل صفحات
          $total_pages = ceil($total_accounts / $limit);

          // بازیابی رکوردها برای صفحه جاری
          $query = "SELECT * FROM accounts";
          if (!empty($search)) {
              $query .= " WHERE cid LIKE '%$search%'"; // اضافه کردن شرط جستجو
          }
          $query .= " ORDER BY id DESC LIMIT $limit OFFSET $offset";
          $result = $conn->query($query);
          $accounts = [];

          while ($row = $result->fetch_assoc()) {
              $accounts[] = $row;
          }

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
                        <i class="fa fa-ad text-primary fs-6 fs-md-6"></i>
                      </div>
                      <div>
                        <h6 class="mb-0 fs-4 fw-semibold">لیست کل اکانت های تبلیغاتی </h6>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="d-flex align-items-start">
                  
                    <a class="btn btn-light-info font-medium text-info px-2 rounded-pill cursor-pointer" data-bs-toggle="collapse" href="#filteringBox" role="button" aria-expanded="true" aria-controls="filteringBox">
                      <span class="d-md-inline d-none">فیلتر</span>
                      <i class="fa fa-filter"></i>
                    </a>
                  </div> -->
                

                  <form class="position-relative" action="" method="GET">
                      <input type="text" class="form-control search-chat py-2 ps-5 text-right" 
                      name="search" id="txtSearch" placeholder="جست و جو بر اساس cid">
                      <i class="fa fa-search position-absolute top-50  translate-middle-y fs-6 text-dark me-3" style="right:10px"></i>
                  </form>


                </div>
                <div class="collapse" id="filteringBox">
                  <div class=" border border-1 rounded p-3">
                    <div class="row">
                      <div class="col-md-3">
                      
              

                      </div>
                      <div class="col-md-3">
                        <div class="mb-2">
                          <select id="currencyCode" class="form-control form-select lgSelect" data-placeholder="نوع ارز" tabindex="1">
                            <option value="">همه ارزها</option>
                            <option value="USD">دلار</option>
                            <option value="AED">درهم</option>
                            <option value="TL">لیر</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12 mt-4 text-end">
                        <button id="btnExecFilter" type="button" class="d-inline-flex align-items-center justify-content-center btn btn-success btn-circle">
                          <i class="fs-5 ti ti-check"></i>
                        </button>
                        <button id="brnResetFilter" type="button" class="d-inline-flex align-items-center justify-content-center btn btn-danger btn-circle collapsed" data-bs-toggle="collapse" href="#filteringBox" role="button" aria-expanded="false" aria-controls="filteringBox">
                          <i class="fs-5 ti ti-x"></i>
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
                                    <p>یوزر آیدی : <?=get_name($account['user_id'])?></p>
                                    <p class="text-start mt-2">
                                        <button class="btn btn-sm btn-success icoAccordian text-white" data-bs-toggle="collapse" data-bs-target="#acc_<?= $account['id'] ?>" aria-expanded="false" aria-controls="acc_<?= $account['id'] ?>">
                                            <i class="fa fa-circle-arrow-down"></i> شارژ کنید
                                        </button>
                                   
                                    </p>
                                    <?php
                                      if(isset($this_word_has) AND $this_word_has == TRUE){
                                        ?>
                                        <p>
                                          سایت مورد نظر جزو لیست پر ریسک در گوگل ادز قراردارد : 6% افزایش
                                        </p>

                                      <?php
                                      }
                                    ?>


                                 
                                    <div style="display: flex; align-items: center; gap: 10px; flex-wrap: nowrap;">
                                      <h6 style="margin: 0;">وارد کردن CID:</h6>
                                      <?php if(isset($account['cid'])): ?>
                                        <form action="" method="POST" style="display: flex; align-items: center; gap: 10px; margin: 0;">
                                          <input type="hidden" name="id_account" value="<?= $account['id'] ?>">
                                          <input class="form-control" style="width: 200px;" value="<?= $account['cid'] ?>" readonly>
                                          <button name="delete_cid" class="btn btn-primary">حدف اکانت آیدی</button>
                                        </form>
                                      <?php else: ?>
                                          <form action="" method="POST" style="display: flex; align-items: center; gap: 10px; margin: 0;">
                                              <input type="hidden" name="id_account" value="<?= $account['id'] ?>">
                                              
                                              <input class="form-control" style="width: 200px;" name="give_cid" required>
                                              <button name="submit_cid" class="btn btn-primary">ثبت</button>
                                          </form>
                                      <?php endif; ?>
                                    </div>


                                
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
                                  } elseif ($account['currency'] == 'THB') {
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

            <!-- Pagination -->
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= max(1, $page - 1) ?>&search=<?= urlencode($search) ?>">قبلی</a>
                    </li>
                    
                    <?php for ($p = 1; $p <= $total_pages; $p++) : ?>
                        <li class="page-item <?= ($p == $page) ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $p ?>&search=<?= urlencode($search) ?>"><?= $p ?></a>
                        </li>
                    <?php endfor; ?>
                    
                    <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= min($total_pages, $page + 1) ?>&search=<?= urlencode($search) ?>">بعدی</a>
                    </li>
                </ul>
            </nav>



           
          </div>
        </div>






      </div>
    </div>
    

  
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

if(isset($_POST['submit_cid'])){
  $id_account = $_POST['id_account'];
  $give_cid = $_POST['give_cid'];
  $sql = "UPDATE accounts SET cid = '$give_cid' WHERE id = $id_account";
  $result = $conn->query($sql);

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
                delay: 1000
            }).toast('show');
            setTimeout(function(){
                window.location.href = 'google_accounts';
            }, 1000);
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
                  delay: 1000
              }).toast('show');
              setTimeout(function(){
                  window.location.href = 'google_accounts';
              }, 1000);
          });
      </script>";
  }

}

if(isset($_POST['delete_cid'])){
  $id_account = $_POST['id_account'];
  $sql = "UPDATE accounts SET cid = NULL WHERE id = $id_account";
  $result = $conn->query($sql);
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
                delay: 1000
            }).toast('show');
            setTimeout(function(){
                window.location.href = 'google_accounts';
            }, 1000);
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
                  delay: 1000
              }).toast('show');
              setTimeout(function(){
                  window.location.href = 'google_accounts';
              }, 1000);
          });
      </script>";
  }
}