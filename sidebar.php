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



</style>

<aside class="left-sidebar" style="background-color: #000 !important;">
  <div>
    <div class="brand-logo pt-4 position relative" style="height: 120px; background-size: 128px; background: url('images/logo.png') no-repeat -30px -35px;">
      <a href="https://my.g-ads.org/Client/ClientDefault/Index" class="text-nowrap logo-img" style="top: 66px;"></a>
      <h1 class="d-block pt-1 slug fs-8 fw-bolder text-white">ادز برگ</h1>
      <p class="fs-2 text-white">تبلیغات در گوگل، فقط با ادز برگ</p>
      <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer position-absolute bg-white rounded-5" id="sidebarCollapse" style="left: 20px; top: 20px;">
        <i class="fa fa-xmark"></i>
      </div>
    </div>
    <div class="brand-logoMini text-center">
      <img src="images/logo.png" class="img-fluid mt-4" style="max-width: 45px;">
    </div>
  </div>
  
  <nav class="sidebar-nav scroll-sidebar" data-simplebar="init">
    <ul id="sidebarnav" class="in mt-5">
      <li class="sidebar-item">
        <a class="sidebar-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="./" aria-expanded="false">
          <span><i class="fa fa-home"></i></span>
          <span class="hide-menu">داشبورد</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link <?php echo ($current_page == 'google_acounts.php') ? 'active' : ''; ?>" href="google_acounts.php" aria-expanded="false">
          <!-- <span><i class="fa fa-google"></i></span> -->
          <span><img src="images/google.png" height="17px" width="17px"></span>
          <span class="hide-menu">گوگل اکانت‌ها</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link <?php echo ($current_page == 'products.php') ? 'active' : ''; ?>" href="#" aria-expanded="false">
          <span><i class="fa fa-clone"></i></span>
          <span class="hide-menu">سرویس ها</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link <?php echo ($current_page == 'invoices.php') ? 'active' : ''; ?>" href="#" aria-expanded="false">
          <span><i class="fa fa-file-invoice"></i></span>
          <span class="hide-menu">سفارشات</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link <?php echo ($current_page == 'pays.php') ? 'active' : ''; ?>" href="#" aria-expanded="false">
          <span><i class="fa fa-credit-card"></i></span>
          <span class="hide-menu">پرداخت‌ها</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link <?php echo ($current_page == 'tickets.php') ? 'active' : ''; ?>" href="#" aria-expanded="false">
          <span><i class="fa fa-ticket"></i></span>
          <span class="hide-menu">تیکت</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link <?php echo ($current_page == 'wallets.php') ? 'active' : ''; ?>" href="#" aria-expanded="false">
          <span><i class="fa fa-wallet"></i></span>
          <span class="hide-menu">کیف پول</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link <?php echo ($current_page == 'companies.php') ? 'active' : ''; ?>" href="#" aria-expanded="false">
          <span><i class="fa fa-building"></i></span>
          <span class="hide-menu">شرکت‌ها</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link <?php echo ($current_page == 'profile.php') ? 'active' : ''; ?>" href="#" aria-expanded="false">
          <span><i class="fa fa-user"></i></span>
          <span class="hide-menu">پروفایل</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>

