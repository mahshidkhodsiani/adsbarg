<?php
$ch = curl_init("https://api.ratebox.ir/apijson.php?token=da3d9b7de75ee423ace2688d137443c2");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$jsonData = curl_exec($ch);
$data = json_decode($jsonData, true);

$row_currency = [];

$currencies = ["usd", "aed", "try", "thb"];

foreach ($data as $key => $value) {
  if (is_array($value) && isset($value['slug']) && in_array($value['slug'], $currencies)) {
      // حذف کاماها و تبدیل به عدد
      $price1 = str_replace(',', '', $value['p']); // قیمت اولیه از داده‌های ورودی
      $price1 = (float)$price1; // تبدیل به عدد اعشاری

    

      if ($value['slug'] == 'usd') {
          $row_currency['dollar'] = (($price1 * 5 / 100) + $price1)/10; // افزایش 5 درصد برای دلار
          $row_currency['updated'] = $value['t'];
      } elseif ($value['slug'] == 'aed') {
          $row_currency['derham'] = (($price1 * 7 / 100) + $price1)/10; // افزایش 7 درصد برای درهم
          $row_currency['updated'] = $value['t'];
      } elseif ($value['slug'] == 'try') {
          $row_currency['lira'] = (($price1 * 7 / 100) + $price1)/10; // افزایش 7 درصد برای درهم
          $row_currency['updated'] = $value['t'];
      } elseif ($value['slug'] == 'thb') {
          $row_currency['bat'] = (($price1 * 12 / 100) + $price1)/10; // افزایش 12 درصد برای بات
          $row_currency['updated'] = $value['t'];
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
        document.getElementById("managed").style.color = '#287467';
        document.getElementById("personal").style.color = '';
    });

    document.getElementById('managed').addEventListener('click', function(event) {
        event.preventDefault();
        isManaged = true; // مدیریت شده
        resetForm(); // پاک کردن فرم
        document.getElementById("personal").style.color = '#287467';
        document.getElementById("managed").style.color = '';
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
        var chargeFee = 0; // مقدار کارمزد شارژ
        var manageFee = 0; // مقدار کارمزد مدیریت


        
        switch (selectedCurrency) {
    case 'BHT': // بات تایلند
        if (chargeRate < 500) {
            document.getElementById('errorMessage').textContent = "مقدار شارژ باید حداقل 500 بات باشد!";
            return;
        }
        result = bat * chargeRate; // محاسبه مبلغ شارژ

        if (chargeRate >= 2000 && chargeRate <= 3499) {
            chargeFee = 0.1; // 10% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 10% + کارمزد مدیریت 10%" 
                : "کارمزد شارژ 10%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 3500 && chargeRate <= 4999) {
            chargeFee = 0.09; // 9% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 9% + کارمزد مدیریت 9%" 
                : "کارمزد شارژ 9%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 5000 && chargeRate <= 7999) {
            chargeFee = 0.085; // 8.5% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 8.5% + کارمزد مدیریت 8.5%" 
                : "کارمزد شارژ 8.5%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 8000 && chargeRate <= 9999) {
            chargeFee = 0.08; // 8% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 8% + کارمزد مدیریت 8%" 
                : "کارمزد شارژ 8%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 10000 && chargeRate <= 19999) {
            chargeFee = 0.075; // 7.5% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 7.5% + کارمزد مدیریت 7.5%" 
                : "کارمزد شارژ 7.5%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 20000) {
            chargeFee = 0.065; // 6.5% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 6.5% + کارمزد مدیریت 6.5%" 
                : "کارمزد شارژ 6.5%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        }
        break;

    case 'USD': // دلار امریکا
        if (chargeRate < 50) {
            document.getElementById('errorMessage').textContent = "مقدار شارژ باید حداقل 50 دلار باشد!";
            return;
        }
        result = dollar * chargeRate; // محاسبه مبلغ شارژ

        if (chargeRate >= 50 && chargeRate <= 99) {
            chargeFee = 0.1; // 10% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 10% + کارمزد مدیریت 10%" 
                : "کارمزد شارژ 10%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 100 && chargeRate <= 199) {
            chargeFee = 0.09; // 9% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 9% + کارمزد مدیریت 9%" 
                : "کارمزد شارژ 9%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 200 && chargeRate <= 299) {
            chargeFee = 0.08; // 8% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 8% + کارمزد مدیریت 8%" 
                : "کارمزد شارژ 8%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 300 && chargeRate <= 499) {
            chargeFee = 0.075; // 7.5% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 7.5% + کارمزد مدیریت 7.5%" 
                : "کارمزد شارژ 7.5%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 500 && chargeRate <= 749) {
            chargeFee = 0.07; // 7% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 7% + کارمزد مدیریت 7%" 
                : "کارمزد شارژ 7%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 750 && chargeRate <= 999) {
            chargeFee = 0.065; // 6.5% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 6.5% + کارمزد مدیریت 6.5%" 
                : "کارمزد شارژ 6.5%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 1000) {
            chargeFee = 0.06; // 6% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 6% + کارمزد مدیریت 6%" 
                : "کارمزد شارژ 6%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        }
        break;

    case 'TRY': // لیر ترکیه
        if (chargeRate < 500) {
            document.getElementById('errorMessage').textContent = "مقدار شارژ باید حداقل 500 لیر باشد!";
            return;
        }
        result = lira * chargeRate; // محاسبه مبلغ شارژ

        if (chargeRate >= 500 && chargeRate <= 999) {
            chargeFee = 0.1; // 10% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 10% + کارمزد مدیریت 10%" 
                : "کارمزد شارژ 10%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 1000 && chargeRate <= 1999) {
            chargeFee = 0.09; // 9% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 9% + کارمزد مدیریت 9%" 
                : "کارمزد شارژ 9%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 2000 && chargeRate <= 2999) {
            chargeFee = 0.085; // 8.5% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 8.5% + کارمزد مدیریت 8.5%" 
                : "کارمزد شارژ 8.5%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 3000 && chargeRate <= 4999) {
            chargeFee = 0.08; // 8% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 8% + کارمزد مدیریت 8%" 
                : "کارمزد شارژ 8%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 5000 && chargeRate <= 9999) {
            chargeFee = 0.075; // 7.5% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 7.5% + کارمزد مدیریت 7.5%" 
                : "کارمزد شارژ 7.5%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 10000) {
            chargeFee = 0.065; // 6.5% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 6.5% + کارمزد مدیریت 6.5%" 
                : "کارمزد شارژ 6.5%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        }
        break;

    case 'AED': // درهم امارات
        if (chargeRate < 300) {
            document.getElementById('errorMessage').textContent = "مقدار شارژ باید حداقل 300 درهم باشد!";
            return;
        }
        result = derham * chargeRate; // محاسبه مبلغ شارژ

        if (chargeRate >= 300 && chargeRate <= 499) {
            chargeFee = 0.1; // 10% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 10% + کارمزد مدیریت 10%" 
                : "کارمزد شارژ 10%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 500 && chargeRate <= 999) {
            chargeFee = 0.09; // 9% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 9% + کارمزد مدیریت 9%" 
                : "کارمزد شارژ 9%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 1000 && chargeRate <= 1999) {
            chargeFee = 0.08; // 8% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 8% + کارمزد مدیریت 8%" 
                : "کارمزد شارژ 8%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 2000 && chargeRate <= 3499) {
            chargeFee = 0.07; // 7% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 7% + کارمزد مدیریت 7%" 
                : "کارمزد شارژ 7%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        } else if (chargeRate >= 3500) {
            chargeFee = 0.06; // 6% کارمزد شارژ
            feeMessage = isManaged 
                ? "کارمزد شارژ 6% + کارمزد مدیریت 6%" 
                : "کارمزد شارژ 6%";
            if (isManaged) {
                chargeFee *= 2; // کارمزد دو برابر می‌شود
            }
        }
        break;

    default:
        result = 0;
        document.getElementById('errorMessage').textContent = "ارز انتخابی معتبر نیست!";
}




        // اعمال کارمزد شارژ
        result += result * chargeFee;

        // اگر اکانت مدیریت شده باشد، کارمزد مدیریت به کارمزد شارژ اعمال می‌شود
        if (isManaged) {
            result += (result * chargeFee) * manageFee; // فقط کارمزد شارژ باید دوبرابر بشه
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
        border-color: #258474;
        outline: none;
    }

    button {
        background-color: #258474;
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
        background-color: #012f27;
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
        background-color: #258474;
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