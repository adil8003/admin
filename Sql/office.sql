-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2016 at 11:02 AM
-- Server version: 5.5.43
-- PHP Version: 5.4.41

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `office`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE IF NOT EXISTS `attendence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `attn_date` date NOT NULL,
  `in_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `out_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `leavetype_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `leavetype_id` (`leavetype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id`, `user_id`, `attn_date`, `in_time`, `out_time`, `leavetype_id`) VALUES
(1, 1, '2015-12-01', '2015-12-01 06:00:00', '2015-12-01 12:00:00', 1),
(2, 1, '2015-12-02', '2015-12-02 06:00:00', '2015-12-02 12:00:00', 1),
(4, 2, '2015-12-01', '2015-12-01 06:00:00', '2015-12-01 15:00:00', 1),
(5, 1, '2015-12-04', '2015-12-04 07:09:00', '2015-12-04 15:59:00', 1),
(6, 1, '2015-12-05', '2015-12-05 07:01:00', '2015-12-05 15:44:00', 1),
(7, 1, '2015-12-06', '2015-12-06 06:01:00', '2015-12-06 15:44:00', 1),
(8, 1, '2015-12-07', '2015-12-07 07:31:00', '2015-12-07 15:44:00', 1),
(9, 1, '2015-12-09', '2015-12-09 06:12:00', '2015-12-09 15:44:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE IF NOT EXISTS `leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(700) NOT NULL,
  `description` text NOT NULL,
  `leavetypeid` int(11) NOT NULL,
  `days` float(2,1) NOT NULL,
  `todate` date NOT NULL,
  `fromdate` date NOT NULL,
  `appliedby` int(11) NOT NULL,
  `approvedby` int(11) NOT NULL,
  `comment` text,
  `status` varchar(100) NOT NULL,
  `applieddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `appliedby` (`appliedby`),
  KEY `approvedby` (`approvedby`),
  KEY `leavetypeid` (`leavetypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leavetype`
--

CREATE TABLE IF NOT EXISTS `leavetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(700) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `leavetype`
--

INSERT INTO `leavetype` (`id`, `name`) VALUES
(1, 'Working'),
(2, 'Company Leave'),
(3, 'Employee Leave'),
(4, 'Paid Leave'),
(5, 'Holiday');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `mode` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `mode`) VALUES
(1, 'Admin', '1'),
(2, 'HR', '1'),
(3, 'Employee', '1');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Inactive'),
(2, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(700) NOT NULL,
  `description` text NOT NULL,
  `tasktypeid` int(2) NOT NULL,
  `taskpriorityid` int(2) NOT NULL,
  `createdby` int(11) NOT NULL,
  `assignedto` int(11) NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `taskstatusid` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assignedto` (`assignedto`),
  KEY `createdby` (`createdby`),
  KEY `tasktypeid` (`tasktypeid`),
  KEY `taskpriorityid` (`taskpriorityid`),
  KEY `taskstatusid` (`taskstatusid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `tasktypeid`, `taskpriorityid`, `createdby`, `assignedto`, `createddate`, `taskstatusid`) VALUES
