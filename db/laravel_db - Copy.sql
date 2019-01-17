DROP DATABASE IF EXISTS laravel_db;
CREATE DATABASE IF NOT EXISTS laravel_db;
USE `laravel_db`;

--
-- Cơ sở dữ liệu: `laravel_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'supper admin', 'A Admin User', '2019-01-16 23:09:13', '2019-01-16 23:09:13'),
(2, 'admin', 'A Admin User', '2019-01-16 23:09:13', '2019-01-16 23:09:13'),
(3, 'employee', 'A Employee User', '2019-01-16 23:09:13', '2019-01-16 23:09:13'),
(4, 'saler', 'A Saler User', '2019-01-16 23:09:13', '2019-01-16 23:09:13');


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `display_name`, `fullname`, `email`, `email_verified_at`, `address`, `image`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Supper Admin Name', NULL, 'supper_admin@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$UyY1v9E.1l2wDbmvDFsPaezlxSAFZV2wxDP10W267haLnZXEREgFK', NULL, '2019-01-16 23:09:12', '2019-01-16 23:09:12'),
(2, 'Admin Name', NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$O7wQOVJKQRcPbozR0aZ/d.DV7/.ybGsWQJg0Qo5JJvIRvm0W/hd2G', NULL, '2019-01-16 23:09:12', '2019-01-16 23:09:12'),
(3, 'Employee Name', NULL, 'employee@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$i.5iiDj3Zk.jI9hCZUN1o.tNoIxna26x8IMEbMp2pYHDiShFgOISS', NULL, '2019-01-16 23:09:12', '2019-01-16 23:09:12'),
(4, 'Saler Name', NULL, 'saler@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$J9N7Nv8fwyKJnZNyro/Cke9qCoK6DS5wUc6JeMKEVBn.Xqw7hzqma', NULL, '2019-01-16 23:09:13', '2019-01-16 23:09:13');


--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, '2019-01-16 17:00:00', '2019-01-16 17:00:00'),
(4, 4, 4, '2019-01-16 17:00:00', '2019-01-16 17:00:00');


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_posts`
--

CREATE TABLE IF NOT EXISTS `tbl_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_post_id` int(10) UNSIGNED NOT NULL,
  `post_title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `post_except` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_description` text COLLATE utf8_unicode_ci,
  `post_status` tinyint DEFAULT 1,
  `post_image` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `image`, `slug`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 0, 'Áo nữ', NULL, NULL, 'ao-nu', 1, NULL, '2019-01-06 20:00:26', '2019-01-15 00:47:07'),
