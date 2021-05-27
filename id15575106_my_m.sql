-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2021 at 01:50 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15575106_my_m`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_shop`
--

CREATE TABLE `cart_shop` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_shopping` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quntity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_shop`
--

INSERT INTO `cart_shop` (`id`, `id_item`, `id_user`, `date_shopping`, `quntity`, `price`) VALUES
(86, 43, 70, '2021-02-04 12:42:10', 1, 90);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `allow_visible` tinyint(4) NOT NULL DEFAULT 1,
  `alllow_comment` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `allow_visible`, `alllow_comment`) VALUES
(12, 'بيتزا ايطالي ', 'رقائق مثل الفطير والحشو على الوجه\r\n', 1, 1),
(13, 'البيتزا  شرقي', ' عجينة وفوقها حشوات بأطعم مختلفة', 1, 1),
(14, 'الفطائر', 'فطائر مع اضافه الكاستر', 1, 1),
(15, 'الحلو', 'فؤبرلالاتىنةمو', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `date`, `image`, `category_id`, `user_id`) VALUES
(42, 'بيتزا سلامي وخلي الفقير ياكل ', ' جبنه + سلامي+خضروات وتراببزات بلياردو وبينج', '15', '2021-02-02', 'download.jfif', 12, 30),
(43, 'بيتزا سلامي', 'الفطيرة الشرقية المعتادة لا يوجد حشو على وجهها', '90', '2021-02-02', 'download (1).jfif', 13, 30),
(44, 'بيتزا فراخ', 'جبن + فراخ باربكيو', '80', '2021-02-20', 'download.jfif', 13, 30);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `statue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `subject`, `content`, `admin_id`, `statue`) VALUES
(9, 'عروض ', 'خصم', 30, 1),
(10, 'عروض رمضان ', 'خصم ١٥٪ علي الدليفري', 30, 0),
(11, 'saiedo', 'dalkwdjauwj', 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_pay` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `price` int(11) NOT NULL,
  `quntity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `id_item`, `id_user`, `date_pay`, `price`, `quntity`) VALUES
(8, 42, 33, '2021-02-02 00:12:08', 160, 2),
(9, 43, 33, '2021-02-02 00:12:08', 90, 1),
(10, 43, 33, '2021-02-02 04:16:15', 90, 1),
(11, 43, 33, '2021-02-06 09:24:19', 90, 1),
(12, 42, 33, '2021-02-06 09:24:19', 160, 2),
(13, 43, 71, '2021-02-08 13:10:56', 1350, 15),
(14, 44, 33, '2021-02-20 22:47:54', 160, 2),
(15, 43, 33, '2021-02-20 22:47:54', 270, 3),
(16, 42, 33, '2021-03-04 04:14:51', 160, 2),
(17, 44, 33, '2021-03-04 04:14:51', 160, 2),
(18, 43, 33, '2021-03-04 04:14:51', 180, 2),
(19, 43, 30, '2021-05-12 04:32:41', 90, 1),
(20, 44, 30, '2021-05-12 04:32:41', 80, 1),
(21, 42, 30, '2021-05-12 04:32:41', 45, 3),
(22, 42, 30, '2021-05-14 12:16:28', 15, 1),
(23, 44, 30, '2021-05-14 12:16:28', 80, 1),
(24, 43, 30, '2021-05-14 12:16:28', 180, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `trusted` int(11) NOT NULL DEFAULT 0,
  `statue` int(11) NOT NULL DEFAULT 0,
  `RegisteredAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `trusted`, `statue`, `RegisteredAt`) VALUES
(30, 'fouad mohamed fouad', 'fouad@123', '601f1889667efaebb33b8c12572835da3f027f78', 1, 0, 0, '2020-05-04'),
(32, '1122', '112233@0', '1f4a04e5543d8760660bb080226040b987b88d47', 0, 0, 0, '2020-08-04'),
(33, 'a4', '111@888', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 0, '2020-10-27'),
(48, '55555555', '66666666@1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 0, '2021-02-02'),
(49, 'adawd', 'fouadmohamedfouad67@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 0, '2021-02-02'),
(50, '98765421', '9846312@1', '62ea8251549b9e707d93d98de38e3f13a486016e', 0, 0, 0, '2021-02-02'),
(51, '8946312', '8465123@1', 'cf662e297e99a2514591935877693eade4bfe49a', 0, 0, 0, '2021-02-02'),
(52, '98465132', '8946213@11', '6f2932caa4f2b003342dc935e6c9a866af158e32', 0, 0, 0, '2021-02-02'),
(55, 'aaaaaaaaaaaaaaa88', '2256@1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 0, '2021-02-02'),
(56, 'aaaaaaaaaaaaaaa88', '2256@1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 0, '2021-02-02'),
(57, '8989', '9999@11111', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 0, '2021-02-02'),
(58, 'pppp', 'pp@22', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 0, '2021-02-02'),
(59, '89798789', '987897891@2222', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 0, '2021-02-02'),
(60, '98789', '897987@1', '77e1a16b64924f5f7fb94d0a942ee8bef6e95fe1', 0, 0, 0, '2021-02-02'),
(61, '89789798789', '11111111111@555', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 0, '2021-02-02'),
(62, 'fouad mohamed fouad', '11@h', '99e2b89f3cda731add47da0c4a7698c1e4c80ba3', 0, 0, 0, '2021-02-02'),
(63, 'abdo', 'abdo123@1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 0, '2021-02-02'),
(64, 'Fouad', 'fouad@011', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 0, '2021-02-02'),
(65, 'Abdulrahman Soliman', 'abdoullsoliman@gmail.com', 'c9072201c5e1dbdf42e03cc7205602f76d9a6cf5', 0, 0, 0, '2021-02-02'),
(66, 'Said', 'saied0216@gmail.com', '15abadac9c16fba58fae2cf15bbbc841ac149a72', 0, 0, 0, '2021-02-03'),
(67, 'Said', 'saiedahmedd74@gmail.com', '15abadac9c16fba58fae2cf15bbbc841ac149a72', 0, 0, 0, '2021-02-03'),
(68, 'abdo', 'abdo@123', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 0, '2021-02-03'),
(69, 'user255', 'user@1234', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 0, '2021-02-04'),
(70, '998', '9988888@11', '601f1889667efaebb33b8c12572835da3f027f78', 0, 0, 0, '2021-02-04'),
(71, '12345', 'ahmed.moahmed442@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 0, 0, 0, '2021-02-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_shop`
--
ALTER TABLE `cart_shop`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member` (`user_id`),
  ADD KEY `category` (`category_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_shop`
--
ALTER TABLE `cart_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_shop`
--
ALTER TABLE `cart_shop`
  ADD CONSTRAINT `cart_shop_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `cart_shop_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
