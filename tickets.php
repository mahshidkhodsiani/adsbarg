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
    


    <title>تیکت های من</title>
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
                                <h6 class="mb-0 fs-4 fw-semibold">تیکت ها</h6>
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
                              <button class="btn btn-light-info mb-2 font-medium text-info px-4 rounded-pill cursor-pointer" onclick="ticket_show()">
                                  <span class="d-md-inline d-none">تیکت جدید</span><i class="fa fa-plus"></i>
                              </button>

                              </div>

                              <?php
                              include "config.php";

                              // Pagination parameters
                              $rows_per_page = 10; // Number of rows per page
                              $page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1; // Current page
                              $offset = ($page - 1) * $rows_per_page; // Offset for SQL query

                              $search = isset($_GET['search']) ? $_GET['search'] : '';

                              // Total rows in the table
                              $total_rows_query = "SELECT COUNT(*) AS total FROM tickets WHERE user_id = $id";
                              if(!empty($search)){
                                $total_rows_query.= " AND title LIKE '%$search%' OR text1 LIKE '%$search%'";  // Add search condition to the query if search string is not empty
                              }
                              $total_rows_result = $conn->query($total_rows_query);
                              $total_rows = $total_rows_result->fetch_assoc()['total'];
                              $total_pages = ceil($total_rows / $rows_per_page); // Total pages

                              // Fetch rows for the current page
                              $sql = "SELECT * FROM tickets WHERE user_id = $id ";
                              if(!empty($search)){
                                $sql.= " AND title LIKE '%$search%' ";  // Add search condition to the query if search string is not empty
                              }
                              $sql.= " ORDER BY id DESC LIMIT $offset, $rows_per_page";  // Add pagination condition to the query

                              // echo $sql;
                              $result = $conn->query($sql);
                              ?>

                              <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ردیف</th>
                                            <th scope="col">موضوع</th>
                                            <th scope="col">متن</th>
                                            <th scope="col">وضعیت</th>
                                            <th scope="col">عملیات</th>
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
                                                <td><?= $row['title'] ?></td>
                                                <td>
                                                    <?=
                                                      $row['text1'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($row['status'] == 1) {
                                                      echo "<p style='color:green'>پاسخ داده شده</p>";
                                                    }else{
                                                      echo "<p style='color:#b7b703'>در انتظار پاسخ</p>";
                                                    }
                                                    ?>
                                                </td>
                                                <td><a href="ticket.php?id_ticket=<?=$row['id']?>">مشاهده</a></td>
                                              
                                            </tr>
                                        <?php
                                                $i++;
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>تیکتی وجود ندارد</td></tr>";
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


    <!-- ------------------------------- -->
      <div class="contact-circle" onclick="toggleIcons()">
              <img src="https://cdn-icons-png.flaticon.com/512/724/724664.png" alt="تماس">
      </div>

      <div class="social-icons" id="socialIcons">
          <a href="https://wa.me/9120469460" class="whatsapp" target="_blank">
              <img src="https://cdn-icons-png.flaticon.com/512/2111/2111728.png" alt="واتساپ">
          </a>
          <a href="https://t.me/adsbargsupports" class="telegram" target="_blank">
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

include "config.php";

if(isset($_POST['submit'])){

  // var_dump($_POST);
  
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

  $random = "tk-". rand(100,999)."-". rand(1000,9999);

  // Insert the ticket data into the database
  $sql = "INSERT INTO tickets (title, text1, file, user_id, shenaseh_ticket) 
          VALUES ('$title', '$text', '$target_file', '$id', '$random')";
  $result = $conn->query($sql);

  // Display the result of the insert query
  if($result){
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
                delay: 2000
            }).toast('show');
            setTimeout(function(){
                window.location.href = 'tickets';
            }, 2000);
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
                delay: 2000
            }).toast('show');
            setTimeout(function(){
                window.location.href = 'tickets';
            }, 2000);
        });
    </script>";
  }
}
