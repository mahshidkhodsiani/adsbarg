<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تماس سریع</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .contact-circle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #007bff;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            z-index: 1000;
        }

        .contact-circle img {
            width: 30px;
            height: 30px;
        }

        .social-icons {
            position: fixed;
            bottom: 90px;
            right: 20px;
            display: none;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .social-icons a {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .social-icons a img {
            width: 30px;
            height: 30px;
        }

        .social-icons a.whatsapp {
            background-color: #25d366;
        }

        .social-icons a.telegram {
            background-color: #0088cc;
        }
    </style>
</head>
<body>

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

</body>
</html>
