-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2023 at 06:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_account`
--

CREATE TABLE `tb_account` (
  `idaccount` int(11) NOT NULL,
  `idorganization` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photos` text NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_account`
--

INSERT INTO `tb_account` (`idaccount`, `idorganization`, `username`, `email`, `password`, `name`, `photos`, `role`) VALUES
(1, 1, 'bukuwarung', 'bukuwarung@gmail.com', '202cb962ac59075b964b07152d234b70', 'Admin Buku Warung', '-', 'Admin'),
(2, 2, 'majoo.id', 'majoo@gmail.com', 'ed2cc0e2b7c1c1ebcbc1366f0a9ba807', 'Admin Majoo', '-', 'Admin'),
(3, 2, 'farhan.aditya', 'farhan.aditya@gmail.com', '1ac5012170b65fb99f171ad799d045ac', 'Farhan Aditya', '-', 'PM'),
(4, 2, 'rifai', 'rifai@gmail.com', '04d190f80d74452c2b8b05b5898b77df', 'Rifai', '-', 'PM'),
(5, 2, 'rizky.wepe', 'wepe@gmail.com', 'ad681ae7f335b21795b2d5ac3ec97554', 'Rizky Wepe', '-', 'Employee'),
(6, 2, 'ach_rofiqi', 'achrofiqi@gmail.com', '75295a1c8ba69ba83b941679d9a9711e', 'Ach. Rofiqi', '-', 'Employee'),
(7, 1, 'lelypuspita', 'lelypuspita@gmail.com', 'e0383b0e9f4d15556fea4c93f548b6ce', 'Lely Puspita Sari', '-', 'Employee'),
(8, 1, 'RizalWiyono', 'muhammadrizalwiyono@gmail.com', '202cb962ac59075b964b07152d234b70', 'Muhammad Rizal Wiyono', '-', 'PM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_boards`
--

