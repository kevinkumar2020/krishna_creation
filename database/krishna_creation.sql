-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2022 at 08:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krishna_creation`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories_handwork`
--

CREATE TABLE `categories_handwork` (
  `handwork_id` int(11) NOT NULL,
  `handwork_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories_handwork`
--

INSERT INTO `categories_handwork` (`handwork_id`, `handwork_type`) VALUES
(1, 'Diamond'),
(2, 'Khatli'),
(3, 'Single Head'),
(4, 'Brush Print'),
(5, 'Table Work'),
(6, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories_jobwork`
--

CREATE TABLE `categories_jobwork` (
  `jobwork_id` int(11) NOT NULL,
  `jobwork_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_party`
--

CREATE TABLE `tbl_party` (
  `party_id` int(11) NOT NULL,
  `party_name` varchar(50) NOT NULL,
  `party_address` text NOT NULL,
  `party_gst` varchar(25) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_party`
--

INSERT INTO `tbl_party` (`party_id`, `party_name`, `party_address`, `party_gst`, `status`, `created_at`, `update_at`) VALUES
(1, 'testing', 'address123', 'nifbf6567bhjbhb', 1, '2022-03-10 19:09:15', '2022-03-10 19:09:15'),
(2, 'dsfsdsdf', 'sdsff 7786786', 'sfdsfdsfsd989', 0, '2022-03-10 19:13:34', '2022-03-10 19:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `user_id` int(11) NOT NULL,
  `role_id` varchar(10) DEFAULT NULL,
  `name` varchar(60) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `handwork_id` varchar(15) DEFAULT '6',
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`user_id`, `role_id`, `name`, `phone`, `password`, `handwork_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '7', 'kevin', '7046772943', 'defac44447b57f152d14f30cea7a73cb', '6', 1, '2022-03-08 15:26:09', '2022-03-08 15:26:09'),
(2, '6', 'testing', '1234567890', '202cb962ac59075b964b07152d234b70', '3', 1, '2022-03-08 17:50:20', '2022-03-08 17:50:20'),
(3, '6', 'exam', '3456789999', '25d55ad283aa400af464c76d713c07ad', '4', 0, '2022-03-09 18:56:02', '2022-03-09 18:56:02'),
(4, '3', 'Rvs1990', '3456789990', '25d55ad283aa400af464c76d713c07ad', '6', 1, '2022-03-09 19:06:29', '2022-03-09 19:06:29'),
(5, '3', 'rmb1990r', '7046772948', '25d55ad283aa400af464c76d713c07ad', '6', 1, '2022-03-09 19:11:37', '2022-03-09 19:11:37'),
(6, '3', 'rmb1990r', '7046772946', '25d55ad283aa400af464c76d713c07ad', '4', 1, '2022-03-09 19:14:55', '2022-03-09 19:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role`) VALUES
(1, 'Supervisor'),
(2, 'In-House Production'),
(3, 'Third-Party Production'),
(4, 'Thread Cutting'),
(5, 'Stitching'),
(6, 'Hand-Works'),
(7, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories_handwork`
--
ALTER TABLE `categories_handwork`
  ADD PRIMARY KEY (`handwork_id`);

--
-- Indexes for table `categories_jobwork`
--
ALTER TABLE `categories_jobwork`
  ADD PRIMARY KEY (`jobwork_id`);

--
-- Indexes for table `tbl_party`
--
ALTER TABLE `tbl_party`
  ADD PRIMARY KEY (`party_id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories_handwork`
--
ALTER TABLE `categories_handwork`
  MODIFY `handwork_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories_jobwork`
--
ALTER TABLE `categories_jobwork`
  MODIFY `jobwork_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_party`
--
ALTER TABLE `tbl_party`
  MODIFY `party_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
