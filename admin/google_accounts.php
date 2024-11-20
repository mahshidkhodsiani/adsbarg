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
        // Define how many accounts per page
        $limit = 9; // Adjust the number of accounts per page
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Get the current page
        $page = max($page, 1); // Ensure page number is at least 1
        $offset = ($page - 1) * $limit; // Calculate offset for SQL query

        // Get total accounts count
        $total_query = "SELECT COUNT(*) as total FROM accounts";
        $total_result = $conn->query($total_query);
        $total_row = $total_result->fetch_assoc();
        $total_accounts = $total_row['total'];

        // Calculate total pages
        $total_pages = ceil($total_accounts / $limit);

        // Fetch accounts for the current page
        $query = "SELECT * FROM accounts LIMIT $limit OFFSET $offset";
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
                        <h6 class="mb-0 fs-4 fw-semibold">لیست اکانت های تبلیغاتی </h6>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="d-flex align-items-start">
                  
                    <a class="btn btn-light-info font-medium text-info px-2 rounded-pill cursor-pointer" data-bs-toggle="collapse" href="#filteringBox" role="button" aria-expanded="true" aria-controls="filteringBox">
                      <span class="d-md-inline d-none">فیلتر</span>
                      <i class="fa fa-filter"></i>
                    </a>
                  </div> -->
                  <form class="position-relative">
                    <input type="text" class="form-control search-chat py-2 ps-5 text-right" id="txtSearch" placeholder="جست و جو">
                    <i class="fa fa-search position-absolute top-50  translate-middle-y fs-6 text-dark me-3" style="right:10px"></i>
                  </form>
                </div>
                <div class="collapse" id="filteringBox">
                  <div class=" border border-1 rounded p-3">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-floating mb-2">
                          <input id="query" type="text" class="form-control" placeholder="جستجو‌" autocomplete="off">
                          <label>
                            <i class="ti ti-123 me-2 fs-4"></i>جستجو‌ </label>
                        </div>
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
                    <div class="accountGoogle_item col-12 col-md-4 mb-2" data-accounttype="0" data-id="<?= $account['id'] ?>" data-currencycode="<?= $account['currency'] ?>" data-customerid="">
                        <div class="card mb-0">
                            <div class="card-header text-end pb-2 cursor-pointer position-relative bg-white">
                                <!-- Card content -->
                                <div class="px-0 rounded-pill collapsed accBoxHed">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="campTypeBadge"> <?= $account['method'] ?> </span>
                                        </div>
                                        <div class="d-flex flex-row justify-content-end mb-1">
                                            <span class="accountGoogle_accountType badge bg-light-warning border rounded-5 border-primary text-primary flex-row fs-2 me-1">
                                                <i class="fa fa-shield-off"></i>
                                                <b>اختصاصی</b>
                                            </span>
                                            <span class="badge bg-primary border rounded-5 border-primary text-white flex-row fs-2 text-uppercase"><?= $account['currency'] ?></span>
                                        </div>
                                    </div>
                                    <p class="accountGoogle_name fw-bolder fs-7 mb-0" style="direction: ltr;"><?= $account['username'] ?></p>
                                    <p class="mb-1" style="direction:ltr">CID: <span>Temporary</span></p>
                                    <p class="text-start mt-2">
                                        <button class="btn btn-sm btn-success icoAccordian text-white" data-bs-toggle="collapse" data-bs-target="#acc_<?= $account['id'] ?>" aria-expanded="false" aria-controls="acc_<?= $account['id'] ?>">
                                            <i class="fa fa-circle-arrow-down"></i> شارژ کنید
                                        </button>
                                        <a class="btn btn-sm btn-outline-info" href="">جزئیات اکانت</a>
                                    </p>
                                </div>
                            </div>
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
                    <!-- Previous Link -->
                    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>">قبلی</a>
                    </li>
                    
                    <!-- Page Numbers -->
                    <?php for ($p = 1; $p <= $total_pages; $p++) : ?>
                        <li class="page-item <?= ($p == $page) ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $p ?>"><?= $p ?></a>
                        </li>
                    <?php endfor; ?>
                    
                    <!-- Next Link -->
                    <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">بعدی</a>
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

if(isset($_POST['charge'])){
  echo "<h1>". $_POST['id_account'] ."</h1>";
}