CREATE TABLE `tb_boards` (
  `idboards` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `idorganization` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `plan_date` date NOT NULL,
  `start_date` date NOT NULL,
  `deadline` date NOT NULL,
  `pay_status` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `project_price` varchar(50) NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_boards`
--

INSERT INTO `tb_boards` (`idboards`, `idclient`, `idorganization`, `title`, `description`, `plan_date`, `start_date`, `deadline`, `pay_status`, `status`, `project_price`, `end_date`) VALUES
(1, 1, 1, 'Task Mangement', 'Dashboard Task Mangement', '2023-01-13', '2023-01-30', '2023-01-18', 'Lunas', 'Publish', '2000000', '2023-01-21'),
(2, 1, 1, 'ad', 'Task description here...\r\n              ', '0000-00-00', '2023-01-25', '2023-01-31', 'Lunas', 'On Progress', '1', '0000-00-00'),
(3, 2, 1, 'xc', 'Task description here...\r\n              ', '0000-00-00', '2023-01-31', '2023-01-31', 'Lunas', 'Done', '19', '0000-00-00'),
(4, 3, 1, 'ad', 'Task description here...\r\n              ', '2023-01-18', '2023-01-30', '2023-01-26', 'Lunas', 'Publish', '11', '0000-00-00'),
(5, 5, 1, 'xc', 'Task description here...\r\n              ', '0000-00-00', '2023-01-30', '2023-01-27', 'Lunas', 'Publish', '20', '0000-00-00'),
(6, 6, 1, 'Apps Calculator', 'asdasd', '0000-00-00', '2023-01-30', '2023-02-03', 'Lunas', 'Publish', '200', '0000-00-00'),
(7, 7, 1, 'qqq', 'Task description here...\r\n              ', '0000-00-00', '2023-01-30', '2023-02-04', 'Lunas', 'Publish', '10', '0000-00-00'),
(8, 8, 1, 'Nem Apps', 'Task description here...\r\n              ', '2023-02-02', '0000-00-00', '2023-02-03', 'Lunas', 'Draft', '200.000', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_client`
--

CREATE TABLE `tb_client` (
  `idclient` int(11) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `no_telp` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_client`
--

INSERT INTO `tb_client` (`idclient`, `owner_name`, `address`, `no_telp`, `email`, `company_name`) VALUES
(1, 'Daniel Julian', 'asdasd', 2147483647, 'daniel@gmail.com', 'UBAYA'),
(2, 'zxczxczxc', 'asdads', 123123, 'asd@gmail.com', 'asd'),
(3, 'zxczxczxc', 'aa', 11, 'asd@gmail.com', 'sss'),
(4, 'xxx', 's', 1, 'asd@gmail.com', 'ww'),
(5, 'zxczxcwww', 'asd', 1, 'asd@gmail.com', 'wws'),
(6, 'Daniel', 'asd', 123, 'daniel@gmail.com', 'Julian'),
(7, 'sss', 'ccc', 111, 'asd@gmail.com', 'zzz'),
(8, 'New Apps', 'w', 111, 'asd@gmail.com', 'Comp');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contribution`
--

CREATE TABLE `tb_contribution` (
  `idcontribution` int(11) NOT NULL,
  `idaccount` int(11) NOT NULL,
  `idtask` int(11) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_contribution`
--

INSERT INTO `tb_contribution` (`idcontribution`, `idaccount`, `idtask`, `status`) VALUES
(1, 8, 1, ' '),
(2, 7, 2, ' '),
(3, 8, 2, ' '),
(4, 7, 5, ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_organization`
--

CREATE TABLE `tb_organization` (
  `idorganization` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company_service_type` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `link_photo` text NOT NULL,
  `no_telp` int(11) NOT NULL,
  `website` text DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_organization`
--

INSERT INTO `tb_organization` (`idorganization`, `name`, `company_service_type`, `address`, `link_photo`, `no_telp`, `website`, `email`) VALUES
(1, 'Buku Warung', 'Product', 'Kawasan, Sopo Del Tower B, 22nd Floor Jl. Mega Kuningan Barat III Lot 10. 1-6, Kuningan, Daerah Khusus Ibukota Jakarta 12950', '-', 2147483647, 'https://bukuwarung.com/', 'bukuwarung@gmail.com'),
(2, 'Majoo', 'Product', 'Jl. Prapanca Raya No.25 Jakarta - Indonesia, 12160', '-', 1500460, 'https://majoo.id/', 'majoo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_priority_master`
--

CREATE TABLE `tb_priority_master` (
  `idpriority` int(11) NOT NULL,
  `priority` varchar(45) NOT NULL,
  `priority_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_priority_master`
--

INSERT INTO `tb_priority_master` (`idpriority`, `priority`, `priority_point`) VALUES
(1, 'Low', 10),
(2, 'Medium', 20),
(3, 'High', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tb_report`
--

CREATE TABLE `tb_report` (
  `idreport` int(11) NOT NULL,
  `idaccount` int(11) NOT NULL,
  `idboards` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_report`
--

INSERT INTO `tb_report` (`idreport`, `idaccount`, `idboards`, `description`, `date`, `status`) VALUES
(1, 3, 1, 'aaa', '2023-01-26 16:33:22', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_target`
--

CREATE TABLE `tb_target` (
  `idtarget` int(11) NOT NULL,
  `idaccount` int(11) NOT NULL,
  `total_target` int(11) NOT NULL,
  `date` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_task`
--

CREATE TABLE `tb_task` (
  `idtask` int(11) NOT NULL,
  `idboards` int(11) NOT NULL,
  `idpriority` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `plan_date` date NOT NULL,
  `start_date` date NOT NULL,
  `description` text NOT NULL,
  `deadline` date NOT NULL,
  `status` varchar(45) NOT NULL,
  `link_file` text NOT NULL,
  `end_date` date NOT NULL,
  `flow` int(11) NOT NULL,
  `task_done_flow` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_task`
--

INSERT INTO `tb_task` (`idtask`, `idboards`, `idpriority`, `title`, `plan_date`, `start_date`, `description`, `deadline`, `status`, `link_file`, `end_date`, `flow`, `task_done_flow`) VALUES
(1, 1, 1, 'ui', '2023-01-31', '2023-01-16', 'asdasd', '2023-01-18', 'Date Extention', '-', '0000-00-00', 1, 'OFF'),
(2, 1, 1, 'sd', '2023-01-03', '2023-01-17', 'ewr', '2023-01-27', 'Publish', '-', '2023-01-03', 2, 'OFF'),
(3, 1, 2, 'xx', '0000-00-00', '2023-01-27', 'xx', '2023-01-28', 'Publish', '-', '0000-00-00', 3, 'OFF'),
(4, 1, 1, 'New UI', '2023-01-29', '2023-01-28', 'qwe', '2023-01-20', 'Publish', '-', '2023-01-31', 4, 'OFF'),
(5, 6, 1, 'test', '2023-01-31', '2023-01-30', 'asdasd', '2023-02-01', 'Verification', '-', '0000-00-00', 1, 'OFF'),
(6, 1, 1, 'zxczxc', '2023-01-30', '0000-00-00', 'asd', '2023-02-01', 'Publish', '-', '0000-00-00', 5, 'OFF'),
(7, 1, 1, 'zxczxc', '2023-01-30', '0000-00-00', 'asd', '2023-02-01', 'Publish', '-', '0000-00-00', 6, 'OFF'),
(8, 1, 1, 'zxczxc', '2023-01-30', '0000-00-00', 'asd', '2023-02-01', 'Publish', '-', '0000-00-00', 7, 'OFF'),
(9, 1, 1, '222', '2023-01-30', '0000-00-00', 'ww', '2023-02-03', 'Publish', '-', '0000-00-00', 8, 'OFF'),
(10, 1, 1, 'new', '2023-01-30', '0000-00-00', 'w', '2023-02-03', 'Publish', '-', '0000-00-00', 9, 'OFF'),
(11, 1, 1, 'x', '2023-01-30', '0000-00-00', 'w', '2023-02-03', 'Publish', '-', '0000-00-00', 10, 'OFF'),
(12, 1, 1, 'ccz', '2023-01-30', '0000-00-00', 's', '2023-02-02', 'Publish', '-', '0000-00-00', 11, 'OFF'),
(13, 1, 1, 'ccz', '2023-01-30', '0000-00-00', 's', '2023-02-02', 'Publish', '-', '0000-00-00', 12, 'OFF'),
(14, 1, 1, 'ccz', '2023-01-30', '0000-00-00', 's', '2023-02-02', 'Publish', '-', '0000-00-00', 13, 'OFF'),
(15, 1, 1, 'ccz', '2023-01-30', '0000-00-00', 's', '2023-02-02', 'Publish', '-', '0000-00-00', 14, 'OFF'),
(16, 1, 1, 'ccz', '2023-01-30', '0000-00-00', 's', '2023-02-02', 'Publish', '-', '0000-00-00', 15, 'OFF'),
(17, 1, 1, 'ccz', '2023-01-30', '0000-00-00', 's', '2023-02-02', 'Publish', '-', '0000-00-00', 16, 'OFF'),
(18, 1, 1, 'ccz', '2023-01-30', '0000-00-00', 's', '2023-02-02', 'Publish', '-', '0000-00-00', 17, 'OFF'),
(19, 1, 1, 'ccz', '2023-01-30', '0000-00-00', 's', '2023-02-02', 'Publish', '-', '0000-00-00', 18, 'OFF'),
(20, 1, 2, 'qwerty', '2023-02-03', '0000-00-00', 'qwerty', '2023-02-06', 'Publish', '-', '0000-00-00', 19, 'OFF');

-- --------------------------------------------------------

--
-- Table structure for table `tb_value`
--

CREATE TABLE `tb_value` (
  `idvalue` int(11) NOT NULL,
  `idtask` int(11) NOT NULL,
  `idpriority` int(11) NOT NULL,
  `type_value` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_value`
--

INSERT INTO `tb_value` (`idvalue`, `idtask`, `idpriority`, `type_value`, `value`, `date`) VALUES
(1, 1, 1, 'Point', 2222, '2023-01-15 12:46:26'),
(2, 2, 1, 'Point', 2000, '2023-01-26 16:19:41'),
(3, 3, 2, 'Point', 22, '2023-01-26 16:20:15'),
(4, 4, 1, 'Point', 2000, '2023-01-26 18:11:35'),
(5, 5, 1, 'Point', 22, '2023-01-30 13:11:59'),
(6, 19, 1, 'Point', 22, '2023-01-30 19:41:08'),
(7, 20, 2, 'Point', 200, '2023-02-03 14:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wallet`
--

CREATE TABLE `tb_wallet` (
  `idwallet` int(11) NOT NULL,
  `idvalue` int(11) NOT NULL,
  `idaccount` int(11) NOT NULL,
  `type_value` varchar(50) NOT NULL,
  `total_value_earned` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_wallet`
--

INSERT INTO `tb_wallet` (`idwallet`, `idvalue`, `idaccount`, `type_value`, `total_value_earned`, `date`) VALUES
(1, 1, 8, 'Point', 2222, '2023-01-15 13:45:54'),
(2, 5, 7, 'Point', 22, '2023-02-03 14:10:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_account`
--
ALTER TABLE `tb_account`
  ADD PRIMARY KEY (`idaccount`),
  ADD KEY `fk_tb_account_tb_organization1_idx` (`idorganization`);

--
-- Indexes for table `tb_boards`
--
ALTER TABLE `tb_boards`
  ADD PRIMARY KEY (`idboards`),
  ADD KEY `fk_tb_boards_tb_client1_idx` (`idclient`);

--
-- Indexes for table `tb_client`
--
ALTER TABLE `tb_client`
  ADD PRIMARY KEY (`idclient`);

--
-- Indexes for table `tb_contribution`
--
ALTER TABLE `tb_contribution`
  ADD PRIMARY KEY (`idcontribution`);

--
-- Indexes for table `tb_organization`
--
ALTER TABLE `tb_organization`
  ADD PRIMARY KEY (`idorganization`);

--
-- Indexes for table `tb_priority_master`
--
ALTER TABLE `tb_priority_master`
  ADD PRIMARY KEY (`idpriority`);

--
-- Indexes for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD PRIMARY KEY (`idreport`),
  ADD KEY `fk_tb_report_tb_account1_idx` (`idaccount`),
  ADD KEY `fk_tb_report_tb_boards1_idx` (`idboards`);

--
-- Indexes for table `tb_target`
--
ALTER TABLE `tb_target`
  ADD PRIMARY KEY (`idtarget`),
  ADD KEY `fk_tb_target_point_tb_account1_idx` (`idaccount`);

--
-- Indexes for table `tb_task`
--
ALTER TABLE `tb_task`
  ADD PRIMARY KEY (`idtask`),
  ADD KEY `fk_tb_task_tb_boards1_idx` (`idboards`),
  ADD KEY `fk_tb_task_tb_priority_master1_idx` (`idpriority`);

--
-- Indexes for table `tb_value`
--
ALTER TABLE `tb_value`
  ADD PRIMARY KEY (`idvalue`);

--
-- Indexes for table `tb_wallet`
--
ALTER TABLE `tb_wallet`
  ADD PRIMARY KEY (`idwallet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_account`
--
ALTER TABLE `tb_account`
  MODIFY `idaccount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_boards`
--
ALTER TABLE `tb_boards`
  MODIFY `idboards` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_client`
--
ALTER TABLE `tb_client`
  MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_contribution`
--
ALTER TABLE `tb_contribution`
  MODIFY `idcontribution` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_organization`
--
ALTER TABLE `tb_organization`
  MODIFY `idorganization` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_priority_master`
--
ALTER TABLE `tb_priority_master`
  MODIFY `idpriority` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_target`
--
ALTER TABLE `tb_target`
  MODIFY `idtarget` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_task`
--
ALTER TABLE `tb_task`
  MODIFY `idtask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_value`
--
ALTER TABLE `tb_value`
  MODIFY `idvalue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_wallet`
--
ALTER TABLE `tb_wallet`
  MODIFY `idwallet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
