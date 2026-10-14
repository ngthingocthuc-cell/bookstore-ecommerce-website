<?php
include "connect.php";
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$tukhoa = isset($_GET['tukhoa']) ? trim($_GET['tukhoa']) : '';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Kết quả tìm kiếm: <?php echo htmlspecialchars($tukhoa); ?></title>
</head>
<body>

<header>KẾT QUẢ TÌM KIẾM</header>

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
    🛒 <span class="cart-count"><?php echo count($_SESSION['cart']); ?></span>
    </a>
</nav>
  <h2 style="width: 100%; text-align: center; margin-bottom: 20px;">
        Kết quả tìm kiếm cho từ khóa: <span style="color: red;">"<?php echo htmlspecialchars($tukhoa); ?>"</span>
 </h2>

<?php
    // 1. Đếm trước xem tìm được bao nhiêu cuốn sách
    $count = 0;
    $result = null;
    if ($tukhoa != '') {
        $sql = "SELECT * FROM books WHERE title LIKE '%$tukhoa%' OR author LIKE '%$tukhoa%'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
    }
    
    // 2. Logic giao diện: Ít sách (1-4 cuốn) -> Căn giữa. Nhiều sách -> Căn trái.
    $align = ($count > 0 && $count <= 4) ? 'center' : 'flex-start';
    ?>

    <!-- 3. Ép kiểu CSS tự động dựa vào logic ở trên -->
    <div class="container" style="display: flex; flex-wrap: wrap; justify-content: <?php echo $align; ?>; gap: 20px;">
        <?php
        if ($tukhoa != '') {
            if ($count > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    echo "
                    <div class='book' onclick=\"showPopup('{$row['title']}', '{$row['author']}', '{$row['price']}', '{$row['description']}', '{$row['image']}')\">
                        <img src='../images/{$row['image']}'>
                        <h3>{$row['title']}</h3>
                        <p>{$row['author']}</p>
                        <p class='price'>".number_format($row['price'])."đ</p>
                    </div>";
                }
            } else {
                echo "<h3 style='width:100%; text-align:center;'>Rất tiếc, không tìm thấy cuốn sách nào! 😢</h3>";
            }
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
    let bookName, bookPrice, bookImage;

    function showPopup(name, author, price, desc, image){
        document.getElementById("popup").style.display="block";
        document.getElementById("pname").innerHTML=name;
        document.getElementById("pauthor").innerHTML=author;
        document.getElementById("pprice").innerHTML=price+"đ";
        document.getElementById("pdesc").innerHTML=desc;
        bookName = name;
        bookPrice = price;
        bookImage = image;
    }

    function closePopup(){ document.getElementById("popup").style.display="none"; }

    function addCart(){
        window.location="cart.php?name=" + encodeURIComponent(bookName) + "&price=" + bookPrice + "&image=" + encodeURIComponent(bookImage);
    }
</script>

</body>
</html>