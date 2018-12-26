-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 10:05 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `answerscript`
--

CREATE TABLE `answerscript` (
  `scriptNo` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `courseId` varchar(10) NOT NULL,
  `subjectId` varchar(20) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `uploadedBy` int(11) NOT NULL,
  `loc` varchar(900) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answerscript`
--

INSERT INTO `answerscript` (`scriptNo`, `studentId`, `courseId`, `subjectId`, `sem`, `year`, `uploadedBy`, `loc`, `status`) VALUES
(1000, 180005, 'MCA', '5', 3, 2018, 9, '1000.pdf', 'allocated'),
(1001, 180006, 'MCA', '2', 5, 2018, 9, '1001.pdf', 'allocated');

-- --------------------------------------------------------

--
-- Table structure for table `answerscriptallocation`
--

CREATE TABLE `answerscriptallocation` (
  `scriptNo` int(11) NOT NULL,
  `facultyId` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answerscriptallocation`
--

INSERT INTO `answerscriptallocation` (`scriptNo`, `facultyId`, `status`) VALUES
(1000, 9, 'allocated');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `collegeId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`collegeId`, `name`, `address`, `email`, `phone`) VALUES
(201805, 'MA College Kothamangalam', 'Kothamangalam', 'mace@mace.ac.in', '996584654'),
(201806, 'Ilahia College of Engineering', 'Puthuppadi', 'ilahia@gmail.com', '1265464984');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseId` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL,
  `no_of_sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseId`, `name`, `duration`, `no_of_sem`) VALUES
('BCA', 'Bachelor of computer applications', 3, 6),
('BCom', 'Bachelor of commerce', 3, 6),
('MBA', 'Master of business administration', 3, 6),
('MCA', 'Master of computer applications', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptId`, `name`) VALUES
(1, 'Computer Applications'),
(2, 'Computer Science'),
(3, 'Electrical'),
(4, 'Mechanical'),
(5, 'Civil'),
(6, 'Business Administration'),
(7, 'Electronics and Communication'),
(8, 'Journalisam'),
(9, 'Master of Computer Applications'),
(10, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `desigId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`desigId`, `name`) VALUES
(1, 'Head of the department'),
(2, 'Professor'),
(3, 'Assistant Professor'),
(4, 'Associate Professor'),
(5, 'Technical Faculty'),
(6, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `regno` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `collegeId` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`regno`, `name`, `address`, `gender`, `phone`, `email`, `collegeId`, `department`, `designation`, `status`) VALUES
(8, 'Arun Kumar', 'Meledath House, Ernakulam', 'Male', '996655185', 'arunkumar@gmail.com', 201806, 'Computer Applications', 'Computer Applications', 'approved'),
(9, 'Amal Mohan', 'Nilayam House, Kollam', 'Male', '8979789498', 'amalmh@gmail.com', 201805, 'Computer Applications', 'Computer Applications', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `email`, `feedback`, `file`) VALUES
(1, 'dfyt', 'dg@gmail.com', 'fdg', 'logger.txt');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `regno` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `regno`, `role`) VALUES
('admin', 'admin', 0, 'admin'),
('amal', '123', 9, 'faculty'),
('arun', '123', 8, 'faculty'),
('eby', '123', 180006, 'student'),
('linu', '123', 180005, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `notification_title` varchar(50) NOT NULL,
  `notification_type` varchar(20) NOT NULL,
  `notification_desc` varchar(200) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `date`, `notification_title`, `notification_type`, `notification_desc`, `regno`, `status`) VALUES
