<?php

require_once '../include/dbcon.php'; // 引入db連線設定
session_start(); // session是用來在不同頁面之間儲存使用者資料的機制

if ($_SERVER["REQUEST_METHOD"] == "POST") { // 檢查表單是否為POST請求(REQUEST_METHOD)
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm_password"];

    // 檢查密碼是否一致
    if ($password !== $confirm) {
        header("Location: register.php?error=password"); // 後面error是參數(要傳給register.php)
        exit();
    }

    // 從user1表中查詢有沒有相同的username或email的記錄(where是查詢條件)
    $sql = "SELECT * FROM users1 WHERE username='$username' OR email='$email'";
    $result = $link->query($sql);

    // 從sql查詢如果找到相同username或email就表示帳戶存在
    // num_rows是查詢結果的行數，大於0表示有找到這個用戶並回到註冊頁面傳出錯誤訊息
    if ($result->num_rows > 0) {
        header("Location: register.php?error=already"); // 後面error是參數(要傳給register.php)
        exit();
    }

    // 儲存新使用者資料
    $sql = "INSERT INTO users1 (username, email, password, role)
            VALUES ('$username', '$email', '$password', 'user')";
    $link->query($sql);

    header("Location: ../login/login.php"); // 到登入頁面
    exit();
}
