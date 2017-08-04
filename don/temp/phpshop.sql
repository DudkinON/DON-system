-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2016 at 08:21 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Laptops', 1, 1),
(2, 'Tablets', 2, 1),
(3, 'Monitors', 3, 1),
(4, 'Computers', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float NOT NULL,
  `availability` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` int(11) NOT NULL DEFAULT '0',
  `is_recommended` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `description`, `is_new`, `is_recommended`, `status`, `image`) VALUES
(34, 'Laptop Asus X200MA (X200MA-KX315D)', 1, 1839707, 395, 1, 'Asus', 'Screen 11.6 "(1366x768) HD LED, glossy / Intel Pentium N3530 (2.16 - 2.58 GHz) / RAM 4GB / HDD 750GB / Intel HD Graphics / without OD / Bluetooth 4.0 / Wi-Fi / LAN / webcam / no OS / 1.24 kg / blue', 0, 0, 1, 'Asus_X200MA.jpg'),
(35, 'Laptop  HP Stream 11-d050nr', 1, 2343847, 305, 0, 'Hewlett Packard', '\nScreen 11.6 "(1366x768) HD LED, matte / Intel Celeron N2840 (2.16 GHz) / RAM 2 GB / eMMC 32GB / Intel HD Graphics / without OD / Wi-Fi / Bluetooth / Web camera / Windows 8.1 + MS Office 365 / 1.28 kg / blue', 1, 1, 1, 'HP_Stream_11_d050nr.jpg'),
(36, 'Laptop  Asus X200MA White ', 1, 2028027, 270, 1, 'Asus', '\nScreen 11.6 "(1366x768) HD LED, glossy / Intel Celeron N2840 (2.16 GHz) / RAM 2GB / HDD 500GB / Intel HD Graphics / without OD / Bluetooth 4.0 / Wi-Fi / LAN / webcam / no OS / 1.24 kg / white', 0, 1, 1, 'Asus_X200MA_White.jpg'),
(37, 'Laptop  Acer Aspire E3-112-C65X', 1, 2019487, 325, 1, 'Acer', '\nScreen 11.6 \'\' (1366x768) HD LED, matte / Intel Celeron N2840 (2.16 GHz) / RAM 2GB / HDD 500GB / Intel HD Graphics / without OD / LAN / Wi-Fi / Bluetooth / Web camera / Linpus / 1.29 kg / silver', 0, 1, 1, 'Acer_Aspire_E3_112_C65X.jpg'),
(38, 'Laptop  Acer TravelMate TMB115', 1, 1953212, 275, 1, 'Acer', 'Screen 11.6 \'\' (1366x768) HD LED, matte / Intel Celeron N2840 (2.16 GHz) / RAM 2GB / HDD 500GB / Intel HD Graphics / without OD / LAN / Wi-Fi / Bluetooth 4.0 / Webcam / Linpus / 1.32 kg / black', 0, 0, 1, 'Acer_TravelMate_TMB115.jpg'),
(39, 'Laptop  Lenovo Flex 10', 1, 1602042, 370, 0, 'Lenovo', '\nScreen 10.1 "(1366x768) HD LED, touch, glossy / Intel Celeron N2830 (2.16 GHz) / RAM 2GB / HDD 500GB / Intel HD Graphics / without OD / Wi-Fi / Bluetooth / Web camera / Windows 8.1 / 1.2 kg / black', 0, 0, 1, 'Lenovo_Flex_10.jpg'),
(40, 'Laptop Asus X751MA', 1, 2028367, 430, 1, 'Asus', '\nScreen 17.3 "(1600x900) HD + LED, glossy / Intel Pentium N3540 (2.16 - 2.66 GHz) / RAM 4GB / HDD 1TB / Intel HD Graphics / DVD Super Multi / LAN / Wi-Fi / Bluetooth 4.0 / Webcam / DOS / 2.6 kg / white', 0, 1, 1, 'Asus_X751MA.jpg'),
(41, 'Samsung Galaxy Tab S 10.5 16GB', 2, 1129365, 780, 1, 'Samsung', '\nSamsung Galaxy Tab S is created to make your life better. Enjoy your content with a covering 94% of the colors Adobe RGB and 100,000: 1 contrast ratio, which is provided with screen sAmoled optimization function for image display and the environment. The bright 10.5 "screen ultra-thin body weight of 467 g will give you a high level of portability. The work will be easier with Hancom Office and remote access to your PC. E-Meeting and WebEx - the perfect assistant for the meetings when you are away from the office. Securely store your data thanks to a fingerprint scanner.', 1, 1, 1, 'Samsung_Galaxy_Tab_S_10.5_16GB.jpg'),
(42, 'Samsung Galaxy Tab S 8.4 16GB', 2, 1128670, 640, 1, 'Samsung', 'Screen 8.4 "Super AMOLED (2560x1600) Capacitive Multi-Touch / Samsung Exynos 5420 (1.9 GHz + 1.3 GHz) / RAM 3 GB / 16 GB internal memory + support for memory cards microSD / Bluetooth 4.0 / Wi-Fi 802.11 a / b / g / n / ac / 8MP main camera, 2.1 megapixel front-facing / the GPS / GLONASS / Android 4.4.2 (KitKat) / 294 g / white', 0, 0, 1, 'Samsung_Galaxy_Tab_S_84_16GB.jpg'),
(43, 'Gazer Tegra Note 7', 2, 683364, 210, 1, 'Gazer', 'Screen 7 "IPS (1280x800) Capacitive Multi-Touch / NVIDIA Tegra 4 (1.8 GHz) / RAM 1 GB / 16 GB internal memory + support for memory cards microSD / Wi-Fi / Bluetooth 4.0 / main camera 5 megapixel, front - 0.3 MP / GPS / GLONASS / Android 4.4.2 (KitKat) / weight 320 g', 0, 0, 1, 'Gazer_Tegra_Note_7.jpg'),
(44, 'Monitor 23" Dell E2314H Black', 3, 355025, 175, 1, 'Dell', 'With the expansion of Full HD, you can see the smallest details. Dell E2314H will provide you with a sharp and clear image, with which any work is a pleasure. Full HD 1920 x 1080 at 60 Hz resolution (max.)', 0, 0, 1, '23_Dell_E2314H_Black.jpg'),
(45, 'Computer Everest Game ', 4, 1563832, 1320, 1, 'Everest', 'Everest Game 9085 - are computers premimum class gathered on the basis of exclusive components, carefully selected and tested the best experts of our company. This top-end segment of the system, which meets the best characteristics of quality and performance.\n', 0, 0, 1, 'Everest_Game.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_comment`, `user_id`, `date`, `products`, `status`) VALUES
(45, 'Teodor', '+1(516)117-81-18', '123123123', 4, '2015-05-14 09:54:45', '{"1":1,"2":1,"3":2}', 3),
(46, 'Sasha', '+1(516)117-81-18', '', 4, '2015-05-18 15:34:42', '{"44":3,"43":3}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Oleg Dudkin', 'sumon-web@ya.ru', '14161820Lf', 'admin'),
(3, 'Alex', 'alex@mail.com', '111111', ''),
(5, 'Tomos', 'serg@mail.com', '111111', ''),
(6, 'Georg', 'get-web@ya.ru', 'sag4h74aha', ''),
(10, 'Tony Soprano', 'bot-web@ya.ru', 'sgsdbds54ds65ns', ''),
(11, 'Frank', 'jes@even.com', '123456789', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
