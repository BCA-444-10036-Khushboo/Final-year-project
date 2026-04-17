-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2026 at 02:28 PM
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
-- Database: `stpdrive`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `reg_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `plans` varchar(100) NOT NULL DEFAULT 'free',
  `used_storage` double NOT NULL DEFAULT 0,
  `purchase_date` date DEFAULT NULL,
  `storage` double NOT NULL DEFAULT 20,
  `expiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `reg_date_time`, `activation_code`, `status`, `plans`, `used_storage`, `purchase_date`, `storage`, `expiry_date`) VALUES
(52, 'Khushu', 'ky140367@gmail.com', '202cb962ac59075b964b07152d234b70', '2025-11-07 19:33:43', '268829', 'active', 'silver', 26, '2026-02-12', 51200, '2026-03-14'),
(55, 'Nitish Kumar', 'ashu776681@gmail.com', '202cb962ac59075b964b07152d234b70', '2026-01-19 16:15:38', '649827', 'active', 'free', 1.2100000000000002, '2026-01-25', 512000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_51`
--

CREATE TABLE `user_51` (
  `id` int(11) NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_size` varchar(100) DEFAULT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_51`
--

INSERT INTO `user_51` (`id`, `file_name`, `file_size`, `date_time`) VALUES
(24, 'screenshot (1).png', '0.99', '2025-11-15 17:39:07'),
(25, 'by avtar abhishek singhal (1).png', '0.87', '2025-11-15 17:39:15'),
(27, 'cybersecurity.pdf', '0.34', '2025-11-15 17:39:52'),
(28, 'bgcolor.html', '0', '2025-11-15 17:40:04'),
(29, '.html', '0', '2025-11-15 17:44:37'),
(30, 'xbox recording - google search - google chrome 2023-10-30 10-20-35.mp4', '9', '2025-11-15 18:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_52`
--

CREATE TABLE `user_52` (
  `id` int(11) NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_size` varchar(100) DEFAULT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_52`
--

INSERT INTO `user_52` (`id`, `file_name`, `file_size`, `date_time`) VALUES
(31, 'kundan pic.jpg', '0.02', '2026-01-04 15:57:21'),
(32, 'myphoto.jpeg', '0.05', '2026-01-04 16:03:28'),
(33, 'operating system ppt.pptx', '3.47', '2026-01-04 16:03:40'),
(34, 'kundanform.pdf', '0.44', '2026-01-04 16:04:11'),
(35, 'nifty.jpg', '0.16', '2026-01-04 20:18:43'),
(36, 'aadhar mere.jpeg', '0.06', '2026-01-08 09:13:46'),
(37, 'marksheet 10th.jpeg', '0.06', '2026-01-08 09:14:02'),
(38, 'shivaa.jpg', '1.03', '2026-01-19 15:24:32'),
(39, 'dt20257447142_application_form (2).pdf', '0.03', '2026-01-25 09:18:05'),
(40, 'tcs_ignite_cpp_practice_codes.pdf', '0', '2026-01-25 09:19:57'),
(41, 'सावधान कल्कि अवतार की चेतवानी भारत में बच्चो पर आनी वाली है बड़ी मुसीबत.png', '0.78', '2026-01-25 09:20:16'),
(42, 'shicampic.jpg', '0.01', '2026-02-12 17:07:39'),
(43, '2025-10-19 13-28-30.mkv', '19.89', '2026-02-12 17:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_53`
--

CREATE TABLE `user_53` (
  `id` int(11) NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_size` varchar(100) DEFAULT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_53`
--

INSERT INTO `user_53` (`id`, `file_name`, `file_size`, `date_time`) VALUES
(1, 'aadhar mere.jpeg', '0.06', '2026-01-08 09:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_54`
--

CREATE TABLE `user_54` (
  `id` int(11) NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_size` varchar(100) DEFAULT NULL,
  `date_time` datetime DEFAULT current_timestamp()
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
  `id` int(11) NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_size` varchar(100) DEFAULT NULL,
  `date_time` datetime DEFAULT current_timestamp()
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
-- Table structure for table `user_56`
--

CREATE TABLE `user_56` (
  `id` int(11) NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_size` varchar(100) DEFAULT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_51`
--
ALTER TABLE `user_51`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_52`
--
ALTER TABLE `user_52`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_53`
--
ALTER TABLE `user_53`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user_56`
--
ALTER TABLE `user_56`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user_51`
--
ALTER TABLE `user_51`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_52`
--
ALTER TABLE `user_52`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_53`
--
ALTER TABLE `user_53`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_54`
--
ALTER TABLE `user_54`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_55`
--
ALTER TABLE `user_55`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_56`
--
ALTER TABLE `user_56`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
