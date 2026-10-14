<?php
session_start();
unset($_SESSION['cart']); // Xóa giỏ hàng
echo "success";
?>