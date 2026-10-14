<?php
session_start();
include "connect.php";

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin.php");
    exit();
}

// 1. LẤY THÔNG TIN CŨ CỦA CUỐN SÁCH
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $book = mysqli_fetch_assoc($result);
}

// 2. XỬ LÝ KHI BẤM NÚT "CẬP NHẬT"
if (isset($_POST['btn_update'])) {
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = trim($_POST['image']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $sql_update = "UPDATE books SET 
                    title = '$title', 
                    author = '$author', 
                    price = '$price', 
                    category = '$category', 
                    image = '$image', 
                    description = '$description' 
                   WHERE id = $id";

    if (mysqli_query($conn, $sql_update)) {
        echo "<script>alert('Cập nhật thành công!'); window.location.href='admin.php';</script>";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin sách</title>
    <style>
        body { font-family: Arial; background: #f0f2f5; padding: 40px; }
        .edit-container { max-width: 500px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h2 { color: #3B82F6; text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        .btn-update { background: #3B82F6; color: white; border: none; width: 100%; padding: 12px; border-radius: 5px; cursor: pointer; font-weight: bold; }
        .btn-cancel { display: block; text-align: center; margin-top: 10px; color: #666; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>

<div class="edit-container">
    <h2>📝 SỬA THÔNG TIN SÁCH</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $book['id']; ?>">

        <div class="form-group">
            <label>Tên sách</label>
            <input type="text" name="title" value="<?php echo $book['title']; ?>" required>
        </div>

        <div class="form-group">
            <label>Tác giả</label>
            <input type="text" name="author" value="<?php echo $book['author']; ?>" required>
        </div>

        <div class="form-group">
            <label>Giá tiền</label>
            <input type="number" name="price" value="<?php echo $book['price']; ?>" required>
        </div>

        <div class="form-group">
            <label>Danh mục</label>
            <select name="category">
                <option value="kinhte" <?php if($book['category']=='kinhte') echo 'selected'; ?>>Kinh Tế</option>
                <option value="vanhoc" <?php if($book['category']=='vanhoc') echo 'selected'; ?>>Văn Học</option>
                <option value="kynang" <?php if($book['category']=='kynang') echo 'selected'; ?>>Kỹ Năng</option>
                <option value="thieunhi" <?php if($book['category']=='thieunhi') echo 'selected'; ?>>Thiếu Nhi</option>
            </select>
        </div>

        <div class="form-group">
            <label>Tên file ảnh</label>
            <input type="text" name="image" value="<?php echo $book['image']; ?>" required>
        </div>

        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="description" rows="5"><?php echo $book['description']; ?></textarea>
        </div>

        <button type="submit" name="btn_update" class="btn-update">CẬP NHẬT THAY ĐỔI</button>
        <a href="admin.php" class="btn-cancel">Hủy bỏ</a>
    </form>
</div>

</body>
</html>