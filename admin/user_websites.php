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


    


    <title>وب سایت ها</title>
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
            include "../config.php";

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
                                <h6 class="mb-0 fs-4 fw-semibold">مدیریت وب سایت ها </h6>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="shop-part d-flex w-100 flex-column">
                       
                          <div class="card-body p-0 pb-0 position-relative" style="min-height:1000px">
                              <div class="d-flex justify-content-end align-items-center mb-4">
                              <form class="position-relative">
                                  <input type="text" class="form-control search-chat py-2 ps-5 text-right" id="txtSearch" placeholder="جست و جو">
                                  <i class="fa fa-search position-absolute top-50  translate-middle-y fs-6 text-dark me-3" style="right:10px"></i>
                              </form>
                            

                              </div>

                              <?php
                            // Pagination for user_websites
                            $rows_per_page_websites = 10;
                            $page_websites = isset($_GET['page_websites']) && is_numeric($_GET['page_websites']) ? intval($_GET['page_websites']) : 1;
                            $offset_websites = ($page_websites - 1) * $rows_per_page_websites;

                            $total_rows_query_websites = "SELECT COUNT(*) AS total FROM user_websites";
                            $total_rows_result_websites = $conn->query($total_rows_query_websites);
                            $total_rows_websites = $total_rows_result_websites->fetch_assoc()['total'];
                            $total_pages_websites = ceil($total_rows_websites / $rows_per_page_websites);

                            $sql_websites = "SELECT * FROM user_websites ORDER BY id DESC LIMIT $rows_per_page_websites OFFSET $offset_websites";
                            $result_websites = $conn->query($sql_websites);
                            ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ردیف</th>
                                            <th scope="col">یوزر</th>
                                            <th scope="col">وب سایت</th>
                                            <th scope="col">اکانت</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result_websites->num_rows > 0) {
                                            $i = $offset_websites + 1;
                                            while ($row = $result_websites->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td><?= get_name($row['user_id']) ?></td>
                                                <td><?= $row['user_website'] ?></td>
                                                <td><?= cidAccount($row['account_id']) ?></td>
                                            </tr>
                                        <?php
                                                $i++;
                                            }
                                        } else {
                                            echo "<tr><td colspan='4'>وبسایتی وجود ندارد.</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <li class="page-item <?= ($page_websites <= 1) ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?page_websites=<?= $page_websites - 1 ?>">قبلی</a>
                                    </li>
                                    <?php for ($p = 1; $p <= $total_pages_websites; $p++) : ?>
                                        <li class="page-item <?= ($p == $page_websites) ? 'active' : '' ?>">
                                            <a class="page-link" href="?page_websites=<?= $p ?>"><?= $p ?></a>
                                        </li>
                                    <?php endfor; ?>
                                    <li class="page-item <?= ($page_websites >= $total_pages_websites) ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?page_websites=<?= $page_websites + 1 ?>">بعدی</a>
                                    </li>
                                </ul>
                            </nav>


                            <hr>
                            <h4>کلمات پیدا شده توسط ربات:</h4>

                            <?php
                            // Pagination for robot_words
                            $rows_per_page_words = 10;
                            $page_words = isset($_GET['page_words']) && is_numeric($_GET['page_words']) ? intval($_GET['page_words']) : 1;
                            $offset_words = ($page_words - 1) * $rows_per_page_words;

                            $total_rows_query_words = "SELECT COUNT(*) AS total FROM robot_words";
                            $total_rows_result_words = $conn->query($total_rows_query_words);
                            $total_rows_words = $total_rows_result_words->fetch_assoc()['total'];
                            $total_pages_words = ceil($total_rows_words / $rows_per_page_words);

                            $sql_words = "SELECT * FROM robot_words ORDER BY id DESC LIMIT $rows_per_page_words OFFSET $offset_words";
                            $result_words = $conn->query($sql_words);
                            ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ردیف</th>
                                            <th scope="col">یوزر</th>
                                            <th scope="col">وب سایت</th>
                                            <th scope="col">کلمه پیدا شده</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result_words->num_rows > 0) {
                                            $i = $offset_words + 1;
                                            while ($row = $result_words->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td><?= get_name($row['user_id']) ?></td>
                                                <td><?= $row['user_websites'] ?></td>
                                                <td><?= $row['user_words'] ?></td>
                                            </tr>
                                        <?php
                                                $i++;
                                            }
                                        } else {
                                            echo "<tr><td colspan='4'>وبسایتی وجود ندارد.</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <li class="page-item <?= ($page_words <= 1) ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?page_words=<?= $page_words - 1 ?>">قبلی</a>
                                    </li>
                                    <?php for ($p = 1; $p <= $total_pages_words; $p++) : ?>
                                        <li class="page-item <?= ($p == $page_words) ? 'active' : '' ?>">
                                            <a class="page-link" href="?page_words=<?= $p ?>"><?= $p ?></a>
                                        </li>
                                    <?php endfor; ?>
                                    <li class="page-item <?= ($page_words >= $total_pages_words) ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?page_words=<?= $page_words + 1 ?>">بعدی</a>
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
    
  
    <div id="modalContainer"></div>
    <?php include "footer.php"; ?>
 
    <script>
      function ticket_show(){
        // Show the form
        var form = document.getElementById("new_ticket");
        form.style.display = "";

        // Scroll to the form at the bottom
        form.scrollIntoView({ behavior: "smooth" });
      }

    </script>

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


