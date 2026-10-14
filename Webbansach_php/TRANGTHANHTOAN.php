<?php
session_start();
$tamtinh = 0;
if (isset($_GET['plus'])) {
    $_SESSION['cart'][$_GET['plus']]['qty']++;

    header("Location: TRANGTHANHTOAN.php");
    exit();
}

if (isset($_GET['minus'])) {
    if ($_SESSION['cart'][$_GET['minus']]['qty'] > 1) {
        $_SESSION['cart'][$_GET['minus']]['qty']--;
    }

    header("Location: TRANGTHANHTOAN.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>THANH TOÁN</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        h3 {
            color: #333;
            margin-bottom: 20px;
        }

        h4 {
            color: #333;
            margin-bottom: 10px;
        }

        .container {
            display: flex;
            gap: 20px;
        }

        .box-left {
            width: 55%;
            background: white;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .box-right {
            width: 45%;
            background: white;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        p {
            margin: 10px 0 5px;
            font-weight: 500;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        textarea {
            height: 100px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            border-bottom: 2px solid #eee;
            padding: 10px;
            text-align: left;
        }

        td {
            border-bottom: 1px solid #eee;
            padding: 10px;
        }

        .total {
            color: #e53935;
            font-size: 18px;
            font-weight: bold;
        }

        button {
            margin-top: 15px;
            width: 100%;
            padding: 12px;
            background: #0f2438;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #0f2438;
        }

        input[type="radio"] {
            width: auto;
        }

        .back-cart {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #2962ff;
        }

        .back-cart:hover {
            text-decoration: underline;
        }

        .qty-box {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .qty-btn {
            width: 25px;
            height: 25px;
            padding: 0;
            font-size: 16px;
            background: #3f5d77;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .qty-btn:hover {
            background: #2c4458;
        }

        .qty-number {
            min-width: 20px;
            text-align: center;
            font-weight: bold;
        }

        td {
            vertical-align: middle;
        }
    </style>
</head>

<body>

    <header>THANH TOÁN</header>

    <form action="luudonhang.php" method="POST">

        <div class="container">

            <div class="box-left">

                <h4>THÔNG TIN THANH TOÁN</h4>

                <p>Họ và tên *</p>
                <input type="text" id="hoten" name="hoten">

                <p>Địa chỉ *</p>
                <input type="text" id="diachi" name="diachi">

                <p>Số điện thoại *</p>
                <input type="text" id="sdt" name="dienthoai">

                <p>Email</p>
                <input type="email" name="email">
                <br>
                <h4>THÔNG TIN BỔ SUNG</h4>
                <p>Ghi chú đơn hàng</p> <textarea placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn." name="ghichu"></textarea>

                <h4>PHƯƠNG THỨC THANH TOÁN</h4>

                <label><input type="radio" name="thanhtoan" value="COD" checked> COD</label><br>
                <label><input type="radio" name="thanhtoan" value="chuyenkhoan"> Chuyển khoản</label>

            </div>

            <div class="box-right">

                <h4>ĐƠN HÀNG</h4>

                <table>
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên</th>
                            <th>SL</th>
                            <th>Giá</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (!empty($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $index => $item) {

                                $thanhtien = $item['price'] * $item['qty'];
                                $tamtinh += $thanhtien;

                                echo "
<tr>
    <td>
        <img src='/Webbansach/images/{$item['image']}' style='width:60px; height:80px; object-fit:cover;'>
    </td>
    <td>{$item['name']}</td>
    <td style='text-align:center;'>
        <div class='qty-box'>
            <a href='?minus=$index'>
                <button type='button' class='qty-btn'>-</button>
            </a>

            <span class='qty-number'>{$item['qty']}</span>

            <a href='?plus=$index'>
                <button type='button' class='qty-btn'>+</button>
            </a>
        </div>
    </td>
    <td>" . number_format($thanhtien) . " đ</td>
</tr>
";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Không có sản phẩm</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <?php
                $ship = 30000;
                $tong = $tamtinh + $ship;
                ?>

                <p>Tạm tính: <?php echo number_format($tamtinh); ?> đ</p>
                <p>Ship: <?php echo number_format($ship); ?> đ</p>
                <p class="total">Tổng: <?php echo number_format($tong); ?> đ</p>

                <a href="cart.php" class="back-cart">← Quay lại giỏ hàng</a>

                <button type="submit" onclick="return dathang()">Đặt hàng</button>

            </div>

        </div>

    </form>

    <script>
        function dathang() {
            let hoten = document.getElementById("hoten").value;
            let diachi = document.getElementById("diachi").value;
            let sdt = document.getElementById("sdt").value;

            if (hoten == "" || diachi == "" || sdt == "") {
                alert("Nhập đầy đủ thông tin!");
                return false;
            }

            alert("Đặt hàng thành công!");
            return true;
        }

        let radios = document.getElementsByName("thanhtoan");

        radios.forEach(r => {
            r.addEventListener("change", function() {
                document.getElementById("bankInfo").style.display =
                    this.value == "chuyenkhoan" ? "block" : "none";
            });
        });
    </script>

</body>

</html>