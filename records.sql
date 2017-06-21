-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2017 at 01:09 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `records`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `course_code` varchar(11) NOT NULL,
  `units` int(1) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `course_code`, `units`, `description`) VALUES
(1, 'Database', 'COSC413', 0, 'how to design eloquent databases '),
(2, 'Artificial Intelligence', 'COSC423', 3, 'somewhat robotics');

-- --------------------------------------------------------

--
-- Table structure for table `c_a`
--

CREATE TABLE `c_a` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `quiz1` tinyint(1) NOT NULL,
  `q1_size` int(2) NOT NULL,
  `quiz2` tinyint(1) NOT NULL,
  `q2_size` int(2) NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  `at_size` int(2) NOT NULL,
  `assignment1` tinyint(1) NOT NULL,
  `a1_size` int(2) NOT NULL,
  `project1` tinyint(1) NOT NULL,
  `p1_size` int(2) NOT NULL,
  `mid_sem` tinyint(1) NOT NULL,
  `mi_size` int(2) NOT NULL,
  `exam` tinyint(1) NOT NULL,
  `ex_size` int(2) NOT NULL,
  `assignment2` tinyint(1) NOT NULL,
  `a2_size` int(2) NOT NULL,
  `project2` tinyint(1) NOT NULL,
  `p2_size` int(2) NOT NULL,
  `total` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_a`
--

INSERT INTO `c_a` (`id`, `course_id`, `quiz1`, `q1_size`, `quiz2`, `q2_size`, `attendance`, `at_size`, `assignment1`, `a1_size`, `project1`, `p1_size`, `mid_sem`, `mi_size`, `exam`, `ex_size`, `assignment2`, `a2_size`, `project2`, `p2_size`, `total`) VALUES
(1, 1, 0, 0, 1, 10, 1, 5, 1, 5, 0, 0, 1, 16, 1, 50, 0, 0, 1, 14, 100),
(2, 2, 1, 5, 1, 5, 1, 5, 1, 3, 1, 5, 1, 15, 1, 50, 1, 2, 1, 5, 95);

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `title` varchar(7) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `first_name`, `last_name`, `username`, `gender`, `title`, `phone`, `password`) VALUES
(1, 'shade', 'shade', 'shade', 'F', 'Dr.', '08122636778', 'a79dc75a13b584baa37f8ec20d944410');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_courses`
--

CREATE TABLE `lecturer_courses` (
  `id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer_courses`
--

INSERT INTO `lecturer_courses` (`id`, `lecturer_id`, `course_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `attendance` int(1) NOT NULL,
  `quiz1` int(2) NOT NULL,
  `quiz2` int(2) NOT NULL,
  `assignment1` int(2) NOT NULL,
  `mid_sem` int(2) NOT NULL,
  `project1` int(2) NOT NULL,
  `exam` int(2) NOT NULL,
  `total` int(3) NOT NULL,
  `assignment2` int(2) NOT NULL,
  `project2` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `student_id`, `course_id`, `attendance`, `quiz1`, `quiz2`, `assignment1`, `mid_sem`, `project1`, `exam`, `total`, `assignment2`, `project2`) VALUES
(1, 1, 1, 5, 1, 5, 4, 13, 10, 42, 94, 0, 14),
(2, 2, 1, 4, 2, 5, 5, 7, 10, 50, 93, 0, 10),
(7, 2, 2, 0, 3, 3, 2, 13, 4, 45, 76, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `matric_no` varchar(8) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `gender`, `matric_no`, `password`) VALUES
(1, 'Oghenevwede', 'Odia', 'M', '13/0622', 'f170470064ee6beabfb6e4a419e77bdc'),
(2, 'bolu', 'bolu', 'F', '12/9763', '3573b51824147102d20b6e61ea29a89d');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`id`, `student_id`, `course_id`) VALUES
(1, 1, 1),
(2, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_a`
--
ALTER TABLE `c_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer_courses`
--
ALTER TABLE `lecturer_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `c_a`
--
ALTER TABLE `c_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lecturer_courses`
--
ALTER TABLE `lecturer_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
