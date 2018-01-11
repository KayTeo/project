-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2018 at 03:25 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

 CREATE DATABASE EMPLOYEE; SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_ID` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `full_Name` varchar(100) NOT NULL,
  `phone_Number` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `captcha` int(10) NOT NULL,
  `otp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `username`, `hash`, `full_Name`, `phone_Number`, `email`, `address`, `role`, `captcha`, `otp`) VALUES
(7, 'Keith', '$2y$11$MERlCThMN4O0TaKECDU2fePPSH8yZTwxlFX0zp6TtSMPRIVCKwQeW', 'aefae', 91836568, 'keith_teo@outlook.sg', '1234', '', 0, 0),
(8, 'Keith', '$2y$11$ZlcaIUF85ze10hOwkg7dd.OqaGvjNKXt78sPnkE6Uf2QLGMh0.oV6', 'aefae', 91836568, 'keith_teo@outlook.sg', '1234', '', 0, 0),
(9, 'r123', '$2y$11$0rNbDPjtCJWBR1y1l6AsSeFNsl2m88y4Xj04pnT8mlsJ2ycWfgSke', 'faefa', 91836568, 'keith_fowl@hotmail.com', '421', '', 0, 0),
(10, 'r123', '$2y$11$nNbznUINqsXWoTPEv7V/CuKI9WZ5G/F7HsDCKF2RKXyofF0FXCfHe', 'faefa', 91836568, 'keith_fowl@hotmail.com', '421', '', 0, 0),
(11, 'oet9utae', '$2y$11$Y7UNarNxaYFce8235D8pQ.61fKyJI/AodHRWGdLZcRZL8gbUlK.ga', 'fea', 91836568, 'r21@gmail.com', 'Flora Road, Avila Gardens, 13B, #04-08', '', 0, 0),
(12, 'admin', '$2y$11$DERezcMFrzngxJzlGqUmPOiQVIpkM4auOWI6JXHpviU3.Wcu0z1nq', 'Keith teo', 91836568, 'jeit@gmail.com', 'faea', '', 0, 0),
(14, 'admin', '$2y$11$RtGfQu.Ufxqj4s9UKu6LluhI/7XNLqdXucQrj9UAvWd9gURda5ejO', 'jeaut', 91836568, '2131', 'Flora Road, Avila Gardens, 13B, #04-08', 'admin', 0, 0),
(15, 'admin1', '$2y$11$9WKdS4rwUH6jb06tOpiJPOAX1iqQCFjLgcgVNxruLr1Mue6Sn71qO', 'keith teo', 99184152, 'keith_teo@outlook.sg', '2141', 'admin', 0, 0),
(16, 'admin2', '$2y$11$004VRmAcS4.MMBAKSEVpBuabQNzlVOUq/q4KVFBqYnYbzuRVzBzXG', '1', 91836568, 'keith_teo@outlook.sg', '1234', '123', 9191756, 0),
(17, 'admin3', '$2y$11$leoMtxLg/XXEUBAvjX2Tru4F.xehyhyqzr58T00r40tIAQX7Vjjea', 'keit', 99999999, 'kethea', '1231', 'admin', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
