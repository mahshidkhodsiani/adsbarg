<?php
$servername = '185.141.212.171'; 
$username = 'adsbarg_admin'; 
$password = 'HL(to{PCYL=b'; 
$dbname = 'adsbarg_dashboard'; 

$cfg['Lang'] = 'fa';
$cfg['Charset'] = 'utf8mb4';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

$currencys = "SELECT * FROM currencys ORDER BY id DESC LIMIT 1";
$result_currency = $conn->query($currencys);

if ($result_currency === FALSE) {
    echo "Error executing query: " . mysqli_error($conn);
} else {
    if ($result_currency->num_rows > 0) {
        $row_currency = $result_currency->fetch_assoc();
        // نرخ تبدیل ارزها از دیتابیس به تومان
        $dollar_to_toman = $row_currency['dollar'] * 100; // دلار به تومان
        $derham_to_toman = $row_currency['derham'] * 100; // درهم به تومان
        $lira_to_toman = $row_currency['lira'] * 100; // لیر به تومان
        $bat_to_toman = $row_currency['bat'] * 100; // بات به تومان
        ?>
            <div style="display: flex;">
                <button id="exclusive_button" onclick="changeMode('exclusive')" style="width: 100px; margin-left: 10px; margin-right: 20px" disabled>اختصاصی</button>
                <button id="managed_button" onclick="changeMode('managed')" style="width: 100px;">مدیریت‌شده</button>
            </div>

            
            <div class="currency-container">
                <div class="currency-box">
                    <a href="https://adsbarg.com/dashboard" class="link">شارژ دلخواه</a>
                </div>
            </div>
        <?php
    } else {
        echo "No data found.";
    }
}

$conn->close();
?>

