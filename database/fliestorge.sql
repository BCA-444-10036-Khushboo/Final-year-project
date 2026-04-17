-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2026 at 12:16 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydrive`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'aman', 'ashu776681@gmail.com', 'howa', '2026-04-09 08:42:22'),
(2, 'NITISH kumar', 'nitishyadav97711@gmail.com', 'ug', '2026-04-09 09:22:57'),
(3, 'nitish', 'nitishyadav97711@gmail.com', 'testing\r\n', '2026-04-10 10:46:23'),
(4, 'aman', 'ashu776681@gmail.com', 'my message', '2026-04-11 09:34:44'),
(5, 'nitsh', 'learn3439@gmail.com', 'tesing', '2026-04-11 12:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_pass` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reg_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activation_code` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `plans` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'free',
  `used_storage` double NOT NULL DEFAULT '0',
  `purchase_date` date DEFAULT NULL,
  `storage` double NOT NULL DEFAULT '20',
  `expiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `full_name`, `user_email`, `user_pass`, `reg_date_time`, `activation_code`, `status`, `plans`, `used_storage`, `purchase_date`, `storage`, `expiry_date`) VALUES
(52, 'Khushu', 'ky140367@gmail.com', '202cb962ac59075b964b07152d234b70', '2025-11-07 19:33:43', '268829', 'active', 'gold', 0.3, '2026-03-07', 102400, '2026-04-06'),
(63, 'Nitish Kumar', 'nitishyadav97711@gmail.com', '202cb962ac59075b964b07152d234b70', '2026-03-16 16:38:45', '826810', 'active', 'premium', 0.8400000000000001, '2026-04-09', 512000, '2026-05-09'),
(68, 'Nitish Kumar', 'ashu776681@gmail.com', '202cb962ac59075b964b07152d234b70', '2026-04-11 09:31:54', '483196', 'active', 'silver', 1.13, '2026-04-11', 51200, '2026-05-11'),
(69, 'Nitish kumar', 'learn3439@gmail.com', '202cb962ac59075b964b07152d234b70', '2026-04-11 12:36:39', '035912', 'active', 'silver', 1.81, '2026-04-11', 51200, '2026-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `plan_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `razorpay_order_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `razorpay_payment_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `plan_name`, `amount`, `payment_date`, `razorpay_order_id`, `razorpay_payment_id`) VALUES
(1, 52, 'silver', 499.00, '2026-02-12 19:22:21', 'order_ABC123', 'pay_XYZ456'),
(5, 68, 'silver', 170.00, '2026-04-11 09:33:56', 'order_Sc2xZCUEMpCGQz', 'pay_Sc2xl12aBl0qQz'),
(6, 69, 'gold', 320.00, '2026-04-11 12:38:53', 'order_Sc66vFoGA1Fmvt', 'pay_Sc678lw2XlgCMw'),
(7, 69, 'silver', 170.00, '2026-04-11 12:40:41', 'order_Sc68sNR7fkVzW2', 'pay_Sc6911upY4impl');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `Name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Message` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_54`
--

CREATE TABLE `user_54` (
  `id` int NOT NULL,
  `file_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_size` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_54`
--

INSERT INTO `user_54` (`id`, `file_name`, `file_size`, `date_time`) VALUES
(1, 'xyz.jpg', '0.1', '2026-01-19 15:36:57'),
(2, 'shivaa.jpg', '1.03', '2026-01-19 15:37:02'),
(3, 'gemini_generated_image_gb9j25gb9j25gb9j.png', '4.69', '2026-01-19 15:37:35'),
(4, 'nitish hcl service desk resume (1).pdf', '0.01', '2026-01-19 15:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_55`
--

CREATE TABLE `user_55` (
  `id` int NOT NULL,
  `file_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_size` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_55`
--

INSERT INTO `user_55` (`id`, `file_name`, `file_size`, `date_time`) VALUES
(1, 'xyz.jpg', '0.1', '2026-01-19 16:16:21'),
(2, 'shivaa.jpg', '1.03', '2026-01-19 16:16:25'),
(3, 'teach for india resume nitish.pdf', '0.02', '2026-01-20 08:14:43'),
(4, 'dt20257459588_application_form.pdf', '0.03', '2026-01-20 08:30:00'),
(5, 'dt20257447142_application_form (2).pdf', '0.03', '2026-01-20 08:30:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_57`
--

CREATE TABLE `user_57` (
  `id` int NOT NULL,
  `file_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_size` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_59`
--

CREATE TABLE `user_59` (
  `id` int NOT NULL,
  `file_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_size` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `star` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'no',
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_59`
--

INSERT INTO `user_59` (`id`, `file_name`, `file_size`, `star`, `date_time`) VALUES
(12, '12th marksheet_khushu.jpeg', '0.08', 'no', '2026-03-07 13:37:55'),
(13, 'shivampicture.jpeg', '0.09', 'no', '2026-03-07 13:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_60`
--

CREATE TABLE `user_60` (
  `id` int NOT NULL,
  `file_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_size` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `star` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'no',
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_60`
--

INSERT INTO `user_60` (`id`, `file_name`, `file_size`, `star`, `date_time`) VALUES
(2, 'stpdrive.sql', '0.01', 'no', '2026-03-15 10:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_61`
--

CREATE TABLE `user_61` (
  `id` int NOT NULL,
  `file_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_size` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `star` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'no',
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_61`
--

INSERT INTO `user_61` (`id`, `file_name`, `file_size`, `star`, `date_time`) VALUES
(1, 'screenshot 2026-02-13 080909.png', '1.98', 'no', '2026-03-15 15:09:03'),
(2, 'screenshot 2026-02-13 080840.png', '1.76', 'no', '2026-03-15 15:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_63`
--

CREATE TABLE `user_63` (
  `id` int NOT NULL,
  `file_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_size` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `star` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'no',
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_63`
--

INSERT INTO `user_63` (`id`, `file_name`, `file_size`, `star`, `date_time`) VALUES
(3, 'screenshot (5).png', '0.47', 'yes', '2026-03-16 16:39:31'),
(4, 'screenshot (8).png', '0.29', 'no', '2026-03-16 16:39:37'),
(10, 'stpdrive (3).sql', '0.01', 'yes', '2026-03-21 10:22:59'),
(11, '10th marksheet_khushu.jpeg', '0.07', 'no', '2026-04-09 10:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_64`
--

CREATE TABLE `user_64` (
  `id` int NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `activation_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_65`
--

CREATE TABLE `user_65` (
  `id` int NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_size` varchar(100) DEFAULT NULL,
  `star` varchar(100) DEFAULT 'no',
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_65`
--

INSERT INTO `user_65` (`id`, `file_name`, `file_size`, `star`, `date_time`) VALUES
(1, 'screenshot (1).png', '0.99', 'no', '2026-04-10 10:27:22'),
(2, 'screenshot (2).png', '0.45', 'no', '2026-04-10 10:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_67`
--

CREATE TABLE `user_67` (
  `id` int NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_size` varchar(100) DEFAULT NULL,
  `star` varchar(100) DEFAULT 'no',
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_67`
--

INSERT INTO `user_67` (`id`, `file_name`, `file_size`, `star`, `date_time`) VALUES
(1, 'screenshot (1).png', '0.99', 'no', '2026-04-10 10:43:59'),
(2, 'screenshot (8).png', '0.29', 'no', '2026-04-10 10:44:04'),
(3, 'screenshot (6).png', '0.28', 'no', '2026-04-10 10:44:08'),
(4, 'screenshot (12).png', '1.31', 'yes', '2026-04-10 10:44:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_54`
--
ALTER TABLE `user_54`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_55`
--
ALTER TABLE `user_55`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_57`
--
ALTER TABLE `user_57`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_59`
--
ALTER TABLE `user_59`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_60`
--
ALTER TABLE `user_60`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_61`
--
ALTER TABLE `user_61`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_63`
--
ALTER TABLE `user_63`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_64`
--
ALTER TABLE `user_64`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_65`
--
ALTER TABLE `user_65`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_67`
--
ALTER TABLE `user_67`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_54`
--
ALTER TABLE `user_54`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_55`
--
ALTER TABLE `user_55`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_57`
--
ALTER TABLE `user_57`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_59`
--
ALTER TABLE `user_59`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_60`
--
ALTER TABLE `user_60`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_61`
--
ALTER TABLE `user_61`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_63`
--
ALTER TABLE `user_63`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_64`
--
ALTER TABLE `user_64`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_65`
--
ALTER TABLE `user_65`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_67`
--
ALTER TABLE `user_67`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
