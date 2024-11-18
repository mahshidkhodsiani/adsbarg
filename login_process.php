<?php

session_start();

include "config.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

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
        $_SESSION['login_error'] = 'نام کاربری یا رمز عبور اشتباه است. دوباره امتحان کنید.';
        header("Location: login.php"); // Redirect back to the login page
        exit();
    }

    // Close the statement
    $stmt->close();
}


?>