<?php
session_start();
include "./Webbansach_php/connect.php"; 

$sql = "SELECT * FROM books ORDER BY id DESC"; 
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMark</title>
    <link rel="shortcut icon" href="./assets/css/img/logo_book.png">

    <!--loại bỏ các thuộc tính css mặc định ban đầu-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <!--Link-->
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">

    <!--Roboto Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap">

    <link rel="stylesheet" href="./assets/css/font/fontawesome-free-5.15.4-web/css/all.min.css">
</head>



<body>
    <div class="app"> <!--Thẻ chứa toàn bộ web-->
        <header class="header"> <!--phan dau-->
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate">
                            Vào cửa hàng trên ứng dụng BookMark

                            <!--Header QR code-->
                            <div class="header_qr">
                                <img src="./assets/css/img/QR_code.png" alt="QR code" class="header_qr-img">
                                <div class="header_qr-apps">
                                    <a href="" class="header__qr-link">
                                        <img src="./assets/css/img/Google_play.png" alt="Googgle Play"
                                            class="header_qr-dowload">
                                    </a>
                                    <a href="" class="header__qr-link">
                                        <img src="./assets/css/img/App_store.png" alt="App Store"
                                            class="header_qr-dowload">
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="header__navbar-item">
                            <span class="header__navbar-title--no--pointer">Kết nối</span>
                            <a href="https://www.facebook.com/ShopeeVN?locale=vi_VN" target="_blank"
                                class="header__navbar-icon-link" title="Đến gian hàng Shopee">
                                <i class="header__navbar-icon fab fa-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/shopee_vn/" target="_blank"
                                class="header__navbar-icon-link" title="Đến gian hàng Shopee">
                                <i class="header__navbar-icon fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--has-notify">
                            <a href="" class="header__navbar-item-link">
                                <i class="header__navbar-icon far fa-bell"></i>
                                Thông báo
                            </a>

                            <div class="header__notify">
                                <header class="hedear__notify-header">
                                    <h3>Thông Báo Mới Nhận</h3>
                                </header>
                                <ul class="header__notify-list">
                                    <li class="header__notify-item header__notify-item--viewed">
                                        <a href="" class="header__notify-link">
                                            <img src="./images/HARRYPOTTER.jpg" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">HARRY POTTER</span>
                                                <span class="header__notify-descriotion">Kể về hành trình của phù thủy
                                                    trẻ Harry Potter cùng hai người bạn thân Ron Weasley và Hermione
                                                    Granger tại trường Hogwarts</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item header__notify-item--viewed">
                                        <a href="" class="header__notify-link">
                                            <img src="./images/KHONGGIADINH.webp" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">KHÔNG GIA ĐÌNH</span>
                                                <span class="header__notify-descriotion">Cuộc phiêu bạt mưu sinh đầy
                                                    gian khổ của cậu bé mồ côi Rémi khắp nước Pháp</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item">
                                        <a href="" class="header__notify-link">
                                            <img src="./images/NGHIGIAULAMGIAU.webp" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">NGHĨ GIÀU LÀM GIÀU</span>
                                                <span class="header__notify-descriotion">Tác phẩm kinh điển về phát
                                                    triển bản thân, đúc kết 13 nguyên tắc thành công dựa trên tư duy,
                                                    niềm tin và hành động kiên trì</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <footer class="header__notify-footer">
                                    <a href="" class="header__notify-footer-btn">Xem tất cả</a>
                                </footer>
                            </div>
                        </li>
                        <li class="header__navbar-item">
                            <a href="./Webbansach_php/lienhe.php" class="header__navbar-item-link">
                                <i class="header__navbar-icon far fa-question-circle"></i>
                                Trợ giúp
                            </a>
                        </li>
                        <li id="nav-register"
                            class="header__navbar-item header__navbar-item--strong header__navbar-item--separate">Đăng
                            ký</li>
                        <li id="nav-login" class="header__navbar-item header__navbar-item--strong ">Đăng nhập</li>

                        <li class="header__navbar-item header__navbar-user">
                            <img src="data:image/jpeg;base64,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"
                                alt="" class="header__navbar-user-img">
                            <span id="user-name" class="header__navbar-user-name">Ten</span>

                            <ul class="header__navbar-user-menu">
                                <li class="header__navbar-user-item">
                                    <a href="">Tài khoản của tôi</a>
                                </li>
                                <li class="header__navbar-user-item">
                                    <a href="">Đơn mua</a>
                                </li>
                                <li class="header__navbar-user-item header__navbar-user-item--separate">
                                    <a href="#" id="logout-link">Đăng xuất</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

                <!-- Header with search -->
                <div class="header-with-search">
                    <a href="index.php" class="header__logo" style="text-decoration: none;">
                        <img src="./assets/css/img/logo_book.png" alt="BookMark" class="header__logo-img">
                        <span class="header__logo-text" style="color: white;">BookMark</span>
                    </a>

                    <form id="search-form" action="./Webbansach_php/search.php" method="GET" class="header__search">
                        <div class="header__search-input-wrap">
                            <input type="text" name="tukhoa" class="header__search-input"
                                placeholder="Nhập để tìm kiếm sản phẩm" autocomplete="off" required>

                            <div class="header__search-history">
                                <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                                <ul id="search-history-list" class="header__search-history-list">
                                </ul>
                            </div>
                        </div>
                        <div class="header__search-select">
                            <span class="header__search-select-label">Trong Shop</span>
                            <i class="header__search-select-icon fas fa-angle-down"></i>
                        </div>
                        <button type="submit" class="header__search-btn">
                            <i class="header__search-btn-icon fas fa-search"></i>
                        </button>
                    </form>

                    <!--Cart Layout-->
                    <div class="header__cart">
                        <div class="header__cart-wrap">
                            <i class="header__cart-icon fas fa-shopping-cart"></i>
                            <span class="header__cart-notice" id="cart-badge-count">0</span>

                            <!--Cart list (filled dynamically by JS)-->
                            <div class="header__cart-list" id="header-cart-list">
                                <div class="header__cart-list--no-cart" id="header-cart-no-cart">
                                    <img src="./assets/css/img/no_cart.png" alt="" class="header__cart-no-cart-img">
                                    <span class="header__cart-list-no-cart-msg">
                                        Hãy thêm mặt hàng vào giỏ hàng
                                    </span>
                                </div>

                                <div class="header__cart-has-cart" id="header-cart-has-cart" style="display:none;">
                                    <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                                    <ul class="header__cart-list-item" id="header-cart-items">
                                        <!-- Cart items injected by JS -->
                                    </ul>
                                    <a href="cart.php" class="header__cart-view-cart btn btn--primary">Xem giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header> <!--phan dau-->



        <div class="container"> <!--phan than-->
            <div class="grid content">
                <div class="grid__row">
                    <div class="grid__column-2">
                        <nav class="category">
                            <h3 class="category__heading">
                                <i class="fas fa-list category__heading-icon"></i>
                                Danh mục
                            </h3>

                            <ul class="category-list">
                                <li class="category-item">
                                    <a href="./Webbansach_php/kinhte.php" class="category-item__link">Sách kinh tế</a>
                                </li>
                                <li class="category-item ">
                                    <a href="./Webbansach_php/kynang.php" class="category-item__link">Sách kỹ năng</a>
                                </li>
                                <li class="category-item">
                                    <a href="./Webbansach_php/thieunhi.php" class="category-item__link">Sách thiếu
                                        nhi</a>
                                </li>
                                <li class="category-item">
                                    <a href="./Webbansach_php/vanhoc.php" class="category-item__link">Sách văn học</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="grid__column-10">
                        <div class="home-filter">
                            <span class="home-filter__label">Sắp xếp theo</span>
                            <button class="home-filter__btn btn">Phổ Biến</button>
                            <button class="home-filter__btn btn btn--primary">Mới Nhất</button>
                            <button class="home-filter__btn btn">Bán Chạy</button>

                            <div class="select-input">
                                <span class="select-input__label" id="current-price-sort">Giá</span>
                                <i class="select-input__icon fas fa-angle-down"></i>

                                <!-- List options-->
                                <ul class="select-input__list">
                                    <li class="select-input__item">
                                        <a href="#" id="sort-asc" class="select-input__link">Từ thấp đến cao</a>
                                    </li>
                                    <li class="select-input__item">
                                        <a href="#" id="sort-desc" class="select-input__link">Từ cao đến thấp</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="home-filter__page">
                                <span class="home-filter__page-num">
                                    <span class="home-filter__page-current">1</span>/1
                                </span>

                                <div class="home-filter__page-control">
                                    <a href="" class="home-filter__page-btn home-filter__page-btn--disabled">
                                        <i class="home-filter__page-icon fas fa-angle-left"></i>
                                    </a>
                                    <a href="" class="home-filter__page-btn">
                                        <i class="home-filter__page-icon fas fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="home-product">
                            <div class="grid__row">
                                <!-- Product item -->
                                <div class="grid__row" id="product-list-container">
                            <?php
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Làm sạch dữ liệu để dấu nháy không làm vỡ HTML
                                    $name = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
                                    $author = htmlspecialchars($row['author'], ENT_QUOTES, 'UTF-8');
                                    $desc = htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8');
                                    $img_safe = htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8');
                                    
                                    $price_current = $row['price'];
                                    $price_old = $price_current + ($price_current * 0.15); 
                                    $sale_percent = 15;
                                    $sold_qty = rand(100, 5000); 
                                    $image = "images/" . $row['image'];
                                    $id = $row['id'];

                                    echo "
                                    <div class='grid__column-2-4' data-price='{$price_current}' data-id='{$id}' data-sold='{$sold_qty}'>
                                        <div class='home-product-item' data-name=\"{$name}\" data-price=\"{$price_current}\" data-img=\"{$img_safe}\" data-author=\"{$author}\" data-desc=\"{$desc}\">
                                            <div class='home-product-item__img' style='background-image: url({$image});'></div>
                                            <h4 class='home-product-item__name'>{$name}</h4>
                                            <div class='home-product-item__price'>
                                                <span class='home-product-item__price-old'>" . number_format($price_old, 0, ',', '.') . "đ</span>
                                                <span class='home-product-item__price-current'>" . number_format($price_current, 0, ',', '.') . "đ</span>
                                            </div>

                                            <div class='home-product-item__action'>
                                                <span class='home-product-item__like'>
                                                    <i class='home-product-item__like-icon-empty far fa-heart'></i>
                                                    <i class='home-product-item__like-icon-fill fas fa-heart'></i>
                                                </span>
                                                <div class='home-product-item__rating'>
                                                    <i class='home-product-item__star--gold fas fa-star'></i>
                                                    <i class='home-product-item__star--gold fas fa-star'></i>
                                                    <i class='home-product-item__star--gold fas fa-star'></i>
                                                    <i class='home-product-item__star--gold fas fa-star'></i>
                                                    <i class='home-product-item__star--gold fas fa-star'></i>
                                                </div>
                                                <span class='home-product-item__sol'>Đã bán {$sold_qty}</span>
                                            </div>

                                            <div class='home-product-item__origin'>
                                                <span class='home-product-item__origin-name'>Việt Nam</span>
                                            </div>
                                            <div class='home-product-item__favourite'>
                                                <i class='fas fa-check'></i>
                                                <span>yêu thích</span>
                                            </div>
                                            <div class='home-product-item__sale-off'>
                                                <span class='home-product-item__sale-off-percent'>{$sale_percent}%</span>
                                                <span class='home-product-item__sale-off-label'>Giảm</span>
                                            </div>
                                        </div>
                                    </div>";
                                }
                            } else {
                                echo "<p style='padding: 20px; font-size: 1.4rem;'>Chưa có sản phẩm nào.</p>";
                            }
                            ?>
                        </div>

                                      




                            </div>
                        </div>

                        <ul class="pagination home-product__pagination">
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    <i class="pagination-item__icon fas fa-angle-left"></i>
                                </a>
                            </li>
                            <li class="pagination-item pagination-item--active">
                                <a href="" class="pagination-item__link ">1</a>
                            </li>
                            
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    <i class="pagination-item__icon fas fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div> <!--phan than-->



        <footer class="footer"> <!--phan cuoi-->
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">DỊCH VỤ KHÁCH HÀNG</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="./Webbansach_php/lienhe.php" class="footer-item__link">Trung Tâm Hỗ Trợ
                                    Giúp</a>
                            </li>
                            <li class="footer-item">
                                <a href="./Webbansach_php/lienhe.php" class="footer-item__link">BookMark Mall</a>
                            </li>
                            <li class="footer-item">
                                <a href="./Webbansach_php/lienhe.php" class="footer-item__link">Hướng dẫn mua hàng</a>
                            </li>
                            <li class="footer-item">
                                <a href="./Webbansach_php/lienhe.php" class="footer-item__link">Liên Hệ Book Mark</a>
                            </li>
                        </ul>
                    </div>

                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">VỀ BOOKMARK</h3>
                        <ul class="footer-list">
                            <!-- Sửa thẻ a thành onclick hiển thị thông báo -->
                            <li class="footer-item">
                                <a href="#" onclick="alert('🌟 Chào mừng đến với BookMark!\n\nChúng tôi là hệ thống nhà sách trực tuyến hàng đầu, chuyên cung cấp các đầu sách đa dạng từ kinh tế, kỹ năng sống đến văn học, thiếu nhi.\nSứ mệnh của chúng tôi là lan tỏa văn hóa đọc đến mọi nhà. 📚'); return false;" class="footer-item__link">Giới Thiệu</a>
                            </li>
                            <li class="footer-item">
                                <a href="#" onclick="alert('📢 THÔNG BÁO TUYỂN DỤNG\n\nBookMark đang tìm kiếm đồng đội ở các vị trí:\n- Nhân viên Chăm sóc Khách hàng (Online)\n- Thực tập sinh Content Marketing\n\nỨng tuyển ngay qua email: tuyendung@bookmark.com 💼'); return false;" class="footer-item__link">Tuyển Dụng</a>
                            </li>
                            <li class="footer-item">
                                <a href="#" onclick="alert('⚖️ ĐIỀU KHOẢN SỬ DỤNG\n\n1. Mọi thông tin khách hàng đều được bảo mật tuyệt đối.\n2. Hỗ trợ đổi trả trong vòng 7 ngày nếu lỗi do nhà sản xuất.\n3. Giao hàng toàn quốc từ 3-5 ngày làm việc.\n\nCảm ơn bạn đã tin tưởng BookMark! ❤️'); return false;" class="footer-item__link">Điều Khoản Sử Dụng</a>
                            </li>
                            <li class="footer-item">
                                <a href="#" onclick="alert('🤝 CHƯƠNG TRÌNH TIẾP THỊ LIÊN KẾT (AFFILIATE)\n\nCùng BookMark lan tỏa tri thức và nhận hoa hồng lên đến 15% cho mỗi đơn hàng thành công.\nLiên hệ hotline: 1900 8888 để biết thêm chi tiết!'); return false;" class="footer-item__link">Tiếp Thị Liên Kết</a>
                            </li>
                        </ul>
                    </div>

                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">DANH MỤC</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="./Webbansach_php/kinhte.php" class="footer-item__link">Sách Kinh Tế</a>
                            </li>
                            <li class="footer-item">
                                <a href="./Webbansach_php/kynang.php" class="footer-item__link">Sách Kỹ Năng</a>
                            </li>
                            <li class="footer-item">
                                <a href="./Webbansach_php/thieunhi.php" class="footer-item__link">Sách Thiếu Nhi</a>
                            </li>
                            <li class="footer-item">
                                <a href="./Webbansach_php/vanhoc.php" class="footer-item__link">Sách Văn Học</a>
                            </li>
                        </ul>
                    </div>

                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">THEO DÕI BOOKMARK</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="https://www.facebook.com/ShopeeVN?locale=vi_VN" target="_blank" class="footer-item__link">
                                    <i class="footer-item__icon fab fa-facebook"></i>
                                    Facebook
                                </a>
                            </li>
                            <li class="footer-item">
                                <a href="https://www.instagram.com/shopee_vn/" target="_blank" class="footer-item__link">
                                    <i class="footer-item__icon fab fa-instagram"></i>
                                    Instagram
                                </a>
                            </li>
                            <li class="footer-item">
                                <a href="https://www.tiktok.com/@shopee_vn" target="_blank" class="footer-item__link">
                                    <i class="footer-item__icon fab fa-tiktok"></i>
                                    TikTok
                                </a>
                            </li>
                        </ul>
                    </div>


                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">TẢI ỨNG DỤNG BOOKMARK</h3>
                        <div class="footer__dowload">
                            <img src="./assets/css/img/QR_code.png" alt="Download QR" class="footer__dowload-pr">
                            <div class="footer__dowload-apps">
                                <a href="" class="footer__dowload-app-link">
                                    <img src="./assets/css/img/Google_play.png" alt="Google Play"
                                        class="footer__dowload-app-img">
                                </a>
                                <a href="" class="footer__dowload-app-link">
                                    <img src="./assets/css/img/app_store.png" alt="App Store"
                                        class="footer__dowload-app-img">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <div class="footer__bottom">
                <div class="grid">
                    <p class="footer__text">
                        © 2026 BookMark. Hệ thống bán sách trực tuyến. 
                        <span style="margin: 0 10px;">|</span> 
                        <a href="./Webbansach_php/admin.php" style="color: #ee4d2d; font-weight: bold; font-size: 1.3rem; text-decoration: none;">
                            <i class="fas fa-user-shield"></i> Quản trị hệ thống
                        </a>
                    </p>
                </div>
            </div>
        </footer><!--phan cuoi-->

    </div> <!--Thẻ chứa toàn bộ web-->



    <!--From đăng nhập và đăng ký -->

    <div class="modal" style="display: none;">
        <div class="modal__overlay"></div>

        <div class="modal__body">

            <div id="register-form" class="auth-form">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng ký</h3>
                        <span class="auth-form__switch-btn">Đăng nhập</span>
                    </div>

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input id="register-email" type="text" class="auth-form__input" placeholder="Email của bạn">
                        </div>
                        <div class="auth-form__group">
                            <input id="register-password" type="password" class="auth-form__input"
                                placeholder="Mật khẩu">
                        </div>
                        <div class="auth-form__group">
                            <input id="register-password2" type="password" class="auth-form__input"
                                placeholder="Nhập lại mật khẩu">
                        </div>

                        <div class="auth-form__group" style="display: flex; align-items: center; justify-content: space-between; margin-top: 15px;">
                            <div id="captcha-display" style="background: #e0e0e0; padding: 10px; font-weight: bold; font-size: 18px; letter-spacing: 5px; text-decoration: line-through; color: #555; width: 120px; text-align: center; border-radius: 3px; user-select: none;">
                            </div>
                            <i id="refresh-captcha" class="fas fa-sync-alt" style="margin: 0 10px; cursor: pointer; color: #f53e2d; font-size: 1.2rem;" title="Đổi mã khác"></i>
                            <input id="register-captcha" type="text" class="auth-form__input" placeholder="Nhập mã bên trái" style="flex: 1; margin-top: 0;">
                        </div>
                    </div>

                    <div class="auth-form__aside">
                        <p class="auth-form__policy-text">
                            Bằng việc đăng ký, Bạn đã đồng ý với BookMark về
                            <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> &
                            <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                        </p>
                    </div>

                    <div class="auth-form__controls">
                        <button class="btn btn--nomal auth-form__controls-back">TRỞ LẠI</button>
                        <button id="btn-register" class="btn btn--primary">ĐĂNG KÝ</button>
                    </div>
                </div>

                <div class="auth-form__socials">
                    <a href="https://www.facebook.com/ShopeeVN?locale=vi_VN" target="_blank" class="auth-form__socials--facebook btn btn--size-s btn--with-icon">
                        <i class="auth-form__socials-icon fab fa-facebook-square"></i>
                        <span class="auth-form__socials-title">
                            Kết nối với Facebook
                        </span>
                    </a>
                    <a href="https://shopee.vn/" target="_blank" class="auth-form__socials--google btn btn--size-s btn--with-icon">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg"
                            class="auth-form__socials-icon">
                        <span class="auth-form__socials-title">
                            Kết nối với Google
                        </span>
                    </a>

                </div>
            </div>


            <div id="login-form" class="auth-form" style="display: none;">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng Nhập</h3>
                        <span class="auth-form__switch-btn">Đăng ký</span>
                    </div>

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input id="login-email" type="text" class="auth-form__input" placeholder="Email của bạn">
                        </div>
                        <div class="auth-form__group">
                            <input id="login-password" type="password" class="auth-form__input" placeholder="Mật khẩu">
                        </div>
                    </div>

                    <div class="auth-form__aside">
                        <div class="auth-form__help">
                            <a href="" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                            <span class="auth-form__help-separate"></span>
                            <a href="" class="auth-form__help-link">Cần trợ giúp?</a>
                        </div>
                    </div>

                    <div class="auth-form__controls">
                        <button class="btn btn--nomal auth-form__controls-back">TRỞ LẠI</button>
                        <button id="btn-login" class="btn btn--primary">ĐĂNG NHẬP</button>
                    </div>
                </div>

                <div class="auth-form__socials">
                    <a href="https://www.facebook.com/ShopeeVN?locale=vi_VN" target="_blank" class="auth-form__socials--facebook btn btn--size-s btn--with-icon">
                        <i class="auth-form__socials-icon fab fa-facebook-square"></i>
                        <span class="auth-form__socials-title">
                            Kết nối với Facebook
                        </span>
                    </a>
                    <a href="https://shopee.vn/" target="_blank" class="auth-form__socials--google btn btn--size-s btn--with-icon">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg"
                            class="auth-form__socials-icon">
                        <span class="auth-form__socials-title">
                            Kết nối với Google
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--From đăng nhập và đăng ký -->




    <script>
        console.log("[debug] auth script loaded");
        const modal = document.querySelector(".modal");
        const modalOverlay = document.querySelector(".modal__overlay");
        const registerForm = document.getElementById("register-form");
        const loginForm = document.getElementById("login-form");
        const navLogin = document.getElementById("nav-login");
        const navRegister = document.getElementById("nav-register");
        const userMenu = document.querySelector(".header__navbar-user");
        const userNameEl = document.getElementById("user-name");
        const logoutLink = document.getElementById("logout-link");
        const switchBtns = document.querySelectorAll(".auth-form__switch-btn");
        const backBtns = document.querySelectorAll(".auth-form__controls-back");
        const btnRegister = document.getElementById("btn-register");
        const btnLogin = document.getElementById("btn-login");

        function getStoredUser() {
            const raw = localStorage.getItem("currentUser");
            return raw ? JSON.parse(raw) : null;
        }
        function setLoggedIn(user) {
            if (!user) return;
            sessionStorage.setItem("isLoggedIn", "true");
            if (userNameEl) userNameEl.innerText = user.email;
            if (userMenu) userMenu.style.display = "flex";
            if (navLogin) navLogin.style.display = "none";
            if (navRegister) navRegister.style.display = "none";
        }

        function setLoggedOut() {
            sessionStorage.removeItem("isLoggedIn");
            if (userNameEl) userNameEl.innerText = "Ten";
            if (userMenu) userMenu.style.display = "none";
            if (navLogin) navLogin.style.display = "block";
            if (navRegister) navRegister.style.display = "block";
        }

        function openAuthModal(mode = "login") {
            if (!modal) return;
            modal.style.display = "flex";

            if (registerForm) registerForm.style.display = mode === "register" ? "block" : "none";
            if (loginForm) loginForm.style.display = mode === "login" ? "block" : "none";
        }

        function closeAuthModal() {
            if (!modal) return;
            modal.style.display = "none";
        }

        const storedUser = getStoredUser();
        const isLoggedIn = sessionStorage.getItem("isLoggedIn");

        if (storedUser && isLoggedIn === "true") {
            setLoggedIn(storedUser);
        } else {
            setLoggedOut();
        }

        if (navLogin) {
            navLogin.addEventListener("click", function (event) {
                event.preventDefault();
                openAuthModal("login");
            });
        }

        if (navRegister) {
            navRegister.addEventListener("click", function (event) {
                event.preventDefault();
                openAuthModal("register");
            });
        }

        switchBtns.forEach((btn) => {
            btn.addEventListener("click", function (event) {
                event.preventDefault();
                const isRegisterVisible = registerForm && registerForm.style.display !== "none";
                openAuthModal(isRegisterVisible ? "login" : "register");
            });
        });

        if (modalOverlay) {
            modalOverlay.addEventListener("click", closeAuthModal);
        }

        backBtns.forEach((btn) => {
            btn.addEventListener("click", function (event) {
                event.preventDefault();
                closeAuthModal();
            });
        });

        // 1. HÀM TẠO CAPTCHA NGẪU NHIÊN (Chèn ngay phía trên nút đăng ký)
        let currentCaptcha = "";
        function generateCaptcha() {
            const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            currentCaptcha = "";
            for (let i = 0; i < 5; i++) { // Tạo mã 5 ký tự
                currentCaptcha += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            const captchaDisplay = document.getElementById("captcha-display");
            if (captchaDisplay) captchaDisplay.innerText = currentCaptcha;
        }

        // Bấm nút xoay xoay để đổi mã mới
        const refreshBtn = document.getElementById("refresh-captcha");
        if(refreshBtn) {
            refreshBtn.addEventListener("click", generateCaptcha);
        }

        // Tự động tạo mã lần đầu khi mở form
        generateCaptcha();


        // 2. KHÚC XỬ LÝ NÚT BẤM ĐĂNG KÝ MỚI
        if (btnRegister) {
            btnRegister.addEventListener("click", function (event) {
                event.preventDefault();
                console.log("[debug] register click");

                const email = document.getElementById("register-email").value.trim();
                const password = document.getElementById("register-password").value.trim();
                const password2 = document.getElementById("register-password2").value.trim();
                
                const userCaptcha = document.getElementById("register-captcha").value.trim();

                if (!email || !password) {
                    alert("Vui lòng nhập email và mật khẩu.");
                    return;
                }

                if (!email.endsWith("@gmail.com")) {
                    alert("Vui lòng nhập đúng định dạng email (phải có @gmail.com)!");
                    return;
                }

                if (password !== password2) {
                    alert("Mật khẩu không khớp.");
                    return;
                }

                if (userCaptcha !== currentCaptcha) {
                    alert("Mã xác nhận không đúng. Vui lòng thử lại!");
                    generateCaptcha();
                    return;
                }

                const users = JSON.parse(localStorage.getItem("users")) || [];

                const exists = users.find(u => u.email === email);
                if (exists) {
                    alert("Email này đã được đăng ký. Vui lòng đăng nhập!");
                    openAuthModal("login");
                    return;
                }

                const user = { email, password };
                users.push(user);

                try {
                    localStorage.setItem("users", JSON.stringify(users));
                    localStorage.setItem("currentUser", JSON.stringify(user)); 
                } catch (err) {
                    alert("Lưu tài khoản thất bại: " + err.message);
                    console.error(err);
                    return;
                }

                alert("Đăng ký thành công!");

                setLoggedIn(user);
                closeAuthModal();
            });
        }

       

        if (btnLogin) {
            btnLogin.addEventListener("click", function (event) {
                event.preventDefault();

                const email = document.getElementById("login-email").value.trim();
                const password = document.getElementById("login-password").value.trim();

                const users = JSON.parse(localStorage.getItem("users")) || [];

                const user = users.find(u => u.email === email && u.password === password);

                if (!user) {
                    alert("Sai tài khoản hoặc mật khẩu.");
                    return;
                }

                localStorage.setItem("currentUser", JSON.stringify(user));

                alert("Đăng nhập thành công!");
                setLoggedIn(user);
                closeAuthModal();
            });
        }

        if (logoutLink) {
            logoutLink.addEventListener("click", function (event) {
                event.preventDefault();
                
                fetch('Webbansach_php/logout_cart.php')
                .then(response => {
                    setLoggedOut();
                    window.location.reload(); 
                })
                .catch(err => console.error("Lỗi xóa giỏ hàng:", err));
            });
        }

        function initLikeButtons() {
            const likeButtons = document.querySelectorAll('.home-product-item__like');

            likeButtons.forEach((btn) => {
                const emptyIcon = btn.querySelector('.home-product-item__like-icon-empty');
                const fillIcon = btn.querySelector('.home-product-item__like-icon-fill');

                if (!emptyIcon || !fillIcon) return;

                const productItem = btn.closest('.home-product-item');
                const productId = productItem.querySelector('.home-product-item__name').innerText.trim();

                btn.classList.remove('home-product-item__like--liked');
                emptyIcon.style.display = 'inline-block';
                fillIcon.style.display = 'none';

                const saved = localStorage.getItem("liked_" + productId);
                if (saved === "true") {
                    btn.classList.add('home-product-item__like--liked');
                    emptyIcon.style.display = 'none';
                    fillIcon.style.display = 'inline-block';
                }

                btn.addEventListener('click', function (event) {
                    event.stopPropagation();

                    const liked = btn.classList.toggle('home-product-item__like--liked');

                    emptyIcon.style.display = liked ? 'none' : 'inline-block';
                    fillIcon.style.display = liked ? 'inline-block' : 'none';

                    localStorage.setItem("liked_" + productId, liked ? "true" : "false");
                });
            });
        }
        initLikeButtons();

        async function refreshHeaderCart() {
            const isLoggedIn = sessionStorage.getItem("isLoggedIn");

            // Nếu chưa đăng nhập → giỏ hàng = 0
            if (isLoggedIn !== "true") {
                const notice = document.querySelector('.header__cart-notice');
                const noCart = document.getElementById('header-cart-no-cart');
                const hasCart = document.getElementById('header-cart-has-cart');
                const itemsEl = document.getElementById('header-cart-items');

                if (notice) notice.textContent = 0;
                if (noCart) noCart.style.display = '';
                if (hasCart) hasCart.style.display = 'none';
                if (itemsEl) itemsEl.innerHTML = '';

                return;
            }
            const headerCartWrap = document.querySelector('.header__cart-wrap');

            try {
                const res = await fetch('Webbansach_php/cart_data.php');
                if (!res.ok) throw new Error('Network response was not ok');
                const data = await res.json();

                const notice = document.querySelector('.header__cart-notice');
                const noCart = document.getElementById('header-cart-no-cart');
                const hasCart = document.getElementById('header-cart-has-cart');
                const itemsEl = document.getElementById('header-cart-items');

                if (!notice || !noCart || !hasCart || !itemsEl) return;

                notice.textContent = data.count || 0;

                const isEmpty = !data.count;
                if (headerCartWrap) {
                    headerCartWrap.classList.toggle('header__cart-wrap--empty', isEmpty);
                }

                if (isEmpty) {
                    noCart.style.display = '';
                    hasCart.style.display = 'none';
                    itemsEl.innerHTML = '';
                    return;
                }

                noCart.style.display = 'none';
                hasCart.style.display = '';
                itemsEl.innerHTML = '';

                data.items.forEach((item, index) => {
                    const li = document.createElement('li');
                    li.className = 'header__cart-item';

                    li.innerHTML = `
                        <img src="./images/${item.image}" alt="" class="header__cart-img" style="width: 42px; height: 42px; object-fit: contain; margin-right: 12px;">
                        <div class="header__cart-list-item-info" style="flex: 1; width: 100%;">
                            <div class="header__cart-item-head" style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h5 class="header__cart-item-name" style="flex: 1; text-align: left; margin: 0; font-size: 1.4rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; padding-right: 16px;">${item.name}</h5>
                                
                                <div class="header__cart-item-price-wrap" style="display: flex; align-items: center;">
                                    <span class="header__cart-item-price" style="color: #3B82F6; font-size: 1.4rem;">${formatCurrency(item.price)}</span>
                                    <span class="header__cart-item-multiply" style="margin: 0 4px; color: #757575; font-size: 0.9rem;">x</span>
                                    <span class="header__cart-item-quantity" style="color: #757575; font-size: 1.2rem;">${item.qty}</span>
                                    <span class="header__cart-item-remove" onclick="removeCartItem(${index})" style="margin-left: 15px; cursor: pointer;">Xóa</span>
                                </div>
                            </div>
                        </div>
                    `;

                    itemsEl.appendChild(li);
                });

                const viewCartBtn = document.querySelector('.header__cart-view-cart');
                if (viewCartBtn) {
                    viewCartBtn.href = 'Webbansach_php/cart.php';
                }

            } catch (err) {
                console.warn('Không thể tải giỏ hàng', err);
            }
        }

        function formatCurrency(value) {
            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
        }

        refreshHeaderCart();
        async function removeCartItem(index) {
            try {
                await fetch(`Webbansach_php/cart.php?remove=${index}`);

                refreshHeaderCart();
            } catch (err) {
                console.warn('Lỗi khi xóa sản phẩm:', err);
            }
        }

        const headerCartWrap = document.querySelector('.header__cart-wrap');
        if (headerCartWrap) {
            headerCartWrap.addEventListener('click', function (event) {
                if (event.target.closest('.header__cart-item-remove')) return;

                window.location.href = 'Webbansach_php/cart.php';
            });
        }

        window.addEventListener("focus", function () {
            refreshHeaderCart();
        });

        window.addEventListener("pageshow", function () {
            refreshHeaderCart();
        });
    </script>

    <div class="popup" id="product-popup">
        <div class="popup-content">
            <h2 id="pp-name"></h2>

            <p><b>Tác giả:</b> <span id="pp-author"></span></p>
            <p><b>Giá:</b> <span id="pp-price"></span></p>
            <p id="pp-desc"></p>

            <button id="pp-add" class="btn btn--primary" style="margin-right:12px;">Thêm vào giỏ</button>
            <button id="pp-close" class="btn btn--normal">Đóng</button>
        </div>
    </div>

    <script>
        let _pp_name = '';
        let _pp_price = '';
        let _pp_image = '';

        const bookDetails = {
            "HARRY POTTER": {
                author: "J.K. Rowling",
                desc: "Phù thủy nhỏ tuổi nổi tiếng."
            },
            "KHÔNG GIA ĐÌNH": {
                author: "Hector Malot",
                desc: "Câu chuyện cảm động về cậu bé mồ côi và hành trình tìm gia đình."
            },
            "HOÀNG TỬ BÉ": {
                author: "Antoine de Saint-Exupéry",
                desc: "Truyện cổ tích triết lý về tình bạn và sự trưởng thành."
            },
            "NGHĨ GIÀU LÀM GIÀU": {
                author: "Napoleon Hill",
                desc: "Cuốn sách kinh điển về tư duy giàu có và thành công."
            },
            "DÁM NGHĨ LỚN": {
                author: "David J. Schwartz",
                desc: "Khám phá tư duy giúp bạn đạt được mục tiêu lớn."
            },
            "CHA GIÀU CHA NGHÈO": {
                author: "Robert Kiyosaki",
                desc: "Bài học tài chính cá nhân."
            },
            "Mindset": {
                author: "Carol Dweck",
                desc: "Tư duy phát triển."
            },
            "NHÀ GIẢ KIM": {
                author: "Paulo Coelho",
                desc: "Hành trình tìm kiếm ý nghĩa cuộc sống và bản thân."
            },
            "DOREMON": {
                author: "Fujiko F. Fujio",
                desc: "Những chuyến phiêu lưu kỳ thú của chú mèo máy Doraemon."
            },
            "NHẬT KÝ TRONG TÙ": {
                author: "Hồ Chí Minh",
                desc: "Tập thơ viết trong tù."
            },
            "VỢ NHẶT": {
                author: "Kim Lân",
                desc: "Tác phẩm về nạn đói 1945."
            },
            "HAI ĐỨA TRẺ": {
                author: "Thạch Lam",
                desc: "Truyện ngắn cảm xúc."
            },
            "SỨC MẠNH TIỀM THỨC": {
                author: "Joseph Murphy",
                desc: "Khai phá nội lực."
            },
            "QUẲNG GÁNH LO ĐI": {
                author: "Dale Carnegie",
                desc: "Sống tích cực."
            },
            "DẠY CON LÀM GIÀU": {
                author: "Robert Kiyosaki",
                desc: "Giáo dục tài chính cho con."
            },
            "QUỐC GIA KHỞI NGHIỆP": {
                author: "Dan Senor",
                desc: "Câu chuyện khởi nghiệp Israel."
            },
            "ATOMIC HABITS": {
                author: "James Clear",
                desc: "Cách tạo thói quen tốt và bỏ thói quen xấu hiệu quả."
            },
            "THAY ĐỔI TÍ HON HIỆU QUẢ BẤT NGỜ": {
                author: "James Clear",
                desc: "Cách tạo thói quen tốt và bỏ thói quen xấu hiệu quả."
            },
            "THÁM TỬ LỪNG DANH CONAN": {
                author: "Gosho Aoyama",
                desc: "Bộ truyện trinh thám hấp dẫn."
            },
            "KÍNH VẠN HOA": {
                author: "Nguyễn Nhật Ánh",
                desc: "Tuổi thơ hồn nhiên, vui nhộn và đầy cảm xúc."
            },
            "TỶ PHÚ BÁN GIÀY": {
                author: "Tony Hsieh",
                desc: "Câu chuyện kinh doanh Zappos và văn hoá phục vụ khách hàng."
            }
        };

        function showProductPopup(name, author, price, desc, image) {
            _pp_name = name;
            _pp_price = price;
            _pp_image = image;

            document.getElementById('pp-name').innerText = name;
            document.getElementById('pp-author').innerText = author;
            document.getElementById('pp-price').innerText = price + 'đ';
            document.getElementById('pp-desc').innerText = desc;

            const popup = document.getElementById('product-popup');
            if (popup) popup.classList.add('show');
        }

        function closeProductPopup() {
            const popup = document.getElementById('product-popup');
            if (popup) popup.classList.remove('show');
        }

        async function addToCartFromPopup() {

            const isLoggedIn = sessionStorage.getItem("isLoggedIn");
            const user = getStoredUser();

            // ❌ Chưa đăng nhập
            if (!user || isLoggedIn !== "true") {
                alert("Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!");
                openAuthModal("login");
                return;
            }

            const priceToSend = _pp_price.replace(/\./g, '');

            const url = `Webbansach_php/cart.php?name=${encodeURIComponent(_pp_name)}&price=${encodeURIComponent(priceToSend)}&image=${encodeURIComponent(_pp_image)}`;

            try {
                await fetch(url);
                refreshHeaderCart();
                closeProductPopup();
            } catch (err) {
                console.warn('Lỗi khi thêm sản phẩm:', err);
            }
        }

       
        function initIndexProductPopup() {
            const productContainer = document.getElementById('product-list-container');
            if(!productContainer) return;

            // Gắn sự kiện click vào khung chứa lớn thay vì từng cuốn sách nhỏ
            productContainer.addEventListener('click', function(event) {
                // Kiểm tra xem khách có bấm đúng vào 1 cuốn sách không
                const item = event.target.closest('.home-product-item');
                
                if (item) {
                    // Nếu khách bấm vào nút Thả tim thì bỏ qua, không mở Popup
                    if (event.target.closest('.home-product-item__like')) return;

                    const name = item.getAttribute('data-name');
                    const price = item.getAttribute('data-price');
                    const author = item.getAttribute('data-author');
                    const desc = item.getAttribute('data-desc');
                    const image = item.getAttribute('data-img');

                    showProductPopup(
                        name,
                        author,
                        new Intl.NumberFormat('vi-VN').format(price),
                        desc,
                        image
                    );
                }
            });

            const ppClose = document.getElementById('pp-close');
            const ppAdd = document.getElementById('pp-add');
            if (ppClose) ppClose.addEventListener('click', closeProductPopup);
            if (ppAdd) ppAdd.addEventListener('click', addToCartFromPopup);
        }

        initIndexProductPopup();
    </script>

     

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchForm = document.getElementById("search-form");
            const searchInput = document.querySelector(".header__search-input");
            const historyList = document.getElementById("search-history-list");

            // 1. Hàm in lịch sử ra màn hình
            function loadSearchHistory() {
                if (!historyList) return;

                let history = JSON.parse(localStorage.getItem("searchHistory")) || [];
                historyList.innerHTML = "";

                if (history.length === 0) {
                    historyList.innerHTML = '<li class="header__search-history-item"><a href="#" style="color: #999; cursor: default; pointer-events: none;">Chưa có lịch sử tìm kiếm</a></li>';
                    return;
                }

                history.forEach(keyword => {
                    const li = document.createElement("li");
                    li.className = "header__search-history-item";

                    // Thêm style display flex để chữ nằm bên trái, nút X nằm bên phải
                    li.style.display = "flex";
                    li.style.justifyContent = "space-between";
                    li.style.alignItems = "center";

                    // Chèn link từ khóa và một thẻ span làm nút X
                    li.innerHTML = `
                        <a href="./Webbansach_php/search.php?tukhoa=${encodeURIComponent(keyword)}" style="flex: 1;">${keyword}</a>
                        <span class="delete-history-btn" data-keyword="${keyword}" title="Xóa từ khóa này" style="cursor: pointer; padding: 0 16px; color: #ccc; font-weight: bold;">✕</span>
                    `;
                    historyList.appendChild(li);
                });
            }

            // 2. Chạy hàm in lịch sử lúc mới vào web
            loadSearchHistory();

            // 3. Sự kiện: Khi khách gõ tìm kiếm -> Lưu từ khóa
            if (searchForm && searchInput) {
                searchForm.addEventListener("submit", function () {
                    const keyword = searchInput.value.trim();
                    if (keyword) {
                        let history = JSON.parse(localStorage.getItem("searchHistory")) || [];
                        history = history.filter(item => item !== keyword);
                        history.unshift(keyword);
                        if (history.length > 5) history.pop();
                        localStorage.setItem("searchHistory", JSON.stringify(history));
                    }
                });
            }

            // 4. Sự kiện: Bắt thao tác bấm trên danh sách lịch sử
            if (historyList) {
                historyList.addEventListener("mousedown", function (event) {
                    // Nếu bấm vào nút ✕
                    if (event.target.classList.contains("delete-history-btn")) {
                        event.preventDefault(); // Ngăn ô tìm kiếm mất focus

                        const keywordToDelete = event.target.getAttribute("data-keyword");
                        let history = JSON.parse(localStorage.getItem("searchHistory")) || [];
                        history = history.filter(item => item !== keywordToDelete);
                        localStorage.setItem("searchHistory", JSON.stringify(history));

                        loadSearchHistory();
                    }
                    // Nếu bấm vào chữ (thẻ a) để tìm kiếm
                    else if (event.target.tagName === "A") {
                        event.preventDefault(); // Ngăn ô tìm kiếm mất focus
                        // Dùng JS chuyển trang ngay lập tức
                        window.location.href = event.target.href;
                    }
                });
            }
        });
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const productContainer = document.getElementById('product-list-container');
            let products = Array.from(productContainer.querySelectorAll('.grid__column-2-4'));

            // Từ thấp đến cao
            document.getElementById('sort-asc').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('current-price-sort').innerText = "Giá: Từ thấp đến cao";
                products.sort((a, b) => parseInt(a.getAttribute('data-price')) - parseInt(b.getAttribute('data-price')));
                productContainer.innerHTML = '';
                products.forEach(prod => productContainer.appendChild(prod));
            });

            // Từ cao đến thấp
            document.getElementById('sort-desc').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('current-price-sort').innerText = "Giá: Từ cao đến thấp";
                products.sort((a, b) => parseInt(b.getAttribute('data-price')) - parseInt(a.getAttribute('data-price')));
                productContainer.innerHTML = '';
                products.forEach(prod => productContainer.appendChild(prod));
            });

            // Xử lý các nút Phổ Biến, Mới Nhất, Bán Chạy
            const filterBtns = document.querySelectorAll('.home-filter__btn');
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    filterBtns.forEach(b => b.classList.remove('btn--primary'));
                    this.classList.add('btn--primary');
                    
                    const text = this.innerText;
                    
                    if (text === "Mới Nhất") {
                        // Sắp xếp theo ID giảm dần (mới nhất)
                        products.sort((a, b) => parseInt(b.getAttribute('data-id')) - parseInt(a.getAttribute('data-id')));
                    } else if (text === "Bán Chạy" || text === "Phổ Biến") {
                        // Sắp xếp theo số lượng bán nhiều nhất
                        products.sort((a, b) => parseInt(b.getAttribute('data-sold')) - parseInt(a.getAttribute('data-sold')));
                    }
                    
                    productContainer.innerHTML = '';
                    products.forEach(prod => productContainer.appendChild(prod));
                });
            });
        });
    </script>

    

</body>
</html>