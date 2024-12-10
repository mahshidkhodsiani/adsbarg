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
            include "config.php";
            include 'sidebar.php';  
            include 'PersianCalendar.php';  
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
              <!-- <div class="alert alert-warning"><p class="fw-bolder mb-1">اطلاعیه تاخیر در شارژ اکانت‌های مانثلی</p>به دلیل به روزرسانی زیرساخت،‌شارژ اکانت‌های مانثلی با تاخیر و در روز دوشنبه ۲۱ خردادانجام خواهد شد. از صبوری شما متشکریم.</div> -->
              <div class="">
                <!--   نمودار قیمت ارز ها دسکتاپ -->
                   
                <?php 
                $currencys = "SELECT * FROM currencys ORDER BY id DESC LIMIT 1";
                $result_currency = $conn->query($currencys);
                if ($result_currency->num_rows > 0) {
                  $row_currency = $result_currency->fetch_assoc();
                }
                ?>
                <div class="row d-md-flex" id="currencys">
                  <div class="col-md-3 d-flex align-items-stretch">
                    <div class="card w-100 bg-light-primary shadow-sm overflow-hidden">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div>
                            <h6 class="card-title fw-semibold" style="font-family: system-ui;">
                              <img src="images/usd.jpg" alt="قیمت دلار امروز" width="20px"> قیمت حواله دلار آمریکا <span><?= number_format(floatval($row_currency['dollar']) * 100) ?></span> تومان
                            </h6>
                            <p>آخرین بروز رسانی : <?= mds_date("l j F Y H:i:s", strtotime($row_currency['updated']), 0);?></p>
                
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
                  <div class="col-md-3 d-flex align-items-stretch">
                    <div class="card w-100 bg-light-primary shadow-sm overflow-hidden">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div>
                            <h6 class="card-title fw-semibold" style="font-family: system-ui;">
                              <img src="images/aed.png" alt="قیمت درهم امروز" width="15px"> قیمت حواله درهم امارات <span><?=number_format(floatval($row_currency['derham']) * 100) ?></span> تومان
                            </h6>
                            <p>آخرین بروز رسانی : <?= mds_date("l j F Y H:i:s", strtotime($row_currency['updated']), 0);?></p>
               
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
                  <div class="col-md-3 d-flex align-items-stretch">
                    <div class="card w-100 bg-light-primary shadow-sm overflow-hidden">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div>
                            <h6 class="card-title fw-semibold" style="font-family: system-ui;">
                              <img src="images/tur.jpg" alt="قیمت لیر امروز" width="20px"> قیمت حواله لیر ترکیه <span><?=number_format(floatval($row_currency['lira']) * 100) ?></span> تومان
                            </h6>
                            <p>آخرین بروز رسانی : <?= mds_date("l j F Y H:i:s", strtotime($row_currency['updated']), 0);?></p>
              
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
                  <div class="col-md-3 d-flex align-items-stretch">
                    <div class="card w-100 bg-light-primary shadow-sm overflow-hidden">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div>
                            <h6 class="card-title fw-semibold" style="font-family: system-ui;">
                             <img src="images/bat.jpg" alt="قیمت لیر امروز" width="20px"> قیمت حواله بات <span><?=number_format(floatval($row_currency['bat']) * 100) ?></span> تومان
                            </h6>
                            <p>آخرین بروز رسانی : <?= mds_date("l j F Y H:i:s", strtotime($row_currency['updated']), 0);?></p>
                  
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
                <div class="row mb-4">
                  <div class="col-12 d-flex flex-row justify-content-between mb-md-4 mb-0 align-items-center">
                    <p class="fs-4 fw-bolder mb-0">
                      <!-- <i class="fa fa-file"></i> لیست اکانت‌ها -->
                    </p>
                    </a>
                  </div>
                  <div class="col-12 d-block d-md-none  px-4">
                    <a href="#" class="btn mb-1 waves-effect waves-light btn-outline-primary w-100 my-3">مشاهده اکانت‌ها <i class="fa fa-circle-arrow-left"></i>
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
                        


                        <?php


                        // Query to get the counts
                        $recentAccountsQuery = "SELECT COUNT(*) AS count FROM accounts WHERE user_id = $id";
                        $activeAccountsQuery = "SELECT COUNT(*) AS count FROM accounts WHERE cid is not NULL AND user_id = $id";

                        $recentAccountsResult = $conn->query($recentAccountsQuery);
                        $activeAccountsResult = $conn->query($activeAccountsQuery);

                        $recentAccounts = $recentAccountsResult->fetch_assoc()['count'];
                        $activeAccounts = $activeAccountsResult->fetch_assoc()['count'];

               
                        ?>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <div style="width: 50%; margin: auto;">
                            <canvas id="accountsPieChart"></canvas>
                        </div>

                        <script>
                            // Data from PHP
                            const recentAccounts = <?php echo $recentAccounts; ?>;
                            const activeAccounts = <?php echo $activeAccounts; ?>;

                            // Render Chart.js Pie Chart
                            const ctx = document.getElementById('accountsPieChart').getContext('2d');
                            new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ['کل اکانت های شما', 'اکانت های فعال'],
                                    datasets: [{
                                        data: [recentAccounts, activeAccounts],
                                        backgroundColor: ['#36a2eb', '#ff6384'],
                                        hoverBackgroundColor: ['#36a2ebcc', '#ff6384cc']
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            position: 'top',
                                        },
                                        tooltip: {
                                            callbacks: {
                                                label: function(context) {
                                                    const total = context.dataset.data.reduce((acc, value) => acc + value, 0);
                                                    const percentage = ((context.raw / total) * 100).toFixed(2);
                                                    return `${context.label}: ${context.raw} (${percentage}%)`;
                                                }
                                            }
                                        }
                                    }
                                }
                            });
                        </script>


                      </div>
                    </div>
                  </div>
                  <div class="col-md-7 col-12 d-flex align-items-stretch">
                    <div class="card w-100 bg-white overflow-hidden">
                      <div id="activity-status">
                        <img src="images/banner.jpg" alt="" class="img-fluid">
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
                            <a href="invoices" class="btn mb-1 waves-effect waves-light btn-outline-primary d-none d-md-block">مشاهده سفارشات <i class="fa fa-circle-arrow-left"></i>
                            </a>
                            <a href="#" class="btn mb-1 waves-effect waves-light btn-outline-primary d-block d-md-none w-100">مشاهده سفارشات <i class="fa fa-circle-arrow-left"></i>
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
                                  <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 241px;">مبلغ فاکتور(تومان)</th>
                                </tr>
                              </thead>
                              <?php
                              $sql_order = "SELECT * FROM orders WHERE user_id = $id
                              ORDER BY id DESC LIMIT 5";
                              $result_order = $conn->query($sql_order);
                              if ($result_order->num_rows > 0) {
                                while ($row_order = $result_order->fetch_assoc()) {

                               ?>
                              <tbody>
                                <tr class="odd">
                                  <td ><?=$row_order['type']?></td>
                                  <td>
                                      <?php
                                      if ($row_order['status'] == 2) echo "در حالت پرداخت";
                                      if ($row_order['status'] == 1) echo "پرداخت شده";
                                      if ($row_order['status'] == 0) echo "رد شده";
                                      ?>
                                  </td>
                                  <td> 
                                    <?php  
                                    if (is_numeric($row_order['amount'])) {
                                        echo number_format($row_order['amount']) . " تومان" ;
                                    } else {
                                        echo $row_order['amount'] . " تومان" ;
                                    }?>
                                  </td>
                                </tr>
                              </tbody>
                              <?php
                                }
                              }
                              ?>
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
                        <a href="tickets" class="btn btn-outline-primary w-100 mt-4"> مشاهده تیکت ها <i class="fa fa-circle-arrow-left fs-6"></i>
                        </a>


                        <div class="table-responsive">
                            <table class="table">
                                <thead class="">
                                    <tr>
                                      
                                        <th>موضوع</th>
                                        <th>کاربر</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  
                                  $sql_ticket = "SELECT * FROM tickets WHERE user_id = $id
                                  ORDER BY id DESC LIMIT 5";
                                  $result_ticket = $conn->query($sql_ticket);
                                  
                                  if ($result_ticket->num_rows > 0) {
                                
                                    while ($row_ticket = $result_ticket->fetch_assoc()) {
                                      ?>
                                    <tr>
                                        <td><?= $row_ticket['title']?></td>
                                        <td><?= get_name($row_ticket['user_id'])?></td>
                                    </tr>
                                    <?php
                                    }
                                  }
                                  ?>
                                </tbody>
                            </table>
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
    
 
    <div class="contact-circle" onclick="toggleIcons()">
        <img src="https://cdn-icons-png.flaticon.com/512/724/724664.png" alt="تماس">
    </div>

    <div class="social-icons" id="socialIcons">
        <a href="https://wa.me/1234567890" class="whatsapp" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/512/2111/2111728.png" alt="واتساپ">
        </a>
        <a href="https://t.me/yourtelegram" class="telegram" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/512/2111/2111646.png" alt="تلگرام">
        </a>
    </div>

    <script>
        function toggleIcons() {
            const icons = document.getElementById('socialIcons');
            icons.style.display = icons.style.display === 'flex' ? 'none' : 'flex';
        }
    </script>
    
    <div id="modalContainer"></div>
   
    <?php include "footer.php"; ?>

    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="js/app.min.js"></script>
    <script src="js/app.init.js"></script>
    <script src="js/jalali.js"></script>
    <script src="js/sidebarmenu.js"></script>


    <script src="js/javascripts.js"></script>

    

    <jdp-container style="z-index: 1000;"></jdp-container>
    <jdp-overlay style="z-index: 999;"></jdp-overlay>
  </body>
  </body>
</html>