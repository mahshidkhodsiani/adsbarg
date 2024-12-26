<?php
$ch = curl_init("https://api.ratebox.ir/apijson.php?token=6396cded07a5df6ff6979e013db38535");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$jsonData = curl_exec($ch);
$data = json_decode($jsonData, true);

$row_currency = [];

// کلیدهای مربوط به ارزهای موردنظر
$currencies = ["usd", "aed", "try", "thb"];

foreach ($data as $key => $value) {
    // بررسی اینکه مقدار فعلی یک آرایه است و ارز درخواستی را بررسی می‌کنیم
    if (is_array($value) && isset($value['slug']) && in_array($value['slug'], $currencies)) {
        // بسته به نوع ارز، مقدار مربوطه رو ذخیره می‌کنیم

        $price = (float)$value['h'];

        if ($value['slug'] == 'usd') {
            $row_currency['dollar'] =  ($price + ($price * 0.05) )* 100; // افزایش 4 درصدی
        } elseif ($value['slug'] == 'aed') {
            $row_currency['derham'] =  ($price + ($price * 0.07) )* 100; // افزایش 7 درصدی
        } elseif ($value['slug'] == 'try') {
            $row_currency['lira'] =  ($price + ($price * 0.07)) * 100; // افزایش 7 درصدی
        } elseif ($value['slug'] == 'thb') {
            $row_currency['bat'] =  ($price + ($price * 0.11)) *100; // افزایش 11 درصدی
        }
    }
}
?>

<form action="" class="google_ads_income needs-validation" novalidate="" method="POST">
  
    <div style="margin-bottom: 10px;">
        <button id="personal" style="width: 150px;">اختصاصی</button>
        <button id="managed" style="width: 150px;">مدیریت شده</button> 
    </div>
   
    <div class="form-group">
        <label for="ramzarz">انتخاب ارز مورد نظر:</label>
        <select name="" id="ramzarz" class="custom-select">
            <option value="USD">دلار</option>
            <option value="AED">درهم</option>
            <option value="TRY">لیر</option>
            <option value="BHT">بات</option>
        </select>
    </div>
    <div class="form-group">
        <label for="validationTooltip01">میزان شارژ</label>
        <input type="number" name="charge_rate" id="validationTooltip01" placeholder="مبلغ شارژ را وارد کنید." required="">
        
        <span id="errorMessage" class="error-message"></span>
    </div>
    
    <div class="form-group">
        <p id="alertMessage" class="alert-message"></p>
    </div>
    <div class="form-group">
        <div class="row justify-content-between total-yib-views gads-submit-wrap mt-0">
            <div class="col-auto d-flex google-income-submit">
                <input type="hidden" data-nonce="d9835733bf" class="datanonce">
                <a href="https://adsbarg.com/dashboard" id="calculateBtn">محاسبه و شارژ دلخواه</a>
                <span class="wpcf7-spinner"></span>
            </div>
            <div class="col-auto">
                <div class="tvpy d-flex align-items-center"></div>
            </div>
        </div>
    </div>
</form>

