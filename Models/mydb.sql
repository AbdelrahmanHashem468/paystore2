-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2018 at 08:19 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `pro_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `n_pro` int(20) NOT NULL DEFAULT '1',
  `count` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`pro_id`, `cust_id`, `n_pro`, `count`) VALUES
(7, 6, 1, 1),
(5, 6, 1, 2),
(12, 4, 1, 3),
(16, 8, 1, 5),
(5, 8, 1, 6),
(15, 2, 1, 7),
(12, 2, 1, 8),
(13, 9, 1, 9),
(15, 9, 1, 10),
(13, 9, 1, 11),
(30, 11, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  `phone_n` int(50) DEFAULT NULL,
  `my_image` varchar(100) DEFAULT 'mem.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `age`, `email`, `password`, `id`, `address`, `city`, `country`, `zip_code`, `phone_n`, `my_image`) VALUES
('abdo', 20, 'sa3d.clay@gmail.com', '987456321', 1, 'Almade', 'Cairo', 'Egypt', 'z1245', 1000459877, 'test.jpeg'),
('ahmed ali', 20, 'ahmed.ali@gmail.com', '65465456456546', 2, NULL, NULL, NULL, NULL, NULL, 'mem.png'),
('ahmed', 25, 'abdo_atef61@yahoo.com', 'gfgdfgdhhgsda', 4, NULL, NULL, NULL, NULL, NULL, 'two-friends.jpg'),
('Khaled Gmal', 22, 'khaled_gmal@yahoo.com', '85469875225', 5, NULL, NULL, NULL, NULL, NULL, 'mem.png'),
('Osama Kaml', 20, 'Osama_om@gmail.com', 'uh958462', 6, NULL, NULL, NULL, NULL, NULL, 'mem.png'),
('fared', 12, 'fared@yahoo.com', '987456321', 9, NULL, NULL, NULL, NULL, NULL, 'mem.png'),
('Mohamed', 33, 'mohamed@yahoo.com', '123456789', 10, 'Empapa', 'Giza', 'Egypt', 'x456', 1000459877, 'ralph_fiennes_actor_beard_smile_108364_602x339.jpg'),
('Saleh', 22, 'saleh@yahoo.com', '987654321', 11, NULL, NULL, NULL, NULL, NULL, 'mem.png');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `cust_id` int(10) NOT NULL,
  `products` varchar(100) NOT NULL,
  `quantities` varchar(100) NOT NULL,
  `total_cost` float NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`cust_id`, `products`, `quantities`, `total_cost`, `pay_method`, `id`) VALUES
(1, '20.12.30', '1.2.1', 193, 'Visa', 1),
(1, '32', '1', 45, 'Visa', 2),
(10, '22.27.5', '2.2.2', 360.4, 'Visa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `love`
--

CREATE TABLE `love` (
  `cust_id` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `n_love` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `love`
--

INSERT INTO `love` (`cust_id`, `pro_id`, `n_love`) VALUES
(1, 29, 2),
(1, 28, 3),
(10, 19, 4),
(10, 5, 5),
(10, 15, 6),
(1, 27, 11),
(11, 25, 12),
(1, 25, 13),
(10, 25, 14),
(1, 30, 15);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Brand` varchar(30) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(10) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Name`, `Type`, `Brand`, `Price`, `Quantity`, `image_name`, `description`) VALUES
(2, 'pro2', 'Bag', 'brandx', 22, 6, 'banner01.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(4, 'pro4', 'Phone', 'Hisense', 46, 9, 'Haisense.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(5, 'pro4', 'Laptop', 'hp', 98.6, 8, 'HP.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(10, 'pro8', 'Dress', 'brandx', 35, 8, 'Women-Casual-Dress.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(12, 'pro10', 'Phone', 'Windows', 36, 1, 'windows-phone.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(15, 'pro13', 'Phone', 'barandx', 26.7, 8, 'Samsung-Galaxy-Slider-Side-S6.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(16, 'pro14', 'Dress', 'brandt', 78, 8, 'women_clothes1.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(18, 'pro15', 'Tablet', 'brandz', 45.6, 8, 'tab1.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(19, 'pro16', 'Laptop', 'Apple', 85.7, 4, 'Apple.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(20, 'pro16', 'Laptop', 'Toshipa', 75.4, 5, 'Toshipa.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(21, 'pro17', 'Tablet', 'barandx', 58, 10, 'product.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(22, 'pro18', 'Tablet', 'brandy', 45.8, 1, 'tab2.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(23, 'pro19', 'Dress', 'brandz', 42.8, 5, 'women_clothes2.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(24, 'pro20', 'Bag', 'brandx', 46, 5, 'product01.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(25, 'pro21', 'Bag', 'brandy', 58.4, 8, 'banner03.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(26, 'pro22', 'Watch', 'brandy', 43, 6, 'product02.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(27, 'watch', 'Watch', 'brandx', 35.8, 6, 'wat1.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(28, 'pro24', 'Watch', 'brandY', 35.7, 8, 'wat3.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(29, 'tab55', 'Tablet', 'Samsung', 56.2, 3, 'tab10.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(30, 'tab9', 'Tablet', 'Lenovo', 45.6, 6, 'tab9.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(31, 'asp', 'Tablet', 'Dell', 25, 1, 'tab6.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(32, 'tap', 'Tablet', 'brandx', 45, 7, 'tab7.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `cust_id` int(10) NOT NULL,
  `text` varchar(255) NOT NULL,
  `time` date NOT NULL,
  `n_report` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`cust_id`, `text`, `time`, `n_report`) VALUES
(1, 'THis is best site forever', '2018-04-14', 1),
(10, 'I have a problem in adding products to my cart', '2018-04-14', 2),
(2, 'some thing to test', '2018-04-18', 3),
(1, 'I\"ll be happy to try your site', '2018-04-23', 4),
(1, '\"aplle\"', '2018-04-23', 5),
(1, '', '2018-04-24', 6),
(1, '', '2018-04-24', 7),
(1, 'I\'ll be happy to try your site', '2018-04-24', 8);

-- --------------------------------------------------------

--
-- Table structure for table `sold_products`
--

CREATE TABLE `sold_products` (
  `count` int(20) NOT NULL,
  `pro_id` int(20) NOT NULL,
  `pro_qn` int(20) NOT NULL,
  `cust_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sold_products`
--

INSERT INTO `sold_products` (`count`, `pro_id`, `pro_qn`, `cust_id`) VALUES
(1, 20, 1, 1),
(2, 12, 2, 1),
(3, 30, 1, 1),
(4, 32, 1, 1),
(5, 22, 2, 10),
(6, 27, 2, 10),
(7, 5, 2, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `love`
--
ALTER TABLE `love`
  ADD PRIMARY KEY (`n_love`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`n_report`);

--
-- Indexes for table `sold_products`
--
ALTER TABLE `sold_products`
  ADD PRIMARY KEY (`count`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `count` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `love`
--
ALTER TABLE `love`
  MODIFY `n_love` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `n_report` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sold_products`
--
ALTER TABLE `sold_products`
  MODIFY `count` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
