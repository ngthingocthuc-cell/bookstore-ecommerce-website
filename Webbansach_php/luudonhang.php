<?php
session_start();

$pttt = $_POST['thanhtoan'] ?? "";
//toa ma
$madon = "DH" . rand(1000,9999);
$_SESSION['madon'] = $madon;

// xoa gio hang khi thanh toan
unset($_SESSION['cart']);

//chyentrang
if($pttt == "chuyenkhoan"){
    header("Location: chuyenkhoan.php");
} else {
    header("Location: thanhcong.php");
}
exit();