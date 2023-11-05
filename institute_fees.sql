-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 04:17 PM
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
-- Table structure for table `student_activity`
--

CREATE TABLE `student_activity` (
  `Activity_id` int(11) NOT NULL,
  `Student_id` int(50) NOT NULL,
  `Student_name` varchar(556) NOT NULL,
  `Category_id` int(50) NOT NULL,
  `Subject_group_id` int(255) NOT NULL,
  `Subject_id` int(50) NOT NULL,
  `Actual_fees` int(50) NOT NULL,
  `Joining_date` date NOT NULL,
  `Month` varchar(20) NOT NULL,
  `Teacher_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_activity`
--

INSERT INTO `student_activity` (`Activity_id`, `Student_id`, `Student_name`, `Category_id`, `Subject_group_id`, `Subject_id`, `Actual_fees`, `Joining_date`, `Month`, `Teacher_id`) VALUES
(1, 0, '', 1, 0, 0, 0, '0000-00-00', '', 0),
(2, 10, '', 2, 0, 3, 500, '2023-09-01', '10', 2),
(3, 11, '', 1, 0, 1, 500, '2023-10-01', '10', 1),
(4, 11, '', 1, 0, 1, 500, '2023-10-01', '10', 1),
(5, 11, '', 1, 0, 1, 500, '2023-10-01', '10', 1),
(6, 12, '', 1, 0, 4, 1000, '2023-09-07', '10', 1),
(7, 10, '', 1, 0, 1, 4567, '2023-09-08', '09', 2),
(8, 0, '', 11, 0, 1, 500, '2023-10-10', '10', 1),
(9, 24, 'Souhardya', 11, 1, 1, 645, '2023-10-25', '10', 1),
(10, 24, 'Souhardya', 11, 1, 4, 675, '2023-10-03', '10', 7),
(11, 24, 'Souhardya', 11, 3, 3, 1000, '2023-09-25', '9', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `Student_id` int(11) NOT NULL,
  `Student_name` varchar(500) NOT NULL,
  `Student_reg_no` varchar(256) NOT NULL,
  `Phone_no` int(10) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `Guardian_phone` int(10) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Joining_date` date NOT NULL,
  `Class` varchar(50) NOT NULL,
  `Date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`Student_id`, `Student_name`, `Student_reg_no`, `Phone_no`, `Address`, `Guardian_phone`, `Email`, `Gender`, `Joining_date`, `Class`, `Date_of_birth`) VALUES
(10, 'subham', '213', 2147483647, '', 0, '', 'male', '2023-09-13', '2', '2002-11-01'),
(11, 'arijit', '43', 2147483647, '', 0, '', 'male', '2023-10-01', '1', '2006-01-06'),
(12, 'rohit', '23', 2147483647, '', 0, '', 'male', '2023-09-07', '2', '2011-10-11'),
(13, 'sattik', '22', 2147483647, '', 0, '', 'male', '2023-08-09', '2', '2013-01-08'),
(14, 'ishan', '908', 2147483647, '', 0, '', 'male', '2023-06-14', '2', '2008-10-15'),
(16, 'subham ', '123321', 2147483647, '', 0, '', 'male', '2023-10-05', '1', '2022-03-12'),
(18, 'Debankur', '108', 2147483647, '', 0, '', 'male', '2023-10-06', '2', '2022-03-12'),
(19, 'Subhman', '098', 2147483647, '', 0, '', 'female', '2023-10-02', '1', '2023-05-25'),
(20, 'Sattik maiti', '1022', 2147483647, '', 0, '', 'male', '2023-10-25', '1', '2023-02-02'),
(21, 'Ajay mahato', '7658', 2147483647, '', 0, '', 'male', '2023-10-19', '2', '2023-01-26'),
(22, 'Ranajay ', '888', 2147483647, '', 0, '', 'male', '2023-10-11', '1', '2019-11-21'),
(23, 'Ranit', '43562', 2147483647, '', 0, '', 'male', '2023-10-27', '1', '2017-11-15'),
(24, 'Souhardya', '209832', 2147483647, '', 0, '', 'female', '2023-10-11', '2', '2023-10-06'),
(25, 'Ritwick', '90909', 2147483647, '', 0, '', 'male', '2023-10-24', '1', '2023-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `subject_category`
--

CREATE TABLE `subject_category` (
  `Category_id` int(11) NOT NULL,
  `Category_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_category`
--

INSERT INTO `subject_category` (`Category_id`, `Category_name`) VALUES
(11, 'Academics'),
(12, 'Co-curricular Activities');

-- --------------------------------------------------------

--
-- Table structure for table `subject_group`
--

CREATE TABLE `subject_group` (
  `Subject_group_id` int(11) NOT NULL,
  `Subject_group_name` varchar(255) NOT NULL,
  `Category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_group`
--

INSERT INTO `subject_group` (`Subject_group_id`, `Subject_group_name`, `Category_id`) VALUES
(1, 'Science', 11),
(3, 'Arts', 11),
(6, 'Commerce', 11),
(10, 'Dance', 12);

-- --------------------------------------------------------

--
-- Table structure for table `subject_master`
--

CREATE TABLE `subject_master` (
  `Subject_id` int(11) NOT NULL,
  `Subject_name` varchar(500) NOT NULL,
  `Category_id` int(11) NOT NULL,
  `Subject_group_id` int(250) NOT NULL,
  `Status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`Subject_id`, `Subject_name`, `Category_id`, `Subject_group_id`, `Status`) VALUES
(1, 'physics', 1, 0, 'Y'),
(3, 'bengali', 2, 0, 'N'),
(4, 'chemistry', 1, 0, 'Y'),
(5, 'Mathematics', 1, 0, 'Y'),
(6, 'English', 2, 0, 'Y'),
(7, 'geography', 2, 0, 'Y'),
(8, 'history', 2, 0, 'Y'),
(9, 'economics', 7, 0, 'Y'),
(10, 'English', 2, 0, 'Y'),
(11, 'bengali', 2, 0, 'Y'),
(12, 'Computer', 1, 0, 'Y'),
(14, 'Hindi', 11, 3, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Teacher_id` int(11) NOT NULL,
  `Teacher_subject` varchar(255) NOT NULL,
  `Teacher_name` varchar(255) NOT NULL,
  `Teacher_phone` varchar(10) NOT NULL,
  `Teacher_reg_id` int(11) NOT NULL,
  `Category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Teacher_id`, `Teacher_subject`, `Teacher_name`, `Teacher_phone`, `Teacher_reg_id`, `Category_id`) VALUES
(1, 'physics', 'samar', '9999999999', 12, 1),
(2, 'bengali', 'Anup', '9999988888', 23, 1),
(3, 'physics', 'arup', '987654321', 34, 1),
(4, 'physics', 'arup', '987654321', 34, 1),
(5, 'bengali', 'raju', '7890912312', 12, 2),
(6, 'physics', 'rajiv', '6789054321', 35, 1),
(7, 'chemistry', 'manas', '9870965454', 18, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_activity`
--
ALTER TABLE `student_activity`
  ADD PRIMARY KEY (`Activity_id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`Student_id`),
  ADD UNIQUE KEY `Student_reg_no` (`Student_reg_no`);

--
-- Indexes for table `subject_category`
--
ALTER TABLE `subject_category`
  ADD PRIMARY KEY (`Category_id`),
  ADD UNIQUE KEY `Category_name` (`Category_name`);

--
-- Indexes for table `subject_group`
--
ALTER TABLE `subject_group`
  ADD PRIMARY KEY (`Subject_group_id`),
  ADD UNIQUE KEY `Subject_group_name` (`Subject_group_name`);

--
-- Indexes for table `subject_master`
--
ALTER TABLE `subject_master`
  ADD PRIMARY KEY (`Subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_activity`
--
ALTER TABLE `student_activity`
  MODIFY `Activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subject_category`
--
ALTER TABLE `subject_category`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subject_group`
--
ALTER TABLE `subject_group`
  MODIFY `Subject_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subject_master`
--
ALTER TABLE `subject_master`
  MODIFY `Subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
