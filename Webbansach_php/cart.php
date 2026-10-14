<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

/* THÊM SÁCH */

if (isset($_GET['name'])) {

    $name = $_GET['name'];
    $price = $_GET['price'];
    $image = $_GET['image'];

    $found = false;

    foreach ($_SESSION['cart'] as &$item) {

        if ($item['name'] == $name) {
            $item['qty']++;
            $found = true;
            break;
        }
    }

    if (!$found) {

        $_SESSION['cart'][] = [
            'name' => $name,
            'price' => $price,
            'image' => $image,
            'qty' => 1
        ];
    }

    header("Location: cart.php");
    exit();
}

/* TĂNG SỐ LƯỢNG */

if (isset($_GET['plus'])) {
    $_SESSION['cart'][$_GET['plus']]['qty']++;
}

/* GIẢM SỐ LƯỢNG */

if (isset($_GET['minus'])) {
    if ($_SESSION['cart'][$_GET['minus']]['qty'] > 1) {
        $_SESSION['cart'][$_GET['minus']]['qty']--;
    }
}

/* XÓA */

if (isset($_GET['remove'])) {
    unset($_SESSION['cart'][$_GET['remove']]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="style.css">

    <style>
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: white;
        }

        th,
        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        .book-img {
            width: 70px;
            height: 90px;
            object-fit: cover;
        }

        .qty-btn {
            padding: 5px 10px;
            background: #3f5d77;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }

        .remove {
            color: red;
            font-size: 18px;
            text-decoration: none;
        }

        .total {
            text-align: center;
            font-size: 20px;
            margin-top: 20px;
        }

        .continue {
            display: block;
            width: 200px;
            margin: 20px auto;
            text-align: center;
            padding: 10px;
            background: #3f5d77;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-group{
    text-align:center;
    margin-top:20px;
}

.btn-group a{
    display:inline-block;
    width:200px;
    margin:10px;
}

    </style>

</head>

<body>

    <header>GIỎ HÀNG</header>

    <nav style="justify-content: center;">

        <a href="vanhoc.php">Văn Học</a>
        <a href="kynang.php">Kỹ Năng</a>
        <a href="kinhte.php">Kinh Tế</a>
        <a href="thieunhi.php">Thiếu Nhi</a>

        <a href="cart.php" class="cart">
            🛒
            <span class="cart-count">

                <?php
                echo count($_SESSION['cart']);
                ?>

            </span>
        </a>

    </nav>

    <br>

    <?php

    if (!empty($_SESSION['cart'])) {

        echo "<table>";

        echo "
<tr>
<th>Ảnh</th>
<th>Tên sách</th>
<th>Giá</th>
<th>Số lượng</th>
<th>Xóa</th>
</tr>
";

        $total = 0;

        foreach ($_SESSION['cart'] as $index => $item) {

            $subtotal = $item['price'] * $item['qty'];

            echo "

<tr>

<td>
<img class='book-img' src='../images/" . $item['image'] . "'>
</td>

<td>" . $item['name'] . "</td>

<td>" . number_format($item['price']) . "đ</td>

<td>

<a href='cart.php?minus=$index'>
<button class='qty-btn'>-</button>
</a>

" . $item['qty'] . "

<a href='cart.php?plus=$index'>
<button class='qty-btn'>+</button>
</a>

</td>

<td>

<a class='remove' href='cart.php?remove=$index'>
🗑
</a>

</td>

</tr>

";

            $total += $subtotal;
        }

        echo "</table>";

        echo "<div class='total'>Tổng tiền: <b>" . number_format($total) . "đ</b></div>";
    } else {

        echo "<h2 style='text-align:center'>Giỏ hàng trống</h2>";
    }

    ?>

<div class="btn-group">
    <a class="continue" href="vanhoc.php">Tiếp tục mua</a>
    <a class="continue" href="TRANGTHANHTOAN.php" style="background:#28a745;">
        Thanh toán
    </a>
</div>

</body>

</html>