(14, 13, 'Áo sơ mi nữ', NULL, NULL, 'ao-so-mi-nu', 1, NULL, '2019-01-06 20:00:59', '2019-01-15 00:48:24'),
(15, 13, 'Áo công sở', NULL, NULL, 'ao-cong-so', 1, NULL, '2019-01-06 20:07:42', '2019-01-15 00:47:19'),
(16, 13, 'Áo kiểu nữ', NULL, NULL, 'ao-kieu-nu', 1, NULL, '2019-01-06 20:08:11', '2019-01-15 00:48:53'),
(17, 13, 'Áo thun nữ', NULL, NULL, 'ao-thun-nu', 1, NULL, '2019-01-06 20:08:20', '2019-01-15 00:47:29'),
(18, 13, 'Chân váy', NULL, NULL, 'chan-vay', 1, NULL, '2019-01-06 20:09:21', '2019-01-15 00:47:38'),
(19, 13, 'Quần nữ', NULL, NULL, 'quan-nu', 1, NULL, '2019-01-06 20:09:47', '2019-01-15 00:47:46'),
(20, 13, 'Quần ngắn', NULL, NULL, 'quan-ngan', 1, NULL, '2019-01-06 20:10:05', '2019-01-15 00:47:55'),
(21, 13, 'Quần dài', NULL, NULL, 'quan-dai', 1, NULL, '2019-01-06 20:10:16', '2019-01-15 00:48:03'),
(22, 13, 'Áo len nữ', NULL, NULL, 'ao-len-nu', 1, NULL, '2019-01-06 20:46:23', '2019-01-15 00:48:08'),
(23, 13, 'Áo khoác', NULL, NULL, 'ao-khoac', 1, NULL, '2019-01-07 02:16:00', '2019-01-15 00:48:18'),
(24, 0, 'Sportswear', 'Sportswear<div></div>', NULL, 'sportswear', 1, NULL, '2019-01-09 01:50:39', '2019-01-15 00:48:41'),
(25, 24, 'Nike', 'Nike<div></div><div></div>', NULL, 'nike', 1, NULL, '2019-01-09 01:50:53', '2019-01-15 00:49:01'),
(26, 24, 'Under Armour', 'Under Armour<div></div>', NULL, 'under-armour', 1, NULL, '2019-01-09 01:51:07', '2019-01-15 00:49:11'),
(27, 24, 'Adidas', 'Adidas<div></div>', NULL, 'adidas', 1, NULL, '2019-01-09 01:51:17', '2019-01-15 00:49:19'),
(28, 24, 'Puma', 'Puma<div></div>', NULL, 'puma', 1, NULL, '2019-01-09 01:51:28', '2019-01-15 00:49:26'),
(29, 24, 'ASICS', 'ASICS<div></div>', NULL, 'asics', 1, NULL, '2019-01-09 01:51:39', '2019-01-15 00:49:34'),
(30, 0, 'Mens', 'Mens<div></div>', NULL, 'mens', 1, NULL, '2019-01-09 01:51:52', '2019-01-15 00:49:43'),
(31, 30, 'Fendi', 'Fendi<div></div>', NULL, 'fendi', 1, NULL, '2019-01-09 01:52:03', '2019-01-15 00:49:50'),
(32, 30, 'Guess', 'Guess<div></div>', NULL, 'guess', 1, NULL, '2019-01-09 01:52:11', '2019-01-15 00:49:56'),
(33, 30, 'Valentino', 'Valentino<div></div>', NULL, 'valentino', 1, NULL, '2019-01-09 01:52:20', '2019-01-15 00:50:04'),
(34, 30, 'Dior', 'Dior<div></div>', NULL, 'dior', 1, NULL, '2019-01-09 01:52:29', '2019-01-15 00:50:10'),
(35, 30, 'Versace', 'Versace<div></div>', NULL, 'versace', 1, NULL, '2019-01-09 01:52:39', '2019-01-15 00:50:17'),
(36, 30, 'Armani', 'Armani<div></div>', NULL, 'armani', 1, NULL, '2019-01-09 01:52:48', '2019-01-15 00:50:24'),
(37, 30, 'Prada', 'Prada<div></div>', NULL, 'prada', 1, NULL, '2019-01-09 01:52:56', '2019-01-15 00:50:31'),
(38, 30, 'Dolce and Gabbana', 'Dolce and Gabbana<div></div>', NULL, 'dolce-and-gabbana', 1, NULL, '2019-01-09 01:53:05', '2019-01-15 00:50:40'),
(39, 30, 'Chanel', 'Chanel<div></div>', NULL, 'chanel', 1, NULL, '2019-01-09 01:53:13', '2019-01-15 00:50:47'),
(40, 30, 'Gucci', 'Gucci<div></div>', NULL, 'gucci', 1, NULL, '2019-01-09 01:53:20', '2019-01-15 00:50:54'),
(41, 0, 'Womens', 'Womens<div></div>', NULL, 'womens', 1, NULL, '2019-01-09 01:53:31', '2019-01-15 00:51:01'),
(42, 41, 'Fendi', 'Fendi<div></div>', NULL, 'fendi', 1, NULL, '2019-01-09 01:53:41', '2019-01-15 00:51:07'),
(43, 41, 'Guess', 'Guess<div></div>', NULL, 'guess', 1, NULL, '2019-01-09 01:53:50', '2019-01-15 00:51:15'),
(44, 41, 'Kids', 'Kids<div></div>', NULL, 'kids', 1, NULL, '2019-01-09 01:54:23', '2019-01-15 00:51:22'),
(45, 41, 'Fashion', 'Fashion<div></div>', NULL, 'fashion', 1, NULL, '2019-01-09 01:54:33', '2019-01-15 00:51:28'),
(46, 41, 'Households', 'Households<div></div>', NULL, 'households', 1, NULL, '2019-01-09 01:54:40', '2019-01-15 00:51:35'),
(47, 41, 'Interiors', 'Interiors<div></div>', NULL, 'interiors', 1, NULL, '2019-01-09 01:54:46', '2019-01-15 00:51:43'),
(48, 41, 'Clothing', 'Clothing<div></div>', NULL, 'clothing', 1, NULL, '2019-01-09 01:54:52', '2019-01-15 00:51:50'),
(49, 41, 'Bags', 'Bags<div></div>', NULL, 'bags', 1, NULL, '2019-01-09 01:55:00', '2019-01-15 00:51:57'),
(50, 41, 'Shoes', 'Shoes<div></div>', NULL, 'shoes', 1, NULL, '2019-01-09 01:55:09', '2019-01-15 00:52:04');


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_code`, `product_color`, `product_desc`, `product_price`, `product_image`, `product_slug`, `created_at`, `updated_at`) VALUES
(4, 14, 'Áo sơ mi viền ren cổ bèo siêu xinh', 'C2459', 'Đa sắc', NULL, 190000.00, '1546919683_6181at29-cv58-1040120190820195127.jpg', 'ao-so-mi-vien-ren-co-beo-sieu-xinh', '2019-01-06 20:38:49', '2019-01-14 23:44:45'),
(33, 17, 'ÁO THUN GET IT GIRL', 'AT01969', 'Màu cam', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<div></div>', 200000.00, '1546852079_1337at69-cv42040120190821434985.jpg', 'ao-thun-get-it-girl', NULL, '2019-01-14 23:49:32'),
(34, 17, 'ÁO THUN YOU ARE BEAUTIFUL', 'AT01968', 'Màu Xanh', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<div></div>', 200000.00, '1546852116_2628at68040120190821434985.jpg', 'ao-thun-you-are-beautiful', NULL, '2019-01-14 23:49:38'),
(35, 17, 'ÁO THUN I JUST LOVE YOU', 'AT01933', 'Màu xanh nhạt', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<div></div><div></div>', 200000.00, '1546852167_9165at33040120190821163144.jpg', 'ao-thun-i-just-love-you', NULL, '2019-01-14 23:49:54'),
(36, 17, 'ÁO THUN IN MOMENT', 'AT01932', 'Màu xanh lá cây', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<div></div>', 200000.00, '1546852219_6596at32-xanh-1040120190821163144.jpg', 'ao-thun-in-moment', NULL, '2019-01-14 23:50:02'),
(37, 17, 'ÁO TAY LOE YOU CAN !', 'AT01931', 'Màu trắng', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<div></div>', 200000.00, '1546852252_2554at31-trang040120190821163144.jpg', 'ao-tay-loe-you-can', NULL, '2019-01-14 23:50:09'),
(38, 17, 'ÁO THUN ÔM TAY NGẮN', 'AT12879', 'Màu hồng', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<div></div>', 200000.00, '1546852311_1554img_9192-1101220180911027029.jpg', 'ao-thun-om-tay-ngan', NULL, '2019-01-14 23:50:16'),
(39, 17, 'ÁO THUN DA CÁ', 'AT12874', 'Màu đỏ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<div></div>', 200000.00, '1546852337_9679img_0078-1101220180908159881.jpg', 'ao-thun-da-ca', NULL, '2019-01-14 23:50:22'),
(40, 17, 'ÁO THUN BODY', 'AT12873', 'Màu đen', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<div></div>', 200000.00, '1546852363_9704img_0035-1-(1)101220180908159725.jpg', 'ao-thun-body', NULL, '2019-01-14 23:50:29'),
(41, 17, 'ÁO PHỐI CỔ REN', 'AT12848', 'Màu Xanh', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<div></div>', 200000.00, '1546852426_990img_9852-1101220180913546075.jpg', 'ao-phoi-co-ren', NULL, '2019-01-14 23:50:37'),
(42, 17, 'ÁO CỔ PHỐI SỌC', 'AT12847', 'Màu xám', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<div></div>', 200000.00, '1546852459_7360img_9566-1101220180912376768.jpg', 'ao-co-phoi-soc', NULL, '2019-01-14 23:50:46'),
(43, 17, 'ÁO CỔ TRỤ PHỐI NÚT', 'AT12846', 'Màu Xanh', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<div></div>', 200000.00, '1546852489_5440img_9852-1101220180913546075.jpg', 'ao-co-tru-phoi-nut', NULL, '2019-01-14 23:50:58');


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(2, 4, 'TPO-S', 'Medium', 12000.00, 15, '2019-01-08 01:38:39', '2019-01-08 01:38:39'),
(3, 4, 'TPO-M', 'Small', 12000.00, 15, '2019-01-08 20:08:53', '2019-01-08 20:08:53');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_index` (`category_id`);

--
-- Chỉ mục cho bảng `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
