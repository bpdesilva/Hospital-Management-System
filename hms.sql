-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2017 at 03:01 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admitted`
--

CREATE TABLE `admitted` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ref_by` text NOT NULL,
  `w_no` int(10) NOT NULL,
  `r_no` int(10) NOT NULL,
  `ref_to` int(10) NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_out` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admitted`
--

INSERT INTO `admitted` (`id`, `p_id`, `ref_by`, `w_no`, `r_no`, `ref_to`, `time_in`, `time_out`) VALUES
(12, 2, 'Reese Harrell', 10, 140, 10, '2017-12-07 09:32:23', '2017-12-07 22:10:22'),
(13, 11, 'Alfred Pannyworth', 2, 38, 12, '2017-12-16 19:51:41', '2017-12-16 19:55:42'),
(14, 5, 'James Gordon', 3, 41, 6, '2017-12-16 19:52:36', NULL),
(15, 6, 'Harvey Dent', 4, 54, 2, '2017-12-16 19:55:35', '2017-12-16 19:57:27'),
(16, 1, 'DR.qwerty', 1, 2, 1, '2017-12-18 06:56:22', '2017-12-18 06:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`) VALUES
(1, 'Janka Rogers', 'JRogers@yopmail.com', 'Hi There!\r\n\r\nPlease Contact me!\r\n\r\nRegards,\r\nJ R.'),
(3, 'Bennet Patternot', 'bpt@yopmail.com', 'Thanks for the service! '),
(4, 'Lucy Hale', 'lhale@yopmail.com', 'Thanks for the service.');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `sp_area` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `sp_area`) VALUES
(1, 'Arya Stark', 'Cardiologist '),
(2, 'Abigail Blake', 'Gynecologist'),
(3, 'Clay Bolton', 'General Practitioner'),
(4, 'Salvatore Atkins', 'Infectious Diseases'),
(5, 'Blake Collier', ' Accident & Orthopaedic'),
(6, 'Stanley Hale', 'Critical Care Physician'),
(7, 'Clarissa James', 'Surgical '),
(8, 'Miya Cooke', 'Dentistry '),
(9, 'Mina Maxwell', 'Optometrist'),
(10, 'Easton Mckee', 'Oncologist'),
(11, 'Gaige Michael', 'Radiologist'),
(12, 'Daenerys Targaryen', ' Accident & Orthopaedic'),
(14, 'Frank Adler', 'General practitioner'),
(15, 'Dr.Stanly Amarasekara', 'Cardiologist ');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_ward`
--

CREATE TABLE `doctor_ward` (
  `id` int(10) NOT NULL,
  `d_id` int(10) NOT NULL,
  `w_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor_ward`
--

INSERT INTO `doctor_ward` (`id`, `d_id`, `w_no`) VALUES
(1, 1, 1),
(2, 2, 4),
(3, 3, 6),
(4, 4, 5),
(5, 5, 2),
(6, 6, 3),
(7, 7, 8),
(8, 8, 7),
(9, 9, 9),
(10, 10, 10),
(11, 11, 11),
(12, 12, 2),
(13, 14, 6),
(14, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doc_ward_sch`
--

