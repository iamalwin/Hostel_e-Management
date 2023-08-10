-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2023 at 07:24 PM
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
-- Database: `hostel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(20) NOT NULL,
  `psw` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `psw`) VALUES
('admin', '11');

-- --------------------------------------------------------

--
-- Table structure for table `amnt`
--

CREATE TABLE `amnt` (
  `id` varchar(50) NOT NULL,
  `hf` varchar(50) NOT NULL,
  `mf` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `amnt`
--

INSERT INTO `amnt` (`id`, `hf`, `mf`, `total`, `month`, `date`) VALUES
('1', '1000', '1500', '2500', 'October', '2019-10-31'),
('2', '1000', '1500', '2500', 'September', '2019-10-30'),
('3', '1000', '1500', '2500', 'November', '2019-10-30'),
('4', '1000', '1700', '2700', 'December', '2019-11-29'),
('5', '1000', '1500', '2500', 'July', '2023-08-15'),
('6', '1000', '300', '1300', 'July', '2023-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `hcheck`
--

CREATE TABLE `hcheck` (
  `id` varchar(20) NOT NULL,
  `reg` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `dist` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hcheck`
--

INSERT INTO `hcheck` (`id`, `reg`, `name`, `gender`, `dept`, `dist`, `address`, `status`) VALUES
('1', 'UG1902', 'vinoth', 'male', 'cs', 'trichy', 'trichy', '1'),
('2', 'UG1903', 'vinoth', 'male', 'cs', 'trichy', 'trichy', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `id` varchar(50) NOT NULL,
  `hname` varchar(50) NOT NULL,
  `nor` varchar(50) NOT NULL,
  `rm` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `hfor` varchar(50) NOT NULL,
  `hc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`id`, `hname`, `nor`, `rm`, `phone`, `hfor`, `hc`) VALUES
('1', 'Boys Hostel', '100', '1-100', '9988776611', 'boys', '300'),
('2', 'Rose', '100', '1-100', '9976322005', 'girls', '300'),
('3', 'Umayal', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `paid`
--

CREATE TABLE `paid` (
  `id` varchar(20) NOT NULL,
  `reg` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `paid`
--

INSERT INTO `paid` (`id`, `reg`, `total`, `date`, `month`) VALUES
('1', 'UG1901', '2500', '19-10-04', 'October'),
('2', 'UG1901', '2500', '19-10-04', 'September'),
('4', 'UG1902', '2700', '19-11-01', 'December'),
('5', 'UG1901', '2500', '19-11-08', 'September'),
('6', 'UG1901', '2500', '23-07-31', 'July'),
('7', 'UG1901', '2500', '23-07-31', 'July'),
('8', 'UG1902', '2500', '23-07-31', 'July'),
('9', 'ug1901', '2500', '23-07-31', 'July');

-- --------------------------------------------------------

--
-- Table structure for table `stud`
--

CREATE TABLE `stud` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `reg` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `cls` varchar(50) NOT NULL,
  `hname` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `year` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stud`
--

INSERT INTO `stud` (`id`, `name`, `reg`, `gender`, `age`, `email`, `phone`, `dept`, `cls`, `hname`, `room`, `year`) VALUES
('1', 'admin', 'ug1901', 'male', '22', 'admin@gamail.com', '6374991998', 'cs', 'mca', 'boys', '11', '2222'),
('2', 'susmitha', 'ug1902', 'female', '22', 'susmitha@gamail.com', '1907637499', 'it', 'bca', 'rose', '18', '2024'),
('', '', '', '', '', '', '', '', '', 'Boys Hostel', '100', NULL),
('', '', '', '', '', '', '', '', '', 'Boys Hostel', '22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studreq`
--

CREATE TABLE `studreq` (
  `id` int(3) NOT NULL,
  `name` varchar(25) NOT NULL,
  `reg` varchar(8) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dept` varchar(25) NOT NULL,
  `cls` varchar(25) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studreq`
--

INSERT INTO `studreq` (`id`, `name`, `reg`, `gender`, `age`, `email`, `phone`, `dept`, `cls`, `year`) VALUES
(1, '2w', '2w', 'male', 2, 'x.dravidsh6374@gmail.com', '7890563412', 'it', 'ed', 2);

-- --------------------------------------------------------

--
-- Table structure for table `suggest`
--

CREATE TABLE `suggest` (
  `id` varchar(20) NOT NULL,
  `reg` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `cmpl` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studreq`
--
ALTER TABLE `studreq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studreq`
--
ALTER TABLE `studreq`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
