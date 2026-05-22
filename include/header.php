<?php

// 啟動 Session (用來辨識目前登入者的role)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<link rel="stylesheet" href="styles.css">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<header>
    <a href="../index.php">
        <img src="../img/game.jpg" alt="GameDB Logo" class="logo">
    </a>
    <div class="nav-links">
        <div class="left">
            <a class="nav-btn" href="../index.php">首頁</a>
            <a class="nav-btn" href="../hardware.php">硬體對比</a>
            <a class="nav-btn" href="../laptops.php">筆電推薦</a>
            <a class="nav-btn" href="../rank.php">排行榜</a>
        </div>
        <div class="right">
            <!-- <input type="text" class="search-input" placeholder="搜尋遊戲...">
            <a class="nav-btn" href="#">搜尋</a> -->

            <!-- 如果這個session存在會顯示頭像並顯示登出，isset()是檢查這個session是否存在 -->
            <?php if (isset($_SESSION['username'])) { ?>
                <div class="avatar-wrapper">
                    <div class="avatar" tabindex="0">
                        <!-- 從logined.php傳來session -->
                        <?= ($_SESSION['username'][0]) ?>
                    </div>
                    <div class="logout">
                        <ul>
                            <li><a href="../login/logout.php">登出</a></li>
                        </ul>
                    </div>
                </div>
            <?php } else { ?>
                <a class="nav-btn" href="../login/login.php">登入</a>
            <?php } ?>
        </div>
    </div>
</header>