CREATE TABLE `doc_ward_sch` (
  `d_w_s_id` int(10) NOT NULL,
  `d_w_id` int(10) NOT NULL,
  `date` varchar(30) DEFAULT NULL,
  `in_time` varchar(30) DEFAULT NULL,
  `out_time` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_ward_sch`
--

INSERT INTO `doc_ward_sch` (`d_w_s_id`, `d_w_id`, `date`, `in_time`, `out_time`) VALUES
(4, 1, '2017-12-14', '01:50', '02:30'),
(5, 9, '2017-12-12', '02:00', '03:00'),
(6, 14, '2017-12-28', '10:01', '14:58');

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE `medical_record` (
  `m_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `patient_id` int(20) NOT NULL,
  `doctor_id` int(20) NOT NULL,
  `issued_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_record`
--

INSERT INTO `medical_record` (`m_id`, `description`, `patient_id`, `doctor_id`, `issued_date`) VALUES
(0, 'Aspirin  - 1 per day', 11, 9, '2017-12-16 21:25:31'),
(1, 'Not well.', 2, 1, '2017-12-12 13:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `n_id` int(11) NOT NULL,
  `n_name` text NOT NULL,
  `online_status` varchar(10) DEFAULT 'offline'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`n_id`, `n_name`, `online_status`) VALUES
(1, 'Hannah Young', 'offline'),
(2, 'Adelyn Webster', 'offline'),
(3, 'Cole Mcintosh', 'offline'),
(4, 'Gracelyn Lester', 'offline'),
(5, 'Madalynn Wilkerson', 'offline'),
(6, 'June Paul', 'offline'),
(7, 'Yasmin Rush', 'offline'),
(8, 'Margaret Preston', 'offline'),
(9, 'Mara Owens', 'offline'),
(10, 'Sariah Bray', 'offline'),
(11, 'Emily Lara', 'offline'),
(12, 'Janka Rodrigo', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_ward`
--

CREATE TABLE `nurse_ward` (
  `n_w_id` int(10) NOT NULL,
  `n_id` int(10) NOT NULL,
  `w_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse_ward`
--

INSERT INTO `nurse_ward` (`n_w_id`, `n_id`, `w_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10),
(11, 11, 11),
(12, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nurse_ward_sch`
--

CREATE TABLE `nurse_ward_sch` (
  `n_w_s_id` int(11) NOT NULL,
  `n_w_id` int(10) NOT NULL,
  `date` varchar(30) NOT NULL,
  `in_time` varchar(30) NOT NULL,
  `out_time` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse_ward_sch`
--

INSERT INTO `nurse_ward_sch` (`n_w_s_id`, `n_w_id`, `date`, `in_time`, `out_time`) VALUES
(1, 1, '2017-12-14', '10:01', '11:00'),
(2, 4, '2017-12-06', '03:00', '04:00'),
(3, 12, '2017-12-28', '03:58', '04:58');

-- --------------------------------------------------------

--
-- Table structure for table `op_theater`
--

CREATE TABLE `op_theater` (
  `t_id` int(10) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `t_status` varchar(15) NOT NULL DEFAULT 'free'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `op_theater`
--

INSERT INTO `op_theater` (`t_id`, `t_name`, `t_status`) VALUES
(1, 'OPT - 01', 'free'),
(2, 'OPT - 02', 'free'),
(3, 'OPT - 03', 'free'),
(4, 'OPT - 04', 'free');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `no` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lnname` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'not-admitted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`no`, `fname`, `lnname`, `dob`, `contact_no`, `gender`, `status`) VALUES
(1, 'Clay', 'Elliot', '1990-05-05', '0718203150', 'Male', 'not-admitted'),
(2, 'Mckinley', 'Goodman', '1969-02-20', '0755720469', 'Male', 'not-admitted'),
(3, 'James', ' Blevins', '1982-12-26', '0784925651', 'Male', 'not-admitted'),
(4, 'Diana', ' Moore', '1995-10-05', '0856372394', 'Female', 'not-admitted'),
(5, 'Aurora', ' Day', '1976-06-12', '0452518824', 'Female', 'admitted'),
(6, 'Katie', ' Campbell', '1984-04-02', '0779617682', 'Female', 'not-admitted'),
(7, 'Jon', 'Snow', '1988-02-02', '0778203987', 'Male', 'not-admitted'),
(8, 'Sansa', 'Stark', '1996-02-05', '0725642384', 'Female', 'not-admitted'),
(9, 'Diana', 'Wonder', '2017-12-19', '078801502362', 'Male', 'not-admitted'),
(10, 'Georgia', 'Grace', '2017-01-02', '0452561024', 'Female', 'not-admitted'),
(11, 'Bruce', 'Wayne', '1964-06-10', '0598547580', 'Male', 'not-admitted'),
(12, 'qwertyu', 'qwerty', '1999-03-01', '0770720721', 'Male', 'not-admitted');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `doc_fee` float DEFAULT NULL,
  `hos_fee` float DEFAULT NULL,
  `lab_fee` float DEFAULT NULL,
  `laundary` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `patient_id` int(20) NOT NULL,
  `issued_by_id` int(20) NOT NULL,
  `pay_recby_id` int(10) DEFAULT NULL,
  `issued_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recieved_time` timestamp NULL DEFAULT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `doc_fee`, `hos_fee`, `lab_fee`, `laundary`, `total`, `patient_id`, `issued_by_id`, `pay_recby_id`, `issued_time`, `recieved_time`, `status`) VALUES
(1, 1100, 212, 0, 0, 1312, 3, 1, 2, '2017-12-12 15:03:06', '2017-12-12 18:30:00', 'paid'),
(2, 6000, 40000, 5000, 2500, 53500, 11, 4, NULL, '2017-12-16 19:56:23', NULL, 'pending'),
(3, 5000, 10000, 0, 0, 15000, 5, 6, NULL, '2017-12-16 19:57:51', NULL, 'pending'),
(4, 50000, 20000, 11000, 7000, 88000, 2, 0, NULL, '2017-12-18 07:24:20', NULL, 'pending'),
(5, 50000, 20000, 10000, 7000, 87000, 1, 0, NULL, '2017-12-18 07:24:59', NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(30) NOT NULL,
  `online_status` varchar(10) NOT NULL DEFAULT 'offline'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`r_id`, `r_name`, `online_status`) VALUES
(1, 'Janka Rodrigo', 'offline'),
(2, 'Natalya Wilks', 'offline'),
(3, 'Lucifer Morningstar', 'offline'),
(4, 'Betty Cooper', 'offline'),
(5, 'Veronica Lodge', 'offline'),
(6, 'James Carter', 'offline'),
(7, 'Buwa', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `no` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`no`, `name`, `type`, `status`) VALUES
(1, 'CD-1', 'Non-AC', 'taken'),
(2, 'CD-2', 'Non-AC', 'free'),
(3, 'CD-3', 'Non-AC', 'free'),
(4, 'CD-4', 'Non-AC', 'free'),
(5, 'CD-5', 'Non-AC', 'free'),
(6, 'CD-6', 'Non-AC', 'free'),
(7, 'CD-7', 'Non-AC', 'free'),
(8, 'CD-8', 'Non-AC', 'free'),
(9, 'CD-9', 'Non-AC', 'free'),
(10, 'CD-10', 'Non-AC', 'free'),
(11, 'CD-11', 'AC', 'free'),
(12, 'CD-12', 'AC', 'free'),
(13, 'CD-13', 'AC', 'free'),
(14, 'CD-14', 'AC', 'free'),
(15, 'CD-15', 'AC', 'free'),
(16, 'CD-16', 'AC', 'free'),
(17, 'CD-17', 'AC', 'free'),
(18, 'CD-18', 'AC', 'free'),
(19, 'CD-19', 'AC', 'free'),
(20, 'CD-20', 'AC', 'free'),
(21, 'AW-1', 'Non-AC', 'free'),
(22, 'AW-2', 'Non-AC', 'free'),
(23, 'AW-3', 'Non-AC', 'free'),
(24, 'AW-4', 'Non-AC', 'free'),
(25, 'AW-5', 'Non-AC', 'free'),
(26, 'AW-6', 'Non-AC', 'free'),
(27, 'AW-7', 'Non-AC', 'free'),
(28, 'AW-8', 'Non-AC', 'free'),
(29, 'AW-9', 'Non-AC', 'free'),
(30, 'AW-10', 'Non-AC', 'free'),
(31, 'AW-11', 'AC', 'free'),
(32, 'AW-12', 'AC', 'free'),
(33, 'AW-13', 'AC', 'free'),
(34, 'AW-14', 'AC', 'free'),
(35, 'AW-15', 'AC', 'free'),
(36, 'AW-16', 'AC', 'free'),
(37, 'AW-17', 'AC', 'free'),
(38, 'AW-18', 'AC', 'free'),
(39, 'AW-19', 'AC', 'free'),
(40, 'AW-20', 'AC', 'free'),
(41, 'ICU-1', 'AC', 'taken'),
(42, 'ICU-2', 'AC', 'free'),
(43, 'MAT-1', 'Non-AC', 'free'),
(44, 'MAT-2', 'Non-AC', 'free'),
(45, 'MAT-3', 'Non-AC', 'free'),
(46, 'MAT-4', 'Non-AC', 'free'),
(47, 'MAT-5', 'Non-AC', 'free'),
(48, 'MAT-6', 'Non-AC', 'free'),
(49, 'MAT-7', 'Non-AC', 'free'),
(50, 'MAT-8', 'Non-AC', 'free'),
(51, 'MAT-9', 'Non-AC', 'free'),
(52, 'MAT-10', 'Non-AC', 'free'),
(53, 'MAT-11', 'AC', 'free'),
(54, 'MAT-12', 'AC', 'free'),
(55, 'MAT-13', 'AC', 'free'),
(56, 'MAT-14', 'AC', 'free'),
(57, 'MAT-15', 'AC', 'free'),
(58, 'MAT-16', 'AC', 'free'),
(59, 'MAT-17', 'AC', 'free'),
(60, 'MAT-18', 'AC', 'free'),
(61, 'MAT-19', 'AC', 'free'),
(62, 'MAT-20', 'AC', 'free'),
(63, 'ID-1', 'Non-AC', 'free'),
(64, 'ID-2', 'Non-AC', 'free'),
(65, 'ID-3', 'Non-AC', 'free'),
(66, 'ID-4', 'Non-AC', 'free'),
(67, 'ID-5', 'Non-AC', 'free'),
(68, 'ID-6', 'Non-AC', 'free'),
(69, 'ID-7', 'Non-AC', 'free'),
(70, 'ID-8', 'Non-AC', 'free'),
(71, 'ID-9', 'Non-AC', 'free'),
(72, 'ID-10', 'Non-AC', 'free'),
(73, 'ID-11', 'AC', 'free'),
(74, 'ID-12', 'AC', 'free'),
(75, 'ID-13', 'AC', 'free'),
(76, 'ID-14', 'AC', 'free'),
(77, 'ID-15', 'AC', 'free'),
(78, 'ID-16', 'AC', 'free'),
(79, 'ID-17', 'AC', 'free'),
(80, 'ID-18', 'AC', 'free'),
(81, 'ID-19', 'AC', 'free'),
(82, 'ID-20', 'AC', 'free'),
(83, 'G-1', 'AC', 'free'),
(84, 'G-2', 'AC', 'free'),
(85, 'G-3', 'AC', 'free'),
(86, 'G-4', 'AC', 'free'),
(87, 'G-5', 'AC', 'free'),
(88, 'G-6', 'AC', 'free'),
(89, 'G-7', 'AC', 'free'),
(90, 'G-8', 'AC', 'free'),
(91, 'G-9', 'AC', 'free'),
(92, 'G-10', 'AC', 'free'),
(93, 'G-11', 'AC', 'free'),
(94, 'G-12', 'AC', 'free'),
(95, 'G-13', 'AC', 'free'),
(96, 'G-14', 'AC', 'free'),
(97, 'G-15', 'AC', 'free'),
(98, 'G-16', 'AC', 'free'),
(99, 'G-17', 'AC', 'free'),
(100, 'G-18', 'AC', 'free'),
(101, 'G-19', 'AC', 'free'),
(102, 'G-20', 'AC', 'free'),
(103, 'G-21', 'Non-AC', 'free'),
(104, 'G-22', 'Non-AC', 'free'),
(105, 'G-23', 'Non-AC', 'free'),
(106, 'G-24', 'Non-AC', 'free'),
(107, 'G-25', 'Non-AC', 'free'),
(108, 'G-26', 'Non-AC', 'free'),
(109, 'G-27', 'Non-AC', 'free'),
(110, 'G-28', 'Non-AC', 'free'),
(111, 'G-29', 'Non-AC', 'free'),
(112, 'G-30', 'Non-AC', 'free'),
(113, 'G-31', 'Non-AC', 'free'),
(114, 'G-32', 'Non-AC', 'free'),
(115, 'G-33', 'Non-AC', 'free'),
(116, 'G-34', 'Non-AC', 'free'),
(117, 'G-35', 'Non-AC', 'free'),
(118, 'G-36', 'Non-AC', 'free'),
(119, 'G-37', 'Non-AC', 'free'),
(120, 'G-38', 'Non-AC', 'free'),
(121, 'G-39', 'Non-AC', 'free'),
(122, 'G-40', 'Non-AC', 'free'),
(123, 'D-1', 'AC', 'free'),
(124, 'D-2', 'AC', 'free'),
(125, 'D-3', 'AC', 'free'),
(126, 'D-4', 'AC', 'free'),
(127, 'D-5', 'AC', 'free'),
(128, 'D-6', 'Non-AC', 'free'),
(129, 'D-7', 'Non-AC', 'free'),
(130, 'D-8', 'Non-AC', 'free'),
(131, 'D-9', 'Non-AC', 'free'),
(132, 'D-10', 'Non-AC', 'free'),
(133, 'OP-1', 'AC', 'free'),
(134, 'OP-2', 'AC', 'free'),
(135, 'OP-3', 'AC', 'free'),
(136, 'OP-4', 'AC', 'free'),
(137, 'OP-5', 'AC', 'free'),
(138, 'OP-6', 'Non-AC', 'free'),
(139, 'OP-7', 'Non-AC', 'free'),
(140, 'OP-8', 'Non-AC', 'free'),
(141, 'OP-9', 'Non-AC', 'free'),
(142, 'OP-10', 'Non-AC', 'free'),
(143, 'ON-1', 'AC', 'free'),
(144, 'ON-2', 'AC', 'free'),
(145, 'ON-3', 'AC', 'free'),
(146, 'ON-4', 'AC', 'free'),
(147, 'ON-5', 'AC', 'free'),
(148, 'ON-6', 'Non-AC', 'free'),
(149, 'ON-7', 'Non-AC', 'free'),
(150, 'ON-8', 'Non-AC', 'free'),
(151, 'ON-9', 'Non-AC', 'free'),
(152, 'ON-10', 'Non-AC', 'free'),
(153, 'R-1', 'AC', 'free'),
(154, 'R-2', 'AC', 'free'),
(155, 'R-3', 'AC', 'free'),
(156, 'R-4', 'AC', 'free'),
(157, 'R-5', 'AC', 'free'),
(158, 'R-6', 'Non-AC', 'free'),
(159, 'R-7', 'Non-AC', 'free'),
(160, 'R-8', 'Non-AC', 'free'),
(161, 'R-9', 'Non-AC', 'free'),
(162, 'R-10', 'Non-AC', 'free'),
(163, 'R-11', 'Non-AC', 'free');

-- --------------------------------------------------------

--
-- Table structure for table `theater_sch`
--

CREATE TABLE `theater_sch` (
  `t_s_id` int(11) NOT NULL,
  `t_id` int(10) NOT NULL,
  `date` varchar(30) NOT NULL,
  `in_time` varchar(30) NOT NULL,
  `out_time` varchar(30) NOT NULL,
  `d_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theater_sch`
--

INSERT INTO `theater_sch` (`t_s_id`, `t_id`, `date`, `in_time`, `out_time`, `d_id`, `p_id`) VALUES
(2, 1, '2017-12-08', '06:30', '07:30', 10, 2),
(3, 1, '2017-12-28', '04:33', '09:43', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `UserType` varchar(45) NOT NULL,
  `u_id` int(20) NOT NULL,
  `Status` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`, `UserType`, `u_id`, `Status`) VALUES
(1, 'Admin', '21232F297A57A5A743894A0E4A801FC3', 'Administrator', 1, 'existing'),
(2, 'astark', 'c813ba74ccb9dd7d625974e91a83fa7a', 'Doctor', 1, 'removed'),
(3, 'ablake', 'f09c0b8a00ea54cacb3c994988db8378', 'Doctor', 2, 'existing'),
(4, 'cbolton', '0234496970a9a7ad8a9280209d2aa4b5', 'Doctor', 3, 'existing'),
(5, 'satkins', '9c055fe40142e6b06a0e2ace28caac48', 'Doctor', 4, 'existing'),
(6, 'bcollier', 'c193fd9906d5df72dfe80529c2c53247', 'Doctor', 5, 'existing'),
(7, 'shale', '15541c934ad2dc92e29726e5f7f888d2', 'Doctor', 6, 'existing'),
(8, 'cjames', '9d3c6b89fbccd788add3d16604eea29b', 'Doctor', 7, 'existing'),
(9, 'mcooke', 'c75ee2aff0cf3a28375bf84c603d9b57', 'Doctor', 8, 'existing'),
(10, 'mmaxwell', 'e35acbfd69f4f1634b34c55ed590ad82', 'Doctor', 9, 'existing'),
(11, 'emckee', '3c4586048698d2f4e41f120161832c99', 'Doctor', 10, 'existing'),
(12, 'gmichael', '8d02cf8d470b6dea5b22cfb562df3cd8', 'Doctor', 11, 'existing'),
(13, 'hyoung', 'fab5bb2953331e40cae7ec39b03baf66', 'Nurse', 1, 'existing'),
(14, 'awebster', '9d5c4ddf205dc17cba9ef8655c2b0ea5', 'Nurse', 2, 'existing'),
(15, 'cmcintosh', '9f4458bb811319db68bfb7dbf308bd1a', 'Nurse', 3, 'existing'),
(16, 'glester', 'a77615d7cbedf49806e33872c6d8b656', 'Nurse', 4, 'existing'),
(17, 'mwilkerson', '4c0727177fe9abcf6aec96e78cda274f', 'Nurse', 5, 'existing'),
(18, 'jpaul', '04bf221b05307d4f919c5a0eb8ce14a1', 'Nurse', 6, 'existing'),
(19, 'yrush', '89522fe6f7b32f19f6c95e2d5c74cc1c', 'Nurse', 7, 'existing'),
(20, 'mpreston', '6bd8f7c4bc8497845d818d5205458dae', 'Nurse', 8, 'existing'),
(21, 'mowens', '2da61702e5f23adbb90ef643e9a4e06d', 'Nurse', 9, 'existing'),
(22, 'sbray', 'a4cc6fe09106555b952aa135edd554e2', 'Nurse', 10, 'existing'),
(23, 'elara', '01d0942f82e73a58858274504ce37cb3', 'Nurse', 11, 'existing'),
(24, 'jrodrigo', 'ba2f8e85389a0ea230dd9364bd163c64', 'Receptionist', 1, 'removed'),
(25, 'nwilks', '785b38bd25243c3d39a98b6c12a9c816', 'Receptionist', 2, 'existing'),
(26, 'dtargaryen', '8d366d94c94163642e9e9ad559c1a517', 'Doctor', 12, 'existing'),
(27, '', 'd41d8cd98f00b204e9800998ecf8427e', 'Doctor', 13, 'removed'),
(28, 'fadler', '3c0d12f62979f11182d0c4bb5cfe8ad5', 'Doctor', 14, 'existing'),
(29, 'lmorningstar', '47ffb27a68eb5629b2f4724a119898ed', 'Receptionist', 3, 'existing'),
(30, 'bcooper', 'c417d1ad33dd2966d72d5cb86a028db2', 'Receptionist', 4, 'existing'),
(31, 'vlodge', '14ac80f6137411d5670286b567e064f5', 'Receptionist', 5, 'existing'),
(32, 'jcarter', '70dae7668e1afbf0c5ac6171d6c354ae', 'Receptionist', 6, 'existing'),
(33, 'stanaly123', '25f9e794323b453885f5181f1b624d0b', 'Doctor', 15, 'existing'),
(34, 'janaka123', '25f9e794323b453885f5181f1b624d0b', 'Nurse', 12, 'existing'),
(35, 'buwa123', '25f9e794323b453885f5181f1b624d0b', 'Receptionist', 7, 'existing');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `no` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`no`, `name`) VALUES
(1, 'Cardiology '),
(2, 'Accident Ward'),
(3, 'Intensive Care Unit'),
(4, 'Maternity'),
(5, 'Infectious Diseases'),
(6, 'General'),
(7, 'Dental'),
(8, 'Surgeons '),
(9, 'Optometry'),
(10, 'Oncology'),
(11, 'Radiology');

-- --------------------------------------------------------

--
-- Table structure for table `ward_room`
--

CREATE TABLE `ward_room` (
  `id` int(10) NOT NULL,
  `r_num` int(10) NOT NULL,
  `w_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ward_room`
--

INSERT INTO `ward_room` (`id`, `r_num`, `w_no`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 2),
(22, 22, 2),
(23, 23, 2),
(24, 24, 2),
(25, 25, 2),
(26, 26, 2),
(27, 27, 2),
(28, 28, 2),
(29, 29, 2),
(30, 30, 2),
(31, 31, 2),
(32, 32, 2),
(33, 33, 2),
(34, 34, 2),
(35, 35, 2),
(36, 36, 2),
(37, 37, 2),
(38, 38, 2),
(39, 39, 2),
(40, 40, 2),
(41, 41, 3),
(42, 42, 3),
(43, 43, 4),
(44, 44, 4),
(45, 45, 4),
(46, 46, 4),
(47, 47, 4),
(48, 48, 4),
(49, 49, 4),
(50, 50, 4),
(51, 51, 4),
(52, 52, 4),
(53, 53, 4),
(54, 54, 4),
(55, 55, 4),
(56, 56, 4),
(57, 57, 4),
(58, 58, 4),
(59, 59, 4),
(60, 60, 4),
(61, 61, 4),
(62, 62, 4),
(63, 63, 5),
(64, 64, 5),
(65, 65, 5),
(66, 66, 5),
(67, 67, 5),
(68, 68, 5),
(69, 69, 5),
(70, 70, 5),
(71, 71, 5),
(72, 72, 5),
(73, 73, 5),
(74, 74, 5),
(75, 75, 5),
(76, 76, 5),
(77, 77, 5),
(78, 78, 5),
(79, 79, 5),
(80, 80, 5),
(81, 81, 5),
(82, 82, 5),
(83, 83, 6),
(84, 84, 6),
(85, 85, 6),
(86, 86, 6),
(87, 87, 6),
(88, 88, 6),
(89, 89, 6),
(90, 90, 6),
(91, 91, 6),
(92, 92, 6),
(93, 93, 6),
(94, 94, 6),
(95, 95, 6),
(96, 96, 6),
(97, 97, 6),
(98, 98, 6),
(99, 99, 6),
(100, 100, 6),
(101, 101, 6),
(102, 102, 6),
(103, 103, 6),
(104, 104, 6),
(105, 105, 6),
(106, 106, 6),
(107, 107, 6),
(108, 108, 6),
(109, 109, 6),
(110, 110, 6),
(111, 111, 6),
(112, 112, 6),
(113, 113, 6),
(114, 114, 6),
(115, 115, 6),
(116, 116, 6),
(117, 117, 6),
(118, 118, 6),
(119, 119, 6),
(120, 120, 6),
(121, 121, 6),
(122, 122, 6),
(123, 123, 7),
(124, 124, 7),
(125, 125, 7),
(126, 126, 7),
(127, 127, 7),
(128, 128, 7),
(129, 129, 7),
(130, 130, 7),
(131, 131, 7),
(132, 132, 7),
(133, 133, 10),
(134, 134, 10),
(135, 135, 10),
(136, 136, 10),
(137, 137, 10),
(138, 138, 10),
(139, 139, 10),
(140, 140, 10),
(141, 141, 10),
(142, 142, 10),
(143, 143, 11),
(144, 144, 11),
(145, 145, 11),
(146, 146, 11),
(147, 147, 11),
(148, 148, 11),
(149, 149, 11),
(150, 150, 11),
(151, 151, 11),
(152, 152, 11),
(153, 153, 11),
(154, 154, 11),
(155, 155, 11),
(156, 156, 11),
(157, 157, 11),
(158, 158, 11),
(159, 159, 11),
(160, 160, 11),
(161, 161, 11),
(162, 162, 11),
(163, 163, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admitted`
--
ALTER TABLE `admitted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_ward`
--
ALTER TABLE `doctor_ward`
  ADD PRIMARY KEY (`id`),
  ADD KEY `d_id` (`d_id`),
  ADD KEY `w_no` (`w_no`);

--
-- Indexes for table `doc_ward_sch`
--
ALTER TABLE `doc_ward_sch`
  ADD PRIMARY KEY (`d_w_s_id`);

--
-- Indexes for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `nurse_ward`
--
ALTER TABLE `nurse_ward`
  ADD PRIMARY KEY (`n_w_id`);

--
-- Indexes for table `nurse_ward_sch`
--
ALTER TABLE `nurse_ward_sch`
  ADD PRIMARY KEY (`n_w_s_id`);

--
-- Indexes for table `op_theater`
--
ALTER TABLE `op_theater`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `theater_sch`
--
ALTER TABLE `theater_sch`
  ADD PRIMARY KEY (`t_s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `ward_room`
--
ALTER TABLE `ward_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `w_no` (`w_no`),
  ADD KEY `r_num` (`r_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admitted`
--
ALTER TABLE `admitted`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `doctor_ward`
--
ALTER TABLE `doctor_ward`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `doc_ward_sch`
--
ALTER TABLE `doc_ward_sch`
  MODIFY `d_w_s_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `nurse_ward`
--
ALTER TABLE `nurse_ward`
  MODIFY `n_w_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `nurse_ward_sch`
--
ALTER TABLE `nurse_ward_sch`
  MODIFY `n_w_s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `op_theater`
--
ALTER TABLE `op_theater`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;
--
-- AUTO_INCREMENT for table `theater_sch`
--
ALTER TABLE `theater_sch`
  MODIFY `t_s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_ward`
--
ALTER TABLE `doctor_ward`
  ADD CONSTRAINT `doctor_ward_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `doctor_ward_ibfk_2` FOREIGN KEY (`w_no`) REFERENCES `ward` (`no`);

--
-- Constraints for table `ward_room`
--
ALTER TABLE `ward_room`
  ADD CONSTRAINT `ward_room_ibfk_1` FOREIGN KEY (`w_no`) REFERENCES `ward` (`no`),
  ADD CONSTRAINT `ward_room_ibfk_2` FOREIGN KEY (`r_num`) REFERENCES `room` (`no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
