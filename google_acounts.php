<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="handheldfriendly" content="true">
    <meta name="MobileOptimized" content="width">
    <meta name="description">
    <meta name="author" content="G-ADS">
    <meta name="keywords" content="Mordenize">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     
    <link rel="stylesheet" href="https://my.g-ads.org/assets/css/select2.css">
    <link rel="stylesheet" href="https://my.g-ads.org/assets/css/datatable.css?v=14030701">
    <link rel="stylesheet" href="https://my.g-ads.org/assets/css/jalali.css">
    <link rel="stylesheet" href="https://my.g-ads.org/assets/css/style.min.css?v=14030701">
    <script src="https://my.g-ads.org/assets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/mainstyles.css">
    <title>صفحه اصلی</title>
  </head>
  <body id="mainArea" class="mainArea" >
    <!-- لــودر صفحات  -->
    <div class="preloader" style="display: none;">
      <img src="https://my.g-ads.org/assets/img/icon/fav@128.png" alt="loader" class="lds-ripple img-fluid">
    </div>
    <!-- شروع صفحه -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" >
      <!-- سایدبار --> <?php
            include 'sidebar.php';  
        ?> <div class="sidebarHolder"></div>
      <!-- کانتینر اصلی دیتا -->
      <div class="body-wrapper bg-light" >
        <!-- هدر بالای صفحه -->
        <header class="app-header">
          <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                  <i class="ti ti-menu-2"></i>
                </a>
              </li>
            </ul>
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
              <!-- <li class="nav-item"><span class="badge bg-dark fw-bold rounded-5 me-2 py-2"><i class="ti ti-wallet align-top"></i> ۳۵۷.۹۸۷.۷۸۹</span></li> -->
              <li id="message-count" class="cursor-pointer nav-item">
                <span class="me-3 position-relative notifTop">
                  <i class="ti ti-bell fs-8"></i>
                </span>
              </li>
              <li class="nav-item dropdown">
                <div class="nav-link pe-0" href="javascript:void(0)" id="user-profile" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex align-items-center cursor-pointer">
                    <div class="userTxt me-2 text-end">
                      <p id="dashBoard_fullNameTop" class="mb-1 fs-2 fw-bolder mb-2 lh-1">مهشید خودسیانی</p>
                      <span class="d-block text-primary mt-0 lh-1 fs-2">دسترسی کاربر</span>
                    </div>
                    <div class="user-profile-img">
                      <img id="dashBoard_img1" src="https://my.g-ads.org/assets/img/pic/user.jpg" class="rounded-circle" width="35" height="35" alt="">
                    </div>
                  </div>
                </div>
                <div class="dropdown-menu content-dd dropdown-menu-end" aria-labelledby="user-profile" id="user-profile-dropdown">
                  <div class="profile-dropdown position-relative" data-simplebar="">
                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                      <img id="dashBoard_img2" src="https://my.g-ads.org/assets/img/pic/user.jpg" class="rounded-circle" width="80" height="80" alt="">
                      <div class="ms-3">
                        <h5 id="dashBoard_fullName" class="mb-1 fs-3 fw-bolder">مهشید خودسیانی</h5>
                        <span class="mb-1 d-block text-primary">دسترسی کاربر</span>
                        <p class="mb-0 d-flex text-dark align-items-center gap-2">
                          <i class="ti ti-map-pin fs-4 text-muted"></i> آی پی: <b id="ip">158.58.63.110</b>
                        </p>
                      </div>
                    </div>
                    <div class="d-grid py-4 px-7 pt-8">
                      <div class="upgrade-plan bg-light-primary position-relative overflow-hidden rounded-4 p-4 mb-9">
                        <div class="row">
                          <div class="col-7">
                            <h5 class="fs-4 mb-3 w-100 fw-semibold text-dark"> کیورد پلنر جی ادز </h5>
                            <a class="btn btn-primary text-white" href="https://g-ads.org/persian-kw/" target="_blank">ورود</a>
                          </div>
                          <div class="col-5">
                            <div class="m-n4">
                              <img src="https://my.g-ads.org/assets/img/pic/profileMenuBg.png" alt="" class="w-100 ">
                            </div>
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-outline-danger" onclick="signOut()">
                        <i class="ti ti-logout me-1"></i>خروج </button>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </nav>
        </header>
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
              <a href="https://t.me/gadsinfo_bot" target="_blank" class="text-white fw-bolder">دریافت باقی مانده شارژ اکانت و امکانات دیگر در ربات تلگرامی جی ادز <i class="ti ti-circle-arrow-left fs-5 ms-2"></i>
              </a>
            </div>
            <div class="container-fluid" id="dashboard">
              <!-- <div class="alert alert-warning"><p class="fw-bolder mb-1">اطلاعیه تاخیر در شارژ اکانت‌های مانثلی</p>به دلیل به روزرسانی زیرساخت،‌شارژ اکانت‌های مانثلی با تاخیر و در روز دوشنبه ۲۱ خردادانجام خواهد شد. از صبوری شما متشکریم.</div> -->
              <div class="">
                <!--   نمودار قیمت ارز ها دسکتاپ -->
                <div class="row d-md-flex" id="currencys">
                  <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card w-100 bg-light-primary shadow-sm overflow-hidden">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div>
                            <h5 class="card-title fw-semibold">
                              <img src="/assets/img/icon/USD.svg" alt="قیمت دلار امروز"> قیمت دلار <span>70,801</span> تومان
                            </h5>
                            <div class="d-flex gap-2">
                              <span>
                                <span class="round-8 bg-success rounded-circle d-inline-block"></span>
                              </span>
                              <span style="font-size: 0.9em;"> آخرین به روزرسانی: <span>1403/08/18-16:20:19</span>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="currencyChart2" style="min-height: 80px;">
                        <div id="apexchartsvsothuv1" class="apexcharts-canvas apexchartsvsothuv1 apexcharts-theme-light" style="width: 368px; height: 80px;">
                          <svg id="SvgjsSvg1243" width="368" height="80" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                            <g id="SvgjsG1245" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)">
                              <defs id="SvgjsDefs1244">
                                <clipPath id="gridRectMaskvsothuv1">
                                  <rect id="SvgjsRect1251" width="373" height="81" x="-2.5" y="-0.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                </clipPath>
                                <clipPath id="forecastMaskvsothuv1"></clipPath>
                                <clipPath id="nonForecastMaskvsothuv1"></clipPath>
                                <clipPath id="gridRectMarkerMaskvsothuv1">
                                  <rect id="SvgjsRect1252" width="372" height="84" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                </clipPath>
                                <linearGradient id="SvgjsLinearGradient1257" x1="0" y1="0" x2="0" y2="1">
                                  <stop id="SvgjsStop1258" stop-opacity="0.65" stop-color="rgba(238,0,0,0.65)" offset="0"></stop>
                                  <stop id="SvgjsStop1259" stop-opacity="0.5" stop-color="rgba(247,128,128,0.5)" offset="1"></stop>
                                  <stop id="SvgjsStop1260" stop-opacity="0.5" stop-color="rgba(247,128,128,0.5)" offset="1"></stop>
                                </linearGradient>
                                <filter id="SvgjsFilter1262" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                  <feFlood id="SvgjsFeFlood1263" flood-color="#000000" flood-opacity="0.2" result="SvgjsFeFlood1263Out" in="SourceGraphic"></feFlood>
                                  <feComposite id="SvgjsFeComposite1264" in="SvgjsFeFlood1263Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1264Out"></feComposite>
                                  <feOffset id="SvgjsFeOffset1265" dx="0" dy="3" result="SvgjsFeOffset1265Out" in="SvgjsFeComposite1264Out"></feOffset>
                                  <feGaussianBlur id="SvgjsFeGaussianBlur1266" stdDeviation="5 " result="SvgjsFeGaussianBlur1266Out" in="SvgjsFeOffset1265Out"></feGaussianBlur>
                                  <feMerge id="SvgjsFeMerge1267" result="SvgjsFeMerge1267Out" in="SourceGraphic">
                                    <feMergeNode id="SvgjsFeMergeNode1268" in="SvgjsFeGaussianBlur1266Out"></feMergeNode>
                                    <feMergeNode id="SvgjsFeMergeNode1269" in="[object Arguments]"></feMergeNode>
                                  </feMerge>
                                  <feBlend id="SvgjsFeBlend1270" in="SourceGraphic" in2="SvgjsFeMerge1267Out" mode="normal" result="SvgjsFeBlend1270Out"></feBlend>
                                </filter>
                                <filter id="SvgjsFilter1272" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                  <feFlood id="SvgjsFeFlood1273" flood-color="#000000" flood-opacity="0.2" result="SvgjsFeFlood1273Out" in="SourceGraphic"></feFlood>
                                  <feComposite id="SvgjsFeComposite1274" in="SvgjsFeFlood1273Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1274Out"></feComposite>
                                  <feOffset id="SvgjsFeOffset1275" dx="0" dy="3" result="SvgjsFeOffset1275Out" in="SvgjsFeComposite1274Out"></feOffset>
                                  <feGaussianBlur id="SvgjsFeGaussianBlur1276" stdDeviation="5 " result="SvgjsFeGaussianBlur1276Out" in="SvgjsFeOffset1275Out"></feGaussianBlur>
                                  <feMerge id="SvgjsFeMerge1277" result="SvgjsFeMerge1277Out" in="SourceGraphic">
                                    <feMergeNode id="SvgjsFeMergeNode1278" in="SvgjsFeGaussianBlur1276Out"></feMergeNode>
                                    <feMergeNode id="SvgjsFeMergeNode1279" in="[object Arguments]"></feMergeNode>
                                  </feMerge>
                                  <feBlend id="SvgjsFeBlend1280" in="SourceGraphic" in2="SvgjsFeMerge1277Out" mode="normal" result="SvgjsFeBlend1280Out"></feBlend>
                                </filter>
                              </defs>
                              <line id="SvgjsLine1250" x1="0" y1="0" x2="0" y2="80" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="80" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line>
                              <g id="SvgjsG1281" class="apexcharts-xaxis" transform="translate(0, 0)">
                                <g id="SvgjsG1282" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                              </g>
                              <g id="SvgjsG1292" class="apexcharts-grid">
                                <g id="SvgjsG1293" class="apexcharts-gridlines-horizontal" style="display: none;">
                                  <line id="SvgjsLine1295" x1="0" y1="0" x2="368" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1296" x1="0" y1="16" x2="368" y2="16" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1297" x1="0" y1="32" x2="368" y2="32" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1298" x1="0" y1="48" x2="368" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1299" x1="0" y1="64" x2="368" y2="64" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1300" x1="0" y1="80" x2="368" y2="80" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                </g>
                                <g id="SvgjsG1294" class="apexcharts-gridlines-vertical" style="display: none;"></g>
                                <line id="SvgjsLine1302" x1="0" y1="80" x2="368" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                <line id="SvgjsLine1301" x1="0" y1="1" x2="0" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                              </g>
                              <g id="SvgjsG1253" class="apexcharts-area-series apexcharts-plot-series">
                                <g id="SvgjsG1254" class="apexcharts-series" seriesName="قیمت" data:longestSeries="true" rel="1" data:realIndex="0">
                                  <path id="SvgjsPath1261" d="M 0 80L 0 75.11999999999989C 18.4 75.11999999999989 34.17142857142857 71.88000000000011 52.57142857142857 71.88000000000011C 70.97142857142856 71.88000000000011 86.74285714285713 25.440000000000055 105.14285714285714 25.440000000000055C 123.54285714285713 25.440000000000055 139.3142857142857 36.36000000000013 157.7142857142857 36.36000000000013C 176.1142857142857 36.36000000000013 191.88571428571427 53.320000000000164 210.28571428571428 53.320000000000164C 228.68571428571425 53.320000000000164 244.45714285714286 11.7199999999998 262.85714285714283 11.7199999999998C 281.2571428571428 11.7199999999998 297.0285714285714 68.2800000000002 315.4285714285714 68.2800000000002C 333.8285714285714 68.2800000000002 349.59999999999997 72.7199999999998 368 72.7199999999998C 368 72.7199999999998 368 72.7199999999998 368 80M 368 72.7199999999998z" fill="url(#SvgjsLinearGradient1257)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskvsothuv1)" filter="url(#SvgjsFilter1262)" pathTo="M 0 80L 0 75.11999999999989C 18.4 75.11999999999989 34.17142857142857 71.88000000000011 52.57142857142857 71.88000000000011C 70.97142857142856 71.88000000000011 86.74285714285713 25.440000000000055 105.14285714285714 25.440000000000055C 123.54285714285713 25.440000000000055 139.3142857142857 36.36000000000013 157.7142857142857 36.36000000000013C 176.1142857142857 36.36000000000013 191.88571428571427 53.320000000000164 210.28571428571428 53.320000000000164C 228.68571428571425 53.320000000000164 244.45714285714286 11.7199999999998 262.85714285714283 11.7199999999998C 281.2571428571428 11.7199999999998 297.0285714285714 68.2800000000002 315.4285714285714 68.2800000000002C 333.8285714285714 68.2800000000002 349.59999999999997 72.7199999999998 368 72.7199999999998C 368 72.7199999999998 368 72.7199999999998 368 80M 368 72.7199999999998z" pathFrom="M -1 2912L -1 2912L 52.57142857142857 2912L 105.14285714285714 2912L 157.7142857142857 2912L 210.28571428571428 2912L 262.85714285714283 2912L 315.4285714285714 2912L 368 2912"></path>
                                  <path id="SvgjsPath1271" d="M 0 75.11999999999989C 18.4 75.11999999999989 34.17142857142857 71.88000000000011 52.57142857142857 71.88000000000011C 70.97142857142856 71.88000000000011 86.74285714285713 25.440000000000055 105.14285714285714 25.440000000000055C 123.54285714285713 25.440000000000055 139.3142857142857 36.36000000000013 157.7142857142857 36.36000000000013C 176.1142857142857 36.36000000000013 191.88571428571427 53.320000000000164 210.28571428571428 53.320000000000164C 228.68571428571425 53.320000000000164 244.45714285714286 11.7199999999998 262.85714285714283 11.7199999999998C 281.2571428571428 11.7199999999998 297.0285714285714 68.2800000000002 315.4285714285714 68.2800000000002C 333.8285714285714 68.2800000000002 349.59999999999997 72.7199999999998 368 72.7199999999998" fill="none" fill-opacity="1" stroke="#9f9f9f" stroke-opacity="1" stroke-linecap="butt" stroke-width="1" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskvsothuv1)" filter="url(#SvgjsFilter1272)" pathTo="M 0 75.11999999999989C 18.4 75.11999999999989 34.17142857142857 71.88000000000011 52.57142857142857 71.88000000000011C 70.97142857142856 71.88000000000011 86.74285714285713 25.440000000000055 105.14285714285714 25.440000000000055C 123.54285714285713 25.440000000000055 139.3142857142857 36.36000000000013 157.7142857142857 36.36000000000013C 176.1142857142857 36.36000000000013 191.88571428571427 53.320000000000164 210.28571428571428 53.320000000000164C 228.68571428571425 53.320000000000164 244.45714285714286 11.7199999999998 262.85714285714283 11.7199999999998C 281.2571428571428 11.7199999999998 297.0285714285714 68.2800000000002 315.4285714285714 68.2800000000002C 333.8285714285714 68.2800000000002 349.59999999999997 72.7199999999998 368 72.7199999999998" pathFrom="M -1 2912L -1 2912L 52.57142857142857 2912L 105.14285714285714 2912L 157.7142857142857 2912L 210.28571428571428 2912L 262.85714285714283 2912L 315.4285714285714 2912L 368 2912"></path>
                                  <g id="SvgjsG1255" class="apexcharts-series-markers-wrap" data:realIndex="0">
                                    <g class="apexcharts-series-markers">
                                      <circle id="SvgjsCircle1308" r="0" cx="0" cy="0" class="apexcharts-marker w0bttsas1 no-pointer-events" stroke="#ffffff" fill="#ee0000" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle>
                                    </g>
                                  </g>
                                </g>
                                <g id="SvgjsG1256" class="apexcharts-datalabels" data:realIndex="0"></g>
                              </g>
                              <line id="SvgjsLine1303" x1="0" y1="0" x2="368" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                              <line id="SvgjsLine1304" x1="0" y1="0" x2="368" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                              <g id="SvgjsG1305" class="apexcharts-yaxis-annotations"></g>
                              <g id="SvgjsG1306" class="apexcharts-xaxis-annotations"></g>
                              <g id="SvgjsG1307" class="apexcharts-point-annotations"></g>
                            </g>
                            <rect id="SvgjsRect1249" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                            <g id="SvgjsG1291" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                            <g id="SvgjsG1246" class="apexcharts-annotations"></g>
                          </svg>
                          <div class="apexcharts-legend" style="max-height: 40px;"></div>
                          <div class="apexcharts-tooltip apexcharts-theme-dark">
                            <div class="apexcharts-tooltip-title" style="font-family: g; font-size: 12px;"></div>
                            <div class="apexcharts-tooltip-series-group" style="order: 1;">
                              <span class="apexcharts-tooltip-marker" style="background-color: rgb(238, 0, 0);"></span>
                              <div class="apexcharts-tooltip-text" style="font-family: g; font-size: 12px;">
                                <div class="apexcharts-tooltip-y-group">
                                  <span class="apexcharts-tooltip-text-y-label"></span>
                                  <span class="apexcharts-tooltip-text-y-value"></span>
                                </div>
                                <div class="apexcharts-tooltip-goals-group">
                                  <span class="apexcharts-tooltip-text-goals-label"></span>
                                  <span class="apexcharts-tooltip-text-goals-value"></span>
                                </div>
                                <div class="apexcharts-tooltip-z-group">
                                  <span class="apexcharts-tooltip-text-z-label"></span>
                                  <span class="apexcharts-tooltip-text-z-value"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-dark">
                            <div class="apexcharts-yaxistooltip-text"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card w-100 bg-light-primary shadow-sm overflow-hidden">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div>
                            <h5 class="card-title fw-semibold">
                              <img src="/assets/img/icon/AED.svg" alt="قیمت درهم امروز"> قیمت درهم <span>19,659</span> تومان
                            </h5>
                            <div class="d-flex gap-2">
                              <span>
                                <span class="round-8 bg-success rounded-circle d-inline-block"></span>
                              </span>
                              <span style="font-size: 0.9em;"> آخرین به روزرسانی: <span>1403/08/18-16:20:19</span>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="currencyChart3" style="min-height: 80px;">
                        <div id="apexchartssbchoj0z" class="apexcharts-canvas apexchartssbchoj0z apexcharts-theme-light" style="width: 368px; height: 80px;">
                          <svg id="SvgjsSvg1310" width="368" height="80" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                            <g id="SvgjsG1312" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)">
                              <defs id="SvgjsDefs1311">
                                <clipPath id="gridRectMasksbchoj0z">
                                  <rect id="SvgjsRect1318" width="373" height="81" x="-2.5" y="-0.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                </clipPath>
                                <clipPath id="forecastMasksbchoj0z"></clipPath>
                                <clipPath id="nonForecastMasksbchoj0z"></clipPath>
                                <clipPath id="gridRectMarkerMasksbchoj0z">
                                  <rect id="SvgjsRect1319" width="372" height="84" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                </clipPath>
                                <linearGradient id="SvgjsLinearGradient1324" x1="0" y1="0" x2="0" y2="1">
                                  <stop id="SvgjsStop1325" stop-opacity="0.65" stop-color="rgba(238,0,0,0.65)" offset="0"></stop>
                                  <stop id="SvgjsStop1326" stop-opacity="0.5" stop-color="rgba(247,128,128,0.5)" offset="1"></stop>
                                  <stop id="SvgjsStop1327" stop-opacity="0.5" stop-color="rgba(247,128,128,0.5)" offset="1"></stop>
                                </linearGradient>
                                <filter id="SvgjsFilter1329" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                  <feFlood id="SvgjsFeFlood1330" flood-color="#000000" flood-opacity="0.2" result="SvgjsFeFlood1330Out" in="SourceGraphic"></feFlood>
                                  <feComposite id="SvgjsFeComposite1331" in="SvgjsFeFlood1330Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1331Out"></feComposite>
                                  <feOffset id="SvgjsFeOffset1332" dx="0" dy="3" result="SvgjsFeOffset1332Out" in="SvgjsFeComposite1331Out"></feOffset>
                                  <feGaussianBlur id="SvgjsFeGaussianBlur1333" stdDeviation="5 " result="SvgjsFeGaussianBlur1333Out" in="SvgjsFeOffset1332Out"></feGaussianBlur>
                                  <feMerge id="SvgjsFeMerge1334" result="SvgjsFeMerge1334Out" in="SourceGraphic">
                                    <feMergeNode id="SvgjsFeMergeNode1335" in="SvgjsFeGaussianBlur1333Out"></feMergeNode>
                                    <feMergeNode id="SvgjsFeMergeNode1336" in="[object Arguments]"></feMergeNode>
                                  </feMerge>
                                  <feBlend id="SvgjsFeBlend1337" in="SourceGraphic" in2="SvgjsFeMerge1334Out" mode="normal" result="SvgjsFeBlend1337Out"></feBlend>
                                </filter>
                                <filter id="SvgjsFilter1339" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                  <feFlood id="SvgjsFeFlood1340" flood-color="#000000" flood-opacity="0.2" result="SvgjsFeFlood1340Out" in="SourceGraphic"></feFlood>
                                  <feComposite id="SvgjsFeComposite1341" in="SvgjsFeFlood1340Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1341Out"></feComposite>
                                  <feOffset id="SvgjsFeOffset1342" dx="0" dy="3" result="SvgjsFeOffset1342Out" in="SvgjsFeComposite1341Out"></feOffset>
                                  <feGaussianBlur id="SvgjsFeGaussianBlur1343" stdDeviation="5 " result="SvgjsFeGaussianBlur1343Out" in="SvgjsFeOffset1342Out"></feGaussianBlur>
                                  <feMerge id="SvgjsFeMerge1344" result="SvgjsFeMerge1344Out" in="SourceGraphic">
                                    <feMergeNode id="SvgjsFeMergeNode1345" in="SvgjsFeGaussianBlur1343Out"></feMergeNode>
                                    <feMergeNode id="SvgjsFeMergeNode1346" in="[object Arguments]"></feMergeNode>
                                  </feMerge>
                                  <feBlend id="SvgjsFeBlend1347" in="SourceGraphic" in2="SvgjsFeMerge1344Out" mode="normal" result="SvgjsFeBlend1347Out"></feBlend>
                                </filter>
                              </defs>
                              <line id="SvgjsLine1317" x1="0" y1="0" x2="0" y2="80" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="80" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line>
                              <g id="SvgjsG1348" class="apexcharts-xaxis" transform="translate(0, 0)">
                                <g id="SvgjsG1349" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                              </g>
                              <g id="SvgjsG1359" class="apexcharts-grid">
                                <g id="SvgjsG1360" class="apexcharts-gridlines-horizontal" style="display: none;">
                                  <line id="SvgjsLine1362" x1="0" y1="0" x2="368" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1363" x1="0" y1="13.333333333333334" x2="368" y2="13.333333333333334" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1364" x1="0" y1="26.666666666666668" x2="368" y2="26.666666666666668" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1365" x1="0" y1="40" x2="368" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1366" x1="0" y1="53.333333333333336" x2="368" y2="53.333333333333336" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1367" x1="0" y1="66.66666666666667" x2="368" y2="66.66666666666667" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1368" x1="0" y1="80" x2="368" y2="80" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                </g>
                                <g id="SvgjsG1361" class="apexcharts-gridlines-vertical" style="display: none;"></g>
                                <line id="SvgjsLine1370" x1="0" y1="80" x2="368" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                <line id="SvgjsLine1369" x1="0" y1="1" x2="0" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                              </g>
                              <g id="SvgjsG1320" class="apexcharts-area-series apexcharts-plot-series">
                                <g id="SvgjsG1321" class="apexcharts-series" seriesName="قیمت" data:longestSeries="true" rel="1" data:realIndex="0">
                                  <path id="SvgjsPath1328" d="M 0 80L 0 67.60000000000036C 18.4 67.60000000000036 34.17142857142857 64.5333333333333 52.57142857142857 64.5333333333333C 70.97142857142856 64.5333333333333 86.74285714285713 21.600000000000364 105.14285714285714 21.600000000000364C 123.54285714285713 21.600000000000364 139.3142857142857 31.733333333333576 157.7142857142857 31.733333333333576C 176.1142857142857 31.733333333333576 191.88571428571427 47.333333333333485 210.28571428571428 47.333333333333485C 228.68571428571425 47.333333333333485 244.45714285714286 8.933333333333394 262.85714285714283 8.933333333333394C 281.2571428571428 8.933333333333394 297.0285714285714 61.333333333333485 315.4285714285714 61.333333333333485C 333.8285714285714 61.333333333333485 349.59999999999997 65.33333333333348 368 65.33333333333348C 368 65.33333333333348 368 65.33333333333348 368 80M 368 65.33333333333348z" fill="url(#SvgjsLinearGradient1324)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksbchoj0z)" filter="url(#SvgjsFilter1329)" pathTo="M 0 80L 0 67.60000000000036C 18.4 67.60000000000036 34.17142857142857 64.5333333333333 52.57142857142857 64.5333333333333C 70.97142857142856 64.5333333333333 86.74285714285713 21.600000000000364 105.14285714285714 21.600000000000364C 123.54285714285713 21.600000000000364 139.3142857142857 31.733333333333576 157.7142857142857 31.733333333333576C 176.1142857142857 31.733333333333576 191.88571428571427 47.333333333333485 210.28571428571428 47.333333333333485C 228.68571428571425 47.333333333333485 244.45714285714286 8.933333333333394 262.85714285714283 8.933333333333394C 281.2571428571428 8.933333333333394 297.0285714285714 61.333333333333485 315.4285714285714 61.333333333333485C 333.8285714285714 61.333333333333485 349.59999999999997 65.33333333333348 368 65.33333333333348C 368 65.33333333333348 368 65.33333333333348 368 80M 368 65.33333333333348z" pathFrom="M -1 2693.3333333333335L -1 2693.3333333333335L 52.57142857142857 2693.3333333333335L 105.14285714285714 2693.3333333333335L 157.7142857142857 2693.3333333333335L 210.28571428571428 2693.3333333333335L 262.85714285714283 2693.3333333333335L 315.4285714285714 2693.3333333333335L 368 2693.3333333333335"></path>
                                  <path id="SvgjsPath1338" d="M 0 67.60000000000036C 18.4 67.60000000000036 34.17142857142857 64.5333333333333 52.57142857142857 64.5333333333333C 70.97142857142856 64.5333333333333 86.74285714285713 21.600000000000364 105.14285714285714 21.600000000000364C 123.54285714285713 21.600000000000364 139.3142857142857 31.733333333333576 157.7142857142857 31.733333333333576C 176.1142857142857 31.733333333333576 191.88571428571427 47.333333333333485 210.28571428571428 47.333333333333485C 228.68571428571425 47.333333333333485 244.45714285714286 8.933333333333394 262.85714285714283 8.933333333333394C 281.2571428571428 8.933333333333394 297.0285714285714 61.333333333333485 315.4285714285714 61.333333333333485C 333.8285714285714 61.333333333333485 349.59999999999997 65.33333333333348 368 65.33333333333348" fill="none" fill-opacity="1" stroke="#9f9f9f" stroke-opacity="1" stroke-linecap="butt" stroke-width="1" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksbchoj0z)" filter="url(#SvgjsFilter1339)" pathTo="M 0 67.60000000000036C 18.4 67.60000000000036 34.17142857142857 64.5333333333333 52.57142857142857 64.5333333333333C 70.97142857142856 64.5333333333333 86.74285714285713 21.600000000000364 105.14285714285714 21.600000000000364C 123.54285714285713 21.600000000000364 139.3142857142857 31.733333333333576 157.7142857142857 31.733333333333576C 176.1142857142857 31.733333333333576 191.88571428571427 47.333333333333485 210.28571428571428 47.333333333333485C 228.68571428571425 47.333333333333485 244.45714285714286 8.933333333333394 262.85714285714283 8.933333333333394C 281.2571428571428 8.933333333333394 297.0285714285714 61.333333333333485 315.4285714285714 61.333333333333485C 333.8285714285714 61.333333333333485 349.59999999999997 65.33333333333348 368 65.33333333333348" pathFrom="M -1 2693.3333333333335L -1 2693.3333333333335L 52.57142857142857 2693.3333333333335L 105.14285714285714 2693.3333333333335L 157.7142857142857 2693.3333333333335L 210.28571428571428 2693.3333333333335L 262.85714285714283 2693.3333333333335L 315.4285714285714 2693.3333333333335L 368 2693.3333333333335"></path>
                                  <g id="SvgjsG1322" class="apexcharts-series-markers-wrap" data:realIndex="0">
                                    <g class="apexcharts-series-markers">
                                      <circle id="SvgjsCircle1376" r="0" cx="0" cy="0" class="apexcharts-marker wna6ufc7rl no-pointer-events" stroke="#ffffff" fill="#ee0000" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle>
                                    </g>
                                  </g>
                                </g>
                                <g id="SvgjsG1323" class="apexcharts-datalabels" data:realIndex="0"></g>
                              </g>
                              <line id="SvgjsLine1371" x1="0" y1="0" x2="368" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                              <line id="SvgjsLine1372" x1="0" y1="0" x2="368" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                              <g id="SvgjsG1373" class="apexcharts-yaxis-annotations"></g>
                              <g id="SvgjsG1374" class="apexcharts-xaxis-annotations"></g>
                              <g id="SvgjsG1375" class="apexcharts-point-annotations"></g>
                            </g>
                            <rect id="SvgjsRect1316" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                            <g id="SvgjsG1358" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                            <g id="SvgjsG1313" class="apexcharts-annotations"></g>
                          </svg>
                          <div class="apexcharts-legend" style="max-height: 40px;"></div>
                          <div class="apexcharts-tooltip apexcharts-theme-dark">
                            <div class="apexcharts-tooltip-title" style="font-family: g; font-size: 12px;"></div>
                            <div class="apexcharts-tooltip-series-group" style="order: 1;">
                              <span class="apexcharts-tooltip-marker" style="background-color: rgb(238, 0, 0);"></span>
                              <div class="apexcharts-tooltip-text" style="font-family: g; font-size: 12px;">
                                <div class="apexcharts-tooltip-y-group">
                                  <span class="apexcharts-tooltip-text-y-label"></span>
                                  <span class="apexcharts-tooltip-text-y-value"></span>
                                </div>
                                <div class="apexcharts-tooltip-goals-group">
                                  <span class="apexcharts-tooltip-text-goals-label"></span>
                                  <span class="apexcharts-tooltip-text-goals-value"></span>
                                </div>
                                <div class="apexcharts-tooltip-z-group">
                                  <span class="apexcharts-tooltip-text-z-label"></span>
                                  <span class="apexcharts-tooltip-text-z-value"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-dark">
                            <div class="apexcharts-yaxistooltip-text"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card w-100 bg-light-primary shadow-sm overflow-hidden">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div>
                            <h5 class="card-title fw-semibold">
                              <img src="/assets/img/icon/TL.svg" alt="قیمت لیر امروز"> قیمت لیر <span>2,060</span> تومان
                            </h5>
                            <div class="d-flex gap-2">
                              <span>
                                <span class="round-8 bg-success rounded-circle d-inline-block"></span>
                              </span>
                              <span style="font-size: 0.9em;"> آخرین به روزرسانی: <span>1403/08/18-16:20:19</span>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="currencyChart4" style="min-height: 80px;">
                        <div id="apexchartsax81jpef" class="apexcharts-canvas apexchartsax81jpef apexcharts-theme-light" style="width: 368px; height: 80px;">
                          <svg id="SvgjsSvg1378" width="368" height="80" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                            <g id="SvgjsG1380" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)">
                              <defs id="SvgjsDefs1379">
                                <clipPath id="gridRectMaskax81jpef">
                                  <rect id="SvgjsRect1386" width="373" height="81" x="-2.5" y="-0.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                </clipPath>
                                <clipPath id="forecastMaskax81jpef"></clipPath>
                                <clipPath id="nonForecastMaskax81jpef"></clipPath>
                                <clipPath id="gridRectMarkerMaskax81jpef">
                                  <rect id="SvgjsRect1387" width="372" height="84" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                </clipPath>
                                <linearGradient id="SvgjsLinearGradient1392" x1="0" y1="0" x2="0" y2="1">
                                  <stop id="SvgjsStop1393" stop-opacity="0.65" stop-color="rgba(238,0,0,0.65)" offset="0"></stop>
                                  <stop id="SvgjsStop1394" stop-opacity="0.5" stop-color="rgba(247,128,128,0.5)" offset="1"></stop>
                                  <stop id="SvgjsStop1395" stop-opacity="0.5" stop-color="rgba(247,128,128,0.5)" offset="1"></stop>
                                </linearGradient>
                                <filter id="SvgjsFilter1397" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                  <feFlood id="SvgjsFeFlood1398" flood-color="#000000" flood-opacity="0.2" result="SvgjsFeFlood1398Out" in="SourceGraphic"></feFlood>
                                  <feComposite id="SvgjsFeComposite1399" in="SvgjsFeFlood1398Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1399Out"></feComposite>
                                  <feOffset id="SvgjsFeOffset1400" dx="0" dy="3" result="SvgjsFeOffset1400Out" in="SvgjsFeComposite1399Out"></feOffset>
                                  <feGaussianBlur id="SvgjsFeGaussianBlur1401" stdDeviation="5 " result="SvgjsFeGaussianBlur1401Out" in="SvgjsFeOffset1400Out"></feGaussianBlur>
                                  <feMerge id="SvgjsFeMerge1402" result="SvgjsFeMerge1402Out" in="SourceGraphic">
                                    <feMergeNode id="SvgjsFeMergeNode1403" in="SvgjsFeGaussianBlur1401Out"></feMergeNode>
                                    <feMergeNode id="SvgjsFeMergeNode1404" in="[object Arguments]"></feMergeNode>
                                  </feMerge>
                                  <feBlend id="SvgjsFeBlend1405" in="SourceGraphic" in2="SvgjsFeMerge1402Out" mode="normal" result="SvgjsFeBlend1405Out"></feBlend>
                                </filter>
                                <filter id="SvgjsFilter1407" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                  <feFlood id="SvgjsFeFlood1408" flood-color="#000000" flood-opacity="0.2" result="SvgjsFeFlood1408Out" in="SourceGraphic"></feFlood>
                                  <feComposite id="SvgjsFeComposite1409" in="SvgjsFeFlood1408Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1409Out"></feComposite>
                                  <feOffset id="SvgjsFeOffset1410" dx="0" dy="3" result="SvgjsFeOffset1410Out" in="SvgjsFeComposite1409Out"></feOffset>
                                  <feGaussianBlur id="SvgjsFeGaussianBlur1411" stdDeviation="5 " result="SvgjsFeGaussianBlur1411Out" in="SvgjsFeOffset1410Out"></feGaussianBlur>
                                  <feMerge id="SvgjsFeMerge1412" result="SvgjsFeMerge1412Out" in="SourceGraphic">
                                    <feMergeNode id="SvgjsFeMergeNode1413" in="SvgjsFeGaussianBlur1411Out"></feMergeNode>
                                    <feMergeNode id="SvgjsFeMergeNode1414" in="[object Arguments]"></feMergeNode>
                                  </feMerge>
                                  <feBlend id="SvgjsFeBlend1415" in="SourceGraphic" in2="SvgjsFeMerge1412Out" mode="normal" result="SvgjsFeBlend1415Out"></feBlend>
                                </filter>
                              </defs>
                              <line id="SvgjsLine1385" x1="0" y1="0" x2="0" y2="80" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="80" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line>
                              <g id="SvgjsG1416" class="apexcharts-xaxis" transform="translate(0, 0)">
                                <g id="SvgjsG1417" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g>
                              </g>
                              <g id="SvgjsG1427" class="apexcharts-grid">
                                <g id="SvgjsG1428" class="apexcharts-gridlines-horizontal" style="display: none;">
                                  <line id="SvgjsLine1430" x1="0" y1="0" x2="368" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1431" x1="0" y1="13.333333333333334" x2="368" y2="13.333333333333334" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1432" x1="0" y1="26.666666666666668" x2="368" y2="26.666666666666668" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1433" x1="0" y1="40" x2="368" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1434" x1="0" y1="53.333333333333336" x2="368" y2="53.333333333333336" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1435" x1="0" y1="66.66666666666667" x2="368" y2="66.66666666666667" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                  <line id="SvgjsLine1436" x1="0" y1="80" x2="368" y2="80" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                </g>
                                <g id="SvgjsG1429" class="apexcharts-gridlines-vertical" style="display: none;"></g>
                                <line id="SvgjsLine1438" x1="0" y1="80" x2="368" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                <line id="SvgjsLine1437" x1="0" y1="1" x2="0" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                              </g>
                              <g id="SvgjsG1388" class="apexcharts-area-series apexcharts-plot-series">
                                <g id="SvgjsG1389" class="apexcharts-series" seriesName="قیمت" data:longestSeries="true" rel="1" data:realIndex="0">
                                  <path id="SvgjsPath1396" d="M 0 80L 0 73.33333333333303C 18.4 73.33333333333303 34.17142857142857 68 52.57142857142857 68C 70.97142857142856 68 86.74285714285713 24 105.14285714285714 24C 123.54285714285713 24 139.3142857142857 36 157.7142857142857 36C 176.1142857142857 36 191.88571428571427 52 210.28571428571428 52C 228.68571428571425 52 244.45714285714286 6.666666666666515 262.85714285714283 6.666666666666515C 281.2571428571428 6.666666666666515 297.0285714285714 56 315.4285714285714 56C 333.8285714285714 56 349.59999999999997 62.666666666666515 368 62.666666666666515C 368 62.666666666666515 368 62.666666666666515 368 80M 368 62.666666666666515z" fill="url(#SvgjsLinearGradient1392)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskax81jpef)" filter="url(#SvgjsFilter1397)" pathTo="M 0 80L 0 73.33333333333303C 18.4 73.33333333333303 34.17142857142857 68 52.57142857142857 68C 70.97142857142856 68 86.74285714285713 24 105.14285714285714 24C 123.54285714285713 24 139.3142857142857 36 157.7142857142857 36C 176.1142857142857 36 191.88571428571427 52 210.28571428571428 52C 228.68571428571425 52 244.45714285714286 6.666666666666515 262.85714285714283 6.666666666666515C 281.2571428571428 6.666666666666515 297.0285714285714 56 315.4285714285714 56C 333.8285714285714 56 349.59999999999997 62.666666666666515 368 62.666666666666515C 368 62.666666666666515 368 62.666666666666515 368 80M 368 62.666666666666515z" pathFrom="M -1 2826.6666666666665L -1 2826.6666666666665L 52.57142857142857 2826.6666666666665L 105.14285714285714 2826.6666666666665L 157.7142857142857 2826.6666666666665L 210.28571428571428 2826.6666666666665L 262.85714285714283 2826.6666666666665L 315.4285714285714 2826.6666666666665L 368 2826.6666666666665"></path>
                                  <path id="SvgjsPath1406" d="M 0 73.33333333333303C 18.4 73.33333333333303 34.17142857142857 68 52.57142857142857 68C 70.97142857142856 68 86.74285714285713 24 105.14285714285714 24C 123.54285714285713 24 139.3142857142857 36 157.7142857142857 36C 176.1142857142857 36 191.88571428571427 52 210.28571428571428 52C 228.68571428571425 52 244.45714285714286 6.666666666666515 262.85714285714283 6.666666666666515C 281.2571428571428 6.666666666666515 297.0285714285714 56 315.4285714285714 56C 333.8285714285714 56 349.59999999999997 62.666666666666515 368 62.666666666666515" fill="none" fill-opacity="1" stroke="#9f9f9f" stroke-opacity="1" stroke-linecap="butt" stroke-width="1" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskax81jpef)" filter="url(#SvgjsFilter1407)" pathTo="M 0 73.33333333333303C 18.4 73.33333333333303 34.17142857142857 68 52.57142857142857 68C 70.97142857142856 68 86.74285714285713 24 105.14285714285714 24C 123.54285714285713 24 139.3142857142857 36 157.7142857142857 36C 176.1142857142857 36 191.88571428571427 52 210.28571428571428 52C 228.68571428571425 52 244.45714285714286 6.666666666666515 262.85714285714283 6.666666666666515C 281.2571428571428 6.666666666666515 297.0285714285714 56 315.4285714285714 56C 333.8285714285714 56 349.59999999999997 62.666666666666515 368 62.666666666666515" pathFrom="M -1 2826.6666666666665L -1 2826.6666666666665L 52.57142857142857 2826.6666666666665L 105.14285714285714 2826.6666666666665L 157.7142857142857 2826.6666666666665L 210.28571428571428 2826.6666666666665L 262.85714285714283 2826.6666666666665L 315.4285714285714 2826.6666666666665L 368 2826.6666666666665"></path>
                                  <g id="SvgjsG1390" class="apexcharts-series-markers-wrap" data:realIndex="0">
                                    <g class="apexcharts-series-markers">
                                      <circle id="SvgjsCircle1444" r="0" cx="0" cy="0" class="apexcharts-marker wm040onde no-pointer-events" stroke="#ffffff" fill="#ee0000" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle>
                                    </g>
                                  </g>
                                </g>
                                <g id="SvgjsG1391" class="apexcharts-datalabels" data:realIndex="0"></g>
                              </g>
                              <line id="SvgjsLine1439" x1="0" y1="0" x2="368" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                              <line id="SvgjsLine1440" x1="0" y1="0" x2="368" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                              <g id="SvgjsG1441" class="apexcharts-yaxis-annotations"></g>
                              <g id="SvgjsG1442" class="apexcharts-xaxis-annotations"></g>
                              <g id="SvgjsG1443" class="apexcharts-point-annotations"></g>
                            </g>
                            <rect id="SvgjsRect1384" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                            <g id="SvgjsG1426" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                            <g id="SvgjsG1381" class="apexcharts-annotations"></g>
                          </svg>
                          <div class="apexcharts-legend" style="max-height: 40px;"></div>
                          <div class="apexcharts-tooltip apexcharts-theme-dark">
                            <div class="apexcharts-tooltip-title" style="font-family: g; font-size: 12px;"></div>
                            <div class="apexcharts-tooltip-series-group" style="order: 1;">
                              <span class="apexcharts-tooltip-marker" style="background-color: rgb(238, 0, 0);"></span>
                              <div class="apexcharts-tooltip-text" style="font-family: g; font-size: 12px;">
                                <div class="apexcharts-tooltip-y-group">
                                  <span class="apexcharts-tooltip-text-y-label"></span>
                                  <span class="apexcharts-tooltip-text-y-value"></span>
                                </div>
                                <div class="apexcharts-tooltip-goals-group">
                                  <span class="apexcharts-tooltip-text-goals-label"></span>
                                  <span class="apexcharts-tooltip-text-goals-value"></span>
                                </div>
                                <div class="apexcharts-tooltip-z-group">
                                  <span class="apexcharts-tooltip-text-z-label"></span>
                                  <span class="apexcharts-tooltip-text-z-value"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-dark">
                            <div class="apexcharts-yaxistooltip-text"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- آخرین اکانت های شارژ شده -->
                <div class="row mb-4" style="padding-left: 0;">
                  <div class="col-12 d-flex flex-row justify-content-between mb-md-4 mb-0 align-items-center">
                    <p class="fs-4 fw-bolder mb-0">
                      <i class="ti ti-ad me-1 fs-8 text-primary"></i> لیست اکانت‌ها
                    </p>
                    <a href="https://my.g-ads.org/Client/ClientAccount/AccountsGoogle" class="btn btn-sm mb-1 waves-effect waves-light btn-outline-primary d-none d-md-block">مشاهده اکانت‌ها <i class="ti ti-circle-arrow-left"></i>
                    </a>
                  </div>
                  <div class="col-12 d-block d-md-none  px-4">
                    <a href="https://my.g-ads.org/Client/ClientAccount/AccountsGoogle" class="btn mb-1 waves-effect waves-light btn-outline-primary w-100 my-3">مشاهده اکانت‌ها <i class="ti ti-circle-arrow-left"></i>
                    </a>
                  </div>
                  <div class="col-12 order-2 order-md-1">
                    <div class="row" id="accountsgoogle"></div>
                  </div>
                </div>
                <!-- آمار کلی پنل کاربری -->
                <div class="row">
                  <div class="col-md-5 col-12 d-flex align-items-stretch">
                    <div class="card w-100">
                      <div class="card-body">
                        <!-- بر اساس استتوس فعال و ساسپند -->
                        <h5 class="card-title fw-semibold text-center mb-3">آمار کلی اکانت های تبلیغاتی</h5>
                        <div id="accountGoogleChart" class="mb-4" style="min-height: 178.7px;">
                          <div id="apexcharts4p5thmer" class="apexcharts-canvas apexcharts4p5thmer apexcharts-theme-light" style="width: 406px; height: 178.7px;">
                            <svg id="SvgjsSvg1224" width="406" height="178.7" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                              <g id="SvgjsG1226" class="apexcharts-inner apexcharts-graphical" transform="translate(116, 0)">
                                <defs id="SvgjsDefs1225">
                                  <clipPath id="gridRectMask4p5thmer">
                                    <rect id="SvgjsRect1228" width="182" height="200" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                  </clipPath>
                                  <clipPath id="forecastMask4p5thmer"></clipPath>
                                  <clipPath id="nonForecastMask4p5thmer"></clipPath>
                                  <clipPath id="gridRectMarkerMask4p5thmer">
                                    <rect id="SvgjsRect1229" width="180" height="202" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                  </clipPath>
                                </defs>
                                <g id="SvgjsG1230" class="apexcharts-pie">
                                  <g id="SvgjsG1231" transform="translate(0, 0) scale(1)">
                                    <circle id="SvgjsCircle1232" r="59.890243902439025" cx="88" cy="88" fill="transparent"></circle>
                                    <g id="SvgjsG1233" class="apexcharts-slices">
                                      <g id="SvgjsG1234" class="apexcharts-series apexcharts-pie-series" seriesName="فعال" rel="1" data:realIndex="0">
                                        <path id="SvgjsPath1235" d="M 88 8.146341463414629 A 79.85365853658537 79.85365853658537 0 0 1 88 8.146341463414629 L 88 28.109756097560975 A 59.890243902439025 59.890243902439025 0 0 0 88 28.109756097560975 L 88 8.146341463414629 z" fill="var(--bs-success)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="0" data:startAngle="0" data:strokeWidth="0" data:value="0" data:pathOrig="M 88 8.146341463414629 A 79.85365853658537 79.85365853658537 0 0 1 88 8.146341463414629 L 88 28.109756097560975 A 59.890243902439025 59.890243902439025 0 0 0 88 28.109756097560975 L 88 8.146341463414629 z"></path>
                                      </g>
                                      <g id="SvgjsG1236" class="apexcharts-series apexcharts-pie-series" seriesName="غیرxفعال" rel="2" data:realIndex="1">
                                        <path id="SvgjsPath1237" d="M 88 8.146341463414629 A 79.85365853658537 79.85365853658537 0 0 1 88 8.146341463414629 L 88 28.109756097560975 A 59.890243902439025 59.890243902439025 0 0 0 88 28.109756097560975 L 88 8.146341463414629 z" fill="var(--bs-danger)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="0" data:startAngle="0" data:strokeWidth="0" data:value="0" data:pathOrig="M 88 8.146341463414629 A 79.85365853658537 79.85365853658537 0 0 1 88 8.146341463414629 L 88 28.109756097560975 A 59.890243902439025 59.890243902439025 0 0 0 88 28.109756097560975 L 88 8.146341463414629 z"></path>
                                      </g>
                                    </g>
                                  </g>
                                  <g id="SvgjsG1238" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)">
                                    <text id="SvgjsText1239" font-family="g" x="88" y="95" text-anchor="middle" dominant-baseline="auto" font-size="20px" font-weight="600" fill="#000000" class="apexcharts-text apexcharts-datalabel-label" style="font-family: g;"></text>
                                  </g>
                                </g>
                                <line id="SvgjsLine1240" x1="0" y1="0" x2="176" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                <line id="SvgjsLine1241" x1="0" y1="0" x2="176" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                              </g>
                              <g id="SvgjsG1227" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-dark">
                              <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                <span class="apexcharts-tooltip-marker" style="background-color: var(--bs-success);"></span>
                                <div class="apexcharts-tooltip-text" style="font-family: g; font-size: 12px;">
                                  <div class="apexcharts-tooltip-y-group">
                                    <span class="apexcharts-tooltip-text-y-label"></span>
                                    <span class="apexcharts-tooltip-text-y-value"></span>
                                  </div>
                                  <div class="apexcharts-tooltip-goals-group">
                                    <span class="apexcharts-tooltip-text-goals-label"></span>
                                    <span class="apexcharts-tooltip-text-goals-value"></span>
                                  </div>
                                  <div class="apexcharts-tooltip-z-group">
                                    <span class="apexcharts-tooltip-text-z-label"></span>
                                    <span class="apexcharts-tooltip-text-z-value"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="apexcharts-tooltip-series-group" style="order: 2;">
                                <span class="apexcharts-tooltip-marker" style="background-color: var(--bs-danger);"></span>
                                <div class="apexcharts-tooltip-text" style="font-family: g; font-size: 12px;">
                                  <div class="apexcharts-tooltip-y-group">
                                    <span class="apexcharts-tooltip-text-y-label"></span>
                                    <span class="apexcharts-tooltip-text-y-value"></span>
                                  </div>
                                  <div class="apexcharts-tooltip-goals-group">
                                    <span class="apexcharts-tooltip-text-goals-label"></span>
                                    <span class="apexcharts-tooltip-text-goals-value"></span>
                                  </div>
                                  <div class="apexcharts-tooltip-z-group">
                                    <span class="apexcharts-tooltip-text-z-label"></span>
                                    <span class="apexcharts-tooltip-text-z-value"></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex align-items-center text-center">
                            <div>
                              <i class="ti ti-circle-filled text-primary"></i>
                              <h6 class="fw-semibold text-dark fs-4 mb-0" key="dashboard_accountGoogle_count">-</h6>
                              <p class="fs-3 mb-0 fw-normal">تعداد اکانت‌ها</p>
                            </div>
                          </div>
                          <div class="d-flex align-items-center text-center">
                            <div>
                              <i class="ti ti-circle-filled text-success"></i>
                              <h6 class="fw-semibold text-dark fs-4 mb-0" key="dashboard_accountGoogle_1_count">-</h6>
                              <p class="fs-3 mb-0 fw-normal">فعال</p>
                            </div>
                          </div>
                          <div class="d-flex align-items-center text-center">
                            <div>
                              <i class="ti ti-circle-filled text-danger"></i>
                              <h6 class="fw-semibold text-dark fs-4 mb-0" key="dashboard_accountGoogle_0_count">-</h6>
                              <p class="fs-3 mb-0 fw-normal">غیر فعال</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-7 col-12 d-flex align-items-stretch">
                    <div class="card w-100 bg-white overflow-hidden">
                      <div id="activity-status">
                        <img src="https://g-ads.org/wp-content/uploads/2024/01/panelAds.jpg" alt="" class="img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- جدول فعالیت های اخیر اخیر حالت نمایش کلی -->
                <div class="row">
                  <div class="col-md-12 col-lg-8 d-flex align-items-stretch">
                    <div class="card w-100">
                      <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-3">
                          <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">آخرین سفارشات شما</h5>
                            <p class="card-subtitle">نمای کلی از آخرین سفارش های شما</p>
                          </div>
                          <div>
                            <a href="https://my.g-ads.org/Client/ClientInvoice/Invoices" class="btn mb-1 waves-effect waves-light btn-outline-primary d-none d-md-block">مشاهده سفارشات <i class="ti ti-circle-arrow-left"></i>
                            </a>
                            <a href="https://my.g-ads.org/Client/ClientInvoice/Invoices" class="btn mb-1 waves-effect waves-light btn-outline-primary d-block d-md-none w-100">مشاهده سفارشات <i class="ti ti-circle-arrow-left"></i>
                            </a>
                          </div>
                        </div>
                        <div class="table-responsive">
                          <div id="grid_invoices_wrapper" class="dataTables_wrapper no-footer">
                            <div id="grid_invoices_processing" class="dataTables_processing" style="display: none;">
                              <div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                              </div>
                            </div>
                            <table id="grid_invoices" class="table align-middle text-nowrap mb-0 dataTable no-footer" style="width: 702px;">
                              <thead>
                                <tr>
                                  <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 182px;">سفارش</th>
                                  <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 183px;">وضعیت</th>
                                  <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 241px;">مبلغ فاکتور</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="odd">
                                  <td valign="top" colspan="3" class="dataTables_empty">دیتایی برای نمایش وجود ندارد!</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-12 d-flex align-items-stretch">
                    <div class="card w-100">
                      <div class="card-body">
                        <div class="mb-4">
                          <h5 class="card-title fw-semibold">آخرین تیکت‌ها</h5>
                          <p class="card-subtitle">نمای کلی آخرین تیکت‌های شما</p>
                        </div>
                        <ul class="timeline-widget mb-1 position-relative" id="tickets"></ul>
                        <a href="https://my.g-ads.org/Client/ClientTicket/Tickets" class="btn btn-outline-primary w-100 mt-4"> مشاهده تیکت ها <i class="ti ti-circle-arrow-left fs-6"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <template id="tickets_template">
              <li class="timeline-item d-flex position-relative overflow-hidden">
                <div class="timeline-time text-dark flex-shrink-0 text-end fs-2">
                  <i class="ti ti-calendar ms-1"></i>#modifiedDateH# <br>
                  <i class="ti ti-clock ms-1"></i>#modifiedDateM#
                </div>
                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                  <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                  <span class="timeline-badge-border d-block flex-shrink-0"></span>
                </div>
                <div class="timeline-desc fs-3 text-dark mt-n1">
                  <span class="badge bg-#stateClass# d-block px-1 fs-1 mb-1">#stateDescription#</span>
                  <span class="fw-bolder">#title#</span>
                </div>
              </li>
            </template>
            <template id="currencys_template">
              <div class="col-md-4 d-flex align-items-stretch">
                <div class="card w-100 bg-light-primary shadow-sm overflow-hidden">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div>
                        <h5 class="card-title fw-semibold">
                          <img src="/assets/img/icon/#code#.svg" alt="قیمت #title# امروز"> قیمت #title# <span>#iranAmount#</span> تومان
                        </h5>
                        <div class="d-flex gap-2">
                          <span>
                            <span class="round-8 bg-success rounded-circle d-inline-block"></span>
                          </span>
                          <span style="font-size: 0.9em;"> آخرین به روزرسانی: <span>#modifiedDate#</span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="currencyChart#currencyType#"></div>
                </div>
              </div>
            </template>
            <template id="accountGoogle_template">
              <div class="accountGoogle_item col-12 col-md-4 mb-2" data-id="#id#" data-currencycode="#currencyCode#">
                <div class="card mb-0">
                  <div class="card-header text-end pb-2 cursor-pointer position-relative bg-white">
                    <div class="px-0 rounded-pill collapsed accBoxHed">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <span class="campTypeBadge">GoogleAds</span>
                        </div>
                        <div class="d-flex flex-row justify-content-end mb-1">
                          <span class="badge bg-primary border rounded-5 border-primary text-white flex-row fs-2 text-uppercase">#currencyCode#</span>
                        </div>
                      </div>
                      <p class="accountGoogle_name fw-bolder fs-5 mb-0" style="direction: ltr">#name#</p>
                      <p class="mb-1" style="direction:ltr">CID: <span>#customerId#</span>
                      </p>
                      <button class=" btn btn-sm btn-success icoAccordian position-absolute text-white" data-bs-toggle="collapse" data-bs-target="#acc_#id#" aria-expanded="false" aria-controls="acc_#id#">
                        <i class="ti ti-circle-arrow-right-filled fs-9"></i>
                        <i class="ti ti-circle-arrow-down-filled fs-9"></i>شارژ کنید </button>
                    </div>
                  </div>
                  <div class="card-body p-0 shadow-none">
                    <div class="collapse p-3" id="acc_#id#">
                      <form action="#">
                        <div class="form-floating mb-2">
                          <input type="text" class="accountGoogle_amount form-control mb-2 text-end" placeholder="عدد وارد کنید">
                          <p class="form-control-feedback text text-center">قیمت ارز با کارمزد: <span class="accountGoogle_currencyIranAmount">0</span>
                          </p>
                          <label>
                            <i class="ti ti-#currencyCode# me-2 fs-5 text-primary fw-bolder"></i>عدد وارد کنید </label>
                        </div>
                        <p class="accountGoogle_serviceCost_parent text-center"> قابل پرداخت: <span class="accountGoogle_serviceCost fw-bolder text-success fs-6">0</span>
                        </p>
                        <div class="text-center">
                          <button type="button" class="accountGoogle_submit btn btn-primary" disabled="">شارژ کن <i class="ti ti-rocket"></i>
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </template>
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
        <a href="https://my.g-ads.org/Client/ClientMessage/Messages" class="fw-bolder text-primary"> تاریخچه اعلان‌‌ها <i class="ti ti-arrow-left ms-2 fs-7"></i>
        </a>
      </p>
    </div>
    <div id="modalContainer"></div>
    <footer>
      <div id="experts">
        <div id="6d9f64b7-09ab-495a-bf6d-8cb2b8c0e098" class="d-none expertBox bg-white shadow px-2 py-3 w-100 rounded-3 mb-3">
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
              <div>
                <img decoding="async" src="https://g-ads.org/wp-content/uploads/2023/09/z_sharifi.jpg" alt="شریفی - کارشناس گوگل ادز" class="me-2">
              </div>
              <div>
                <p class="fw-bold fs-4 mb-0 text-primary">زهرا شریفی</p>
                <p class="fw-normal fs-3 mb-0">داخلی ۱۰۷</p>
              </div>
            </div>
            <div class="d-flex">
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="tel:09056622606">
                <i class="fs-5 ti ti-phone"></i>
              </a>
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://api.whatsapp.com/send?phone=989056622606&amp;text=%D8%B3%D9%84%D8%A7%D9%85.%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87%20%D8%AF%D8%B1%20%D8%B2%D9%85%DB%8C%D9%86%D9%87%20%D8%AA%D8%A8%D9%84%DB%8C%D8%BA%D8%A7%D8%AA%20%DA%AF%D9%88%DA%AF%D9%84%20%D8%AA%D9%85%D8%A7%D8%B3%20%DA%AF%D8%B1%D9%81%D8%AA%D9%85">
                <i class="fs-5 ti ti-brand-whatsapp"></i>
              </a>
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://t.me/gads_support_7">
                <i class="fs-5 ti ti-brand-telegram"></i>
              </a>
            </div>
          </div>
        </div>
        <div id="a0c692e5-8e23-43ca-a171-145a2f0f9f0c" class="expertBox bg-white shadow px-2 py-3 w-100 rounded-3 mb-3">
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
              <div>
                <img decoding="async" src="https://g-ads.org//wp-content/uploads/2023/09/n_tehrani.jpg" alt="تهرانی - کارشناس گوگل ادز" class="me-2">
              </div>
              <div>
                <p class="fw-bold fs-4 mb-0 text-primary">نفس تهرانی</p>
                <p class="fw-normal fs-3 mb-0">داخلی ۱۰۶</p>
              </div>
            </div>
            <div class="d-flex">
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="tel:09026015384">
                <i class="fs-5 ti ti-phone"></i>
              </a>
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://api.whatsapp.com/send?phone=989026015384&amp;text=%D8%B3%D9%84%D8%A7%D9%85.%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87%20%D8%AF%D8%B1%20%D8%B2%D9%85%DB%8C%D9%86%D9%87%20%D8%AA%D8%A8%D9%84%DB%8C%D8%BA%D8%A7%D8%AA%20%DA%AF%D9%88%DA%AF%D9%84%20%D8%AA%D9%85%D8%A7%D8%B3%20%DA%AF%D8%B1%D9%81%D8%AA%D9%85">
                <i class="fs-5 ti ti-brand-whatsapp"></i>
              </a>
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://t.me/gads_support_6">
                <i class="fs-5 ti ti-brand-telegram"></i>
              </a>
            </div>
          </div>
        </div>
        <div id="fdf40a35-a079-40f1-bbae-5f4e6fcf175d" class="d-none expertBox bg-white shadow px-2 py-3 w-100 rounded-3 mb-3">
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
              <div>
                <img decoding="async" src="https://g-ads.org/wp-content/uploads/2024/07/sh_kiazar.jpg" alt="کیا - کارشناس گوگل ادز" class="me-2">
              </div>
              <div>
                <p class="fw-bold fs-4 mb-0 text-primary">شیوا کیا</p>
                <p class="fw-normal fs-3 mb-0">داخلی ۱۰۴</p>
              </div>
            </div>
            <div class="d-flex">
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="tel:09396410499">
                <i class="fs-5 ti ti-phone"></i>
              </a>
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://api.whatsapp.com/send?phone=989396410499&amp;text=%D8%B3%D9%84%D8%A7%D9%85.%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87%20%D8%AF%D8%B1%20%D8%B2%D9%85%DB%8C%D9%86%D9%87%20%D8%AA%D8%A8%D9%84%DB%8C%D8%BA%D8%A7%D8%AA%20%DA%AF%D9%88%DA%AF%D9%84%20%D8%AA%D9%85%D8%A7%D8%B3%20%DA%AF%D8%B1%D9%81%D8%AA%D9%85">
                <i class="fs-5 ti ti-brand-whatsapp"></i>
              </a>
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://t.me/g_ads_support_4">
                <i class="fs-5 ti ti-brand-telegram"></i>
              </a>
            </div>
          </div>
        </div>
        <div id="8131b214-bc23-4460-baca-408fa025e32e" class="d-none expertBox bg-white shadow px-2 py-3 w-100 rounded-3 mb-3">
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
              <div>
                <img decoding="async" src="https://g-ads.org//wp-content/uploads/2023/09/m_siminpour.jpg" alt="سیمین پور - کارشناس گوگل ادز" class="me-2">
              </div>
              <div>
                <p class="fw-bold fs-4 mb-0 text-primary">ملیحه سیمین پور</p>
                <p class="fw-normal fs-3 mb-0">‌داخلی ۱۰۵</p>
              </div>
            </div>
            <div class="d-flex ms-3">
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="tel:09374779838">
                <i class="fs-5 ti ti-phone"></i>
              </a>
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://api.whatsapp.com/send?phone=989374779838&amp;text=%D8%B3%D9%84%D8%A7%D9%85.%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87%20%D8%AF%D8%B1%20%D8%B2%D9%85%DB%8C%D9%86%D9%87%20%D8%AA%D8%A8%D9%84%DB%8C%D8%BA%D8%A7%D8%AA%20%DA%AF%D9%88%DA%AF%D9%84%20%D8%AA%D9%85%D8%A7%D8%B3%20%DA%AF%D8%B1%D9%81%D8%AA%D9%85">
                <i class="fs-5 ti ti-brand-whatsapp"></i>
              </a>
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://t.me/gads_support_5">
                <i class="fs-5 ti ti-brand-telegram"></i>
              </a>
            </div>
          </div>
        </div>
        <div id="ff314126-9661-4161-8b3c-043564045adc" class="d-none expertBox bg-white shadow px-2 py-3 w-100 rounded-3 mb-3">
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
              <div>
                <img decoding="async" src="https://g-ads.org//wp-content/uploads/2023/09/k_bonakdar.jpg" alt="بنکدار - کارشناس گوگل ادز" class="me-2">
              </div>
              <div>
                <p class="fw-bold fs-4 mb-0 text-primary">نیکا بنکدار</p>
                <p class="fw-normal fs-3 mb-0">داخلی ۱۰۸</p>
              </div>
            </div>
            <div class="d-flex">
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="tel:09056633606">
                <i class="fs-5 ti ti-phone"></i>
              </a>
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://api.whatsapp.com/send?phone=989056633606&amp;text=%D8%B3%D9%84%D8%A7%D9%85.%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87%20%D8%AF%D8%B1%20%D8%B2%D9%85%DB%8C%D9%86%D9%87%20%D8%AA%D8%A8%D9%84%DB%8C%D8%BA%D8%A7%D8%AA%20%DA%AF%D9%88%DA%AF%D9%84%20%D8%AA%D9%85%D8%A7%D8%B3%20%DA%AF%D8%B1%D9%81%D8%AA%D9%85">
                <i class="fs-5 ti ti-brand-whatsapp"></i>
              </a>
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://t.me/g_ads_support_8">
                <i class="fs-5 ti ti-brand-telegram"></i>
              </a>
            </div>
          </div>
        </div>
        <div id="b240d8da-e2ee-45d8-9006-32e96ba8dcec" class="d-none expertBox bg-white shadow px-2 py-3 w-100 rounded-3 mb-3">
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
              <div>
                <img decoding="async" src="https://g-ads.org//wp-content/uploads/2023/09/f_mohammadi.jpg" alt="محمدی - کارشناس گوگل ادز" class="me-2">
              </div>
              <div>
                <p class="fw-bold fs-4 mb-0 text-primary">فرهاد محمدی</p>
                <p class="fw-normal fs-3 mb-0">داخلی ۱۰۲</p>
              </div>
            </div>
            <div class="d-flex ms-3">
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="tel:09308727143">
                <i class="fs-5 ti ti-phone"></i>
              </a>
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://api.whatsapp.com/send?phone=989308727143&amp;text=%D8%B3%D9%84%D8%A7%D9%85.%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87%20%D8%AF%D8%B1%20%D8%B2%D9%85%DB%8C%D9%86%D9%87%20%D8%AA%D8%A8%D9%84%DB%8C%D8%BA%D8%A7%D8%AA%20%DA%AF%D9%88%DA%AF%D9%84%20%D8%AA%D9%85%D8%A7%D8%B3%20%DA%AF%D8%B1%D9%81%D8%AA%D9%85">
                <i class="fs-5 ti ti-brand-whatsapp"></i>
              </a>
              <a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://t.me/gads_support_2">
                <i class="fs-5 ti ti-brand-telegram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- <script src="https://my.g-ads.org/assets/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="https://my.g-ads.org/assets/js/bootstrap-switch.js"></script> -->

    <!-- <script src="https://my.g-ads.org/assets/js/app-style-switcher.js"></script> -->

    <script src="js/app.min.js"></script>
    <script src="js/app.init.js"></script>
    <script src="js/jalali.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <!-- <script src="https://my.g-ads.org/assets/js/custom.js"></script> -->
    <!-- <script src="https://my.g-ads.org/assets/js/apex.js"></script> -->
    <!-- <script src="https://my.g-ads.org/assets/js/select2.js"></script> -->
    <!-- <script src="https://my.g-ads.org/assets/js/datatable/jqueryDatatable.js"></script> -->



   


    <script src="js/javascripts.js"></script>

    

    <jdp-container style="z-index: 1000;"></jdp-container>
    <jdp-overlay style="z-index: 999;"></jdp-overlay>
  </body>
  </body>
</html>