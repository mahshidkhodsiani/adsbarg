<?php
// PHP to determine the current page
$current_page = basename($_SERVER['PHP_SELF']); // Gets the current page's file name
?>

<style>
.left-sidebar .sidebar-link.active {
    color: white !important;
    background-color: green !important;
}

.left-sidebar .sidebar-link.active i {
    color: white !important;
    background-color: green !important;
}

.left-sidebar {
  float: right;
}

.bold-font {
    /* font-weight: bold !important; */
}

</style>

<?php

// if ($admin == 0){

?>



<aside class="left-sidebar" style="background-color: #000 !important;">
  <div>
    <div class="brand-logo pt-4 position relative" style="height: 130px; background-size: 128px; background: url('images/logo.png') no-repeat -30px -35px;">
     
      <h1 class="d-block pt-1 slug fs-8 fw-bolder text-white" style="float: left;">ادز برگ</h1>
      <p class="fs-2 text-white" style="float: left;">تبلیغات در گوگل، فقط با ادز برگ</p>
      <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer position-absolute bg-white rounded-5" id="sidebarCollapse" style="left: 20px; top: 20px;">
        <!-- <i class="fa fa-xmark"></i> -->
        ✖
      </div>
    </div>
    <div class="brand-logoMini text-center">
      <img src="images/logo.png" class="img-fluid mt-4" style="max-width: 45px;">
    </div>
  </div>
  
  <nav class="sidebar-nav scroll-sidebar bold-font" data-simplebar="init">
    <ul id="sidebarnav" class="in mt-5">
      <li class="sidebar-item ">
        <a class="sidebar-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="./" aria-expanded="false">
          <span><i class="fa fa-home"></i></span>
          <span class="hide-menu bold-font">داشبورد</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link <?php echo ($current_page == 'google_accounts.php') ? 'active' : ''; ?>" href="google_accounts" aria-expanded="false">
          <!-- <span><i class="fa fa-google"></i></span> -->
          <span><img src="images/google.png" height="17px" width="17px"></span>
          <span class="hide-menu bold-font">گوگل اکانت‌ها</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link <?php echo ($current_page == 'services.php') ? 'active' : ''; ?>" href="services" aria-expanded="false">
          <span><i class="fa fa-clone"></i></span>
          <span class="hide-menu bold-font">سرویس ها</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link <?php echo ($current_page == 'invoices.php') ? 'active' : ''; ?>" href="invoices" aria-expanded="false">
          <span><i class="fa fa-file-invoice"></i></span>
          <span class="hide-menu bold-font">سفارشات</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link <?php echo ($current_page == 'payments.php') ? 'active' : ''; ?>" href="payments" aria-expanded="false">
          <span><i class="fa fa-credit-card"></i></span>
          <span class="hide-menu bold-font">پرداخت‌ها</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link <?php echo ($current_page == 'tickets.php') ? 'active' : ''; ?>" href="tickets" aria-expanded="false">
          <span><i class="fa fa-ticket"></i></span>
          <span class="hide-menu bold-font">تیکت ها</span>
        </a>
      </li>


      <li class="sidebar-item">
        <a class="sidebar-link <?php echo ($current_page == 'user.php') ? 'active' : ''; ?>" href="user" aria-expanded="false">
          <span><i class="fa fa-user"></i></span>
          <span class="hide-menu bold-font" >پروفایل</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>

<?php
// }elseif($admin == 1){

  ?>

  <?php

// }
