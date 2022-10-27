-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 07:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistem_manajemenproyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_account`
--

CREATE TABLE `tb_account` (
  `idaccount` int(11) NOT NULL,
  `idorganization` int(11) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photos` text NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_account`
--

INSERT INTO `tb_account` (`idaccount`, `idorganization`, `username`, `email`, `password`, `name`, `photos`, `role`) VALUES
(1, 1, 'asd', 'user@gmail.com', 'asd', 'asd', '-', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tb_activity`
--

CREATE TABLE `tb_activity` (
  `idactivity` int(11) NOT NULL,
  `idaccount` int(11) DEFAULT NULL,
  `activity` text DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_boards`
--

CREATE TABLE `tb_boards` (
  `idboards` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `startdate` date NOT NULL,
  `deadline` date NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_boards`
--

INSERT INTO `tb_boards` (`idboards`, `title`, `description`, `startdate`, `deadline`, `status`) VALUES
(1, 'Gamabunta', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-10-01', '2022-10-04', 'On Progress');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contribution`
--

CREATE TABLE `tb_contribution` (
  `idcontribution` int(11) NOT NULL,
  `idaccount` int(11) NOT NULL,
  `idtask` int(11) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_note`
--

CREATE TABLE `tb_note` (
  `idnote` int(11) NOT NULL,
  `idaccount` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_note`
--

INSERT INTO `tb_note` (`idnote`, `idaccount`, `title`, `description`, `date`) VALUES
(1, 1, 'asdasd', 'zvxcvxcvxc', '0000-00-00'),
(2, 1, 'zxcxzc', 'czxc', '0000-00-00'),
(3, 1, 'czxc', 'Description here...\r\n              czxczxc', '0000-00-00'),
(4, 1, 'asd', 'Description here...\r\n              ', '2022-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_organization`
--

CREATE TABLE `tb_organization` (
  `idorganization` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `company_service_type` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `link_photo` text DEFAULT NULL,
  `no_telp` int(11) DEFAULT NULL,
  `website` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_payroll`
--

CREATE TABLE `tb_payroll` (
  `idpayroll` int(11) NOT NULL,
  `idaccount` int(11) NOT NULL,
  `idtask` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_point`
--

CREATE TABLE `tb_point` (
  `idpoint` int(11) NOT NULL,
  `idaccount` int(11) NOT NULL,
  `idtask` int(11) NOT NULL,
  `idtargetPoint` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_report`
--

CREATE TABLE `tb_report` (
  `idreport` int(11) NOT NULL,
  `idaccount` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_target_point`
--

CREATE TABLE `tb_target_point` (
  `idtargetPoint` int(11) NOT NULL,
  `totaltarget` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_task`
--

CREATE TABLE `tb_task` (
  `idtask` int(11) NOT NULL,
  `idboards` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `startdate` date NOT NULL,
  `description` text NOT NULL,
  `deadline` date NOT NULL,
  `priority` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `link_file` text NOT NULL,
  `point` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_task`
--

INSERT INTO `tb_task` (`idtask`, `idboards`, `title`, `startdate`, `description`, `deadline`, `priority`, `status`, `link_file`, `point`, `salary`) VALUES
(1, 1, '123', '2022-10-01', 'qwe', '2022-10-24', 'Medium', 'Done', '-', 123, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_wallet`
--

CREATE TABLE `tb_wallet` (
  `idwallet` int(11) NOT NULL,
  `idaccount` int(11) NOT NULL,
  `idtask` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_account`
--
ALTER TABLE `tb_account`
  ADD PRIMARY KEY (`idaccount`);

--
-- Indexes for table `tb_activity`
--
ALTER TABLE `tb_activity`
  ADD PRIMARY KEY (`idactivity`);

--
-- Indexes for table `tb_boards`
--
ALTER TABLE `tb_boards`
  ADD PRIMARY KEY (`idboards`);

--
-- Indexes for table `tb_contribution`
--
ALTER TABLE `tb_contribution`
  ADD PRIMARY KEY (`idcontribution`);

--
-- Indexes for table `tb_note`
--
ALTER TABLE `tb_note`
  ADD PRIMARY KEY (`idnote`);

--
-- Indexes for table `tb_organization`
--
ALTER TABLE `tb_organization`
  ADD PRIMARY KEY (`idorganization`);

--
-- Indexes for table `tb_payroll`
--
ALTER TABLE `tb_payroll`
  ADD PRIMARY KEY (`idpayroll`);

--
-- Indexes for table `tb_point`
--
ALTER TABLE `tb_point`
  ADD PRIMARY KEY (`idpoint`);

--
-- Indexes for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD PRIMARY KEY (`idreport`);

--
-- Indexes for table `tb_target_point`
--
ALTER TABLE `tb_target_point`
  ADD PRIMARY KEY (`idtargetPoint`);

--
-- Indexes for table `tb_task`
--
ALTER TABLE `tb_task`
  ADD PRIMARY KEY (`idtask`);

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
  MODIFY `idaccount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_boards`
--
ALTER TABLE `tb_boards`
  MODIFY `idboards` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_note`
--
ALTER TABLE `tb_note`
  MODIFY `idnote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_point`
--
ALTER TABLE `tb_point`
  MODIFY `idpoint` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_target_point`
--
ALTER TABLE `tb_target_point`
  MODIFY `idtargetPoint` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_task`
--
ALTER TABLE `tb_task`
  MODIFY `idtask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
