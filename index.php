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
    <link rel="shortcut icon" type="image/png" href="https://my.g-ads.org/assets/img/icon/fav@32.png">
    <link rel="stylesheet" href="https://my.g-ads.org/assets/css/select2.css">
    <link rel="stylesheet" href="https://my.g-ads.org/assets/css/datatable.css?v=14030701">
    <link rel="stylesheet" href="https://my.g-ads.org/assets/css/jalali.css">
    <link rel="stylesheet" href="https://my.g-ads.org/assets/css/style.min.css?v=14030701">
    <script src="https://my.g-ads.org/assets/js/jquery.min.js"></script>

    <title>صفحه اصلی</title>
    <style>
        #message-content .accordion-item .accordion-button span {
            display: contents
        }
        .notifTop.hasNotif:after {
            content: "";
            background: red;
            width: 10px;
            height: 10px;
            position: absolute;
            right: 0;
            border-radius: 40px;
        }

        [data-sidebartype="mini-sidebar"] .brand-logoMini {
            display: block
        }

        [data-sidebartype="full"] .brand-logoMini {
            display: none
        }

        [data-sidebartype="mini-sidebar"] .brand-logo {
            display: none
        }

        @media screen and (max-width: 768px) {
            .page-wrapper.show-sidebar .sidebarHolder {
                background: #000;
                opacity: 0.8;
                inset: 0;
                position: fixed;
                z-index: 10;
                overflow-x: hidden
            }

            .page-wrapper.show-sidebar .body-wrapper {
                position: fixed;
                width: 100%;
            }
        }
        .expertBox {
            position: fixed;
            bottom: 10px;
            left: 10px;
            max-width: 300px;
        }

    </style>
<style id="apexcharts-css">.apexcharts-canvas {
  position: relative;
  user-select: none;
  /* cannot give overflow: hidden as it will crop tooltips which overflow outside chart area */
}


/* scrollbar is not visible by default for legend, hence forcing the visibility */
.apexcharts-canvas ::-webkit-scrollbar {
  -webkit-appearance: none;
  width: 6px;
}

.apexcharts-canvas ::-webkit-scrollbar-thumb {
  border-radius: 4px;
  background-color: rgba(0, 0, 0, .5);
  box-shadow: 0 0 1px rgba(255, 255, 255, .5);
  -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5);
}


.apexcharts-inner {
  position: relative;
}

.apexcharts-text tspan {
  font-family: inherit;
}

.legend-mouseover-inactive {
  transition: 0.15s ease all;
  opacity: 0.20;
}

.apexcharts-series-collapsed {
  opacity: 0;
}

.apexcharts-tooltip {
  border-radius: 5px;
  box-shadow: 2px 2px 6px -4px #999;
  cursor: default;
  font-size: 14px;
  left: 62px;
  opacity: 0;
  pointer-events: none;
  position: absolute;
  top: 20px;
  display: flex;
  flex-direction: column;
  overflow: hidden;
  white-space: nowrap;
  z-index: 12;
  transition: 0.15s ease all;
}

.apexcharts-tooltip.apexcharts-active {
  opacity: 1;
  transition: 0.15s ease all;
}

.apexcharts-tooltip.apexcharts-theme-light {
  border: 1px solid #e3e3e3;
  background: rgba(255, 255, 255, 0.96);
}

.apexcharts-tooltip.apexcharts-theme-dark {
  color: #fff;
  background: rgba(30, 30, 30, 0.8);
}

.apexcharts-tooltip * {
  font-family: inherit;
}


.apexcharts-tooltip-title {
  padding: 6px;
  font-size: 15px;
  margin-bottom: 4px;
}

.apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
  background: #ECEFF1;
  border-bottom: 1px solid #ddd;
}

.apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
  background: rgba(0, 0, 0, 0.7);
  border-bottom: 1px solid #333;
}

.apexcharts-tooltip-text-y-value,
.apexcharts-tooltip-text-goals-value,
.apexcharts-tooltip-text-z-value {
  display: inline-block;
  font-weight: 600;
  margin-left: 5px;
}

.apexcharts-tooltip-title:empty,
.apexcharts-tooltip-text-y-label:empty,
.apexcharts-tooltip-text-y-value:empty,
.apexcharts-tooltip-text-goals-label:empty,
.apexcharts-tooltip-text-goals-value:empty,
.apexcharts-tooltip-text-z-value:empty {
  display: none;
}

.apexcharts-tooltip-text-y-value,
.apexcharts-tooltip-text-goals-value,
.apexcharts-tooltip-text-z-value {
  font-weight: 600;
}

.apexcharts-tooltip-text-goals-label, 
.apexcharts-tooltip-text-goals-value {
  padding: 6px 0 5px;
}

.apexcharts-tooltip-goals-group, 
.apexcharts-tooltip-text-goals-label, 
.apexcharts-tooltip-text-goals-value {
  display: flex;
}
.apexcharts-tooltip-text-goals-label:not(:empty),
.apexcharts-tooltip-text-goals-value:not(:empty) {
  margin-top: -6px;
}

.apexcharts-tooltip-marker {
  width: 12px;
  height: 12px;
  position: relative;
  top: 0px;
  margin-right: 10px;
  border-radius: 50%;
}

.apexcharts-tooltip-series-group {
  padding: 0 10px;
  display: none;
  text-align: left;
  justify-content: left;
  align-items: center;
}

.apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
  opacity: 1;
}

.apexcharts-tooltip-series-group.apexcharts-active,
.apexcharts-tooltip-series-group:last-child {
  padding-bottom: 4px;
}

.apexcharts-tooltip-series-group-hidden {
  opacity: 0;
  height: 0;
  line-height: 0;
  padding: 0 !important;
}

.apexcharts-tooltip-y-group {
  padding: 6px 0 5px;
}

.apexcharts-tooltip-box, .apexcharts-custom-tooltip {
  padding: 4px 8px;
}

.apexcharts-tooltip-boxPlot {
  display: flex;
  flex-direction: column-reverse;
}

.apexcharts-tooltip-box>div {
  margin: 4px 0;
}

.apexcharts-tooltip-box span.value {
  font-weight: bold;
}

.apexcharts-tooltip-rangebar {
  padding: 5px 8px;
}

.apexcharts-tooltip-rangebar .category {
  font-weight: 600;
  color: #777;
}

.apexcharts-tooltip-rangebar .series-name {
  font-weight: bold;
  display: block;
  margin-bottom: 5px;
}

.apexcharts-xaxistooltip {
  opacity: 0;
  padding: 9px 10px;
  pointer-events: none;
  color: #373d3f;
  font-size: 13px;
  text-align: center;
  border-radius: 2px;
  position: absolute;
  z-index: 10;
  background: #ECEFF1;
  border: 1px solid #90A4AE;
  transition: 0.15s ease all;
}

.apexcharts-xaxistooltip.apexcharts-theme-dark {
  background: rgba(0, 0, 0, 0.7);
  border: 1px solid rgba(0, 0, 0, 0.5);
  color: #fff;
}

.apexcharts-xaxistooltip:after,
.apexcharts-xaxistooltip:before {
  left: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
}

.apexcharts-xaxistooltip:after {
  border-color: rgba(236, 239, 241, 0);
  border-width: 6px;
  margin-left: -6px;
}

.apexcharts-xaxistooltip:before {
  border-color: rgba(144, 164, 174, 0);
  border-width: 7px;
  margin-left: -7px;
}

.apexcharts-xaxistooltip-bottom:after,
.apexcharts-xaxistooltip-bottom:before {
  bottom: 100%;
}

.apexcharts-xaxistooltip-top:after,
.apexcharts-xaxistooltip-top:before {
  top: 100%;
}

.apexcharts-xaxistooltip-bottom:after {
  border-bottom-color: #ECEFF1;
}

.apexcharts-xaxistooltip-bottom:before {
  border-bottom-color: #90A4AE;
}

.apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after {
  border-bottom-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
  border-bottom-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-xaxistooltip-top:after {
  border-top-color: #ECEFF1
}

.apexcharts-xaxistooltip-top:before {
  border-top-color: #90A4AE;
}

.apexcharts-xaxistooltip-top.apexcharts-theme-dark:after {
  border-top-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
  border-top-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-xaxistooltip.apexcharts-active {
  opacity: 1;
  transition: 0.15s ease all;
}

.apexcharts-yaxistooltip {
  opacity: 0;
  padding: 4px 10px;
  pointer-events: none;
  color: #373d3f;
  font-size: 13px;
  text-align: center;
  border-radius: 2px;
  position: absolute;
  z-index: 10;
  background: #ECEFF1;
  border: 1px solid #90A4AE;
}

.apexcharts-yaxistooltip.apexcharts-theme-dark {
  background: rgba(0, 0, 0, 0.7);
  border: 1px solid rgba(0, 0, 0, 0.5);
  color: #fff;
}

.apexcharts-yaxistooltip:after,
.apexcharts-yaxistooltip:before {
  top: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
}

.apexcharts-yaxistooltip:after {
  border-color: rgba(236, 239, 241, 0);
  border-width: 6px;
  margin-top: -6px;
}

.apexcharts-yaxistooltip:before {
  border-color: rgba(144, 164, 174, 0);
  border-width: 7px;
  margin-top: -7px;
}

.apexcharts-yaxistooltip-left:after,
.apexcharts-yaxistooltip-left:before {
  left: 100%;
}

.apexcharts-yaxistooltip-right:after,
.apexcharts-yaxistooltip-right:before {
  right: 100%;
}

.apexcharts-yaxistooltip-left:after {
  border-left-color: #ECEFF1;
}

.apexcharts-yaxistooltip-left:before {
  border-left-color: #90A4AE;
}

.apexcharts-yaxistooltip-left.apexcharts-theme-dark:after {
  border-left-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
  border-left-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-yaxistooltip-right:after {
  border-right-color: #ECEFF1;
}

.apexcharts-yaxistooltip-right:before {
  border-right-color: #90A4AE;
}

.apexcharts-yaxistooltip-right.apexcharts-theme-dark:after {
  border-right-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
  border-right-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-yaxistooltip.apexcharts-active {
  opacity: 1;
}

.apexcharts-yaxistooltip-hidden {
  display: none;
}

.apexcharts-xcrosshairs,
.apexcharts-ycrosshairs {
  pointer-events: none;
  opacity: 0;
  transition: 0.15s ease all;
}

.apexcharts-xcrosshairs.apexcharts-active,
.apexcharts-ycrosshairs.apexcharts-active {
  opacity: 1;
  transition: 0.15s ease all;
}

.apexcharts-ycrosshairs-hidden {
  opacity: 0;
}

.apexcharts-selection-rect {
  cursor: move;
}

.svg_select_boundingRect, .svg_select_points_rot {
  pointer-events: none;
  opacity: 0;
  visibility: hidden;
}
.apexcharts-selection-rect + g .svg_select_boundingRect,
.apexcharts-selection-rect + g .svg_select_points_rot {
  opacity: 0;
  visibility: hidden;
}

.apexcharts-selection-rect + g .svg_select_points_l,
.apexcharts-selection-rect + g .svg_select_points_r {
  cursor: ew-resize;
  opacity: 1;
  visibility: visible;
}

.svg_select_points {
  fill: #efefef;
  stroke: #333;
  rx: 2;
}

.apexcharts-svg.apexcharts-zoomable.hovering-zoom {
  cursor: crosshair
}

.apexcharts-svg.apexcharts-zoomable.hovering-pan {
  cursor: move
}

.apexcharts-zoom-icon,
.apexcharts-zoomin-icon,
.apexcharts-zoomout-icon,
.apexcharts-reset-icon,
.apexcharts-pan-icon,
.apexcharts-selection-icon,
.apexcharts-menu-icon,
.apexcharts-toolbar-custom-icon {
  cursor: pointer;
  width: 20px;
  height: 20px;
  line-height: 24px;
  color: #6E8192;
  text-align: center;
}

.apexcharts-zoom-icon svg,
.apexcharts-zoomin-icon svg,
.apexcharts-zoomout-icon svg,
.apexcharts-reset-icon svg,
.apexcharts-menu-icon svg {
  fill: #6E8192;
}

.apexcharts-selection-icon svg {
  fill: #444;
  transform: scale(0.76)
}

.apexcharts-theme-dark .apexcharts-zoom-icon svg,
.apexcharts-theme-dark .apexcharts-zoomin-icon svg,
.apexcharts-theme-dark .apexcharts-zoomout-icon svg,
.apexcharts-theme-dark .apexcharts-reset-icon svg,
.apexcharts-theme-dark .apexcharts-pan-icon svg,
.apexcharts-theme-dark .apexcharts-selection-icon svg,
.apexcharts-theme-dark .apexcharts-menu-icon svg,
.apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg {
  fill: #f3f4f5;
}

.apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg,
.apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,
.apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg {
  fill: #008FFB;
}

.apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,
.apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,
.apexcharts-theme-light .apexcharts-zoomin-icon:hover svg,
.apexcharts-theme-light .apexcharts-zoomout-icon:hover svg,
.apexcharts-theme-light .apexcharts-reset-icon:hover svg,
.apexcharts-theme-light .apexcharts-menu-icon:hover svg {
  fill: #333;
}

.apexcharts-selection-icon,
.apexcharts-menu-icon {
  position: relative;
}

.apexcharts-reset-icon {
  margin-left: 5px;
}

.apexcharts-zoom-icon,
.apexcharts-reset-icon,
.apexcharts-menu-icon {
  transform: scale(0.85);
}

.apexcharts-zoomin-icon,
.apexcharts-zoomout-icon {
  transform: scale(0.7)
}

.apexcharts-zoomout-icon {
  margin-right: 3px;
}

.apexcharts-pan-icon {
  transform: scale(0.62);
  position: relative;
  left: 1px;
  top: 0px;
}

.apexcharts-pan-icon svg {
  fill: #fff;
  stroke: #6E8192;
  stroke-width: 2;
}

.apexcharts-pan-icon.apexcharts-selected svg {
  stroke: #008FFB;
}

.apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
  stroke: #333;
}

.apexcharts-toolbar {
  position: absolute;
  z-index: 11;
  max-width: 176px;
  text-align: right;
  border-radius: 3px;
  padding: 0px 6px 2px 6px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.apexcharts-menu {
  background: #fff;
  position: absolute;
  top: 100%;
  border: 1px solid #ddd;
  border-radius: 3px;
  padding: 3px;
  right: 10px;
  opacity: 0;
  min-width: 110px;
  transition: 0.15s ease all;
  pointer-events: none;
}

.apexcharts-menu.apexcharts-menu-open {
  opacity: 1;
  pointer-events: all;
  transition: 0.15s ease all;
}

.apexcharts-menu-item {
  padding: 6px 7px;
  font-size: 12px;
  cursor: pointer;
}

.apexcharts-theme-light .apexcharts-menu-item:hover {
  background: #eee;
}

.apexcharts-theme-dark .apexcharts-menu {
  background: rgba(0, 0, 0, 0.7);
  color: #fff;
}

@media screen and (min-width: 768px) {
  .apexcharts-canvas:hover .apexcharts-toolbar {
    opacity: 1;
  }
}

.apexcharts-datalabel.apexcharts-element-hidden {
  opacity: 0;
}

.apexcharts-pie-label,
.apexcharts-datalabels,
.apexcharts-datalabel,
.apexcharts-datalabel-label,
.apexcharts-datalabel-value {
  cursor: default;
  pointer-events: none;
}

.apexcharts-pie-label-delay {
  opacity: 0;
  animation-name: opaque;
  animation-duration: 0.3s;
  animation-fill-mode: forwards;
  animation-timing-function: ease;
}

.apexcharts-canvas .apexcharts-element-hidden {
  opacity: 0;
}

.apexcharts-hide .apexcharts-series-points {
  opacity: 0;
}

.apexcharts-gridline,
.apexcharts-annotation-rect,
.apexcharts-tooltip .apexcharts-marker,
.apexcharts-area-series .apexcharts-area,
.apexcharts-line,
.apexcharts-zoom-rect,
.apexcharts-toolbar svg,
.apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
.apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
.apexcharts-radar-series path,
.apexcharts-radar-series polygon {
  pointer-events: none;
}


/* markers */

.apexcharts-marker {
  transition: 0.15s ease all;
}

@keyframes opaque {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}


/* Resize generated styles */

@keyframes resizeanim {
  from {
    opacity: 0;
  }
  to {
    opacity: 0;
  }
}

.resize-triggers {
  animation: 1ms resizeanim;
  visibility: hidden;
  opacity: 0;
}

.resize-triggers,
.resize-triggers>div,
.contract-trigger:before {
  content: " ";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  overflow: hidden;
}

.resize-triggers>div {
  background: #eee;
  overflow: auto;
}

.contract-trigger:before {
  width: 200%;
  height: 200%;
}</style></head>

   

<body id="mainArea" class="mainArea">
    <!-- لــودر صفحات  -->
    <div class="preloader" style="display: none;">
        <img src="https://my.g-ads.org/assets/img/icon/fav@128.png" alt="loader" class="lds-ripple img-fluid">
    </div>
    <!-- شروع صفحه -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- سایدبار -->
        <aside class="left-sidebar">
            <div>
                <div class="brand-logo pt-4 position relative " style="height: 120px;
                    background-size: 128px;
                    background: url('https://my.g-ads.org/assets/img/icon/fav@128.png');
                    background-repeat: no-repeat;
                    background-position: -30px -35px;">
                    <a href="https://my.g-ads.org/Client/ClientDefault/Index" class="text-nowrap logo-img" style="top: 66px;"></a>
                    <h1 class="d-block pt-1 slug fs-8 fw-bolder text-primary">جی ادز</h1>
                    <p class="text-primary fs-2">تبلیغات در گوگل، فقط با جی ادز</p>
                    
                    <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer position-absolute bg-white rounded-5" id="sidebarCollapse" style="left:20px;top:20px">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <div class="brand-logoMini text-center">
                    <img src="https://my.g-ads.org/assets/img/icon/fav@128.png" class="img-fluid mt-4" style="
                    max-width: 45px;">
                </div>
            </div>
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="init">
                <div class="simplebar-wrapper selected" style="margin: 0px -24px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask selected">
                        <div class="simplebar-offset selected" style="left: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper selected" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content selected" style="padding: 0px 24px;">
                                    <ul id="sidebarnav" class="in mt-5">
                                        <li class="sidebar-item selected">
                                            <a class="sidebar-link active" href="https://my.g-ads.org/Client/ClientDefault/Index" aria-expanded="false">
                                                <span>
                                                    <i class="ti ti-home"></i>
                                                </span>
                                                <span class="hide-menu">داشبورد</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" key="accountgoogle_count" href="https://my.g-ads.org/Client/ClientAccount/AccountsGoogle" aria-expanded="false">
                                                <span>
                                                    <i class="ti ti-brand-google"></i>
                                                </span>
                                                <span class="hide-menu">گوگل اکانت‌ها</span>
                                                <span class="badge bg-info"></span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" href="https://my.g-ads.org/Client/ClientProduct/Products" aria-expanded="false">
                                                <span>
                                                    <i class="ti ti-brand-producthunt"></i>
                                                </span>
                                                <span class="hide-menu">سرویس ها</span>
                                            </a>
                                        </li>
                                        <!-- <li class="sidebar-item">
        <a class="sidebar-link" href="https://my.g-ads.org/Client/ClientMessage/Messages" aria-expanded="false">
            <span>
                <i class="ti ti-message-2"></i>
            </span>
            <span class="hide-menu">پیام‌ها</span>
        </a>
    </li> -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" key="invoice_count" href="https://my.g-ads.org/Client/ClientInvoice/Invoices" aria-expanded="false">
                                                <span>
                                                    <i class="ti ti-file-invoice"></i>
                                                </span>
                                                <span class="hide-menu">سفارشات</span>
                                                <span class="badge bg-warning"></span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" href="https://my.g-ads.org/Client/ClientPay/Pays" aria-expanded="false">
                                                <span>
                                                    <i class="ti ti-credit-card"></i>
                                                </span>
                                                <span class="hide-menu">پرداخت‌ها</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" key="ticket_count" href="https://my.g-ads.org/Client/ClientTicket/Tickets" aria-expanded="false">
                                                <span>
                                                    <i class="ti ti-headset"></i>
                                                </span>
                                                <span class="hide-menu">تیکت</span>
                                                <span class="badge bg-warning"></span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" href="https://my.g-ads.org/Client/ClientWallet/Wallets" aria-expanded="false">
                                                <span>
                                                    <i class="ti ti-wallet"></i>
                                                </span>
                                                <span class="hide-menu">کیف پول</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" href="https://my.g-ads.org/Client/ClientCompany/Companys" aria-expanded="false">
                                                <span>
                                                    <i class="ti ti-building"></i>
                                                </span>
                                                <span class="hide-menu">شرکت‌ها</span>
                                            </a>
                                        </li>

                                        

                                        <li class="sidebar-item">
                                            <a class="sidebar-link" href="https://my.g-ads.org/Client/ClientUser/Edit" aria-expanded="false">
                                                <span>
                                                    <i class="ti ti-user-edit"></i>
                                                </span>
                                                <span class="hide-menu">پروفایل</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </aside>
        <div class="sidebarHolder"></div>
        <!-- کانتینر اصلی دیتا -->
        <div class="body-wrapper bg-light">
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
                                                    <h5 class="fs-4 mb-3 w-100 fw-semibold text-dark">
                                                        کیورد پلنر جی ادز
                                                    </h5>
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
                                            <i class="ti ti-logout me-1"></i>خروج
                                        </button>
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
    <a href="https://t.me/gadsinfo_bot" target="_blank" class="text-white fw-bolder">دریافت باقی مانده شارژ اکانت و امکانات دیگر در ربات تلگرامی جی ادز <i class="ti ti-circle-arrow-left fs-5 ms-2"></i></a>
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
                            <img src="/assets/img/icon/USD.svg" alt="قیمت دلار امروز">
                            قیمت دلار <span>70,801</span> تومان
                        </h5>
                        <div class="d-flex gap-2">
                            <span>
                                <span class="round-8 bg-success rounded-circle d-inline-block"></span>
                            </span>
                            <span style="font-size: 0.9em;">
                                آخرین به روزرسانی: <span>1403/08/18-16:20:19</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="currencyChart2" style="min-height: 80px;"><div id="apexchartsvsothuv1" class="apexcharts-canvas apexchartsvsothuv1 apexcharts-theme-light" style="width: 368px; height: 80px;"><svg id="SvgjsSvg1243" width="368" height="80" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1245" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1244"><clipPath id="gridRectMaskvsothuv1"><rect id="SvgjsRect1251" width="373" height="81" x="-2.5" y="-0.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskvsothuv1"></clipPath><clipPath id="nonForecastMaskvsothuv1"></clipPath><clipPath id="gridRectMarkerMaskvsothuv1"><rect id="SvgjsRect1252" width="372" height="84" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1257" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1258" stop-opacity="0.65" stop-color="rgba(238,0,0,0.65)" offset="0"></stop><stop id="SvgjsStop1259" stop-opacity="0.5" stop-color="rgba(247,128,128,0.5)" offset="1"></stop><stop id="SvgjsStop1260" stop-opacity="0.5" stop-color="rgba(247,128,128,0.5)" offset="1"></stop></linearGradient><filter id="SvgjsFilter1262" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood1263" flood-color="#000000" flood-opacity="0.2" result="SvgjsFeFlood1263Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1264" in="SvgjsFeFlood1263Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1264Out"></feComposite><feOffset id="SvgjsFeOffset1265" dx="0" dy="3" result="SvgjsFeOffset1265Out" in="SvgjsFeComposite1264Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1266" stdDeviation="5 " result="SvgjsFeGaussianBlur1266Out" in="SvgjsFeOffset1265Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1267" result="SvgjsFeMerge1267Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1268" in="SvgjsFeGaussianBlur1266Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1269" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1270" in="SourceGraphic" in2="SvgjsFeMerge1267Out" mode="normal" result="SvgjsFeBlend1270Out"></feBlend></filter><filter id="SvgjsFilter1272" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood1273" flood-color="#000000" flood-opacity="0.2" result="SvgjsFeFlood1273Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1274" in="SvgjsFeFlood1273Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1274Out"></feComposite><feOffset id="SvgjsFeOffset1275" dx="0" dy="3" result="SvgjsFeOffset1275Out" in="SvgjsFeComposite1274Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1276" stdDeviation="5 " result="SvgjsFeGaussianBlur1276Out" in="SvgjsFeOffset1275Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1277" result="SvgjsFeMerge1277Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1278" in="SvgjsFeGaussianBlur1276Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1279" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1280" in="SourceGraphic" in2="SvgjsFeMerge1277Out" mode="normal" result="SvgjsFeBlend1280Out"></feBlend></filter></defs><line id="SvgjsLine1250" x1="0" y1="0" x2="0" y2="80" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="80" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1281" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1282" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g></g><g id="SvgjsG1292" class="apexcharts-grid"><g id="SvgjsG1293" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1295" x1="0" y1="0" x2="368" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1296" x1="0" y1="16" x2="368" y2="16" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1297" x1="0" y1="32" x2="368" y2="32" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1298" x1="0" y1="48" x2="368" y2="48" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1299" x1="0" y1="64" x2="368" y2="64" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1300" x1="0" y1="80" x2="368" y2="80" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1294" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1302" x1="0" y1="80" x2="368" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1301" x1="0" y1="1" x2="0" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1253" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1254" class="apexcharts-series" seriesName="قیمت" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1261" d="M 0 80L 0 75.11999999999989C 18.4 75.11999999999989 34.17142857142857 71.88000000000011 52.57142857142857 71.88000000000011C 70.97142857142856 71.88000000000011 86.74285714285713 25.440000000000055 105.14285714285714 25.440000000000055C 123.54285714285713 25.440000000000055 139.3142857142857 36.36000000000013 157.7142857142857 36.36000000000013C 176.1142857142857 36.36000000000013 191.88571428571427 53.320000000000164 210.28571428571428 53.320000000000164C 228.68571428571425 53.320000000000164 244.45714285714286 11.7199999999998 262.85714285714283 11.7199999999998C 281.2571428571428 11.7199999999998 297.0285714285714 68.2800000000002 315.4285714285714 68.2800000000002C 333.8285714285714 68.2800000000002 349.59999999999997 72.7199999999998 368 72.7199999999998C 368 72.7199999999998 368 72.7199999999998 368 80M 368 72.7199999999998z" fill="url(#SvgjsLinearGradient1257)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskvsothuv1)" filter="url(#SvgjsFilter1262)" pathTo="M 0 80L 0 75.11999999999989C 18.4 75.11999999999989 34.17142857142857 71.88000000000011 52.57142857142857 71.88000000000011C 70.97142857142856 71.88000000000011 86.74285714285713 25.440000000000055 105.14285714285714 25.440000000000055C 123.54285714285713 25.440000000000055 139.3142857142857 36.36000000000013 157.7142857142857 36.36000000000013C 176.1142857142857 36.36000000000013 191.88571428571427 53.320000000000164 210.28571428571428 53.320000000000164C 228.68571428571425 53.320000000000164 244.45714285714286 11.7199999999998 262.85714285714283 11.7199999999998C 281.2571428571428 11.7199999999998 297.0285714285714 68.2800000000002 315.4285714285714 68.2800000000002C 333.8285714285714 68.2800000000002 349.59999999999997 72.7199999999998 368 72.7199999999998C 368 72.7199999999998 368 72.7199999999998 368 80M 368 72.7199999999998z" pathFrom="M -1 2912L -1 2912L 52.57142857142857 2912L 105.14285714285714 2912L 157.7142857142857 2912L 210.28571428571428 2912L 262.85714285714283 2912L 315.4285714285714 2912L 368 2912"></path><path id="SvgjsPath1271" d="M 0 75.11999999999989C 18.4 75.11999999999989 34.17142857142857 71.88000000000011 52.57142857142857 71.88000000000011C 70.97142857142856 71.88000000000011 86.74285714285713 25.440000000000055 105.14285714285714 25.440000000000055C 123.54285714285713 25.440000000000055 139.3142857142857 36.36000000000013 157.7142857142857 36.36000000000013C 176.1142857142857 36.36000000000013 191.88571428571427 53.320000000000164 210.28571428571428 53.320000000000164C 228.68571428571425 53.320000000000164 244.45714285714286 11.7199999999998 262.85714285714283 11.7199999999998C 281.2571428571428 11.7199999999998 297.0285714285714 68.2800000000002 315.4285714285714 68.2800000000002C 333.8285714285714 68.2800000000002 349.59999999999997 72.7199999999998 368 72.7199999999998" fill="none" fill-opacity="1" stroke="#9f9f9f" stroke-opacity="1" stroke-linecap="butt" stroke-width="1" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskvsothuv1)" filter="url(#SvgjsFilter1272)" pathTo="M 0 75.11999999999989C 18.4 75.11999999999989 34.17142857142857 71.88000000000011 52.57142857142857 71.88000000000011C 70.97142857142856 71.88000000000011 86.74285714285713 25.440000000000055 105.14285714285714 25.440000000000055C 123.54285714285713 25.440000000000055 139.3142857142857 36.36000000000013 157.7142857142857 36.36000000000013C 176.1142857142857 36.36000000000013 191.88571428571427 53.320000000000164 210.28571428571428 53.320000000000164C 228.68571428571425 53.320000000000164 244.45714285714286 11.7199999999998 262.85714285714283 11.7199999999998C 281.2571428571428 11.7199999999998 297.0285714285714 68.2800000000002 315.4285714285714 68.2800000000002C 333.8285714285714 68.2800000000002 349.59999999999997 72.7199999999998 368 72.7199999999998" pathFrom="M -1 2912L -1 2912L 52.57142857142857 2912L 105.14285714285714 2912L 157.7142857142857 2912L 210.28571428571428 2912L 262.85714285714283 2912L 315.4285714285714 2912L 368 2912"></path><g id="SvgjsG1255" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1308" r="0" cx="0" cy="0" class="apexcharts-marker w0bttsas1 no-pointer-events" stroke="#ffffff" fill="#ee0000" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1256" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1303" x1="0" y1="0" x2="368" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1304" x1="0" y1="0" x2="368" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1305" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1306" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1307" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1249" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1291" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1246" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 40px;"></div><div class="apexcharts-tooltip apexcharts-theme-dark"><div class="apexcharts-tooltip-title" style="font-family: g; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(238, 0, 0);"></span><div class="apexcharts-tooltip-text" style="font-family: g; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-dark"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
        </div>
    </div>

    <div class="col-md-4 d-flex align-items-stretch">
        <div class="card w-100 bg-light-primary shadow-sm overflow-hidden">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="card-title fw-semibold">
                            <img src="/assets/img/icon/AED.svg" alt="قیمت درهم امروز">
                            قیمت درهم <span>19,659</span> تومان
                        </h5>
                        <div class="d-flex gap-2">
                            <span>
                                <span class="round-8 bg-success rounded-circle d-inline-block"></span>
                            </span>
                            <span style="font-size: 0.9em;">
                                آخرین به روزرسانی: <span>1403/08/18-16:20:19</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="currencyChart3" style="min-height: 80px;"><div id="apexchartssbchoj0z" class="apexcharts-canvas apexchartssbchoj0z apexcharts-theme-light" style="width: 368px; height: 80px;"><svg id="SvgjsSvg1310" width="368" height="80" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1312" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1311"><clipPath id="gridRectMasksbchoj0z"><rect id="SvgjsRect1318" width="373" height="81" x="-2.5" y="-0.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMasksbchoj0z"></clipPath><clipPath id="nonForecastMasksbchoj0z"></clipPath><clipPath id="gridRectMarkerMasksbchoj0z"><rect id="SvgjsRect1319" width="372" height="84" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1324" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1325" stop-opacity="0.65" stop-color="rgba(238,0,0,0.65)" offset="0"></stop><stop id="SvgjsStop1326" stop-opacity="0.5" stop-color="rgba(247,128,128,0.5)" offset="1"></stop><stop id="SvgjsStop1327" stop-opacity="0.5" stop-color="rgba(247,128,128,0.5)" offset="1"></stop></linearGradient><filter id="SvgjsFilter1329" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood1330" flood-color="#000000" flood-opacity="0.2" result="SvgjsFeFlood1330Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1331" in="SvgjsFeFlood1330Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1331Out"></feComposite><feOffset id="SvgjsFeOffset1332" dx="0" dy="3" result="SvgjsFeOffset1332Out" in="SvgjsFeComposite1331Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1333" stdDeviation="5 " result="SvgjsFeGaussianBlur1333Out" in="SvgjsFeOffset1332Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1334" result="SvgjsFeMerge1334Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1335" in="SvgjsFeGaussianBlur1333Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1336" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1337" in="SourceGraphic" in2="SvgjsFeMerge1334Out" mode="normal" result="SvgjsFeBlend1337Out"></feBlend></filter><filter id="SvgjsFilter1339" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood1340" flood-color="#000000" flood-opacity="0.2" result="SvgjsFeFlood1340Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1341" in="SvgjsFeFlood1340Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1341Out"></feComposite><feOffset id="SvgjsFeOffset1342" dx="0" dy="3" result="SvgjsFeOffset1342Out" in="SvgjsFeComposite1341Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1343" stdDeviation="5 " result="SvgjsFeGaussianBlur1343Out" in="SvgjsFeOffset1342Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1344" result="SvgjsFeMerge1344Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1345" in="SvgjsFeGaussianBlur1343Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1346" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1347" in="SourceGraphic" in2="SvgjsFeMerge1344Out" mode="normal" result="SvgjsFeBlend1347Out"></feBlend></filter></defs><line id="SvgjsLine1317" x1="0" y1="0" x2="0" y2="80" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="80" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1348" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1349" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g></g><g id="SvgjsG1359" class="apexcharts-grid"><g id="SvgjsG1360" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1362" x1="0" y1="0" x2="368" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1363" x1="0" y1="13.333333333333334" x2="368" y2="13.333333333333334" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1364" x1="0" y1="26.666666666666668" x2="368" y2="26.666666666666668" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1365" x1="0" y1="40" x2="368" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1366" x1="0" y1="53.333333333333336" x2="368" y2="53.333333333333336" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1367" x1="0" y1="66.66666666666667" x2="368" y2="66.66666666666667" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1368" x1="0" y1="80" x2="368" y2="80" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1361" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1370" x1="0" y1="80" x2="368" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1369" x1="0" y1="1" x2="0" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1320" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1321" class="apexcharts-series" seriesName="قیمت" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1328" d="M 0 80L 0 67.60000000000036C 18.4 67.60000000000036 34.17142857142857 64.5333333333333 52.57142857142857 64.5333333333333C 70.97142857142856 64.5333333333333 86.74285714285713 21.600000000000364 105.14285714285714 21.600000000000364C 123.54285714285713 21.600000000000364 139.3142857142857 31.733333333333576 157.7142857142857 31.733333333333576C 176.1142857142857 31.733333333333576 191.88571428571427 47.333333333333485 210.28571428571428 47.333333333333485C 228.68571428571425 47.333333333333485 244.45714285714286 8.933333333333394 262.85714285714283 8.933333333333394C 281.2571428571428 8.933333333333394 297.0285714285714 61.333333333333485 315.4285714285714 61.333333333333485C 333.8285714285714 61.333333333333485 349.59999999999997 65.33333333333348 368 65.33333333333348C 368 65.33333333333348 368 65.33333333333348 368 80M 368 65.33333333333348z" fill="url(#SvgjsLinearGradient1324)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksbchoj0z)" filter="url(#SvgjsFilter1329)" pathTo="M 0 80L 0 67.60000000000036C 18.4 67.60000000000036 34.17142857142857 64.5333333333333 52.57142857142857 64.5333333333333C 70.97142857142856 64.5333333333333 86.74285714285713 21.600000000000364 105.14285714285714 21.600000000000364C 123.54285714285713 21.600000000000364 139.3142857142857 31.733333333333576 157.7142857142857 31.733333333333576C 176.1142857142857 31.733333333333576 191.88571428571427 47.333333333333485 210.28571428571428 47.333333333333485C 228.68571428571425 47.333333333333485 244.45714285714286 8.933333333333394 262.85714285714283 8.933333333333394C 281.2571428571428 8.933333333333394 297.0285714285714 61.333333333333485 315.4285714285714 61.333333333333485C 333.8285714285714 61.333333333333485 349.59999999999997 65.33333333333348 368 65.33333333333348C 368 65.33333333333348 368 65.33333333333348 368 80M 368 65.33333333333348z" pathFrom="M -1 2693.3333333333335L -1 2693.3333333333335L 52.57142857142857 2693.3333333333335L 105.14285714285714 2693.3333333333335L 157.7142857142857 2693.3333333333335L 210.28571428571428 2693.3333333333335L 262.85714285714283 2693.3333333333335L 315.4285714285714 2693.3333333333335L 368 2693.3333333333335"></path><path id="SvgjsPath1338" d="M 0 67.60000000000036C 18.4 67.60000000000036 34.17142857142857 64.5333333333333 52.57142857142857 64.5333333333333C 70.97142857142856 64.5333333333333 86.74285714285713 21.600000000000364 105.14285714285714 21.600000000000364C 123.54285714285713 21.600000000000364 139.3142857142857 31.733333333333576 157.7142857142857 31.733333333333576C 176.1142857142857 31.733333333333576 191.88571428571427 47.333333333333485 210.28571428571428 47.333333333333485C 228.68571428571425 47.333333333333485 244.45714285714286 8.933333333333394 262.85714285714283 8.933333333333394C 281.2571428571428 8.933333333333394 297.0285714285714 61.333333333333485 315.4285714285714 61.333333333333485C 333.8285714285714 61.333333333333485 349.59999999999997 65.33333333333348 368 65.33333333333348" fill="none" fill-opacity="1" stroke="#9f9f9f" stroke-opacity="1" stroke-linecap="butt" stroke-width="1" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasksbchoj0z)" filter="url(#SvgjsFilter1339)" pathTo="M 0 67.60000000000036C 18.4 67.60000000000036 34.17142857142857 64.5333333333333 52.57142857142857 64.5333333333333C 70.97142857142856 64.5333333333333 86.74285714285713 21.600000000000364 105.14285714285714 21.600000000000364C 123.54285714285713 21.600000000000364 139.3142857142857 31.733333333333576 157.7142857142857 31.733333333333576C 176.1142857142857 31.733333333333576 191.88571428571427 47.333333333333485 210.28571428571428 47.333333333333485C 228.68571428571425 47.333333333333485 244.45714285714286 8.933333333333394 262.85714285714283 8.933333333333394C 281.2571428571428 8.933333333333394 297.0285714285714 61.333333333333485 315.4285714285714 61.333333333333485C 333.8285714285714 61.333333333333485 349.59999999999997 65.33333333333348 368 65.33333333333348" pathFrom="M -1 2693.3333333333335L -1 2693.3333333333335L 52.57142857142857 2693.3333333333335L 105.14285714285714 2693.3333333333335L 157.7142857142857 2693.3333333333335L 210.28571428571428 2693.3333333333335L 262.85714285714283 2693.3333333333335L 315.4285714285714 2693.3333333333335L 368 2693.3333333333335"></path><g id="SvgjsG1322" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1376" r="0" cx="0" cy="0" class="apexcharts-marker wna6ufc7rl no-pointer-events" stroke="#ffffff" fill="#ee0000" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1323" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1371" x1="0" y1="0" x2="368" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1372" x1="0" y1="0" x2="368" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1373" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1374" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1375" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1316" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1358" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1313" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 40px;"></div><div class="apexcharts-tooltip apexcharts-theme-dark"><div class="apexcharts-tooltip-title" style="font-family: g; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(238, 0, 0);"></span><div class="apexcharts-tooltip-text" style="font-family: g; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-dark"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
        </div>
    </div>

    <div class="col-md-4 d-flex align-items-stretch">
        <div class="card w-100 bg-light-primary shadow-sm overflow-hidden">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="card-title fw-semibold">
                            <img src="/assets/img/icon/TL.svg" alt="قیمت لیر امروز">
                            قیمت لیر <span>2,060</span> تومان
                        </h5>
                        <div class="d-flex gap-2">
                            <span>
                                <span class="round-8 bg-success rounded-circle d-inline-block"></span>
                            </span>
                            <span style="font-size: 0.9em;">
                                آخرین به روزرسانی: <span>1403/08/18-16:20:19</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="currencyChart4" style="min-height: 80px;"><div id="apexchartsax81jpef" class="apexcharts-canvas apexchartsax81jpef apexcharts-theme-light" style="width: 368px; height: 80px;"><svg id="SvgjsSvg1378" width="368" height="80" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1380" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1379"><clipPath id="gridRectMaskax81jpef"><rect id="SvgjsRect1386" width="373" height="81" x="-2.5" y="-0.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskax81jpef"></clipPath><clipPath id="nonForecastMaskax81jpef"></clipPath><clipPath id="gridRectMarkerMaskax81jpef"><rect id="SvgjsRect1387" width="372" height="84" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1392" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1393" stop-opacity="0.65" stop-color="rgba(238,0,0,0.65)" offset="0"></stop><stop id="SvgjsStop1394" stop-opacity="0.5" stop-color="rgba(247,128,128,0.5)" offset="1"></stop><stop id="SvgjsStop1395" stop-opacity="0.5" stop-color="rgba(247,128,128,0.5)" offset="1"></stop></linearGradient><filter id="SvgjsFilter1397" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood1398" flood-color="#000000" flood-opacity="0.2" result="SvgjsFeFlood1398Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1399" in="SvgjsFeFlood1398Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1399Out"></feComposite><feOffset id="SvgjsFeOffset1400" dx="0" dy="3" result="SvgjsFeOffset1400Out" in="SvgjsFeComposite1399Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1401" stdDeviation="5 " result="SvgjsFeGaussianBlur1401Out" in="SvgjsFeOffset1400Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1402" result="SvgjsFeMerge1402Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1403" in="SvgjsFeGaussianBlur1401Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1404" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1405" in="SourceGraphic" in2="SvgjsFeMerge1402Out" mode="normal" result="SvgjsFeBlend1405Out"></feBlend></filter><filter id="SvgjsFilter1407" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood1408" flood-color="#000000" flood-opacity="0.2" result="SvgjsFeFlood1408Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1409" in="SvgjsFeFlood1408Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1409Out"></feComposite><feOffset id="SvgjsFeOffset1410" dx="0" dy="3" result="SvgjsFeOffset1410Out" in="SvgjsFeComposite1409Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1411" stdDeviation="5 " result="SvgjsFeGaussianBlur1411Out" in="SvgjsFeOffset1410Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1412" result="SvgjsFeMerge1412Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1413" in="SvgjsFeGaussianBlur1411Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1414" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1415" in="SourceGraphic" in2="SvgjsFeMerge1412Out" mode="normal" result="SvgjsFeBlend1415Out"></feBlend></filter></defs><line id="SvgjsLine1385" x1="0" y1="0" x2="0" y2="80" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="80" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1416" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1417" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g></g><g id="SvgjsG1427" class="apexcharts-grid"><g id="SvgjsG1428" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1430" x1="0" y1="0" x2="368" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1431" x1="0" y1="13.333333333333334" x2="368" y2="13.333333333333334" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1432" x1="0" y1="26.666666666666668" x2="368" y2="26.666666666666668" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1433" x1="0" y1="40" x2="368" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1434" x1="0" y1="53.333333333333336" x2="368" y2="53.333333333333336" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1435" x1="0" y1="66.66666666666667" x2="368" y2="66.66666666666667" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1436" x1="0" y1="80" x2="368" y2="80" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1429" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1438" x1="0" y1="80" x2="368" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1437" x1="0" y1="1" x2="0" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1388" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1389" class="apexcharts-series" seriesName="قیمت" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1396" d="M 0 80L 0 73.33333333333303C 18.4 73.33333333333303 34.17142857142857 68 52.57142857142857 68C 70.97142857142856 68 86.74285714285713 24 105.14285714285714 24C 123.54285714285713 24 139.3142857142857 36 157.7142857142857 36C 176.1142857142857 36 191.88571428571427 52 210.28571428571428 52C 228.68571428571425 52 244.45714285714286 6.666666666666515 262.85714285714283 6.666666666666515C 281.2571428571428 6.666666666666515 297.0285714285714 56 315.4285714285714 56C 333.8285714285714 56 349.59999999999997 62.666666666666515 368 62.666666666666515C 368 62.666666666666515 368 62.666666666666515 368 80M 368 62.666666666666515z" fill="url(#SvgjsLinearGradient1392)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskax81jpef)" filter="url(#SvgjsFilter1397)" pathTo="M 0 80L 0 73.33333333333303C 18.4 73.33333333333303 34.17142857142857 68 52.57142857142857 68C 70.97142857142856 68 86.74285714285713 24 105.14285714285714 24C 123.54285714285713 24 139.3142857142857 36 157.7142857142857 36C 176.1142857142857 36 191.88571428571427 52 210.28571428571428 52C 228.68571428571425 52 244.45714285714286 6.666666666666515 262.85714285714283 6.666666666666515C 281.2571428571428 6.666666666666515 297.0285714285714 56 315.4285714285714 56C 333.8285714285714 56 349.59999999999997 62.666666666666515 368 62.666666666666515C 368 62.666666666666515 368 62.666666666666515 368 80M 368 62.666666666666515z" pathFrom="M -1 2826.6666666666665L -1 2826.6666666666665L 52.57142857142857 2826.6666666666665L 105.14285714285714 2826.6666666666665L 157.7142857142857 2826.6666666666665L 210.28571428571428 2826.6666666666665L 262.85714285714283 2826.6666666666665L 315.4285714285714 2826.6666666666665L 368 2826.6666666666665"></path><path id="SvgjsPath1406" d="M 0 73.33333333333303C 18.4 73.33333333333303 34.17142857142857 68 52.57142857142857 68C 70.97142857142856 68 86.74285714285713 24 105.14285714285714 24C 123.54285714285713 24 139.3142857142857 36 157.7142857142857 36C 176.1142857142857 36 191.88571428571427 52 210.28571428571428 52C 228.68571428571425 52 244.45714285714286 6.666666666666515 262.85714285714283 6.666666666666515C 281.2571428571428 6.666666666666515 297.0285714285714 56 315.4285714285714 56C 333.8285714285714 56 349.59999999999997 62.666666666666515 368 62.666666666666515" fill="none" fill-opacity="1" stroke="#9f9f9f" stroke-opacity="1" stroke-linecap="butt" stroke-width="1" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskax81jpef)" filter="url(#SvgjsFilter1407)" pathTo="M 0 73.33333333333303C 18.4 73.33333333333303 34.17142857142857 68 52.57142857142857 68C 70.97142857142856 68 86.74285714285713 24 105.14285714285714 24C 123.54285714285713 24 139.3142857142857 36 157.7142857142857 36C 176.1142857142857 36 191.88571428571427 52 210.28571428571428 52C 228.68571428571425 52 244.45714285714286 6.666666666666515 262.85714285714283 6.666666666666515C 281.2571428571428 6.666666666666515 297.0285714285714 56 315.4285714285714 56C 333.8285714285714 56 349.59999999999997 62.666666666666515 368 62.666666666666515" pathFrom="M -1 2826.6666666666665L -1 2826.6666666666665L 52.57142857142857 2826.6666666666665L 105.14285714285714 2826.6666666666665L 157.7142857142857 2826.6666666666665L 210.28571428571428 2826.6666666666665L 262.85714285714283 2826.6666666666665L 315.4285714285714 2826.6666666666665L 368 2826.6666666666665"></path><g id="SvgjsG1390" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1444" r="0" cx="0" cy="0" class="apexcharts-marker wm040onde no-pointer-events" stroke="#ffffff" fill="#ee0000" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1391" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1439" x1="0" y1="0" x2="368" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1440" x1="0" y1="0" x2="368" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1441" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1442" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1443" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1384" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1426" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1381" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 40px;"></div><div class="apexcharts-tooltip apexcharts-theme-dark"><div class="apexcharts-tooltip-title" style="font-family: g; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(238, 0, 0);"></span><div class="apexcharts-tooltip-text" style="font-family: g; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-dark"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
        </div>
    </div>
</div>

        <!-- آخرین اکانت های شارژ شده -->
        <div class="row mb-4" style="padding-left: 0;">
            <div class="col-12 d-flex flex-row justify-content-between mb-md-4 mb-0 align-items-center">
                <p class="fs-4 fw-bolder mb-0"><i class="ti ti-ad me-1 fs-8 text-primary"></i> لیست اکانت‌ها</p>
                <a href="https://my.g-ads.org/Client/ClientAccount/AccountsGoogle" class="btn btn-sm mb-1 waves-effect waves-light btn-outline-primary d-none d-md-block">مشاهده اکانت‌ها <i class="ti ti-circle-arrow-left"></i></a>
            </div>
            <div class="col-12 d-block d-md-none  px-4"><a href="https://my.g-ads.org/Client/ClientAccount/AccountsGoogle" class="btn mb-1 waves-effect waves-light btn-outline-primary w-100 my-3">مشاهده اکانت‌ها <i class="ti ti-circle-arrow-left"></i></a></div>
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
                        <div id="accountGoogleChart" class="mb-4" style="min-height: 178.7px;"><div id="apexcharts4p5thmer" class="apexcharts-canvas apexcharts4p5thmer apexcharts-theme-light" style="width: 406px; height: 178.7px;"><svg id="SvgjsSvg1224" width="406" height="178.7" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1226" class="apexcharts-inner apexcharts-graphical" transform="translate(116, 0)"><defs id="SvgjsDefs1225"><clipPath id="gridRectMask4p5thmer"><rect id="SvgjsRect1228" width="182" height="200" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask4p5thmer"></clipPath><clipPath id="nonForecastMask4p5thmer"></clipPath><clipPath id="gridRectMarkerMask4p5thmer"><rect id="SvgjsRect1229" width="180" height="202" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1230" class="apexcharts-pie"><g id="SvgjsG1231" transform="translate(0, 0) scale(1)"><circle id="SvgjsCircle1232" r="59.890243902439025" cx="88" cy="88" fill="transparent"></circle><g id="SvgjsG1233" class="apexcharts-slices"><g id="SvgjsG1234" class="apexcharts-series apexcharts-pie-series" seriesName="فعال" rel="1" data:realIndex="0"><path id="SvgjsPath1235" d="M 88 8.146341463414629 A 79.85365853658537 79.85365853658537 0 0 1 88 8.146341463414629 L 88 28.109756097560975 A 59.890243902439025 59.890243902439025 0 0 0 88 28.109756097560975 L 88 8.146341463414629 z" fill="var(--bs-success)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="0" data:startAngle="0" data:strokeWidth="0" data:value="0" data:pathOrig="M 88 8.146341463414629 A 79.85365853658537 79.85365853658537 0 0 1 88 8.146341463414629 L 88 28.109756097560975 A 59.890243902439025 59.890243902439025 0 0 0 88 28.109756097560975 L 88 8.146341463414629 z"></path></g><g id="SvgjsG1236" class="apexcharts-series apexcharts-pie-series" seriesName="غیرxفعال" rel="2" data:realIndex="1"><path id="SvgjsPath1237" d="M 88 8.146341463414629 A 79.85365853658537 79.85365853658537 0 0 1 88 8.146341463414629 L 88 28.109756097560975 A 59.890243902439025 59.890243902439025 0 0 0 88 28.109756097560975 L 88 8.146341463414629 z" fill="var(--bs-danger)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="0" data:startAngle="0" data:strokeWidth="0" data:value="0" data:pathOrig="M 88 8.146341463414629 A 79.85365853658537 79.85365853658537 0 0 1 88 8.146341463414629 L 88 28.109756097560975 A 59.890243902439025 59.890243902439025 0 0 0 88 28.109756097560975 L 88 8.146341463414629 z"></path></g></g></g><g id="SvgjsG1238" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"><text id="SvgjsText1239" font-family="g" x="88" y="95" text-anchor="middle" dominant-baseline="auto" font-size="20px" font-weight="600" fill="#000000" class="apexcharts-text apexcharts-datalabel-label" style="font-family: g;"></text></g></g><line id="SvgjsLine1240" x1="0" y1="0" x2="176" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1241" x1="0" y1="0" x2="176" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG1227" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-dark"><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: var(--bs-success);"></span><div class="apexcharts-tooltip-text" style="font-family: g; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: var(--bs-danger);"></span><div class="apexcharts-tooltip-text" style="font-family: g; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center text-center">
                                <div>
                                    <i class="ti ti-circle-filled text-primary"></i>
                                    <h6 class="fw-semibold text-dark fs-4 mb-0" key="dashboard_accountGoogle_count">-</h6>
                                    <p class="fs-3 mb-0 fw-normal">تعداد  اکانت‌ها</p>
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
                                <a href="https://my.g-ads.org/Client/ClientInvoice/Invoices" class="btn mb-1 waves-effect waves-light btn-outline-primary d-none d-md-block">مشاهده سفارشات <i class="ti ti-circle-arrow-left"></i></a>
                                <a href="https://my.g-ads.org/Client/ClientInvoice/Invoices" class="btn mb-1 waves-effect waves-light btn-outline-primary d-block d-md-none w-100">مشاهده سفارشات <i class="ti ti-circle-arrow-left"></i></a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div id="grid_invoices_wrapper" class="dataTables_wrapper no-footer"><div id="grid_invoices_processing" class="dataTables_processing" style="display: none;"><div><div></div><div></div><div></div><div></div></div></div><table id="grid_invoices" class="table align-middle text-nowrap mb-0 dataTable no-footer" style="width: 702px;"><thead><tr><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 182px;">سفارش</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 183px;">وضعیت</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 241px;">مبلغ فاکتور</th></tr></thead><tbody><tr class="odd"><td valign="top" colspan="3" class="dataTables_empty">دیتایی برای نمایش وجود ندارد!</td></tr></tbody></table></div>
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
                        <a href="https://my.g-ads.org/Client/ClientTicket/Tickets" class="btn btn-outline-primary w-100 mt-4">
                            مشاهده تیکت ها <i class="ti ti-circle-arrow-left fs-6"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<template id="tickets_template">
    <li class="timeline-item d-flex position-relative overflow-hidden">
        <div class="timeline-time text-dark flex-shrink-0 text-end fs-2"><i class="ti ti-calendar ms-1"></i>#modifiedDateH#<br><i class="ti ti-clock ms-1"></i>#modifiedDateM#</div>
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
                            <img src="/assets/img/icon/#code#.svg" alt="قیمت #title# امروز">
                            قیمت #title# <span>#iranAmount#</span> تومان
                        </h5>
                        <div class="d-flex gap-2">
                            <span>
                                <span class="round-8 bg-success rounded-circle d-inline-block"></span>
                            </span>
                            <span style="font-size: 0.9em;">
                                آخرین به روزرسانی: <span>#modifiedDate#</span>
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
                        <div><span class="campTypeBadge">GoogleAds</span></div>
                        <div class="d-flex flex-row justify-content-end mb-1">
                            <span class="badge bg-primary border rounded-5 border-primary text-white flex-row fs-2 text-uppercase">#currencyCode#</span>
                        </div>
                    </div>
                    <p class="accountGoogle_name fw-bolder fs-5 mb-0" style="direction: ltr">#name#</p>
                    <p class="mb-1" style="direction:ltr">CID: <span>#customerId#</span></p>
                    <button class=" btn btn-sm btn-success icoAccordian position-absolute text-white" data-bs-toggle="collapse" data-bs-target="#acc_#id#" aria-expanded="false" aria-controls="acc_#id#">
                        <i class="ti ti-circle-arrow-right-filled fs-9"></i>
                        <i class="ti ti-circle-arrow-down-filled fs-9"></i>شارژ کنید
                    </button>
                </div>
            </div>
            <div class="card-body p-0 shadow-none">
                <div class="collapse p-3" id="acc_#id#">
                    <form action="#">
                        <div class="form-floating mb-2">
                            <input type="text" class="accountGoogle_amount form-control mb-2 text-end" placeholder="عدد وارد کنید">
                            <p class="form-control-feedback text text-center">قیمت ارز با کارمزد: <span class="accountGoogle_currencyIranAmount">0</span></p>
                            <label><i class="ti ti-#currencyCode# me-2 fs-5 text-primary fw-bolder"></i>عدد وارد کنید</label>
                        </div>
                        <p class="accountGoogle_serviceCost_parent text-center">
                            قابل پرداخت: <span class="accountGoogle_serviceCost fw-bolder text-success fs-6">0</span>
                        </p>
                        <div class="text-center">
                            <button type="button" class="accountGoogle_submit btn btn-primary" disabled="">شارژ کن <i class="ti ti-rocket"></i></button>
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
                    <div class="modal-footer"> </div>
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
                    <button type="button" id="btn_modalConfirm_yes" data-bs-dismiss="modal" class="btn btn-warning text-warning font-medium text-dark">
                        بله
                    </button>
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
                    <button type="button" id="btn_modalPrompt_yes" data-bs-dismiss="modal" class="btn btn-warning text-warning font-medium text-dark">
                        ثبت
                    </button>
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
            <a href="https://my.g-ads.org/Client/ClientMessage/Messages" class="fw-bolder text-primary">
                تاریخچه اعلان‌‌ها
                <i class="ti ti-arrow-left ms-2 fs-7"></i>
            </a>
        </p>
    </div>
    <div id="modalContainer"></div>

    <footer>
        <div id="experts">
            <div id="6d9f64b7-09ab-495a-bf6d-8cb2b8c0e098" class="d-none expertBox bg-white shadow px-2 py-3 w-100 rounded-3 mb-3"><div class="d-flex justify-content-between align-items-center"><div class="d-flex"><div><img decoding="async" src="https://g-ads.org/wp-content/uploads/2023/09/z_sharifi.jpg" alt="شریفی - کارشناس گوگل ادز" class="me-2"></div><div><p class="fw-bold fs-4 mb-0 text-primary">زهرا شریفی</p><p class="fw-normal fs-3 mb-0">داخلی ۱۰۷</p></div></div><div class="d-flex"><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="tel:09056622606"><i class="fs-5 ti ti-phone"></i></a><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://api.whatsapp.com/send?phone=989056622606&amp;text=%D8%B3%D9%84%D8%A7%D9%85.%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87%20%D8%AF%D8%B1%20%D8%B2%D9%85%DB%8C%D9%86%D9%87%20%D8%AA%D8%A8%D9%84%DB%8C%D8%BA%D8%A7%D8%AA%20%DA%AF%D9%88%DA%AF%D9%84%20%D8%AA%D9%85%D8%A7%D8%B3%20%DA%AF%D8%B1%D9%81%D8%AA%D9%85"><i class="fs-5 ti ti-brand-whatsapp"></i></a><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://t.me/gads_support_7"><i class="fs-5 ti ti-brand-telegram"></i></a></div></div></div>
            <div id="a0c692e5-8e23-43ca-a171-145a2f0f9f0c" class="expertBox bg-white shadow px-2 py-3 w-100 rounded-3 mb-3"><div class="d-flex justify-content-between align-items-center"><div class="d-flex"><div><img decoding="async" src="https://g-ads.org//wp-content/uploads/2023/09/n_tehrani.jpg" alt="تهرانی - کارشناس گوگل ادز" class="me-2"></div><div><p class="fw-bold fs-4 mb-0 text-primary">نفس تهرانی</p><p class="fw-normal fs-3 mb-0">داخلی ۱۰۶</p></div></div><div class="d-flex"><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="tel:09026015384"><i class="fs-5 ti ti-phone"></i></a><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://api.whatsapp.com/send?phone=989026015384&amp;text=%D8%B3%D9%84%D8%A7%D9%85.%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87%20%D8%AF%D8%B1%20%D8%B2%D9%85%DB%8C%D9%86%D9%87%20%D8%AA%D8%A8%D9%84%DB%8C%D8%BA%D8%A7%D8%AA%20%DA%AF%D9%88%DA%AF%D9%84%20%D8%AA%D9%85%D8%A7%D8%B3%20%DA%AF%D8%B1%D9%81%D8%AA%D9%85"><i class="fs-5 ti ti-brand-whatsapp"></i></a><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://t.me/gads_support_6"><i class="fs-5 ti ti-brand-telegram"></i></a></div></div></div>
            <div id="fdf40a35-a079-40f1-bbae-5f4e6fcf175d" class="d-none expertBox bg-white shadow px-2 py-3 w-100 rounded-3 mb-3"><div class="d-flex justify-content-between align-items-center"><div class="d-flex"><div><img decoding="async" src="https://g-ads.org/wp-content/uploads/2024/07/sh_kiazar.jpg" alt="کیا - کارشناس گوگل ادز" class="me-2"></div><div><p class="fw-bold fs-4 mb-0 text-primary">شیوا کیا</p><p class="fw-normal fs-3 mb-0">داخلی ۱۰۴</p></div></div><div class="d-flex"><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="tel:09396410499"><i class="fs-5 ti ti-phone"></i></a><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://api.whatsapp.com/send?phone=989396410499&amp;text=%D8%B3%D9%84%D8%A7%D9%85.%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87%20%D8%AF%D8%B1%20%D8%B2%D9%85%DB%8C%D9%86%D9%87%20%D8%AA%D8%A8%D9%84%DB%8C%D8%BA%D8%A7%D8%AA%20%DA%AF%D9%88%DA%AF%D9%84%20%D8%AA%D9%85%D8%A7%D8%B3%20%DA%AF%D8%B1%D9%81%D8%AA%D9%85"><i class="fs-5 ti ti-brand-whatsapp"></i></a><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://t.me/g_ads_support_4"><i class="fs-5 ti ti-brand-telegram"></i></a></div></div></div>
            <div id="8131b214-bc23-4460-baca-408fa025e32e" class="d-none expertBox bg-white shadow px-2 py-3 w-100 rounded-3 mb-3"><div class="d-flex justify-content-between align-items-center"><div class="d-flex"><div><img decoding="async" src="https://g-ads.org//wp-content/uploads/2023/09/m_siminpour.jpg" alt="سیمین پور - کارشناس گوگل ادز" class="me-2"></div><div><p class="fw-bold fs-4 mb-0 text-primary">ملیحه سیمین پور</p><p class="fw-normal fs-3 mb-0">‌داخلی ۱۰۵</p></div></div><div class="d-flex ms-3"><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="tel:09374779838"><i class="fs-5 ti ti-phone"></i></a><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://api.whatsapp.com/send?phone=989374779838&amp;text=%D8%B3%D9%84%D8%A7%D9%85.%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87%20%D8%AF%D8%B1%20%D8%B2%D9%85%DB%8C%D9%86%D9%87%20%D8%AA%D8%A8%D9%84%DB%8C%D8%BA%D8%A7%D8%AA%20%DA%AF%D9%88%DA%AF%D9%84%20%D8%AA%D9%85%D8%A7%D8%B3%20%DA%AF%D8%B1%D9%81%D8%AA%D9%85"><i class="fs-5 ti ti-brand-whatsapp"></i></a><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://t.me/gads_support_5"><i class="fs-5 ti ti-brand-telegram"></i></a></div></div></div>
            <div id="ff314126-9661-4161-8b3c-043564045adc" class="d-none expertBox bg-white shadow px-2 py-3 w-100 rounded-3 mb-3"><div class="d-flex justify-content-between align-items-center"><div class="d-flex"><div><img decoding="async" src="https://g-ads.org//wp-content/uploads/2023/09/k_bonakdar.jpg" alt="بنکدار - کارشناس گوگل ادز" class="me-2"></div><div><p class="fw-bold fs-4 mb-0 text-primary">نیکا بنکدار</p><p class="fw-normal fs-3 mb-0">داخلی ۱۰۸</p></div></div><div class="d-flex"><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="tel:09056633606"><i class="fs-5 ti ti-phone"></i></a><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://api.whatsapp.com/send?phone=989056633606&amp;text=%D8%B3%D9%84%D8%A7%D9%85.%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87%20%D8%AF%D8%B1%20%D8%B2%D9%85%DB%8C%D9%86%D9%87%20%D8%AA%D8%A8%D9%84%DB%8C%D8%BA%D8%A7%D8%AA%20%DA%AF%D9%88%DA%AF%D9%84%20%D8%AA%D9%85%D8%A7%D8%B3%20%DA%AF%D8%B1%D9%81%D8%AA%D9%85"><i class="fs-5 ti ti-brand-whatsapp"></i></a><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://t.me/g_ads_support_8"><i class="fs-5 ti ti-brand-telegram"></i></a></div></div></div>
            <div id="b240d8da-e2ee-45d8-9006-32e96ba8dcec" class="d-none expertBox bg-white shadow px-2 py-3 w-100 rounded-3 mb-3"><div class="d-flex justify-content-between align-items-center"><div class="d-flex"><div><img decoding="async" src="https://g-ads.org//wp-content/uploads/2023/09/f_mohammadi.jpg" alt="محمدی - کارشناس گوگل ادز" class="me-2"></div><div><p class="fw-bold fs-4 mb-0 text-primary">فرهاد محمدی</p><p class="fw-normal fs-3 mb-0">داخلی ۱۰۲</p></div></div><div class="d-flex ms-3"><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="tel:09308727143"><i class="fs-5 ti ti-phone"></i></a><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://api.whatsapp.com/send?phone=989308727143&amp;text=%D8%B3%D9%84%D8%A7%D9%85.%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87%20%D8%AF%D8%B1%20%D8%B2%D9%85%DB%8C%D9%86%D9%87%20%D8%AA%D8%A8%D9%84%DB%8C%D8%BA%D8%A7%D8%AA%20%DA%AF%D9%88%DA%AF%D9%84%20%D8%AA%D9%85%D8%A7%D8%B3%20%DA%AF%D8%B1%D9%81%D8%AA%D9%85"><i class="fs-5 ti ti-brand-whatsapp"></i></a><a class="btn btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center me-1" href="https://t.me/gads_support_2"><i class="fs-5 ti ti-brand-telegram"></i></a></div></div></div>
        </div>
    </footer>


    <script src="https://my.g-ads.org/assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://my.g-ads.org/assets/js/bootstrap-switch.js"></script>
    <script src="https://my.g-ads.org/assets/js/app.min.js"></script>
    <script src="https://my.g-ads.org/assets/js/app.init.js"></script>
    <script src="https://my.g-ads.org/assets/js/app-style-switcher.js"></script>
    <script src="https://my.g-ads.org/assets/js/sidebarmenu.js"></script>
    <script src="https://my.g-ads.org/assets/js/custom.js"></script>
    <script src="https://my.g-ads.org/assets/js/apex.js"></script>
    <script src="https://my.g-ads.org/assets/js/select2.js"></script>
    <script src="https://my.g-ads.org/assets/js/datatable/jqueryDatatable.js"></script>
    <script src="https://my.g-ads.org/assets/js/jalali.js"></script>

    <script>
              var _fUrl = 'https://my.g-ads.org/';
        var _bUrl = 'https://sublayer.userstat.info/';
        var _signInPage = _fUrl + 'Home/SignIn';
        setInterval(function () { access_g() }, 1 * 60 * 1000);
        jalaliDatepicker.startWatch();

                var _lst_currencyType = [{ currencyType: 1, title: 'تومان', sign: 'ت', code: 'IRR' }, { currencyType: 6, title: 'بت تایلند', sign: '฿', code: 'THB' }, { currencyType: 2, title: 'دلار', sign: '$', code: 'USD' }, { currencyType: 4, title: 'لیر', sign: '₺', code: 'TL' }, { currencyType: 3, title: 'درهم', sign: 'د.إ', code: 'AED' }, { currencyType: 5, title: 'یورو', sign: '€', code: 'EUR' }, { currencyType: 20, title: 'دلار-B', sign: 'USDB', code: 'USDB' }];
        var _lst_invoiceType = [{ key: 'W', value: 'شارژ کیف' }, { key: 'G', value: 'گوگل اکانت' }, { key: 'P', value: 'محصول' }]
        var _lst_payState = [{ key: 1, value: 'ثبت اولیه', css: 'info' }, { key: 100, value: 'تأیید پرداخت', css: 'success' }, , { key: 500, value: 'خطای سیستمی', css: 'danger' }]
       var _lst_payMethod = [{ key: 'V', value: 'وندار' }, { key: 'R', value: 'زرین‌پال' }, { key: 'S', value: 'استارپی' }, { key: 'Z', value: 'زیبال' }, { key: 'A', value: 'حساب به حساب' }, { key: 'C', value: 'کارت به کارت' }, { key: 'W', value: 'کیف پول' }]
        var _lst_invoiceState = [
            { key: 1, css: 'bg-warning text-white', value: 'در انتظار پرداخت' }
            , { key: 9, css: 'bg-dark text-dark', value: 'رد توسط کاربر' }
            , { key: 10, css: 'bg-info text-white', value: 'در انتظار تأیید کارشناس' }
            , { key: 20, css: 'bg-indigo text-white', value: 'تأیید کارشناس' }
            , { key: 29, css: 'bg-danger bg-opacity-25 text-dark', value: 'برگشت توسط کارشناس' }
            , { key: 40, css: 'bg-indigo text-white', value: 'تأیید واحد مالی' }
            , { key: 49, css: 'bg-dark text-white', value: 'کنسل واحد مالی' }
            , { key: 100, css: 'bg-success text-white', value: 'تأیید نهایی' }
            , { key: 109, css: 'bg-danger text-white', value: 'رد توسط مدیریت اکانت‌ها' }
            , { key: 111, css: 'bg-warning text-white', value: 'درخواست عودت' }
            , { key: 119, css: 'bg-dark text-white', value: 'عودت شده' }
        ];

        function access_g() {
            var l = localStorage.getItem('access')
            if (l) {
                var lastUpdate = JSON.parse(l);
                if (lastUpdate && (new Date() - new Date(lastUpdate.time)) < 50 * 1000) {
                    access_g_show(lastUpdate.data);
                    return;
                }
            }
            $.ajax({ beforeSend: function (xhr) { bearer(xhr) },
                url: _bUrl + "api/user/v1/access_g", type: 'get',
                success: function (res) {
                    localStorage.setItem("access", JSON.stringify({ time: new Date(), data: res }))
                    access_g_show(res)
                   }
                , error: function (request, status) { location.href = _signInPage; }
            });
        }

        function access_g_show(res) {
            if (!res) { location.href = _signInPage; return; }
            if (!res.r_data.email || !res.r_data.full_name || !res.r_data.cellPhone) {
                console.log('r_data>',res.r_data);
                $('#modalContainer').html('').load(
                    _fUrl + 'client/clientDefault/clientNew',
                    function (response, status, xhr) { // note the extra params
                        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                            var modal = new bootstrap.Modal(document.getElementById('clientNew'))
                            modal.show();
                        }
                    });
            }
            else {

            }
        }

        function notifydashboard_g() {
            var lastUpdate = JSON.parse(localStorage.getItem('notifydashboard'));
            if (lastUpdate && (new Date() - new Date(lastUpdate.time)) < 30 * 1000) {
                $.each(lastUpdate.data, function (i, v) {
                    if (v.value)
                        $('#sidebarnav [key="' + v.key + '"]').addClass('hasNotif')
                    else
                        $('#sidebarnav [key="' + v.key + '"]').removeClass('hasNotif')
                }); return;
            }
            $.ajax({ beforeSend: function (xhr) { bearer(xhr) },
                url: _bUrl + "api/notify/v1/client/notifyDashboard_g", type: 'get',
                success: function (res) {
                    localStorage.setItem("notifydashboard", JSON.stringify({ time: new Date(), data: res }))
                    $.each(res, function (i, v) {
                        if (v.value)
                            $('#sidebarnav [key="' + v.key + '"]').addClass('hasNotif')
                        else
                            $('#sidebarnav [key="' + v.key + '"]').removeClass('hasNotif')
                    });
                }
                , error: function (request, status) { }
            });
        }

        function userDashboard_g() {
            var lastUpdate = JSON.parse(localStorage.getItem('userDashboard'));
            if (lastUpdate && (new Date() - new Date(lastUpdate.time)) < 1 * 60 * 1000) {
                userDashboard_g_show(lastUpdate.data); return;
            }
            $.ajax({ beforeSend: function (xhr) { bearer(xhr) },
                url: _bUrl + "api/user/v1/client/userDashboard_G", type: 'get',
                success: function (res) {
                    localStorage.setItem("userDashboard", JSON.stringify({ time: new Date(), data: res.r_data }))
                    userDashboard_g_show(res.r_data)
                }
                , error: function (request, status) { }
            });
        }

        function userDashboard_g_show(res) {
            if (!res) return;
            res.img && $('#dashBoard_img1 , #dashBoard_img2').attr('src', res.img);
            $('#experts #' + res.expertId).removeClass('d-none')
            if (res.firstName || (res.lastName))
                $('#dashBoard_fullName , #dashBoard_fullNameTop').html((res.firstName || '') + ' ' + (res.lastName || ''));
        }

        function messages_g(start, length) {
            var lastUpdate = JSON.parse(localStorage.getItem('messages'));
            if (lastUpdate && (new Date() - new Date(lastUpdate.time)) < 30 * 1000) {
                messages_g_show(lastUpdate.data); return;
            }
            $.ajax({ beforeSend: function (xhr) { bearer(xhr) },
                url: _bUrl + "api/message/v1/messagesDashboard_g", type: 'post', contentType: 'application/json; charset=utf-8',
                data: JSON.stringify({ start: start, length: length, state: 'N' }),
                success: function (res) {
                    localStorage.setItem("messages", JSON.stringify({ time: new Date(), data: res }))
                    messages_g_show(res)
                }
                , error: function (request, status) { }
            });
        }

        function messages_g_show(res) {
            $('#message-count b').html(res.length);
            if (res.length > 0) {
            $('#message-content').html('');
                $('.notifTop').addClass('hasNotif')
                $.each(res, function (i, v) {
                    var str = '<div class="accordion-item mb-2"><h2 class="accordion-header" id="headingOne"><button class="accordion-button collapsed text-start" type="button" data-bs-toggle="collapse" data-bs-target="#message_' + v.id + '" aria-expanded="false" aria-controls="message_' + v.id + '" sty;e="line-height:1.7"><span class="text-primary fw-bolder">' + truncate(v.body, 20) + ' </span><br><span class="class="text-muted fw-bolder"">' + v.insertDate + '</span></button></h2><div id="message_' + v.id + '" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionNotification"><div class="accordion-body"><p>' + v.body + '</p><p class="text-end"><span id="message_' + v.id + '" onclick="message_u(' + v.id + ')" class="btn btn-outline-success btn-sm cursor-pointer">خواندم</span></p></div></div></div>';
                    $('#message-content').append(str)
                });
            }
        }

        function message_u(id) {
            $.ajax({ beforeSend: function (xhr) { bearer(xhr) },
                url: _bUrl + "api/message/v1/message_u/" + id, type: 'patch',
                success: function (res) { $('#message_' + id).closest('.accordion-item').remove(); }
                , error: function (request, status) { ajax_error2(request, status); }
            });
        }

        $(function () {
            access_g();
            userDashboard_g();
            notifydashboard_g();
            messages_g(0, 5);
            $('body').tooltip({ selector: '[data-bs-toggle="tooltip"]' });

            $(document).on('click', '#message-count', function () {
                var myOffcanvas = document.getElementById('sidebar_message')
                var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);
                bsOffcanvas.show();
            });

            $(document).on('click', '#user-profile', function () {
                if ($('#user-profile-dropdown').hasClass('show')) {
                    lock($('#user-profile-dropdown'), 1);
                    $.ajax({ beforeSend: function (xhr) { bearer(xhr) },
                        url: _bUrl + "api/user/v1/client/user_g", type: 'get',
                        success: function (res) {
                            lock($('#user-profile-dropdown'), 0);
                        },
                        error: function (request, status) {
                            ajax_error2(request, status);
                        }
                    });
                }
            });
        });

        $('.sidebarHolder').on('click', function () {
            $('#sidebarCollapse').click()
        });

    </script>

    <!-- <script src="https://my.g-ads.org/assets/js/script.js?v=14030701"></script> -->
    
    <script>
        $(function () {
            $('#ip').html('158.58.63.110')
            accountsGoogle_g();
            dashboard_g();
            currencys_g();
            tickets_g();
        });

        function tickets_g() {
            $.ajax({ beforeSend: function (xhr) { bearer(xhr) },
                url: _bUrl + 'api/ticket/v1/client/ticketsDashboard_g',
                type: 'get',
                success: function (res) {
                    $('#tickets').html('')
                    $.each(res, function (i, v) {
                        var html = $('#tickets_template').html()
                        for (var o in v) {
                            html = html.replace(new RegExp('#' + o + '#', "g"), isNumber(v[o]) ? numberWithCommas(v[o]) : v[o])
                        }
                        html = html.replace('#modifiedDateM#', v['modifiedDate'].substr(v['modifiedDate'].length - 8))
                        html = html.replace('#modifiedDateH#', v['modifiedDate'].substring(0, 10))
                        $('#tickets').append(html)
                    })
                },
                error: function (r, s) { }
            });
        }

        function currencys_g() {
            $.ajax({ beforeSend: function (xhr) { bearer(xhr) },
                url: _bUrl + 'api/currency/v1/client/currencysDashboard_g',
                type: 'get',
                success: function (res) {
                    $('#currencys').html('')
                    $.each(res, function (i, v) {
                        var html = $('#currencys_template').html()
                        for (var o in v) {
                            html = html.replace(new RegExp('#' + o + '#', "g"), isNumber(v[o]) ? numberWithCommas(v[o]):v[o] )
                        }
                        if(v['iranAmount'])
                            $('#currencys').append(html)
                        if (i === res.length-1) {currencyLogsDashboard_g()}
                    })
                },
                error: function (r, s) {}
            });
        }

        function currencyLogsDashboard_g() {
            $.ajax({ beforeSend: function (xhr) { bearer(xhr) },
                url: _bUrl + 'api/currency/v1/client/currencyLogsDashboard_g',
                type: 'get',
                success: function (res) {
                 if (!res.length) return false;
                    $.each(distinctArray(res, 'currencyType', 0), function (i, v) {
                    var arr = res.filter(function (x) { return x.currencyType == v }).map(function (x) { return x.iranAmount }).reverse();
                  if (!$("#currencyChart" + v).length) return true;
                    var _colors = '#BBBBBB';
                    if (arr.length > 1 && (arr[arr.length - 1] > arr[arr.length - 2]))
                        _colors = '#00EE00'
                    if (arr.length > 1 && (arr[arr.length - 1] < arr[arr.length - 2]))
                        _colors = '#EE0000'
                   var chartaed = {
                        series: [{
                                name: "قیمت",
                            data: arr
                            }],
                        chart: {
                            height: 80,
                            type: "area",
                            fontFamily: '"g',
                            foreColor: "#adb0bb",
                            toolbar: {show: false},
                            sparkline: {enabled: true},
                            dropShadow: {enabled: true,top: 3,left: 0,blur: 5,color: "#000",opacity: 0.2,},
                        },
                       colors: [function () { return _colors }], 
                        dataLabels: {enabled: false},
                        stroke: {curve: "smooth",colors: ["#9F9F9F"],width: 1,},
                        fill: {type: "gradient"},
                        markers: {show: false},
                        grid: {show: false},
                        yaxis: {show: false},
                        xaxis: {
                            type: "category",
                            categories: res.filter(function (x) { return x.currencyType == v }).map(function (x) { return x.insertDate }).reverse(),
                            axisBorder: {show: false},
                            axisTicks: {show: false},
                        },
                        legend: {show: false},
                        tooltip: {theme: "dark"},
                      };
                    var chartaed = new ApexCharts(document.querySelector("#currencyChart"+v),chartaed);
                       chartaed.render();
                    });
                },
                error: function (r, s) { }
            });
        }

        function dashboard_g() {
            $.ajax({ beforeSend: function (xhr) { bearer(xhr) },
                url: _bUrl + "api/dashboard/v1/client/dashboard_g",
                data: {}, type: 'get',
                success: function (res) {
                    var a0, a1;
                    $.each(res, function (i, v) {
                        $('#dashboard [key="dashboard_' + v.key + '"]').html(v.value || '-');
                        if(v.key == 'accountGoogle_0_count') a0 = (v.value||0);
                        if(v.key == 'accountGoogle_1_count') a1 = (v.value || 0);
                        if (i == (res.length - 1)) {
                            var options = {
                                series: [getInt(a1 / (a1 + a0) * 100), getInt(a0 / (a1 + a0)*100)],
                                labels: ["فعال", "غیر فعال"],
                                chart: { height: 200, type: "donut", fontFamily: "g", foreColor: "#000", }, color: "#adb5bd",
                                plotOptions: {
                                    pie: {
                                        donut: {
                                            size: '75%', background: 'transparent',
                                            labels: {
                                                show: true, name: { show: true, offsetY: 7, }, value: { show: false, },
                                                total: {
                                                    show: true, color: '#000', fontSize: '20px', fontWeight: "600", label: '',
                                                },
                                            },
                                        },
                                    },
                                },
                                stroke: { show: false }, dataLabels: { enabled: false }, legend: { show: false },
                                colors: ["var(--bs-success)", "var(--bs-danger)"], tooltip: { theme: "dark", fillSeriesColor: false },
                            };
                            var chart = new ApexCharts(document.querySelector("#accountGoogleChart"), options);
                            chart.render();
                        }
                    });
                }
                , error: function (request, status) { }
            });
        }

        dataTable_invoices = $('#grid_invoices').DataTable({
            processing: true, serverSide: true, ordering: false, paging: false, searching: false, editing: true, pageLength: 6, bLengthChange: false,
            bInfo: false,language: {zeroRecords: "دیتایی برای نمایش وجود ندارد!"},
            createdRow: function (row, data, dataIndex) {
                $(row).attr('data-id', data.id);
                $(row).attr('data-parentid', data.parentId);
            },
            columns: [
                {
                    sTitle: 'سفارش', data: "title",
                    render: function (data, type, item) {
                        return '<div class="d-flex align-items-center"><div class="ms-0 text-start"><h6 class="fs-3 fw-semibold mb-0"><span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="' + (item.title || '') + '">' + (item.priorityType == "M" ? '<i class="ti ti-sparkles text-info me-1"></i>' : '') + (item.title || '') + '</span></h6><span class="fw-bold ps-3">' + item.trackNo + '</span></div></div>'
                    }
                },
                {
                    sTitle: 'وضعیت', data: "invoiceStateDescription",
                    render: function (data, type, item) {
                        var state = _lst_invoiceState.filter(function (x) { return getInt(x.key) == getInt(item.invoiceState) })[0];
                        return '<div class="d-flex align-items-center text-start"><div class="ms-0"><h6 class="fs-4 fw-semibold mb-1"><span class="badge ' + (state ? state.css : 'bg-info') + '  text-white rounded-3 fw-semibold fs-2">' + item.invoiceStateDescription + '</span></h6><span class="fw-normal"><i class="ti ti-clock"></i>' + item.modifiedDate + '</span></div></div>'
                    }
                },
                {
                    sTitle: 'مبلغ فاکتور', data: "paymentCost",
                    render: function (data, type, item) {
                        return numberWithCommas(item.paymentCost)+ ' تومان'
                    }
                }
            ],
            ajax: { beforeSend: function (xhr) { bearer(xhr) },
                url: _bUrl + "api/invoice/v1/client/invoicesDashboard_g",
                type: "Post",
                dataSrc: function (json) {
                    json.iTotalRecords = json.length;
                    json.iTotalDisplayRecords = json.length;
                    json.data = json;
                    return json.data;
                },
                error: function (xhr, error, code) {}
            },
            columnDefs: [{ targets: 0, searchable: true,}]
        });


        function accountsGoogle_g() {
            $.ajax({ beforeSend: function (xhr) { bearer(xhr) },
                url: _bUrl + 'api/account/v1/client/accountsGoogleDashboard_g',
                type: 'get',
                success: function (res) {
                    $('#accountsgoogle').html('');
                    $.each(res, function (i, v) {
                        var html = $('#accountGoogle_template').html()
                        html = html.replace(/#id#/g, v.id).replace(/#customerId#/g, v.customerId || '-').replace(/#name#/g, truncate(v.name , 20)).replace(/#currencyCode#/g, v.currencyCode);
                        html = html.replace(/#accountType#/g, (v.accountType == 1) ? 'مدیریت شده' : 'اختصاصی');
                        $('#accountsgoogle').append(html)
                    });
                },
                error: function (r, s) { }
            });
        }




        function calculateGoogleAccountIranAmount_g(id, amount) {
            var agi = $('.accountGoogle_item[data-id="' + id + '"]');
            var agi_pc = agi.closest('.accountGoogle_item').find('.accountGoogle_serviceCost')
            var agi_cia = agi.closest('.accountGoogle_item').find('.accountGoogle_currencyIranAmount')
            if (!amount || amount < 10) {
                agi_pc.html('0'); agi_cia.html('0');
                agi.find('.accountGoogle_submit').prop('disabled', true);
                return;
            }
            loading_context(agi.find('.accountGoogle_serviceCost_parent'), 1)
            $.ajax({ beforeSend: function (xhr) { bearer(xhr) },
                url: _bUrl + "api/account/v1/client/accountgooglecalculatepaymentcost_g",
                data: { amount: amount, accountGoogleId: id },
                type: 'get',
                success: function (res) {
                    loading_context(agi.find('.accountGoogle_serviceCost_parent'), 0)
                    agi_pc.html(numberWithCommas(getInt(res.serviceCost)));
                    agi_cia.html(numberWithCommas(getInt(res.iranAmount)));
                    agi.find('.accountGoogle_submit').prop("disabled", res.serviceCost ? false : true);
                },
                error: function (request, status) {
                    ajax_error2(request, status);
                }
            });
        }

        $(document).on('keyup touchend', '.accountGoogle_amount', function (e) {
            var _this = $(this);
            var amount = getInt(_this.val().replace(/\D/g, ''));
            _this.val(numberWithCommas(amount));
            calculateGoogleAccountIranAmount_g(_this.closest('.accountGoogle_item').attr('data-id'), amount)
        });

        $(document).on('click', '.accountGoogle_submit', function (e) {
            var _this = $(this);
            loading_button(_this, 1, 1);
            var id = $(this).closest('.accountGoogle_item').attr('data-id');
            var currencyCode = $(this).closest('.accountGoogle_item').attr('data-currencycode');
            var amount = getInt($(this).closest('.accountGoogle_item').find('.accountGoogle_amount').val())

            $.ajax({ beforeSend: function (xhr) { bearer(xhr) },
                url: _bUrl + 'api/invoice/v1/client/invoiceaccountgoogle_i',
                data: JSON.stringify({
                    currencyCode: currencyCode
                    , refId: id
                    , amount: amount
                    , description: ''
                }),
                type: 'post',
                contentType: 'application/json; charset=utf-8',
                success: function (res) {
                    toast(res.r_status, res.r_desc);
                    setCookie('href', location.href, 10);
                    setCookie('invoiceNo', res.r_invoiceNo, 10);
                    setTimeout(function () {
                        loading_button(_this, 0, 0);
                        location.href = _fUrl + res.r_invoiceUrl;
                    }, 300);
                },
                error: function (request, status) {
                    loading_button(_this, 0, 0);
                    ajax_error2(request, status);
                }
            });
        });



        function distinctArray(r, n, t) {
            var u = [],
                h = [];
            for (i = 0; i < r.length; i++) u[r[i][n]] || (u[r[i][n]] = !0, t ? h.push(r[i]) : h.push(r[i][n]));
            return h
        }


    </script>



<svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1002"></defs><polyline id="SvgjsPolyline1003" points="0,0"></polyline><path id="SvgjsPath1004" d="M-1 2826.6666666666665L-1 2826.6666666666665C-1 2826.6666666666665 52.57142857142857 2826.6666666666665 52.57142857142857 2826.6666666666665C52.57142857142857 2826.6666666666665 105.14285714285714 2826.6666666666665 105.14285714285714 2826.6666666666665C105.14285714285714 2826.6666666666665 157.7142857142857 2826.6666666666665 157.7142857142857 2826.6666666666665C157.7142857142857 2826.6666666666665 210.28571428571428 2826.6666666666665 210.28571428571428 2826.6666666666665C210.28571428571428 2826.6666666666665 262.85714285714283 2826.6666666666665 262.85714285714283 2826.6666666666665C262.85714285714283 2826.6666666666665 315.4285714285714 2826.6666666666665 315.4285714285714 2826.6666666666665C315.4285714285714 2826.6666666666665 368 2826.6666666666665 368 2826.6666666666665C368 2826.6666666666665 368 2826.6666666666665 368 2826.6666666666665 "></path></svg><jdp-container style="z-index: 1000;"></jdp-container><jdp-overlay style="z-index: 999;"></jdp-overlay></body>
</body>
</html>