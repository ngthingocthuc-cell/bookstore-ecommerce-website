<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = "";
$status = "";

// XỬ LÝ FORM
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $subject = trim($_POST["subject"] ?? "");
    $content = trim($_POST["content"] ?? "");

    if ($name == "" || $email == "" || $content == "") {
        header("Location: " . $_SERVER['PHP_SELF'] . "?status=error");
        exit();
    } else {
        $data = "Tên: $name | Email: $email | SĐT: $phone | Chủ đề: $subject | Nội dung: $content\n";
        file_put_contents("contact_data.txt", $data, FILE_APPEND);

        header("Location: " . $_SERVER['PHP_SELF'] . "?status=success");
        exit();
    }
}

// HIỂN THỊ THÔNG BÁO
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        $message = "✅ Gửi liên hệ thành công!";
        $status = "success";
    } elseif ($_GET['status'] == 'error') {
        $message = "❌ Vui lòng nhập đầy đủ thông tin!";
        $status = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ - BookMark</title>

    <link rel="shortcut icon" href="../assets/css/img/logo_book.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto&display=swap">

    <link rel="stylesheet" href="../assets/css/font/fontawesome-free-5.15.4-web/css/all.min.css">
</head>

<body>
<div class="app">

<!-- HEADER -->
<header class="header">
    <div class="grid">

        <!-- NAVBAR -->
        <nav class="header__navbar">

            <!-- BÊN TRÁI -->
            <ul class="header__navbar-list">

                <li class="header__navbar-item">
                    <a href="lienhe.php" class="header__navbar-item-link">
                        <i class="fas fa-headset"></i>
                        Trung tâm hỗ trợ
                    </a>
                </li>

                <li class="header__navbar-item header__navbar-item--separate">
                    <a href="lienhe.php" class="header__navbar-item-link">
                        <i class="fas fa-question-circle"></i>
                        Hướng dẫn
                    </a>
                </li>

                <li class="header__navbar-item header__navbar-item--separate">
                    <a href="#" class="header__navbar-item-link">
                        <i class="fas fa-book"></i>
                        Giới thiệu BookMark
                    </a>
                </li>

            </ul>

        </nav>

        <!-- HEADER CHÍNH -->
        <div class="header-with-search">

            <!-- LOGO (CLICK VỀ INDEX) -->
            <a href="/Webbansach/index.php" class="header__logo" style="text-decoration:none; color:inherit;">
                <img src="../assets/css/img/logo_book.png" class="header__logo-img">
                <span class="header__logo-text">BookMark</span>
            </a>

            <!-- THÔNG TIN LIÊN HỆ TO -->
            <div style="
                display:flex;
                align-items:center;
                gap:40px;
                color:white;
                font-size:18px;
                font-weight:500;
            ">

                <div>
                    <i class="fas fa-phone"></i> 0123 456 789
                </div>

                <div>
                    <i class="fas fa-envelope"></i> support@bookmark.vn
                </div>

                <div>
                    <i class="fas fa-clock"></i> 7:00 - 22:00
                </div>

                <div>
                    <a href="#" style="color:white;">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" style="color:white; margin-left:10px;">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>

            </div>

        </div>
    </div>
</header>

    <!-- FORM -->
    <div class="grid" style="margin-top:30px;">
        <div style="background:white; padding:25px; border-radius:10px; width:800px; margin:auto;">

            <h2 style="text-align:center; font-size:32px; font-weight:bold;">
                📩 Liên hệ với BookMark
            </h2>

            <!-- THÔNG BÁO -->
            <?php if ($message != "") { ?>
                <p class="msg" style="
                    text-align:center;
                    font-size:20px;
                    font-weight:bold;
                    color: <?php echo ($status == 'success') ? 'green' : 'red'; ?>;
                ">
                    <?php echo $message; ?>
                </p>
            <?php } ?>

            <form method="POST">

                <label>Họ và tên *</label>
                <input type="text" name="name" required style="width:100%; padding:10px; margin:8px 0;">

                <label>Email *</label>
                <input type="email" name="email" required style="width:100%; padding:10px; margin:8px 0;">

                <label>Số điện thoại</label>
                <input type="text" name="phone" style="width:100%; padding:10px; margin:8px 0;">

                <label>Chủ đề</label>
                <select name="subject" style="width:100%; padding:10px; margin:8px 0;">
                    <option>Hỗ trợ đơn hàng</option>
                    <option>Tư vấn sách</option>
                    <option>Khiếu nại</option>
                    <option>Khác</option>
                </select>

                <label>Nội dung *</label>
                <textarea name="content" required rows="5" style="width:100%; padding:10px; margin:8px 0;"></textarea>

                <button type="submit" style="
                    width:100%;
                    padding:12px;
                    background:#2c3e50;
                    color:white;
                    border:none;
                    cursor:pointer;
                    font-size:16px;
                ">
                    Gửi liên hệ
                </button>

            </form>

        </div>
    </div>

</div>

<!-- ẨN THÔNG BÁO -->
<script>
setTimeout(() => {
    const msg = document.querySelector(".msg");
    if (msg) msg.style.display = "none";
}, 3000);
</script>

</body>
</html>