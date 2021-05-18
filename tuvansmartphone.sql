-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 18, 2021 lúc 03:39 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tuvansmartphone`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsx`
--

CREATE TABLE `hangsx` (
  `mahang` int(11) NOT NULL,
  `tenhang` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `quocgia` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsx`
--

INSERT INTO `hangsx` (`mahang`, `tenhang`, `quocgia`) VALUES
(1, 'Samsung', 'Hàn Quốc'),
(2, 'Oppo', 'Trung Quốc'),
(3, 'Xiaomi', 'Trung Quốc'),
(4, 'Realme', 'Trung Quốc'),
(5, 'Vsmart', 'Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `mahinhanh` int(11) NOT NULL,
  `hinhanh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `masp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`mahinhanh`, `hinhanh`, `masp`) VALUES
(1, './Images/MI_11lite_01.png', 1),
(2, './Images/MI_11lite_02.png', 1),
(3, './Images/OP_a93_01.png', 2),
(4, './Images/OP_a93_02.png', 2),
(5, './Images/OP_reno5_01.png', 3),
(6, './Images/OP_reno5_02.png', 3),
(7, './Images/RE_8_01.png', 4),
(9, './Images/RE_8_02.png', 4),
(10, './Images/SS_a52_02.png', 5),
(11, './Images/SS_a52_02.png', 5),
(12, './Images/SS_s20FE_01.png', 6),
(13, './Images/SS_s20FE_02.png', 6),
(14, './Images/SS_s21_01.png', 7),
(16, './Images/SS_s21_02.png', 7),
(17, './Images/VS_arispro_01.png', 8),
(18, './Images/VS_arispro_02.png', 8),
(19, './Images/VS_live4_01.png', 9),
(20, './Images/VS_live4_02.png', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `maquyen` int(11) NOT NULL,
  `tenquyen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chitiet` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`maquyen`, `tenquyen`, `chitiet`) VALUES
(1, 'Khách hàng', 'Không được quyền chỉnh sửa'),
(2, 'Quản trị viên', 'Được quyền chỉnh sửa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `mahang` int(11) NOT NULL,
  `tensp` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `anhsanpham` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `manhinh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `hdh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `camerasau` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cameratruoc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `chip` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ram` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `rom` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sim` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pinsac` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `mahang`, `tensp`, `anhsanpham`, `manhinh`, `hdh`, `camerasau`, `cameratruoc`, `chip`, `ram`, `rom`, `sim`, `pinsac`, `gia`) VALUES
(1, 3, 'Xiaomi MI 11 Lite', './Images/MI_11lite.png', 'AMOLED, 6.55\", Full HD+', 'Android 11', 'Chính 64 MP & Phụ 8 MP, 5 MP', '16 MP', 'Snapdragon 732G', '8 GB', '128 GB', '2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '4250 mAh, 33 W', 6990000),
(2, 2, 'Oppo A93', './Images/OP_a93.png', 'AMOLED, 6.43\", Full HD+', 'Android 10', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', 'Chính 16 MP & Phụ 2 MP', 'MediaTek Helio P95', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '4000 mAh, 18 W', 5490000),
(3, 2, 'Oppo Reno 5', './Images/OP_reno5.png', 'AMOLED, 6.43\", Full HD+', 'Android 11', 'Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP', '44 MP', 'Snapdragon 720G', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '4310 mAh, 50 W', 7490000),
(4, 4, 'Realme 8', './Images/RE_8.png', 'Super AMOLED, 6.4\", Full HD+', 'Android 11', 'Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP', '16 MP', 'MediaTek Helio G95', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh, 30 W', 6990000),
(5, 1, 'Samsung Galaxy A52', './Images/SS_a52.png', 'Super AMOLED6.5\"Full HD+', 'Android 11', 'Chính 64 MP & Phụ 12 MP, 5 MP, 5 MP', '32 MP', 'Snapdragon 720G', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '4500 mAh, 25 W', 7990000),
(6, 1, 'Samsung Galaxy S20 FE', './Images/SS_s20FE.png', 'Super AMOLED, 6.5\", Full HD+', 'Android 11', 'Chính 12 MP & Phụ 12 MP, 8 MP', '32 MP', 'Snapdragon 865', '8 GB', '256 GB', '2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '4500 mAh, 25 W', 11490000),
(7, 1, 'Samsung Galaxy S21 5G', './Images/SS_s21.png', 'Dynamic AMOLED 2X, 6.2\", Full HD+', 'Android 11', 'Chính 12 MP & Phụ 64 MP, 12 MP', '10 MP', 'Exynos 2100', '8 GB', '128 GB', '2 Nano SIM hoặc 1 Nano SIM + 1 eSIM, Hỗ trợ 5G', '\r\n4000 mAh, 25 W', 17990000),
(8, 5, 'Vsmart Aris Pro', './Images/VS_arispro.png', 'AMOLED, 6.39\", Full HD+', 'Android 10', 'Chính 64 MP & Phụ 8 MP, 8 MP, 2 MP', '20 MP', 'Snapdragon 730', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '4000 mAh, 18 W', 5990000),
(9, 5, 'Vsmart Live 4', './Images/VS_live4.png', 'LTPS IPS LCD, 6.5\", Full HD+', 'Android 10\r\n', 'Chính 48 MP & Phụ 8 MP, 5 MP, 2 MP', '13 MP', 'Snapdragon 675', '6 GB', '64 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh, 18 W', 3490000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `ho` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `taikhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 1,
  `maquyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `ho`, `ten`, `sdt`, `gioitinh`, `taikhoan`, `matkhau`, `trangthai`, `maquyen`) VALUES
(1, 'Lê', 'Trung Hậu', '0975 900 365', 'Nam', 'trunghau', '123456', 1, 2),
(3, 'Nguyễn ', 'Mỹ Anh', '0947 147 947', 'Nữ', 'khach01', '123456', 1, 1),
(4, 'Lê', 'Huy', '0974 723 823', 'nam', 'khach02', '123456', 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hangsx`
--
ALTER TABLE `hangsx`
  ADD PRIMARY KEY (`mahang`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`mahinhanh`),
  ADD KEY `fk_hinhanh_sanpham` (`masp`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`maquyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `fk_sanpham_hangsx` (`mahang`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_taikhoan_phanquyen` (`maquyen`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hangsx`
--
ALTER TABLE `hangsx`
  MODIFY `mahang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `mahinhanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `fk_hinhanh_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_hangsx` FOREIGN KEY (`mahang`) REFERENCES `hangsx` (`mahang`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `fk_taikhoan_phanquyen` FOREIGN KEY (`maquyen`) REFERENCES `phanquyen` (`maquyen`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