(4, '0000-00-00 00:00:00', 'Student Registered', 'success', 'Student registered with ID: 180003', '0', 'read'),
(5, '0000-00-00 00:00:00', 'Student Registered', 'success', 'Student registered with ID: 180004', '0', 'unread'),
(6, '0000-00-00 00:00:00', 'Script Valuated', 'success', 'Script Valuated with ID: \"987\"', '0', 'unread'),
(7, '0000-00-00 00:00:00', 'Faculty Registered', 'success', 'Faculty registered with ID: 8', '0', 'unread'),
(8, '0000-00-00 00:00:00', 'Faculty Registered', 'success', 'Faculty registered with ID: 9', '0', 'unread'),
(9, '0000-00-00 00:00:00', 'Student Registered', 'success', 'Student registered with ID: 180005', '0', 'unread'),
(10, '0000-00-00 00:00:00', 'Student Registered', 'success', 'Student registered with ID: 180006', '0', 'unread'),
(11, '0000-00-00 00:00:00', 'Script Uploaded', 'success', 'Script Uploaded with ID: \"1000\"', '0', 'unread'),
(12, '0000-00-00 00:00:00', 'Script Uploaded', 'success', 'Script Uploaded with ID: \"1001\"', '0', 'unread'),
(13, '0000-00-00 00:00:00', 'Script Valuated', 'success', 'Script Valuated with ID: \"1000\"', '0', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `scriptNo` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`scriptNo`, `mark`, `status`) VALUES
(1000, 30, 'added');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `regno` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `collegeId` int(11) NOT NULL,
  `courseId` varchar(10) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`regno`, `name`, `address`, `gender`, `collegeId`, `courseId`, `phone`, `email`, `status`) VALUES
(180005, 'Linu Sunny', 'NILL', 'Female', 201806, 'MCA', 'linusunny@gm', '89987894', 'registered'),
(180006, 'Eby', 'NILL', 'Male', 201805, 'MCA', 'eby@gmail.co', '687879874', 'registered');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `courseId` varchar(10) DEFAULT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectId`, `name`, `courseId`, `sem`) VALUES
(1, 'Computer fundamentals', 'BCA', 1),
(2, 'Data Structures', 'BCA', 2),
(3, 'Cloud Computing', 'MCA', 4),
(4, 'Accounting fundamentals', 'MBA', 3),
(5, 'Python programming', 'MCA', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answerscript`
--
ALTER TABLE `answerscript`
  ADD PRIMARY KEY (`scriptNo`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `courseId` (`courseId`),
  ADD KEY `uploadedBy` (`uploadedBy`);

--
-- Indexes for table `answerscriptallocation`
--
ALTER TABLE `answerscriptallocation`
  ADD PRIMARY KEY (`scriptNo`),
  ADD KEY `facultyId` (`facultyId`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`collegeId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptId`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`desigId`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`regno`),
  ADD KEY `collegeId` (`collegeId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `regno` (`regno`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`scriptNo`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`regno`),
  ADD KEY `courseId` (`courseId`),
  ADD KEY `collegeId` (`collegeId`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectId`),
  ADD KEY `courseId` (`courseId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `collegeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201807;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `deptId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `desigId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `regno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `regno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180007;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answerscript`
--
ALTER TABLE `answerscript`
  ADD CONSTRAINT `answerscript_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`regno`) ON DELETE CASCADE,
  ADD CONSTRAINT `answerscript_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`) ON DELETE CASCADE,
  ADD CONSTRAINT `answerscript_ibfk_3` FOREIGN KEY (`uploadedBy`) REFERENCES `faculty` (`regno`) ON DELETE CASCADE;

--
-- Constraints for table `answerscriptallocation`
--
ALTER TABLE `answerscriptallocation`
  ADD CONSTRAINT `answerscriptallocation_ibfk_1` FOREIGN KEY (`facultyId`) REFERENCES `faculty` (`regno`) ON DELETE CASCADE,
  ADD CONSTRAINT `answerscriptallocation_ibfk_2` FOREIGN KEY (`scriptNo`) REFERENCES `answerscript` (`scriptNo`) ON DELETE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`collegeId`) REFERENCES `college` (`collegeId`) ON DELETE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`scriptNo`) REFERENCES `answerscript` (`scriptNo`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`collegeId`) REFERENCES `college` (`collegeId`) ON DELETE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
