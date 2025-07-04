<?php

session_start();

// Check if the user data is set in the session
if (!isset($_SESSION["user_data"])) {
    // Redirect to the login page
    header("Location: ../login.php");
    exit(); // Stop further execution of the script
}
$id = $_SESSION["user_data"]["id"];
$admin = $_SESSION["user_data"]["admin"];

if ($admin == 0 ){
  header("Location: restricted.php");
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
    <link rel="shortcut icon" type="image/png" href="../images/logo.png">


    


    <title>فعالسازی پروموشن</title>
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
          src: url('../yekan/Yekan.woff2') format('woff2'),
              url('../yekan/Yekan.woff') format('woff'),
              url('../yekan/Yekan.ttf') format('truetype');
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
                                <h6 class="mb-0 fs-4 fw-semibold">مدیریت پروموشن ها</h6>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="shop-part d-flex w-100 flex-column">
                       
                        <div class="card-body p-0 pb-0 position-relative" style="min-height:1000px">
                            <div class="d-flex justify-content-end align-items-center mb-4">
                         

                              <button class="btn btn-success mb-2 font-medium me-2 px-2 rounded-pill cursor-pointer" onclick="show_card()">
                                <span class="d-md-inline d-none">پروموشن جدید</span>
                                <i class="fa fa-plus"></i>
                              </button>


                              <form class="position-relative" action="" method="GET">
                                <input type="text" class="form-control search-chat py-2 ps-5 text-right" 
                                name="search" id="txtSearch" placeholder="جست و جو بر اساس cid">
                                <i class="fa fa-search position-absolute top-50  translate-middle-y fs-6 text-dark me-3" style="right:10px"></i>
                              </form>

                           

                            </div>

                            <script>
                              function show_card(){
                                document.getElementById("new_promotion").style.display = "block";
                              }
                            </script>


                         
                            <div class="row">
                              <div class="col-md-12">
                                <div class="card">
                                  <div class="card-body">
                                    <div class="table-responsive" >
                                      <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">ردیف</th>
                                            <th scope="col">آیدی اکانت</th>
                                            <th scope="col">قیمت(تومان)</th>
                                            <th scope="col">عملیات</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          include "../config.php";
                                          
                                          // Define pagination parameters
                                          $rows_per_page = 10; // Number of rows per page
                                          $page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1; // Current page
                                          $offset = ($page - 1) * $rows_per_page; // Offset for SQL query
                                          
                                          // Get the search term from the URL
                                          $search = isset($_GET['search']) ? $_GET['search'] : '';
                                          
                                          // Build the SQL query
                                         
                                          
                                          // Count total rows for pagination
                                          $total_rows_query = "SELECT COUNT(*) AS total FROM accounts WHERE cid IS NOT NULL AND get_promotion = 0";
                                          if (!empty($search)) {
                                              $total_rows_query .= " AND cid LIKE '%$search%' ";
                                          }
                                          $total_rows_result = $conn->query($total_rows_query);
                                          $total_rows = $total_rows_result->fetch_assoc()['total'];
                                          $total_pages = ceil($total_rows / $rows_per_page); // Total pages
                                         


                                          $sql = "SELECT * FROM accounts WHERE cid IS NOT NULL AND get_promotion = 0";
                                          
                                          // If a search term is provided, add a LEFT JOIN and WHERE clause
                                          if (!empty($search)) {
                                              $sql .= " AND cid LIKE '%$search%' ";
                                          } 
                                          
                                          $sql .= " ORDER BY id DESC LIMIT $rows_per_page OFFSET $offset";
                                          
                                          // Execute the query
                                          $result = $conn->query($sql);

                                         

                                          if ($result->num_rows > 0) {
                                            $i = $offset + 1; // Adjust row number for pagination
                                            while ($row = $result->fetch_assoc()) {
                                          ?>
                                          <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <td><?=$row['cid']?></td>
                                            <td><?=number_format($row['price_promotion'])?></td>
                                            <td>
                                              <form action="" method="POST">
                                                <input type="hidden" name="id_account" value="<?=$row['id']?>" />
                                                <button name="delete_promotion" class="btn btn-outline-danger">حذف قیمت پروموشن</button>
                                              </form>
                                            </td>
                                
                                         
                                          </tr>
                                          <?php
                                                $i++;
                                            }
                                          } else {
                                            echo "<tr><td colspan='7'>No records found.</td></tr>";
                                          }
                                          ?>
                                        </tbody>
                                      </table>

                                       <!-- Pagination Links -->
                                        <nav>
                                            <ul class="pagination justify-content-center">
                                                <!-- Previous Link -->
                                                <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                                                    <a class="page-link" href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>">قبلی</a>
                                                </li>
                                                
                                                <!-- Page Numbers -->
                                                <?php for ($p = 1; $p <= $total_pages; $p++) : ?>
                                                    <li class="page-item <?= ($p == $page) ? 'active' : '' ?>">
                                                        <a class="page-link" href="?page=<?= $p ?>&search=<?= urlencode($search) ?>"><?= $p ?></a>
                                                    </li>
                                                <?php endfor; ?>
                                                
                                                <!-- Next Link -->
                                                <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                                                    <a class="page-link" href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>">بعدی</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>

                                    

                                  </div>
                                </div>
                              </div>
                            </div>


                            <div class="border">
                              <form action="" method="POST" id="new_promotion" style="display: none;">
                                <h2>افزودن پروموشن جدید </h2>
                                <div class="row">
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="آیدی اکانت" name="cid">
                                  </div>
                              
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="قیمت(تومان)" name="price">
                                  </div>
                                  <div class="col-md-6">
                                    <button class="btn btn-primary" name="submit_promotion">ثبت</button>
                                  </div>
                                </div>
                              </form>
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
    </div>
    

    <div id="modalContainer"></div>
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

if(isset($_POST['submit_promotion'])){
  $cid = $_POST['cid'];
  $price = $_POST['price'];
  $sql = "UPDATE accounts SET price_promotion= '$price' WHERE cid = '$cid'";
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
                window.location.href = 'promotions';
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
                  delay: 3000
              }).toast('show');
              setTimeout(function(){
                  window.location.href = 'promotions';
              }, 3000);
          });
      </script>";
  }
}

if(isset($_POST['delete_promotion'])){
  $id = $_POST['id_account'];
  $sql = "UPDATE accounts SET price_promotion = NULL WHERE id = '$id'";
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
                window.location.href = 'promotions';
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
                  delay: 3000
              }).toast('show');
              setTimeout(function(){
                  window.location.href = 'promotions';
              }, 3000);
          });
      </script>";
  }
}