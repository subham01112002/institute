-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 01:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fees_institute`
--

-- --------------------------------------------------------

--
-- Table structure for table `fees_history`
--

CREATE TABLE `fees_history` (
  `fees_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fees_history`
--

INSERT INTO `fees_history` (`fees_id`, `student_id`, `subject_id`, `date`, `month`) VALUES
(1, 30, 18, '2023-11-05', '2023-11'),
(2, 28, 15, '2023-11-03', '2023-11'),
(3, 28, 16, '2023-11-03', '2023-11');

-- --------------------------------------------------------

--
-- Table structure for table `student_activity`
--

CREATE TABLE `student_activity` (
  `Activity_id` int(11) NOT NULL,
  `Student_id` int(50) NOT NULL,
  `Category_id` int(50) NOT NULL,
  `Subject_group_id` int(255) NOT NULL,
  `Subject_id` int(50) NOT NULL,
  `Actual_fees` int(50) NOT NULL,
  `Joining_date` date NOT NULL,
  `Month` varchar(20) NOT NULL,
  `Teacher_id` int(50) NOT NULL,
  `Status` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_activity`
--

INSERT INTO `student_activity` (`Activity_id`, `Student_id`, `Category_id`, `Subject_group_id`, `Subject_id`, `Actual_fees`, `Joining_date`, `Month`, `Teacher_id`, `Status`) VALUES
(1, 0, 1, 0, 0, 0, '0000-00-00', '', 0, 'Y'),
(2, 10, 2, 0, 3, 500, '2023-09-01', '10', 2, 'Y'),
(3, 11, 1, 0, 1, 500, '2023-10-01', '10', 1, 'Y'),
(4, 11, 1, 0, 1, 500, '2023-10-01', '10', 1, 'Y'),
(5, 11, 1, 0, 1, 500, '2023-10-01', '10', 1, 'Y'),
(6, 12, 1, 0, 4, 1000, '2023-09-07', '10', 1, 'Y'),
(7, 10, 1, 0, 1, 4567, '2023-09-08', '09', 2, 'Y'),
(8, 0, 11, 0, 1, 500, '2023-10-10', '10', 1, 'Y'),
(9, 24, 11, 1, 1, 645, '2023-10-25', '10', 1, 'Y'),
(10, 24, 11, 1, 4, 675, '2023-10-03', '10', 7, 'Y'),
(11, 24, 11, 3, 3, 1000, '2023-09-25', '9', 2, 'Y'),
(12, 25, 11, 1, 1, 645, '2023-10-25', '10', 1, 'Y'),
(13, 28, 11, 1, 15, 500, '2023-10-27', '2023-10', 0, 'Y'),
(14, 28, 11, 1, 16, 1000, '2023-10-21', '2023-10', 0, 'Y'),
(15, 30, 11, 1, 18, 500, '2023-12-17', '2023-12', 37, 'Y'),
(16, 30, 11, 6, 19, 400, '2023-11-04', '2023-11', 30, 'Y'),
(17, 31, 11, 1, 20, 405, '2023-11-04', '2023-11', 38, 'Y'),
(18, 36, 11, 1, 18, 400, '2023-11-03', '2023-11', 38, 'Y'),
(19, 47, 11, 1, 18, 400, '2023-11-05', 'November', 37, 'Y'),
(20, 47, 11, 1, 20, 1000, '2023-11-05', 'November', 38, 'Y'),
(21, 48, 11, 1, 18, 500, '2023-11-05', 'November', 37, 'Y');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `subject_category`
--

