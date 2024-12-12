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


    <title>سفارشات</title>
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
        // include "functions.php";
        ?>
        <div class="container-fluid">
          <div class="row" id="notify-content"></div>
          <div class="row">
            <style>
              @media screen and (max-width:800px) {
                #grid_invoices_wrapper {
                  overflow-x: auto;
                }
              }
            </style>
        

            <div class="container-fluid" id="dashboard">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-1 mb-md-3">
                                <div class="mb-3 mb-sm-0">
                                    <div class="d-flex align-items-center">
                                        <div class="p-6 bg-light-primary rounded-2 me-6 d-flex align-items-center justify-content-center">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fs-4 fw-semibold">مدیریت سفارشات</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-part d-flex w-100 flex-column">
                                <div class="card-body p-0 pb-0 position-relative" style="min-height:1000px">
                                    <div class="d-flex justify-content-end align-items-center mb-4">
                                    <form class="position-relative" action="" method="GET">
                                      <input type="text" class="form-control search-chat py-2 ps-5 text-right" 
                                        name="search" id="txtSearch" placeholder="جست و جو بر اساس cid">
                                      <i class="fa fa-search position-absolute top-50  translate-middle-y fs-6 text-dark me-3" style="right:10px"></i>
                                    </form>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ردیف</th>
                                                    <th scope="col"> سفارش</th>
                                                    <th scope="col"> آیدی اکانت</th>
                                                    <th scope="col">نوع</th>
                                                    <th scope="col">وضعیت</th>
                                                    <th scope="col">شارژ</th>
                                                    <th scope="col">مبلغ(تومان)</th>
                                                    <th scope="col">عملیات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php
                                                include "config.php";

                                                // Define pagination parameters
                                                $rows_per_page = 10; // Number of rows per page
                                                $page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1; // Current page
                                                $offset = ($page - 1) * $rows_per_page; // Offset for SQL query
                                                
                                                // Get the search term from the URL
                                                $search = isset($_GET['search']) ? $_GET['search'] : '';
                                                
                                                // Count total rows for pagination
                                                $total_rows_query = "SELECT COUNT(*) AS total FROM orders LEFT JOIN accounts ON orders.account_id = accounts.id WHERE orders.user_id = $id";
                                                if (!empty($search)) {
                                                    $total_rows_query .= " AND accounts.cid LIKE '%$search%'";
                                                }
                                                $total_rows_result = $conn->query($total_rows_query);
                                                $total_rows = $total_rows_result->fetch_assoc()['total'];
                                                $total_pages = ceil($total_rows / $rows_per_page); // Total pages
                                                


                                                // Fetch rows for the current page
                                                $sql = "SELECT orders.id as id ,  orders.* FROM orders LEFT JOIN accounts 
                                                        ON orders.account_id = accounts.id WHERE orders.user_id = $id";
                                                
                                                if (!empty($search)) {
                                                    $sql .= " AND accounts.cid LIKE '%$search%'";
                                                }
                                                
                                                $sql .= " ORDER BY orders.id DESC LIMIT $rows_per_page OFFSET $offset";
                                                
                                                // Execute the query
                                                $result = $conn->query($sql);
                                                
                                                if ($result->num_rows > 0) {
                                                    $i = $offset + 1; // Adjust row number for pagination
                                                    while ($row = $result->fetch_assoc()) {
                                                ?>

                                                <tr>
                                                    <th scope="row"><?= $i ?></th>
                                                    <td>
                                                        <?php
                                                        if ($row['type'] == 'charge') echo "شارژ اکانت";
                                                        if ($row['type'] == 'click') echo "سفارش ابزار کلیک";
                                                        if ($row['type'] == 'promotion') echo "ایجاد پروموشن";
                                                        ?>
                                                    </td>
                                                    <td><?= cidAccount($row['account_id']) ?></td>
                                                    <td>
                                                      <?php
                                                      if($row['type'] == 'charge'){
                                                        if(get_managed($row['account_id'] )== 1){
                                                          echo "مدیریت شده";
                                                        }else{
                                                          echo "اختصاصی";
                                                        }
                                                          
                                                        echo "";
                                                      }

                                                      ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row['status'] == 2) echo "در حالت پرداخت";
                                                        if ($row['status'] == 1) echo "پرداخت شده";
                                                        if ($row['status'] == 0) echo "<p>لغو سیستمی</p>";
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (got_charge($row['id']) == 0) echo "در انتظار شارژ";
                                                        else  echo "<p style='color: green'>شارژ شده</p>";
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if($row['type']== 'charge')  echo number_format($row['amount']);
                                                        else echo $row['amount'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row['type'] == 'charge'){
                                                        ?>
                                                        <div class="d-flex align-items-center flex-row">
                                                          <form action="invoice.php" method="POST">
                                                            <input type="hidden" name="show_invoice" value="<?= $row['id'] ?>">
                                                            <button class="btn btn-outline-info btn-circle btn-sm" name="charge" title="مشاهده">
                                                              <i class="fs-5 fa fa-credit-card"></i>
                                                            </button>
                                                          </form>
                                                        </div>
                                                        <?php
                                                        }elseif($row['type'] == 'click' OR $row['type'] == 'promotion'){
                                                          ?>
                                                        <div class="d-flex align-items-center flex-row">
                                                          <form action="invoice_service.php" method="POST">
                                                            <input type="hidden" name="show_invoice" value="<?= $row['id'] ?>">
                                                            <button class="btn btn-outline-info btn-circle btn-sm" name="charge" title="مشاهده">
                                                              <i class="fs-5 fa fa-credit-card"></i>
                                                            </button>
                                                          </form>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                        $i++;
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='6'>هیچ سفارشی پیدا نشد.</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    
                                    
                                  <!-- Pagination Links -->
                                  <nav>
                                      <ul class="pagination justify-content-center">
                                          <!-- Previous Link -->
                                          <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                                              <a class="page-link" href="?page=<?= $page - 1 ?>&search=<?= isset($_GET['search']) ? urlencode($_GET['search']) : '' ?>">قبلی</a>
                                          </li>

                                          <!-- Page Numbers -->
                                          <?php for ($p = 1; $p <= $total_pages; $p++) : ?>
                                              <li class="page-item <?= ($p == $page) ? 'active' : '' ?>">
                                                  <a class="page-link" href="?page=<?= $p ?>&search=<?= isset($_GET['search']) ? urlencode($_GET['search']) : '' ?>"><?= $p ?></a>
                                              </li>
                                          <?php endfor; ?>

                                          <!-- Next Link -->
                                          <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                                              <a class="page-link" href="?page=<?= $page + 1 ?>&search=<?= isset($_GET['search']) ? urlencode($_GET['search']) : '' ?>">بعدی</a>
                                          </li>
                                      </ul>
                                  </nav>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


          </div>
        </div>
      </div>
    </div>
    
    <div class="toast-container p-3 top-0 start-0" id="toastPlacement" data-original-class="toast-container p-3"></div>
    <div class="modal fade" id="model" tabindex="-1" aria-labelledby="model_Label" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-header">
              <h1 class="modal-title fs-5">...</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <iframe width="100%" height="200vh" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
            </div>
            <div class="modal-footer"></div>
          </div>
        </div>
      </div>
    </div>
    <div id="modalConfirm" class="modal fade mx-auto" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header modal-colored-header bg-warning text-white rounded-top rounded-right">
            <h4 class="modal-title fs-4 fw-bolder">توجه</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body pb-0">
            <p class="text-center modal-message">آیا مطمئن هستید؟</p>
          </div>
          <div class="modal-footer text-center justify-content-center">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">خیر</button>
            <button type="button" id="btn_modalConfirm_yes" data-bs-dismiss="modal" class="btn btn-warning text-warning font-medium text-dark"> بله </button>
          </div>
        </div>
      </div>
    </div>
    <div id="modalPrompt" class="modal fade mx-auto" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-bg">
        <div class="modal-content">
          <div class="modal-header modal-colored-header bg-warning text-white rounded-top rounded-right">
            <h4 class="modal-title fs-4 fw-bolder">ورود اطلاعات</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body pb-0">
            <p class="text-center modal-message">مقدار مورد نظر را وارد کنید</p>
            <br>
            <div class="form-group">
              <input type="text" class="form-control" id="txt_modalPrompt">
            </div>
          </div>
          <div class="modal-footer text-center justify-content-center">
            <button type="button" id="btn_modalPrompt_yes" data-bs-dismiss="modal" class="btn btn-warning text-warning font-medium text-dark"> ثبت </button>
          </div>
        </div>
      </div>
    </div>
    <div class="offcanvas offcanvas-start bg bg-white" tabindex="1" id="sidebar_message" aria-labelledby="sidebar_message_label" style="z-index: 100000;">
      <div class="offcanvas-header">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body text-center accordion" id="message-content">
        <div class="emptyMessageBox text-center" style="margin-top: 200px;opacity: 0.3;">
          <i class="ti ti-message-x fs-10 mb-3"></i>
          <h2 class="fw-bolder text-center mt-3 fs-5">اعلان جدیدی وجود ندارد</h2>
        </div>
      </div>
      <hr>
      <p class="text-center text-primary">
        <a href="" class="fw-bolder text-primary"> تاریخچه اعلان‌‌ها <i class="ti ti-arrow-left ms-2 fs-7"></i>
        </a>
      </p>
    </div>
    <div id="modalContainer"></div>

    <!-- ------------------------------- -->
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
    <!-- ------------------------------ -->

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