(1, 'tile asd sad asd  as', 'asd asd asd as das d sadasd', 1, 1, 1, 1, '2015-11-08 11:07:45', 1),
(2, 'tile asd sad asd  as', 'asd asd asd as das d sadasd', 1, 1, 1, 1, '2015-11-08 11:07:55', 1),
(3, 'new title', 'new descnas as asd ', 1, 1, 1, 1, '2015-11-08 11:24:21', 1),
(4, 'new title again', 'asdasd sd', 1, 1, 1, 1, '2015-11-08 11:26:53', 1),
(5, 'one more title', 'one more descrotlm sad ', 2, 2, 1, 1, '2015-11-08 11:30:59', 1),
(6, 'one more title', 'one more descrotlm sad ', 3, 3, 4, 1, '2015-11-08 11:31:27', 1),
(7, 'one more sadasd sad', 'one more descrotlm sad ', 3, 3, 4, 1, '2015-11-08 11:31:43', 1),
(8, 'one more sadasd sad klas  eight', 'one more descrotlm sad ', 4, 3, 4, 1, '2015-11-08 11:31:55', 1),
(9, 'one more sadasd sad klas  eight', 'one more descrotlm sad   ds df c cx --!@#%^&*())--', 4, 3, 4, 1, '2015-11-08 11:32:12', 1),
(10, 'one more sadasd sad klas  eight 123', 'one more descrotlm sad   ds df c cx --!@#%^&*())-- <>?:"{}+_+&*', 4, 3, 4, 5, '2015-11-08 11:32:37', 1),
(11, 'one more sadasd sad klas  eight 123 next page', 'one more descrotlm sad   ds df c cx --!@#%^&*())-- <>?:"{}+_+&*', 4, 3, 4, 5, '2015-11-08 11:32:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taskpriority`
--

CREATE TABLE IF NOT EXISTS `taskpriority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(700) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `taskpriority`
--

INSERT INTO `taskpriority` (`id`, `name`) VALUES
(1, 'High'),
(2, 'Medium'),
(3, 'Low'),
(4, 'Ignore');

-- --------------------------------------------------------

--
-- Table structure for table `taskstatus`
--

CREATE TABLE IF NOT EXISTS `taskstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(700) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `taskstatus`
--

INSERT INTO `taskstatus` (`id`, `name`) VALUES
(1, 'Created'),
(2, 'In Progress'),
(3, 'On hold'),
(4, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `tasktype`
--

CREATE TABLE IF NOT EXISTS `tasktype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(700) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tasktype`
--

INSERT INTO `tasktype` (`id`, `name`) VALUES
(1, 'Human Resource'),
(2, 'IT Support (Hardware)'),
(3, 'IT Support (Software)'),
(4, 'Documents Information'),
(5, 'Lead (Customer)'),
(6, 'Feedback (Customer)'),
(7, 'Support (Customer)'),
(8, 'Requirement Survey');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(700) NOT NULL,
  `email` varchar(700) NOT NULL,
  `password` varchar(700) NOT NULL,
  `role_id` int(3) NOT NULL,
  `status_id` int(3) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`),
  KEY `role_id` (`role_id`),
  KEY `role_id_2` (`role_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role_id`, `status_id`, `reg_date`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin', 1, 2, '2015-10-22 05:45:12'),
(2, 'hr', 'hr@hr.com', 'hr', 2, 2, '2015-10-22 05:45:12'),
(3, 'Anant', 'anant@admin.com', 'anant', 1, 1, '2015-10-31 13:29:49'),
(4, 'Anant1', 'anant1@admin.com', 'anant', 1, 1, '2015-10-31 13:31:45'),
(5, 'test', 'test@email.com', '123456', 2, 1, '2015-11-02 17:53:08'),
(6, 'anju', 'anjuchahal1992@gmail.com', 'b#1234567', 1, 1, '2015-11-07 16:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `usereducational`
--

CREATE TABLE IF NOT EXISTS `usereducational` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tenth` text,
  `twelth` text,
  `graduate` text,
  `postgraduate` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userpersonal`
--

CREATE TABLE IF NOT EXISTS `userpersonal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(700) DEFAULT NULL,
  `city` varchar(300) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `userpersonal`
--

INSERT INTO `userpersonal` (`id`, `user_id`, `phone`, `address`, `city`, `state`, `country`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL),
(2, 2, NULL, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendence`
--
ALTER TABLE `attendence`
  ADD CONSTRAINT `attendence_ibfk_2` FOREIGN KEY (`leavetype_id`) REFERENCES `leavetype` (`id`),
  ADD CONSTRAINT `attendence_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `leave`
--
ALTER TABLE `leave`
  ADD CONSTRAINT `leave_ibfk_1` FOREIGN KEY (`appliedby`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `leave_ibfk_2` FOREIGN KEY (`approvedby`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `leave_ibfk_3` FOREIGN KEY (`leavetypeid`) REFERENCES `leavetype` (`id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_7` FOREIGN KEY (`taskstatusid`) REFERENCES `taskstatus` (`id`),
  ADD CONSTRAINT `task_ibfk_3` FOREIGN KEY (`assignedto`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `task_ibfk_4` FOREIGN KEY (`createdby`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `task_ibfk_5` FOREIGN KEY (`tasktypeid`) REFERENCES `tasktype` (`id`),
  ADD CONSTRAINT `task_ibfk_6` FOREIGN KEY (`taskpriorityid`) REFERENCES `taskpriority` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `userpersonal`
--
ALTER TABLE `userpersonal`
  ADD CONSTRAINT `userpersonal_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
