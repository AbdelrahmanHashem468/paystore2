-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2018 at 05:28 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id6489889_mydb`
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
(30, 11, 2, 17),
(32, 17, 1, 18),
(31, 20, 1, 24),
(33, 23, 1, 25),
(35, 29, 2, 28),
(34, 29, 1, 29),
(35, 30, 5, 30),
(34, 30, 1, 31);

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
('abdo', 20, 'sa3d.clay@gmail.com', '987456321', 1, 'rtyrty', 'yrtyrty', 'yrtyrty', 'yyrtyrty', 8687587, 'mem.jpg'),
('ahmed ali', 20, 'ahmed.ali@gmail.com', '65465456456546', 2, NULL, NULL, NULL, NULL, NULL, 'mem.jpg'),
('ahmed', 25, 'abdo_atef61@yahoo.com', 'gfgdfgdhhgsda', 4, NULL, NULL, NULL, NULL, NULL, 'mem.jpg'),
('Khaled Gmal', 22, 'khaled_gmal@yahoo.com', '85469875225', 5, NULL, NULL, NULL, NULL, NULL, 'mem.jpg'),
('Osama Kaml', 20, 'Osama_om@gmail.com', 'uh958462', 6, NULL, NULL, NULL, NULL, NULL, 'mem.jpg'),
('Mohamed', 33, 'mohamed@yahoo.com', '123456789', 10, 'Empapa', 'Giza', 'Egypt', 'x456', 1000459877, 'mem.jpg'),
('Saleh', 22, 'saleh@yahoo.com', '987654321', 11, NULL, NULL, NULL, NULL, NULL, 'mem.jpg'),
('ergerter', 15, 'asdfssa@ehrwser.fsdf', 'werrwerwerwer', 12, '234w234', 'rwerwer', 'werwer', 'werwerwe', 526556, 'mem.jpg'),
('husa', 45, 'huga@gmail.com', '45581231565456', 13, NULL, NULL, NULL, NULL, NULL, 'mem.jpg'),
('ghgfhgf', 77, 'adaasd@fgd.com', 'rxfsu23456', 16, NULL, NULL, NULL, NULL, NULL, 'mem.jpg'),
('dfgdfgdfg', 25, 'asdasdasd.asdfasd@tre.vom', 'gtegtegtegtegte', 17, NULL, NULL, NULL, NULL, NULL, 'mem.jpg'),
('fgeger', 45, 'werwer@gmail.com', 'gxg2x4426', 18, NULL, NULL, NULL, NULL, NULL, 'mem.jpg'),
('frewf', 45, 'wef@gmail.com', 'g2xg67gs', 19, NULL, NULL, NULL, NULL, NULL, 'mem.jpg'),
('sdxas', 18, 'asdasd@gmail.com', '23456789', 20, 'retet', 'werwerwer', 'werwer', '12345', 2147483647, 'mem.jpg'),
('Ahmed', 22, 'ahmed2@gmail.com', '1:98765432', 21, NULL, NULL, NULL, NULL, NULL, 'mem.jpg'),
('asdas', 15, 'asdasd@yahoo.com', 'tegtegee', 22, NULL, NULL, NULL, NULL, NULL, 'mem.jpg'),
('Ffff', 15, 'ddfd@gmail.com', 'lhllh:g', 23, NULL, NULL, NULL, NULL, NULL, 'mem.jpg'),
('sfsdf', 20, 'aasddsa@erwe.com', '23456789:6', 25, 'rwerwer', 'werwer', 'rwerwer', '12547', 2147483647, 'mem.jpg'),
('eretwe fdgdf', 15, 'wrwerwe@yahoo.com', '23456789:', 27, 'fsdfsdfsd', 'fsdfsdf', 'sdfsdfs', '12345', 2147483647, 'mem.jpg'),
('Gg gg', 20, 'fhfj@gmail.com', 'iekelelmtt', 28, NULL, NULL, NULL, NULL, NULL, 'mem.jpg'),
('adsa asdsad', 15, 'sfdsa@gmail.com', '23445643teteg', 29, NULL, NULL, NULL, NULL, NULL, 'mem.jpg'),
('khaled shabaan', 21, 'khaled@gmail.com', 'libmfe2345', 30, NULL, NULL, NULL, NULL, NULL, '5b9800447c9ce0.21324617.jpg'),
('G gg', 55, 'jejek@jfkf.com', 'gigklele234', 31, NULL, NULL, NULL, NULL, NULL, '5bf4a0731dd5b4.01088184.jpg'),
('adas asd', 19, 'asdas@gmail.com', '23456789:', 35, NULL, NULL, NULL, NULL, NULL, 'mem.png');

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
  `id` int(20) NOT NULL,
  `end_time` date NOT NULL,
  `Visa_Acc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`cust_id`, `products`, `quantities`, `total_cost`, `pay_method`, `id`, `end_time`, `Visa_Acc`) VALUES
