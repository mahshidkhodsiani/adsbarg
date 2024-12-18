<?php

// $jsonData = file_get_contents("https://api.ratebox.ir/apijson.php?token=6396cded07a5df6ff6979e013db38535");

// // JSON رو به آرایه تبدیل می‌کنیم
// $data = json_decode($jsonData, true);

// // بررسی برای خطا در دیکود کردن JSON
// if ($data === null) {
//     die("Error decoding JSON");
// }

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
            $row_currency['dollar'] =  $price + ($price * 0.04); // افزایش 4 درصدی
            $dollar = number_format(floatval($row_currency['dollar']) * 100);
        } elseif ($value['slug'] == 'aed') {
            $row_currency['derham'] =  $price + ($price * 0.07); // افزایش 4 درصدی
            $derham = number_format(floatval($row_currency['derham']) * 100);
        } elseif ($value['slug'] == 'try') {
            $row_currency['lira'] =  $price + ($price * 0.07); // افزایش 4 درصدی
            $lira = number_format(floatval($row_currency['lira']) * 100);
        } elseif ($value['slug'] == 'thb') {
            $row_currency['bat'] =  $price + ($price * 0.11); // افزایش 4 درصدی
            $bat = number_format(floatval($row_currency['bat']) * 100);
        }
    }
}

// چاپ نتایج

echo $dollar;
echo "<br>";

echo $derham;
echo "<br>";

echo $lira;
echo "<br>";

echo $bat;
echo "<br>";
// echo $row_currency['dollar']/ 10;


?>



<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            direction: rtl;
            text-align: right;
            margin: 0;
            padding: 0;
        }

        .form-container {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            margin: 30px auto;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        select, input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #218838;
        }

        #result {
            margin-top: 20px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            color: #333;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>

<form id="currencyForm">
            <div class="form-group">
                <label for="ramzarz">انتخاب ارز مورد نظر:</label>
                <select id="ramzarz">
                    <option value="USD">دلار</option>
                    <option value="AED">درهم</option>
                    <option value="TRY">لیر</option>
                    <option value="THB">بات</option>
                </select>
            </div>
            <div class="form-group">
                <label for="charge_rate">میزان شارژ:</label>
                <input type="number" id="charge_rate" placeholder="مبلغ شارژ را وارد کنید." required>
                <span class="error-message" id="errorMessage"></span>
            </div>
            <button type="submit">محاسبه</button>
            <div id="result">نتیجه در اینجا نمایش داده می‌شود</div>
        </form>
 <script>
        document.getElementById("currencyForm").addEventListener("submit", function(e) {
            e.preventDefault();

            // مقادیر فرم
            const currency = document.getElementById("ramzarz").value;
            const amount = parseFloat(document.getElementById("charge_rate").value);
            const errorMessage = document.getElementById("errorMessage");
            const resultDiv = document.getElementById("result");

            // چک کردن مقدار ورودی
            if (isNaN(amount) || amount <= 0) {
                errorMessage.textContent = "لطفاً مبلغ معتبر وارد کنید.";
                resultDiv.textContent = "";
                return;
            } else {
                errorMessage.textContent = "";
            }

            // قیمت‌های مثال (می‌توانید از API سمت سرور بگیرید)
            const prices = {
                "USD": 50000, // قیمت دلار
                "AED": 13600, // قیمت درهم
                "TRY": 1700,  // قیمت لیر
                "THB": 1500   // قیمت بات
            };

            // افزایش 4 درصدی
            const basePrice = prices[currency];
            const finalPrice = (basePrice + (basePrice * 0.04)) * amount;

            // نمایش نتیجه
            resultDiv.textContent = `قیمت نهایی برای ${amount} واحد ${currency}: ${finalPrice.toLocaleString()} تومان`;
        });
    </script>