<?php
session_start();

// Khởi tạo giỏ hàng rỗng nếu chưa có
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Thêm sản phẩm vào giỏ
if (isset($_POST['add'])) {
    $_SESSION['cart'][] = [
        'name' => $_POST['name'],
        'price' => $_POST['price']
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Giỏ hàng</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header>GIỎ HÀNG</header>

<nav>
<a href="../index.html" class="nav-logo">
    <img src="../assets/css/img/logo_book.png" alt="Logo">
    BookMark
</a>

<a href="vanhoc.php">Văn Học</a>
<a href="kynang.php">Kỹ Năng</a>
<a href="kinhte.php">Kinh Tế</a>
<a href="thieunhi.php">Thiếu Nhi</a>

</nav>

<div style="padding:20px">

<?php

$total=0;

if(!empty($_SESSION['cart'])){

foreach($_SESSION['cart'] as $item){

echo $item['name']." - ".number_format($item['price'])."đ<br>";

$total+=$item['price'];
}

echo "<h3>Tổng tiền: ".number_format($total)."đ</h3>";
}

?>

</div>

</body>
</html>