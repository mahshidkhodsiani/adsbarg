
<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="handheldfriendly" content="true">
    <meta name="MobileOptimized" content="width">
    <meta name="description" content="پنل کاربری جی ادز">
    <meta name="author" content="G-ADS">
    <meta name="keywords" content="Mordenize">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/png" href="https://my.g-ads.org/assets/img/icon/fav@32.png">
    <link rel="stylesheet" href="https://my.g-ads.org/assets/css/style.min.css">
    <title>پنل کاربری جی ادز</title>
    <style>
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      input[type=number] {
        -moz-appearance: textfield;
      }

      .nav-tabs .nav-item.show .nav-link,
      .nav-tabs .nav-link.active {
        background: #fff;
        color: #000;
        border-bottom: 2px solid var(--bs-primary);
        border-radius: 0 !important;
        font-weight: 600;
      }

      .spinner-border {
        width: 1.5rem;
        height: 1.5rem;
        position: absolute;
        top: 0.5em;
        left: 0.5em;
      }
    </style>
  </head>
  <body id="loginRegPage" class="loginRegPage">
    <div class="preloader" style="display: none;">
      <img src="https://my.g-ads.org/assets/img/icon/fav@128.png" alt="loader" class="lds-ripple img-fluid">
    </div>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <div class="position-relative overflow-hidden radial-gradient min-vh-100">
        <div class="position-relative z-index-5">
          <div class="row">
            <div class="col-xl-5 col-xxl-4">
              <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4" style="background: #f8f8f9 !important;
                        border-left: 1px solid var(--bs-border-color-translucent);">
                <div class="col-sm-8 col-md-6 col-xl-9">
                  <img src="https://my.g-ads.org/assets/img/icon/logo@dark.svg" alt="تبلیغات گوگل ادز با جی ادز" class=" img-fluid w-10 mb-3">
                  <h2 class="mb-10"> تبلیغات در گوگل فقط با <span class="fw-bolder text-primary"> جی ادز </span>
                  </h2>
                  <div class="position-relative text-center my-4"></div>
                  <ul class="nav nav-tabs pt-9" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active py-2 px-3 rounded-1" data-bs-toggle="tab" href="#tab_mobile" role="tab" aria-selected="true" id="withMobile">
                        <span>ورود/ثبت‌نام با کد</span>
                      </a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link  py-2 px-3 rounded-1" data-bs-toggle="tab"  role="tab" aria-selected="false" tabindex="-1">
                        <span>ورود با رمز عبور</span>
                      </a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active show p-3" id="tab_mobile" role="tabpanel" aria-labelledby="#withMobile">
                      <p class=" mb-9">لطفا شماره موبایل یا آدرس ایمیل خود را وارد کنید</p>
              
                
                    </div>
                  
                      <p class=" mb-9 alert  alert-warning py-1">
                        <i class="ti ti-alert-triangle me-1"></i>فقط کاربران ثبت نام شده
                      </p>
                      <form action="login_process" method="POST">
                        <div class="mb-3">
                          <div class="form-floating mb-3">
                            <input name="username" type="email" class="form-control" id="txtQuery2" placeholder="Enter Name here">
                            <label for="gEmail">
                              <i class="ti ti-at me-1"></i>آدرس ایمیل </label>
                          </div>
                          <div class="form-floating mb-3">
                            <input name="password" type="password" class="form-control" id="txtPass2" placeholder="Enter Name here">
                            <label for="gPass">
                              <i class="ti ti-password me-1"></i>رمز عبور </label>
                          </div>
                        </div>
                        <button class="btn btn-primary w-100 py-8 mb-4 rounded-2" name="submit"> ورود به پنل 
                            <i class="ti ti-login ms-2 align-items-center"></i>
                        </button>
                        <div class="d-flex align-items-center justify-content-end mb-4 text-end">
                          <a tabindex="0" class="btn btn-sm btn-light-info d-inline-flex align-items-center text-dark font-medium" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-content="در صورتیکه مشکلی برای ورود به سیستم دارید با شماره تماس ۰۲۱۶۶۵۶۵۰۰ داخلی ۳۳۱ تماس بگیرید." data-bs-original-title="پشتیبانی کاربران">
                            <i class="ti ti-help me-2 fs-4"></i>به کمک نیاز دارید؟ </a>
                        </div>
                      </form>
              
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-7 col-xxl-8 p-0" style="background:#e7f0f5">
              <div class="d-none d-xl-flex align-items-center justify-content-center" style="
                        background: url('https://g-ads.org/wp-content/uploads/2024/04/loginBgOrdibehesh1403.svg');
                        background-size: cover;
                        height: 100%;">
                <img src="https://g-ads.org/wp-content/uploads/2024/04/loginImgrdibehesh1403.png" alt="" class="img-fluid w-100" style="max-width:850px;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div id="toastPlacement" class="toast-container p-3 top-0 start-0" data-original-class="toast-container p-3"></div>
    </footer>




  </body>
</html>
