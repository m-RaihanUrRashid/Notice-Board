-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 07:54 PM
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
-- Database: `notice-board`
--
CREATE DATABASE IF NOT EXISTS `notice-board` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `notice-board`;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement` (
  `annID` int(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `classID` int(10) NOT NULL,
  `createdBy` int(10) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
CREATE TABLE `assignment` (
  `assID` int(20) NOT NULL,
  `classID` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `deadline` datetime NOT NULL,
  `createdAt` datetime NOT NULL,
  `isGraded` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assID`, `classID`, `title`, `description`, `deadline`, `createdAt`, `isGraded`) VALUES
(1, 3, 'MS1', 'Do CRA REPORT and die', '2024-04-30 21:52:12', '2024-04-23 17:52:12', 0),
(2, 3, 'MS2', 'Do Class Diagram', '2024-05-09 21:52:47', '2024-04-23 17:52:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

DROP TABLE IF EXISTS `classroom`;
CREATE TABLE `classroom` (
  `classID` int(10) NOT NULL,
  `className` varchar(100) NOT NULL,
  `teacherID` int(10) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `SODid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`classID`, `className`, `teacherID`, `semester`, `isActive`, `SODid`) VALUES
(2, 'Discrete Mathematics', 3, 'Summer', 1, 2),
(3, 'Object Oriented Programming', 3, 'Summer', 1, 7),
(9, 'Finite Automata', 6, 'Summer ', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `depthead`
--

DROP TABLE IF EXISTS `depthead`;
CREATE TABLE `depthead` (
  `dept` varchar(50) NOT NULL,
  `teacherID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

DROP TABLE IF EXISTS `enroll`;
CREATE TABLE `enroll` (
  `id` int(10) NOT NULL,
  `studentID` int(10) NOT NULL,
  `classID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`id`, `studentID`, `classID`) VALUES
(3, 2, 2),
(4, 2, 3),
(5, 4, 2),
(6, 4, 3),
(7, 7, 2),
(8, 7, 3),
(9, 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

DROP TABLE IF EXISTS `query`;
CREATE TABLE `query` (
  `qID` int(20) NOT NULL,
  `classID` int(20) NOT NULL,
  `studentID` int(10) NOT NULL,
  `createdAt` datetime NOT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`qID`, `classID`, `studentID`, `createdAt`, `question`, `answer`) VALUES
(2, 3, 7, '2024-04-23 18:25:26', 'hlo vya hlp pls', NULL),
(3, 3, 7, '2024-04-23 18:50:48', 'I SAID HLP PLS VYA', 'Sorry I was busy, what is your question I can\'t help without knowing.');

-- --------------------------------------------------------

--
-- Table structure for table `sod`
--

DROP TABLE IF EXISTS `sod`;
CREATE TABLE `sod` (
  `SODid` int(10) NOT NULL,
  `classID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sodapplication`
--

DROP TABLE IF EXISTS `sodapplication`;
CREATE TABLE `sodapplication` (
  `SODid` int(10) NOT NULL,
  `classID` int(10) NOT NULL,
  `details` text NOT NULL,
  `type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `studentID` int(10) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `minor` varchar(30) NOT NULL,
  `enrollDate` date NOT NULL,
  `isSOD` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `dept`, `minor`, `enrollDate`, `isSOD`) VALUES
(2, 'dsadas', 'sadasd', '2024-04-11', 2),
(3, 'cse', 'mis', '2024-04-24', 0),
(4, 'cse', 'mis', '2024-04-09', 0),
(5, 'cse', 'cmn', '2024-04-25', 0),
(7, 'CSE', 'CMN', '2024-04-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

DROP TABLE IF EXISTS `submission`;
CREATE TABLE `submission` (
  `subID` int(20) NOT NULL,
  `assID` int(20) NOT NULL,
  `studentID` int(10) NOT NULL,
  `filelink` varchar(300) NOT NULL,
  `subDate` datetime NOT NULL,
  `grade` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `teacherID` int(10) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `officeNo` varchar(10) NOT NULL,
  `isHead` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherID`, `dept`, `officeNo`, `isHead`) VALUES
(3, 'fgsdfg', 'sfgd', 1),
(6, 'cse', '56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `password`, `email`, `phone`, `role`) VALUES
(1, 'admin', '$2y$10$SuVxt/0Kkvnj.ZGRpSQjr./wPyqa/cS2zuRXHjZPShv2MsXl4rbUm', 'sldjl@gmail.com', '0171012309', 'Admin'),
(2, 'fgdsgsdf', 'adsfsdf', 'asdfsdf', 'asdfdf', 'Student'),
(3, 'sdasdf', 'dsfsadf', 'asdfsadf', 'adsfsadf', 'asdfsdf'),
(4, 'Raihan', '$2y$10$znQyUdPU5toYVX.nlefiqe9fbZC8jfPE5iva8fnmSJPyCjyiCZB8a', 'raihan@gmail.com', '01714489525', 'Student'),
(5, 'Gaji', '$2y$10$YljZ.mRiwEIE2Myunm5OK.OTjsdFHXST3TgoZYzZiLTqh/89R1R9C', 'gazi@tank.com', '323232341', 'Student'),
(6, 'Dhara', '$2y$10$oN1IyjY0FQaqmgAGzOy87.doodHM6Z3bB3Ytin6svI7KtgZ7IdEIe', '', '01714489525', 'Teacher'),
(7, 'Ikram', '$2y$10$wWr4mXbS3y8eUg5cFCHURO5CDSgS1NZ4SFZMMu.YecxEPuHcVa7pm', 'ikram@abc.com', '012345678911', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`annID`),
  ADD KEY `fk_ann1` (`createdBy`),
  ADD KEY `fk_ann2` (`classID`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assID`),
  ADD KEY `fk_ass1` (`classID`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `fk_cls1` (`teacherID`),
  ADD KEY `fk_cls2` (`SODid`);

--
-- Indexes for table `depthead`
--
ALTER TABLE `depthead`
  ADD PRIMARY KEY (`dept`,`teacherID`),
  ADD KEY `fk_dpt` (`teacherID`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classID` (`classID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`qID`),
  ADD KEY `fk_q1` (`classID`),
  ADD KEY `fk_q2` (`studentID`);

--
-- Indexes for table `sod`
--
ALTER TABLE `sod`
  ADD PRIMARY KEY (`SODid`,`classID`),
  ADD KEY `fk_sod1` (`classID`);

--
-- Indexes for table `sodapplication`
--
ALTER TABLE `sodapplication`
  ADD PRIMARY KEY (`SODid`,`classID`),
  ADD KEY `fk_sodApp2` (`classID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`subID`),
  ADD KEY `fk_sub1` (`assID`),
  ADD KEY `fk_sub2` (`studentID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `annID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `classID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `qID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `subID` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `fk_ann1` FOREIGN KEY (`createdBy`) REFERENCES `teacher` (`teacherID`),
  ADD CONSTRAINT `fk_ann2` FOREIGN KEY (`classID`) REFERENCES `classroom` (`classID`);

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `fk_ass1` FOREIGN KEY (`classID`) REFERENCES `classroom` (`classID`);

--
-- Constraints for table `classroom`
--
ALTER TABLE `classroom`
  ADD CONSTRAINT `fk_cls1` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacherID`),
  ADD CONSTRAINT `fk_cls2` FOREIGN KEY (`SODid`) REFERENCES `student` (`studentID`);

--
-- Constraints for table `depthead`
--
ALTER TABLE `depthead`
  ADD CONSTRAINT `fk_dpt` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacherID`);

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `classroom` (`classID`),
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);

--
-- Constraints for table `query`
--
ALTER TABLE `query`
  ADD CONSTRAINT `fk_q1` FOREIGN KEY (`classID`) REFERENCES `classroom` (`classID`),
  ADD CONSTRAINT `fk_q2` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);

--
-- Constraints for table `sod`
--
ALTER TABLE `sod`
  ADD CONSTRAINT `fk_sod1` FOREIGN KEY (`classID`) REFERENCES `classroom` (`classID`),
  ADD CONSTRAINT `fk_sod2` FOREIGN KEY (`SODid`) REFERENCES `student` (`studentID`);

--
-- Constraints for table `sodapplication`
--
ALTER TABLE `sodapplication`
  ADD CONSTRAINT `fk_sodApp1` FOREIGN KEY (`SODid`) REFERENCES `student` (`studentID`),
  ADD CONSTRAINT `fk_sodApp2` FOREIGN KEY (`classID`) REFERENCES `classroom` (`classID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk1_st` FOREIGN KEY (`studentID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `fk_sub1` FOREIGN KEY (`assID`) REFERENCES `assignment` (`assID`),
  ADD CONSTRAINT `fk_sub2` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`teacherID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
