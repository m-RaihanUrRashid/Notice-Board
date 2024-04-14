-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 12:56 PM
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
-- Table structure for table `query`
--

DROP TABLE IF EXISTS `query`;
CREATE TABLE `query` (
  `qID` int(20) NOT NULL,
  `SODid` int(10) NOT NULL,
  `studentID` int(10) NOT NULL,
  `createdAt` datetime NOT NULL,
  `details` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`annID`),
  ADD KEY `fk_ann1` (`createdBy`);

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
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`qID`),
  ADD KEY `fk_q1` (`SODid`),
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
  MODIFY `assID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `classID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `qID` int(20) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `fk_ann1` FOREIGN KEY (`createdBy`) REFERENCES `teacher` (`teacherID`);

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
-- Constraints for table `query`
--
ALTER TABLE `query`
  ADD CONSTRAINT `fk_q1` FOREIGN KEY (`SODid`) REFERENCES `student` (`studentID`),
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
