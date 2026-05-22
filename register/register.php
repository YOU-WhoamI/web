<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../css/register.css">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>GameDB - 註冊帳號</title>
</head>

<body>
    <?php require_once '../include/header.php'; ?>
    <div class="register">
        <h2 class="title">GameDB</h2>
        <div class="container">
            <form action="registered.php" method="POST">
                <h2>註冊帳號</h2>
                <p id="error-msg"></p>

                <label>使用者名稱：</label>
                <div class="input">
                    <input type="text" name="username" placeholder="請輸入使用者名稱" required>
                </div>

                <label>電子郵件：</label>
                <div class="input">
                    <input type="email" name="email" placeholder="請輸入電子郵件" required>
                </div>

                <label>密碼：</label>
                <div class="input">
                    <input type="password" name="password" id="password" placeholder="請輸入密碼" required>
                    <img src="../img/eye-close.jpg" class="eye-icon" id="eye-close">
                </div>

                <label>確認密碼：</label>
                <div class="input">
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="請再次輸入密碼" required>
                    <img src="../img/eye-close.jpg" class="eye-icon" id="eye-close2">
                </div>

                <button type="submit">註冊</button>

            </form>

            <div class="footer">
                <label>已經有帳號了? <a href="../login/login.php">登入帳號</a></label>
            </div>
        </div>
    </div>
    <script>
        // window.location.search是獲取URL中的參數(error)
        // URLSearchParams是用來解析URL參數的工具，get('error')是獲取error參數的值
        var error = new URLSearchParams(window.location.search).get('error');
        if (error === 'password') {
            document.getElementById('error-msg').textContent = '密碼錯誤，請重新輸入！';
        }
        if (error === 'already') {
            document.getElementById('error-msg').textContent = '帳戶已有人使用！';
        }

        // 副程式
        function w(eyeClose, input) {
            eyeClose.onclick = function() { // 當眼睛圖片被點擊
                if (input.type === 'password') { // 判斷密碼輸入框是否為密文
                    input.type = 'text'; // 如果是密文 密碼改為明文
                    eyeClose.src = 'img/eye-open.jpg'; // 且把眼睛圖片改為open
                } else {
                    // 否則改為密文 且眼睛圖片改為close
                    input.type = 'password';
                    eyeClose.src = 'img/eye-close.jpg';
                }
            }
        }

        // 因為不同輸入框 所以要呼叫兩次function(有2個參數)
        // 且id不得相同(因為id是唯一的) javascript只會收第一個
        w(
            document.getElementById('eye-close'), // eye-close是id
            document.getElementById('password') // password是input id
        )
        w(
            document.getElementById('eye-close2'), // eye-close2也是id
            document.getElementById('confirm_password') // confirm_password是input id
        )
    </script>
    <?php require_once '../include/footer.html'; ?>
</body>

</html>
