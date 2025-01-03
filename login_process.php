<?php

session_start();

include "config.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


     // Check if input fields are empty
     if (empty($username) || empty($password)) {
        $_SESSION['login_error'] = 'نام کاربری یا رمز عبور نمی‌تواند خالی باشد.';
        header("Location: login.php");
        exit();
    }

    
    // Use prepared statements to protect against SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    // echo $stmt;
    $stmt->bind_param("ss", $username, $password);
    $conn->set_charset("utf8");

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['user_data'] = $row;
        if($row['admin'] == 0){
            header("Location: index.php");
        }else{
            header("Location: admin");
        }
        exit();
    } else {
        echo "<script>
            alert('کاربری یا رمز عبور اشتباه است');
            setTimeout(() => {
                window.location.href = 'login';
            });
        </script>";
    }
    

    // Close the statement
    $stmt->close();
}




?>