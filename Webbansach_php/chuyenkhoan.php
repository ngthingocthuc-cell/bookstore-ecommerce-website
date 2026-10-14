<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chuyển khoản</title>
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
            color: #3f5d77;
        }

        .info {
            text-align: left;
            margin-top: 20px;
        }

        .info p {
            margin: 8px 0;
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
            cursor: pointer;
            border-radius: 5px;
        }

        .btn:hover {
            background: #2c4458;
        }

        img {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="box">
        <h2>💳 Vui lòng chuyển khoản</h2>
        <div class="info">
            <p><b>Ngân hàng:</b> Vietcombank</p>
            <p><b>Số tài khoản:</b> <span id="stk">0907080955</span></p>
            <p><b>Chủ tài khoản:</b> Nguyễn Mạnh Cường</p>
            <p><b>Nội dung:</b> <span class="madon" id="madon"> <?php if (isset($_SESSION['madon'])) {
                                                                    echo $_SESSION['madon'];
                                                                } else {
                                                                    echo "Không có mã đơn!";
                                                                } ?> </span> </p>
                                                                <button class="btn" onclick="copySTK()">Copy STK</button> <button class="btn" onclick="copyMaDon()">Copy mã đơn</button>
        <p style="margin-top:15px; color:red;"> Sau khi chuyển khoản, đơn hàng sẽ được xác nhận! </p> <a href="vanhoc.php">← Tiếp tục mua</a>
    </div>
    <script>
        function copySTK() {
            let stk = document.getElementById("stk").innerText;
            navigator.clipboard.writeText(stk);
            alert("Đã copy số tài khoản!");
        }

        function copyMaDon() {
            let madon = document.getElementById("madon").innerText;
            navigator.clipboard.writeText(madon);
            alert("Đã copy mã đơn!");
        }
    </script>
</body>

</html>