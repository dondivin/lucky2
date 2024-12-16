-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql206.infinityfree.com
-- Generation Time: Feb 21, 2024 at 05:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luckyday`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounttbl`
--

CREATE TABLE `accounttbl` (
  `id` int(11) NOT NULL,
  `UserName` varchar(40) NOT NULL DEFAULT 'Unknown',
  `numbers` varchar(50) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Id_user` varchar(10) NOT NULL,
  `InvitedBy` varchar(10) NOT NULL,
  `Balance` int(20) NOT NULL DEFAULT 5000,
  `ClaimedDate` varchar(40) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `IpClient` varchar(40) NOT NULL,
  `ClaimedCount` int(10) NOT NULL DEFAULT 0,
  `Email` varchar(40) NOT NULL,
  `OTP` int(10) NOT NULL,
  `Status` varchar(40) NOT NULL DEFAULT 'false',
  `Theme` varchar(20) NOT NULL DEFAULT 'orange'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounttbl`
--

INSERT INTO `accounttbl` (`id`, `UserName`, `numbers`, `Password`, `Id_user`, `InvitedBy`, `Balance`, `ClaimedDate`, `IpClient`, `ClaimedCount`, `Email`, `OTP`, `Status`, `Theme`) VALUES
(4, 'Divin', '61897311', '1234', 'XB34B', '0', 10000, '2024-01-24 12:52:06', '192.168.43.68', 9, '', 0, 'true', 'white'),
(5, 'Un', '68785676', '', '8J4VV', 'XB34B', 1000, '2024-01-07 09:10:40', '', 0, '', 0, 'false', 'orange'),
(6, 'Un', '71897311', '', 'FNVS2', '', 5000, '0000-00-00 00:00:00', '', 0, '', 0, 'false', 'orange'),
(7, 'Un', '71582345', '', 'I1IHZ', '', 5000, '0000-00-00 00:00:00', '', 0, '', 0, 'false', 'orange'),
(8, 'Un', '0', '', 'ZRIK3', '', 6000, '2024-01-07 10:26:31', '192.168.43.64', 1, '', 0, 'false', 'orange'),
(12, 'Don', '72897311', '1234', 'KXBWP', '', 5000, '0000-00-00 00:00:00', '::1', 0, 'dondivin65@gmail.com', 20857, 'false', 'orange'),
(17, 'Divin', '77897311', '1234', 'XC8N7', 'XB34B', 6000, '2024-01-12 20:21:36', '154.73.107.7', 1, 'divindon34@gmail.com', 236735, 'true', 'white'),
(18, 'Tresor', '62127579', '1234', 'YKJFV', '', 6000, '2024-01-13 14:02:25', '154.73.107.249', 1, 'ndikumwenayotresor@gmail.com', 473635, 'true', 'orange'),
(19, 'The one', '70897311', '1234', 'NJK3K', '', 6000, '2024-01-14 12:41:14', '197.231.248.240', 1, 'Dondivin89@gmail.com', 248626, 'true', 'orange'),
(20, 'Lionel25', 'mbazumutimapuyol1@gmail.com', '79555353', '18YOJ', '', 5000, '0000-00-00 00:00:00', '154.117.216.88', 0, 'mbazumutimapuyol1@gmail.com', 197828, 'true', 'orange');

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`id`, `time`) VALUES
(1, '2024-01-01 01:05:08'),
(2, '2024-01-01 01:15:46'),
(3, '2024-01-01 13:17:37'),
(4, '2024-01-01 13:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawtbl`
--

CREATE TABLE `withdrawtbl` (
  `id` int(11) NOT NULL,
  `id_user` varchar(40) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `usdt` float NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `wallet` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawtbl`
--

INSERT INTO `withdrawtbl` (`id`, `id_user`, `amount`, `usdt`, `date`, `status`, `wallet`) VALUES
(12, 'XB34B', '2000', 2, '2024-01-06 18:40:34', 'Pending', 'TYFdmCQnUb2ffadg7P2Qq7rutmqTpYYL1o'),
(13, 'XB34B', '2000', 2, '2024-01-06 18:43:44', 'Pending', 'TYFdmCQnUb2ffadg7P2Qq7rutmqTpYYL1o'),
(14, 'XB34B', '2000', 2, '2024-01-06 18:48:10', 'Pending', 'TYFdmCQnUb2ffadg7P2Qq7rutmqTpYYL1o'),
(15, 'XB34B', '2000', 0.2, '2024-01-06 18:58:21', 'Pending', 'TYFdmCQnUb2ffadg7P2Qq7rutmqTpYYL1o'),
(16, 'XB34B', '20', 0.002, '2024-01-06 19:00:57', 'Pending', 'TYFdmCQnUb2ffadg7P2Qq7rutmqTpYYL1o'),
(17, 'XB34B', '20000', 2, '2024-01-06 19:02:50', 'Pending', 'TYFdmCQnUb2ffadg7P2Qq7rutmqTpYYL1o'),
(18, 'XB34B', '20000', 2, '2024-01-06 19:17:37', 'Pending', 'TYFdmCQnUb2ffadg7P2Qq7rutmqTpYYL1o'),
(19, '8J4VV', '10000', 1, '2024-01-07 09:04:12', 'Pending', 'TYFdmCQnUb2ffadg7P2Qq7rutmqTpYYL1o'),
(20, 'XB34B', '100000', 10, '2024-01-07 09:13:17', 'Pending', 'TYFdmCQnUb2ffadg7P2Qq7rutmqTpYYL1o');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounttbl`
--
ALTER TABLE `accounttbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawtbl`
--
ALTER TABLE `withdrawtbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounttbl`
--
ALTER TABLE `accounttbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `date`
--
ALTER TABLE `date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `withdrawtbl`
--
ALTER TABLE `withdrawtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