CREATE TABLE `subject_category` (
  `Category_id` int(11) NOT NULL,
  `Category_name` varchar(500) NOT NULL,
  `Status` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_category`
--

INSERT INTO `subject_category` (`Category_id`, `Category_name`, `Status`) VALUES
(11, 'Academics', 'Y'),
(12, 'Co-curricular Activities', 'Y'),
(15, 'sports', 'Y'),
(16, 'song', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `subject_group`
--

CREATE TABLE `subject_group` (
  `Subject_group_id` int(11) NOT NULL,
  `Subject_group_name` varchar(255) NOT NULL,
  `Category_id` int(11) NOT NULL,
  `Status` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_group`
--

INSERT INTO `subject_group` (`Subject_group_id`, `Subject_group_name`, `Category_id`, `Status`) VALUES
(1, 'Science', 11, 'Y'),
(3, 'Arts', 11, 'Y'),
(6, 'Commerce', 11, 'Y'),
(10, 'Dance', 12, 'Y'),
(11, 'ALL', 11, 'Y'),
(12, 'Song', 12, 'Y'),
(13, 'Law', 11, 'Y');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`Subject_id`, `Subject_name`, `Category_id`, `Subject_group_id`, `Status`) VALUES
(14, 'Hindi', 11, 3, 'N'),
(15, 'Physics', 11, 1, 'Y'),
(16, 'Chemistry', 11, 1, 'Y'),
(17, 'Bengali', 11, 3, 'Y'),
(18, 'Mathematics', 11, 1, 'Y'),
(19, 'Economics', 11, 6, 'N'),
(20, 'Computer', 11, 1, 'N'),
(21, 'History', 11, 3, 'Y'),
(22, 'Political science', 11, 6, 'Y'),
(23, 'Parliament', 11, 13, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Teacher_id` int(11) NOT NULL,
  `Teacher_name` varchar(255) NOT NULL,
  `Teacher_phone` varchar(10) NOT NULL,
  `Teacher_reg_id` varchar(255) NOT NULL,
  `Category_id` int(11) NOT NULL,
  `Status` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Teacher_id`, `Teacher_name`, `Teacher_phone`, `Teacher_reg_id`, `Category_id`, `Status`) VALUES
(9, 'raman', '9999988888', '8', 11, 'Y'),
(10, 'ramesh', '6789054321', '90', 11, 'Y'),
(11, 'rajiv', '7890912312', '7', 11, 'Y'),
(12, 'arup', '9991243543', '909', 11, 'Y'),
(30, 'Samar roy', '6789054321', '234', 11, 'Y'),
(31, 'swapan patra', '9999988888', '78', 11, 'Y'),
(32, 'suman roy', '9870965454', '1234', 11, 'Y'),
(33, 'kushal roy', '6789054321', '984', 11, 'Y'),
(34, 'ritik ghosh', '7890912312', '906', 11, 'Y'),
(35, 'kousik roy', '5423169087', '655', 11, 'Y'),
(36, 'sanjiv ghosh', '8890723231', '84', 11, 'Y'),
(37, 'Amar Roy', '987654321', '1', 11, 'Y'),
(38, 'Kushal Ghosh', '9830342864', '101', 11, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_activity`
--

CREATE TABLE `teacher_activity` (
  `Teacher_activity_id` int(11) NOT NULL,
  `Teacher_id` int(255) NOT NULL,
  `Category_id` int(11) NOT NULL,
  `Subject_group_id` int(11) NOT NULL,
  `Subject_id` int(11) NOT NULL,
  `Status` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_activity`
--

INSERT INTO `teacher_activity` (`Teacher_activity_id`, `Teacher_id`, `Category_id`, `Subject_group_id`, `Subject_id`, `Status`) VALUES
(1, 0, 11, 1, 15, 'Y'),
(3, 20, 11, 3, 14, 'Y'),
(4, 30, 11, 6, 19, 'Y'),
(5, 37, 11, 1, 18, 'Y'),
(6, 37, 11, 3, 17, 'Y'),
(7, 38, 11, 1, 20, 'Y'),
(8, 38, 11, 1, 18, 'Y'),
(9, 39, 11, 1, 20, 'Y'),
(10, 40, 11, 1, 16, 'Y'),
(11, 41, 11, 1, 20, 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fees_history`
--
ALTER TABLE `fees_history`
  ADD PRIMARY KEY (`fees_id`);

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
  ADD PRIMARY KEY (`Teacher_id`),
  ADD UNIQUE KEY `Teacher_reg_id` (`Teacher_reg_id`);

--
-- Indexes for table `teacher_activity`
--
ALTER TABLE `teacher_activity`
  ADD PRIMARY KEY (`Teacher_activity_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fees_history`
--
ALTER TABLE `fees_history`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_activity`
--
ALTER TABLE `student_activity`
  MODIFY `Activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `subject_category`
--
ALTER TABLE `subject_category`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subject_group`
--
ALTER TABLE `subject_group`
  MODIFY `Subject_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subject_master`
--
ALTER TABLE `subject_master`
  MODIFY `Subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `teacher_activity`
--
ALTER TABLE `teacher_activity`
  MODIFY `Teacher_activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
