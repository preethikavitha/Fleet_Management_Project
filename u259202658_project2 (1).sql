-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 06:06 AM
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
-- Database: `u259202658_project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `amt_details`
--

CREATE TABLE `amt_details` (
  `book_id` int(11) DEFAULT NULL,
  `remamt` mediumtext DEFAULT NULL,
  `givamt` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `balancedetail`
--

CREATE TABLE `balancedetail` (
  `book_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `date_of_payment` datetime DEFAULT NULL,
  `amt_paid` mediumtext DEFAULT NULL,
  `remain_paid` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `borrower_name` varchar(20) NOT NULL,
  `pick_date` datetime DEFAULT NULL,
  `drop_date` datetime DEFAULT NULL,
  `Brand` varchar(30) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `from_location` varchar(20) NOT NULL,
  `from_location_address` varchar(20) NOT NULL,
  `aboutpackage` varchar(20) DEFAULT NULL,
  `book_date` datetime DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'pending',
  `num_plate_id` varchar(10) DEFAULT NULL,
  `empid` varchar(50) DEFAULT NULL,
  `type_of_place` varchar(20) DEFAULT NULL,
  `type_of_rent` varchar(10) DEFAULT NULL,
  `tot_amt` mediumtext DEFAULT 0,
  `date_of_return` datetime DEFAULT NULL,
  `extrausage` varchar(50) DEFAULT NULL,
  `extracharge` mediumtext DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `book_id` int(11) NOT NULL,
  `emailid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`borrower_name`, `pick_date`, `drop_date`, `Brand`, `category`, `from_location`, `from_location_address`, `aboutpackage`, `book_date`, `status`, `num_plate_id`, `empid`, `type_of_place`, `type_of_rent`, `tot_amt`, `date_of_return`, `extrausage`, `extracharge`, `duration`, `book_id`, `emailid`) VALUES
('Preethi', '2024-03-28 00:00:00', '2024-03-28 00:00:00', 'Ford', 'Car', '', '', 'with Driver', '2024-03-27 21:19:59', 'confirm', 'TN23GH8907', NULL, NULL, 'perhour', '680', NULL, NULL, NULL, '1 hour', 2, NULL),
('Preethi', '2024-04-06 00:00:00', '2024-04-06 00:00:00', 'Amstrong Military', 'Bike', 'trichy', 'egjwheb', 'with Driver', '2024-03-27 21:57:17', 'pending', 'TN67SB6767', 'Dv24FM21', 'RoadWay', 'perhour', '330', NULL, NULL, NULL, '1 hour', 3, NULL),
('Preethi', '2024-03-29 00:00:00', '2024-03-30 00:00:00', 'Ford', 'Car', '', '', 'with Driver', '2024-03-27 22:44:34', 'pending', 'TN23GH8907', NULL, NULL, 'perday', '2600', NULL, NULL, NULL, '2 day', 6, NULL),
('Preethi', '2024-03-29 00:00:00', '2024-03-30 00:00:00', 'Amstrong Military', 'Bike', '', '', 'with Driver', '2024-03-27 22:46:17', 'pending', 'TN67SB6767', NULL, NULL, 'perday', '1900', NULL, NULL, NULL, '2 day', 7, NULL),
('vinothini', '2024-03-31 00:00:00', '2024-03-31 00:00:00', 'Ford', 'Car', '', '', 'with Driver', '2024-03-29 21:11:06', 'pending', 'TN23GH8907', NULL, NULL, 'perhour', '-1154.6666666667', NULL, NULL, NULL, '-21.933333333333 hour', 8, NULL),
('vinothini', '2024-04-03 00:00:00', '2024-04-03 00:00:00', 'Ford', 'Car', '', '', 'with Driver', '2024-03-29 21:18:41', 'pending', 'TN23GH8907', NULL, NULL, 'perhour', '680', NULL, NULL, NULL, '1 hour', 9, NULL),
('vinothini', '2024-03-31 00:00:00', '2024-03-31 00:00:00', 'Hyundai i70', 'Scooter', '', '', 'with Driver', '2024-03-29 21:27:09', 'pending', 'TN23GH8999', NULL, NULL, 'perhour', '50', NULL, NULL, NULL, '1 hour', 10, NULL),
('Preethi', '2024-03-31 00:00:00', '2024-04-01 00:00:00', 'Ford', 'Car', '', '', 'with Driver', '2024-03-29 22:16:08', 'pending', 'TN23GH8907', NULL, NULL, 'perkm', '4200', NULL, NULL, NULL, NULL, 21, NULL),
('Preethi', '2024-04-19 00:00:00', '2024-04-20 00:00:00', 'Ford', 'Car', '', '', 'with Driver', '2024-04-09 21:30:47', 'pending', 'TN23GH8907', NULL, NULL, 'perkm', '4200', NULL, NULL, NULL, NULL, 24, NULL),
('yogi', '2024-04-12 00:00:00', '2024-04-14 00:00:00', 'Hyundai i70', 'Scooter', '', '', 'with Driver', '2024-04-09 21:41:42', 'pending', 'TN23GH8999', NULL, NULL, 'perkm', '0', NULL, NULL, NULL, NULL, 25, NULL),
('yogi', '2024-04-12 00:00:00', '2024-04-13 00:00:00', 'Amstrong Military', 'Bike', 'Coimbatore', 'MK road', 'with Driver', '2024-04-09 21:43:02', 'pending', 'TN67SB6767', 'Dv24FM20', 'HillStation', 'perkm', '1800', NULL, NULL, NULL, NULL, 26, NULL),
('Priyadharshini', '2024-04-11 00:00:00', '2024-04-11 00:00:00', 'Amstrong Military', 'Bike', 'Coimbatore', 'Thadaagam road', 'with Driver', '2024-04-09 22:30:35', 'pending', 'TN67SB6767', 'Dv24FM21', 'RoadWay', 'perhour', '410', NULL, NULL, NULL, '2 hour', 28, 'priya13@gmail.com'),
('yogi', '2024-04-19 00:00:00', '2024-04-24 00:00:00', 'BMW', 'Folding Bicycle', '', '', 'without Driver', '2024-04-09 23:29:30', 'pending', 'TN67SB4321', NULL, NULL, 'perday', '4400', NULL, NULL, NULL, '6 day', 29, 'yogi@gmail.com'),
('Komathi', '2024-04-20 00:00:00', '2024-04-20 00:00:00', 'Hyundai i70', 'Scooter', '', '', 'with Driver', '2024-04-12 21:24:44', 'pending', 'TN23GH8999', NULL, NULL, 'perhour', '50', NULL, NULL, NULL, '1 hour', 30, 'Komathi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `checkavail`
--

CREATE TABLE `checkavail` (
  `pick_date` date DEFAULT NULL,
  `drop_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkavail`
--

INSERT INTO `checkavail` (`pick_date`, `drop_date`) VALUES
('2024-01-21', '2024-01-21'),
('2024-01-27', '2024-01-27'),
('2024-01-27', '2024-01-27'),
('2024-01-26', '2024-02-02'),
('2024-02-10', '2024-02-20'),
('2024-01-25', '2024-02-11'),
('2024-01-27', '2024-01-27'),
('2024-01-21', '2024-01-22'),
('2024-01-21', '2024-01-22'),
('2024-01-21', '2024-01-22'),
('2024-01-21', '2024-01-22'),
('2024-01-22', '2024-01-25'),
('2024-01-22', '2024-01-26'),
('2024-01-23', '2024-01-26'),
('2024-01-22', '2024-01-24'),
('2024-01-26', '2024-01-30'),
('2024-01-24', '2024-01-25'),
('2024-01-23', '2024-01-25'),
('2024-01-24', '2024-01-25'),
('2024-01-31', '2024-02-10'),
('2024-01-25', '2024-01-29'),
('2024-01-25', '2024-01-29'),
('2024-01-26', '2024-01-29'),
('2024-01-26', '2024-01-29'),
('2024-01-24', '2024-02-01'),
('2024-01-26', '2024-01-28'),
('2024-01-25', '2024-01-27'),
('2024-01-25', '2024-01-27'),
('2024-01-25', '2024-01-28'),
('2024-02-01', '2024-02-11'),
('2024-01-24', '2024-02-09'),
('2024-01-26', '2024-02-08'),
('2024-01-25', '2024-02-02'),
('2024-01-25', '2024-01-26'),
('2024-01-24', '2024-01-24'),
('2024-01-24', '2024-01-24'),
('2024-01-26', '2024-01-26'),
('2024-01-25', '2024-01-27'),
('2024-01-25', '2024-01-27'),
('2024-01-25', '2024-01-27'),
('2024-01-28', '2024-01-29'),
('2024-01-27', '2024-01-27'),
('2024-01-28', '2024-01-29'),
('2024-01-28', '2024-01-30'),
('2024-01-28', '2024-01-30'),
('2024-01-29', '2024-01-31'),
('2024-01-29', '2024-01-31'),
('2024-01-29', '2024-01-31'),
('2024-01-29', '2024-01-31'),
('2024-01-29', '2024-01-29'),
('2024-01-29', '2024-01-30'),
('2024-01-30', '2024-01-31'),
('2024-01-30', '2024-01-31'),
('2024-01-30', '2024-02-02'),
('2024-02-09', '2024-03-01'),
('2024-02-14', '2024-02-23'),
('2024-02-20', '2024-03-08'),
('2024-02-13', '2024-02-21'),
('2024-02-14', '2024-03-07'),
('2024-02-12', '2024-02-29'),
('2024-02-29', '2024-03-09'),
('2024-02-22', '2024-03-01'),
('2024-02-21', '2024-03-08'),
('2024-02-20', '2024-02-21'),
('2024-02-21', '2024-03-08'),
('2024-02-21', '2024-03-10'),
('2024-02-23', '2024-02-23'),
('2024-02-17', '2024-02-20'),
('2024-02-24', '2024-02-24'),
('2024-02-14', '2024-02-15'),
('2024-02-20', '2024-02-29'),
('2024-02-20', '2024-02-20'),
('2024-02-27', '2024-03-06'),
('2024-02-29', '2024-03-09'),
('2024-02-21', '2024-03-08'),
('2024-02-14', '2024-02-29'),
('2024-03-23', '2024-03-26'),
('2024-02-14', '2024-02-15'),
('2024-02-14', '2024-02-15'),
('2024-02-21', '2024-03-01'),
('2024-02-21', '2024-02-23'),
('2024-02-20', '2024-02-21'),
('2024-02-11', '2024-02-16'),
('2024-02-12', '2024-02-15'),
('2024-02-13', '2024-02-22'),
('2024-02-12', '2024-02-29'),
('2024-02-15', '2024-02-17'),
('2024-02-24', '2024-03-07'),
('2024-02-22', '2024-03-07'),
('2024-02-20', '2024-02-29'),
('2024-02-20', '2024-02-29'),
('0000-00-00', '0000-00-00'),
('2024-09-02', '2024-10-02'),
('2024-03-04', '2024-03-05'),
('2024-03-04', '2024-03-05'),
('0000-00-00', '0000-00-00'),
('0000-00-00', '0000-00-00'),
('2024-03-04', '2024-03-05'),
('2024-03-04', '2024-03-05'),
('2024-03-04', '2024-03-05'),
('2024-03-04', '2024-03-05'),
('2024-03-04', '2024-03-05'),
('2024-02-27', '2024-03-10'),
('2024-02-21', '2024-03-10'),
('2024-02-19', '2024-03-09'),
('2024-02-19', '2024-03-09'),
('2024-02-19', '2024-03-09'),
('2024-02-19', '2024-03-09'),
('2024-03-01', '2024-03-19'),
('2024-03-01', '2024-03-19'),
('2024-02-23', '2024-02-25'),
('2024-02-23', '2024-02-28'),
('0000-00-00', '0000-00-00'),
('0000-00-00', '0000-00-00'),
('0000-00-00', '0000-00-00'),
('0000-00-00', '0000-00-00'),
('2024-02-22', '2024-02-24'),
('0000-00-00', '0000-00-00'),
('0000-00-00', '0000-00-00'),
('0000-00-00', '0000-00-00'),
('2024-02-23', '2024-02-24'),
('2024-02-23', '2024-02-24'),
('2024-02-24', '2024-02-29'),
('2024-02-15', '2024-02-23'),
('2024-02-21', '2024-02-24'),
('2024-02-15', '2024-02-15'),
('2024-02-23', '2024-02-25'),
('2024-02-23', '2024-02-25'),
('2024-02-28', '2024-03-08'),
('2024-02-28', '2024-03-08'),
('2024-02-14', '2024-03-01'),
('2024-02-14', '2024-03-01'),
('2024-02-23', '2024-02-28'),
('2024-02-14', '2024-02-15'),
('2024-02-15', '2024-02-23'),
('2024-02-16', '2024-02-29'),
('2024-02-23', '2024-02-29'),
('2024-02-23', '2024-02-25'),
('2024-02-23', '2024-02-25'),
('2024-02-23', '2024-02-25'),
('2024-03-02', '2024-04-07'),
('2024-03-09', '2024-03-29'),
('2024-03-09', '2024-03-29'),
('2024-03-10', '2024-03-14'),
('2024-03-10', '2024-03-14'),
('2024-03-09', '2024-03-13'),
('2024-02-13', '2024-02-21'),
('2024-02-13', '2024-02-21'),
('2024-02-22', '2024-02-24'),
('2024-02-27', '2024-03-08'),
('2024-02-13', '2024-03-02'),
('2024-03-09', '2024-03-09'),
('2024-03-02', '2024-03-02'),
('2024-02-13', '2024-02-29'),
('2024-02-21', '2024-02-21'),
('2024-02-21', '2024-02-21'),
('2024-02-21', '2024-02-21'),
('2024-02-14', '2024-02-22'),
('2024-02-12', '2024-02-13'),
('2024-02-15', '2024-02-23'),
('2024-02-15', '2024-02-17'),
('2024-02-15', '2024-02-17'),
('2024-02-23', '2024-02-23'),
('2024-02-14', '2024-02-14'),
('2024-02-28', '2024-03-08'),
('2024-02-14', '2024-02-15'),
('2024-02-14', '2024-02-19'),
('2024-02-14', '2024-02-28'),
('2024-02-14', '2024-02-15'),
('2024-02-14', '2024-02-14'),
('2024-02-14', '2024-02-16'),
('2024-02-14', '2024-02-29'),
('2024-02-14', '2024-03-02'),
('2024-02-15', '2024-02-16'),
('2024-02-14', '2024-02-15'),
('2024-02-14', '2024-02-15'),
('2024-02-14', '2024-02-22'),
('2024-02-16', '2024-02-25'),
('2024-02-15', '2024-02-15'),
('2024-02-15', '2024-02-15'),
('2024-02-15', '2024-02-23'),
('2024-02-14', '2024-02-14'),
('2024-02-14', '2024-02-14'),
('2024-02-14', '2024-02-14'),
('2024-02-14', '2024-02-14'),
('2024-02-14', '2024-02-14'),
('2024-02-15', '2024-02-16'),
('2024-02-15', '2024-02-16'),
('2024-02-21', '2024-02-23'),
('2024-02-14', '2024-02-14'),
('2024-02-23', '2024-03-02'),
('2024-02-15', '2024-02-24'),
('2024-02-15', '2024-02-16'),
('2024-02-15', '2024-02-16'),
('2024-02-14', '2024-02-14'),
('2024-02-15', '2024-02-16'),
('2024-02-19', '2024-02-22'),
('2024-02-16', '2024-02-22'),
('2024-03-10', '2024-03-29'),
('2024-02-15', '2024-02-22'),
('2024-02-16', '2024-02-17'),
('2024-02-16', '2024-02-17'),
('2024-02-16', '2024-02-18'),
('2024-02-16', '2024-02-18'),
('2024-02-17', '2024-02-22'),
('2024-02-17', '2024-02-19'),
('2024-02-24', '2024-03-10'),
('2024-02-24', '2024-03-01'),
('2024-03-09', '2024-03-31'),
('2024-02-18', '2024-02-18'),
('2024-02-25', '2024-03-01'),
('2024-02-18', '2024-02-25'),
('2024-02-18', '2024-02-19'),
('2024-02-19', '2024-02-23'),
('2024-03-10', '2024-03-13'),
('2024-03-08', '2024-03-22'),
('2024-02-28', '2024-03-02'),
('2024-02-24', '2024-03-07'),
('2024-03-24', '2024-03-31'),
('2024-03-29', '2024-04-06'),
('2024-03-26', '2024-04-05'),
('2024-03-17', '2024-03-18'),
('2024-03-29', '2024-03-30'),
('2024-03-27', '2024-03-28'),
('2024-03-27', '2024-03-28'),
('2024-03-28', '2024-03-31'),
('2024-03-28', '2024-03-29'),
('2024-03-31', '2024-04-02'),
('2024-03-30', '2024-03-30'),
('2024-03-29', '2024-03-29'),
('2024-03-29', '2024-03-30'),
('2024-03-29', '2024-03-29'),
('2024-03-28', '2024-03-28'),
('2024-03-28', '2024-03-28'),
('2024-03-28', '2024-03-28'),
('2024-04-06', '2024-04-06'),
('2024-03-29', '2024-03-29'),
('2024-03-29', '2024-03-30'),
('2024-03-29', '2024-03-30'),
('2024-03-31', '2024-03-31'),
('2024-04-03', '2024-04-03'),
('2024-03-31', '2024-03-31'),
('2024-04-07', '2024-04-07'),
('2024-03-31', '2024-04-01'),
('2024-03-31', '2024-03-31'),
('2024-03-31', '2024-03-31'),
('2024-03-31', '2024-04-07'),
('2024-03-31', '2024-04-01'),
('2024-03-31', '2024-04-01'),
('2024-03-31', '2024-03-31'),
('2024-04-19', '2024-04-20'),
('2024-04-12', '2024-04-14'),
('2024-04-12', '2024-04-13'),
('2024-04-20', '2024-04-20'),
('2024-04-11', '2024-04-11'),
('2024-04-19', '2024-04-24'),
('2024-04-20', '2024-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `bookid` int(11) NOT NULL,
  `dayamt` mediumtext DEFAULT NULL,
  `no_of_day` mediumtext DEFAULT NULL,
  `driver_charge` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`bookid`, `dayamt`, `no_of_day`, `driver_charge`) VALUES
(6, '1400', '2', '1000'),
(7, '1400', '2', '300'),
(29, '4200', '6', NULL),
(159, '0', '0', NULL),
(160, '0', '0', NULL),
(161, '0', '0', '1000'),
(164, '0', '0', NULL),
(166, '0', '0', '1000'),
(167, '0', '0', NULL),
(168, '0', '0', NULL),
(169, '0', '0', NULL),
(170, '0', '0', NULL),
(171, '0', '0', '3000'),
(172, '0', '0', NULL),
(173, '0', '0', NULL),
(174, '0', '0', '8000'),
(175, '0', '0', '2000'),
(176, '1400', '2', '2000'),
(177, '2100', '3', '2000'),
(178, '2800', '4', '3000'),
(179, '11900', '17', NULL),
(180, '9800', '14', '13000'),
(186, '2100', '3', '2000'),
(187, '2100', '3', '2000'),
(189, '2100', '3', '2000'),
(191, '1400', '2', NULL),
(193, '12600', '18', NULL),
(194, '6300', '9', NULL),
(195, '16100', '23', NULL),
(196, '16200', '18', '17000'),
(198, '11900', '17', NULL),
(201, '13300', '19', NULL),
(203, '2800', '4', NULL),
(205, '1400', '2', NULL),
(206, '7000', '10', '9000'),
(210, '4200', '6', '5000'),
(211, '7000', '10', NULL),
(212, '12600', '18', '5100'),
(213, '9100', '13', '3600'),
(214, '700', '1', NULL),
(215, '7000', '10', NULL),
(216, '15300', '17', NULL),
(217, '4200', '6', NULL),
(224, '25870.833333333', '36.958333333333', NULL),
(226, '3500', '5', NULL),
(227, '3500', '5', NULL),
(228, '6300', '9', NULL),
(229, '2100', '3', NULL),
(230, '7700', '11', NULL),
(231, '13300', '19', NULL),
(234, '700', '1', NULL),
(235, '700', '1', NULL),
(236, '6300', '9', NULL),
(239, '2100', '3', '2000'),
(242, '1400', '2', '1000'),
(243, '1400', '2', '1000'),
(248, '12600', '18', '17000'),
(249, '1400', '2', '1000'),
(250, '6300', '9', '8000'),
(262, '700', '1', NULL),
(263, '6300', '9', NULL),
(264, '7000', '10', NULL),
(265, '1400', '2', NULL),
(266, '1400', '2', NULL),
(267, '1400', '2', NULL),
(269, '2800', '4', '3000'),
(270, '4900', '7', NULL),
(272, '14000', '20', NULL),
(274, '14000', '20', NULL),
(275, '1400', '2', NULL),
(276, '1400', '2', '1000'),
(277, '1400', '2', NULL),
(278, '2100', '3', '2000'),
(279, '2100', '3', '2000'),
(280, '5400', '6', '5000'),
(281, '11200', '16', NULL),
(282, '11200', '16', NULL),
(283, '4900', '7', '6000'),
(284, '4900', '7', NULL),
(285, '23000', '23', '22000'),
(287, '5600', '8', '2100'),
(288, '1400', '2', NULL),
(289, '3500', '5', NULL),
(290, '5600', '8', '7000'),
(294, '9862.5', '10.958333333333', '9958.3333333333'),
(296, '1400', '2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `empid` varchar(50) NOT NULL,
  `empname` varchar(50) DEFAULT NULL,
  `drivetime` varchar(20) DEFAULT NULL,
  `salary` mediumtext DEFAULT NULL,
  `joindate` date DEFAULT NULL,
  `mobileno` mediumtext DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `mailID` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL CHECK (`age` >= 18),
  `isInsurance` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Available',
  `category` varchar(20) DEFAULT NULL,
  `profile` varchar(200) DEFAULT NULL,
  `leavedate` date DEFAULT NULL,
  `driveplace` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`empid`, `empname`, `drivetime`, `salary`, `joindate`, `mobileno`, `address`, `mailID`, `age`, `isInsurance`, `status`, `category`, `profile`, `leavedate`, `driveplace`) VALUES
('Dv24FM01', 'Natraj', 'Morning', '20000', '2024-01-09', '9807654321', 'Namakkal', 'natraj123@gmail.com', 23, 'Yes', 'Available', 'Car', 'images/driveimage.jpg', NULL, 'HillStation'),
('Dv24FM02', 'Boomi', ' Morning', '25000', '2024-01-15', '9807654321', 'salem', 'boom@gmail.com', 20, 'Yes', 'Available', 'Bike', NULL, NULL, 'Road way'),
('Dv24FM03', 'Prabha', 'Morning', '30000', '2024-01-09', '9807654321', 'karur', 'prab@gmail.com', 24, 'Yes', 'Available', 'MiniVan', NULL, NULL, 'Road way'),
('Dv24FM04', 'Saravanan', 'All', '30000', '2024-01-15', NULL, NULL, NULL, 45, 'Yes', 'Dismiss', 'Gear Bicycles', NULL, NULL, 'Hill station'),
('Dv24FM06', 'Dhilip', 'All', '30000', '2024-01-14', '8967452311', 'Namakkal', 'natraj6123@gmail.com', 45, 'Yes', 'Available', 'Van', NULL, NULL, 'Hill station'),
('Dv24FM07', 'Isai', ' Morning', '30000', '2024-01-02', '7604802397', 'Salem', 'raje@gmail.com', 28, 'Yes', 'Available', 'Bike', NULL, NULL, 'Hill station'),
('Dv24FM09', 'Gowtham', 'Night', '30000', '2024-01-15', '9807654367', 'karur', 'boomg@gmail.com', 43, 'Yes', 'Available', 'Van', NULL, NULL, 'Hill station'),
('Dv24FM10', 'Surya', 'All', '30000', '2024-01-16', '9807654328', 'Namakkal', 'prabs@gmail.com', 35, 'No', 'Available', 'Scooter', NULL, NULL, 'Road way'),
('Dv24FM11', 'Suriya', 'Morning', '30000', '2024-01-02', '9807654320', 'Namakkal', 'surya@gmail.com', 27, 'Yes', 'Available', 'Car', NULL, NULL, 'HillStation'),
('Dv24FM12', 'Gowtham', 'Morning', '30000', '2024-01-02', '8967452301', 'attur', 'gow@gmail.com', 25, 'Yes', 'Available', 'Car', NULL, NULL, 'RoadWay'),
('Dv24FM13', 'Vikram', 'Night', '32000', '2024-01-22', '8967452356', 'salem', 'vikr@gmail.com', 29, 'Yes', 'Available', 'Car', NULL, NULL, 'HillStation'),
('Dv24FM14', 'karthik', 'Night', '31000', '2024-01-08', '8967452389', 'salem', 'kart@gmail.com', 27, 'Yes', 'Available', 'Car', NULL, NULL, 'RoadWay'),
('Dv24FM15', 'Vikki', 'All', '35000', '2024-01-16', '8967452347', 'attur', 'viki@gmail.com', 23, 'Yes', 'Available', 'Car', NULL, NULL, 'HillStation'),
('Dv24FM16', 'Mahesh', 'All', '36000', '2024-01-09', '8967452345', 'salem', 'mahe@gmail.com', 25, 'Yes', 'Available', 'Car', NULL, NULL, 'RoadWay'),
('Dv24FM17', 'Anbu', 'Night', '27000', '2024-01-10', '9807654312', 'Trichy', 'anbu@gmail.com', 26, 'Yes', 'Available', 'MiniVan', NULL, NULL, 'RoadWay'),
('Dv24FM18', 'raja', 'Night', '60000', '2024-01-01', '7756456787', 'trichy', 'raja3@gmail.com', 45, 'Yes', 'Available', 'Bike', NULL, NULL, 'HillStation'),
('Dv24FM19', 'rajesh', 'Night', '60000', '2024-02-01', '7656786574', 'chennai', 'rajesh3@gmail.com', 40, 'Yes', 'Available', 'Bike', NULL, NULL, 'RoadWay'),
('Dv24FM20', 'Magesh', 'All', '60000', '2024-01-24', '7867456765', 'chennai', 'magesh3@gmail.com', 40, 'Yes', 'Available', 'Bike', NULL, NULL, 'HillStation'),
('Dv24FM21', 'ramesh', 'All', '60000', '2024-02-11', '7899009889', 'salem', 'ramesh4@gmail.com', 40, 'Yes', 'Available', 'Bike', NULL, NULL, 'RoadWay'),
('Dv24FM22', 'Durai', 'All', '67777', '2024-01-01', '7867789898', 'perambalur', 'durai@gmail.com', 34, 'Yes', 'Available', 'MiniVan', NULL, NULL, 'HillStation'),
('Dv24FM24', 'gowtham', 'Morning', '67889', '2024-01-01', '7899988908', 'salem', 'gowtham@gmail.com', 34, 'Yes', 'Available', 'MiniVan', NULL, NULL, 'HillStation'),
('Dv24FM25', 'gokul', 'Night', '78676', '2023-11-27', '8798879897', 'thirupur', 'gokul@gmail.com', 45, 'Yes', 'Available', 'MiniVan', NULL, NULL, 'HillStation'),
('Dv24FM26', 'Sathish', 'All', '67785', '2023-10-31', '7898564535', 'dindugal', 'sathish@gmail.com', 45, 'Yes', 'Available', 'MiniVan', NULL, NULL, 'RoadWay'),
('Dv24FM27', 'kumar', 'All', '40000', '2023-03-29', '8976898888', 'Chennai', 'kumar@gmail.com', 56, 'Yes', 'Dismiss', 'Van', NULL, NULL, 'HillStation'),
('Dv24FM28', 'keerthivasan', NULL, NULL, NULL, '8978899989', 'karur', 'keerthivasan@gmail.com', 45, NULL, 'Available', NULL, NULL, NULL, NULL),
('Dv24FM29', 'kumar', NULL, NULL, NULL, '8976785647', 'chennai', 'kumar3@gmail.com', 45, NULL, 'Available', NULL, NULL, NULL, NULL),
('Dv24FM31', 'suresh', 'Morning', '788887', '2023-11-02', '8976768788', 'chennai', 'suresh@gmail.com', 45, 'Yes', 'Available', 'Scooter', NULL, NULL, 'HillStation');

-- --------------------------------------------------------

--
-- Table structure for table `driveramt`
--

CREATE TABLE `driveramt` (
  `amt_id` int(11) NOT NULL,
  `night_charge` mediumtext DEFAULT NULL,
  `morning_charge` mediumtext DEFAULT NULL,
  `day_charge` mediumtext DEFAULT NULL,
  `kmcharge_night` mediumtext DEFAULT NULL,
  `kmcharge_morning` mediumtext DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driveramt`