<style>
    .currency-container {
        display: flex;
        margin-bottom: 20px;
        justify-content: space-around;
        gap: 20px;
        flex-wrap: wrap;
    }

    .currency-box {
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 8px;
        border: 2px solid #ccc;
        width: 300px;
        text-align: center;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .currency-title {
        font-weight: bold;
        margin-bottom: 10px;
        font-size: 16px;
    }

    input[type="number"] {
        width: 80%;
        padding: 8px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        text-align: center;
    }

    button {
        width: 80%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 10px;
        font-size: 14px;
    }

    button:hover {
        background-color: #0056b3;
    }

    p {
        font-size: 14px;
        margin-top: 10px;
    }

    .link {
        display: block;
        margin-top: 20px;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
    }

    .link:hover {
        background-color: #218838;
    }
</style>


<script>

let mode = 'exclusive'; // حالت پیش‌فرض اختصاصی است



function changeMode(selectedMode) {
    if (mode !== selectedMode) { // فقط اگر تغییر مود رخ دهد
        console.log(`Mode changed from ${mode} to ${selectedMode}`); // ثبت تغییر مود در کنسول
        onModeChange(mode, selectedMode); // فراخوانی تابع هنگام تغییر مود
    }

    mode = selectedMode;

    // فعال/غیرفعال کردن دکمه‌ها
    if (mode === 'exclusive') {
        document.getElementById('exclusive_button').disabled = true;
        document.getElementById('managed_button').disabled = false;
    } else if (mode === 'managed') {
        document.getElementById('exclusive_button').disabled = false;
        document.getElementById('managed_button').disabled = true;
    }

    // پس از تغییر مود، مجدداً محاسبه کارمزد و قیمت‌ها برای همه ارزها
    calculateFee('dollar');
    calculateFee('aed');
    calculateFee('try');
    calculateFee('thb');
}

// تابعی که هنگام تغییر مود اجرا می‌شود
function onModeChange(previousMode, newMode) {
    alert(`تغییر حالت: از ${previousMode} به ${newMode}`);
}


function calculateFee(currency) {
    let amount;
    let fee = 0;
    let totalPrice;
    let exchangeRate;
    let chargeFeeDescription = ""; // توضیح کارمزد شارژ

    let dollarToToman = <?= $dollar_to_toman ?>;
    let derhamToToman = <?= $derham_to_toman ?>;
    let liraToToman = <?= $lira_to_toman ?>;
    let batToToman = <?= $bat_to_toman ?>;

    // مقدار پیش‌فرض پیام‌ها پاک شود
    document.getElementById(currency + '_fee').textContent = '';
    document.getElementById(currency + '_total_price').textContent = '';

    if (currency === 'dollar') {
        amount = parseFloat(document.getElementById('dollar_amount').value);
        if (amount < 50) {
            document.getElementById('dollar_fee').textContent = "مقدار وارد شده باید حداقل 50 دلار باشد.";
            document.getElementById('dollar_total_price').textContent = "";
            return;
        }
        if (amount >= 50 && amount <= 99) {
            fee = 10;
            chargeFeeDescription = "10% کارمزد شارژ";
        } else if (amount >= 100 && amount <= 199) {
            fee = 9;
            chargeFeeDescription = "9% کارمزد شارژ";
        } else if (amount >= 200 && amount <= 299) {
            fee = 8;
            chargeFeeDescription = "8% کارمزد شارژ";
        } else if (amount >= 300 && amount <= 499) {
            fee = 7.5;
            chargeFeeDescription = "7.5% کارمزد شارژ";
        } else if (amount >= 500 && amount <= 749) {
            fee = 7;
            chargeFeeDescription = "7% کارمزد شارژ";
        } else if (amount >= 750 && amount <= 999) {
            fee = 6.5;
            chargeFeeDescription = "6.5% کارمزد شارژ";
        } else if (amount >= 1000) {
            fee = 6;
            chargeFeeDescription = "6% کارمزد شارژ";
        }
        if (mode === 'managed') {
            fee *= 2; // در حالت مدیریت‌شده، کارمزد ضربدر 2 می‌شود
        }
        let amountInToman = amount * dollarToToman;
        totalPrice = amountInToman + (amountInToman * fee / 100);
    } else if (currency === 'aed') {
        amount = parseFloat(document.getElementById('aed_amount').value);
        if (amount < 300) {
            document.getElementById('aed_fee').textContent = "مقدار وارد شده باید حداقل 300 درهم باشد.";
            document.getElementById('aed_total_price').textContent = "";
            return;
        }
        exchangeRate = derhamToToman;
        if (amount >= 300 && amount <= 499) {
            fee = 10;
            chargeFeeDescription = "10% کارمزد شارژ";
        } else if (amount >= 500 && amount <= 999) {
            fee = 9;
            chargeFeeDescription = "9% کارمزد شارژ";
        } else if (amount >= 1000 && amount <= 1999) {
            fee = 8;
            chargeFeeDescription = "8% کارمزد شارژ";
        } else if (amount >= 2000 && amount <= 3499) {
            fee = 7;
            chargeFeeDescription = "7% کارمزد شارژ";
        } else if (amount >= 3500) {
            fee = 6;
            chargeFeeDescription = "6% کارمزد شارژ";
        }
        if (mode === 'managed') {
            fee *= 2; // در حالت مدیریت‌شده، کارمزد ضربدر 2 می‌شود
        }
        let amountInCurrency = amount * exchangeRate;
        totalPrice = amountInCurrency + (amountInCurrency * fee / 100);
    } else if (currency === 'try') {
        amount = parseFloat(document.getElementById('try_amount').value);
        if (amount < 500) {
            document.getElementById('try_fee').textContent = "مقدار وارد شده باید حداقل 500 لیر باشد.";
            document.getElementById('try_total_price').textContent = "";
            return;
        }
        exchangeRate = liraToToman;
        if (amount >= 500 && amount <= 999) {
            fee = 10;
            chargeFeeDescription = "10% کارمزد شارژ";
        } else if (amount >= 1000 && amount <= 1999) {
            fee = 9;
            chargeFeeDescription = "9% کارمزد شارژ";
        } else if (amount >= 2000 && amount <= 2999) {
            fee = 8.5;
            chargeFeeDescription = "8.5% کارمزد شارژ";
        } else if (amount >= 3000 && amount <= 4999) {
            fee = 8;
            chargeFeeDescription = "8% کارمزد شارژ";
        } else if (amount >= 5000 && amount <= 9999) {
            fee = 7.5;
            chargeFeeDescription = "7.5% کارمزد شارژ";
        } else if (amount >= 10000) {
            fee = 6.5;
            chargeFeeDescription = "6.5% کارمزد شارژ";
        }
        if (mode === 'managed') {
            fee *= 2; // در حالت مدیریت‌شده، کارمزد ضربدر 2 می‌شود
        }
        let amountInCurrency = amount * exchangeRate;
        totalPrice = amountInCurrency + (amountInCurrency * fee / 100);
    } else if (currency === 'thb') {
        amount = parseFloat(document.getElementById('thb_amount').value);
        if (amount < 2000) {
            document.getElementById('thb_fee').textContent = "مقدار وارد شده باید حداقل 2000 بات باشد.";
            document.getElementById('thb_total_price').textContent = "";
            return;
        }
        exchangeRate = batToToman;
        if (amount >= 2000 && amount <= 3499) {
            fee = 10;
            chargeFeeDescription = "10% کارمزد شارژ";
        } else if (amount >= 3500 && amount <= 4999) {
            fee = 9;
            chargeFeeDescription = "9% کارمزد شارژ";
        } else if (amount >= 5000 && amount <= 7999) {
            fee = 8.5;
            chargeFeeDescription = "8.5% کارمزد شارژ";
        } else if (amount >= 8000 && amount <= 9999) {
            fee = 8;
            chargeFeeDescription = "8% کارمزد شارژ";
        } else if (amount >= 10000 && amount <= 14999) {
            fee = 7.5;
            chargeFeeDescription = "7.5% کارمزد شارژ";
        } else if (amount >= 15000) {
            fee = 7;
            chargeFeeDescription = "7% کارمزد شارژ";
        }
        if (mode === 'managed') {
            fee *= 2; // در حالت مدیریت‌شده، کارمزد ضربدر 2 می‌شود
        }
        let amountInCurrency = amount * exchangeRate;
        totalPrice = amountInCurrency + (amountInCurrency * fee / 100);
    }

    if (!isNaN(totalPrice)) {
        document.getElementById(currency + '_fee').textContent = "کارمزد: " + chargeFeeDescription;
        document.getElementById(currency + '_total_price').textContent = "قیمت کل: " + totalPrice.toLocaleString('fa-IR');
    }
}




</script>


<div style="display: flex;">
    <div class="currency-box" style="margin-left: 50px;">
        <div class="currency-title">دلار : <?= number_format($dollar_to_toman) ?> تومان</div>
        <form>
            <input type="number" id="dollar_amount" placeholder="مقدار دلار را وارد کنید" oninput="calculateFee('dollar')">
            <p id="dollar_fee"></p>
            <p id="dollar_total_price"></p>
        </form>
    </div>

    <div class="currency-box">
        <div class="currency-title">درهم : <?= number_format($derham_to_toman) ?> تومان</div>
        <form>
            <input type="number" id="aed_amount" placeholder="مقدار درهم را وارد کنید" oninput="calculateFee('aed')">
            <p id="aed_fee"></p>
            <p id="aed_total_price"></p>
        </form>
    </div>
</div>


<div style="display: flex;">
    <div class="currency-box" style="margin-left: 50px;">
        <div class="currency-title">لیر : <?= number_format($lira_to_toman) ?> تومان</div>
        <form>
            <input type="number" id="try_amount" placeholder="مقدار لیر را وارد کنید" oninput="calculateFee('try')">
            <p id="try_fee"></p>
            <p id="try_total_price"></p>
        </form>
    </div>

    <div class="currency-box">
        <div class="currency-title">بات : <?= number_format($bat_to_toman) ?> تومان</div>
        <form>
            <input type="number" id="thb_amount" placeholder="مقدار بات را وارد کنید" oninput="calculateFee('thb')">
            <p id="thb_fee"></p>
            <p id="thb_total_price"></p>
        </form>
    </div>
</div>
