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
        

            <div class="container-fluid"  style="margin-top:40px">
            
            
                <div class="row mt-md-1 mt-5">
                    <!-- پروفایل کاربر حالت ادیت -->
                    <div class="card">
                        <div class="card-header bg-white">
                            <div class="row align-items-center">
                                <div class="col-12 mt-n3 order-lg-2 order-1">
                                    <div class="mt-n5">
                                        <div class="d-flex align-items-center justify-content-center mb-2 flex-column">
                                            <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle mb-2" style="width: 110px; height: 110px;" ;="">
                                                <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden" style="width: 100px; height: 100px;" ;="">
                                                    <img id="img" src="https://my.g-ads.org/assets/img/avatar/Avatar(9).jpg" alt="" class="w-100 h-100">
                                                </div>
                                            </div>
                                            <button class="btn btn-outline-primary btn-sm rounded-5" data-bs-toggle="modal" data-bs-target="#al-info-alert"><i class="fa fa-edit ms-1"></i>تغییر</button>

                                            <div class="modal fade" id="al-info-alert" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content modal-filled bg-light-info">
                                                        <div class="modal-body p-4">
                                                            <div class="text-center text-info">
                                                                <div class="cc-avatars">
                                                                    <input id="avatar1" type="radio" name="avatars" value="avatar1" data-img="https://my.g-ads.org/assets/img/avatar/Avatar(1).jpg">
                                                                    <label class="avatars-cc avatar1" for="avatar1"></label>
                                                                    <input id="avatar2" type="radio" name="avatars" value="avatar2" data-img="https://my.g-ads.org/assets/img/avatar/Avatar(2).jpg">
                                                                    <label class="avatars-cc avatar2" for="avatar2"></label>
                                                                    <input id="avatar3" type="radio" name="avatars" value="avatar3" data-img="https://my.g-ads.org/assets/img/avatar/Avatar(3).jpg">
                                                                    <label class="avatars-cc avatar3" for="avatar3"></label>
                                                                    <input id="avatar4" type="radio" name="avatars" value="avatar4" data-img="https://my.g-ads.org/assets/img/avatar/Avatar(4).jpg">
                                                                    <label class="avatars-cc avatar4" for="avatar4"></label>
                                                                    <input id="avatar5" type="radio" name="avatars" value="avatar5" data-img="https://my.g-ads.org/assets/img/avatar/Avatar(5).jpg">
                                                                    <label class="avatars-cc avatar5" for="avatar5"></label>
                                                                    <input id="avatar6" type="radio" name="avatars" value="avatar6" data-img="https://my.g-ads.org/assets/img/avatar/Avatar(6).jpg">
                                                                    <label class="avatars-cc avatar6" for="avatar6"></label>
                                                                    <input id="avatar7" type="radio" name="avatars" value="avatar7" data-img="https://my.g-ads.org/assets/img/avatar/Avatar(7).jpg">
                                                                    <label class="avatars-cc avatar7" for="avatar7"></label>
                                                                    <input id="avatar8" type="radio" name="avatars" value="avatar8" data-img="https://my.g-ads.org/assets/img/avatar/Avatar(8).jpg">
                                                                    <label class="avatars-cc avatar8" for="avatar8"></label>
                                                                    <input id="avatar9" type="radio" name="avatars" value="avatar9" data-img="https://my.g-ads.org/assets/img/avatar/Avatar(9).jpg">
                                                                    <label class="avatars-cc avatar9" for="avatar9"></label>
                                                                    <input id="avatar10" type="radio" name="avatars" value="avatar10" data-img="https://my.g-ads.org/assets/img/avatar/Avatar(10).jpg">
                                                                    <label class="avatars-cc avatar10" for="avatar10"></label>
                                                                </div>
                                                                <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">
                                                                    تایید
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-4" id="userProfile-tab" data-bs-toggle="pill" data-bs-target="#userProfile" type="button" role="tab" aria-controls="userProfile" aria-selected="true">
                                    <i class="fa fa-user-circle me-2 fs-6"></i>
                                    <span>اطلاعات کاربری</span>
                                </button>
                            </li>
                            
                        </ul>
                        <div class="card-body p-md-4 p-1">
                            <div class="tab-content">

                                <div class="tab-pane fade show active" id="userProfile" role="tabpanel" aria-labelledby="userProfile-tab" tabindex="0">
                                    <div class="row position-relative">
                                        <div class="col-md-12 d-flex align-items-stretch">
                                            <div class="w-100 position-relative overflow-hidden">
                                                <div class="card-body p-4">
                                                    <h5 class="card-title fw-semibold">ویرایش اطلاعات کاربری</h5>
                                                    <form action="" method="POST">
                                                        <!-- سطح دسترسی کاربر -->
                                                         <?php
                                                         include "config.php";
                                                         $sql = "SELECT * FROM `users` WHERE id = $id";
                                                         $result = $conn->query($sql);
                                                         if ($result->num_rows > 0) {
                                                          $row = $result->fetch_assoc();
                                                         }
                                                         ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-floating mb-2">
                                                                    <input id="user_firstName" name="firstName" type="text" autocomplete="off" class="form-control" placeholder="نام" value="<?=$row['name']?>">
                                                                    <label><i class="fa fa-user me-2 fs-4"></i>نام</label>
                                                                </div>
                                                                <div class="form-floating mb-2">
                                                                    <input id="user_lastName" name="lastName" type="text" autocomplete="off" class="form-control" placeholder="نام خانوادگی" value="<?=$row['family']?>">
                                                                    <label><i class="fa fa-users me-2 fs-4"></i>نام خانوادگی</label>
                                                                </div>
                                                                <div class="form-floating mb-2">
                                                                    <input id="user_nationalCode" name="nationalCode" autocomplete="off" type="text" dir="ltr" class="form-control text-left" placeholder="کد ملی" value="<?=$row['meli_code']?>">
                                                                    <label><i class="fa fa-123 me-2 fs-4"></i>کد ملی</label>
                                                                </div>
                                                            
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-floating mb-2">
                                                                    <input id="user_email" name="email" type="email" dir="ltr" class="form-control" autocomplete="off" placeholder="ایمیل" value="<?=$row['username']?>">
                                                                    <label><i class="fa fa-at me-2 fs-4"></i>ایمیل</label>
                                                                </div>
                                                                <div class="form-floating mb-2">
                                                                    <input id="user_password" name="password" autocomplete="off" type="password" dir="ltr" class="form-control text-center" placeholder="رمز عبور جدید" value="<?=$row['password']?>">
                                                                    <label><i class="fa fa-password me-2 fs-4"></i>رمز عبور جدید</label>
                                                                    <div class="d-flex justify-content-start">
                                                                        <small id="name13" class="badge badge-default text-danger font-medium bg-light-danger form-text">
                                                                            حداقل 6 کاراکتر انگلیسی شامل حداقل یک حرف بزرگ و کوچک
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                                <div class="form-floating mb-2">
                                                                    <input id="userExtra_tel" name="tel" type="text" dir="ltr" autocomplete="off" class="form-control text-left" placeholder="شماره تلفن" value="<?=$row['phone']?>">
                                                                    <label><i class="fa fa-phone me-2 fs-4"></i>شماره تلفن</label>
                                                                </div>
                                                             
                                                          
            
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="text-end mt-3"><button name="edit_user" id="user_i_submit" class="btn btn-success"><i class="fa fa-device-floppy"></i> ذخیر اطلاعات</button></div>
                                                    
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card w-100 position-relative overflow-hidden mb-0">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="accountsGoogle" role="tabpanel" aria-labelledby="accountsGoogle-tab" tabindex="0">
                                    <div class="row position-relative">
                                        <div class="col-md-12 d-flex align-items-stretch">
                                            <div class="w-100 position-relative overflow-hidden">
                                                <div class="card-body p-4">
                                                    <h5 class="card-title fw-semibold">گوگل اکانت‌ها</h5>
                                                    <div class="table-responsive mb-4">
                                                        <div id="grid_accountsGoogle_wrapper" class="dataTables_wrapper no-footer"><div id="grid_accountsGoogle_processing" class="dataTables_processing" style="display: none;"><div><div></div><div></div><div></div><div></div></div></div><table id="grid_accountsGoogle" class="table border table-striped table-bordered text-nowrap w-100 mb-4 dataTable no-footer" aria-describedby="grid_accountsGoogle_info">
                                                        <thead><tr><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;">ردیف</th><th class="sorting_disabled ltr" rowspan="1" colspan="1" style="width: 0px;">مشتری</th><th class="sorting_disabled ltr" rowspan="1" colspan="1" style="width: 0px;">ایمیل</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;">نام</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;">نوع اکانت</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;">customerId</th><th class="sorting_disabled operation" rowspan="1" colspan="1" style="width: 0px;">عملیات</th></tr></thead><tbody><tr class="odd"><td valign="top" colspan="7" class="dataTables_empty">دیتایی برای نمایش وجود ندارد!</td></tr></tbody></table><div class="dataTables_info" id="grid_accountsGoogle_info" role="status" aria-live="polite"></div><div class="dataTables_paginate paging_simple_numbers" id="grid_accountsGoogle_paginate"><a class="paginate_button previous disabled" aria-controls="grid_accountsGoogle" aria-disabled="true" aria-role="link" data-dt-idx="previous" tabindex="-1" id="grid_accountsGoogle_previous"> قبلی </a><span></span><a class="paginate_button next disabled" aria-controls="grid_accountsGoogle" aria-disabled="true" aria-role="link" data-dt-idx="next" tabindex="-1" id="grid_accountsGoogle_next"> بعدی </a></div></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card w-100 position-relative overflow-hidden">

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="invoices" role="tabpanel" aria-labelledby="invoices-tab" tabindex="0">
                                    <div class="card-body">
                                        <div class="d-flex d-block align-items-center justify-content-between mb-7">
                                            <div class="mb-3 mb-sm-0">
                                                <div class="d-flex align-items-center">
                                                    <div class="p-6 bg-light-primary rounded-2 me-6 d-flex align-items-center justify-content-center">
                                                        <i class="fa fa-grid-dots text-primary fs-6"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 fs-4 fw-semibold">آخرین سفارشات</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <a class="btn btn-light-info mb-2 font-medium text-info px-4 rounded-pill cursor-pointer" data-bs-toggle="collapse" href="#filteringBox" role="button" aria-expanded="true" aria-controls="filteringBox">فیلترها <i class="fa fa-filter"></i></a>
                                            </div>
                                        </div>
                                        <div class="table-responsive mb-4">
                                            <div id="grid_invoices_wrapper" class="dataTables_wrapper no-footer"><div id="grid_invoices_processing" class="dataTables_processing" style="display: none;"><div><div></div><div></div><div></div><div></div></div></div><table id="grid_invoices" class="table border table-striped table-bordered text-nowrap w-100 mb-4 dataTable no-footer" aria-describedby="grid_invoices_info">
                                            <thead><tr><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;">ردیف</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;">آخرین تغییر</th><th class="sorting_disabled ltr" rowspan="1" colspan="1" style="width: 0px;">شناسه</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;">مقدار</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;">هزینه سفارش</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;">تغییرات</th><th class="sorting_disabled operation" rowspan="1" colspan="1" style="width: 0px;">عملیات</th></tr></thead><tbody><tr class="odd"><td valign="top" colspan="7" class="dataTables_empty">دیتایی برای نمایش وجود ندارد!</td></tr></tbody></table><div class="dataTables_info" id="grid_invoices_info" role="status" aria-live="polite"></div><div class="dataTables_paginate paging_simple_numbers" id="grid_invoices_paginate"><a class="paginate_button previous disabled" aria-controls="grid_invoices" aria-disabled="true" aria-role="link" data-dt-idx="previous" tabindex="-1" id="grid_invoices_previous"> قبلی </a><span></span><a class="paginate_button next disabled" aria-controls="grid_invoices" aria-disabled="true" aria-role="link" data-dt-idx="next" tabindex="-1" id="grid_invoices_next"> بعدی </a></div></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="userPays" role="tabpanel" aria-labelledby="userPays-tab" tabindex="0">
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
          <i class="fa fa-message-x fs-10 mb-3"></i>
          <h2 class="fw-bolder text-center mt-3 fs-5">اعلان جدیدی وجود ندارد</h2>
        </div>
      </div>
      <hr>
      <p class="text-center text-primary">
        <a href="" class="fw-bolder text-primary"> تاریخچه اعلان‌‌ها <i class="fa fa-arrow-left ms-2 fs-7"></i>
        </a>
      </p>
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
if(isset($_POST['edit_user'])){
  $name = $_POST['firstName'];
  $family = $_POST['lastName'];
  $email = $_POST['email'];
  $phone = $_POST['tel'];
  $meli_code = $_POST['nationalCode']; 
  $password = $_POST['password'];

  $sql = "UPDATE users SET name ='$name', family ='$family', username ='$email', 
    phone ='$phone',meli_code ='$meli_code', password ='$password' WHERE id = '$id'";

    // echo $sql;
    
    $result = mysqli_query($conn, $sql);
    
    
    if ($result) {
      echo "<script>alert('اطلاعات کاربری با موفقیت ویرایش شد');</script>";
    } else {
        echo "<script>alert('خطا در ویرایش اطلاعات');</script>";
    }
  

}