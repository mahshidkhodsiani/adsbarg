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
        font-family: "g", 'sans-serif' !important;
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
            <div class="mb-3 bg-info py-3 rounded-2 ms-md-2 text-md-start text-center" style="width: fit-content;">
              <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="24" height="24" viewBox="0 0 24 24" fill="#fff" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4"></path>
              </svg>
              <a href="#" target="_blank" class="text-white fw-bolder">دریافت باقی مانده شارژ اکانت و امکانات دیگر در ربات تلگرامی  <i class="fa fa-circle-arrow-left fs-5 ms-2"></i>
              </a>
            </div>

            <div class="container-fluid" id="dashboard">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-1 mb-md-3">
                        <div class="mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                            <div class="p-6 bg-light-primary rounded-2 me-6 d-flex align-items-center justify-content-center">
                                <i class="ti ti-file-product text-primary fs-6"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fs-4 fw-semibold">سرویس ها</h6>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="shop-part d-flex w-100 flex-column">
                        <div class="shop-filters d-none d-md-block w-100">
                            <ul class="list-group pt-2 rounded-0 position-sticky d-flex flex-row align-items-center justify-content-center">
                            <li class="list-group-item border-0 p-0 mx-4 mb-2 fw-bolder">
                                <a class="d-flex align-items-center gap-2 list-group-item-action text-primary px-3 py-6" href="javascript:showGroup('')">
                                <i class="ti ti-checks fs-5"></i>تمام سرویس ها </a>
                            </li>
                            <li class="list-group-item border-0 p-0 mx-4 mb-2">
                                <a class="d-flex align-items-center gap-2 list-group-item-action text-dark px-3 py-6" href="javascript:showGroup('AMG')">
                                <i class="ti ti-user-cog fs-5"></i>مدیریت کمپین </a>
                            </li>
                            <li class="list-group-item border-0 p-0 mx-4 mb-2">
                                <a class="d-flex align-items-center gap-2 list-group-item-action text-dark px-3 py-6" href="javascript:showGroup('WRG')">
                                <i class="ti ti-gift fs-5"></i>بررسی سایت </a>
                            </li>
                            <li class="list-group-item border-0 p-0 mx-4 mb-2">
                                <a class="d-flex align-items-center gap-2 list-group-item-action text-dark px-3 py-6" href="javascript:showGroup('SRG')">
                                <i class="ti ti-brand-google fs-5"></i>سئو </a>
                            </li>
                            <li class="list-group-item border-0 p-0 mx-4 mb-2">
                                <a class="d-flex align-items-center gap-2 list-group-item-action text-dark px-3 py-6" href="javascript:showGroup('BRG')">
                                <i class="ti ti-brand-google fs-5"></i>بررسی کسب و کار </a>
                            </li>
                            </ul>
                        </div>
                        <div class="card-body p-0 pb-0 position-relative" style="min-height:1000px">
                            <div class="d-flex justify-content-end align-items-center mb-4">
                            <form class="position-relative">
                                <input type="text" class="form-control search-chat py-2 ps-5 text-right" id="txtSearch" placeholder="جست و جو">
                                <i class="ti ti-search position-absolute top-50  translate-middle-y fs-6 text-dark me-3" style="right:10px"></i>
                            </form>
                            </div>
                            <div class="row mt-3 producList" id="products_g">
                            <div class="col-12 col-md-6 product_item" data-groupname="SRE" data-id="306e6a86-6567-47cf-9f9e-5c2afbbde319" data-producttype="G" data-paymentcost="1,500">
                                <div class="card overflow-hidden rounded-2">
                                <div class="card-body pt-3 p-4">
                                    <h6 class="fw-bolder fs-5 product_title text-primary">بررسی دیزاین سایت</h6>
                                    <p class="smal">
                                    <strong>مدت زمان: </strong> 2 روز
                                    </p>
                                    <p class="text-justify text-black lh-lg fs-5" style="text-align:justify"></p>
                                    <div class="productMaximize">
                                    <p class="shortDescP text-justify text-black lh-lg fs-5"> این پلن برای آن دسته از مشتریانی که به درخواست خود قصد انتقال دیتای اکانت تبلیغاتی خود را دارند منا… </p>
                                    <button class="btn btn-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#moreData-306e6a86-6567-47cf-9f9e-5c2afbbde319" aria-controls="moreData-306e6a86-6567-47cf-9f9e-5c2afbbde319">اطلاعات بیشتر</button>
                                    <div class="offcanvas offcanvas-start" tabindex="-1" id="moreData-306e6a86-6567-47cf-9f9e-5c2afbbde319" aria-labelledby="offcanvasExampleLabel">
                                        <div class="offcanvas-header w-100 d-flex flex-column" style="align-items:normal !important">
                                        <div class="d-flex align-items-center justify-content-between mx-3 mt-3">
                                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">بررسی دیزاین سایت</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between bg-light mt-4 position sticky p-3">
                                            <h6 class="fw-semibold fs-4 mb-0 text-primary product_paymentCost">
                                            <b>1,500</b>
                                            <span>تومان</span>
                                            </h6>
                                            <button class="btn btn-primary product_submit" type="button">ثبت سفارش </button>
                                        </div>
                                        </div>
                                        <div class="offcanvas-body">
                                        <div class="productMaximize">
                                            <p class="shortDescP text-justify text-black lh-lg fs-5"> این پلن برای آن دسته از مشتریانی که به درخواست خود قصد انتقال دیتای اکانت تبلیغاتی خود را دارند مناسب می باشد. این سرویس شامل مشتریانی که از طرف جی ادز مجبور به انتقال اطلاعات اکانت نشده اند. شامل</p>
                                            <p class="text-primary fw-bolder fs-5"> این پلن برای آن دسته از مشتریانی که به درخواست خود قصد انتقال دیتای اکانت تبلیغاتی خود را دارند مناسب می باشد. این سرویس شامل مشتریانی که از طرف جی ادز مجبور به انتقال اطلاعات اکانت نشده اند. شامل</p>
                                            <div class="productServiceList">
                                            <ul class="upUl">
                                                <li>اعتبار این پلن یکبار مصرف می باشد.</li>
                                                <li> انتقال کلیه اطلاعات اکانت تبلیغاتی بطوریکه عینا اطلاعات اکانت جدید مشابه اکانت قدیم باشد( اعمال تغییرات فقط با تایید مشتری)، شامل کمپین،‌ادگروپ، کیوردها،‌تنظیمات بودجه و کل تنظیمات کمپین ها، اکستنشن ها، اسکجول ها و... . </li>
                                            </ul>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="fw-semibold fs-4 mb-0 text-primary product_paymentCost">
                                        <b>1,500</b>
                                        <span>تومان</span>
                                        </h6>
                                        <button class="btn btn-primary product_submit" type="button">ثبت سفارش </button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 product_item" data-groupname="SRE" data-id="35b65a2b-9497-409f-b7de-c415795f2f17" data-producttype="G" data-paymentcost="1,500,000">
                                <div class="card overflow-hidden rounded-2">
                                <div class="card-body pt-3 p-4">
                                    <h6 class="fw-bolder fs-5 product_title text-primary">ابزار ضد کلیک فیک</h6>
                                    <p class="smal">
                                    <strong>مدت زمان: </strong> 30 روز
                                    </p>
                                    <p class="text-justify text-black lh-lg fs-5" style="text-align:justify"></p>
                                    <div class="productMaximize">
                                    <p class="shortDescP text-justify text-black lh-lg fs-5">این سرویس، مناسب آن دسته از کاربران می باشد که به دنبال جلوگیری از کلیک فیک می باشند. </p>
                                    <p class="te…
                                </p>
                                                                <button class=" btn="" btn-link"="" type="button" data-bs-toggle="offcanvas" data-bs-target="#moreData-35b65a2b-9497-409f-b7de-c415795f2f17" aria-controls="moreData-35b65a2b-9497-409f-b7de-c415795f2f17">اطلاعات بیشتر </p>
                                    <div class="offcanvas offcanvas-start" tabindex="-1" id="moreData-35b65a2b-9497-409f-b7de-c415795f2f17" aria-labelledby="offcanvasExampleLabel">
                                        <div class="offcanvas-header w-100 d-flex flex-column" style="align-items:normal !important">
                                        <div class="d-flex align-items-center justify-content-between mx-3 mt-3">
                                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">ابزار ضد کلیک فیک</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between bg-light mt-4 position sticky p-3">
                                            <h6 class="fw-semibold fs-4 mb-0 text-primary product_paymentCost">
                                            <b>1,500,000</b>
                                            <span>تومان</span>
                                            </h6>
                                            <button class="btn btn-primary product_submit" type="button">ثبت سفارش </button>
                                        </div>
                                        </div>
                                        <div class="offcanvas-body">
                                        <div class="productMaximize">
                                            <p class="shortDescP text-justify text-black lh-lg fs-5">این سرویس، مناسب آن دسته از کاربران می باشد که به دنبال جلوگیری از کلیک فیک می باشند. </p>
                                            <p class="text-primary fw-bolder fs-5">این سرویس، مناسب آن دسته از کاربران می باشد که به دنبال جلوگیری از کلیک فیک می باشند. </p>
                                            <div class="productServiceList">
                                            <ul class="upUl">
                                                <li>اعتبار این پلن ۳۰ روز می باشد.</li>
                                                <li>شامل نصب و راه اندازی سرویس ابزار ضد کلیک فیک</li>
                                                <li>این سرویس از طریق شنایی هوشمند رفتار های مشکوک به کلیک فیک، آی پی کاربر را بلاک می کند.</li>
                                            </ul>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="fw-semibold fs-4 mb-0 text-primary product_paymentCost">
                                        <b>1,500,000</b>
                                        <span>تومان</span>
                                        </h6>
                                        <button class="btn btn-primary product_submit" type="button">ثبت سفارش </button>
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