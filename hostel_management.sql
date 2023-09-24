-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 08:44 AM
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
('5', '2000', '2500', '4500', 'March', '2023-07-28'),
('6', '', '', '0', '', '2023-07-19'),
('7', '2000', '2500', '4500', 'July', '2023-07-14'),
('8', '1000', '1500', '2500', 'Agust', '2023-07-29'),
('9', '', '', '0', '', '2023-09-30'),
('10', '', '', '0', '', '2023-09-30'),
('10', '', '', '0', '', '2023-09-30');

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
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_id` INT PRIMARY KEY,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_published` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
DELIMITER //
CREATE TRIGGER tr_news_insert
BEFORE INSERT ON news
FOR EACH ROW
BEGIN
    DECLARE max_news_id INT;
    SET max_news_id = (SELECT MAX(CAST(SUBSTRING(news_id, 5) AS UNSIGNED)) FROM news);
    SET NEW.news_id = CONCAT('news', COALESCE(max_news_id + 1, 1));
END;
//
DELIMITER ;

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
('5', 'UG1901', '2500', '19-11-08', 'September');

-- --------------------------------------------------------

--
-- Table structure for table `stud`
--

CREATE TABLE `stud` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(20) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `reg` varchar(20) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `year` varchar(20) NOT NULL,
  `fathname` varchar(50) NOT NULL,
  `fathphone` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `bldgrp` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud`
--

INSERT INTO `stud` (`id`, `stud_id`, `name`, `reg`, `dept`, `year`, `fathname`, `fathphone`, `age`, `dob`, `bldgrp`, `email`, `phone`, `address`, `image`) VALUES
(1, 'stud001', 'Loyola', 'UG1901', 'Mca', '2nd PG', 'Peeter', '9093229074', 21, '2001-06-05', 'O +ve', 'loyola@gmail.com', '9976322002', '40/4, Rasipuram, Namakkal', ''),
(2, 'stud002', 'john', 'UG1902', 'Mca', '1st PG', 'Josh', '9023234546', 22, '2001-06-19', 'B -ve', 'john@gmail.com', '9976322008', '30/4, Vennandur, Namakkal', ''),
(10, 'stud010', 'Alwin', 'UG1903', 'Mca', '2nd PG', 'Jams', '9023453454', 22, '1999-10-20', 'B -ve', 'alwin@gmail.com', '9092873343', '32/4, Vennandur,Namakkal', ''),
(11, 'stud011', 'kavin', 'UG1904', 'MBA', '2nd PG', 'Ravi', '9372837587', 21, '2001-06-05', 'O -ve', 'kavin@gmail.com', '9092873343', '34/4, Salem', 'face4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `studreq`
--

CREATE TABLE `studreq` (
  `id` int(11) NOT NULL,
  `reg` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fathname` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `adds` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studreq`
--

INSERT INTO `studreq` (`id`, `reg`, `name`, `fathname`, `age`, `gender`, `dob`, `email`, `phone`, `adds`) VALUES
(1, 'UG1905', 'loyola', 'peter', 21, 'male', '2001-01-30', 'loyola@gmail.com', '9876453409', '40/4, rasipuram, salem');

-- --------------------------------------------------------

--
-- Table structure for table `studs`
--

CREATE TABLE `studs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `reg` varchar(10) NOT NULL,
  `dept` varchar(10) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `fathname` varchar(20) DEFAULT NULL,
  `fathphone` varchar(15) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `bldgrp` varchar(10) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suggest`
--

CREATE TABLE `suggest` (
  `id` varchar(20) NOT NULL,
  `reg` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `cmpl` varchar(250) NOT NULL,
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `suggest`
--

INSERT INTO `suggest` (`id`, `reg`, `name`, `sub`, `cmpl`, `status`) VALUES
('1', ' 22pca139', 'Draveed', 'Regarding Hostel Food', 'Try to improve the hostel food ', 'solved'),
('2', ' ug1902', 'susmitha', 'About hostel study time.', 'Study time is not convenient for all the students. Please make changes in hostel study time.', 'solved');

--
-- Indexes for table `stud`
--
ALTER TABLE `stud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studreq`
--
ALTER TABLE `studreq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studs`
--
ALTER TABLE `studs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stud`
--
ALTER TABLE `stud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `studreq`
--
ALTER TABLE `studreq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studs`
--
ALTER TABLE `studs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
