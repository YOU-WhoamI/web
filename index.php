<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <title>GameDB - 首頁</title>
</head>

<body class="home-page">
    <?php require_once 'include/header.php'; ?>

    <div class="home-section">
        <h1 class="home-title">GameDB</h1>
        <p class="home-subtitle">為你解決「能不能玩」</p>

        <div class="description-text">
            GameDB 是一個遊戲硬體資料庫，透過規格對比與推薦，<br>
            找到最適合的筆電與遊戲。
        </div>

        <a href="laptops.php" class="cta-button">進入系統</a>
    </div>

    <?php require_once 'include/footer.html'; ?>
</body>

</html>
