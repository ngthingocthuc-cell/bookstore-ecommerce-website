<?php
session_start();
include "connect.php";

// 1. XỬ LÝ ĐĂNG NHẬP ADMIN 
if (isset($_POST['btn_login_admin'])) {
    $user_admin = $_POST['user_admin'];
    $pass_admin = $_POST['pass_admin'];

    if ($user_admin === 'admin' && $pass_admin === '123') {
        $_SESSION['admin_logged_in'] = true;
    } else {
        $error_login = "Sai tài khoản hoặc mật khẩu quản trị!";
    }
}

// 2. XỬ LÝ ĐĂNG XUẤT ADMIN
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['admin_logged_in']);
    header("Location: admin.php");
    exit();
}

// 3. NẾU CHƯA ĐĂNG NHẬP ADMIN -> HIỆN FORM ĐĂNG NHẬP
if (!isset($_SESSION['admin_logged_in'])) {
    ?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Đăng nhập Quản trị</title>
        <style>
            body { font-family: Arial; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
            .login-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 300px; }
            h2 { text-align: center; color: #3B82F6; }
            input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
            button { width: 100%; padding: 10px; background: #3B82F6; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
            .error { color: red; font-size: 13px; text-align: center; }
        </style>
    </head>
    <body>
        <div class="login-box">
            <h2>ADMIN LOGIN</h2>
            <?php if(isset($error_login)) echo "<p class='error'>$error_login</p>"; ?>
            <form method="POST">
                <input type="text" name="user_admin" placeholder="Tên đăng nhập" required>
                <input type="password" name="pass_admin" placeholder="Mật khẩu" required>
                <button type="submit" name="btn_login_admin">ĐĂNG NHẬP</button>
            </form>
            <p style="text-align: center;"><a href="../index.php" style="font-size: 12px; color: #666; text-decoration: none;">Quay về trang chủ</a></p>
        </div>
    </body>
    </html>
    <?php
    exit(); 
}

// 4. XỬ LÝ THÊM SÁCH
if (isset($_POST['btn_add'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $price = $_POST['price'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = $_POST['category'];
    $image = trim($_POST['image']); 

    $sql_insert = "INSERT INTO books (title, author, price, description, image, category) 
                   VALUES ('$title', '$author', '$price', '$description', '$image', '$category')";
    
    if (mysqli_query($conn, $sql_insert)) {
        echo "<script>alert('Thêm sách thành công!'); window.location.href='admin.php';</script>";
    }
}

// 5. XỬ LÝ XÓA SÁCH
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM books WHERE id = $id";
    mysqli_query($conn, $sql_delete);
    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Trị Hệ Thống - BookMark</title>
    <link rel="stylesheet" href="../assets/css/font/fontawesome-free-5.15.4-web/css/all.min.css">
    <style>
        :root { --primary-color: #3B82F6; --text-color: #333; --bg-color: #f0f2f5; }
        body { font-family: 'Roboto', sans-serif; background: var(--bg-color); margin: 0; padding: 20px; color: var(--text-color); }
        .container { max-width: 1100px; margin: auto; }
        .admin-header { background: white; padding: 20px; border-radius: 10px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .admin-header h2 { margin: 0; color: var(--primary-color); display: flex; align-items: center; gap: 10px; }
        .btn-back { text-decoration: none; color: #666; font-size: 14px; border: 1px solid #ddd; padding: 8px 15px; border-radius: 5px; transition: 0.3s; }
        .admin-content { display: grid; grid-template-columns: 350px 1fr; gap: 20px; }
        .form-card, .table-card { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; font-size: 13px; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        .btn-submit { background: var(--primary-color); color: white; border: none; width: 100%; padding: 12px; border-radius: 6px; font-weight: bold; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th { background: #f8fafc; color: #64748b; padding: 12px; border-bottom: 2px solid #edf2f7; text-align: left; }
        td { padding: 12px; border-bottom: 1px solid #edf2f7; }
        .img-preview { width: 45px; height: 60px; object-fit: cover; border-radius: 4px; }
        .price-tag { font-weight: bold; color: #ef4444; }
        .btn-edit { color: #3B82F6; text-decoration: none; margin-right: 10px; }
        .btn-del { color: #ef4444; text-decoration: none; }
    </style>
</head>
<body>

<div class="container">
    <div class="admin-header">
        <h2><i class="fas fa-tasks"></i> QUẢN TRỊ BOOKMARK</h2>
        <div>
            <a href="admin.php?action=logout" class="btn-back" style="color: red; border-color: red;">Đăng xuất Admin</a>
            <a href="../index.php" class="btn-back"><i class="fas fa-home"></i> Về Trang Chủ</a>
        </div>
    </div>

    <div class="admin-content">
        <div class="form-card">
            <h3><i class="fas fa-plus-circle"></i> Thêm Sách Mới</h3>
            <form action="admin.php" method="POST">
                <div class="form-group"><label>Tên sách</label><input type="text" name="title" required></div>
                <div class="form-group"><label>Tác giả</label><input type="text" name="author" required></div>
                <div class="form-group" style="display: flex; gap: 10px;">
                    <div style="flex: 1;"><label>Giá tiền</label><input type="number" name="price" required></div>
                    <div style="flex: 1;"><label>Danh mục</label>
                        <select name="category">
                            <option value="kinhte">Kinh Tế</option>
                            <option value="kynang">Kỹ Năng</option>
                            <option value="thieunhi">Thiếu Nhi</option>
                            <option value="vanhoc">Văn Học</option>
                        </select>
                    </div>
                </div>
                <div class="form-group"><label>Tên file ảnh</label><input type="text" name="image" placeholder="Ví dụ: ../images/tensach.jpg" required></div>
                <div class="form-group"><label>Mô tả sách</label><textarea name="description" rows="4"></textarea></div>
                <button type="submit" name="btn_add" class="btn-submit">LƯU SẢN PHẨM</button>
            </form>
        </div>

        <div class="table-card">
            <?php
            $sql_select = "SELECT * FROM books ORDER BY id DESC";
            $result = mysqli_query($conn, $sql_select);
            $total_books = mysqli_num_rows($result);
            ?>
            <h3><i class="fas fa-list-ul"></i> Kho hàng (<?php echo $total_books; ?> cuốn)</h3>
            <table>
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Thông tin sách</th>
                        <th>Giá</th>
                        <th>Danh mục</th>
                        <th style="text-align: center;">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td><img src='../images/{$row['image']}' class='img-preview' onerror=\"this.src='../assets/css/img/no_image.png'\"></td>";
                        echo "<td>
                                <div style='font-weight: 600;'>{$row['title']}</div>
                                <div style='font-size: 12px; color: #94a3b8;'>ID: {$row['id']} | TG: {$row['author']}</div>
                              </td>";
                        echo "<td><span class='price-tag'>" . number_format($row['price'], 0, ',', '.') . "đ</span></td>";
                        echo "<td>{$row['category']}</td>";
                        echo "<td style='text-align: center;'>
                                <a href='edit_book.php?id={$row['id']}' class='btn-edit'><i class='fas fa-edit'></i> Sửa</a>
                                <a href='admin.php?delete_id={$row['id']}' class='btn-del' onclick=\"return confirm('Bạn có chắc xóa cuốn này không?');\"><i class='fas fa-trash-alt'></i> Xóa</a>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>