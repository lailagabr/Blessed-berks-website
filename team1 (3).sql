-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 07:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `admin_qa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_phone`, `admin_qa`) VALUES
(12, 'Alaa', 'alaa@gmail.com', '$2y$10$mGFdyLkRW/5bEgrUPWgEp.bl1w7g2tod.QHafG9aXgpQ9hEFGYHvG', '01234567892', 'alaa'),
(13, 'Menna', 'menna@gmail.com', '$2y$10$RsqGC/EMly1qsAMtoyY1suUcGYbA.H2cgUt2aCvA.F0mpLIwnRx3i', '01012345678', 'menna'),
(14, 'Shahd', 'shahd@gmail.com', '$2y$10$xecJoL/5StvtTsdcXf2xreyWXaA7Wbyir9DkZXexCIkgciGsXfvYW', '01236598479', 'shahd'),
(15, 'Amal', 'amal@gmail.com', '$2y$10$cVIWo4IJ8LngGlotN7k.kePlFD3ZvqkbxvR7duYQ0g9mCyb0EHMQi', '01147896325', 'amal6'),
(16, 'Esraa', 'esraa@gmail.com', '$2y$10$iXJFdSDuH96C19e7y6noF./zC4v2.BA/SMVKgFg2YaNWwDWHl/PIu', '01012345678', 'esraa');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'cat'),
(2, 'dog');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_location` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `pet_type` varchar(255) NOT NULL,
  `pet_gender` varchar(255) NOT NULL,
  `pet_age` varchar(255) NOT NULL,
  `pet_photo` longtext NOT NULL,
  `pet_address` varchar(255) NOT NULL,
  `vaccine_name` varchar(255) NOT NULL,
  `vaccine_date` varchar(255) NOT NULL,
  `pet_bio` varchar(255) NOT NULL,
  `mate` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`pet_id`, `pet_name`, `pet_type`, `pet_gender`, `pet_age`, `pet_photo`, `pet_address`, `vaccine_name`, `vaccine_date`, `pet_bio`, `mate`, `user_id`) VALUES
(17, 'meshmesh', 'cat', 'male', '2 years', 'Playful American Bobtail Cat Loafin.jpeg', '40 st. ,alexandria', 'vaccined', '2024-07-04', 'Cute cat loves playing around', '1', 7),
(19, 'basbosa', 'cat', 'male', '3', '9632e4619c423e0a574030f35de36791.jpg', '35 st. ,cairo', 'vaccined', '2024-07-03', 'Cute cat loves playing around', '1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_review` varchar(255) DEFAULT NULL,
  `product_photo` longtext NOT NULL,
  `product_price` float NOT NULL,
  `inventory` int(11) NOT NULL,
  `product_descrption` varchar(255) NOT NULL,
  `pet_type` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `hidden` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_review`, `product_photo`, `product_price`, `inventory`, `product_descrption`, `pet_type`, `category_id`, `hidden`) VALUES
(23, 'dog bowl', NULL, 'Shulemin Dog Bowl Slow Feeder Double Stainless Steel Pet Bowls,Pink.jpeg', 10, 30, '', NULL, 2, 'show'),
(27, 'Dog Harness', NULL, '!!.jpeg', 20, 15, 'Corduroy Pink Dog Harness', NULL, 2, 'hide'),
(31, 'slippers dog', NULL, '!!.jpeg', 4, 66, 'sdfghjk', NULL, 1, 'show'),
(32, 'cat bowl', NULL, '069fb4480463c5e90e01635ef3637ede.jpg', 32, 32, 'jvkschiaeso', NULL, 2, 'show');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_qa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_gender`, `user_phone`, `user_address`, `user_qa`) VALUES
(4, 'rana', 'ran@gmail.com', '$2y$10$NcBrG6/SFJBKph.ApLDkieeHBbALlYtODy2XUccySVGGH5YxG1jR.', 'female', '11111111111', 'fythhjioloiuy', ''),
(5, 'rana', 'sara@g', '$2y$10$oOY8GHBE6RYyW1vKIs01bedILCFG62xYX.EEo5IQ90HEKMpj.Nava', 'female', '11111111111', 'gfyuiop[', ''),
(6, 'alaa', 'alaa@gmail.com', '$2y$10$fhMCoUxN/mLDIbThQUuxNuGnt1X8UfQuzxhjlwkba263RCDepy.QS', 'female', '11111111111', 'fythhjioloiuy', ''),
(7, 'sara', 'sarass@gmail', '$2y$10$CjZMg.7lYJumc3OW8/EMV.fz7j6SNIxHG/CYpOLv.XKGFQTT7OGj6', 'female', '11111111111', 'tyuiop[', 'gyhuji'),
(8, 'Mohamed Ali', 'ali@gmail.com', '$2y$10$4/Fh7L.D9rWVqcvWfk6jcO2DtNQMBZo5Em8qBrAaJD/4xm2asj96a', 'male', '09213883893', 'paris st.', 'ball');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