--

INSERT INTO `driveramt` (`amt_id`, `night_charge`, `morning_charge`, `day_charge`, `kmcharge_night`, `kmcharge_morning`, `category`) VALUES
(1, '70', '50', '300', '30', '20', 'Bike'),
(2, '300', '400', '1000', '150', '100', 'Car'),
(3, '300', '500', '1700', '150', '100', 'MiniVan');

-- --------------------------------------------------------

--
-- Table structure for table `driver_leave`
--

CREATE TABLE `driver_leave` (
  `empid` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `from_Leave` date DEFAULT NULL,
  `to_Leave` date DEFAULT NULL,
  `type_of_leave` varchar(50) DEFAULT NULL,
  `tot_leave` mediumtext DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver_leave`
--

INSERT INTO `driver_leave` (`empid`, `id`, `from_Leave`, `to_Leave`, `type_of_leave`, `tot_leave`, `datetime`) VALUES
('Dv24FM01', 7, '2024-01-11', '2024-01-11', 'Casual', NULL, '2024-01-18 21:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_cost`
--

CREATE TABLE `fuel_cost` (
  `num_plate_id` varchar(10) DEFAULT NULL,
  `fuel_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` mediumtext DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp(),
  `fuel_lit` int(11) DEFAULT NULL,
  `per_lit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel_cost`
--

INSERT INTO `fuel_cost` (`num_plate_id`, `fuel_id`, `date`, `cost`, `datetime`, `fuel_lit`, `per_lit`) VALUES
('TN23GH8907', 1, '2024-01-17', '400', '2024-01-17 17:59:37', 2, 200),
('TN23GH8907', 2, '2024-01-25', '800', '2024-01-18 17:57:34', 2, 400),
('TN23SB6778', 0, '2024-03-17', '1000', '2024-03-15 14:17:55', 5, 200),
('TN23GH8923', 0, '2024-03-17', '1000', '2024-03-15 16:37:08', 5, 200),
('TN23GH8907', 0, '2024-03-17', '1000', '2024-03-25 21:10:41', 5, 200),
('TN34SB3456', 0, '2024-03-17', '1000', '2024-03-25 21:24:12', 5, 200),
('TN34SB3456', 0, '2024-03-24', '2000', '2024-03-25 21:25:18', 4, 500),
('TN34SB3456', 0, '2024-03-01', '1200', '2024-03-25 21:26:37', 6, 200);

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `bookid` int(11) NOT NULL,
  `hramt` mediumtext DEFAULT NULL,
  `no_of_hr` mediumtext DEFAULT NULL,
  `date_time` datetime DEFAULT current_timestamp(),
  `driver_charge` mediumtext DEFAULT NULL,
  `dtime` time DEFAULT NULL,
  `ptime` time DEFAULT NULL,
  `daytype` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`bookid`, `hramt`, `no_of_hr`, `date_time`, `driver_charge`, `dtime`, `ptime`, `daytype`) VALUES
(0, '-1598.6666666667', '-19.983333333333', '2024-03-26 22:13:06', '400', '03:13:00', '23:12:00', 'morning'),
(2, '80', '1', '2024-03-27 21:19:59', '400', '08:00:00', '07:00:00', 'morning'),
(3, '80', '1', '2024-03-27 21:57:17', '50', '10:00:00', '09:00:00', 'morning'),
(8, '-1754.6666666667', '-21.933333333333', '2024-03-29 21:11:06', '400', '01:16:00', '23:12:00', 'morning'),
(9, '80', '1', '2024-03-29 21:18:41', '400', '11:00:00', '10:00:00', 'morning'),
(10, '50', '1', '2024-03-29 21:27:11', '0', '11:00:00', '10:00:00', 'morning'),
(28, '160', '2', '2024-04-09 22:30:35', '50', '12:00:00', '10:00:00', 'morning'),
(30, '50', '1', '2024-04-12 21:24:45', '0', '11:00:00', '10:00:00', 'morning'),
(158, '578.66666666667', '7.2333333333333', '2024-01-20 15:39:49', NULL, '09:59:00', '02:45:00', NULL),
(183, '80', '1', '2024-01-23 22:42:13', '0', '20:00:00', '19:00:00', 'night'),
(184, '80', '1', '2024-01-23 22:44:56', '0', '21:00:00', '20:00:00', 'night'),
(185, '80', '1', '2024-01-23 22:46:37', '0', '21:00:00', '20:00:00', 'night'),
(190, '0', '0', '2024-01-27 23:17:24', NULL, '03:02:00', '03:02:00', NULL),
(202, '240', '3', '2024-02-08 23:48:13', NULL, '12:00:00', '09:00:00', NULL),
(204, '81.333333333333', '1.0166666666667', '2024-02-08 23:59:25', NULL, '04:04:00', '03:03:00', NULL),
(207, '240', '3', '2024-02-09 00:22:41', NULL, '12:00:00', '09:00:00', NULL),
(232, '-638.66666666667', '-7.9833333333333', '2024-02-10 22:38:11', NULL, '01:01:00', '09:00:00', NULL),
(233, '160', '2', '2024-02-10 22:41:23', '0', '03:41:00', '01:41:00', 'night'),
(240, '240', '3', '2024-02-10 23:34:11', '0', '04:34:00', '01:34:00', 'night'),
(241, '80', '1', '2024-02-10 23:41:58', '0', '10:00:00', '09:00:00', 'morning'),
(245, '80', '1', '2024-02-12 08:25:53', '0', '11:25:00', '10:25:00', 'morning'),
(246, '400', '5', '2024-02-12 08:36:21', '0', '20:36:00', '15:36:00', NULL),
(252, '80', '1', '2024-02-12 18:00:14', '0', '09:00:00', '08:00:00', 'morning'),
(253, '80', '1', '2024-02-12 18:23:36', '0', '20:23:00', '19:23:00', 'night'),
(254, '80', '1', '2024-02-12 18:31:51', '0', '10:00:00', '09:00:00', 'morning'),
(255, '160', '2', '2024-02-12 18:47:57', '0', '21:47:00', '19:47:00', 'night'),
(256, '160', '2', '2024-02-12 18:49:17', '800', '11:00:00', '09:00:00', 'morning'),
(257, '80', '1', '2024-02-12 19:02:42', '300', '03:00:00', '02:00:00', 'night'),
(258, '-5.3333333333333', '-0.066666666666667', '2024-02-12 19:06:25', '-20', '19:09:00', '19:13:00', 'night'),
(259, '14.666666666667', '0.18333333333333', '2024-02-12 19:08:52', '55', '19:23:00', '19:12:00', 'night'),
(286, '80', '1', '2024-02-16 00:18:57', '400', '10:00:00', '09:00:00', 'morning');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `num_plate_id` varchar(50) DEFAULT NULL,
  `full_image` varchar(200) DEFAULT NULL,
  `front_image` varchar(200) DEFAULT NULL,
  `rear_image` varchar(200) DEFAULT NULL,
  `inside_image` varchar(200) DEFAULT NULL,
  `addi_image` varchar(200) DEFAULT NULL,
  `boot_image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`num_plate_id`, `full_image`, `front_image`, `rear_image`, `inside_image`, `addi_image`, `boot_image`) VALUES
('TN56SB4545', 'images/ninetyonefull.jpg', 'images/ninetyonefront.jpg', 'images/ninetyonebrake.jpg', 'images/ninetyoneshifting.jpg', 'images/ninetyonetires.jpg', NULL),
('TN67SB6767', 'images/armstrongfront.jpg', 'images/armstrongside.jpg', 'images/armstrongmilitary.jpg', NULL, NULL, NULL),
('TN23GH8907', 'images/fordfull.jpeg', 'images/fordfront.jpeg', 'images/fordrear.jpeg', NULL, NULL, NULL),
('TN67SB4321', 'images/bmwfull.jpg', 'images/bmwfront.jpg', 'images/bmwback.jpg', NULL, NULL, NULL),
('TN34SB6788', 'images/scooterful.jpg', NULL, NULL, NULL, NULL, NULL),
('TN25GH0098', 'images/car-5.jpg', 'images/car-11.jpg', 'images/toyoto_rear.jpg', '', '', ''),
('TN23SB6772', 'images/gearby_full.jpg', 'images/gearby_side.jpg', NULL, NULL, NULL, NULL),
('TN23SB6789', 'images/ford1full.AVIF', 'images/ford1front.AVIF', 'images/ford1rear.AVIF', NULL, NULL, NULL),
('TN34BN0098', 'images/maruti_side.webp', 'images/maruti_front.webp', 'images/mariti_rear.webp', 'images/maruti_inside.webp', 'images/maruti_left.webp', 'images/maruti_boot.webp'),
('TN34SB6734', 'images/hyundaiful.jpg', NULL, NULL, NULL, NULL, NULL),
('TN56GB8906', 'images/toyominifull.webp', 'images/toyominifront.webp', 'images/toyominirear.webp', NULL, NULL, NULL),
('TN67SB5454', 'images/minihonda.jpg', NULL, NULL, NULL, NULL, NULL),
('TN23GH8999', 'images/yamagaback.webp', 'images/yamagafront.webp', 'images/yamagafull.webp', 'images/yamagafront.webp', 'images/yamagaside.webp', 'images/yamagaside.webp');

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `insurance_id` int(11) NOT NULL,
  `num_plate_id` varchar(10) DEFAULT NULL,
  `Insurance_policy` varchar(50) DEFAULT NULL,
  `Insurance_date` date DEFAULT NULL,
  `Insurance_Cost` mediumtext DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insurancename`
--

CREATE TABLE `insurancename` (
  `insurance_id` int(11) NOT NULL,
  `policy_name` varchar(50) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `insurancedate` date DEFAULT NULL,
  `no_of_years` int(11) DEFAULT NULL,
  `num_plate_id` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `cur_idv` mediumtext DEFAULT NULL,
  `ins_date` date DEFAULT NULL,
  `claim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insurancename`
--

INSERT INTO `insurancename` (`insurance_id`, `policy_name`, `company_name`, `insurancedate`, `no_of_years`, `num_plate_id`, `date`, `cur_idv`, `ins_date`, `claim`) VALUES
(1, 'Third-party', 'PolicyBazar', '2024-01-09', 3, 'TN23GH8907', '2024-11-27', NULL, NULL, NULL),
(3, 'Own damage', 'Policy Bazar', '2024-02-10', 1, 'TN23GH8907', '2024-11-27', NULL, NULL, NULL),
(4, 'Comprehensive car insurance', 'PolicyBazar', '2024-01-16', 1, 'TN23GH8907', '2024-11-27', NULL, NULL, NULL),
(5, 'Engine protection cover', 'PolicyBazar', '2024-01-18', 1, 'TN23GH8907', '2024-11-27', NULL, NULL, NULL),
(6, 'Zero depreciation insurance', 'policy Bazar', '2024-01-18', 1, 'TN23GH8907', '2024-11-27', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `insurance_claim`
--

CREATE TABLE `insurance_claim` (
  `ins_claim` int(11) NOT NULL,
  `insurance_id` int(11) DEFAULT NULL,
  `num_plate_id` varchar(10) DEFAULT NULL,
  `date_of_claim` date DEFAULT NULL,
  `amount_claim` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insurance_claim`
--

INSERT INTO `insurance_claim` (`ins_claim`, `insurance_id`, `num_plate_id`, `date_of_claim`, `amount_claim`) VALUES
(1, 1, 'TN23GH8907', '2024-01-27', '1234'),
(2, 3, 'TN23GH8907', '2024-02-07', '900'),
(3, 3, 'TN23GH8907', '2024-01-20', '7456'),
(4, 1, 'TN23GH8907', '2024-01-27', '8999'),
(5, 3, 'TN23GH8907', '2024-02-10', '90'),
(6, 1, 'TN23GH8907', '2024-01-11', '2');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_history`
--

CREATE TABLE `insurance_history` (
  `inshisid` int(11) NOT NULL,
  `insurance_id` int(11) DEFAULT NULL,
  `num_plate_id` varchar(10) DEFAULT NULL,
  `date_of_payment` date DEFAULT NULL,
  `amount_paid` mediumtext DEFAULT NULL,
  `discount` int(11) DEFAULT 0,
  `idv` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insurance_history`
--

INSERT INTO `insurance_history` (`inshisid`, `insurance_id`, `num_plate_id`, `date_of_payment`, `amount_paid`, `discount`, `idv`) VALUES
(1, 1, 'TN23GH8907', '2024-01-09', '5000', 0, NULL),
(2, NULL, 'TN23GH8907', '2024-01-17', '4400', 12, NULL),
(21, NULL, 'TN23GH8907', '2024-01-19', '8900', 7899, NULL),
(25, 1, 'TN23GH8907', '2024-01-26', '2333', 45, NULL),
(26, 1, 'TN23GH8907', '2024-01-18', '3436', 45, NULL),
(27, 1, 'TN23GH8907', '2024-01-18', '3436', 45, NULL),
(28, 1, 'TN23GH8907', '2024-01-19', '1234', 67, NULL),
(29, 3, 'TN23GH8907', '2024-02-10', '1000', 0, NULL),
(30, 3, 'TN23GH8907', '2025-03-07', '1000', 0, NULL),
(31, 1, 'TN23GH8907', '2024-01-20', '6000', 12, NULL),
(32, 3, 'TN23GH8907', '2024-02-09', '1209', 9, NULL),
(33, 3, 'TN23GH8907', '2024-01-26', '78899', 78, NULL),
(34, 1, 'TN23GH8907', '2024-01-26', '890', 9, NULL),
(35, 4, 'TN23GH8907', '2024-01-16', '5000', 0, NULL),
(36, 5, 'TN23GH8907', '2024-01-18', '500', 0, NULL),
(37, 6, 'TN23GH8907', '2024-01-18', '1000', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `km`
--

CREATE TABLE `km` (
  `bookid` int(11) NOT NULL,
  `advamt` mediumtext DEFAULT NULL,
  `kmamt` mediumtext DEFAULT NULL,
  `no_of_km` mediumtext DEFAULT NULL,
  `rem_amt` mediumtext DEFAULT NULL,
  `date_time` datetime DEFAULT current_timestamp(),
  `driver_charge` mediumtext DEFAULT NULL,
  `daytype` varchar(20) DEFAULT NULL,
  `ptime` time DEFAULT NULL,
  `dtime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `km`
--

INSERT INTO `km` (`bookid`, `advamt`, `kmamt`, `no_of_km`, `rem_amt`, `date_time`, `driver_charge`, `daytype`, `ptime`, `dtime`) VALUES
(21, '1000', NULL, NULL, NULL, '2024-03-29 22:16:08', '3000', NULL, NULL, NULL),
(24, '1000', NULL, NULL, NULL, '2024-04-09 21:30:47', '3000', NULL, NULL, NULL),
(25, '1000', NULL, NULL, NULL, '2024-04-09 21:41:42', NULL, NULL, NULL, NULL),
(26, '1000', NULL, NULL, NULL, '2024-04-09 21:43:02', '600', NULL, NULL, NULL),
(158, '1000', NULL, NULL, NULL, '2024-01-20 17:46:24', '7500', NULL, NULL, NULL),
(159, '0', NULL, NULL, NULL, '2024-01-20 17:51:07', '7500', NULL, NULL, NULL),
(162, '1000', NULL, NULL, NULL, '2024-01-21 21:43:25', '7500', NULL, NULL, NULL),
(163, '0', NULL, NULL, NULL, '2024-01-21 21:53:52', NULL, NULL, NULL, NULL),
(165, '1000', NULL, NULL, NULL, '2024-01-21 22:32:40', '7500', NULL, NULL, NULL),
(181, '1000', NULL, NULL, NULL, '2024-01-23 22:07:59', NULL, NULL, NULL, NULL),
(182, '1000', NULL, NULL, NULL, '2024-01-23 22:16:31', NULL, NULL, NULL, NULL),
(188, '0', NULL, NULL, NULL, '2024-01-27 12:32:49', '3000', NULL, NULL, NULL),
(192, '1000', NULL, NULL, NULL, '2024-02-08 22:26:46', '3000', NULL, NULL, NULL),
(197, '1000', NULL, NULL, NULL, '2024-02-08 23:06:42', NULL, NULL, NULL, NULL),
(199, '1000', NULL, NULL, NULL, '2024-02-08 23:32:22', NULL, NULL, NULL, NULL),
(200, '1000', NULL, NULL, NULL, '2024-02-08 23:35:23', NULL, NULL, NULL, NULL),
(208, '1000', NULL, NULL, NULL, '2024-02-09 00:25:56', NULL, NULL, NULL, NULL),
(209, '1000', NULL, NULL, NULL, '2024-02-09 00:28:33', NULL, NULL, NULL, NULL),
(221, '1000', NULL, NULL, NULL, '2024-02-10 21:07:56', NULL, NULL, NULL, NULL),
(222, '1000', NULL, NULL, NULL, '2024-02-10 21:11:07', NULL, NULL, NULL, NULL),
(223, '1000', NULL, NULL, NULL, '2024-02-10 21:12:07', NULL, NULL, NULL, NULL),
(225, '1000', NULL, NULL, NULL, '2024-02-10 21:49:07', NULL, NULL, NULL, NULL),
(237, '1000', NULL, NULL, NULL, '2024-02-10 23:28:49', '3000', NULL, NULL, NULL),
(238, '1000', NULL, NULL, NULL, '2024-02-10 23:30:04', NULL, NULL, NULL, NULL),
(244, '1000', NULL, NULL, NULL, '2024-02-12 08:23:15', '3000', NULL, NULL, NULL),
(247, '1000', NULL, NULL, NULL, '2024-02-12 15:19:34', '3000', NULL, NULL, NULL),
(251, '1000', NULL, NULL, NULL, '2024-02-12 17:55:15', '3000', NULL, NULL, NULL),
(260, '1000', NULL, NULL, NULL, '2024-02-12 19:17:00', NULL, NULL, NULL, NULL),
(261, '1000', NULL, NULL, NULL, '2024-02-12 19:35:26', '600', NULL, NULL, NULL),
(268, '1000', NULL, NULL, NULL, '2024-02-13 00:27:51', '3000', NULL, NULL, NULL),
(271, '1000', NULL, NULL, NULL, '2024-02-13 21:11:17', NULL, NULL, NULL, NULL),
(273, '1000', NULL, NULL, NULL, '2024-02-13 21:16:14', NULL, NULL, NULL, NULL),
(291, '1000', NULL, NULL, NULL, '2024-03-15 00:41:39', NULL, NULL, NULL, NULL),
(292, '1000', NULL, NULL, NULL, '2024-03-15 00:42:29', NULL, NULL, NULL, NULL),
(293, '1000', NULL, NULL, NULL, '2024-03-15 00:44:36', '3000', NULL, NULL, NULL),
(295, '1000', NULL, NULL, NULL, '2024-03-15 19:15:42', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `license_no` varchar(20) NOT NULL,
  `empid` varchar(50) DEFAULT NULL,
  `ExpDate` date DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `image_path` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`license_no`, `empid`, `ExpDate`, `category`, `image_path`) VALUES
('TN34234567', 'Dv24FM18', '2024-03-24', 'LMV,HMV', 'images/IMG-20210407-WA0014.jpg'),
('TN342345334', 'Dv24FM19', '2024-11-10', 'MCWG,HMV', 'images/IMG20200315134349.jpg'),
('TN3423453334', 'Dv24FM20', '2024-11-10', 'LMV,MCWG', 'images/IMG-20210407-WA0002.jpg'),
('TN3423453889', 'Dv24FM21', '2024-02-02', 'HMV', 'images/IMG-20210407-WA0011.jpg'),
('TN78965432565', 'Dv24FM22', '2024-12-20', 'HGMV', 'images/Screenshot (17).png'),
('TN789654323455', 'Dv24FM24', '2024-10-25', 'MCWG', 'images/Screenshot (39).png'),
('TN67567675756', 'Dv24FM25', '2024-11-02', 'HGMV', 'images/Screenshot (2).png'),
('TN6756777788', 'Dv24FM26', '2024-06-08', 'MCWG,HGMV', 'images/Screenshot (10).png'),
('TN78965897879', 'Dv24FM31', '2024-10-05', 'MCWG', 'images/Screenshot (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `datetime`, `last_login`) VALUES
('rajeswari19p@gmail.com', '$2y$10$i.lUPuy7HCCxE6ObhkT77OEfBtAPBOAKrF9Ep1XHEhJfCaGcN1p0a', '2023-12-29 20:52:41', '2024-04-14 09:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notify_id` int(11) NOT NULL,
  `num_plate_id` varchar(10) NOT NULL,
  `RTO_Exp_date` date DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notify_id`, `num_plate_id`, `RTO_Exp_date`, `datetime`) VALUES
(55, 'TN23GH8907', '2024-01-03', '2024-01-07 10:11:12'),
(57, 'TN23GH8907', '2024-01-03', '2024-01-07 10:26:21'),
(59, 'TN23GH8907', '2024-01-03', '2024-01-07 10:35:42'),
(60, 'TN23GH8907', '2024-01-03', '2024-01-07 10:47:45'),
(61, 'TN23GH8907', '2024-01-03', '2024-01-07 10:52:58'),
(64, 'TN23GH8907', '2024-01-03', '2024-01-07 11:08:15'),
(65, 'TN23GH8907', '2024-01-03', '2024-01-07 11:12:14'),
(66, 'TN23GH8907', '2024-01-03', '2024-01-07 13:10:24'),
(67, 'TN23GH8907', '2024-01-03', '2024-01-07 13:24:41'),
(69, 'TN25GH0098', '2024-01-18', '2024-01-19 15:50:00'),
(70, 'TN34BN0098', '2024-03-13', '2024-01-19 16:18:20'),
(72, 'TN23GH8999', '2024-03-15', '2024-03-15 14:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `notifyservice`
--

CREATE TABLE `notifyservice` (
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifyservice`
--

INSERT INTO `notifyservice` (`count`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `rent_price`
--

CREATE TABLE `rent_price` (
  `rent_id` int(11) NOT NULL,
  `num_plate_id` varchar(10) NOT NULL,
  `rent_price_per_day` mediumtext DEFAULT NULL,
  `rent_price_per_hour` mediumtext DEFAULT NULL,
  `rent_price_per_km` mediumtext DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp(),
  `charges` mediumtext DEFAULT 0,
  `adv_amt` mediumtext DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rent_price`
--

INSERT INTO `rent_price` (`rent_id`, `num_plate_id`, `rent_price_per_day`, `rent_price_per_hour`, `rent_price_per_km`, `datetime`, `charges`, `adv_amt`) VALUES
(34, 'TN23SB6789', '700', '80', '20', '2024-01-04 17:11:50', '200', '1000'),
(42, 'TN23SB6772', '700', '80', '20', '2024-01-07 10:26:43', '200', '1000'),
(44, 'TN67SB6767', '700', '80', '20', '2024-01-07 10:36:36', '200', '1000'),
(45, 'TN34SB6788', '700', '80', '20', '2024-01-07 10:44:17', '200', '1000'),
(46, 'TN56SB4545', '700', '80', '20', '2024-01-07 10:48:18', '200', '1000'),
(47, 'TN67SB4321', '700', '80', '20', '2024-01-07 10:53:17', '200', '1000'),
(50, 'TN67SB5454', '700', '80', '50', '2024-01-07 11:09:11', '200', '1000'),
(51, 'TN56GB8906', '700', '80', '20', '2024-01-07 11:12:31', '200', '1000'),
(52, 'TN34SB6734', '700', '80', '20', '2024-01-07 13:10:40', '200', '1000'),
(53, 'TN23GH8907', '700', '80', '40', '2024-01-07 13:24:55', '200', '1000'),
(54, 'TN25GH0098', '900', '100', '50', '2024-01-19 15:51:24', '200', '1000'),
(55, 'TN34BN0098', '1000', '100', '60', '2024-01-19 16:18:34', '200', '1000'),
(57, 'TN23GH8999', '1300', '50', '30', '2024-03-15 14:25:21', '0', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `num_plate_id` varchar(10) DEFAULT NULL,
  `Service_date` date DEFAULT NULL,
  `Service_cost` mediumtext DEFAULT NULL,
  `ins_claim` mediumtext DEFAULT NULL,
  `rem_cost` mediumtext DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `num_plate_id`, `Service_date`, `Service_cost`, `ins_claim`, `rem_cost`, `datetime`) VALUES
(24, 'TN23GH8907', '2023-12-09', '9000', '5000', '4000', '2024-01-08 11:44:55'),
(25, 'TN23SB6772', '2023-12-03', '8000', '3000', '5000', '2024-01-08 11:44:55'),
(26, 'TN23GH8907', '2023-12-01', '9000', '4000', '5000', '2024-01-08 11:44:55'),
(27, 'TN23GH8907', '2024-01-01', '10000', '4000', '6000', '2024-01-08 11:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `slotbook`
--

CREATE TABLE `slotbook` (
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `name` varchar(20) DEFAULT NULL,
  `altmoblie` mediumtext DEFAULT NULL,
  `emailId` varchar(50) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `aadhaarno` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`name`, `altmoblie`, `emailId`, `address`, `age`, `aadhaarno`) VALUES
('Sivasankari', '9994917902', 'abc@gmail.com', '73/3,west street', 20, '895228742952'),
('Deepikaa', '9524186904', 'deepikaaerd325@gmail.com', 'erode', 20, '234524356235'),
('Kokulavenkat', '7806910448', 'jaxase4488@tospage.com', 'd.no 5782,thirunagar,kalayarkovil,sivagangai', 20, '450940426711'),
('karthi', '8122321949', 'karthik42@gmail.com', '47rajaji st 2 erode', 29, '123456789012'),
('kavitha', '8978675678', 'kavi@123gmail.com', '24,gg st', 45, '6669-9988-8899-6677'),
('Komathi', '8978675678', 'Komathi@gmail.com', '24 pillayaar street', 21, '786789876446'),
('log', '', 'logesh@gmail.com', '', 0, ''),
('Menaka', '7848232121', 'menaka@gmail.com', '34 good street', 20, '2343-2324-3243-2342'),
('poi', '9787997699', 'poi@3gmail.com', 'hgjsk', 25, '907906968986'),
('Poornasri', '9025812842', 'poornasrip2003@gmail.com', 'No:82 Ponnagar ,', 19, '364578819202'),
('pre', '9898787656', 'pre3@gmail.com', 'ghdghsbsh', 34, '998896965849'),
('Preethi', '7890563412', 'preethikavitha3@gmail.com', '578,Gandhi Nagar', 19, '8907-8789-8946-5634'),
('Priyadharshini', '9857674873', 'priya13@gmail.com', 'KS naga coimbatore', 21, '985763847463'),
('Nikitha', '8531010500', 'punikitha@gmail.com', 'karur', 40, '987654321234'),
('qwe', '7889877867', 'qewe@gmail.com', 'jik99', 45, '989897878676'),
('Roshini', '9789473405', 'roshini2742@gmail.com', '24,rmnagar,erode', 22, '259703607641'),
('sri', '8678991039', 'sriias02@gmail.com', 'sakthi nagar', 25, '567845393110'),
('surya', '8978675676', 'surya3@gmail.com', '24,sh street', 19, '8888-9999-7777-9989'),
('suva', '7867456765', 'suva@gmail.com', 'chennai', 19, '7897-2345-6789-9876'),
('swetha', '9878987678', 'swetha@3gmail.com', '24,jk street', 24, '989878676756'),
('vinothini', '7826026437', 'vino2004@gmail.com', '24,vellar street pilladurai Thathiengarpet', 19, '667782356782'),
('yogi', '8978675678', 'yogi@gmail.com', '23cvdfg', 34, '789678565468');

-- --------------------------------------------------------

--
-- Table structure for table `userlicense`
--

CREATE TABLE `userlicense` (
  `book_id` int(11) DEFAULT NULL,
  `license_no` varchar(20) NOT NULL,
  `ExpDate` date DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `image_path` varchar(500) DEFAULT NULL,
  `NameinLicense` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlicense`
--

INSERT INTO `userlicense` (`book_id`, `license_no`, `ExpDate`, `category`, `image_path`, `NameinLicense`) VALUES
(134, 'gjhbk67790', '2024-02-03', 'HMV', 'licenseimage/about.jpg', NULL),
(164, 'TN234567456', '2024-02-10', 'LMV', 'licenseimage/0d2072c7f56d16a5ea3ffbbac31b848d.jpg', NULL),
(164, 'TN6478292301', '2024-02-09', 'LMV', 'licenseimage/a6609b08b23b6c533a8aa1f45f6cb6bb.jpg', NULL),
(164, 'TN64782923789', '2024-01-28', 'HMV', 'licenseimage/0d2072c7f56d16a5ea3ffbbac31b848d.jpg', NULL),
(171, 'TN64782923778', '2024-01-29', 'MG,HMV', 'licenseimage/3ab3a9e3b5e269a9d8989a5b75c51710.jpg', NULL),
(171, 'tn343433', '2024-01-04', 'MCWG,HGMV', 'licenseimage/3ab3a9e3b5e269a9d8989a5b75c51710.jpg', NULL),
(171, 'TH87687907878', '2024-03-02', 'LMV,HMV', 'licenseimage/workshop on Java.pdf', NULL),
(171, 'TH463527392', '2024-02-24', 'HMV,HGMV', 'licenseimage/Clean Code Workshop.pdf', NULL),
(171, 'TFF46890', '2024-02-23', 'LMV,MCWG', 'licenseimage/Resume (1).pdf.crdownload', NULL),
(171, 'tyu45678987', '2024-03-02', 'MCWG,HGMV', 'licenseimage/3ab3a9e3b5e269a9d8989a5b75c51710.jpg', NULL),
(171, 'hjumhgbjk5768769', '2024-02-15', 'LMV,HMV', 'licenseimage/564e28306d3fa4486f6a51ed570faccb.jpg', NULL),
(171, '89768576455jk', '2024-03-03', 'MCWG', 'licenseimage/0d2072c7f56d16a5ea3ffbbac31b848d.jpg', NULL),
(213, 'ghyyjghj', '2024-02-22', 'MCWG', 'licenseimage/IMG20220407203328.jpg', NULL),
(213, 'gyhgj', '2024-02-16', 'LMV,MCWG', 'licenseimage/IMG20211226212615.jpg', NULL),
(213, 'gvj', '2024-02-22', 'MCWG', 'licenseimage/20201002_124056.jpg', NULL),
(213, '123456789', '2024-02-24', 'HGMV', 'licenseimage/20201002_124056.jpg', NULL),
(213, 'fgtytujyuy', '2024-02-23', 'MCWG', 'licenseimage/20201002_124403.jpg', NULL),
(213, 'tgfty345678', '2024-02-22', 'MCWG', 'licenseimage/c3cedaa60a237b2b29a0c8b826fe86c1.jpg', NULL),
(261, 'ygbujh', '2024-02-14', 'LMV', 'licenseimage/0d2072c7f56d16a5ea3ffbbac31b848d.jpg', NULL),
(261, 'tfuyfuyhj', '2024-02-14', 'LMV,HMV', 'licenseimage/564e28306d3fa4486f6a51ed570faccb.jpg', NULL),
(261, 'gyhjgj', '2024-02-11', 'MCWG', 'licenseimage/0d2072c7f56d16a5ea3ffbbac31b848d.jpg', NULL),
(261, 'kljkljknmnm', '2024-02-17', 'LMV,HMV', 'licenseimage/Resume (1).pdf', NULL),
(261, 'bhjnm', '2024-02-02', 'MCWG', 'licenseimage/about.jpg', NULL),
(295, 'TN23456765', '2025-11-29', 'HGMV', 'licenseimage/20201002_124056.jpg', NULL),
(296, 'TN12312e33333', '2024-03-16', 'LMV,HMV', 'licenseimage/WIN_20220201_09_17_21_Pro.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usersignup`
--

CREATE TABLE `usersignup` (
  `Name` varchar(20) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Phno` mediumtext DEFAULT NULL,
  `signindt` datetime DEFAULT current_timestamp(),
  `loginindt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersignup`
--

INSERT INTO `usersignup` (`Name`, `Email`, `Password`, `Phno`, `signindt`, `loginindt`) VALUES
('', '', '$2y$10$Ya.aawvOlK4wTwSsPykr.uT4tinxUjo2RZMz7E1u.6Bt3W5ZPumna', '', '2024-04-13 23:54:41', NULL),
('Sivasankari', 'abc@gmail.com', '$2y$10$l97vmvYxJX3ipQEIqT.QMOqEPRfG01HTEap7Ia2tjSKP0lDarv7Xe', '9994917902', '2024-01-21 21:40:20', '2024-01-21 21:53:43'),
('Deepikaa', 'deepikaaerd325@gmail.com', '$2y$10$ZMb9A/OfAEyi3Xe.EmNjc.U.3IL6FonRO.zxjhGne2OITkuwsGUYG', '9876567897', '2024-03-15 19:09:34', NULL),
('poiuu', 'ghh@gmail.com', '$2y$10$CPpRwlO5a/9ggyypurdRGOT4a/3X5/j7a2oWdLYZ9lPTv8RBW0rUK', '9897867567', '2024-02-12 22:29:34', NULL),
('bhjb', 'gjhbj3@gmail.com', '$2y$10$wrqFKSK8M75fmxLBBWNTW.Utg3rz8jMlkyL/zvopZcOw44xvFmSaO', '9889876545', '2024-02-12 17:19:17', NULL),
('Kokulavenkat', 'jaxase4488@tospage.com', '$2y$10$Qo7gdrBPAWxEJSA7c4.P4.7.9kh17HzD.eiQQxSPLl2QZGzt9I8Qe', '7806910448', '2024-02-14 11:40:59', NULL),
('hkj', 'jknkj3@fghj.com', '$2y$10$l2rd.8U7GJicd5AK/e8eSuK1NUw80aItw2Jxja.nfPollyeY/mm2i', '8787675678', '2024-02-12 17:21:44', NULL),
('karthi', 'karthik42@gmail.com', '$2y$10$0QXUe.EjY9dR7hQZHSM/X.OJjqk2Baqxz2c3PvOpGXOVlDSgzjN/C', '9080234556', '2024-01-20 22:17:04', NULL),
('kavitha', 'kavi@123gmail.com', '$2y$10$a23d0yDOrBOBIAdlfUeo4uQIE/0v.1quI5k.EGqIV/3fTW3hLLIA6', '8978675645', '2024-01-23 22:05:09', NULL),
('keerthana', 'keerthanar23504@gmail.com', '$2y$10$QgqntcTLb9lIxFdYsvAjbuuTmsshvvwhKkNkDUy3Aej6EZj8JwGp.', '8056566704', '2024-02-10 13:08:21', NULL),
('Komathi', 'Komathi@gmail.com', '$2y$10$p5GwQ9g5Z3FuBmcS4DQU0.St5iqfssQGEo/wT5p6/iT3dItTJit9y', '9567898764', '2024-04-12 21:22:54', NULL),
('logesh', 'logesh@gmail.com', '$2y$10$Fv9mqngTqGTJJguwE5zgNuSZ1Bfer1PS1.uj84gOyHKVt7z8IOCk.', '6369150131', '2024-01-20 17:59:17', NULL),
('Menaka', 'mena12@gmail.com', '$2y$10$1I59uIgj/L8PUrjkvl09l.nvFbgmlaJdDUspsxPoaYhEyjotoy7A2', '1234567890', '2024-02-12 17:15:58', NULL),
('Menaka', 'menaka@gmail.com', '$2y$10$rjgYfSCeq9qEchwbwA.P0eOQ8igVlTZ9t4/brCjfxcK5DVc0ziVz6', '9876543210', '2024-01-27 12:27:38', NULL),
('padma', 'padma@gmail.com', '$2y$10$CA2KMohENwGrfZvrI0AGqusdR9liwgExVQBloB3zG4VAGc8./FhJ6', '9867867867', '2024-03-26 22:18:22', NULL),
('pop', 'po@3gmail.com', '$2y$10$niDWRlcAeP2VmbAaCYNswe6nvfcIA4YYzZJr6nqrasSn4MLwfa462', '2267777767', '2024-02-13 07:49:18', NULL),
('poi', 'poi@3gmail.com', '$2y$10$UHcUmfFj7.FgZA3WiXH7heyV2OjjsbuP2WBlb4A/p8RCfVQd1Dzca', '8978675678', '2024-02-12 17:40:34', NULL),
('poiu', 'poiu3123@gmail.com', '$2y$10$kArOd0SO8Tpob8GQSLJ1Duc6oYzJMMyor.z8hE70Ibs.tdCIW8n8.', '9898786756', '2024-02-12 22:31:06', NULL),
('poiuy', 'poiuyw3@gmail.com', '$2y$10$cmFJHN3Zi3VvlRReCvI8juToEdyyRiPWCij2kqDdgc7X9E.idyqke', '9897867859', '2024-02-12 22:33:20', NULL),
('poiuytrewq', 'poiwwu3@gmail.com', '$2y$10$s7nEjd6MU6.ZqZtnOk3W3.zxaycZAET.1z5DJA2gRlGfQx8mmTRXq', '9898786756', '2024-02-12 22:34:11', NULL),
('Poornasri', 'poornasrip2003@gmail.com', '$2y$10$VkRZZehXdFsa4aHOJTRqc.kzozRS1vPKDl9ZXeT/jfYYpatVZYjWO', '9025812842', '2024-02-15 22:32:50', NULL),
('ptoroor', 'pppp3@gmail.com', '$2y$10$AjjWjohMIKwyqitBAQH4ueXwUIyANNg/P.xcC1s/bFeVJdm9AY7Oa', '8798656737', '2024-02-13 00:32:08', NULL),
('poi', 'ppppp3@gmail.com', '$2y$10$ueGO2/roeSQmrIyZd9FMMOV.a7myndRJOQw4sihi/XVLv2CQE36rm', '8978967875', '2024-02-13 00:29:00', NULL),
('pre', 'pre3@gmail.com', '$2y$10$M.ivDGHN52boUH9mmJhx7uf5jUroFpeGLaPaoIwI1hWE3cTOOEgxu', '9898787675', '2024-02-13 20:53:48', NULL),
('Preethi', 'preethikavitha3@gmail.com', '$2y$10$sKFKUr0.DXW4Xz5nrSnUTeYxxbKt2q.I7tHEeNSy7TjaCBhYuJIYK', '7895678901', '2024-01-19 10:57:00', '2024-04-13 23:25:36'),
('priya', 'priya12@gmail.com', '$2y$10$wNTO0emcDGFJLCSgwwFxx.bSNAoEg0OYm8.852UFJ6k.qIwIePGKu', '1234567890', '2024-02-12 22:16:15', NULL),
('Priyadharshini', 'priya13@gmail.com', '$2y$10$rR29MkmzkIFhSwJ0n8KfK.fw/5dulfcGAwmT5oDgoSyHUd0EF3l7e', '9575667890', '2024-04-09 21:46:50', NULL),
('Nikitha', 'punikitha@gmail.com', '$2y$10$sMXhaXB8UL6d7gyKtkFyFOQXjgXgGXQzqJsho49ATJtSjNcBjILEe', '8531014719', '2024-02-12 15:13:19', '2024-02-12 19:05:42'),
('qwe', 'qewe@gmail.com', '$2y$10$cf4HCvmr0Eta740UARmP6uQuVO.gRz1XxdytZUOrZKRiV10G5Qsd.', '8787876769', '2024-03-15 00:38:42', NULL),
('Raje', 'rajeswari19p@gmail.com', '$2y$10$bdUBsWWg5Isv3TtD2mc2muXSH196H2H61AUgZAu2HXkubopiGjq2O', '7604802397', '2024-01-19 11:00:48', NULL),
('ramyaa', 'ramya@gmail.com', '$2y$10$.mfoi8wg.9jMYMfXssGPV.ngarUNlYrdHLdSNWb4LNvSJKvSLkXgK', '9878786756', '2024-03-29 21:41:32', NULL),
('Roshini', 'roshini2742@gmail.com', '$2y$10$oVGF6tuMsmNxHiPomBBkm.nFzqynQB5vNMfzc5k2/eQChoAzxOKTG', '9080385937', '2024-01-20 17:49:41', NULL),
('siva', 'siva@gmail.com', '$2y$10$STWconC89zs6E.ooAGNULeljf4cp46RZ8oRb2/udJ4wYTPFPFF8.i', '8798787896', '2024-03-27 22:05:59', NULL),
('sri', 'sriias02@gmail.com', '$2y$10$YF9TzLZGaFfimW4IntORN.dqwheZ60k73dRgY.yiXnoTniV2OP7M6', '8678991039', '2024-02-12 19:16:44', '2024-02-12 19:35:11'),
('surya', 'surya3@gmail.com', '$2y$10$TPXgi9.wUnkIaW2Sc.CXzeVC3dlPqgio//2ZZpMVsTmjeMh7HpjU.', '8978675646', '2024-01-26 16:32:20', NULL),
('suva', 'suva@gmail.com', '$2y$10$I8qmwEJWvyIBRTrlldS0l.U0hL9wcQmIua1IR3x93WjwB2FFYqZ26', '4532766909', '2024-01-23 20:47:33', NULL),
('swetha', 'swetha@3gmail.com', '$2y$10$d6q8J0c0wZzpfSsmfrQNCOgtXdIwI.deUno7q4xPTMUpC7oYiOnaS', '8796756745', '2024-03-15 12:32:29', NULL),
('vinothini', 'vino2004@gmail.com', '$2y$10$rWFb5gzeUb/RuWSFSUsxKeDo/LfUUojsY/M94JXF9Bg445YpfRXf6', '7826026437', '2024-01-21 22:28:25', '2024-03-29 21:10:37'),
('yogi', 'yogi@gmail.com', '$2y$10$f.z4XiBC3CGr8Ic4ClQ7AObUgYCiP9tJGAtR.z47y48BEg4iylF5.', '8978675678', '2024-02-08 22:41:27', '2024-04-09 23:27:26'),
('you', 'you@gmail.com', '$2y$10$NDm5SLP4EUgy47MYXiMEPu1jO1rpIbnavOzlvft1iSiYvTnEpZpv2', '8698595859', '2024-03-29 22:17:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `num_plate_id` varchar(10) NOT NULL,
  `model` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `engine_type` varchar(50) DEFAULT NULL,
  `seat` int(11) DEFAULT NULL,
  `transmission_type` varchar(50) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `price` mediumtext DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Not Booked',
  `bootspace` int(11) DEFAULT NULL,
  `isActive` varchar(50) DEFAULT 'Active',
  `fuel_lit` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`num_plate_id`, `model`, `category`, `engine_type`, `seat`, `transmission_type`, `Description`, `brand`, `price`, `datetime`, `status`, `bootspace`, `isActive`, `fuel_lit`) VALUES
('TN23GH8907', 'Ford 6789 Ultra', 'Car', 'Petrol', 4, 'Manual', 'It have high milleage .It is comfortable to ride in toughest situation.', 'Ford', '1500000', '2024-01-07 13:23:57', 'Booked', 980, 'Active', '7'),
('TN23GH8999', 'Hyundai', 'Scooter', 'Petrol', 2, 'Manual', 'Smooth way to go.', 'Hyundai i70', '100000', '2024-03-15 14:24:38', 'Not Booked', 200, 'Active', '5'),
('TN23SB6772', 'Rator MTB 26T', 'Gear Bicycles', 'Petrol', 2, 'Manual', 'It is suitable for large rides and it gives comfort during mountain ranges.', 'Maruti', '100000', '2024-01-07 10:25:26', 'Not Booked', 1, 'Suspend', '0'),
('TN23SB6789', '2020 FORD Escape', 'Car', 'Natural Gas(CNG)', 5, 'Automatic', 'It has two extra seats for babies which provides comfort for babies at car.It gives extra milleage', 'Ford', '1500000', '2024-01-04 17:11:50', 'Not Booked', 950, 'Suspend', '7'),
('TN25GH0098', 'Toyoto 234 Fast', 'Car', 'Natural Gas(CNG)', 4, 'Manual', 'This is super fast car which makes your driving fast', 'Toyoto', '1200000', '2024-01-19 15:49:26', 'Not Booked', 980, 'Active', '7'),
('TN34BN0098', 'Maruthi 789', 'Car', 'Diesel', 4, 'Manual', 'It is flexible for long drive', 'Maruthi', '1000000', '2024-01-19 16:17:58', 'Not Booked', 900, 'Active', '7'),
('TN34SB6734', 'Hyundai 2020 5g', 'Car', 'Natural Gas(CNG)', 5, 'Automatic', 'It gives comfort long raide experience.It acts as a partner during vocations and travel.', 'Hyundai', '76000', '2024-01-07 13:09:47', 'Booked', 350, 'Active', '7'),
('TN34SB6788', 'Honda Activa 6G', 'Scooter', 'Petrol', 2, 'Automatic', 'Honda Activa 6G is a 109cc scooter.t gets drum brakes in the front and rear, apart from this it weighs 105 kg ', 'Honda', '78000', '2024-01-07 10:39:27', 'Booked', 100, 'Active', '2'),
('TN56GB8906', 'Toyota Sienna', 'MiniVan', 'Diesel', 9, 'Manual', 'Although the minivan segment has shrunk to just four vehicles, the class is defined by comfortable accommodations, clever packaging solutions, and features that keep passengers entertained', 'Toyota', '1800000', '2024-01-07 11:11:18', 'Booked', 970, 'Active', '8'),
('TN56SB4545', 'Snow Leopard 26T ', 'Gear Cycle', 'Others', 1, 'Others', 'With an all Aluminum frame and components, the Snow Leopard is easily the best MTB out there. The Snow Leopard is engineered with the lightness of Aluminum Alloy 6061, the safety of disc brakes, the performance of 21 hi-speed gears and the comfort of lock-in & lock-out suspension.', 'NinetyOne', '20000', '2024-01-07 10:46:43', 'Booked', 0, 'Active', '0'),
('TN67SB4321', 'BMW Folding Cycles', 'Folding Bicycle', 'Others', 1, 'Others', 'BMW Folding Cycles With Single Speed For All Age Grps and has BOTTEL HOLDER MUDGARD AND TOOLKIT.It has BOTTEL HOLDER MUDGARD AND TOOLKIT.Suitable for exercising for aged people and suitable for adults to learn cycling.', 'BMW', '10000', '2024-01-07 10:52:26', 'Not Booked', 0, 'Active', '0'),
('TN67SB5454', 'Honda Odassey', 'MiniVan', 'Petrol', 10, 'Automatic', 'It provides comfort for long travel.', 'Honda', '1700000', '2024-01-07 11:07:36', 'Booked', 900, 'Active', '7'),
('TN67SB6767', 'Armstrong MT500', 'Bike', 'Petrol', 2, 'Automatic', 'The MT500 is made with durability and practicality in mind. It has a one-piece steel frame and steel engine protector, and the body is fitted with heavy-duty plastics for the side coverings and seat. \r\n', 'Amstrong Military', '90000', '2024-01-07 10:34:48', 'Not Booked', 300, 'Active', '7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `num_plate_id` (`num_plate_id`),
  ADD KEY `empid` (`empid`),
  ADD KEY `fk_email_id` (`emailid`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`empid`),
  ADD UNIQUE KEY `mailID` (`mailID`);

--
-- Indexes for table `driveramt`
--
ALTER TABLE `driveramt`
  ADD PRIMARY KEY (`amt_id`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD KEY `fk_img` (`num_plate_id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insurance_id`),
  ADD KEY `FK_InsId` (`num_plate_id`);

--
-- Indexes for table `insurancename`
--
ALTER TABLE `insurancename`
  ADD PRIMARY KEY (`insurance_id`),
  ADD KEY `num_plate_id` (`num_plate_id`);

--
-- Indexes for table `insurance_claim`
--
ALTER TABLE `insurance_claim`
  ADD PRIMARY KEY (`ins_claim`),
  ADD KEY `fk_in` (`insurance_id`),
  ADD KEY `fk_np` (`num_plate_id`);

--
-- Indexes for table `insurance_history`
--
ALTER TABLE `insurance_history`
  ADD PRIMARY KEY (`inshisid`),
  ADD KEY `fk_ins` (`insurance_id`),
  ADD KEY `fk_num` (`num_plate_id`);

--
-- Indexes for table `km`
--
ALTER TABLE `km`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notify_id`),
  ADD KEY `FK_NotiFy` (`num_plate_id`);

--
-- Indexes for table `rent_price`
--
ALTER TABLE `rent_price`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `FK_RentId` (`num_plate_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `FK_ServId` (`num_plate_id`);

--
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD PRIMARY KEY (`emailId`);

--
-- Indexes for table `usersignup`
--
ALTER TABLE `usersignup`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`num_plate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `driveramt`
--
ALTER TABLE `driveramt`
  MODIFY `amt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `insurancename`
--
ALTER TABLE `insurancename`
  MODIFY `insurance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `insurance_claim`
--
ALTER TABLE `insurance_claim`
  MODIFY `ins_claim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `insurance_history`
--
ALTER TABLE `insurance_history`
  MODIFY `inshisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `rent_price`
--
ALTER TABLE `rent_price`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`num_plate_id`) REFERENCES `vehicle` (`num_plate_id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`empid`) REFERENCES `driver` (`empid`),
  ADD CONSTRAINT `fk_email_id` FOREIGN KEY (`emailid`) REFERENCES `usersignup` (`Email`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_img` FOREIGN KEY (`num_plate_id`) REFERENCES `vehicle` (`num_plate_id`);

--
-- Constraints for table `insurancename`
--
ALTER TABLE `insurancename`
  ADD CONSTRAINT `insurancename_ibfk_1` FOREIGN KEY (`num_plate_id`) REFERENCES `vehicle` (`num_plate_id`);

--
-- Constraints for table `insurance_claim`
--
ALTER TABLE `insurance_claim`
  ADD CONSTRAINT `fk_in` FOREIGN KEY (`insurance_id`) REFERENCES `insurancename` (`insurance_id`),
  ADD CONSTRAINT `fk_np` FOREIGN KEY (`num_plate_id`) REFERENCES `vehicle` (`num_plate_id`);

--
-- Constraints for table `insurance_history`
--
ALTER TABLE `insurance_history`
  ADD CONSTRAINT `fk_ins` FOREIGN KEY (`insurance_id`) REFERENCES `insurancename` (`insurance_id`),
  ADD CONSTRAINT `fk_num` FOREIGN KEY (`num_plate_id`) REFERENCES `vehicle` (`num_plate_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `FK_NotiFy` FOREIGN KEY (`num_plate_id`) REFERENCES `vehicle` (`num_plate_id`);

--
-- Constraints for table `rent_price`
--
ALTER TABLE `rent_price`
  ADD CONSTRAINT `FK_RentId` FOREIGN KEY (`num_plate_id`) REFERENCES `vehicle` (`num_plate_id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `FK_ServId` FOREIGN KEY (`num_plate_id`) REFERENCES `vehicle` (`num_plate_id`);

--
-- Constraints for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD CONSTRAINT `userdetail_ibfk_1` FOREIGN KEY (`emailId`) REFERENCES `usersignup` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
