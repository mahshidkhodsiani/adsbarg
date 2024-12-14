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


    


    <title>تیکت ها</title>
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
                                <h6 class="mb-0 fs-4 fw-semibold">مدیریت تیکت ها</h6>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="shop-part d-flex w-100 flex-column">
                       
                          <div class="card-body p-0 pb-0 position-relative" style="min-height:1000px">
                              <div class="d-flex justify-content-end align-items-center mb-4">
                              <form class="position-relative" action="" method="GET">
                                  <input type="text" class="form-control search-chat py-2 ps-5 text-right" 
                                  id="txtSearch" placeholder="جست و جو بر اساس موضوع" name="search">
                                  <i class="fa fa-search position-absolute top-50  translate-middle-y fs-6 text-dark me-3" style="right:10px"></i>
                              </form>
                            

                              </div>

                              <?php
                            

                              // Pagination parameters
                              $rows_per_page = 10; // Number of rows per page
                              $page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1; // Current page
                              $offset = ($page - 1) * $rows_per_page; // Offset for SQL query

                              $search = isset($_GET['search']) ? $_GET['search'] : '';


                              // Total rows in the table
                              $total_rows_query = "SELECT COUNT(*) AS total FROM tickets";
                              if(!empty($search)){
                                $total_rows_query.= " WHERE title LIKE '%$search%'";  // Add search condition to the query if search string is not empty
                              }
                              $total_rows_result = $conn->query($total_rows_query);
                              $total_rows = $total_rows_result->fetch_assoc()['total'];
                              $total_pages = ceil($total_rows / $rows_per_page); // Total pages

                              // Fetch rows for the current page
                              $sql = "SELECT * FROM tickets";
                              if(!empty($search)){
                                $sql.= " WHERE title LIKE '%$search%' ";  // Add search condition to the query if search string is not empty
                              }
                              $sql.= " ORDER BY id DESC LIMIT $offset, $rows_per_page";  // Add pagination condition to the query

                              $result = $conn->query($sql);
                              ?>

                              <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ردیف</th>
                                            <th scope="col">موضوع</th>
                                            <th scope="col">متن</th>
                                            <th scope="col">یوزر</th>
                                            <th scope="col">پاسخ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            $i = $offset + 1; // Adjust row number for pagination
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td>
                                                  <a href="ticket.php?id_ticket=<?=$row['id']?>">
                                                  <?= $row['title'] ?>
                                                  </a>
                                                </td>
                                                <td>
                                                    <?=
                                                      $row['text1'];
                                                    ?>
                                                </td>
                                                <td><?=get_name($row['user_id'])?></td>
                                                <td>
                                                  <?php
                                                  if($row['status'] == 1){
                                                    echo 'پاسخ داده شده';
                                                  }else{
                                                  ?>
                                                  <a href="ticket.php?id_ticket=<?=$row['id']?>">پاسخ</a>
                                                  <?php
                                                  }
                                                  ?>
                                                </td>
                                              
                                            </tr>
                                        <?php
                                                $i++;
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>تیکتی وجود ندارد.</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                              </div>

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




                              <form action="" method="POST" enctype="multipart/form-data" id="new_ticket" style="display: none;">
                                <div class="row">
                                  <h3>فرم ثبت تیکت</h3>
                                  
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="موضوع تیکت" name="title">
                                    </div>
                                </div>
                                <div class="row mt-1">

                                    <div class="col-md-6">
                                        <textarea class="form-control" rows="8" name="matn">متن تیکت</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="custom-file-upload">
                                        <label for="fileUpload" class="btn btn-outline-primary">فایل ضمیمه</label>
                                        <input type="file" id="fileUpload" class="form-control" hidden name="zamimeh">
                                      </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <button name="submit" class="btn btn-success w-100 py-8 mb-4 rounded-2">ارسال تیکت</button>
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


if(isset($_POST['submit'])){

  var_dump($_POST);
  
  $title = $_POST['title'];
  $text = $_POST['matn'];
  $file = $_FILES['zamimeh'];

  // Ensure user folder exists
  $user_folder = "uploads/" . $id;  // Use user ID for the folder name

  // Check if the folder exists, if not, create it
  if (!file_exists($user_folder)) {
      mkdir($user_folder, 0777, true);  // Create the folder with proper permissions
  }

  // Define the target file path
  $target_file = $user_folder . "/" . basename($file["name"]);

  // Move the uploaded file to the user-specific folder
  move_uploaded_file($file["tmp_name"], $target_file);

  // Insert the ticket data into the database
  $sql = "INSERT INTO tickets (title, text, file, user_id) 
          VALUES ('$title', '$text', '$target_file', '$id')";
  $result = $conn->query($sql);

  // Display the result of the insert query
  if($result){
      echo "<script>alert('تیکت با موفقیت ارسال شد.')</script>";
  }else{
      echo "<script>alert('خطا در ارسال تیکت.')</script>";
  }
}
