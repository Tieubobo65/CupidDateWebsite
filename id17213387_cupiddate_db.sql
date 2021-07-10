-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 09, 2021 lúc 10:20 AM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id17213387_cupiddate_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blocks`
--

CREATE TABLE `blocks` (
  `block_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `block_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Dating');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cities`
--

INSERT INTO `cities` (`city_id`, `state_id`, `city_name`) VALUES
(1, 2, 'Thủ Đức'),
(2, 3, 'Đông Anh'),
(3, 2, '1 District'),
(4, 2, '12 District'),
(5, 2, '9 District'),
(6, 2, 'Gò Vấp'),
(7, 2, 'Bình Thạnh'),
(8, 2, 'Tân Bình'),
(9, 2, 'Tân Phú'),
(10, 2, 'Phú Nhuận'),
(11, 2, '2 District'),
(12, 2, '3 District'),
(13, 2, '10 District'),
(14, 2, '11 District'),
(15, 2, '4 District'),
(16, 2, '5 District'),
(17, 2, '6 District'),
(18, 2, '8 District'),
(19, 2, 'Bình Tân'),
(20, 2, '7 District'),
(21, 2, 'Củ Chi'),
(22, 2, 'Hóc Môn'),
(23, 2, 'Bình Chánh'),
(24, 2, 'Nhà Bè'),
(25, 2, 'Cần Giờ'),
(26, 3, 'Ba Đình'),
(27, 3, 'Bắc Từ Liêm'),
(28, 3, 'Cầu Giấy'),
(29, 3, 'Đống Đa'),
(30, 3, 'Hà Đông'),
(31, 3, 'Hai Bà Trưng'),
(32, 3, 'Hoàn Kiếm'),
(33, 3, 'Hoàng Mai'),
(34, 3, 'Long Biên'),
(35, 3, 'Nam Từ Liêm'),
(36, 3, 'Thanh Xuân'),
(37, 3, 'Tây Hồ'),
(38, 6, 'ABC');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_content` text COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `published_at` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(1, 'USA'),
(2, 'Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images_post`
--

CREATE TABLE `images_post` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message_content` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo_name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `published_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `relationships`
--

CREATE TABLE `relationships` (
  `relationship_id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL,
  `status` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `states`
--

INSERT INTO `states` (`state_id`, `country_id`, `state_name`) VALUES
(2, 2, 'Hồ Chí Minh'),
(3, 2, 'Hà Nội'),
(6, 1, 'California'),
(9, 2, 'Hà Giang'),
(10, 2, 'Cao Bằng'),
(11, 2, 'Bắc Kạn'),
(12, 2, 'Tuyên Quang'),
(13, 2, 'Lào Cai'),
(14, 2, 'Điện Biên'),
(15, 2, 'Lai Châu'),
(16, 2, 'Sơn La'),
(17, 2, 'Yên Bái'),
(18, 2, 'Hoà Bình'),
(19, 2, 'Thái Nguyên'),
(20, 2, 'Lạng Sơn'),
(21, 2, 'Quảng Ninh'),
(22, 2, 'Bắc Giang'),
(23, 2, 'Phú Thọ'),
(24, 2, 'Vĩnh Phúc'),
(25, 2, 'Bắc Ninh'),
(26, 2, 'Hải Dương'),
(27, 2, 'Hải Phòng'),
(28, 2, 'Hưng Yên'),
(29, 2, 'Thái Bình'),
(30, 2, 'Hà Nam'),
(31, 2, 'Nam Định'),
(32, 2, 'Ninh Bình'),
(33, 2, 'Thanh Hoá'),
(34, 2, 'Nghệ An'),
(35, 2, 'Hà Tĩnh'),
(36, 2, 'Quảng Bình'),
(37, 2, 'Quảng Trị'),
(38, 2, 'Thừa Thiên Huế'),
(39, 2, 'Đà Nẵng'),
(40, 2, 'Quảng Nam'),
(41, 2, 'Quảng Ngãi'),
(42, 2, 'Bình Định'),
(43, 2, 'Phú Yên'),
(44, 2, 'Khánh Hoà'),
(45, 2, 'Ninh Thuận'),
(46, 2, 'Bình Thuận'),
(47, 2, 'Kon Tum'),
(48, 2, 'Gia Lai'),
(49, 2, 'Đắk Lắk'),
(50, 2, 'Đắk Nông'),
(51, 2, 'Lâm Đồng'),
(52, 2, 'Bình Phước'),
(53, 2, 'Tây Ninh'),
(54, 2, 'Bình Dương'),
(55, 2, 'Đồng Nai'),
(56, 2, 'Bà Rịa - Vũng Tàu'),
(57, 2, 'Long An'),
(58, 2, 'Tiền Giang'),
(59, 2, 'Bến Tre'),
(60, 2, 'Trà Vinh'),
(61, 2, 'Vĩnh Long'),
(62, 2, 'Đồng Tháp'),
(63, 2, 'An Giang'),
(64, 2, 'Kiên Giang'),
(65, 2, 'Cần Thơ'),
(66, 2, 'Hậu Giang'),
(67, 2, 'Sóc Trăng'),
(68, 2, 'Bạc Liêu'),
(69, 2, 'Cà Mau');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `job` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `income` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `getmarried` int(11) DEFAULT NULL,
  `alcohol` int(11) DEFAULT NULL,
  `cigarettes` int(11) DEFAULT NULL,
  `daysoff` int(11) DEFAULT NULL,
  `user_character` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_about` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '\'avt_placeholder.svg\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`block_id`),
  ADD KEY `block_user_id` (`block_user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Chỉ mục cho bảng `images_post`
--
ALTER TABLE `images_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Chỉ mục cho bảng `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Chỉ mục cho bảng `relationships`
--
ALTER TABLE `relationships`
  ADD PRIMARY KEY (`relationship_id`),
  ADD KEY `user_1` (`user_1`),
  ADD KEY `user_2` (`user_2`);

--
-- Chỉ mục cho bảng `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blocks`
--
ALTER TABLE `blocks`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `images_post`
--
ALTER TABLE `images_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `relationships`
--
ALTER TABLE `relationships`
  MODIFY `relationship_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `blocks_ibfk_1` FOREIGN KEY (`block_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `blocks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`state_id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `images_post`
--
ALTER TABLE `images_post`
  ADD CONSTRAINT `images_post_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Các ràng buộc cho bảng `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);

--
-- Các ràng buộc cho bảng `relationships`
--
ALTER TABLE `relationships`
  ADD CONSTRAINT `relationships_ibfk_1` FOREIGN KEY (`user_1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `relationships_ibfk_2` FOREIGN KEY (`user_2`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `countries` (`country_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
