<?php
include "connect.php";
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
</head>

<body>

<header>SÁCH THIẾU NHI</header>

<nav>

<a href="../index.php" class="nav-logo">
    <img src="../assets/css/img/logo_book.png" alt="Logo">
    BookMark
</a>
<div class="nav_center">
<a href="vanhoc.php">Văn Học</a>
<a href="kynang.php">Kỹ Năng</a>
<a href="kinhte.php">Kinh Tế</a>
<a href="thieunhi.php">Thiếu Nhi</a>
</div>

<a href="cart.php" class="cart">
🛒
<span class="cart-count">
<?php
echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
</span>
</a>

</nav>

<div class="container">

<?php
$category_name = 'thieunhi'; 

$sql = "SELECT * FROM books WHERE category='$category_name' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $desc_safe = str_replace(array("\r", "\n"), '', $row['description']);
        $desc_safe = addslashes($desc_safe);

        echo "
        <div class='book' onclick=\"showPopup(
            '{$row['title']}',
            '{$row['author']}',
            '{$row['price']}',
            '$desc_safe',
            '{$row['image']}'
        )\">
            <img src='../images/{$row['image']}' onerror=\"this.src='../assets/css/img/no_image.png'\">
            <h3>{$row['title']}</h3>
            <p>{$row['author']}</p>
            <p class='price'>" . number_format($row['price'], 0, ',', '.') . "đ</p>
        </div>
        ";
    }
} else {
    echo "<p style='text-align:center; width:100%;'>Chưa có sách trong mục này.</p>";
}
?>

</div>


<div class="popup" id="popup">

<div class="popup-content">

<h2 id="pname"></h2>

<p><b>Tác giả:</b> <span id="pauthor"></span></p>

<p><b>Giá:</b> <span id="pprice"></span></p>

<p id="pdesc"></p>

<button onclick="addCart()">Thêm vào giỏ</button>
<button onclick="closePopup()">Đóng</button>

</div>

</div>


<script>

let bookName
let bookPrice
let bookImage

function showPopup(name, author, price, desc, image) {
    document.getElementById("popup").style.display = "flex";
    document.getElementById("pname").innerHTML = name;
    document.getElementById("pauthor").innerHTML = author;
    
    // Định dạng số tiền có dấu chấm phân cách phần nghìn
    let formattedPrice = new Intl.NumberFormat('vi-VN').format(price) + "đ";
    document.getElementById("pprice").innerHTML = formattedPrice;
    
    document.getElementById("pdesc").innerHTML = desc;

    bookName = name;
    bookPrice = price;
    bookImage = image;
}

function closePopup(){
document.getElementById("popup").style.display="none"
}

function addCart(){
window.location="cart.php?name="+bookName+"&price="+bookPrice+"&image="+bookImage
}

</script>

</body>
</html>