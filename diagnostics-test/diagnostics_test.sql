-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 01:38 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diagnostics_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`) VALUES
(12, 'Cynthia Wright', 'lydulid@mailinator.com', '01950381570', 'Cupidatat reiciendis', 'Bkash', '24 hrs Urinary Cortisol(1)', '350'),
(13, 'Murphy Dillon', 'riwuwadi@mailinator.com', '01950381570', 'Pariatur Nisi volup', 'Debit/Credit Card', '24 hrs Urinary Cortisol(1), Urinary Protein (Spot)(1), GeneXpert MTB/RIF (TISSUE)(1)', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_dept` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_qty` int(11) NOT NULL DEFAULT 1,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_dept`, `product_price`, `product_qty`, `product_image`, `product_code`) VALUES
(1, 'GeneXpert MTB/RIF (TISSUE)', 'Dept: MICROBIOLOGY', '200', 1, 'image/flask.jpg', 'p1000'),
(2, 'Urinary Protein (Spot)', 'Dept: CLINICAL PATHOLOGY', '450', 1, 'image/flask.jpg', 'p1001'),
(3, '24 hrs Urinary Cortisol', 'Dept: IMMUNOLOGY', '350', 1, 'image/flask.jpg', 'p1002'),
(4, 'FUNGAL CULTURE SDA', 'Dept: MICROBIOLOGY', '150', 1, 'image/flask.jpg', 'p1003'),
(5, '75 gm Glucose', 'Dept: BIOCHEMISTRY', '250', 1, 'image/flask.jpg', 'p1004'),
(6, 'Blood Sugar 2hrs ABF', 'Dept: BIOCHEMISTRY', '450', 1, 'image/flask.jpg', 'p1005'),
(7, 'ADENO VIRUS', 'Dept: PCR LAB', '750', 1, 'image/flask.jpg', 'p1006'),
(8, 'Bilirubin Total Blood', 'Dept: BIOCHEMISTRY', '600', 1, 'image/flask.jpg', 'p1007'),
(9, 'ASO Titre', 'Dept: SEROLOGY', '500', 1, 'image/flask.jpg', 'p1008'),
(10, 'Acid Phosphatase', 'Dept: BIOCHEMISTRY', '800', 1, 'image/flask.jpg', 'p1009'),
(11, 'Dengue Antibody IgM', 'Dept: IMMUNOLOGY', '700', 1, 'image/flask.jpg', 'p1010'),
(12, 'EB Virus,PCR (Qualitative)', 'Dept: PCR LAB', '900', 1, 'image/flask.jpg', 'p1011');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code_2` (`product_code`),
  ADD KEY `product_code` (`product_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