(1, '20.12.30', '1.2.1', 193, 'Visa', 1, '2018-05-02', NULL),
(1, '32', '1', 45, 'Visa', 2, '2018-05-02', NULL),
(1, '25', '1', 58.4, 'Visa', 4, '2018-05-02', NULL),
(1, '26', '1', 43, 'Visa', 5, '2018-05-02', NULL),
(1, '26', '1', 43, 'Visa', 6, '2018-05-02', NULL),
(1, '26', '1', 43, 'Visa', 7, '2018-05-02', NULL),
(1, '26', '1', 43, 'Visa', 8, '2018-05-02', NULL),
(1, '19.30.22', '2.1.1', 262.8, 'Visa', 9, '2018-05-02', NULL),
(12, '10', '1', 35, 'Visa', 10, '2018-05-02', NULL),
(1, '29', '1', 56.2, 'Visa', 11, '2018-05-02', NULL),
(1, '4.27', '2.1', 127.8, 'Visa', 12, '2018-05-02', NULL),
(14, '26', '1', 43, 'Visa', 13, '2018-05-26', NULL),
(20, '29.20', '1.1', 75.4, 'Visa', 14, '2018-07-21', NULL),
(20, '28', '1', 35.7, 'Paypal', 15, '2018-07-21', NULL),
(20, '19', '1', 85.7, 'Paypal', 16, '2018-07-21', NULL),
(20, '21', '1', 58, 'Paypal', 17, '2018-07-21', 'sdfsdf@yahoo.com'),
(25, '28', '1', 35.7, 'Visa', 18, '2018-07-23', '1478523698521478'),
(27, '28', '1', 35.7, 'Paypal', 19, '2018-08-14', 'dsadas@gmail.com');

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
(1, 30, 15),
(1, 26, 16);

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
(4, 'pro4', 'Phone', 'Hisense', 46, 7, 'Haisense.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(5, 'pro4', 'Laptop', 'hp', 98.6, 8, 'HP.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(10, 'pro8', 'Dress', 'brandx', 35, 7, 'Women-Casual-Dress.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(12, 'pro10', 'Phone', 'Windows', 36, 1, 'windows-phone.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(15, 'pro13', 'Phone', 'barandx', 26.7, 8, 'Samsung-Galaxy-Slider-Side-S6.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(16, 'pro14', 'Dress', 'brandt', 78, 8, 'women_clothes1.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(18, 'pro15', 'Tablet', 'brandz', 45.6, 8, 'tab1.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(19, 'pro16', 'Laptop', 'Apple', 85.7, 1, 'Apple.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(20, 'pro16', 'Laptop', 'Toshipa', 75.4, 4, 'Toshipa.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(21, 'pro17', 'Tablet', 'barandx', 58, 9, 'product.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(22, 'pro18', 'Tablet', 'brandy', 45.8, 0, 'tab2.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(23, 'pro19', 'Dress', 'brandz', 42.8, 5, 'women_clothes2.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(24, 'pro20', 'Bag', 'brandx', 46, 5, 'product01.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(25, 'pro21', 'Bag', 'brandy', 58.4, 7, 'banner03.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(26, 'pro22', 'Watch', 'brandy', 43, 1, 'product02.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(28, 'pro24', 'Watch', 'brandY', 35.7, 5, 'wat3.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(31, 'asp', 'Tablet', 'Dell', 25, 0, 'tab6.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(32, 'tap', 'Tablet', 'brandx', 45, 6, 'tab7.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter'),
(33, 'tv', 'Laptop', 'jcnjk', 4454, 24, 'apple_iphone.jpg', NULL),
(35, 'heloolap', 'Laptop', 'hp', 500, 1, 'Dell-Inspiron.jpg', NULL),
(48, 'se', 'Tablet', 'xd', 54, 54, '5b4f50c40f0690.75597197.jpg', NULL);

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
(1, 'I\'ll be happy to try your site', '2018-04-24', 8),
(1, '', '2018-04-26', 9),
(1, '', '2018-04-26', 10),
(1, '', '2018-04-26', 11),
(1, '', '2018-04-26', 12),
(1, '', '2018-04-26', 13),
(2, '', '2018-04-26', 14),
(2, '', '2018-04-26', 15),
(2, '', '2018-04-26', 16),
(12, '', '2018-04-26', 17),
(1, '; select text from report --', '2018-06-11', 18),
(1, '; select text from report +--', '2018-06-11', 19),
(19, '', '2018-07-15', 20),
(19, '', '2018-07-15', 21),
(19, '', '2018-07-15', 22),
(19, '', '2018-07-15', 23),
(19, '', '2018-07-15', 24),
(19, 'sdf', '2018-07-15', 25),
(20, 'jhb', '2018-07-15', 26),
(30, 'yug', '2018-09-11', 27);

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
(7, 5, 2, 10),
(8, 25, 1, 1),
(9, 26, 1, 1),
(10, 26, 1, 1),
(11, 26, 1, 1),
(12, 26, 1, 1),
(13, 19, 2, 1),
(14, 30, 1, 1),
(15, 22, 1, 1),
(16, 10, 1, 12),
(17, 29, 1, 1),
(18, 4, 2, 1),
(19, 27, 1, 1),
(20, 26, 1, 14),
(21, 29, 1, 20),
(22, 20, 1, 20),
(23, 28, 1, 20),
(24, 19, 1, 20),
(25, 21, 1, 20),
(26, 28, 1, 25),
(27, 28, 1, 27);

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
  MODIFY `count` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `love`
--
ALTER TABLE `love`
  MODIFY `n_love` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `n_report` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sold_products`
--
ALTER TABLE `sold_products`
  MODIFY `count` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
