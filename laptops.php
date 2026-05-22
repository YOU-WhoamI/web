<?php

require_once 'include/dbcon.php'; // 引入資料庫連線

// 從資料庫撈取所有筆電資料
$sql = "SELECT * FROM laptops";
$result = $link->query($sql);

$laptops = [];

// 將資料庫撈出的資料整理成PHP陣列
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // 根據VRAM判斷遊戲效能文字
        if ($row['vram_gb'] >= 12) {
            $performance = "遊戲效能：4K 極致體驗";
        } elseif ($row['vram_gb'] >= 8) {
            $performance = "遊戲效能：全開順跑";
        } else {
            $performance = "遊戲效能：高畫質順跑";
        }

        // 把整理好的資料放到陣列
        $laptops[] = [
            'name' => $row['name'],
            'cpu' => $row['cpu'],
            'gpu' => $row['gpu'],
            'vram' => $row['vram_gb'],
            'ram' => $row['ram_gb'],
            'storage' => $row['storage'],
            'performance' => $performance,
            'image' => $row['image']
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/laptops.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <title>GameDB - 筆電推薦</title>
</head>

<body>
    <?php require_once 'include/header.php'; ?>

    <div class="container">
        <div class="sidebar">
            <h2>篩選</h2>
            <div class="select-group">
                <select>
                    <option value="all">全部品牌</option>
                    <option value="asus">ASUS 華碩</option>
                    <option value="msi">MSI 微星</option>
                    <option value="acer">Acer 宏碁</option>
                    <option value="gigabyte">GIGABYTE 技嘉</option>
                </select>
            </div>

            <div class="select-group">
                <select>
                    <option value="all">不限效能</option>
                    <option value="4K">4K 極致體驗</option>
                    <option value="全開">全開順跑</option>
                    <option value="高畫質">高畫質順跑</option>
                </select>
            </div>

            <button class="btn">套用篩選</button>
        </div>

        <div class="content">
            <div class="title-section">
                <h1>熱門筆電推薦</h1>
                <p>根據您的硬體需求，推薦最適合遊玩電競筆電。</p>
            </div>

            <div class="grid">
                <?php if (!empty($laptops)) : ?>
                    <!-- 如果laptops不是空資料(empty是空白)執行foreach -->
                    <?php foreach ($laptops as $laptop) : ?>
                        <div class="card">
                            <div class="laptop-image">
                                <img
                                class="card-img-top"
                                src="<?php echo $laptop['image']; ?>"
                                alt="<?php echo $laptop['name']; ?>"
                                >
                            </div>
                            <div class="info">
                                <h3><?php echo ($laptop['name']); ?></h3>
                                <p class="specs">
                                    處理器: <?php echo ($laptop['cpu']); ?><br>
                                    顯卡: <?php echo ($laptop['gpu']); ?>
                                    (<?php echo $laptop['vram']; ?>GB)
                                </p>
                                <div class="tag"><?php echo $laptop['performance']; ?></div>

                                <div class="card-footer">
                                    <p class="spec">規格首選</p>
                                    <button class="detail-btn"
                                        name="<?php echo $laptop['name']; ?>"
                                        cpu="<?php echo $laptop['cpu']; ?>"
                                        gpu="<?php echo $laptop['gpu']; ?>"
                                        vram="<?php echo $laptop['vram']; ?> GB"
                                        ram="<?php echo $laptop['ram']; ?> GB"
                                        storage="<?php echo $laptop['storage']; ?> GB"
                                        perf="<?php echo $laptop['performance']; ?>"
                                        onclick="showSpecs(this)">
                                        詳細規格
                                    </button>
                                    <!-- showSpecs是函數名後面的this指這個button -->
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else : ?>
                    <p style="color: #94a3b8;">目前資料庫中沒有筆電資料。</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div id="specModal" class="modal-overlay">
        <div class="modal-content">
            <!--
            當點擊關閉扭的時候改變id(specModal)
            style.display視窗=無
            &times;是關閉按鈕顯示 -->
            <p
            class="close-btn"
            onclick="document.getElementById('specModal').style.display='none'">
                &times;
            </p>
            <h2 id="Title" style="color: #38bdf8; margin-bottom: 15px;">筆電名稱</h2>

            <table class="table">
                <tr>
                    <th>處理器 (CPU)</th>
                    <td id="CPU"></td>
                </tr>
                <tr>
                    <th>顯示卡 (GPU)</th>
                    <td id="GPU"></td>
                </tr>
                <tr>
                    <th>顯卡記憶體 (VRAM)</th>
                    <td id="VRAM"></td>
                </tr>
                <tr>
                    <th>主記憶體 (RAM)</th>
                    <td id="RAM"></td>
                </tr>
                <tr>
                    <th>硬碟容量</th>
                    <td id="Storage"></td>
                </tr>
                <tr>
                    <th>效能評價</th>
                    <td id="Perf" style="color:#4ade80; font-weight:bold;"></td>
                </tr>
            </table>
        </div>
    </div>

    <?php require_once 'include/footer.html'; ?>

    <script>
        // getAttribute可以取得html裡button的值，再放到id裡面，讓視窗顯示
        function showSpecs(button) {
            document.getElementById('Title').innerText = button.getAttribute('name');
            document.getElementById('CPU').innerText = button.getAttribute('cpu');
            document.getElementById('GPU').innerText = button.getAttribute('gpu');
            document.getElementById('VRAM').innerText = button.getAttribute('vram');
            document.getElementById('RAM').innerText = button.getAttribute('ram');
            document.getElementById('Storage').innerText = button.getAttribute('storage');
            document.getElementById('Perf').innerText = button.getAttribute('perf');

            // 找到specModal這個id並打開視窗
            document.getElementById('specModal').style.display = 'flex';
        }
    </script>
</body>

</html>
