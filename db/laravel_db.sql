CREATE DATABASE IF NOT EXISTS `laravel_db`;
USE `laravel_db`;

--
-- Cơ sở dữ liệu: `laravel_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_posts`
--

CREATE TABLE IF NOT EXISTS `tbl_posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_post_id` int(10) UNSIGNED NOT NULL,
  `post_title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `post_except` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_description` text COLLATE utf8_unicode_ci,
  `post_status` tinyint DEFAULT 1,
  `post_image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `url` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `url`, `slug`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 13, 'Áo nữ', NULL, NULL, 'ao-nu', 1, NULL, '2019-01-06 20:00:26', '2019-01-15 00:47:07'),
(14, 24, 'Áo sơ mi nữ', NULL, NULL, 'ao-so-mi-nu', 1, NULL, '2019-01-06 20:00:59', '2019-01-15 00:48:24'),
(15, 18, 'Áo công sở', NULL, NULL, 'ao-cong-so', 1, NULL, '2019-01-06 20:07:42', '2019-01-15 00:47:19'),
(16, 30, 'Áo kiểu nữ', NULL, NULL, 'ao-kieu-nu', 1, NULL, '2019-01-06 20:08:11', '2019-01-15 00:48:53'),
(17, 18, 'Áo thun nữ', NULL, NULL, 'ao-thun-nu', 1, NULL, '2019-01-06 20:08:20', '2019-01-15 00:47:29'),
(18, 18, 'Chân váy', NULL, NULL, 'chan-vay', 1, NULL, '2019-01-06 20:09:21', '2019-01-15 00:47:38'),
(19, 19, 'Quần nữ', NULL, NULL, 'quan-nu', 1, NULL, '2019-01-06 20:09:47', '2019-01-15 00:47:46'),
(20, 23, 'Quần ngắn', NULL, NULL, 'quan-ngan', 1, NULL, '2019-01-06 20:10:05', '2019-01-15 00:47:55'),
(21, 23, 'Quần dài', NULL, NULL, 'quan-dai', 1, NULL, '2019-01-06 20:10:16', '2019-01-15 00:48:03'),
(22, 23, 'Áo len nữ', NULL, NULL, 'ao-len-nu', 1, NULL, '2019-01-06 20:46:23', '2019-01-15 00:48:08'),
(23, 23, 'Áo khoác', NULL, NULL, 'ao-khoac', 1, NULL, '2019-01-07 02:16:00', '2019-01-15 00:48:18'),
(24, 24, 'Sportswear', 'Sportswear<div></div>', NULL, 'sportswear', 1, NULL, '2019-01-09 01:50:39', '2019-01-15 00:48:41'),
(25, 30, 'Nike', 'Nike<div></div><div></div>', NULL, 'nike', 1, NULL, '2019-01-09 01:50:53', '2019-01-15 00:49:01'),
(26, 30, 'Under Armour', 'Under Armour<div></div>', NULL, 'under-armour', 1, NULL, '2019-01-09 01:51:07', '2019-01-15 00:49:11'),
(27, 30, 'Adidas', 'Adidas<div></div>', NULL, 'adidas', 1, NULL, '2019-01-09 01:51:17', '2019-01-15 00:49:19'),
(28, 30, 'Puma', 'Puma<div></div>', NULL, 'puma', 1, NULL, '2019-01-09 01:51:28', '2019-01-15 00:49:26'),
(29, 30, 'ASICS', 'ASICS<div></div>', NULL, 'asics', 1, NULL, '2019-01-09 01:51:39', '2019-01-15 00:49:34'),
(30, 30, 'Mens', 'Mens<div></div>', NULL, 'mens', 1, NULL, '2019-01-09 01:51:52', '2019-01-15 00:49:43'),
(31, 41, 'Fendi', 'Fendi<div></div>', NULL, 'fendi', 1, NULL, '2019-01-09 01:52:03', '2019-01-15 00:49:50'),
(32, 41, 'Guess', 'Guess<div></div>', NULL, 'guess', 1, NULL, '2019-01-09 01:52:11', '2019-01-15 00:49:56'),
(33, 41, 'Valentino', 'Valentino<div></div>', NULL, 'valentino', 1, NULL, '2019-01-09 01:52:20', '2019-01-15 00:50:04'),
(34, 41, 'Dior', 'Dior<div></div>', NULL, 'dior', 1, NULL, '2019-01-09 01:52:29', '2019-01-15 00:50:10'),
(35, 41, 'Versace', 'Versace<div></div>', NULL, 'versace', 1, NULL, '2019-01-09 01:52:39', '2019-01-15 00:50:17'),
(36, 41, 'Armani', 'Armani<div></div>', NULL, 'armani', 1, NULL, '2019-01-09 01:52:48', '2019-01-15 00:50:24'),
(37, 41, 'Prada', 'Prada<div></div>', NULL, 'prada', 1, NULL, '2019-01-09 01:52:56', '2019-01-15 00:50:31'),
(38, 41, 'Dolce and Gabbana', 'Dolce and Gabbana<div></div>', NULL, 'dolce-and-gabbana', 1, NULL, '2019-01-09 01:53:05', '2019-01-15 00:50:40'),
(39, 41, 'Chanel', 'Chanel<div></div>', NULL, 'chanel', 1, NULL, '2019-01-09 01:53:13', '2019-01-15 00:50:47'),
(40, 41, 'Gucci', 'Gucci<div></div>', NULL, 'gucci', 1, NULL, '2019-01-09 01:53:20', '2019-01-15 00:50:54'),
(41, 41, 'Womens', 'Womens<div></div>', NULL, 'womens', 1, NULL, '2019-01-09 01:53:31', '2019-01-15 00:51:01'),
(42, 44, 'Fendi', 'Fendi<div></div>', NULL, 'fendi', 1, NULL, '2019-01-09 01:53:41', '2019-01-15 00:51:07'),
(43, 44, 'Guess', 'Guess<div></div>', NULL, 'guess', 1, NULL, '2019-01-09 01:53:50', '2019-01-15 00:51:15'),
(44, 44, 'Kids', 'Kids<div></div>', NULL, 'kids', 1, NULL, '2019-01-09 01:54:23', '2019-01-15 00:51:22'),
(45, 45, 'Fashion', 'Fashion<div></div>', NULL, 'fashion', 1, NULL, '2019-01-09 01:54:33', '2019-01-15 00:51:28'),
(46, 46, 'Households', 'Households<div></div>', NULL, 'households', 1, NULL, '2019-01-09 01:54:40', '2019-01-15 00:51:35'),
(47, 47, 'Interiors', 'Interiors<div></div>', NULL, 'interiors', 1, NULL, '2019-01-09 01:54:46', '2019-01-15 00:51:43'),
(48, 48, 'Clothing', 'Clothing<div></div>', NULL, 'clothing', 1, NULL, '2019-01-09 01:54:52', '2019-01-15 00:51:50'),
(49, 49, 'Bags', 'Bags<div></div>', NULL, 'bags', 1, NULL, '2019-01-09 01:55:00', '2019-01-15 00:51:57'),
(50, 50, 'Shoes', 'Shoes<div></div>', NULL, 'shoes', 1, NULL, '2019-01-09 01:55:09', '2019-01-15 00:52:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_02_080810_create_category_table', 2),
(4, '2019_01_05_142434_create_products_table', 3);

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
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$390a2rkpN1RsOUT.ltQmkugKlYu6VHgMpXyG7atBUeT8kkDLAZPc6', 1, 'HUjmumgofBSpCHE0xHBoqt5MKBiEUnpKVIkP7ghGRP387DzRLOBDUk1kmHyB', '2018-12-31 06:24:06', '2018-12-31 06:24:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_index` (`category_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
