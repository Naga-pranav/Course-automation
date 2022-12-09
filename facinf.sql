-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 04:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facinf`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Code` varchar(255) NOT NULL,
  `name` char(255) NOT NULL,
  `lecthrs` int(1) NOT NULL,
  `tuthrs` int(1) NOT NULL,
  `prachrs` int(1) NOT NULL,
  `jhrs` int(1) NOT NULL,
  `credits` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Code`, `name`, `lecthrs`, `tuthrs`, `prachrs`, `jhrs`, `credits`) VALUES
('', 'Basics OF electrical engineering', 0, 0, 0, 2, 4),
('BCSE103E', 'Computer Programming Java', 1, 0, 4, 0, 3),
('BCSE202L', 'Data Structures and Algorithms', 3, 0, 2, 0, 4),
('BCSE205L', 'Computer Architecture and Organization', 3, 0, 0, 0, 3),
('BEEE2345', 'asdbsf', 0, 0, 0, 2, 4),
('CSE1016', 'Deep Learning: Principles and Practices', 2, 0, 2, 0, 3),
('CSE2012', 'Design and analysis of algorithms', 3, 0, 2, 0, 4),
('CSE3061', 'Artificial Intelligence for Cyber Security', 3, 0, 0, 4, 4),
('CSE3501', 'Information Security Analysis and Audit', 2, 0, 2, 4, 4),
('CSE4056', 'Intelligent Multi Agent and Expert systems', 2, 0, 0, 4, 3),
('czxc', 'cccsa', 3, 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `course_nr`
--

CREATE TABLE `course_nr` (
  `Code` varchar(15) NOT NULL,
  `Total_pref` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_nr`
--

INSERT INTO `course_nr` (`Code`, `Total_pref`) VALUES
('BCSE202L', 4),
('BCSE205L', 3),
('CSE1007', 2),
('CSE1016', 4),
('CSE2012', 1),
('CSE3061', 2),
('CSE3501', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fac`
--

CREATE TABLE `fac` (
  `EmpID` int(5) NOT NULL,
  `pass` char(10) NOT NULL,
  `user` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fac`
--

INSERT INTO `fac` (`EmpID`, `pass`, `user`) VALUES
(10001, 'ghkek', 'faculty'),
(25000, 'ssddff', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_info`
--

CREATE TABLE `faculty_info` (
  `Slno` int(2) NOT NULL,
  `EmpID` int(5) NOT NULL,
  `Name` char(255) NOT NULL,
  `Designation` char(255) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `School` char(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_info`
--

INSERT INTO `faculty_info` (`Slno`, `EmpID`, `Name`, `Designation`, `phno`, `School`, `Email`) VALUES
(13, 1111, '.sadas.', '.fsas.', '.12412.', '.sdsdf.', '.dsvdss.'),
(1, 10001, 'Faculty1', 'Associate Professor', '9191929293', 'Scope', '10001@vit.ac.in'),
(2, 10002, 'Faculty2', 'Professor', '8123912346', 'Scope', '10002@vit.ac.in'),
(3, 10003, 'Faculty3', 'Assistant Professor', '9191777293', 'Scope', '10003@vit.ac.in'),
(4, 10004, 'Faculty4', 'Assistant Professor', '8673912346', 'Scope', '10004@vit.ac.in'),
(5, 10005, 'Faculty5', 'Associate Professor', '8612312312', 'Scope', '10005@vit.ac.in'),
(6, 10006, 'Faculty6', 'Associate Professor', '8246535669', 'Scope', '10006@vit.ac.in'),
(7, 10007, 'Faculty7', 'Professor', '7956803179', 'Scope', '10007@vit.ac.in'),
(8, 10008, 'Faculty8', 'Assistant Professor', '7667070688', 'Scope', '10008@vit.ac.in'),
(9, 10009, 'Faculty9', 'Associate Professor', '7377338198', 'Scope', '10009@vit.ac.in'),
(10, 10010, 'Faculty10', 'Assistant Professor', '7087605707', 'Scope', '10010@vit.ac.in'),
(11, 10011, '.asfasfasf.', '.asfasfas.', '.35235325.', '.asfasfas.', '.assvs.'),
(12, 10012, '.asfas.', '.gfdsg.', '.sdg.', '.sg.', '.sdg.');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `user_id` int(5) NOT NULL,
  `preference1` varchar(35) NOT NULL,
  `preference2` varchar(35) NOT NULL,
  `preference3` varchar(35) NOT NULL,
  `preference4` varchar(35) NOT NULL,
  `preference5` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`user_id`, `preference1`, `preference2`, `preference3`, `preference4`, `preference5`) VALUES
(3, 'BCSE103E', 'CSE1016', 'CSE4056', 'BCSE202L', 'BCSE205L'),
(10001, '1', '2', '3', '4', '5'),
(10002, '1', '2', '3', '4', '5'),
(10003, '1', '2', '3', '4', '5'),
(10004, '1', '2', '3', '4', '5'),
(10005, '1', '2', '3', '4', '5');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `Code` varchar(255) NOT NULL,
  `Name` char(255) NOT NULL,
  `wishlist` int(3) NOT NULL,
  `batches` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`Code`, `Name`, `wishlist`, `batches`) VALUES
('BCSE103E', 'Computer Programming Java', 1400, 20),
('BCSE202L', 'Data Structures and Algorithms', 1260, 18),
('CSE1016', 'Deep Learning: Principles and Practices', 700, 10),
('CSE2012', 'Design and analysis of algorithms', 8, 0),
('CSE3061', 'Artificial Intelligence for Cyber Security', 700, 10),
('CSE3501', 'Information Security Analysis and Audit', 700, 10),
('CSE4056', 'Intelligent Multi Agent and Expert systems', 420, 6),
('BCSE205L', 'Computer Architecture and Organization', 1680, 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `course_nr`
--
ALTER TABLE `course_nr`
  ADD UNIQUE KEY `unqp` (`Code`);

--
-- Indexes for table `fac`
--
ALTER TABLE `fac`
  ADD PRIMARY KEY (`EmpID`);

--
-- Indexes for table `faculty_info`
--
ALTER TABLE `faculty_info`
  ADD PRIMARY KEY (`EmpID`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
