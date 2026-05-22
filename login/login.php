<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>GameDB - 登入</title>
</head>
<body>
    <?php require_once '../include/header.php'; ?>
    <div class="login-page">
        <h2 class="login-title">GameDB</h2>
        <div class="login-container">
            <h2>登入</h2>
            <p id="error-msg"></p>
            <form action="logined.php" method="post">

                <label>使用者帳號：</label>
                <div class="input-group">
                    <input type="text" name="username" placeholder="請輸入帳號" required>
                </div>

                <label>密碼：</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder="請輸入密碼" required>
                    <img src="../img/eye-close.jpg" class="eye-icon" id="eye-close">
                    <a class="forgot-password" href="#">忘記密碼?</a>
                </div>

                <button type="submit">登入</button>

            </form>

            <div class="footer-links">
                <label>還沒有帳號? <a href="../register/register.php">註冊帳號</a></label>
            </div>
        </div>
    </div>
    <script>
        var error = new URLSearchParams(window.location.search).get('error');
        if (error === 'invalid') {
            document.getElementById('error-msg').textContent = '帳號或密碼錯誤，請重新輸入！';
        }

        var eyeClose = document.getElementById('eye-close');
        var password = document.getElementById('password');
        eyeClose.onclick = function() {
            if (password.type === 'password') {
                password.type = 'text';
                eyeClose.src = 'img/eye-open.jpg';
            } else {
                password.type = 'password';
                eyeClose.src = 'img/eye-close.jpg';
            }
        }
    </script>
    <?php require_once '../include/footer.html'; ?>
</body>

</html>
