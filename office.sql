-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2017 at 08:27 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attn_date` date NOT NULL,
  `in_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `out_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `leavetype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `body` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blogimage` varchar(700) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blogimages`
--

CREATE TABLE `blogimages` (
  `id` int(11) NOT NULL,
  `blogid` int(11) NOT NULL,
  `type` varchar(300) NOT NULL,
  `path` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `builder`
--

CREATE TABLE `builder` (
  `id` int(11) NOT NULL,
  `name` varchar(700) NOT NULL,
  `companyname` varchar(700) DEFAULT NULL,
  `contact` varchar(700) DEFAULT NULL,
  `email` varchar(700) DEFAULT NULL,
  `website` varchar(700) DEFAULT NULL,
  `addedby` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `officecontact` varchar(700) DEFAULT NULL,
  `logopath` varchar(700) DEFAULT NULL,
  `picpath` varchar(700) DEFAULT NULL,
  `description` text,
  `addeddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `builder`
--

INSERT INTO `builder` (`id`, `name`, `companyname`, `contact`, `email`, `website`, `addedby`, `status`, `officecontact`, `logopath`, `picpath`, `description`, `addeddate`) VALUES
(1, 'Guardian ', 'Guardian Developers', '9860284117', '', '', 1, 'Active', '', NULL, NULL, '', '2017-01-02 07:40:55'),
(2, 'Utsav Homes', 'Utsav Developers', '9860284117', '', '', 1, 'Active', '', NULL, NULL, '', '2017-01-02 23:34:29'),
(3, 'Puranik''s', 'Puranik Builders', ' (+91 20) 2566 6188 / 99', '', '', 1, 'Active', '', NULL, NULL, '', '2017-01-02 23:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `commercialprojtype`
--

CREATE TABLE `commercialprojtype` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commercialprojtype`
--

INSERT INTO `commercialprojtype` (`id`, `name`) VALUES
(1, 'New'),
(2, 'ReSell');

-- --------------------------------------------------------

--
-- Table structure for table `compreferred`
--

CREATE TABLE `compreferred` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compreferred`
--

INSERT INTO `compreferred` (`id`, `name`) VALUES
(1, 'IT'),
(2, 'Banking'),
(3, 'Call Center');

-- --------------------------------------------------------

--
-- Table structure for table `comproject`
--

CREATE TABLE `comproject` (
  `id` int(11) NOT NULL,
  `name` varchar(700) NOT NULL,
  `location` varchar(700) NOT NULL,
  `city` varchar(700) NOT NULL,
  `state` varchar(700) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `latlong` varchar(700) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comprojectgeolocationid` int(11) DEFAULT NULL,
  `comprojectamanetiesid` int(11) DEFAULT NULL,
  `builderid` int(11) DEFAULT NULL,
  `comprojectprojectid` int(11) DEFAULT NULL,
  `comprojectofficeid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comprojectamaneties`
--

CREATE TABLE `comprojectamaneties` (
  `id` int(11) NOT NULL,
  `lift` text,
  `parking` text,
  `restroom` text,
  `furnishing` text,
  `preferred` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comprojectfeedback`
--

CREATE TABLE `comprojectfeedback` (
  `id` int(11) NOT NULL,
  `comprojectid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(700) NOT NULL,
  `email` varchar(700) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comprojectfurnishing`
--

CREATE TABLE `comprojectfurnishing` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comprojectfurnishing`
--

INSERT INTO `comprojectfurnishing` (`id`, `name`) VALUES
(1, 'Fully Furnished'),
(2, 'Semi Furnished'),
(3, 'Non Furnished');

-- --------------------------------------------------------

--
-- Table structure for table `comprojectgeolocation`
--

CREATE TABLE `comprojectgeolocation` (
  `id` int(11) NOT NULL,
  `railwaystation` text,
  `airport` text,
  `hospital` text,
  `multiplex` text,
  `school` text,
  `college` text,
  `market` text,
  `temple` text,
  `famousplace` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comprojectimage`
--

CREATE TABLE `comprojectimage` (
  `id` int(11) NOT NULL,
  `comprojectid` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `path` varchar(700) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `addeddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comprojectmicrositedetails`
--

CREATE TABLE `comprojectmicrositedetails` (
  `id` int(11) NOT NULL,
  `comprojectid` int(11) NOT NULL,
  `featuresheading1` varchar(255) NOT NULL,
  `heading1details` text NOT NULL,
  `featuresheading2` varchar(255) NOT NULL,
  `heading2details` text NOT NULL,
  `featuresheading3` varchar(255) NOT NULL,
  `heading3details` text NOT NULL,
  `featuresheading4` varchar(255) NOT NULL,
  `heading4details` text NOT NULL,
  `aboutuscontent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comprojectoffice`
--

CREATE TABLE `comprojectoffice` (
  `id` int(11) NOT NULL,
  `yearofconstruct` text,
  `yearofposition` text,
  `age` text,
  `furnishingid` int(11) DEFAULT '1',
  `preferredid` int(11) DEFAULT '1',
  `totalfloor` text,
  `floorno` text,
  `commercialprojtypeid` int(11) DEFAULT '1',
  `officetotalsqfeet` text,
  `costpersqfeet` text,
  `othercharges` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comprojectowner`
--

CREATE TABLE `comprojectowner` (
  `id` int(11) NOT NULL,
  `comprojectid` int(11) NOT NULL,
  `builderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comprojectpreferred`
--

CREATE TABLE `comprojectpreferred` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comprojectpreferred`
--

INSERT INTO `comprojectpreferred` (`id`, `name`) VALUES
(1, 'IT'),
(2, 'Banking'),
(3, 'Call Center');

-- --------------------------------------------------------

--
-- Table structure for table `comprojectproject`
--

CREATE TABLE `comprojectproject` (
  `id` int(11) NOT NULL,
  `yearofconstruct` text,
  `yearofposition` text,
  `age` text,
  `totalfloor` text,
  `floorno` text,
  `commercialprojtypeid` int(11) NOT NULL DEFAULT '1',
  `totalsqfeet` text,
  `costpersqfeet` text,
  `othercharges` text,
  `comments` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comproperty`
--

CREATE TABLE `comproperty` (
  `id` int(11) NOT NULL,
  `name` varchar(700) NOT NULL,
  `location` varchar(700) NOT NULL,
  `city` varchar(700) NOT NULL,
  `state` varchar(700) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `latlong` varchar(700) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comprojectid` int(11) DEFAULT NULL,
  `builderid` int(11) DEFAULT NULL,
  `comofficeid` int(11) DEFAULT NULL,
  `comamaneties` int(11) DEFAULT NULL,
  `comgeolocation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(700) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(700) NOT NULL,
  `phone` varchar(700) DEFAULT NULL,
  `email` varchar(700) DEFAULT NULL,
  `location` varchar(700) DEFAULT NULL,
  `city` varchar(700) DEFAULT NULL,
  `pincode` varchar(700) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `addedby` varchar(100) NOT NULL,
  `addeddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text,
  `picpath` varchar(700) DEFAULT NULL,
  `contacted_by` varchar(500) NOT NULL,
  `message_date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `email`, `location`, `city`, `pincode`, `status`, `addedby`, `addeddate`, `description`, `picpath`, `contacted_by`, `message_date`) VALUES
(1, 'Rahul Gaikwad ', '09007973858', 'coolrahul.572@gmail.com', 'Sinhagad Road', 'Pune', '', 'Inactive', 'CSV', '2017-01-04 01:17:27', '3 BHK Multistorey Apartment For Sale in Sinhagad Road, Pune, Maharashtra', NULL, 'Individual', 'Jan 2, 2017 11:31:17 AM'),
(2, 'Ricky patil', '09007973858', 'coolrahul.572@gmail.com', 'Sinhagad Road', 'Thane', NULL, 'Active', 'CSV', '2017-01-04 01:17:27', '3 BHK Multistorey Apartment For Sale in Sinhagad Road, Pune, Maharashtra', NULL, 'Individual', 'Jan 2, 2017 11:31:17 AM');

-- --------------------------------------------------------

--
-- Table structure for table `financial`
--

CREATE TABLE `financial` (
  `id` int(11) NOT NULL,
  `module` varchar(100) NOT NULL,
  `page` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `status` varchar(100) NOT NULL,
  `updateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `financialbigcontent`
--

CREATE TABLE `financialbigcontent` (
  `id` int(11) NOT NULL,
  `module` varchar(100) NOT NULL,
  `page` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `status` varchar(100) NOT NULL,
  `updateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `front`
--

CREATE TABLE `front` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` varchar(500) NOT NULL,
  `bedroom` varchar(500) NOT NULL,
  `bathroom` varchar(500) NOT NULL,
  `parking` varchar(500) NOT NULL,
  `area` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `generalfeedback`
--

CREATE TABLE `generalfeedback` (
  `id` int(11) NOT NULL,
  `name` varchar(700) NOT NULL,
  `email` varchar(700) NOT NULL,
  `phone` varchar(700) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generalfeedback`
--

INSERT INTO `generalfeedback` (`id`, `name`, `email`, `phone`, `description`, `status`) VALUES
(1, 'abhishek', 'abhishekk@uniquepaf.com', '9545108362', 'test1', 'Active'),
(2, 'abhishek', 'abhishekk@uniquepaf.com', '9545108362', 'test1', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(11) NOT NULL,
  `title` varchar(700) NOT NULL,
  `description` text NOT NULL,
  `leavetypeid` int(11) NOT NULL,
  `days` float(4,1) NOT NULL,
  `todate` date NOT NULL,
  `fromdate` date NOT NULL,
  `appliedby` int(11) NOT NULL,
  `approvedby` int(11) NOT NULL,
  `comment` text,
  `status` varchar(100) NOT NULL,
  `applieddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leavetype`
--

CREATE TABLE `leavetype` (
  `id` int(11) NOT NULL,
  `name` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `ownershiptype`
--

CREATE TABLE `ownershiptype` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ownershiptype`
--

INSERT INTO `ownershiptype` (`id`, `name`) VALUES
(1, 'Free Hold'),
(2, 'Lease Hold'),
(3, 'Power of Attorney'),
(4, 'Cooperative Society');

-- --------------------------------------------------------

--
-- Table structure for table `resprojctfeedback`
--

CREATE TABLE `resprojctfeedback` (
  `id` int(11) NOT NULL,
  `resprojectid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(700) NOT NULL,
  `email` varchar(700) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resprojctfeedback`
--

INSERT INTO `resprojctfeedback` (`id`, `resprojectid`, `name`, `phone`, `email`, `description`, `status`, `datetime`) VALUES
(1, 2, 'DFGHJ', '1234567890', 'FGVH@GHJK.COM', 'DFGH', 'Active', '2017-01-04 19:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `resprojctfeedbacklog`
--

CREATE TABLE `resprojctfeedbacklog` (
  `id` int(11) NOT NULL,
  `resprojctfeedbackId` int(11) NOT NULL,
  `description` varchar(700) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resproject`
--

CREATE TABLE `resproject` (
  `id` int(11) NOT NULL,
  `name` varchar(700) NOT NULL,
  `location` varchar(700) NOT NULL,
  `city` varchar(700) NOT NULL,
  `state` varchar(700) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `latlong` varchar(700) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resprojectamanetiesid` int(11) DEFAULT NULL,
  `resprojectcostid` int(11) DEFAULT NULL,
  `resprojectgeolocationid` int(11) DEFAULT NULL,
  `builderid` int(11) DEFAULT NULL,
  `resprojectprojectid` int(11) DEFAULT NULL,
  `resprojectpropertyid` int(11) DEFAULT NULL,
  `resprojectmicrositedetailsid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resproject`
--

INSERT INTO `resproject` (`id`, `name`, `location`, `city`, `state`, `pincode`, `status`, `added_by`, `latlong`, `added_date`, `resprojectamanetiesid`, `resprojectcostid`, `resprojectgeolocationid`, `builderid`, `resprojectprojectid`, `resprojectpropertyid`, `resprojectmicrositedetailsid`) VALUES
(1, 'Windshire', 'Sinhagad Road', 'Pune', 'Maharashtra', '', 'Active', 1, '', '2017-01-02 07:39:13', 1, 1, 1, 1, 1, 1, 1),
(2, 'Utsav Homes', 'Bavdhan', 'Pune', 'Maharashtra', '', 'Active', 1, '', '2017-01-02 19:09:07', 2, 2, 2, 1, 2, 2, 2),
(3, 'Abitante', 'Bavdhan', 'Pune', 'Maharashtra', '', 'Active', 1, '', '2017-01-02 23:33:23', 3, 3, 3, 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `resprojectamaneties`
--

CREATE TABLE `resprojectamaneties` (
  `id` int(11) NOT NULL,
  `swimingpool` text,
  `garden` text,
  `gym` text,
  `temple` text,
  `clubhouse` text,
  `solarsystem` text,
  `securitydoor` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resprojectamaneties`
--

INSERT INTO `resprojectamaneties` (`id`, `swimingpool`, `garden`, `gym`, `temple`, `clubhouse`, `solarsystem`, `securitydoor`) VALUES
(1, 'Club house , Open air amphitheatre , Prime location , Well-equipped gymnasium , Senior citizens’ area , Yoga and aerobics area , Clutter Free Layout , Landscape Gardens , Basketball Court', '', '', '', '', '', ''),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resprojectcost`
--

CREATE TABLE `resprojectcost` (
  `id` int(11) NOT NULL,
  `persquarefeet` text,
  `othercharges` text,
  `totalcharges` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resprojectcost`
--

INSERT INTO `resprojectcost` (`id`, `persquarefeet`, `othercharges`, `totalcharges`) VALUES
(1, NULL, NULL, NULL),
(2, NULL, NULL, NULL),
(3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resprojectgeolocation`
--

CREATE TABLE `resprojectgeolocation` (
  `id` int(11) NOT NULL,
  `railwaystation` text,
  `airport` text,
  `hospital` text,
  `multiplex` text,
  `school` text,
  `college` text,
  `market` text,
  `temple` text,
  `famousplace` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resprojectgeolocation`
--

INSERT INTO `resprojectgeolocation` (`id`, `railwaystation`, `airport`, `hospital`, `multiplex`, `school`, `college`, `market`, `temple`, `famousplace`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resprojectimage`
--

CREATE TABLE `resprojectimage` (
  `id` int(11) NOT NULL,
  `resprojectid` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `path` varchar(700) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `addeddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resprojectimage`
--

INSERT INTO `resprojectimage` (`id`, `resprojectid`, `type`, `path`, `status`, `addeddate`) VALUES
(1, 1, 'typeproject', 'resources/resproject/c9fd8b2e70e5eea77de881865e3436cb.jpg', 1, '2017-01-02 07:41:45'),
(2, 1, 'typeproject', 'resources/resproject/89dc5c2c17cb5abe22aeb8af8ddb9534.jpg', 1, '2017-01-02 07:43:38'),
(3, 1, 'typeproject', 'resources/resproject/3ef5cda629abdff1eb689ed57902b28a.jpg', 1, '2017-01-02 07:44:06'),
(4, 1, 'typecost', 'resources/resproject/d305871492e9006fc8152040d1bc2443.jpg', 1, '2017-01-02 18:31:19'),
(5, 1, 'typecost', 'resources/resproject/0a92d31cb4feca654c0106a75be9ea16.jpg', 1, '2017-01-02 18:31:42'),
(6, 1, 'typecost', 'resources/resproject/6a326a50fb9f8980c1c38d5f27676d01.jpg', 1, '2017-01-02 18:32:16'),
(7, 1, 'typecost', 'resources/resproject/f1e17311f5c694f19439287a6a57cb27.jpg', 1, '2017-01-02 18:32:28'),
(8, 1, 'typecost', 'resources/resproject/2a751c6fb318234221eaf9e27130b520.jpg', 1, '2017-01-02 18:32:50'),
(9, 1, 'typecost', 'resources/resproject/ef943616edc82af4165f26b2db407ece.jpg', 1, '2017-01-02 18:33:05'),
(10, 1, 'typecost', 'resources/resproject/7de1b284269c7af35a3f7aacdf357499.jpg', 1, '2017-01-02 18:33:16'),
(11, 1, 'typecost', 'resources/resproject/6ceaf14340b7ad85cb2042b7dabbcd5e.jpg', 1, '2017-01-02 18:33:27'),
(12, 1, 'projecttype', 'resources/resproject/86c7936273e73eef707444e0a5437f99.jpg', 1, '2017-01-02 18:39:31'),
(13, 1, 'projecttype', 'resources/resproject/50b6cbbc0c63212ee6ec7e5685ab35fb.jpg', 1, '2017-01-02 18:39:40'),
(14, 1, 'projecttype', 'resources/resproject/a820430987c75a0e7476d939952ee298.jpg', 1, '2017-01-02 18:39:46'),
(15, 1, 'projecttype', 'resources/resproject/4ca98ab294a4b57b34e3206f46e75682.jpg', 1, '2017-01-02 18:39:53'),
(16, 1, 'typeamaneti', 'resources/resproject/75e4ae190e0c21741831a60fe0e27dcc.jpg', 1, '2017-01-02 18:40:19'),
(17, 1, 'projecttypegeo', 'resources/resproject/8426a77ec5f50b09c452b33d4c0e1068.jpg', 1, '2017-01-02 18:40:32'),
(18, 1, 'projecttypegeo', 'resources/resproject/79d5f677d43688ccd98f4702d60df3da.jpg', 1, '2017-01-02 18:40:40'),
(19, 1, 'projecttypegeo', 'resources/resproject/1be15ee62dbd4059d9aed558661f331f.jpg', 1, '2017-01-02 18:40:48'),
(20, 1, 'about', 'resources/resproject/f1d139817d3eb5c6534c55512bf5d85b.jpg', 1, '2017-01-02 18:41:12'),
(21, 2, 'typeproject', 'resources/resproject/8ddee0352825050401d67b8a39d5c68c.jpg', 1, '2017-01-02 19:10:11'),
(22, 2, 'typeproject', 'resources/resproject/5e379b4615a9a8392d9638805ea0fff5.jpg', 1, '2017-01-02 19:10:58'),
(23, 2, 'typeproject', 'resources/resproject/b0d7e033d0da433adfa2e67835182119.jpg', 1, '2017-01-02 19:11:10'),
(24, 2, 'about', 'resources/resproject/f1f8edef83be8cfa4adc5a83ab3e93ba.jpg', 1, '2017-01-02 19:12:14'),
(25, 2, 'typecost', 'resources/resproject/1d943a75d954dac034193839442524c7.jpg', 1, '2017-01-02 19:23:51'),
(26, 3, 'typeproject', 'resources/resproject/7bf5e1797e72ee2bfbc4c3d1405e1c77.jpg', 1, '2017-01-02 23:37:52'),
(27, 3, 'typeproject', 'resources/resproject/2f5b9b7ec51967bef7cd4df6ba72687e.jpg', 1, '2017-01-02 23:38:01'),
(28, 3, 'typeproject', 'resources/resproject/c5ae49a4994a2af5296242cfe7ca93a6.jpg', 1, '2017-01-02 23:38:13'),
(29, 3, 'projecttype', 'resources/resproject/c795520ff64fcfa2f9803f06d5d2730b.jpg', 1, '2017-01-02 23:39:26'),
(30, 3, 'projecttype', 'resources/resproject/e9af433c250654973e9c9768492b3216.jpg', 1, '2017-01-02 23:39:33'),
(31, 3, 'projecttype', 'resources/resproject/06db7664aa7784533285018a3a7426b4.jpg', 1, '2017-01-02 23:39:38'),
(32, 3, 'projecttype', 'resources/resproject/5c70e57c6d797bed4fe75d251802d0bb.jpg', 1, '2017-01-02 23:39:45'),
(33, 3, 'projecttype', 'resources/resproject/fbf62ee6280dfa7a067c03ab09c63dea.jpg', 1, '2017-01-02 23:40:10'),
(34, 3, 'projecttype', 'resources/resproject/1b50ba3e7bff4369d4fa70d538323e6b.jpg', 1, '2017-01-02 23:40:16'),
(35, 3, 'typeamaneti', 'resources/resproject/ae65954a44ed66ba3f617e4bd2def648.jpg', 1, '2017-01-02 23:40:29'),
(36, 3, 'typeamaneti', 'resources/resproject/f2bbbb91584360b896f212ac6d144959.jpg', 1, '2017-01-02 23:40:36'),
(37, 3, 'typeamaneti', 'resources/resproject/4fb384fbdd7835628e33e66c52746b4a.jpg', 1, '2017-01-02 23:40:42'),
(39, 3, 'typeamaneti', 'resources/resproject/3626a277c76869080661cb3e2685831b.jpg', 1, '2017-01-02 23:40:54'),
(40, 3, 'typeamaneti', 'resources/resproject/651ac0360bd5e04c664df1b2f067cec8.jpg', 1, '2017-01-02 23:44:27'),
(41, 3, 'typeamaneti', 'resources/resproject/5b934d9ff3e7c8ddd7a131600109bd3f.jpg', 1, '2017-01-02 23:44:33'),
(42, 3, 'projecttypegeo', 'resources/resproject/e89ce67a02dbfe87b6cd734e84bac296.jpg', 1, '2017-01-02 23:44:47'),
(43, 3, 'projecttypegeo', 'resources/resproject/aaa2a3b9867962a5ad18dd2888f5de3f.jpg', 1, '2017-01-02 23:44:59'),
(44, 3, 'projecttypegeo', 'resources/resproject/cde8385183d87302c075ccc4a15c4c17.jpg', 1, '2017-01-02 23:45:13'),
(45, 3, 'about', 'resources/resproject/9e976a9f177889965172a6e06b8da116.jpg', 1, '2017-01-02 23:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `resprojectmicrositedetails`
--

CREATE TABLE `resprojectmicrositedetails` (
  `id` int(11) NOT NULL,
  `resprojectid` int(11) NOT NULL,
  `featuresheading1` varchar(255) NOT NULL,
  `heading1details` text NOT NULL,
  `featuresheading2` varchar(255) NOT NULL,
  `heading2details` text NOT NULL,
  `featuresheading3` varchar(255) NOT NULL,
  `heading3details` text NOT NULL,
  `featuresheading4` varchar(255) NOT NULL,
  `heading4details` text NOT NULL,
  `aboutuscontent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resprojectmicrositedetails`
--

INSERT INTO `resprojectmicrositedetails` (`id`, `resprojectid`, `featuresheading1`, `heading1details`, `featuresheading2`, `heading2details`, `featuresheading3`, `heading3details`, `featuresheading4`, `heading4details`, `aboutuscontent`) VALUES
(1, 0, 'Best Location', 'The homes that open up to a view of Sahayadris and Khadakwasla. Further, the landmarks of the city, like Pune-Bengaluru Highway and Karve Nagar are not far away.', 'Best Building Style', 'Inspite of the fact that the project has 972 units, evrey single flat has been designed to be East-West facing. This ensures excellecnt air-flow and natural light', 'Key Distances', 'Lokmat Press - 5 mins. Big Bazar, Sinhagad Road – 15 mins , Warje – 15 mins. Hinjewadi – 25 mins. Sinhagad – 20 mins.', 'About Builder', 'In 1991, Mr. Sabade founded the Guardian Construction and Development, with unwavering determination they grew establishing strong credentials and forayed into residential development rapidly.', 'Wind Shire by Guardian Developers is a residential address of 1 and 2 BHK Breezy Homes, which is refreshing in the way it is designed. The breath of fresh air comes from the attention given to indoor space design and optimisation achieved in outdoor space utilisation.Located at Kirkatwadi-Nandoshi on Sinhagad Road, Wind Shire occupies a location that is easily accessible and has witnessed extensive development in the recent years.Spread over 8 acres, the project offers a total of 972 apartments across 7 residential towers, while ensuring that every apartment in each tower gets a pleasing view.'),
(2, 0, 'Modern Residency', 'An open landscape with a modest construction, Utsav Homes Bavdhan by Utsav Homes offers 2 and 3 BHK apartments at Pune’s premier locality, Bavdhan. That too at affordable prices.', 'Recreating Happiness', 'Utsav Homes Bavdhan Pune at Bavdhan is set in a beautiful landscape that gives residents a panoramic view and open space where they can enjoy free breathing space.', 'Key Distances', 'Baner- 7.7Kms. Hinjewadi IT Park- 16.1Kms, Pashan- 5.5Kms. Pune University- 8.8Kms. Kothrud- 5.1Kms, Pune Railway Station- 13Kms', 'About Builder', 'UTSAV HOMES are the collaborative brainchild of our team of Architects, Interior Designers, Structural Engineers, Profession Contractors, Landscape & Vaastu Consultants, who''ve poured in endless effort to craft every single project detail to perfection.', 'UTSAV HOMES brings you an auspicious brand of living guaranteed to transform the mundane everyday into a luxuriously elevating experience!\n\nUTSAV HOMES are the collaborative brainchild of our team of Architects, Interior Designers, Structural Engineers, Professional Contractors, Landscape & Vaastu Consultant, who''ve poured in endless effort to craft every single project detail to perfection.\n\nThe strategic location has been amply blessed by Nature''s Grace; its unique geographical makeup, surrounded by hills and a river, offers you a distinct topographical advantage. The neighbourhood enjoys the unique distinction of being strategically poised, yet is likely to witness very few residential or commercial developments - a perfect premise for an ideally balanced lifestyle!'),
(3, 0, 'Let Italy In..', 'Picking the Choicest wonders from the most Exquisite Country ITLAY. Our Manificent Project Abitante is ready to sweep off your Feet.', 'Grand Amenities', 'The Piazza is a city square in Italy that is a popular meeting place. It is adorned with beautiful sculptures and sorronding greens for you to spend relaxing time.', 'Cafe with Canal', 'The Grand Canal in Italy is transported all the way here to give you a relaxing experience. Stop by the water to spend time with your friends as the water sooths you.', 'Market Area', 'The Italian market traditionally is a place where people tarded their fresh produce. We recreate same market ambience for your daily supplies.', 'Puranik Builders has been celebrating the same ethos for the past 46 glorious years of architectural magnificence. A penchant for fine designs and substantial aesthetics, every project is a result of meticulous planning along with concrete execution. We at Puranik Builders have always striven to build properties that have turned your dreams into a reality, your desires to fulfilment and your hopes to happiness. As front runners in the real estate arena, the company firmly believes in value-for-money and transparent deals with strict adherence to time lines and budget estimates.\n');

-- --------------------------------------------------------

--
-- Table structure for table `resprojectowner`
--

CREATE TABLE `resprojectowner` (
  `id` int(11) NOT NULL,
  `builderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resprojectproject`
--

CREATE TABLE `resprojectproject` (
  `id` int(11) NOT NULL,
  `yearofconstruct` text,
  `yearofpossion` text,
  `ownershiptypeid` int(11) NOT NULL DEFAULT '1',
  `nooftower` text,
  `nooffloor` text,
  `noofflatperfloor` text,
  `noofrowhouse` text,
  `villa` text,
  `commercialshop` text,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resprojectproject`
--

INSERT INTO `resprojectproject` (`id`, `yearofconstruct`, `yearofpossion`, `ownershiptypeid`, `nooftower`, `nooffloor`, `noofflatperfloor`, `noofrowhouse`, `villa`, `commercialshop`, `comment`) VALUES
(1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resprojectproperty`
--

CREATE TABLE `resprojectproperty` (
  `id` int(11) NOT NULL,
  `rkflat` text,
  `onebhk` text,
  `twobhk` text,
  `tp5bhk` text,
  `threebhk` text,
  `rowhose` text,
  `typeofvilla` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resprojectproperty`
--

INSERT INTO `resprojectproperty` (`id`, `rkflat`, `onebhk`, `twobhk`, `tp5bhk`, `threebhk`, `rowhose`, `typeofvilla`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resproperty`
--

CREATE TABLE `resproperty` (
  `id` int(11) NOT NULL,
  `name` varchar(700) NOT NULL,
  `location` varchar(700) NOT NULL,
  `city` varchar(700) NOT NULL,
  `state` varchar(700) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `latlong` varchar(700) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `respropertyamanetiesid` int(11) DEFAULT NULL,
  `respropertyprojectid` int(11) DEFAULT NULL,
  `respropertycostid` int(11) DEFAULT NULL,
  `builderid` int(11) DEFAULT NULL,
  `respropertygeolocationid` int(11) DEFAULT NULL,
  `respropertytypeid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `respropertyabout`
--

CREATE TABLE `respropertyabout` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `respropertyabout`
--

INSERT INTO `respropertyabout` (`id`, `name`) VALUES
(1, 'RowHouse'),
(2, 'Flat'),
(3, 'Villa'),
(4, 'Shop\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `respropertyamaneties`
--

CREATE TABLE `respropertyamaneties` (
  `id` int(11) NOT NULL,
  `swimingpool` text,
  `garden` text,
  `gym` text,
  `temple` text,
  `clubhouse` text,
  `solarsystem` text,
  `securitydoor` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `respropertycost`
--

CREATE TABLE `respropertycost` (
  `id` int(11) NOT NULL,
  `sale` text,
  `newproperty` text,
  `resaleproperty` text,
  `typeofproperties` text,
  `rent` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `respropertyfeedback`
--

CREATE TABLE `respropertyfeedback` (
  `id` int(11) NOT NULL,
  `respropertyid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(700) NOT NULL,
  `email` varchar(700) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `respropertyflattype`
--

CREATE TABLE `respropertyflattype` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `respropertyflattype`
--

INSERT INTO `respropertyflattype` (`id`, `type`) VALUES
(1, '1 BHK'),
(2, '2 BHK'),
(3, '2.5 BHK'),
(4, '3 BHK'),
(5, 'Villa'),
(6, 'RowHouse');

-- --------------------------------------------------------

--
-- Table structure for table `respropertyfurnishedstatus`
--

CREATE TABLE `respropertyfurnishedstatus` (
  `id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `respropertyfurnishedstatus`
--

INSERT INTO `respropertyfurnishedstatus` (`id`, `status`) VALUES
(1, 'Fully Furnished'),
(2, 'Semi Furnished'),
(3, 'Non Furnished');

-- --------------------------------------------------------

--
-- Table structure for table `respropertygeolocation`
--

CREATE TABLE `respropertygeolocation` (
  `id` int(11) NOT NULL,
  `railwaystation` text,
  `airport` text,
  `hospital` text,
  `multiplex` text,
  `school` text,
  `college` text,
  `market` text,
  `temple` text,
  `famousplace` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `respropertyimage`
--

CREATE TABLE `respropertyimage` (
  `id` int(11) NOT NULL,
  `respropertyid` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `path` varchar(700) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `addeddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `respropertyowner`
--

CREATE TABLE `respropertyowner` (
  `id` int(11) NOT NULL,
  `respropertyid` int(11) NOT NULL,
  `builderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `respropertyparking`
--

CREATE TABLE `respropertyparking` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `respropertyparking`
--

INSERT INTO `respropertyparking` (`id`, `type`) VALUES
(1, 'Reserved Parking'),
(2, 'Common Parking'),
(3, 'Covered Parking'),
(4, 'Villa Parking'),
(5, 'No Parking');

-- --------------------------------------------------------

--
-- Table structure for table `respropertyproject`
--

CREATE TABLE `respropertyproject` (
  `id` int(11) NOT NULL,
  `yearofconstruct` text,
  `yearofpossion` text,
  `ownershiptypeid` int(11) DEFAULT '1',
  `nooftower` text,
  `nooffloor` text,
  `noofflatperfloor` text,
  `noofrowhouse` text,
  `villa` text,
  `commercialshop` text,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `respropertytype`
--

CREATE TABLE `respropertytype` (
  `id` int(11) NOT NULL,
  `aboutpropertyid` int(11) DEFAULT '1',
  `flattypeid` int(11) DEFAULT '1',
  `noofbedroom` text,
  `noofbathroom` text,
  `noofbalcony` text,
  `dinningspace` text,
  `parkingtype` varchar(300) DEFAULT NULL,
  `furnishtype` varchar(300) DEFAULT NULL,
  `flooring` text,
  `sanctionauthority` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mode` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(700) NOT NULL,
  `description` text NOT NULL,
  `tasktypeid` int(2) NOT NULL,
  `taskpriorityid` int(2) NOT NULL,
  `createdby` int(11) NOT NULL,
  `assignedto` int(11) NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `taskstatusid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taskdiscussion`
--

CREATE TABLE `taskdiscussion` (
  `id` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `commentby` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `commentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taskpriority`
--

CREATE TABLE `taskpriority` (
  `id` int(11) NOT NULL,
  `name` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `taskroutine`
--

CREATE TABLE `taskroutine` (
  `id` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `frequency` varchar(100) DEFAULT NULL,
  `nextdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taskstatus`
--

CREATE TABLE `taskstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tasktype` (
  `id` int(11) NOT NULL,
  `name` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(700) NOT NULL,
  `email` varchar(700) NOT NULL,
  `password` varchar(700) NOT NULL,
  `role_id` int(3) NOT NULL,
  `status_id` int(3) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role_id`, `status_id`, `reg_date`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin', 1, 2, '2015-10-22 05:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `usereducational`
--

CREATE TABLE `usereducational` (
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

CREATE TABLE `userpersonal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(700) DEFAULT NULL,
  `city` varchar(300) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `websitecontent`
--

CREATE TABLE `websitecontent` (
  `id` int(11) NOT NULL,
  `module` varchar(100) NOT NULL,
  `page` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `status` varchar(100) NOT NULL,
  `updateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `websitecontent`
--

INSERT INTO `websitecontent` (`id`, `module`, `page`, `content`, `status`, `updateddate`) VALUES
(1, 'Aboutus', 'aboutus', 'Our team works for our clients before, during, and after we have fulfilled their real estate needs. Our team''s commitment to ongoing training continually enhances our knowledge of the marketplace and ways to better serve our customers unique needs now and into the future.\nOur service proposition will be delivered to every customer with the utmost Integrity, Professionalism, Timeliness, Confidentiality, Credibility, Honesty, and Respect. These values are not only conveyed to our customers, but are also the expected norm in the way agents, staff, management, and vendors interact. &nbsp;<h2 style="color: rgb(121, 121, 121);"><span style="background-color: rgb(51, 51, 204);">About Us&nbsp;</span></h2>      ', 'Active', '2016-04-28 17:20:52'),
(2, 'Blog', 'blog', 'fhfjfjgj', 'Active', '2016-04-29 05:20:15'),
(3, 'Services', 'services', '<section class="heading" style="color: rgb(103, 90, 76); font-family: Montserrat, sans-serif; text-align: center; margin-bottom: 40px;"><div class="container" style="width: 970px;"><div class="row"><div class="col-sm-12" style="width: 970px;"><h1 class="heading-tagline green" style="margin-top: 10px; margin-bottom: 30px; font-size: 54px; font-family: inherit; line-height: 64px; color: rgb(16, 149, 121);"></h1></div></div></div></section><section style="color: rgb(103, 90, 75); font-family: Montserrat, sans-serif;"><div class="container" style="width: 970px;"><div class="row"><div class="col-md-offset-1 col-md-10" style="width: 808.328px; margin-left: 80.8281px;"><p style="margin-bottom: 36px; font-size: 21px; line-height: 36px; font-family: Merriweather, serif;">Choosing the right digital marketing service provider can be a difficult decision in today’s market. You have to allocate budget, assign resources, and locate the best digital marketing agency or consultant to help you meet your goals.</p><p style="margin-bottom: 36px; font-size: 21px; line-height: 36px; font-family: Merriweather, serif;">We’re here to help make that process a little easier by answering the most common questions we receive from potential clients about our online marketing services. We both want to find the right fit for your needs, so let’s get started!</p><h2 style="font-family: Montserrat, sans-serif; text-align: center; color: rgb(16, 149, 121) !important;"><span style="background-color: rgb(255, 255, 204);">What </span>digital marketing services do you provide?</h2><hr style="margin-bottom: 40px; border-top-color: rgb(51, 51, 51); width: 311.328px; text-align: center;"><p style="margin-bottom: 36px; font-size: 21px; line-height: 36px; font-family: Merriweather, serif;"><br></p></div></div></div></section>           ', 'Active', '2016-04-29 05:20:15'),
(4, 'module', 'page', 'HiIaminId=4', 'Active', '2016-05-31 06:21:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `leavetype_id` (`leavetype_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogimages`
--
ALTER TABLE `blogimages`
  ADD KEY `id` (`id`);

--
-- Indexes for table `builder`
--
ALTER TABLE `builder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commercialprojtype`
--
ALTER TABLE `commercialprojtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comproject`
--
ALTER TABLE `comproject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `builderid` (`builderid`),
  ADD KEY `comprojectamanetiesid` (`comprojectamanetiesid`),
  ADD KEY `comprojectgeolocationid` (`comprojectgeolocationid`),
  ADD KEY `comprojectprojectid` (`comprojectprojectid`),
  ADD KEY `comprojectofficeid` (`comprojectofficeid`);

--
-- Indexes for table `comprojectamaneties`
--
ALTER TABLE `comprojectamaneties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comprojectfeedback`
--
ALTER TABLE `comprojectfeedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comprojectfurnishing`
--
ALTER TABLE `comprojectfurnishing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comprojectgeolocation`
--
ALTER TABLE `comprojectgeolocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comprojectimage`
--
ALTER TABLE `comprojectimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comprojectoffice`
--
ALTER TABLE `comprojectoffice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comprojectowner`
--
ALTER TABLE `comprojectowner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comprojectid` (`comprojectid`);

--
-- Indexes for table `comprojectpreferred`
--
ALTER TABLE `comprojectpreferred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comprojectproject`
--
ALTER TABLE `comprojectproject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comproperty`
--
ALTER TABLE `comproperty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD KEY `id` (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial`
--
ALTER TABLE `financial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financialbigcontent`
--
ALTER TABLE `financialbigcontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front`
--
ALTER TABLE `front`
  ADD KEY `id` (`id`);

--
-- Indexes for table `generalfeedback`
--
ALTER TABLE `generalfeedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appliedby` (`appliedby`),
  ADD KEY `approvedby` (`approvedby`),
  ADD KEY `leavetypeid` (`leavetypeid`);

--
-- Indexes for table `leavetype`
--
ALTER TABLE `leavetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ownershiptype`
--
ALTER TABLE `ownershiptype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resprojctfeedback`
--
ALTER TABLE `resprojctfeedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resprojctfeedbacklog`
--
ALTER TABLE `resprojctfeedbacklog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resproject`
--
ALTER TABLE `resproject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resprojectamanetiesid` (`resprojectamanetiesid`),
  ADD KEY `resprojectcostid` (`resprojectcostid`),
  ADD KEY `resprojectgeolocationid` (`resprojectgeolocationid`),
  ADD KEY `resprojectprojectid` (`resprojectprojectid`),
  ADD KEY `resproject_ibfk_6` (`builderid`),
  ADD KEY `resprojectpropertyid` (`resprojectpropertyid`),
  ADD KEY `resprojectmicrositeid` (`resprojectmicrositedetailsid`);

--
-- Indexes for table `resprojectamaneties`
--
ALTER TABLE `resprojectamaneties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resprojectcost`
--
ALTER TABLE `resprojectcost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resprojectgeolocation`
--
ALTER TABLE `resprojectgeolocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resprojectimage`
--
ALTER TABLE `resprojectimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resprojectmicrositedetails`
--
ALTER TABLE `resprojectmicrositedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resprojectowner`
--
ALTER TABLE `resprojectowner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `builderid` (`builderid`);

--
-- Indexes for table `resprojectproject`
--
ALTER TABLE `resprojectproject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ownershiptypeid` (`ownershiptypeid`);

--
-- Indexes for table `resprojectproperty`
--
ALTER TABLE `resprojectproperty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resproperty`
--
ALTER TABLE `resproperty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `respropertyamanetiesid` (`respropertyamanetiesid`),
  ADD KEY `respropertyprojectid` (`respropertyprojectid`),
  ADD KEY `builderid` (`builderid`),
  ADD KEY `respropertygeolocationid` (`respropertygeolocationid`),
  ADD KEY `respropertycostid` (`respropertycostid`),
  ADD KEY `respropertytypeid` (`respropertytypeid`);

--
-- Indexes for table `respropertyabout`
--
ALTER TABLE `respropertyabout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respropertyamaneties`
--
ALTER TABLE `respropertyamaneties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respropertycost`
--
ALTER TABLE `respropertycost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respropertyfeedback`
--
ALTER TABLE `respropertyfeedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respropertyflattype`
--
ALTER TABLE `respropertyflattype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respropertyfurnishedstatus`
--
ALTER TABLE `respropertyfurnishedstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respropertygeolocation`
--
ALTER TABLE `respropertygeolocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respropertyimage`
--
ALTER TABLE `respropertyimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respropertyowner`
--
ALTER TABLE `respropertyowner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `respropertyid` (`respropertyid`);

--
-- Indexes for table `respropertyparking`
--
ALTER TABLE `respropertyparking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respropertyproject`
--
ALTER TABLE `respropertyproject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respropertytype`
--
ALTER TABLE `respropertytype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignedto` (`assignedto`),
  ADD KEY `createdby` (`createdby`),
  ADD KEY `tasktypeid` (`tasktypeid`),
  ADD KEY `taskpriorityid` (`taskpriorityid`),
  ADD KEY `taskstatusid` (`taskstatusid`);

--
-- Indexes for table `taskdiscussion`
--
ALTER TABLE `taskdiscussion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taskid` (`taskid`),
  ADD KEY `commentbyuserid` (`commentby`);

--
-- Indexes for table `taskpriority`
--
ALTER TABLE `taskpriority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taskroutine`
--
ALTER TABLE `taskroutine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taskid` (`taskid`);

--
-- Indexes for table `taskstatus`
--
ALTER TABLE `taskstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasktype`
--
ALTER TABLE `tasktype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `role_id_2` (`role_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `usereducational`
--
ALTER TABLE `usereducational`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usereducational_ibfk_1` (`user_id`);

--
-- Indexes for table `userpersonal`
--
ALTER TABLE `userpersonal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `websitecontent`
--
ALTER TABLE `websitecontent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blogimages`
--
ALTER TABLE `blogimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `builder`
--
ALTER TABLE `builder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `commercialprojtype`
--
ALTER TABLE `commercialprojtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comproject`
--
ALTER TABLE `comproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comprojectamaneties`
--
ALTER TABLE `comprojectamaneties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comprojectfeedback`
--
ALTER TABLE `comprojectfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comprojectfurnishing`
--
ALTER TABLE `comprojectfurnishing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comprojectgeolocation`
--
ALTER TABLE `comprojectgeolocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comprojectimage`
--
ALTER TABLE `comprojectimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comprojectoffice`
--
ALTER TABLE `comprojectoffice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comprojectowner`
--
ALTER TABLE `comprojectowner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comprojectpreferred`
--
ALTER TABLE `comprojectpreferred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comprojectproject`
--
ALTER TABLE `comprojectproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comproperty`
--
ALTER TABLE `comproperty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `financial`
--
ALTER TABLE `financial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `financialbigcontent`
--
ALTER TABLE `financialbigcontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `front`
--
ALTER TABLE `front`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `generalfeedback`
--
ALTER TABLE `generalfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leavetype`
--
ALTER TABLE `leavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ownershiptype`
--
ALTER TABLE `ownershiptype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `resprojctfeedback`
--
ALTER TABLE `resprojctfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `resprojctfeedbacklog`
--
ALTER TABLE `resprojctfeedbacklog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resproject`
--
ALTER TABLE `resproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `resprojectamaneties`
--
ALTER TABLE `resprojectamaneties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `resprojectcost`
--
ALTER TABLE `resprojectcost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `resprojectgeolocation`
--
ALTER TABLE `resprojectgeolocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `resprojectimage`
--
ALTER TABLE `resprojectimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `resprojectmicrositedetails`
--
ALTER TABLE `resprojectmicrositedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `resprojectowner`
--
ALTER TABLE `resprojectowner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resprojectproject`
--
ALTER TABLE `resprojectproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `resprojectproperty`
--
ALTER TABLE `resprojectproperty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `resproperty`
--
ALTER TABLE `resproperty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respropertyabout`
--
ALTER TABLE `respropertyabout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `respropertyamaneties`
--
ALTER TABLE `respropertyamaneties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respropertycost`
--
ALTER TABLE `respropertycost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respropertyfeedback`
--
ALTER TABLE `respropertyfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respropertyflattype`
--
ALTER TABLE `respropertyflattype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `respropertyfurnishedstatus`
--
ALTER TABLE `respropertyfurnishedstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `respropertygeolocation`
--
ALTER TABLE `respropertygeolocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respropertyimage`
--
ALTER TABLE `respropertyimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respropertyowner`
--
ALTER TABLE `respropertyowner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respropertyparking`
--
ALTER TABLE `respropertyparking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `respropertyproject`
--
ALTER TABLE `respropertyproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respropertytype`
--
ALTER TABLE `respropertytype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taskdiscussion`
--
ALTER TABLE `taskdiscussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taskpriority`
--
ALTER TABLE `taskpriority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `taskroutine`
--
ALTER TABLE `taskroutine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taskstatus`
--
ALTER TABLE `taskstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tasktype`
--
ALTER TABLE `tasktype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usereducational`
--
ALTER TABLE `usereducational`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userpersonal`
--
ALTER TABLE `userpersonal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `websitecontent`
--
ALTER TABLE `websitecontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendence`
--
ALTER TABLE `attendence`
  ADD CONSTRAINT `attendence_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `attendence_ibfk_2` FOREIGN KEY (`leavetype_id`) REFERENCES `leavetype` (`id`);

--
-- Constraints for table `comproject`
--
ALTER TABLE `comproject`
  ADD CONSTRAINT `comproject_ibfk_1` FOREIGN KEY (`builderid`) REFERENCES `builder` (`id`),
  ADD CONSTRAINT `comproject_ibfk_2` FOREIGN KEY (`builderid`) REFERENCES `builder` (`id`),
  ADD CONSTRAINT `comproject_ibfk_3` FOREIGN KEY (`comprojectamanetiesid`) REFERENCES `comprojectamaneties` (`id`),
  ADD CONSTRAINT `comproject_ibfk_4` FOREIGN KEY (`comprojectgeolocationid`) REFERENCES `comprojectgeolocation` (`id`),
  ADD CONSTRAINT `comproject_ibfk_5` FOREIGN KEY (`comprojectgeolocationid`) REFERENCES `comprojectgeolocation` (`id`),
  ADD CONSTRAINT `comproject_ibfk_6` FOREIGN KEY (`comprojectprojectid`) REFERENCES `comprojectproject` (`id`),
  ADD CONSTRAINT `comproject_ibfk_7` FOREIGN KEY (`comprojectprojectid`) REFERENCES `comprojectproject` (`id`),
  ADD CONSTRAINT `comproject_ibfk_8` FOREIGN KEY (`comprojectofficeid`) REFERENCES `comprojectoffice` (`id`);

--
-- Constraints for table `comprojectowner`
--
ALTER TABLE `comprojectowner`
  ADD CONSTRAINT `comprojectowner_ibfk_1` FOREIGN KEY (`comprojectid`) REFERENCES `comproject` (`id`);

--
-- Constraints for table `resproject`
--
ALTER TABLE `resproject`
  ADD CONSTRAINT `resproject_ibfk_1` FOREIGN KEY (`resprojectmicrositedetailsid`) REFERENCES `resprojectmicrositedetails` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
