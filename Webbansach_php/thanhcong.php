<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>

    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            text-align: center;
            padding: 50px;
        }

        .box {
            background: white;
            padding: 30px;
            width: 400px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        h2 {
            color: green;
        }

        .madon {
            color: red;
            font-weight: bold;
        }

        .btn {
            margin-top: 15px;
            padding: 10px 15px;
            background: #3f5d77;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            background: #2c4458;
        }
    </style>
</head>

<body>

<div class="box">
    <h2>Đặt hàng thành công!</h2>
    <p>Mã đơn của bạn là:</p>

    <p class="madon">
        <?php 
        if(isset($_SESSION['madon'])){
            echo $_SESSION['madon'];
        } else {
            echo "Không có mã đơn";
        }
        ?>
    </p>

    <p>Đơn hàng sẽ được giao sớm nhất!</p>
    <a href="vanhoc.php" class="btn">Tiếp tục mua</a>
</div>

</body>
</html>