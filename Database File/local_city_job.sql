-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 22, 2023 at 03:33 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `local_city_job`
--
CREATE DATABASE IF NOT EXISTS `local_city_job` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `local_city_job`;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_data`
--

CREATE TABLE IF NOT EXISTS `contact_us_data` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` text COLLATE utf8_unicode_ci NOT NULL,
  `l_name` text COLLATE utf8_unicode_ci NOT NULL,
  `cnt_email_id` text COLLATE utf8_unicode_ci NOT NULL,
  `cnt_mobile_no` text COLLATE utf8_unicode_ci NOT NULL,
  `report_msg` text COLLATE utf8_unicode_ci NOT NULL,
  `rpt_date` date NOT NULL,
  `rpt_time` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE IF NOT EXISTS `job_details` (
  `j_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_name` text COLLATE utf8_unicode_ci NOT NULL,
  `company_name` text COLLATE utf8_unicode_ci NOT NULL,
  `workplace_type` text COLLATE utf8_unicode_ci NOT NULL,
  `country` text COLLATE utf8_unicode_ci NOT NULL,
  `state` text COLLATE utf8_unicode_ci NOT NULL,
  `city` text COLLATE utf8_unicode_ci NOT NULL,
  `salary` text COLLATE utf8_unicode_ci NOT NULL,
  `more_details` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` text COLLATE utf8_unicode_ci NOT NULL,
  `category` text COLLATE utf8_unicode_ci NOT NULL,
  `pst_date` date NOT NULL,
  `pst_time` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`j_id`),
  KEY `j_id` (`j_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `job_details`
--

INSERT INTO `job_details` (`j_id`, `job_name`, `company_name`, `workplace_type`, `country`, `state`, `city`, `salary`, `more_details`, `contact_no`, `category`, `pst_date`, `pst_time`) VALUES
(3, 'Data Entry Job', 'RS Company', 'Remote Type', 'India', 'Maharashtra', 'Solapur', '20000', 'Work from Home.\r\nNow you can make money with no special efforts.\r\nJust enter the given data neatly and that is all! ', '8830152936', '''Data-Entry''', '2023-07-16', '08:05:26 AM'),
(6, 'Store Keeper', 'Sharda Kirana Store', 'On-site Type', 'India', 'Maharashtra', 'Solapur', '8,000', 'We have opportunity for the post of,Store Keeper for solapur,maharashtra candidate who have minmum 2 years exrperinced can apply for the post company will give good salary and other benifits ', '8830152936', '''Shopkeeper''', '2023-07-21', '11:04:34 AM'),
(8, 'Personal driver ', '-', 'On-site Type', 'India ', 'Maharashtra', 'Dharashiv', '10,000', 'For Personal Driver', '8766696169', '''Driver''', '2023-07-21', '11:07:20 AM'),
(10, 'Personal Assistant', '-', 'On-site Type', 'India', 'Maharashtra', 'Mumbai', '15,000', 'For Personal Assistant', '8149156585', '', '2023-07-21', '11:11:29 AM'),
(11, 'Music Educator in School', 'GP Solapur', 'On-site Type', 'India', 'Maharashtra', 'Solapur', '20,000', 'We are currently looking to recruit candidates for the position of music educators.', '8767213110', '''Music And Art''', '2023-07-21', '11:15:24 AM'),
(12, 'Material Handlers', 'Vhandre Materials', 'On-site Type', 'India', 'Maharashtra', 'Pune', '25,000', 'For handling the materials', '7028349966', '''Engineer''', '2023-07-21', '11:18:07 AM'),
(13, 'Welder', 'Dev Materials', 'On-site Type', 'India', 'Maharashtra', 'Nagpur', '20,000', 'For welding The materials', '9175401493', '''Engineer''', '2023-07-21', '11:20:08 AM'),
(14, 'Hairdresser', 'Snehal Salon', 'On-site Type', 'India', 'Maharashtra', 'Barshi', '10,000', 'For Hairdresser', '9404210220', '''Salon''', '2023-07-21', '11:22:34 AM'),
(15, 'Nail Technician', 'Raj Salon', 'On-site Type', 'India', 'Maharashtra', 'Nannaj', '10,000', 'For nail technician', '8855927929', '''Salon''', '2023-07-21', '11:24:35 AM'),
(16, 'Makeup Artist', 'Shrutika Salon', 'On-site Type', 'India', 'Maharashtra', 'Umrga', '50,000', 'For makeup artist', '9022616816', '''Salon''', '2023-07-21', '11:27:37 AM'),
(17, 'Hair and beauty assistant', 'Arati Salon', 'On-site Type', 'India', 'Maharashtra', 'Kalamb', '5,000', 'For Hair and beauty assistant', '7666689700', '''Salon''', '2023-07-21', '11:30:18 AM'),
(18, 'Canteen Manager', 'Vishal Canteen', 'On-site Type', 'India', 'Maharashtra', 'Chatrapti Sambhaji Nagar', '10,000', 'Needs to monitor the entire function of canteen, orders being delivered as per request and needs to be resoposible for billing and manage and resposibilites of a cashier.', '9503870349', '''Food Services''', '2023-07-21', '11:34:57 AM'),
(19, 'Food services supervisor', 'Uphar Hotel ', 'On-site Type', 'India', 'Maharashtra', 'Beed', '15,000', 'stock management nd needs to spend reports on daily basis', '7499042708', '''Food Services''', '2023-07-21', '11:38:22 AM'),
(20, 'Chef', 'Nisarga Hotel', 'On-site Type', 'India', 'Maharashtra', 'Tuljapur', '20,000', 'For veg and non-veg maker', '9404210220', '''Food Services''', '2023-07-21', '11:42:08 AM'),
(21, 'Control Architect', 'Bhosale Enterprises', 'On-site Type', 'India', 'Maharashtra', 'Mandrup', '35,000', 'This is a senioer level position that interfaces with multiple stakeholders in the company in order to understand requirement, business constraints,problem domain and develoment.', '9890627262', '''Engineer''', '2023-07-21', '11:49:34 AM'),
(22, 'Technical Archeitect-Server side javascript and java', 'SSD', 'On-site Type', 'India', 'Maharashtra', 'Latur', '50,000', 'We hire skilled and very well knowledgable developer required', '7083575084', '''Engineer''', '2023-07-21', '11:55:31 AM'),
(23, 'Music Educator in School', 'GP Solapur', 'On-site Type', 'India', 'Maharashtra', 'Solapur', '20,000', 'We are currently looking to recruit candidates for the position of music educators.', '8767213110', '''Eduation & Training''', '2023-07-21', '11:15:24 AM'),
(24, 'Welder', 'Dev Materials', 'On-site Type', 'India', 'Maharashtra', 'Nagpur', '20,000', 'For welding The materials', '9175401493', '''Factory''', '2023-07-21', '11:20:08 AM');

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE IF NOT EXISTS `users_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` text COLLATE utf8_unicode_ci NOT NULL,
  `email_id` text COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` text COLLATE utf8_unicode_ci NOT NULL,
  `dob` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` text COLLATE utf8_unicode_ci NOT NULL,
  `country` text COLLATE utf8_unicode_ci NOT NULL,
  `state` text COLLATE utf8_unicode_ci NOT NULL,
  `city` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL,
  `reg_time` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id`, `full_name`, `email_id`, `mobile_no`, `dob`, `gender`, `country`, `state`, `city`, `password`, `reg_date`, `reg_time`) VALUES
(11, 'Rajnandini Sunil Bhosale', 'rajnandini19bhosale@gmail.com', '8830152936', '2004-08-19', 'Female', 'India', 'Maharashtra', 'Solapur', 'rajbhosale', '2023-07-18', '06:49:21 31'),
(14, 'Archana vhandre', 'archanavhandre05@gmail.com', '8149156585', '2005-04-05', 'Female', 'India', 'Maharashtra', 'Solapur', '123456789', '2023-07-19', '04:37:00 AM'),
(15, 'Raj Bhosale', 'rajnandini19bhosale@gmail.com', '8830152936', '2004-08-19', 'Male', 'India', 'Maharastra', 'Solapur', 'rajbhosale', '2023-07-20', '14:19:56 PM'),
(16, 'dksjhaf', 'rajnandini19bhosale@gmail.com', '847239487', '2001-06-05', 'Female', 'India', 'Maharashtra', 'Solapur', 'cdsjmj', '2023-07-21', '08:11:52 AM'),
(17, 'dksjhaf', 'rajnandini19bhosale@gmail.com', '847239487', '2001-06-05', 'Female', 'India', 'Maharashtra', 'Solapur', 'cdsjmj', '2023-07-21', '08:17:40 AM'),
(18, 'dksjhaf', 'rajnandini19bhosale@gmail.com', '847239487', '2001-06-05', 'Female', 'India', 'Maharashtra', 'Solapur', 'cdsjmj', '2023-07-21', '08:21:37 AM'),
(19, 'sgjhasgd', 'rajnandini!9bhosale@gmail.com', '487238420', '20001-08-19', 'Male', 'asjkGSDJ,BJASM,', 'DJKAS,DJ', 'IASKDH', 'AHSFLK', '2023-07-21', '08:23:44 AM'),
(20, 'Archana vhandre', 'archanavhandre05@gmail.com', '8149156585', '2005-04-05', 'Female', 'India', 'Maharashtra', 'Solapur', 'archanavhandre', '2023-07-21', '10:50:21 AM'),
(21, 'Archana vhandre', 'archanavhandre05@gmail.com', '8149156585', '2005-04-05', 'Female', 'India', 'Maharashtra', 'Solapur', 'archanavhandre', '2023-07-21', '10:51:57 AM');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
