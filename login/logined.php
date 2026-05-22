<?php

// 顯示錯誤訊息
ini_set('display_errors', 1); // 顯示錯誤 1開啟 0關閉 ini_set是設定php配置
ini_set('display_startup_errors', 1); // 顯示啟動錯誤
error_reporting(E_ALL); // 顯示所有錯誤 E_ALL顯示所有錯誤
// ----------------------------------------------------

require_once '../include/dbcon.php'; // 引入db連線設定
session_start(); // 啟動session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // 檢查使用者名稱和密碼是否正確
    $sql = "SELECT * FROM users1 WHERE username='$username' AND password='$password'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); // 取得使用者資料
        $_SESSION['username'] = $username; // 將使用者名稱存入session $session後面是變數名 可傳到其他頁面使用
        $_SESSION['role'] = $user['role'];
        header("Location: ../index.php"); // 登入成功，到首頁
        exit();
    } else {
        header("Location: login.php?error=invalid"); // 登入失敗，回登入頁面並帶錯誤訊息
        exit();
    }
}
