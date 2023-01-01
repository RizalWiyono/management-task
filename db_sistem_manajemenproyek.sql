-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 06:31 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1, 1, 'asd', 'user@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'asd', '-', 'Scrum Master'),
(2, 1, 'angelinasond', 'angelina@gmail.com', '202cb962ac59075b964b07152d234b70', 'Angelina Sondakh', '', 'Employee'),
(3, NULL, 'alexandre', 'alexandre@gmail.com', '534b44a19bf18d20b71ecc4eb77c572f', 'Alex Andra', '', 'Employee');

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
  `pay_status` varchar(45) NOT NULL,
  `price` bigint(20) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_boards`
--

INSERT INTO `tb_boards` (`idboards`, `title`, `description`, `startdate`, `deadline`, `pay_status`, `price`, `status`) VALUES
(1, 'Web Task Management', 'Website yang memiliki fungsi untuk memanajemen tugas', '2022-09-17', '2023-01-02', 'Lunas', 2000000, 'On Progress');

-- --------------------------------------------------------

--
-- Table structure for table `tb_client`
--

CREATE TABLE `tb_client` (
  `idclient` int(11) NOT NULL,
  `idboards` int(11) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `no_telp` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_client`
--

INSERT INTO `tb_client` (`idclient`, `idboards`, `owner_name`, `address`, `no_telp`, `email`, `company_name`) VALUES
(1, 1, 'Daniel Julian', 'Universitas Surabaya', 666, 'developer@gmail.com', 'UBAYA');

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

--
-- Dumping data for table `tb_contribution`
--

INSERT INTO `tb_contribution` (`idcontribution`, `idaccount`, `idtask`, `status`) VALUES
(1, 1, 2, ' '),
(2, 2, 2, ' '),
(4, 1, 4, ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `idactivity` int(11) NOT NULL,
  `idaccount` int(11) DEFAULT NULL,
  `activity` text,
  `date` datetime DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `tb_organization`
--

CREATE TABLE `tb_organization` (
  `idorganization` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `company_service_type` varchar(100) DEFAULT NULL,
  `address` text,
  `link_photo` text,
  `no_telp` int(11) DEFAULT NULL,
  `website` text,
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
-- Table structure for table `tb_priority_master`
--

CREATE TABLE `tb_priority_master` (
  `idpriority` int(11) NOT NULL,
  `priority` varchar(45) NOT NULL,
  `priority_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `salary` int(11) DEFAULT NULL,
  `flow` bigint(20) NOT NULL,
  `task_done_flow` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_task`
--

INSERT INTO `tb_task` (`idtask`, `idboards`, `title`, `startdate`, `description`, `deadline`, `priority`, `status`, `link_file`, `point`, `salary`, `flow`, `task_done_flow`) VALUES
(1, 1, 'UI Login', '2022-09-23', 'Desain UI bagian login', '2022-09-25', 'Low', 'Publish', '-', 200, 0, 1, 'OFF'),
(2, 1, 'UI Dashboard', '2022-09-27', 'Desain UI Dashboard', '2022-09-29', 'Medium', 'Publish', '-', 150, 0, 2, 'OFF'),
(3, 1, 'UI Boards', '2022-10-01', 'Desain UI Boards', '2022-10-03', 'Medium', 'Publish', '-', 150, 0, 3, '2'),
(4, 1, 'API Input Boards', '2022-10-01', 'REST API Input Boards', '2022-10-05', 'High', 'Publish', '-', 300, 0, 4, 'OFF'),
(5, 1, 'API Input Task', '2022-10-06', '', '2022-10-10', 'High', 'Publish', '-', 300, 0, 5, '4'),
(6, 1, 'Integrate API Boards', '2022-10-06', 'Integrasi API boards', '2022-10-10', 'High', 'Publish', '-', 200, 0, 6, 'OFF'),
(7, 1, 'Integrasi API Task', '2022-10-11', 'Integrasi API Task', '2022-10-15', 'High', 'Publish', '-', 250, 0, 7, '6'),
(8, 1, 'UI Task', '2022-09-05', '', '2022-09-10', 'Medium', 'Publish', '-', 100, 0, 8, '2,3,1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wallet_point`
--

CREATE TABLE `tb_wallet_point` (
  `idwalletpoint` int(11) NOT NULL,
  `idpayroll` int(11) NOT NULL,
  `idaccount` int(11) NOT NULL,
  `total_point` bigint(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_wallet_salary`
--

CREATE TABLE `tb_wallet_salary` (
  `idwalletsalary` int(11) NOT NULL,
  `idpayroll` int(11) NOT NULL,
  `idaccount` int(11) NOT NULL,
  `total_salary` bigint(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_account`
--
ALTER TABLE `tb_account`
  ADD PRIMARY KEY (`idaccount`);

--
-- Indexes for table `tb_boards`
--
ALTER TABLE `tb_boards`
  ADD PRIMARY KEY (`idboards`);

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
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`idactivity`);

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
-- Indexes for table `tb_priority_master`
--
ALTER TABLE `tb_priority_master`
  ADD PRIMARY KEY (`idpriority`);

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
-- Indexes for table `tb_wallet_point`
--
ALTER TABLE `tb_wallet_point`
  ADD PRIMARY KEY (`idwalletpoint`);

--
-- Indexes for table `tb_wallet_salary`
--
ALTER TABLE `tb_wallet_salary`
  ADD PRIMARY KEY (`idwalletsalary`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_account`
--
ALTER TABLE `tb_account`
  MODIFY `idaccount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_boards`
--
ALTER TABLE `tb_boards`
  MODIFY `idboards` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_client`
--
ALTER TABLE `tb_client`
  MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_contribution`
--
ALTER TABLE `tb_contribution`
  MODIFY `idcontribution` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_note`
--
ALTER TABLE `tb_note`
  MODIFY `idnote` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_point`
--
ALTER TABLE `tb_point`
  MODIFY `idpoint` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_priority_master`
--
ALTER TABLE `tb_priority_master`
  MODIFY `idpriority` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_target_point`
--
ALTER TABLE `tb_target_point`
  MODIFY `idtargetPoint` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_task`
--
ALTER TABLE `tb_task`
  MODIFY `idtask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_wallet_point`
--
ALTER TABLE `tb_wallet_point`
  MODIFY `idwalletpoint` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_wallet_salary`
--
ALTER TABLE `tb_wallet_salary`
  MODIFY `idwalletsalary` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
