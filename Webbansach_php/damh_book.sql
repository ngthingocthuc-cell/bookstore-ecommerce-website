-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 16, 2026 lúc 02:15 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `damh_book`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `price`, `description`, `image`, `category`) VALUES
(1, 'Lão Hạc', 'Nam Cao', 45000, 'Phản ánh số phận người nông dân nghèo.', 'LAOHAC.jpg', 'vanhoc'),
(2, 'Chí Phèo', 'Nam Cao', 48000, 'Bi kịch tha hóa của người nông dân.', 'CHIPHEO.jpg', 'vanhoc'),
(3, 'Tắt Đèn', 'Ngô Tất Tố', 50000, 'Phê phán xã hội phong kiến.', 'TATDEN.webp', 'vanhoc'),
(4, 'Số Đỏ', 'Vũ Trọng Phụng', 60000, 'Tiểu thuyết trào phúng nổi tiếng.', 'SODO.jpg', 'vanhoc'),
(5, 'Dế Mèn Phiêu Lưu Ký', 'Tô Hoài', 55000, 'Tác phẩm thiếu nhi kinh điển.', 'DEMENPLK.jpg', 'vanhoc'),
(6, 'Nhật Ký Trong Tù', 'Hồ Chí Minh', 40000, 'Tập thơ viết trong tù.', 'NHATKYTRONGTU.jpg', 'vanhoc'),
(7, 'Vợ Nhặt', 'Kim Lân', 42000, 'Tác phẩm về nạn đói 1945.', 'VONHAT.webp', 'vanhoc'),
(8, 'Rừng Xà Nu', 'Nguyễn Trung Thành', 45000, 'Kháng chiến chống Mỹ.', 'RUNGXANU.jpg', 'vanhoc'),
(9, 'Hai Đứa Trẻ', 'Thạch Lam', 38000, 'Truyện ngắn cảm xúc.', 'HAIDUATRE.webp', 'vanhoc'),
(10, 'Tuổi Thơ Dữ Dội', 'Phùng Quán', 65000, 'Thiếu niên trong kháng chiến.', 'TUOITHODUDOI.webp', 'vanhoc'),
(11, 'Đắc Nhân Tâm', 'Dale Carnegie', 90000, 'Nghệ thuật giao tiếp.', 'DACNHANTAM.jpg', 'kynang'),
(12, '7 Thói Quen Hiệu Quả', 'Stephen Covey', 120000, 'Phát triển bản thân.', '7THOIQUEN.webp', 'kynang'),
(13, 'Quẳng Gánh Lo Đi', 'Dale Carnegie', 85000, 'Sống tích cực.', 'QUANGGANHLODI.jpg', 'kynang'),
(14, 'Tư Duy Nhanh Và Chậm', 'Daniel Kahneman', 150000, 'Hiểu về tư duy.', 'TUDUY.webp', 'kynang'),
(15, 'Nhà Giả Kim', 'Paulo Coelho', 95000, 'Theo đuổi ước mơ.', 'NHAGIAKIM.jpg', 'kynang'),
(16, 'Sức Mạnh Tiềm Thức', 'Joseph Murphy', 88000, 'Khai phá nội lực.', 'SUCMANHTIEMTHUC.webp', 'kynang'),
(17, 'Người Giàu Nhất Babylon', 'George Clason', 76000, 'Bí quyết tài chính.', 'NGUOIGIAUNHATBABYLON.jpg', 'kynang'),
(18, 'Dám Nghĩ Lớn', 'David Schwartz', 99000, 'Tư duy thành công.', 'DAMNGHILON.webp', 'kynang'),
(19, 'Atomic Habits', 'James Clear', 140000, 'Xây dựng thói quen.', 'ATOMIC.jpeg', 'kynang'),
(20, 'Mindset', 'Carol Dweck', 110000, 'Tư duy phát triển.', 'MINDSET.webp', 'kynang'),
(21, 'Cha Giàu Cha Nghèo', 'Robert Kiyosaki', 120000, 'Bài học tài chính cá nhân.', 'CHAGIAUCHANGHEO.jpg', 'kinhte'),
(22, 'Nhà Đầu Tư Thông Minh', 'Benjamin Graham', 150000, 'Nguyên tắc đầu tư giá trị.', 'NHADAUTUTHONGMINH.webp', 'kinhte'),
(23, 'Nghĩ Giàu Làm Giàu', 'Napoleon Hill', 110000, 'Tư duy làm giàu thành công.', 'NGHIGIAULAMGIAU.webp', 'kinhte'),
(24, 'Dạy Con Làm Giàu', 'Robert Kiyosaki', 100000, 'Giáo dục tài chính cho con.', 'DAYCONLAMGIAU.jpg', 'kinhte'),
(25, 'Quốc Gia Khởi Nghiệp', 'Dan Senor', 130000, 'Câu chuyện khởi nghiệp Israel.', 'QUOCGIAKHOINGHIEP.png', 'kinhte'),
(26, 'Từ Tốt Đến Vĩ Đại', 'Jim Collins', 145000, 'Chiến lược phát triển doanh nghiệp.', 'TUTOTDENVIDAI.webp', 'kinhte'),
(27, 'Trên Đỉnh Phố Wall', 'Peter Lynch', 135000, 'Kinh nghiệm đầu tư thực tế.', 'TRENDINHPHOWALL.webp', 'kinhte'),
(28, 'Khởi Nghiệp Tinh Gọn', 'Eric Ries', 140000, 'Phương pháp Lean Startup.', 'KHOINGHIEPTINHGON.webp', 'kinhte'),
(29, 'Người Giàu Có Nhất Thành Babylon', 'George Clason', 90000, 'Nguyên tắc quản lý tiền.', 'NGUOIGIAUNHATBABYLON.jpg', 'kinhte'),
(30, 'Tỷ Phú Bán Giày', 'Tony Hsieh', 125000, 'Câu chuyện kinh doanh Zappos.', 'TYPHUBANGIAY.webp', 'kinhte'),
(31, 'Dế Mèn Phiêu Lưu Ký', 'Tô Hoài', 75000, 'Cuộc phiêu lưu của chú Dế Mèn.', 'DEMENPLK.jpg', 'thieunhi'),
(32, 'Hoàng Tử Bé', 'Antoine de Saint-Exupéry', 85000, 'Câu chuyện đầy ý nghĩa.', 'HOANGTUBE.jpg', 'thieunhi'),
(33, 'Harry Potter', 'J.K. Rowling', 120000, 'Phù thủy nhỏ tuổi nổi tiếng.', 'HARRYPOTTER.jpg', 'thieunhi'),
(34, 'Truyện Cổ Grimm', 'Anh Em Grimm', 65000, 'Những câu chuyện cổ tích nổi tiếng.', 'TRUYENCOGRIMM.jpg', 'thieunhi'),
(35, 'Cô Bé Lọ Lem', 'Nhiều Tác Giả', 55000, 'Câu chuyện cổ tích quen thuộc.', 'COBELOLEM.webp', 'thieunhi'),
(36, 'Thám Tử Lừng Danh Conan', 'Gosho Aoyama', 90000, 'Bộ truyện trinh thám hấp dẫn.', 'CONAN.jpg', 'thieunhi'),
(37, 'Những Tấm Lòng Cao Cả', 'Edmondo De Amicis', 80000, 'Bài học về lòng nhân ái.', 'NHUNGTAMLONGCAOCA.jpg', 'thieunhi'),
(38, 'Kính Vạn Hoa', 'Nguyễn Nhật Ánh', 95000, 'Tuổi thơ hồn nhiên vui nhộn.', 'KINHVANHOA.jpg', 'thieunhi'),
(39, 'Chú Mèo Máy Doraemon', 'Fujiko F. Fujio', 70000, 'Những chuyến phiêu lưu kỳ thú.', 'DOREMON.webp', 'thieunhi'),
(40, 'Không Gia Đình', 'Hector Malot', 88000, 'Hành trình cảm động của Remi.', 'KHONGGIADINH.webp', 'thieunhi');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
