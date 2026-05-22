<?php

session_start(); // 啟用session
session_destroy(); // 銷毀session是要結束使用者登入狀態

header("Location: ../index.php");
exit();
