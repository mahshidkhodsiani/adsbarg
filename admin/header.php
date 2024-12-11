<?php
include "../functions.php";
?>
<header class="app-header" style="background-color: white;">
  <nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
          <i class="fa fa-bars"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
      <!-- <li class="nav-item"><span class="badge bg-dark fw-bold rounded-5 me-2 py-2"><i class="ti ti-wallet align-top"></i> ۳۵۷.۹۸۷.۷۸۹</span></li> -->
      <li id="message-count" class="cursor-pointer nav-item">
        <span class="me-3 position-relative notifTop">
          <i class="fa fa-bell"></i>
        </span>
      </li>
      <li class="nav-item dropdown">
        <div class="nav-link pe-0" href="javascript:void(0)" id="user-profile" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="d-flex align-items-center cursor-pointer">
            <div class="userTxt me-2 text-end">
              <p id="dashBoard_fullNameTop" class="mb-1 fs-2 fw-bolder mb-2 lh-1"><?=get_name($id)?></p>
              <span class="d-block text-primary mt-0 lh-1 fs-2">دسترسی کاربر</span>
            </div>
            <div class="user-profile-img">
              <img id="dashBoard_img1" src="../<?=$_SESSION["user_data"]["icon"]?>" class="rounded-circle" width="35" height="35" alt="">
            </div>
          </div>
        </div>
        <div class="dropdown-menu content-dd dropdown-menu-end" aria-labelledby="user-profile" id="user-profile-dropdown">
          <div class="profile-dropdown position-relative" data-simplebar="">
            <div class="d-flex align-items-center py-9 mx-7 border-bottom">
              <img id="dashBoard_img2" src="../<?=$_SESSION["user_data"]["icon"]?>" class="rounded-circle" width="80" height="80" alt="">
              <div class="ms-3">
                <h5 id="dashBoard_fullName" class="mb-1 fs-3 fw-bolder"><?=get_name($id)?></h5>
                <span class="mb-1 d-block text-primary">دسترسی کاربر</span>
                <p class="mb-0 d-flex text-dark align-items-center gap-2">
                    <i class="fa fa-wifi"></i> آی پی: <b id="ip">158.58.63.110</b>
                </p>
              </div>
            </div>
            <div class="d-grid py-4 px-7 pt-8">
              <div class="upgrade-plan bg-light-primary position-relative overflow-hidden rounded-4 p-4 mb-9">
                <div class="row">
                  <div class="col-7">
                    <a class="btn btn-primary text-white" href="https://adsbarg.com/" target="_blank">ورود به ادزبرگ</a>
                  </div>
                  <div class="col-5">
                    <div class="m-n4">
                      <img src="../images/bg.png" alt="" class="w-100 ">
                    </div>
                  </div>
                </div>
              </div>
              <a href="../logout_proccess" class="btn btn-outline-danger" onclick="signOut()">
                <i class="fa fa-arrow-right-from-bracket"></i>
                خروج </a>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </nav>
</header>

