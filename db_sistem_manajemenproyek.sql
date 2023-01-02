-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 02:34 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_account`
--

INSERT INTO `tb_account` (`idaccount`, `idorganization`, `username`, `email`, `password`, `name`, `photos`, `role`) VALUES
(1, 1, 'bukuwarung', 'bukuwarung@gmail.com', 'fdc2c485ed6115874842c7b54114e53e', 'Admin Buku Warung', '-', 'Admin'),
(2, 2, 'majoo.id', 'majoo@gmail.com', 'ed2cc0e2b7c1c1ebcbc1366f0a9ba807', 'Admin Majoo', '-', 'Admin'),
(3, 2, 'farhan.aditya', 'farhan.aditya@gmail.com', '1ac5012170b65fb99f171ad799d045ac', 'Farhan Aditya', '-', 'PM'),
(4, 2, 'rifai', 'rifai@gmail.com', '04d190f80d74452c2b8b05b5898b77df', 'Rifai', '-', 'PM'),
(5, 2, 'rizky.wepe', 'wepe@gmail.com', 'ad681ae7f335b21795b2d5ac3ec97554', 'Rizky Wepe', '-', 'Employee'),
(6, 2, 'ach_rofiqi', 'achrofiqi@gmail.com', '75295a1c8ba69ba83b941679d9a9711e', 'Ach. Rofiqi', '-', 'Employee'),
(7, 2, 'lelypuspita', 'lelypuspita@gmail.com', 'e0383b0e9f4d15556fea4c93f548b6ce', 'Lely Puspita Sari', '-', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tb_boards`
--

CREATE TABLE `tb_boards` (
  `idboards` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `plan_date` date NOT NULL,
  `start_date` date NOT NULL,
  `deadline` date NOT NULL,
  `pay_status` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `project_price` int(11) NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_boards`
--

INSERT INTO `tb_boards` (`idboards`, `idclient`, `title`, `description`, `plan_date`, `start_date`, `deadline`, `pay_status`, `status`, `project_price`, `end_date`) VALUES
(1, 1, 'AUTOMAN', 'Website kasir menggunakan kecerdasan buatan Face Recognition', '2022-01-05', '2022-01-10', '2022-03-10', 'Lunas', 'On Progress', 3500000, '2022-03-10');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_client`
--

INSERT INTO `tb_client` (`idclient`, `owner_name`, `address`, `no_telp`, `email`, `company_name`) VALUES
(1, 'UMM', 'Jl. Bendungan Sutami No.188, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145', 341551149, 'humas@umm.ac.id', 'UMM');

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
(2, 5, 2, ' '),
(3, 7, 2, ' ');

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
  `website` text,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_organization`
--

INSERT INTO `tb_organization` (`idorganization`, `name`, `company_service_type`, `address`, `link_photo`, `no_telp`, `website`, `email`) VALUES
(1, 'Buku Warung', 'Product', 'Kawasan, Sopo Del Tower B, 22nd Floor Jl. Mega Kuningan Barat III Lot 10. 1-6, Kuningan, Daerah Khusus Ibukota Jakarta 12950', '-', 2147483647, 'https://bukuwarung.com/', 'bukuwarung@gmail.com'),
(2, 'Majoo', 'Product', 'Jl. Prapanca Raya No.25 Jakarta - Indonesia, 12160', '-', 1500460, 'https://majoo.id/', 'majoo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payroll`
--

CREATE TABLE `tb_payroll` (
  `idpayroll` int(11) NOT NULL,
  `idtask` int(11) NOT NULL,
  `idtarget` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `total_salary_earned` bigint(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_point`
--

CREATE TABLE `tb_point` (
  `idpoint` int(11) NOT NULL,
  `idtask` int(11) NOT NULL,
  `idpriority` int(11) NOT NULL,
  `idtarget` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_target`
--

INSERT INTO `tb_target` (`idtarget`, `idaccount`, `total_target`, `date`, `status`) VALUES
(1, 4, 1400, '2023-01', 'Process'),
(2, 3, 1000, '2023-01', 'Process'),
(3, 5, 1270, '2023-01', 'Process'),
(4, 6, 1100, '2023-01', 'Process'),
(5, 7, 1400, '2023-01', 'Process');

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
  `point` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `flow` int(11) NOT NULL,
  `task_done_flow` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_task`
--

INSERT INTO `tb_task` (`idtask`, `idboards`, `idpriority`, `title`, `plan_date`, `start_date`, `description`, `deadline`, `status`, `link_file`, `end_date`, `point`, `salary`, `flow`, `task_done_flow`) VALUES
(2, 1, 2, 'Flowchart', '2022-01-10', '2022-01-10', 'Flowchart AUTOMAN', '2022-01-12', 'Publish', '-', '2022-01-13', 100, 0, 1, 'OFF');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wallet_point`
--

CREATE TABLE `tb_wallet_point` (
  `idwalletpoint` int(11) NOT NULL,
  `idpoint` int(11) NOT NULL,
  `idaccount` int(11) NOT NULL,
  `total_point_earned` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_wallet_salary`
--

CREATE TABLE `tb_wallet_salary` (
  `idwalletsalary` int(11) NOT NULL,
  `idpayroll` int(11) NOT NULL,
  `idaccount` int(11) NOT NULL,
  `total_salary_earned` bigint(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `tb_payroll`
--
ALTER TABLE `tb_payroll`
  ADD PRIMARY KEY (`idpayroll`),
  ADD KEY `fk_tb_payroll_tb_task1_idx` (`idtask`),
  ADD KEY `fk_tb_payroll_tb_target_point1_idx` (`idtarget`);

--
-- Indexes for table `tb_point`
--
ALTER TABLE `tb_point`
  ADD PRIMARY KEY (`idpoint`),
  ADD KEY `fk_tb_point_tb_task1_idx` (`idtask`),
  ADD KEY `fk_tb_point_tb_priority_master1_idx` (`idpriority`),
  ADD KEY `fk_tb_point_tb_target_point1_idx` (`idtarget`);

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
-- Indexes for table `tb_wallet_point`
--
ALTER TABLE `tb_wallet_point`
  ADD PRIMARY KEY (`idwalletpoint`,`idpoint`,`idaccount`),
  ADD KEY `fk_tb_point_has_tb_account_tb_account1_idx` (`idaccount`),
  ADD KEY `fk_tb_point_has_tb_account_tb_point1_idx` (`idpoint`);

--
-- Indexes for table `tb_wallet_salary`
--
ALTER TABLE `tb_wallet_salary`
  ADD PRIMARY KEY (`idwalletsalary`,`idpayroll`,`idaccount`),
  ADD KEY `fk_tb_payroll_has_tb_account_tb_account1_idx` (`idaccount`),
  ADD KEY `fk_tb_payroll_has_tb_account_tb_payroll1_idx` (`idpayroll`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_account`
--
ALTER TABLE `tb_account`
  MODIFY `idaccount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_boards`
--
ALTER TABLE `tb_boards`
  MODIFY `idboards` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_contribution`
--
ALTER TABLE `tb_contribution`
  MODIFY `idcontribution` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `idtarget` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_task`
--
ALTER TABLE `tb_task`
  MODIFY `idtask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
