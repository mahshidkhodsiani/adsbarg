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

            <div class="row" id="accountsgoogle_g">
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
                                    <p>یوزر آیدی : <?=get_name($account['user_id'])?></p>
                                    <p class="text-start mt-2">
                                        <button class="btn btn-sm btn-success icoAccordian text-white" data-bs-toggle="collapse" data-bs-target="#acc_<?= $account['id'] ?>" aria-expanded="false" aria-controls="acc_<?= $account['id'] ?>">
                                            <i class="fa fa-circle-arrow-down"></i> شارژ کنید
                                        </button>
                                   
                                    </p>
                                    <?php
                                    // echo $row['cid'];
                                    ?>
                                    <div style="display: flex; align-items: center; gap: 10px; flex-wrap: nowrap;">
                                      <h6 style="margin: 0;">وارد کردن CID:</h6>
                                      <?php if(isset($account['cid'])): ?>
                                          <input class="form-control" style="width: 200px;" value="<?= $account['cid'] ?>" readonly>
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

                              if($account['currency'] == 'USD'){
                                $price = floatval($row_currency['dollar']) * 100 + 9000;
                              }elseif($account['currency'] == 'AED'){
                                $price = floatval($row_currency['derham']) * 100 + 9000;
                              }elseif($account['currency'] == 'TL'){
                                $price = floatval($row_currency['lira']) * 100 + 9000;
                              }elseif($account['currency'] == 'bat'){
                                $price = floatval($row_currency['bat']) * 100 + 9000;
                              }
                            
                              

                            }
                            ?>



                            <div class="card-body p-0 shadow-none">
                                <div class="collapse p-3" id="acc_<?= $account['id'] ?>">
                                    <form action="invoice.php" method="POST">
                                        <div class="form-floating mb-2">
                                            <input type="hidden" name="id_account" value="<?= $account['id'] ?>">
                                            <input type="hidden" name="total_amount" id="hidden_total_price_<?= $account['id'] ?>" value="0"> <!-- Hidden input to send the total amount -->
                                            <input type="text" name="amount_charge" id="amount_charge_<?= $account['id'] ?>" 
                                                  class="accountGoogle_amount form-control mb-2 text-end" 
                                                  placeholder="عدد وارد کنید" required>
                                            <label>
                                                <i class="fa fa-USD me-2 fs-5 text-primary fw-bolder"></i> 
                                                 مقدار را وارد کنید
                                            </label>
                                        </div>
                                        <p class="form-control-feedback text text-center">
                                            قیمت ارز با کارمزد: 
                                            <span class="accountGoogle_currencyIranAmount" id="price_<?= $account['id'] ?>">
                                                <?= $price ?>
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
                                    // Select the input and display elements
                                    const amountInput = document.getElementById('amount_charge_<?= $account['id'] ?>');
                                    const priceSpan = document.getElementById('price_<?= $account['id'] ?>');
                                    const totalPriceSpan = document.getElementById('total_price_<?= $account['id'] ?>');
                                    const hiddenTotalInput = document.getElementById('hidden_total_price_<?= $account['id'] ?>');

                                    // Parse the price as a number
                                    const price = parseFloat(priceSpan.textContent.replace(/,/g, '')) || 0;

                                    // Add event listener to update the total price dynamically
                                    amountInput.addEventListener('input', () => {
                                        const amount = parseFloat(amountInput.value) || 0; // Get the input value, default to 0
                                        const total = price * amount; // Calculate the total
                                        totalPriceSpan.textContent = total.toLocaleString('en-US'); // Update the total price display
                                        hiddenTotalInput.value = total; // Set the value of the hidden input
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
                delay: 3000
            }).toast('show');
            setTimeout(function(){
                window.location.href = 'google_accounts';
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
                  window.location.href = 'google_accounts';
              }, 3000);
          });
      </script>";
  }

}