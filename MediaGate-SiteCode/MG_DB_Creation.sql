-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 06:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mg_diag`
--

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `channel_id` int(11) NOT NULL,
  `channel_id_plan` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`channel_id`, `channel_id_plan`, `name`, `notes`) VALUES
(1, 11, 'Familiy Pack', 'Familiy Pack - Note');

-- --------------------------------------------------------

--
-- Table structure for table `channels2customer`
--

CREATE TABLE `channels2customer` (
  `id` int(11) NOT NULL,
  `cusomer_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `channels2customer`
--

INSERT INTO `channels2customer` (`id`, `cusomer_id`, `channel_id`) VALUES
(1, 101, 1),
(2, 102, 1),
(3, 103, 1),
(4, 104, 1);

-- --------------------------------------------------------

--
-- Table structure for table `channels_plan`
--

CREATE TABLE `channels_plan` (
  `id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `channel_name` varchar(15) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `channels_plan`
--

INSERT INTO `channels_plan` (`id`, `channel_id`, `channel_name`, `note`) VALUES
(1, 1, 'channel1', 'channel1-note');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `CusName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(25) NOT NULL,
  `joined_date` date NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `CusName`, `email`, `phone`, `address`, `joined_date`, `customer_id`) VALUES
(101, 'Israel Israeli', 'Israel@Israel.com', 12345678, 'street 1', '2020-12-16', 101),
(102, 'Asher Patael', 'Asher@Asher.com', 52000000, '', '2020-12-15', 102),
(103, 'Noam Shriki', 'Noam@Noam.com', 0, '', '2014-09-02', 103),
(104, 'Ester Cohen', 'Ester@Ester.com', 0, '', '2014-08-13', 104);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text NOT NULL,
  `alt_phone` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `pass_update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `username`, `password`, `email`, `phone`, `address`, `alt_phone`, `role`, `manager_id`, `pass_update_date`) VALUES
(1, 'ono', '$2y$10$3BjmBIoCMwCVFs6/vBd44uyYFixUE7uv8qOxvg3aFd15dVRw3FYBq', 'test@test.com', 12345678, 'street4', 87654321, 1, 1, '2022-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `employees_permission`
--

CREATE TABLE `employees_permission` (
  `id` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `PermissionType` text NOT NULL,
  `ChangeDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employees_permission`
--

INSERT INTO `employees_permission` (`id`, `employeeID`, `PermissionType`, `ChangeDate`) VALUES
(1, 1, 'Admin', '2022-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `manager_id`, `name`, `phone`, `email`) VALUES
(1, 1, 'Manager1', 12345678, 'manager@mg.com');

-- --------------------------------------------------------

--
-- Table structure for table `password_hist`
--

CREATE TABLE `password_hist` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `password_hist`
--

INSERT INTO `password_hist` (`id`, `employee_id`, `password`, `date`) VALUES
(1, 1, 0, '2022-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `streamer`
--

CREATE TABLE `streamer` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `model` varchar(8) NOT NULL COMMENT 'model',
  `version` varchar(5) NOT NULL COMMENT '2.0',
  `type` enum('HD','SD','4K') NOT NULL DEFAULT 'HD',
  `status` enum('AVAILABLE','INFIX','USE','BROKEN') NOT NULL DEFAULT 'AVAILABLE',
  `SerialNum` varchar(15) NOT NULL,
  `IP` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `streamer`
--

INSERT INTO `streamer` (`id`, `model`, `version`, `type`, `status`, `SerialNum`, `IP`) VALUES
(1, 'HD1', '1.1', '4K', 'INFIX', '12345', '192.168.1.1'),
(2, 'm1', '1.2', 'HD', 'BROKEN', 'HDm190', '192.168.12.13'),
(3, 'm2', '1.1', '4K', 'USE', 'HDMId180', '192.168.12.14'),
(4, 'm3', '1.3', 'SD', 'BROKEN', 'SDMA150', '192.168.12.15'),
(5, 'm4', '1.3', 'SD', 'USE', 'SDMA151', '192.168.12.16'),
(6, 'm5', '1.1', '4K', 'USE', '4KMA250', '192.168.12.17');

-- --------------------------------------------------------

--
-- Table structure for table `streamer2account`
--

CREATE TABLE `streamer2account` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `streamer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `streamer2account`
--

INSERT INTO `streamer2account` (`id`, `account_id`, `streamer_id`) VALUES
(58, 102, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD KEY `channel_id` (`channel_id`);

--
-- Indexes for table `channels2customer`
--
ALTER TABLE `channels2customer`
  ADD KEY `cusomer_id` (`cusomer_id`,`channel_id`),
  ADD KEY `channel_id` (`channel_id`);

--
-- Indexes for table `channels_plan`
--
ALTER TABLE `channels_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `channel_id` (`channel_id`),
  ADD KEY `channel_id_2` (`channel_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `employees_permission`
--
ALTER TABLE `employees_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `password_hist`
--
ALTER TABLE `password_hist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `streamer`
--
ALTER TABLE `streamer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `version` (`version`);

--
-- Indexes for table `streamer2account`
--
ALTER TABLE `streamer2account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `streamer_id` (`streamer_id`) USING BTREE,
  ADD KEY `account_id` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `streamer`
--
ALTER TABLE `streamer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `streamer2account`
--
ALTER TABLE `streamer2account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `channels`
--
ALTER TABLE `channels`
  ADD CONSTRAINT `channels_ibfk_1` FOREIGN KEY (`channel_id`) REFERENCES `channels_plan` (`channel_id`) ON DELETE CASCADE;

--
-- Constraints for table `channels2customer`
--
ALTER TABLE `channels2customer`
  ADD CONSTRAINT `channels2customer_ibfk_1` FOREIGN KEY (`channel_id`) REFERENCES `channels_plan` (`channel_id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `channels2customer` (`cusomer_id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `managers` (`manager_id`) ON DELETE CASCADE;

--
-- Constraints for table `employees_permission`
--
ALTER TABLE `employees_permission`
  ADD CONSTRAINT `employees_permission_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `password_hist`
--
ALTER TABLE `password_hist`
  ADD CONSTRAINT `password_hist_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `streamer2account`
--
ALTER TABLE `streamer2account`
  ADD CONSTRAINT `streamer2account_ibfk_1` FOREIGN KEY (`streamer_id`) REFERENCES `streamer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `streamer2account_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