<script>
    // دریافت مقادیر از PHP
    var dollar = <?php echo json_encode($row_currency['dollar']); ?>;
    var derham = <?php echo json_encode($row_currency['derham']); ?>;
    var lira = <?php echo json_encode($row_currency['lira']); ?>;
    var bat = <?php echo json_encode($row_currency['bat']); ?>;

 
    // متغیر برای ذخیره وضعیت مدیریت
    let isManaged = false;

    // افزودن رویداد کلیک به دکمه‌ها
    document.getElementById('personal').addEventListener('click', function(event) {
        event.preventDefault();
        isManaged = false; // اختصاصی
        resetForm(); // پاک کردن فرم
    });

    document.getElementById('managed').addEventListener('click', function(event) {
        event.preventDefault();
        isManaged = true; // مدیریت شده
        resetForm(); // پاک کردن فرم
    });

    function resetForm() {
        document.getElementById('ramzarz').value = '';  // پاک کردن انتخاب ارز
        document.getElementById('validationTooltip01').value = ''; // پاک کردن مقدار شارژ
        document.getElementById('alertMessage').textContent = '';  // پاک کردن پیام هشدار
        document.getElementById('errorMessage').textContent = '';  // پاک کردن پیام خطا
    }

    
    // گرفتن مقدار ارز انتخاب شده و مقدار شارژ
    document.getElementById('validationTooltip01').addEventListener('input', function(event) {
        var selectedCurrency = document.getElementById('ramzarz').value;
        var chargeRate = parseFloat(document.getElementById('validationTooltip01').value);

        if (isNaN(chargeRate) || chargeRate <= 0) {
            document.getElementById('errorMessage').textContent = "مقدار شارژ صحیح نیست!";
            return;
        } else {
            document.getElementById('errorMessage').textContent = "";
        }

        var result;
        var feeMessage = "";

        
        
        switch (selectedCurrency) {
            case 'USD':
                if (chargeRate < 50) {
                    document.getElementById('errorMessage').textContent = "مقدار شارژ باید حداقل 50 دلار باشد!";
                    return;
                }
                result = dollar * chargeRate;

                if (chargeRate >= 50 && chargeRate <= 99) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 10% + کارمزد مدیریت 10%" 
                        : "10% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.2 : 1.1;
                } else if (chargeRate >= 100 && chargeRate <= 199) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 9% + کارمزد مدیریت 9%" 
                        : "9% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.18 : 1.09;
                } else if (chargeRate >= 200 && chargeRate <= 299) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 8% + کارمزد مدیریت 8%" 
                        : "8% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.16 : 1.08;
                } else if (chargeRate >= 300 && chargeRate <= 499) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 7.5% + کارمزد مدیریت 7.5%" 
                        : "7.5% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.15 : 1.075;
                } else if (chargeRate >= 500 && chargeRate <= 749) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 7% + کارمزد مدیریت 7%" 
                        : "7% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.14 : 1.07;
                } else if (chargeRate >= 750 && chargeRate <= 999) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 6.5% + کارمزد مدیریت 6.5%" 
                        : "6.5% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.13 : 1.065;
                } else if (chargeRate >= 1000) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 6% + کارمزد مدیریت 6%" 
                        : "6% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.12 : 1.06;
                }
                break;

            case 'AED':
                if (chargeRate < 300) {
                    document.getElementById('errorMessage').textContent = "مقدار شارژ باید حداقل 300 درهم باشد!";
                    return;
                }
                result = derham * chargeRate;

                if (chargeRate >= 300 && chargeRate <= 499) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 10% + کارمزد مدیریت 10%" 
                        : "10% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.2 : 1.1;
                } else if (chargeRate >= 500 && chargeRate <= 999) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 9% + کارمزد مدیریت 9%" 
                        : "9% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.18 : 1.09;
                } else if (chargeRate >= 1000 && chargeRate <= 1999) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 8% + کارمزد مدیریت 8%" 
                        : "8% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.16 : 1.08;
                } else if (chargeRate >= 2000 && chargeRate <= 3499) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 7% + کارمزد مدیریت 7%" 
                        : "7% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.14 : 1.07;
                } else if (chargeRate >= 3500) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 6% + کارمزد مدیریت 6%" 
                        : "6% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.12 : 1.06;
                }
                break;


            case 'TRY':
                if (chargeRate < 500) {
                    document.getElementById('errorMessage').textContent = "مقدار شارژ باید حداقل 500 لیر باشد!";
                    return;
                }
                result = lira * chargeRate;

                if (chargeRate >= 500 && chargeRate <= 999) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 10% + کارمزد مدیریت 10%" 
                        : "10% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.2 : 1.1;
                } else if (chargeRate >= 1000 && chargeRate <= 1999) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 9% + کارمزد مدیریت 9%" 
                        : "9% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.18 : 1.09;
                } else if (chargeRate >= 2000 && chargeRate <= 2999) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 8.5% + کارمزد مدیریت 8.5%" 
                        : "8.5% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.17 : 1.085;
                } else if (chargeRate >= 3000 && chargeRate <= 4999) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 8% + کارمزد مدیریت 8%" 
                        : "8% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.16 : 1.08;
                } else if (chargeRate >= 5000 && chargeRate <= 9999) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 7.5% + کارمزد مدیریت 7.5%" 
                        : "7.5% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.15 : 1.075;
                } else if (chargeRate >= 10000) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 6.5% + کارمزد مدیریت 6.5%" 
                        : "6.5% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.13 : 1.065;
                }
                break;


            case 'BHT':
                if (chargeRate < 2000) {
                    document.getElementById('errorMessage').textContent = "مقدار شارژ باید حداقل 2000 بات باشد!";
                    return;
                }
                result = bat * chargeRate;

                if (chargeRate >= 2000 && chargeRate <= 3499) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 10% + کارمزد مدیریت 10%" 
                        : "10% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.2 : 1.1;
                } else if (chargeRate >= 3500 && chargeRate <= 4999) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 9% + کارمزد مدیریت 9%" 
                        : "9% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.18 : 1.09;
                } else if (chargeRate >= 5000 && chargeRate <= 7999) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 8.5% + کارمزد مدیریت 8.5%" 
                        : "8.5% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.17 : 1.085;
                } else if (chargeRate >= 8000 && chargeRate <= 9999) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 8% + کارمزد مدیریت 8%" 
                        : "8% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.16 : 1.08;
                } else if (chargeRate >= 10000 && chargeRate <= 19999) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 7.5% + کارمزد مدیریت 7.5%" 
                        : "7.5% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.15 : 1.075;
                } else if (chargeRate >= 20000) {
                    feeMessage = isManaged 
                        ? "کارمزد شارژ 6.5% + کارمزد مدیریت 6.5%" 
                        : "6.5% کارمزد شارژ اختصاصی";
                    result *= isManaged ? 1.13 : 1.065;
                }
                break;


            default:
            result = 0;
        }


        // نمایش نتیجه
        document.getElementById('alertMessage').textContent = "مبلغ محاسبه‌شده: " + result.toLocaleString() + " تومان";
        document.getElementById('errorMessage').textContent = feeMessage;
    });

