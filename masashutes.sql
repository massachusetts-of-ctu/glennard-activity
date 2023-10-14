-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 05:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masashutes`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `school` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fullname`, `position`, `school`, `image`) VALUES
(1, 'Ken O\'Bryan', 'Back-End Engineer', 'CTU- Danao Campus', 'img\\member\\Ken.jpg'),
(2, 'Nathaniel Rossel', 'Programmer', 'CTU- Danao Campus', 'img\\member\\Nat.jpg'),
(3, 'Mark Jason Roble', 'Programmer', 'CTU- Danao Campus', 'img\\member\\Mark.jpg'),
(4, 'Jim Hearty Coca', 'Front-End Engineer', 'CTU- Danao Campus', 'img\\member\\Jim.jpg'),
(58, 'Kem Gwapa', 'Front-End Designer', 'CTU - Danao Campus', 'img\\member\\Kem.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `email`, `password`) VALUES
(2, 'test', '123@123.123', '$2y$10$PGPidavHGoXUpbYD.PacNe3nDpr4cm0qyzSI23QzbznIqniCfCMa.'),
(3, 'admin', 'admin@admin.admin', '$2y$10$2gUjuC2V7HsSmDJsBVQWJOSZL6dfFH3FbRIzNhdnL0jip2aWSKS9C'),
(4, '1111', '1111@111.111', '$2y$10$NPgyZiIezN0zZHsrmx/Rm.gSD7jeIRIheonBIC4HL9RyzF7CH2Hy2'),
(5, '123', '123', '$2y$10$jndMEwnb7rtvI/jQRqoBXutW.j6PY6vkrCZkSjBQiUq9NvafmNFz.'),
(6, 'masashutes', 'masashutes@masashutes.masashutes', '$2y$10$95cwjR8hQyS1WnGXaWWzt.d1FjaSOowvpTs/XnxzUbQiwVZh0Mr6m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
