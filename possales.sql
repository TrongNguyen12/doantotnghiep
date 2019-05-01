-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 01, 2019 lúc 05:11 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `possales`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2019_02_11_074131_vp_user', 1),
(12, '2019_02_12_145542_vp_categories', 1),
(13, '2019_02_13_130719_vp_products', 1),
(14, '2019_02_17_221714_vp_employees', 1),
(15, '2019_02_23_133252_vp_customers', 1),
(16, '2019_02_26_111852_vp_orders', 1),
(17, '2019_02_26_111944_vp_order_detail', 1),
(18, '2019_03_16_101656_vp_supplier', 1),
(19, '2019_04_07_150033_vp_input_bill', 1),
(20, '2019_04_07_150632_vp_inputbill_detail', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_categories`
--

CREATE TABLE `vp_categories` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_parentID` int(11) NOT NULL,
  `cate_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_categories`
--

INSERT INTO `vp_categories` (`cate_id`, `cate_name`, `cate_slug`, `cate_parentID`, `cate_status`, `created_at`, `updated_at`) VALUES
(1, 'Thiết bị điện tử', 'thiet-bi-dien-tu', 0, 1, '2019-04-29 13:45:50', '2019-04-29 13:45:50'),
(5, 'Siêu thị tạp hóa', 'sieu-thi-tap-hoa', 0, 1, '2019-04-29 13:46:45', '2019-04-29 13:46:45'),
(6, 'Thời trang', 'thoi-trang', 0, 1, '2019-04-29 13:46:54', '2019-04-29 13:46:54'),
(7, 'Quần áo nam', 'quan-ao-nam', 6, 1, '2019-04-29 13:47:18', '2019-04-29 13:47:18'),
(8, 'Quần áo nữ', 'quan-ao-nu', 6, 1, '2019-04-29 13:47:31', '2019-04-29 13:47:44'),
(9, 'Điện thoại', 'dien-thoai', 1, 1, '2019-04-29 13:48:01', '2019-04-29 13:48:01'),
(10, 'Máy tính', 'may-tinh', 1, 1, '2019-04-29 13:48:07', '2019-04-29 13:48:19'),
(11, 'Tivi', 'tivi', 1, 1, '2019-04-29 13:49:50', '2019-04-29 13:49:50'),
(12, 'Thực phẩm', 'thuc-pham', 5, 1, '2019-04-29 13:51:26', '2019-04-29 13:51:26'),
(13, 'Máy lạnh', 'may-lanh', 1, 1, '2019-04-29 13:51:54', '2019-04-29 13:51:54'),
(14, 'Đồ uống các loại', 'do-uong-cac-loai', 5, 1, '2019-04-29 13:53:17', '2019-04-29 13:53:17'),
(15, 'Bánh kẹo các loại', 'banh-keo-cac-loai', 5, 1, '2019-04-29 13:53:49', '2019-04-29 13:53:49'),
(16, 'Sữa các loại', 'sua-cac-loai', 5, 1, '2019-04-29 13:55:11', '2019-04-29 13:55:11'),
(17, 'Quần áo trẻ con', 'quan-ao-tre-con', 6, 1, '2019-04-29 13:56:02', '2019-04-29 13:56:02'),
(18, 'Giày dép', 'giay-dep', 6, 1, '2019-04-29 13:56:36', '2019-04-29 13:56:36'),
(19, 'Tai nghe', 'tai-nghe', 1, 1, '2019-04-29 13:57:09', '2019-04-29 13:57:09'),
(20, 'Máy ảnh', 'may-anh', 1, 1, '2019-04-29 13:57:38', '2019-04-29 13:57:38'),
(21, 'Cafe , trà', 'cafe-tra', 5, 1, '2019-04-29 13:58:14', '2019-04-29 13:58:14'),
(22, 'Chăm sóc cá nhân', 'cham-soc-ca-nhan', 5, 1, '2019-04-29 13:58:52', '2019-04-29 13:58:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_customers`
--

CREATE TABLE `vp_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_addr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_nodes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_birthday` date DEFAULT NULL,
  `customer_gender` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_customers`
--

INSERT INTO `vp_customers` (`customer_id`, `customer_name`, `customer_code`, `customer_phone`, `customer_email`, `customer_addr`, `customer_nodes`, `customer_birthday`, `customer_gender`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'KH00001', '098765362', NULL, NULL, NULL, '1970-01-01', 1, '2019-04-30 13:38:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_employees`
--

CREATE TABLE `vp_employees` (
  `em_id` int(10) UNSIGNED NOT NULL,
  `em_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `em_sex` tinyint(4) NOT NULL,
  `em_birthday` date NOT NULL,
  `em_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `em_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `em_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `em_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `em_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `em_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_inputbill`
--

CREATE TABLE `vp_inputbill` (
  `ipB_id` int(10) UNSIGNED NOT NULL,
  `ipB_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ipB_user_init` int(11) NOT NULL,
  `ipB_supplier_id` int(11) NOT NULL,
  `ipB_nodes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipB_payment_method` tinyint(4) NOT NULL,
  `ipB_coupon` int(11) DEFAULT NULL,
  `ipB_total_money` int(11) NOT NULL,
  `ipB_shop_pay` int(11) NOT NULL,
  `ipB_lake` int(11) DEFAULT NULL,
  `ipB_total_quantity` int(11) NOT NULL,
  `ipB_status` tinyint(4) NOT NULL,
  `ipB_deleted` tinyint(4) DEFAULT NULL,
  `ipB_user_deleted` int(11) DEFAULT NULL,
  `ipB_created` timestamp NULL DEFAULT NULL,
  `ipB_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_inputbill`
--

INSERT INTO `vp_inputbill` (`ipB_id`, `ipB_code`, `ipB_user_init`, `ipB_supplier_id`, `ipB_nodes`, `ipB_payment_method`, `ipB_coupon`, `ipB_total_money`, `ipB_shop_pay`, `ipB_lake`, `ipB_total_quantity`, `ipB_status`, `ipB_deleted`, `ipB_user_deleted`, `ipB_created`, `ipB_updated`) VALUES
(1, 'PNH00001', 1, 1, NULL, 1, 0, 15000000, 15000000, 0, 100, 1, NULL, NULL, '2019-04-29 14:19:31', NULL),
(2, 'PNH00002', 1, 8, NULL, 1, 0, 5000000, 5000000, 0, 100, 1, NULL, NULL, '2019-04-29 14:30:04', NULL),
(3, 'PNH00003', 1, 2, NULL, 1, 0, 20000000, 20000000, 0, 100, 1, NULL, NULL, '1970-01-01 13:24:41', NULL),
(4, 'PNH00004', 1, 2, NULL, 1, 0, 2000000, 2000000, 0, 100, 1, NULL, NULL, '1970-01-01 13:28:46', NULL),
(5, 'PNH00005', 1, 2, NULL, 1, 0, 20000000, 20000000, 0, 100, 1, NULL, NULL, '2019-04-30 13:31:12', NULL),
(6, 'PNH00006', 1, 2, NULL, 1, 0, 20000000, 20000000, 0, 100, 1, NULL, NULL, '2019-04-30 13:32:20', NULL),
(7, 'PNH00007', 1, 6, NULL, 1, 0, 2000000, 2000000, 0, 100, 1, NULL, NULL, '2019-04-30 13:33:53', NULL),
(8, 'PNH00008', 1, 7, NULL, 1, 0, 5000000, 5000000, 0, 100, 1, NULL, NULL, '2019-04-30 13:35:01', NULL),
(9, 'PNH00009', 1, 7, NULL, 1, 0, 25000000, 25000000, 0, 200, 1, NULL, NULL, '2019-04-30 13:35:42', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_inputbill_detail`
--

CREATE TABLE `vp_inputbill_detail` (
  `ipBD_id` int(10) UNSIGNED NOT NULL,
  `ipBD_ipB_id` int(10) UNSIGNED NOT NULL,
  `ipBD_pro_id` int(10) UNSIGNED NOT NULL,
  `ipBD_quantity` int(11) NOT NULL,
  `ipBD_price` int(11) NOT NULL,
  `ipBD_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_inputbill_detail`
--

INSERT INTO `vp_inputbill_detail` (`ipBD_id`, `ipBD_ipB_id`, `ipBD_pro_id`, `ipBD_quantity`, `ipBD_price`, `ipBD_total`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 100, 150000, 15000000, '2019-04-29 14:19:31', '2019-04-29 14:19:31'),
(2, 2, 2, 100, 50000, 5000000, '2019-04-29 14:30:05', '2019-04-29 14:30:05'),
(3, 3, 4, 100, 200000, 20000000, '2019-04-30 13:24:41', '2019-04-30 13:24:41'),
(4, 4, 5, 100, 20000, 2000000, '2019-04-30 13:28:46', '2019-04-30 13:28:46'),
(5, 5, 4, 100, 200000, 20000000, '2019-04-30 13:31:12', '2019-04-30 13:31:12'),
(6, 6, 4, 100, 200000, 20000000, '2019-04-30 13:32:20', '2019-04-30 13:32:20'),
(7, 7, 5, 100, 20000, 2000000, '2019-04-30 13:33:53', '2019-04-30 13:33:53'),
(8, 8, 2, 100, 50000, 5000000, '2019-04-30 13:35:01', '2019-04-30 13:35:01'),
(9, 9, 2, 100, 50000, 5000000, '2019-04-30 13:35:42', '2019-04-30 13:35:42'),
(10, 9, 4, 100, 200000, 20000000, '2019-04-30 13:35:42', '2019-04-30 13:35:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_orders`
--

CREATE TABLE `vp_orders` (
  `ord_id` int(10) UNSIGNED NOT NULL,
  `ord_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord_user_init` int(11) NOT NULL,
  `ord_customer_id` int(11) NOT NULL,
  `ord_store_id` int(11) NOT NULL,
  `ord_nodes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ord_payment_method` tinyint(4) NOT NULL,
  `ord_total_price` int(11) NOT NULL,
  `ord_total_origin_price` int(11) NOT NULL,
  `ord_coupon` int(11) DEFAULT NULL,
  `ord_total_money` int(11) NOT NULL,
  `ord_customer_pay` int(11) NOT NULL,
  `ord_lake` int(11) DEFAULT NULL,
  `ord_total_quantity` int(11) NOT NULL,
  `ord_status` tinyint(4) NOT NULL,
  `ord_source` tinyint(4) NOT NULL,
  `ord_deleted` tinyint(4) DEFAULT NULL,
  `ord_user_deleted` int(11) DEFAULT NULL,
  `ord_created` timestamp NULL DEFAULT NULL,
  `ord_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_orders`
--

INSERT INTO `vp_orders` (`ord_id`, `ord_code`, `ord_user_init`, `ord_customer_id`, `ord_store_id`, `ord_nodes`, `ord_payment_method`, `ord_total_price`, `ord_total_origin_price`, `ord_coupon`, `ord_total_money`, `ord_customer_pay`, `ord_lake`, `ord_total_quantity`, `ord_status`, `ord_source`, `ord_deleted`, `ord_user_deleted`, `ord_created`, `ord_updated`) VALUES
(1, 'HD-00001', 1, 1, 1, NULL, 1, 600000, 320000, 0, 600000, 600000, 0, 6, 1, 1, NULL, NULL, '2019-04-30 13:38:36', NULL),
(2, 'HD-00002', 1, 1, 1, NULL, 1, 200000, 100000, 0, 200000, 200000, 0, 1, 1, 1, NULL, NULL, '2019-04-30 13:39:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_order_detail`
--

CREATE TABLE `vp_order_detail` (
  `orde_id` int(10) UNSIGNED NOT NULL,
  `orde_ord_id` int(10) UNSIGNED NOT NULL,
  `orde_pro_id` int(10) UNSIGNED NOT NULL,
  `orde_quantity` int(11) NOT NULL,
  `orde_price` int(11) NOT NULL,
  `order_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_order_detail`
--

INSERT INTO `vp_order_detail` (`orde_id`, `orde_ord_id`, `orde_pro_id`, `orde_quantity`, `orde_price`, `order_total`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 4, 50000, 200000, '2019-04-30 13:38:37', '2019-04-30 13:38:37'),
(2, 1, 4, 2, 200000, 400000, '2019-04-30 13:38:37', '2019-04-30 13:38:37'),
(3, 2, 4, 1, 200000, 200000, '2019-04-30 13:39:28', '2019-04-30 13:39:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_products`
--

CREATE TABLE `vp_products` (
  `prod_id` int(10) UNSIGNED NOT NULL,
  `prod_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_origin_price` int(11) NOT NULL,
  `prod_sell_price` int(11) DEFAULT NULL,
  `prod_quantity` int(11) NOT NULL,
  `prod_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_more_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_descriptions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_status` tinyint(4) NOT NULL,
  `prod_hot` tinyint(4) NOT NULL,
  `prod_new` tinyint(4) NOT NULL,
  `prod_cate` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_products`
--

INSERT INTO `vp_products` (`prod_id`, `prod_code`, `prod_name`, `prod_slug`, `prod_origin_price`, `prod_sell_price`, `prod_quantity`, `prod_img`, `prod_more_img`, `prod_descriptions`, `prod_status`, `prod_hot`, `prod_new`, `prod_cate`, `created_at`, `updated_at`) VALUES
(1, 'SP00001', 'Điện thoại Iphone XS', 'dien-thoai-iphone-xs', 18000000, 20999900, 0, '1556546519_iphone-x-64gb-laodo-ng.jpg', NULL, '<p>M&ocirc; tả</p>', 1, 1, 1, 9, '2019-04-29 14:01:59', NULL),
(2, 'SP00002', 'Lốc 6 lon cafe sữa', 'loc-6-lon-cafe-sua', 30000, 50000, 196, '1556546687_6-lon-ca-phe-sua-georgia-max-coffee-235ml-201904260825191915_300x300.jpg', NULL, '<p>M&ocirc; tả&nbsp;</p>', 1, 1, 1, 14, '2019-04-29 14:04:47', '2019-04-30 13:38:37'),
(3, 'SP00003', '6 lon bia Heniken 330ml', '6-lon-bia-heniken-330ml', 70000, 150000, 0, '1556546755_6-lon-bia-heineken-330ml-201902251320533906_300x300.jpg', NULL, NULL, 1, 1, 1, 14, '2019-04-29 14:05:55', '2019-04-29 14:06:08'),
(4, 'SP00004', '4 Bia strongbow tao 330 ml', '4-bia-strongbow-tao-330-ml', 100000, 200000, 97, '1556546855_4-lon-strongbow-tao-330ml-201903080812433110_300x300.jpg', NULL, NULL, 1, 1, 1, 14, '2019-04-29 14:07:28', '2019-04-30 13:39:28'),
(5, 'SP00005', 'Snack khoai tây', 'snack-khoai-tay', 10000, 20000, 0, '1556546930_snack-khoai-tay-slide-vi-thit-nuong-100g-201903281513112941_300x300.jpg', NULL, NULL, 1, 1, 1, 15, '2019-04-29 14:08:50', '2019-04-30 13:31:12'),
(6, 'SP00006', 'Bánh bông lan', 'banh-bong-lan', 20000, 70000, 0, '1556547020_banh-bong-lan-custas-kem-trung-470g-20-cai-201903081507429538_300x300.jpg', NULL, NULL, 1, 1, 1, 15, '2019-04-29 14:10:20', '2019-04-30 13:32:20'),
(7, 'SP00007', 'Bánh chocopice', 'banh-chocopice', 30000, 60000, 0, '1556547052_hop-12-banh-vi-ca-cao-choco-pie-dark-30g-201903201516429715_300x300.jpg', NULL, NULL, 1, 1, 1, 15, '2019-04-29 14:10:52', '2019-04-30 13:33:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_supplier`
--

CREATE TABLE `vp_supplier` (
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `supplier_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_addr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_supplier`
--

INSERT INTO `vp_supplier` (`supplier_id`, `supplier_code`, `supplier_name`, `supplier_phone`, `supplier_email`, `supplier_addr`, `supplier_notes`, `created_at`, `updated_at`) VALUES
(1, 'NCC00001', 'Công ty Bánh kẹo', '0987654321', 'banhkeo@gmail.com', 'Hà Nội', NULL, '2019-04-29 14:13:51', NULL),
(2, 'NCC00002', 'Công ty Bia', '0987654321', 'email@gmail.com', 'Hà Nội', NULL, '2019-04-29 14:20:36', NULL),
(3, 'NCC00003', 'Nhà Cung Cấp 1', '0987654321', 'email@gmail.com', 'HÀ Nội', NULL, '2019-04-29 14:22:35', NULL),
(4, 'NCC00004', 'Nhà CC', '0987654321', 'r@gmail.com', 'HÀ NOI', NULL, '2019-04-29 14:24:34', NULL),
(5, 'NCC00005', 'Nhà  cung cấp sữa', '0987654321', 'e@gmail.com', 'HN', NULL, '2019-04-29 14:26:39', NULL),
(6, 'NCC00006', 'Thêm', '02338947876', 'j@gmail.com', 'HN', NULL, '2019-04-29 14:28:29', NULL),
(7, 'NCC00007', 'TEst', '0987654321', 'e@gmail.com', 'HN', NULL, '2019-04-29 14:29:12', NULL),
(8, 'NCC00008', 'Nhà Cung Cấp Bia', '098762663', 'e@gmail.com', 'HN', NULL, '2019-04-29 14:29:57', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_users`
--

CREATE TABLE `vp_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_users`
--

INSERT INTO `vp_users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Quản Lý', 'admin@gmail.com', '$2y$10$vJCvp2o1TbUv/rvwR3d3IO7w0l.gnC4wXs4Gka60SpYTOu3x529JO', 1, 'D99QK92RIaze27oJkiRG0Yc16b0MZRsfK64cRO7p4QhCsyQcV6VRmOH31ce1', '2019-04-28 04:19:36', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vp_categories`
--
ALTER TABLE `vp_categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `vp_customers`
--
ALTER TABLE `vp_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `vp_employees`
--
ALTER TABLE `vp_employees`
  ADD PRIMARY KEY (`em_id`);

--
-- Chỉ mục cho bảng `vp_inputbill`
--
ALTER TABLE `vp_inputbill`
  ADD PRIMARY KEY (`ipB_id`);

--
-- Chỉ mục cho bảng `vp_inputbill_detail`
--
ALTER TABLE `vp_inputbill_detail`
  ADD PRIMARY KEY (`ipBD_id`),
  ADD KEY `vp_inputbill_detail_ipbd_ipb_id_foreign` (`ipBD_ipB_id`),
  ADD KEY `vp_inputbill_detail_ipbd_pro_id_foreign` (`ipBD_pro_id`);

--
-- Chỉ mục cho bảng `vp_orders`
--
ALTER TABLE `vp_orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Chỉ mục cho bảng `vp_order_detail`
--
ALTER TABLE `vp_order_detail`
  ADD PRIMARY KEY (`orde_id`),
  ADD KEY `vp_order_detail_orde_ord_id_foreign` (`orde_ord_id`),
  ADD KEY `vp_order_detail_orde_pro_id_foreign` (`orde_pro_id`);

--
-- Chỉ mục cho bảng `vp_products`
--
ALTER TABLE `vp_products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `vp_products_prod_cate_foreign` (`prod_cate`);

--
-- Chỉ mục cho bảng `vp_supplier`
--
ALTER TABLE `vp_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Chỉ mục cho bảng `vp_users`
--
ALTER TABLE `vp_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vp_users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `vp_categories`
--
ALTER TABLE `vp_categories`
  MODIFY `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `vp_customers`
--
ALTER TABLE `vp_customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vp_employees`
--
ALTER TABLE `vp_employees`
  MODIFY `em_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vp_inputbill`
--
ALTER TABLE `vp_inputbill`
  MODIFY `ipB_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `vp_inputbill_detail`
--
ALTER TABLE `vp_inputbill_detail`
  MODIFY `ipBD_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `vp_orders`
--
ALTER TABLE `vp_orders`
  MODIFY `ord_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `vp_order_detail`
--
ALTER TABLE `vp_order_detail`
  MODIFY `orde_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `vp_products`
--
ALTER TABLE `vp_products`
  MODIFY `prod_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `vp_supplier`
--
ALTER TABLE `vp_supplier`
  MODIFY `supplier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `vp_users`
--
ALTER TABLE `vp_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `vp_inputbill_detail`
--
ALTER TABLE `vp_inputbill_detail`
  ADD CONSTRAINT `vp_inputbill_detail_ipbd_ipb_id_foreign` FOREIGN KEY (`ipBD_ipB_id`) REFERENCES `vp_inputbill` (`ipB_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vp_inputbill_detail_ipbd_pro_id_foreign` FOREIGN KEY (`ipBD_pro_id`) REFERENCES `vp_products` (`prod_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `vp_order_detail`
--
ALTER TABLE `vp_order_detail`
  ADD CONSTRAINT `vp_order_detail_orde_ord_id_foreign` FOREIGN KEY (`orde_ord_id`) REFERENCES `vp_orders` (`ord_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vp_order_detail_orde_pro_id_foreign` FOREIGN KEY (`orde_pro_id`) REFERENCES `vp_products` (`prod_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `vp_products`
--
ALTER TABLE `vp_products`
  ADD CONSTRAINT `vp_products_prod_cate_foreign` FOREIGN KEY (`prod_cate`) REFERENCES `vp_categories` (`cate_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