</script>




<style>
    form {
        width: 100%;
        max-width: 450px;
        margin: 0 auto;
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-size: 16px;
        color: #333;
    }

    input, select, button {
        width: 100%;
        padding: 15px;
        font-size: 16px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-sizing: border-box;
    }

    input:focus, select:focus {
        border-color: #007bff;
        outline: none;
    }

    button {
        background-color: #007bff;
        color: white;
        font-size: 16px;
        border: none;
        text-align: center;
        cursor: pointer;
        padding: 15px;
        border-radius: 8px;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    .invalid-tooltip {
        display: block;
        color: red;
        font-size: 12px;
        margin-top: 5px;
    }

    .error-message, .alert-message {
        color: red;
        font-size: 16px;
        font-weight: bold;
    }

    .google_ads_income {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .google_ads_income .btn-group {
        display: flex;
        gap: 20px;
        justify-content: space-between;
    }

    .google_ads_income .btn-group button {
        flex: 1;
        padding: 12px;
        background-color: #f1f1f1;
        color: #333;
        font-size: 16px;
        border-radius: 8px;
        border: 1px solid #ccc;
        transition: background-color 0.3s;
    }

    .google_ads_income .btn-group button:hover {
        background-color: #007bff;
        color: white;
    }

    .gads-currency-nerkh {
        margin-top: 15px;
        padding: 10px;
        background-color: #f1f1f1;
        text-align: center;
        border-radius: 8px;
    }

    #calculateBtn {
        background-color: #28a745;
        color: white;
        font-size: 18px;
        border: none;
        padding: 15px 30px;
        border-radius: 8px;
        cursor: pointer;
        text-align: center;
        display: inline-block;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    #calculateBtn:hover {
        background-color: #218838;
    }
</style>