-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 08:39 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `institute`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `Student_id` int(11) NOT NULL,
  `Student_name` varchar(500) NOT NULL,
  `Student_reg_no` varchar(256) NOT NULL,
  `Phone_no` varchar(255) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `Guardian_phone` varchar(255) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Joining_date` date NOT NULL,
  `Class` varchar(50) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `Status` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`Student_id`, `Student_name`, `Student_reg_no`, `Phone_no`, `Address`, `Guardian_phone`, `Email`, `Gender`, `Joining_date`, `Class`, `Date_of_birth`, `Status`) VALUES
(10, 'subham', '213', '2147483647', '', '0', '', 'male', '2023-09-13', '2', '2002-11-01', 'Y'),
(11, 'arijit', '43', '2147483647', '', '0', '', 'male', '2023-10-01', '1', '2006-01-06', 'Y'),
(12, 'rohit', '23', '2147483647', '', '0', '', 'male', '2023-09-07', '2', '2011-10-11', 'Y'),
(13, 'sattik', '22', '2147483647', '', '0', '', 'male', '2023-08-09', '2', '2013-01-08', 'Y'),
(14, 'ishan', '908', '2147483647', '', '0', '', 'male', '2023-06-14', '2', '2008-10-15', 'Y'),
(16, 'subham ', '123321', '2147483647', '', '0', '', 'male', '2023-10-05', '1', '2022-03-12', 'Y'),
(18, 'Debankur', '108', '2147483647', '', '0', '', 'male', '2023-10-06', '2', '2022-03-12', 'Y'),
(19, 'Subhman', '098', '2147483647', '', '0', '', 'female', '2023-10-02', '1', '2023-05-25', 'Y'),
(20, 'Sattik maiti', '1022', '2147483647', '', '0', '', 'male', '2023-10-25', '1', '2023-02-02', 'Y'),
(21, 'Ajay mahato', '7658', '2147483647', '', '0', '', 'male', '2023-10-19', '2', '2023-01-26', 'Y'),
(22, 'Ranajay ', '888', '2147483647', '', '0', '', 'male', '2023-10-11', '1', '2019-11-21', 'Y'),
(23, 'Ranit', '43562', '2147483647', '', '0', '', 'male', '2023-10-27', '1', '2017-11-15', 'Y'),
(24, 'Souhardya', '209832', '2147483647', '', '0', '', 'female', '2023-10-11', '2', '2023-10-06', 'Y'),
(25, 'Ritwick', '90909', '2147483647', '', '0', '', 'male', '2023-10-24', '1', '2023-04-06', 'Y'),
(26, 'Raman', '91082', '2147483647', '', '0', '', 'male', '2023-10-26', '1', '2023-09-20', 'Y'),
(27, 'Iman', '3425', '2147483647', '', '0', '', 'male', '2023-10-28', '1', '2021-02-28', 'Y'),
(28, 'Kushal ghosh', '112233', '2147483647', '', '2147483647', 'test.test@yopmail.com', 'male', '2023-10-03', '2', '2017-03-21', 'Y'),
(29, 'Raju', '121', '2147483647', '', '0', '', 'male', '2023-10-28', '2', '2023-10-06', 'N'),
(30, 'Rohit ', '938349484', '2147483647', '', '0', '', 'male', '2023-11-02', '1', '2023-11-04', 'Y'),
(31, 'Kritika', 'SCH24', '9807654123', '', '', '', 'male', '2023-11-04', '1', '2023-11-04', 'Y'),
(32, 'Arnab', 'SCH25', '8909876589', '', '', '', 'male', '2023-11-04', '1', '2023-11-04', 'Y'),
(48, 'Raman Rajwat', 'STUD21', '7980340947', 'dumdum', '5676709807', '', 'male', '2023-11-05', '3rd-Year', '2023-10-31', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`Student_id`),
  ADD UNIQUE KEY `Student_reg_no` (`Student_reg_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
