<?php
// ... بخش PHP برای دریافت نرخ ارز بدون تغییر ...
$ch = curl_init("https://api.ratebox.ir/apijson.php?token=0753667a9c8e046e6976f407bfefbbbd");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$jsonData = curl_exec($ch);
$data = json_decode($jsonData, true);

// آرایه برای نگهداری نرخ‌های محاسبه شده (نرخ حواله که شامل درصد سود است)
$remittance_rates = []; 
$base_rates = [];

$currencies = ["usd", "aed", "try", "thb"];

foreach ($data as $key => $value) {
    if (is_array($value) && isset($value['slug']) && in_array($value['slug'], $currencies)) {
        $price1 = str_replace(',', '', $value['p']);
        $price1 = (float)$price1;
        
        $real_price_toman = $price1 / 10; 

        // منطق محاسباتی افزایش درصد (نرخ حواله) و تقسیم بر 10 (تبدیل به تومان)
        if ($value['slug'] == 'usd') {
            $calculated_rate = (($price1 * 1.05) / 10); 
            $remittance_rates['USD'] = $calculated_rate; 
            $base_rates['USD'] = $real_price_toman; 
        } elseif ($value['slug'] == 'aed') {
            $calculated_rate = (($price1 * 1.07) / 10); 
            $remittance_rates['AED'] = $calculated_rate;
            $base_rates['AED'] = $real_price_toman;
        } elseif ($value['slug'] == 'try') {
            $calculated_rate = (($price1 * 1.07) / 10); 
            $remittance_rates['TRY'] = $calculated_rate;
            $base_rates['TRY'] = $real_price_toman;
        } elseif ($value['slug'] == 'thb') {
            $calculated_rate = (($price1 * 1.12) / 10); 
            $remittance_rates['BHT'] = $calculated_rate;
            $base_rates['BHT'] = $real_price_toman;
        }
        $remittance_rates['updated'] = $value['t']; 
    }
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شارژ اکانت گوگل ادز</title>
    <style>
    /* تنظیمات پایه */
    body {
        font-family: Tahoma, Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f0f0f0;
        text-align: right;
    }

    .main-container {
        margin: 20px auto;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border: 2px solid #258474;
    }

    .charge-header {
        background-color: #258474;
        color: white;
        padding: 15px;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        border-radius: 8px 8px 0 0;
    }

    .charge-content {
        display: flex;
        padding: 30px;
        gap: 25px;
        justify-content: space-between;
    }

    .charge-form-wrap {
        flex-basis: 50%;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .charge-graphic-panel {
        flex-basis: 45%;
        padding: 15px;
        background-color: #f9f9f9;
        border-radius: 8px;
        text-align: center;
    }

    /* --- استایل نمودار پیش‌فرض (نمایش در هنگام بارگذاری) --- */
    .chart-visual {
        width: 100%;
        height: 250px;
        margin: 10px 0 20px 0;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><linearGradient id="g" x1="0" y1="0" x2="0" y2="100%2"><stop offset="0%" style="stop-color:rgb(52, 152, 219);stop-opacity:1" /><stop offset="100%" style="stop-color:rgb(41, 128, 185);stop-opacity:1" /></linearGradient></defs><rect x="15" y="60" width="10" height="25" fill="%233498db"/><rect x="30" y="50" width="10" height="35" fill="%233498db"/><rect x="45" y="40" width="10" height="45" fill="%233498db"/><rect x="60" y="30" width="10" height="55" fill="%233498db"/><rect x="75" y="20" width="10" height="65" fill="%233498db"/><path d="M 15 20 C 50 10 70 20 85 10" stroke="%23e74c3c" stroke-width="4" fill="none"/><path d="M 85 10 L 95 0" stroke="%23e74c3c" stroke-width="4" fill="none"/><polygon points="90,5 95,0 100,5" fill="%23e74c3c"/><circle cx="50" cy="30" r="10" fill="%23f1c40f"/><text x="50" y="35" font-family="Arial, sans-serif" font-size="12" fill="white" text-anchor="middle" font-weight="bold">$</text></svg>');
        background-repeat: no-repeat;
        background-size: contain;
        background-position: center;
    }

    /* --- استایل پرچم جدید --- */
    .currency-flag-display {
        height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 15px;
        margin: 10px 0 20px 0;
        transition: opacity 0.3s;
    }

    .flag-container {
        width: 150px;
        /* اندازه متوسط پرچم */
        height: 150px;
        overflow: hidden;
        border-radius: 8px;

    }

    .flag-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* مطمئن شویم پرچم کادر را پر می‌کند */
    }

    .currency-full-name {
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }

    /* --- پایان استایل پرچم --- */

    .chart-info p {
        font-size: 14px;
        margin: 5px 0;
        color: #555;
        text-align: right;
        padding-right: 15px;
    }

    .account-type-toggle {
        display: flex;
        gap: 10px;
        margin-bottom: 5px;
    }

    .account-type-toggle button {
        flex: 1;
        padding: 10px 15px;
        border: 1px solid #ccc;
        background-color: #f0f0f0;
        color: #333;
        cursor: pointer;
        font-size: 14px;
        border-radius: 5px;
    }

    .account-type-toggle .active-type {
        background-color: #258474;
        color: white;
        border-color: #258474;
    }

    /* --- استایل جدید دکمه‌های ارز (گردتر و حرفه‌ای) --- */
    .currency-selection {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        margin-bottom: 10px;
    }

    .currency-selection button {
        padding: 8px 12px;
        border: 1px solid #ff7f00;
        background-color: #fff;
        color: #ff7f00;
        cursor: pointer;
        font-size: 14px;
        border-radius: 20px;
        /* گردتر شدن */
        flex-grow: 1;
        transition: all 0.2s ease;
        box-shadow: 0 2px 4px rgba(255, 127, 0, 0.2);
    }

    .currency-selection button:hover {
        box-shadow: 0 4px 6px rgba(255, 127, 0, 0.3);
    }

    .currency-selection .active-currency {
        background-color: #ff7f00;
        color: white;
        box-shadow: 0 4px 8px rgba(255, 127, 0, 0.4);
    }

    /* --- پایان استایل جدید دکمه‌های ارز --- */


    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .full-width {
        grid-column: 1 / 3;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
        color: #555;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        box-sizing: border-box;
    }

    #calculate {
        background-color: #258474;
        color: white;
        border: none;
        padding: 12px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        text-align: center;
        text-decoration: none;
        display: block;
        margin-top: 10px;
        transition: background-color 0.3s;
    }

    #calculate:hover {
        background-color: #1e6d5e;
    }

    .error-message {
        color: red;
        font-size: 12px;
        margin-top: 5px;
        display: block;
        min-height: 15px;
    }

    .alert-message {
        color: #258474;
        font-weight: bold;
        font-size: 15px;
        margin-top: 10px;
    }

    /* Media Query برای موبایل */
    @media (max-width: 600px) {
        .charge-content {
            flex-direction: column;
            padding: 20px;
        }

        .charge-form-wrap,
        .charge-graphic-panel {
            flex-basis: 100%;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .full-width {
            grid-column: 1 / 2;
        }
    }
    </style>
</head>

<body>

    <div class="main-container">
        <div class="charge-header">
            شارژ اکانت به میزان دلخواه
        </div>

        <div class="charge-content">
            <div class="charge-form-wrap">

                <div class="account-type-toggle">
                    <button id="personal" class="active-type">اختصاصی</button>
                    <button id="managed">مدیریت شده</button>
                </div>

                <div class="currency-selection">
                    <button data-currency="USD" id="btn_usd">دلار آمریکا</button>
                    <button data-currency="AED" id="btn_aed">درهم امارات</button>
                    <button data-currency="TRY" id="btn_try">لیر ترکیه</button>
                    <button data-currency="BHT" id="btn_bht">بات تایلند</button>
                </div>

                <form action="" class="google_ads_income" novalidate="" method="POST"
                    onsubmit="event.preventDefault(); return false;">

                    <div class="form-grid">

                        <div class="form-group full-width">
                            <label for="validationTooltip01">میزان شارژ (مبلغ مورد نظر خود را وارد کنید)</label>
                            <input type="number" name="charge_rate" id="validationTooltip01"
                                placeholder="مقدار شارژ را وارد کنید" required="">
                            <span id="errorMessage" class="error-message"></span>
                        </div>

                        <input type="hidden" name="currency_slug" id="selected_currency_slug" value="USD">

                        <div class="form-group full-width">
                            <label for="paymentAmount">مبلغ قابل پرداخت (تومان):</label>
                            <input type="text" id="paymentAmount" value="" readonly style="background-color: #eee;">
                        </div>

                    </div>

                    <div class="form-group full-width">
                        <p id="alertMessage" class="alert-message"></p>
                    </div>

                    <div class="form-group full-width" style="margin-top: 5px;">
                        <a href="https://my-adsbarg.com/" id="calculate">شارژ اکانت</a>
                    </div>
                </form>
            </div>

            <div class="charge-graphic-panel">
                <div class="chart-visual" id="default_chart"></div>

                <div class="currency-flag-display" id="currency_flag_display" style="display: none;">
                    <div class="flag-container">
                        <img id="currency_flag_img" src="" alt="Flag of selected currency">
                    </div>
                    <div class="currency-full-name" id="currency_full_name">
                    </div>
                </div>

                <div class="chart-info">
                    <p>نرخ حواله: <span id="current_rate_display">--</span> تومان</p>
                    <p>کارمزد شارژ: <span id="charge_fee_display">--</span></p>
                    <p>حداقل شارژ: <span id="min_charge_display">--</span></p>
                    <p style="color: #e74c3c; font-size: 13px;">اطلاعات با توجه به نوع اکانت و میزان شارژ به‌روز می‌شود.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
    // نگاشت URL پرچم‌ها و نام کامل ارز
    const CURRENCY_INFO = {
        'USD': {
            name: 'دلار آمریکا',
            flag: 'https://adsbarg.com/wp-content/uploads/2024/12/Decorative-background-with-united-states-map-and-flag-Top456.png'
        },
        'AED': {
            name: 'درهم امارات',
            flag: 'https://adsbarg.com/wp-content/uploads/2024/12/pngtree-united-arab-emirates-flag-watercolor-paint-brush-transparent-background-png-image_6119059.png'
        },
        'TRY': {
            name: 'لیر ترکیه',
            flag: 'https://adsbarg.com/wp-content/uploads/2024/12/signs-symbols-029-infinitychap-45.png'
        },
        'BHT': {
            name: 'بات تایلند',
            flag: 'https://adsbarg.com/wp-content/uploads/2024/12/brush-stroke-flag-thailand-Top4567.png'
        }
    };


    // دریافت مقادیر نرخ ارز از PHP
    const remittanceRates = {
        'USD': <?php echo json_encode(isset($remittance_rates['USD']) ? $remittance_rates['USD'] : 0); ?>,
        'AED': <?php echo json_encode(isset($remittance_rates['AED']) ? $remittance_rates['AED'] : 0); ?>,
        'TRY': <?php echo json_encode(isset($remittance_rates['TRY']) ? $remittance_rates['TRY'] : 0); ?>,
        'BHT': <?php echo json_encode(isset($remittance_rates['BHT']) ? $remittance_rates['BHT'] : 0); ?>
    };

    // متغیرهای وضعیت
    let isManaged = false;
    let selectedCurrency = 'USD';

    // متغیرهای عناصر DOM
    const personalBtn = document.getElementById('personal');
    const managedBtn = document.getElementById('managed');
    const currencyButtons = document.querySelectorAll('.currency-selection button');
    const chargeInput = document.getElementById('validationTooltip01');
    const errorMessageSpan = document.getElementById('errorMessage');
    const alertMessageP = document.getElementById('alertMessage');
    const paymentAmountInput = document.getElementById('paymentAmount');
    const selectedCurrencySlugInput = document.getElementById('selected_currency_slug');
    const currentRateDisplay = document.getElementById('current_rate_display');
    const chargeFeeDisplay = document.getElementById('charge_fee_display');
    const minChargeDisplay = document.getElementById('min_charge_display');

    // عناصر جدید برای پرچم
    const defaultChart = document.getElementById('default_chart');
    const currencyFlagDisplay = document.getElementById('currency_flag_display'); // Container جدید
    const currencyFlagImg = document.getElementById('currency_flag_img');
    const currencyFullName = document.getElementById('currency_full_name');

    // فرمت دهی به عدد با کاما
    function formatNumber(num) {
        if (num === 0 || num === null || isNaN(num)) return '0';
        return num.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // تابع به‌روزرسانی اطلاعات پانل سمت چپ
    function updateInfoPanel(currency, minCharge, remittanceRate, isManaged) {
        // نمایش نرخ حواله 
        currentRateDisplay.textContent = formatNumber(remittanceRate);
        minChargeDisplay.textContent = minCharge;

        const feeData = calculateFee(currency, parseFloat(chargeInput.value) || 0, isManaged);
        chargeFeeDisplay.textContent = feeData.message;

        // به‌روزرسانی پرچم و نام
        const info = CURRENCY_INFO[currency];
        if (info) {
            currencyFlagImg.src = info.flag;
            currencyFullName.textContent = info.name;
        }
    }

    // محاسبه کارمزد (بدون تغییر)
    function calculateFee(currency, chargeRate, isManaged) {
        let chargeFee = 0;
        let minCharge = 0;

        switch (currency) {
            case 'BHT':
                minCharge = 500;
                if (chargeRate < minCharge) return {
                    fee: 0,
                    message: `حداقل ${minCharge} بات`,
                    min: minCharge
                };
                if (chargeRate >= 500 && chargeRate <= 1999) chargeFee = 0.1;
                else if (chargeRate >= 2000 && chargeRate <= 3499) chargeFee = 0.1;
                else if (chargeRate >= 3500 && chargeRate <= 4999) chargeFee = 0.09;
                else if (chargeRate >= 5000 && chargeRate <= 7999) chargeFee = 0.085;
                else if (chargeRate >= 8000 && chargeRate <= 9999) chargeFee = 0.08;
                else if (chargeRate >= 10000 && chargeRate <= 19999) chargeFee = 0.075;
                else if (chargeRate >= 20000) chargeFee = 0.065;
                break;

            case 'USD':
                minCharge = 50;
                if (chargeRate < minCharge) return {
                    fee: 0,
                    message: `حداقل ${minCharge} دلار`,
                    min: minCharge
                };
                if (chargeRate >= 50 && chargeRate <= 99) chargeFee = 0.1;
                else if (chargeRate >= 100 && chargeRate <= 199) chargeFee = 0.09;
                else if (chargeRate >= 200 && chargeRate <= 299) chargeFee = 0.08;
                else if (chargeRate >= 300 && chargeRate <= 499) chargeFee = 0.075;
                else if (chargeRate >= 500 && chargeRate <= 749) chargeFee = 0.07;
                else if (chargeRate >= 750 && chargeRate <= 999) chargeFee = 0.065;
                else if (chargeRate >= 1000) chargeFee = 0.06;
                break;

            case 'TRY':
                minCharge = 1000;
                if (chargeRate < minCharge) return {
                    fee: 0,
                    message: `حداقل ${minCharge} لیر`,
                    min: minCharge
                };
                if (chargeRate >= 1000 && chargeRate <= 1999) chargeFee = 0.09;
                else if (chargeRate >= 2000 && chargeRate <= 2999) chargeFee = 0.085;
                else if (chargeRate >= 3000 && chargeRate <= 4999) chargeFee = 0.08;
                else if (chargeRate >= 5000 && chargeRate <= 9999) chargeFee = 0.075;
                else if (chargeRate >= 10000) chargeFee = 0.065;
                break;

            case 'AED':
                minCharge = 300;
                if (chargeRate < minCharge) return {
                    fee: 0,
                    message: `حداقل ${minCharge} درهم`,
                    min: minCharge
                };
                if (chargeRate >= 300 && chargeRate <= 499) chargeFee = 0.1;
                else if (chargeRate >= 500 && chargeRate <= 999) chargeFee = 0.09;
                else if (chargeRate >= 1000 && chargeRate <= 1999) chargeFee = 0.08;
                else if (chargeRate >= 2000 && chargeRate <= 3499) chargeFee = 0.07;
                else if (chargeRate >= 3500) chargeFee = 0.06;
                break;

            default:
                return {
                    fee: 0, message: "ارز نامعتبر", min: 0
                };
        }

        let totalFee = chargeFee;
        let feeMessage = `کارمزد شارژ ${(chargeFee * 100).toFixed(1)}%`;

        if (isManaged) {
            totalFee = chargeFee * 2;
            feeMessage = `شارژ ${(chargeFee * 100).toFixed(1)}% + مدیریت ${(chargeFee * 100).toFixed(1)}%`;
        }

        return {
            fee: totalFee,
            message: feeMessage,
            min: minCharge
        };
    }

    // تابع محاسبه اصلی
    function calculateCharge() {
        const chargeRate = parseFloat(chargeInput.value);
        const remittanceRate = remittanceRates[selectedCurrency] || 0;

        errorMessageSpan.textContent = "";
        alertMessageP.textContent = "";
        paymentAmountInput.value = "";

        updateInfoPanel(selectedCurrency, calculateFee(selectedCurrency, chargeRate || 0, isManaged).min,
            remittanceRate, isManaged);

        if (isNaN(chargeRate) || chargeRate <= 0) {
            if (chargeInput.value !== '') {
                errorMessageSpan.textContent = "مقدار شارژ صحیح نیست!";
            }
            return;
        }

        if (remittanceRate === 0) {
            errorMessageSpan.textContent = "نرخ ارز در دسترس نیست.";
            return;
        }

        const feeData = calculateFee(selectedCurrency, chargeRate, isManaged);

        if (feeData.fee === 0 && feeData.min > 0) {
            errorMessageSpan.textContent = `مقدار شارژ باید حداقل ${feeData.min} ${selectedCurrency} باشد!`;
            return;
        }

        let tomans = remittanceRate * chargeRate;
        let result = tomans * (1 + feeData.fee);

        paymentAmountInput.value = formatNumber(result);
        errorMessageSpan.textContent = feeData.message;
        alertMessageP.textContent = `مبلغ کل قابل پرداخت: ${formatNumber(result)} تومان`;
    }

    // --- رویدادها ---

    // تغییر نوع اکانت (بدون تغییر)
    function handleAccountTypeChange(isManagedNew) {
        isManaged = isManagedNew;
        if (isManagedNew) {
            managedBtn.classList.add('active-type');
            personalBtn.classList.remove('active-type');
        } else {
            personalBtn.classList.add('active-type');
            managedBtn.classList.remove('active-type');
        }
        calculateCharge();
    }

    personalBtn.addEventListener('click', (e) => {
        e.preventDefault();
        handleAccountTypeChange(false);
    });
    managedBtn.addEventListener('click', (e) => {
        e.preventDefault();
        handleAccountTypeChange(true);
    });

    // انتخاب ارز - منطق نمایش پرچم
    currencyButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            selectedCurrency = e.target.getAttribute('data-currency');
            selectedCurrencySlugInput.value = selectedCurrency;

            // به‌روزرسانی کلاس فعال
            currencyButtons.forEach(btn => btn.classList.remove('active-currency'));
            e.target.classList.add('active-currency');

            // منطق نمایش/پنهان‌سازی (هنگام کلیک، پرچم را نشان داده و نمودار را پنهان کن)
            defaultChart.style.display = 'none';
            currencyFlagDisplay.style.display = 'flex';

            calculateCharge();
        });
    });

    // رویدادهای محاسبه (بدون تغییر)
    chargeInput.addEventListener('input', calculateCharge);

    // فراخوانی اولیه در زمان بارگذاری (برای نمایش نمودار پیش‌فرض و نرخ دلار)
    window.addEventListener('load', () => {
        // 1. نمایش نمودار پیش‌فرض و پنهان‌سازی پرچم
        defaultChart.style.display = 'block';
        currencyFlagDisplay.style.display = 'none';

        // 2. تنظیم دلار به عنوان پیش‌فرض برای محاسبات
        selectedCurrency = 'USD';
        document.getElementById('btn_usd').classList.add('active-currency');
        handleAccountTypeChange(false);
        calculateCharge(); // نمایش نرخ حواله در پنل اطلاعات
    });
    </script>

</body>

</html>