-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 05:56 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ilagancitybmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbl_bmis_users`
--

CREATE TABLE `dbl_bmis_users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `brgy_id` int(11) NOT NULL,
  `last_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbl_bmis_users`
--

INSERT INTO `dbl_bmis_users` (`user_id`, `name`, `username`, `password`, `user_level`, `brgy_id`, `last_log`) VALUES
(1, 'Juan Pedro', 'username1', 'password1', 1, 0, '2020-04-17 17:20:00'),
(2, 'Juan Dela Cruz', 'username2', 'password2', 2, 0, '2019-08-28 23:16:19'),
(3, 'Ahmed Bujar', 'username3', 'password3', 3, 0, '2019-08-28 23:18:13'),
(4, 'admin', 'admin', 'admin', 4, 0, '2020-04-23 02:08:03'),
(5, 'Jabar Abrajalez', 'username5', 'password5', 5, 0, '2019-08-28 23:18:52'),
(6, 'Marlon C. Ariola', 'capt_malalam', 'password', 3, 56, '2020-04-22 20:38:55'),
(7, 'capt ng FUGU', 'capt_fugu', 'password', 3, 50, '2019-11-24 23:14:24'),
(8, 'Marlon C. Ariola', 'sec_malalam', 'password', 2, 56, '2019-11-24 23:55:12'),
(9, 'sec ng FUGU', 'sec_fugu', 'password', 2, 50, '2019-09-09 07:07:44'),
(10, 'Marlon C. Ariola', 'hw_malalam', 'password', 1, 56, '2019-11-25 00:03:03'),
(11, 'hw ng fugu', 'hw_fugu', 'password', 1, 50, '2019-09-09 07:08:31'),
(12, 'capt ng alinguigan 2nd', 'capt_ali_2nd', 'password', 0, 9, '2019-10-26 04:55:03'),
(13, 'capt ng alinguigan 2nd', 'capt_ali_2nd', 'password', 3, 9, '2019-10-26 04:55:30'),
(14, 'capt ng alinguigan 3rd', 'capt_ali_3rd', 'password', 3, 10, '2019-10-26 05:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_animal_products`
--

CREATE TABLE `tbl_animal_products` (
  `ap_id` int(11) NOT NULL,
  `pi_resident_id` varchar(255) NOT NULL,
  `pc_code` varchar(255) NOT NULL,
  `ap_number_of_male` varchar(255) NOT NULL,
  `ap_number_of_female` varchar(255) NOT NULL,
  `ap_age` varchar(255) NOT NULL,
  `ap_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_animal_products`
--

INSERT INTO `tbl_animal_products` (`ap_id`, `pi_resident_id`, `pc_code`, `ap_number_of_male`, `ap_number_of_female`, `ap_age`, `ap_date_added`) VALUES
(1, 'bmis_5de603134aec2', '666666', '1', '1', '4 year/s', '2020-01-14 16:51:50'),
(2, 'bmis_5de603134aec2', 'pr_5e1d8925be119', '5', '5', '', '2020-01-14 17:25:57'),
(3, 'bmis_5de603134aec2', 'pr_5e1d894f70673', '5', '5', '4 week/s', '2020-01-14 17:26:39'),
(4, 'bmis_5de603134aec2', 'pr_5e2db42b691a8', '1', '1', '3 year/s', '2020-01-26 23:45:47'),
(5, 'bmis_5de603134aec2', '666666', '2', '2', '2 year/s', '2020-04-17 20:44:36'),
(6, 'bmis_5e999568d0a11', '777777777777', '3', '3', '2 month/s', '2020-04-18 01:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brgy_list`
--

CREATE TABLE `tbl_brgy_list` (
  `brgy_id` int(11) NOT NULL,
  `brgy_name` varchar(255) NOT NULL,
  `bergy_number_of_purok` int(11) NOT NULL,
  `brgy_date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brgy_list`
--

INSERT INTO `tbl_brgy_list` (`brgy_id`, `brgy_name`, `bergy_number_of_purok`, `brgy_date_added`) VALUES
(6, 'AGGASSIAN', 4, '2019-10-25'),
(7, 'ALIBAGU', 6, '2019-10-25'),
(8, 'ALINGUIGAN 1ST', 0, '2019-08-22'),
(9, 'ALINGUIGAN 2ND', 0, '2019-08-22'),
(10, 'ALINGUIGAN 3RD', 5, '2019-10-26'),
(11, 'ARUSIP', 0, '2019-08-22'),
(12, 'BACULOD', 0, '2019-08-22'),
(13, 'BAGONG SILANG', 0, '2019-08-22'),
(14, 'BAGUMBAYAN', 0, '2019-08-22'),
(15, 'BALIGATAN', 0, '2019-08-22'),
(16, 'BALLACONG', 0, '2019-08-22'),
(17, 'BANGAG', 0, '2019-08-22'),
(18, 'BATONG LABANG', 0, '2019-08-22'),
(19, 'BIGAO', 0, '2019-08-22'),
(21, 'BLISS VILLAGE', 0, '2019-08-22'),
(22, 'CABANNUNGAN 1ST', 0, '2019-08-22'),
(23, 'CABANNUNGAN 2ND', 0, '2019-08-22'),
(24, 'CADU', 0, '2019-08-22'),
(25, 'CALAMAGUI 1ST', 0, '2019-08-22'),
(26, 'CALAMAGUI 2ND', 0, '2019-08-22'),
(27, 'CAMUNATAN', 0, '2019-08-22'),
(28, 'CAPELLAN', 0, '2019-08-22'),
(29, 'CAPO', 0, '2019-08-22'),
(30, 'CARIKKIKAN NORTE', 0, '2019-08-22'),
(31, 'CARIKKIKAN SUR', 0, '2019-08-22'),
(32, 'CENTRO POBLACION', 0, '2019-08-22'),
(33, 'CENTRO SAN ANTONIO', 0, '2019-08-22'),
(34, 'CABISERA 2', 0, '2019-08-22'),
(35, 'CABISERA 3', 0, '2019-08-22'),
(36, 'CABISERA 4', 0, '2019-08-22'),
(37, 'CABISERA 5', 0, '2019-08-22'),
(38, 'CABISERA 6-24', 0, '2019-08-22'),
(39, 'CABISERA 7', 0, '2019-08-22'),
(40, 'CABISERA 9-11', 0, '2019-08-22'),
(41, 'CABISERA 10', 0, '2019-08-22'),
(42, 'CABISERA 14-16', 0, '2019-08-22'),
(43, 'CABISERA17-21', 0, '2019-08-22'),
(44, 'CABISERA 19', 0, '2019-08-22'),
(45, 'CABISERA 22', 0, '2019-08-22'),
(47, 'CABISERA 23', 0, '2019-08-22'),
(48, 'CABISERA 25', 0, '2019-08-22'),
(49, 'CABISERA 27', 0, '2019-08-22'),
(50, 'FUGU', 6, '2019-08-22'),
(51, 'FUYO ', 0, '2019-08-22'),
(52, 'GAYONG(2x) NORTE ', 0, '2019-08-22'),
(53, 'GAYONG (2x) SUR', 0, '2019-08-22'),
(54, 'GUINATAN ', 0, '2019-08-22'),
(55, 'LULLUTAN ', 0, '2019-08-22'),
(56, 'MALALAM', 4, '2019-08-22'),
(57, 'MALASIN', 0, '2019-08-22'),
(58, 'MANARING', 0, '2019-08-22'),
(59, 'MANCURAM ', 0, '2019-08-22'),
(60, 'MARANA 1ST', 0, '2019-08-22'),
(61, 'MARANA 2ND', 0, '2019-08-22'),
(62, 'MARANA 3RD', 0, '2019-08-22'),
(63, 'MINABANG', 0, '2019-08-22'),
(64, 'MORADO', 0, '2019-08-22'),
(65, 'NAMNAMA', 0, '2019-08-22'),
(66, 'NANAGUAN', 0, '2019-08-22'),
(67, 'NAGUILIAN NORTE', 0, '2019-08-22'),
(68, 'NAGUILIAN SUR', 0, '2019-08-22'),
(69, 'OSMENA', 0, '2019-08-22'),
(70, 'PALIUEG', 0, '2019-08-22'),
(71, 'PASA', 0, '2019-08-22'),
(72, 'PILAR', 0, '2019-08-22'),
(73, 'QUIMALABASA', 0, '2019-08-22'),
(74, 'RANG-AYAN', 0, '2019-08-22'),
(75, 'RUGAO', 0, '2019-08-22'),
(76, 'SALINDINGAN', 0, '2019-08-22'),
(77, 'SAN ANDRES', 0, '2019-08-22'),
(78, 'SAN FELIPE', 0, '2019-08-22'),
(79, 'SAN IGNACIO', 0, '2019-08-22'),
(80, 'SAN ISIDRO', 0, '2019-08-22'),
(81, 'SAN JUAN', 0, '2019-08-22'),
(82, 'SAN LORENZO', 0, '2019-08-22'),
(83, 'SAN PABLO', 0, '2019-08-22'),
(84, 'SAN RODRIGO', 0, '2019-08-22'),
(85, 'SAN VICENTE', 0, '2019-08-22'),
(86, 'SIFFU', 0, '2019-08-22'),
(87, 'SINDUN BAYABO', 0, '2019-08-22'),
(88, 'SINDUN MARIDE', 0, '2019-08-22'),
(89, 'SIPAY', 0, '2019-08-22'),
(90, 'STA. BARBARA', 0, '2019-08-22'),
(91, 'STA. CATALINA', 0, '2019-08-22'),
(92, 'STA. ISABEL NORTE', 0, '2019-08-22'),
(93, 'STA. ISABEL SUR', 0, '2019-08-22'),
(94, 'STA. MARIA (CAB. 8)', 0, '2019-08-22'),
(95, 'STA. VICTORIA', 0, '2019-08-22'),
(96, 'STO. TOMAS', 0, '2019-08-22'),
(97, 'TANGCUL', 0, '2019-08-22'),
(98, 'VILLA IMELDA', 0, '2019-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_educational_background`
--

CREATE TABLE `tbl_educational_background` (
  `eb_id` int(11) NOT NULL,
  `pi_resident_id` varchar(255) NOT NULL,
  `schl_name` varchar(255) NOT NULL,
  `schl_level` int(11) NOT NULL,
  `eb_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_educational_background`
--

INSERT INTO `tbl_educational_background` (`eb_id`, `pi_resident_id`, `schl_name`, `schl_level`, `eb_date_added`) VALUES
(5, 'bmis_5db10b527f339', 'malalam elementary school', 1, '2019-12-03 14:24:52'),
(6, 'bmis_5db10b527f339', 'Isabela National Highschool', 2, '2019-12-03 14:24:52'),
(7, 'bmis_5db10b527f339', 'Isabela State University', 3, '2019-12-03 14:24:52'),
(8, 'bmis_5db10b527f339', 'Bachelor of science and information tech', 4, '2019-12-03 14:24:52'),
(9, 'bmis_5de603134aec2', 'Batong labang Elementary School', 1, '2019-12-03 14:41:30'),
(10, 'bmis_5de603134aec2', 'Malaway Integrated High School', 2, '2019-12-03 14:41:30'),
(11, 'bmis_5de603134aec2', 'Isebela State University', 3, '2019-12-03 14:41:30'),
(12, 'bmis_5de603134aec2', 'Bachelor of science in Malaway', 4, '2019-12-03 14:41:30'),
(13, 'bmis_5e25937fb7f3d', '', 1, '2020-01-20 19:49:34'),
(14, 'bmis_5e25937fb7f3d', '', 2, '2020-01-20 19:49:34'),
(15, 'bmis_5e25937fb7f3d', '', 3, '2020-01-20 19:49:34'),
(16, 'bmis_5e25937fb7f3d', '', 4, '2020-01-20 19:49:34'),
(17, 'bmis_5e998e833a9b3', 'asdsadasd', 1, '2020-04-17 19:10:37'),
(18, 'bmis_5e998e833a9b3', 'sadasdasd', 2, '2020-04-17 19:10:38'),
(19, 'bmis_5e998e833a9b3', 'asdasdsad', 3, '2020-04-17 19:10:38'),
(20, 'bmis_5e998e833a9b3', 'asdasdasdasd', 4, '2020-04-17 19:10:38'),
(21, 'bmis_5e9992cbe0335', 'asdasdasd', 1, '2020-04-17 19:28:56'),
(22, 'bmis_5e9992cbe0335', 'asdasdasd', 2, '2020-04-17 19:28:56'),
(23, 'bmis_5e9992cbe0335', 'asdasdasd', 3, '2020-04-17 19:28:56'),
(24, 'bmis_5e9992cbe0335', 'asdadasdasd', 4, '2020-04-17 19:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_details`
--

CREATE TABLE `tbl_employee_details` (
  `ed_id` int(11) NOT NULL,
  `pi_resident_id` varchar(255) NOT NULL,
  `ed_sector` varchar(255) NOT NULL,
  `ed_position` varchar(255) NOT NULL,
  `ed_employer` varchar(255) NOT NULL,
  `ed_address` varchar(255) NOT NULL,
  `ed_salary` varchar(255) NOT NULL,
  `ed_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee_details`
--

INSERT INTO `tbl_employee_details` (`ed_id`, `pi_resident_id`, `ed_sector`, `ed_position`, `ed_employer`, `ed_address`, `ed_salary`, `ed_date_added`) VALUES
(1, 'bmis_5db10b527f339', 'IT', 'Programmer', 'Multisys', 'Paranaque', '100,000', '2019-12-03 14:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_family`
--

CREATE TABLE `tbl_family` (
  `f_id` int(11) NOT NULL,
  `fh_id` varchar(255) NOT NULL,
  `pi_resident_id` varchar(255) NOT NULL,
  `fh_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_family`
--

INSERT INTO `tbl_family` (`f_id`, `fh_id`, `pi_resident_id`, `fh_date_added`) VALUES
(1, '0', 'bmis_5daf979069f47', '2019-10-24 06:15:09'),
(2, 'bmis_5db0d318c0bd5', 'bmis_5db0d318c0bd5', '2019-10-24 06:24:48'),
(3, 'bmis_5db0f7b1e15eb', 'bmis_5db0f7b1e15eb', '2019-10-24 09:44:15'),
(4, 'bmis_5db102fc35556', 'bmis_5db102fc35556', '2019-10-24 09:50:36'),
(5, 'bmis_5db103ab0eb82', 'bmis_5db103ab0eb82', '2019-10-24 10:06:42'),
(6, 'bmis_5db103ab0eb82', 'bmis_5db103ab0eb82', '2019-10-24 10:07:10'),
(7, 'bmis_5db108c72eac2', 'bmis_5db108c72eac2', '2019-10-24 10:13:37'),
(8, 'bmis_5db0f7b1e15eb', 'bmis_5db10b527f339', '2019-10-24 10:30:15'),
(9, 'bmis_5db2abd5d05e2', 'bmis_5db2abd5d05e2', '2019-10-25 16:02:36'),
(10, 'bmis_5db3d881509e9', 'bmis_5db3d881509e9', '2019-10-26 13:24:25'),
(11, 'bmis_5de603134aec2', 'bmis_5de603134aec2', '2019-12-03 14:39:52'),
(12, 'bmis_5db103ab0eb82', 'bmis_5e25937fb7f3d', '2020-01-20 19:49:05'),
(13, 'bmis_5db102fc35556', 'bmis_5e998e833a9b3', '2020-04-17 19:10:07'),
(14, 'bmis_5db0f7b1e15eb', 'bmis_5e9992cbe0335', '2020-04-17 19:28:34'),
(15, 'bmis_5db0f7b1e15eb', 'bmis_5e9993f44bbe0', '2020-04-17 19:33:19'),
(16, 'bmis_5db0f7b1e15eb', 'bmis_5e999568d0a11', '2020-04-17 19:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_family_head`
--

CREATE TABLE `tbl_family_head` (
  `fh_id` int(11) NOT NULL,
  `pi_resident_id` varchar(255) NOT NULL,
  `fh_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_family_head`
--

INSERT INTO `tbl_family_head` (`fh_id`, `pi_resident_id`, `fh_date_added`) VALUES
(1, 'bmis_5daf979069f47', '2019-10-24 06:15:09'),
(2, 'bmis_5db0d318c0bd5', '2019-10-24 06:24:48'),
(3, 'bmis_5db0f7b1e15eb', '2019-10-24 09:44:15'),
(4, 'bmis_5db102fc35556', '2019-10-24 09:50:36'),
(5, 'bmis_5db103ab0eb82', '2019-10-24 10:06:42'),
(6, 'bmis_5db103ab0eb82', '2019-10-24 10:07:10'),
(7, 'bmis_5db108c72eac2', '2019-10-24 10:13:36'),
(8, 'bmis_5db2abd5d05e2', '2019-10-25 16:02:36'),
(9, 'bmis_5db3d881509e9', '2019-10-26 13:24:25'),
(10, 'bmis_5de603134aec2', '2019-12-03 14:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_house`
--

CREATE TABLE `tbl_house` (
  `h_id` int(11) NOT NULL,
  `hh_id` varchar(255) NOT NULL,
  `pi_resident_id` varchar(255) NOT NULL,
  `hh_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_house`
--

INSERT INTO `tbl_house` (`h_id`, `hh_id`, `pi_resident_id`, `hh_date_added`) VALUES
(1, '0', 'bmis_5daf979069f47', '2019-10-24 06:15:09'),
(2, 'bmis_5db0d318c0bd5', 'bmis_5db0d318c0bd5', '2019-10-24 06:24:48'),
(3, 'bmis_5db0f7b1e15eb', 'bmis_5db0f7b1e15eb', '2019-10-24 09:44:15'),
(4, 'bmis_5db102fc35556', 'bmis_5db102fc35556', '2019-10-24 09:50:36'),
(5, '', 'bmis_5db103ab0eb82', '2019-10-24 10:06:42'),
(6, '', 'bmis_5db103ab0eb82', '2019-10-24 10:07:10'),
(7, 'bmis_5db0f7b1e15eb', 'bmis_5db108c72eac2', '2019-10-24 10:13:37'),
(8, 'bmis_5db0f7b1e15eb', 'bmis_5db2abd5d05e2', '2019-10-25 16:02:36'),
(9, 'bmis_5db3d881509e9', 'bmis_5db3d881509e9', '2019-10-26 13:24:25'),
(10, 'bmis_5de603134aec2', 'bmis_5de603134aec2', '2019-12-03 14:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_household_head`
--

CREATE TABLE `tbl_household_head` (
  `hh_id` int(11) NOT NULL,
  `pi_resident_id` varchar(255) NOT NULL,
  `hh_house_number` int(11) NOT NULL,
  `hh_purok` varchar(255) NOT NULL,
  `hh_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_household_head`
--

INSERT INTO `tbl_household_head` (`hh_id`, `pi_resident_id`, `hh_house_number`, `hh_purok`, `hh_date_added`) VALUES
(3, 'bmis_5db0f7b1e15eb', 123123, '4', '2019-10-24 09:44:15'),
(4, 'bmis_5db102fc35556', 1555, '3', '2019-10-24 09:50:36'),
(5, 'bmis_5db3d881509e9', 1111, '5', '2019-10-26 13:24:25'),
(6, 'bmis_5de603134aec2', 6969, '4', '2019-12-03 14:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_other_products`
--

CREATE TABLE `tbl_other_products` (
  `op_id` int(11) NOT NULL,
  `pi_resident_id` varchar(255) NOT NULL,
  `pc_id` int(11) NOT NULL,
  `op_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal_info`
--

CREATE TABLE `tbl_personal_info` (
  `pi_id` int(11) NOT NULL,
  `pi_resident_id` varchar(255) NOT NULL,
  `pi_last_name` varchar(255) NOT NULL,
  `pi_first_name` varchar(255) NOT NULL,
  `pi_middle_name` varchar(255) NOT NULL,
  `pi_extension_name` varchar(255) NOT NULL,
  `pi_sex` varchar(255) NOT NULL,
  `pi_birth_date` varchar(255) NOT NULL,
  `pi_civil_status` varchar(255) NOT NULL,
  `pi_religion` varchar(255) NOT NULL,
  `pi_cp_number` varchar(255) NOT NULL,
  `pi_photo_dir` varchar(255) NOT NULL,
  `pi_brgy_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_personal_info`
--

INSERT INTO `tbl_personal_info` (`pi_id`, `pi_resident_id`, `pi_last_name`, `pi_first_name`, `pi_middle_name`, `pi_extension_name`, `pi_sex`, `pi_birth_date`, `pi_civil_status`, `pi_religion`, `pi_cp_number`, `pi_photo_dir`, `pi_brgy_id`) VALUES
(7, 'bmis_5db0f4b4620d3', 'Try Ko Lang', 'Try Ko Lang', 'Try', 'Try', 'female', '2009-11-22', ' ', 'PBMCI', '09876543211', 'dist/img/img_5db0f4b4623e48.59888885.jpg', 56),
(8, 'bmis_5db0f78a0cacc', 'Simon', 'Alberto', 'Tagao', '', 'male', '2006-06-06', ' ', 'PMCI', '09876543211', 'dist/img/img_5db0f78a0ce402.60471203.jpg', 56),
(9, 'bmis_5db0f7b1e15eb', 'Simon', 'Alberto', 'Tagao', '', 'male', '2006-06-06', ' ', 'PMCI', '09876543211', 'dist/img/img_5db0f7b1e19874.89809259.jpg', 56),
(10, 'bmis_5db102fc35556', 'Simon', 'AHmed Genesis', 'F', '', 'male', '2010-01-22', ' ', 'Iglesia Ni Cristo', '2343242342234', 'dist/img/img_5db102fc358849.59631906.jpg', 56),
(11, 'bmis_5db103ab0eb82', 'Simon', 'Angelo', 'Favie', '', 'male', '2006-08-22', ' ', 'Catholic', '09758233731', 'dist/img/img_5db103ab0eed10.84950044.jpg', 56),
(12, 'bmis_5db103ebbfec4', 'Taga Fugi', 'Ako', 'Haha', '', 'male', '1975-10-31', ' ', 'Iglesia Ni Cristo', '0987654321', 'dist/img/img_5db103ebc02bc6.41181263.jpg', 50),
(13, 'bmis_5db108c72eac2', 'Suta', 'Suta', 'Suta', '', 'male', '2014-11-29', ' ', 'Catholic', '09876543211', 'dist/img/img_5db108c72eddb5.06917724.jpg', 56),
(14, 'bmis_5db10b527f339', 'Aaaaa', 'Aaaa', 'Aaa', '', 'male', '2015-09-29', ' ', 'Catholic', 'sdfsdf', 'dist/img/img_5db10b527f6b64.28882651.jpg', 56),
(15, 'bmis_5db2abd5d05e2', 'Bejarin', 'Orfel', 'Baquiran', '', 'male', '1985-10-28', ' ', 'SAKTO', '098765432112', 'dist/img/img_5db2abd5d0b757.84654023.jpg', 56),
(16, 'bmis_5db3d881509e9', 'Alinguigan', '3rd', 'First', 'Data', 'male', '2008-12-27', ' ', 'Iglesia Ni Cristo', '09876543211', 'dist/img/img_5db3d88150d0a2.56664380.jpg', 10),
(17, 'bmis_5ddf56917b4c3', 'Miranda', 'Amiel', 'Rivero', '', 'male', '1998-09-21', ' ', 'Catholic', '09876543211', 'dist/img/img_5ddf56917bccf7.74292024.jpg', 56),
(18, 'bmis_5de603134aec2', 'Malubay', 'Eugene Albert', 'Donato', 'Jr.', 'male', '1995-01-09', 'widowed ', 'Catholic', '09876543211', 'dist/img/img_5de603134b4650.73502709.jpg', 56),
(19, 'bmis_5e25937fb7f3d', 'Simon', 'Ahmed Genesis', 'Favie', '', 'female', '1999-12-26', 'divorced ', 'Christian', '09876543211', 'dist/img/img_5e25937fc0a846.56468418.png', 56),
(20, 'bmis_5e998e833a9b3', 'Asdasd', 'Asdasd', 'Asdasd', '', 'male', '1999-04-25', 'single ', 'Catholic', '09876543211', 'dist/img/img_5e998e833ad393.31517167.jpg', 56),
(21, 'bmis_5e9992cbe0335', 'Try', 'Ko', 'Lang', '', 'male', '1999-11-29', 'single ', 'Catholic', '0987654321111', 'dist/img/img_5e9992cbe08c61.34407349.jpg', 56),
(22, 'bmis_5e9993f44bbe0', 'Asdasda', 'Asdadasd', 'Asdasd', 'Asdad', 'male', '1999-04-26', 'single ', 'Catholic', '09876543211', '../dist/img/img_5e9993f44bef18.71275499.jpg', 56),
(23, 'bmis_5e999568d0a11', '111', '111', '111', '111', 'male', '1999-05-04', 'single ', 'Catholic', '09876543211', '../dist/img/img_5e999568d0df54.14559425.jpg', 56);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production_facilities`
--

CREATE TABLE `tbl_production_facilities` (
  `pf_id` int(11) NOT NULL,
  `pi_resident_id` varchar(255) NOT NULL,
  `pc_code` varchar(255) NOT NULL,
  `pf_quantity` varchar(255) NOT NULL,
  `pf_ownership` varchar(255) NOT NULL,
  `pf_year_acquired` varchar(255) NOT NULL,
  `pf_cost` varchar(255) NOT NULL,
  `pf_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_production_facilities`
--

INSERT INTO `tbl_production_facilities` (`pf_id`, `pi_resident_id`, `pc_code`, `pf_quantity`, `pf_ownership`, `pf_year_acquired`, `pf_cost`, `pf_date_added`) VALUES
(1, 'bmis_5de603134aec2', '123123', '2', 'owned', '1990', '1000000', '2020-01-13 21:44:15'),
(2, 'bmis_5de603134aec2', 'pr_5e1c74711c900', '1', 'owned', '2016', '1250000', '2020-01-13 21:45:21'),
(3, 'bmis_5de603134aec2', '31321112', '10', 'granted', '2005', '1,300,000', '2020-01-13 23:17:13'),
(4, 'bmis_5de603134aec2', '31321112', '10', 'granted', '2005', '1,300,000', '2020-01-13 23:17:54'),
(5, 'bmis_5de603134aec2', 'pr_5e1c8a384a860', '5', 'owned', '1995', '1000500', '2020-01-13 23:18:16'),
(6, 'bmis_5de603134aec2', '123123', '4', 'granted', '2014', '100000', '2020-01-13 23:19:38'),
(7, 'bmis_5de603134aec2', 'pr_5e1c95828b72a', '1', 'owned', '2018', '1500000', '2020-01-14 00:06:26'),
(8, 'bmis_5de603134aec2', 'pr_5e1c95ee34dde', '3', 'owned', '2016', '9000', '2020-01-14 00:08:14'),
(9, 'bmis_5de603134aec2', 'pr_5e1eba9f1deac', '4', 'owned', '2001', '2000000', '2020-01-15 15:09:19'),
(10, 'bmis_5de603134aec2', 'pr_5e1ebc6a92dfa', '123123', 'owned', '123123', '123123', '2020-01-15 15:16:58'),
(11, 'bmis_5de603134aec2', 'pr_5e1ebcd353b42', '1', 'owned', '111', '11', '2020-01-15 15:18:43'),
(12, 'bmis_5de603134aec2', 'pr_5e1ebd16413a4', '3', 'owned', '1', '1', '2020-01-15 15:19:50'),
(13, 'bmis_5e999568d0a11', '123123', '1', 'owned', '1990', '1000000', '2020-04-18 01:55:51'),
(14, 'bmis_5e999568d0a11', '31321112', '1', 'owned', '1990', '1999999', '2020-04-18 01:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `pr_id` int(11) NOT NULL,
  `pi_resident_id` varchar(255) NOT NULL,
  `pc_code` varchar(255) NOT NULL,
  `pr_area` varchar(255) NOT NULL,
  `pr_ecosystem` varchar(255) NOT NULL,
  `pr_tenant_status` varchar(255) NOT NULL,
  `pr_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property_commodities`
--

CREATE TABLE `tbl_property_commodities` (
  `pc_id` int(11) NOT NULL,
  `pc_code` varchar(255) NOT NULL,
  `pc_category` varchar(255) NOT NULL,
  `pc_type` varchar(255) NOT NULL,
  `pc_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_property_commodities`
--

INSERT INTO `tbl_property_commodities` (`pc_id`, `pc_code`, `pc_category`, `pc_type`, `pc_date_added`) VALUES
(1, '1111111', 'Pr', 'Corn', '2020-01-10 00:00:00'),
(2, '222222', 'Pr', 'Rice', '2020-01-10 00:00:00'),
(3, '123123', 'PF', 'Tractor', '2020-01-10 00:00:00'),
(4, '31321112', 'PF', 'Kuliglig', '2020-01-10 00:00:00'),
(5, '666666', 'AP', 'Sheep', '2020-01-11 00:00:00'),
(6, '777777777777', 'AP', 'Horse', '2020-01-11 00:00:00'),
(7, 'pr_5e1c74711c900', 'PF', 'Reaper', '2020-01-13 21:45:21'),
(8, 'pr_5e1c8a384a860', 'PF', 'Tresser', '2020-01-13 23:18:16'),
(9, 'pr_5e1c95828b72a', 'PF', 'harvester', '2020-01-14 00:06:26'),
(10, 'pr_5e1c95ee34dde', 'PF', 'Sprayer', '2020-01-14 00:08:14'),
(11, 'pr_5e1d8925be119', 'AP', 'Chicken', '2020-01-14 17:25:57'),
(12, 'pr_5e1d894f70673', 'AP', 'Chicken', '2020-01-14 17:26:39'),
(13, 'pr_5e1eba9f1deac', 'PF', 'car', '2020-01-15 15:09:19'),
(14, 'pr_5e1ebc6a92dfa', 'PF', 'asdasd', '2020-01-15 15:16:58'),
(15, 'pr_5e1ebcd353b42', 'PF', 'test1', '2020-01-15 15:18:43'),
(16, 'pr_5e1ebd16413a4', 'PF', 'test2', '2020-01-15 15:19:50'),
(17, 'pr_5e2db42b691a8', 'AP', 'dog', '2020-01-26 23:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_religion`
--

CREATE TABLE `tbl_religion` (
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(255) NOT NULL,
  `rel_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_religion`
--

INSERT INTO `tbl_religion` (`rel_id`, `rel_type`, `rel_date_added`) VALUES
(1, 'Catholic', '0000-00-00 00:00:00'),
(2, 'Iglesia Ni Cristo', '0000-00-00 00:00:00'),
(3, 'Christian', '2019-09-10 00:00:00'),
(4, 'Methodist', '2019-09-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school`
--

CREATE TABLE `tbl_school` (
  `schl_id` int(11) NOT NULL,
  `schl_level` varchar(255) NOT NULL,
  `schl_name` varchar(255) NOT NULL,
  `schl_address` varchar(255) NOT NULL,
  `schl_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_self_employed_details`
--

CREATE TABLE `tbl_self_employed_details` (
  `sed_id` int(11) NOT NULL,
  `pi_resident_id` varchar(255) NOT NULL,
  `sed_name_of_business` varchar(255) NOT NULL,
  `sed_address` varchar(255) NOT NULL,
  `sed_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_self_employed_details`
--

INSERT INTO `tbl_self_employed_details` (`sed_id`, `pi_resident_id`, `sed_name_of_business`, `sed_address`, `sed_date_added`) VALUES
(2, 'bmis_5de603134aec2', 'Laway Producer', 'Sitio Buris, Guibang', '2019-12-03 14:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_details`
--

CREATE TABLE `tbl_work_details` (
  `wd_id` int(11) NOT NULL,
  `pi_resident_id` varchar(255) NOT NULL,
  `wd_status` varchar(25) NOT NULL,
  `wd_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_work_details`
--

INSERT INTO `tbl_work_details` (`wd_id`, `pi_resident_id`, `wd_status`, `wd_date_added`) VALUES
(2, 'bmis_5db10b527f339', 'employed', '2019-12-03 14:24:52'),
(3, 'bmis_5de603134aec2', 'self-employed', '2019-12-03 14:41:30'),
(4, 'bmis_5e25937fb7f3d', 'unemployed', '2020-01-20 19:49:34'),
(5, 'bmis_5e998e833a9b3', 'unemployed', '2020-04-17 19:10:38'),
(6, 'bmis_5e9992cbe0335', 'unemployed', '2020-04-17 19:28:56'),
(7, 'bmis_5e9993f44bbe0', 'unemployed', '2020-04-17 19:33:24'),
(8, 'bmis_5e999568d0a11', 'unemployed', '2020-04-17 19:39:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbl_bmis_users`
--
ALTER TABLE `dbl_bmis_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_animal_products`
--
ALTER TABLE `tbl_animal_products`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `tbl_brgy_list`
--
ALTER TABLE `tbl_brgy_list`
  ADD PRIMARY KEY (`brgy_id`);

--
-- Indexes for table `tbl_educational_background`
--
ALTER TABLE `tbl_educational_background`
  ADD PRIMARY KEY (`eb_id`);

--
-- Indexes for table `tbl_employee_details`
--
ALTER TABLE `tbl_employee_details`
  ADD PRIMARY KEY (`ed_id`);

--
-- Indexes for table `tbl_family`
--
ALTER TABLE `tbl_family`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tbl_family_head`
--
ALTER TABLE `tbl_family_head`
  ADD PRIMARY KEY (`fh_id`);

--
-- Indexes for table `tbl_house`
--
ALTER TABLE `tbl_house`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `tbl_household_head`
--
ALTER TABLE `tbl_household_head`
  ADD PRIMARY KEY (`hh_id`);

--
-- Indexes for table `tbl_other_products`
--
ALTER TABLE `tbl_other_products`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `tbl_personal_info`
--
ALTER TABLE `tbl_personal_info`
  ADD PRIMARY KEY (`pi_id`);

--
-- Indexes for table `tbl_production_facilities`
--
ALTER TABLE `tbl_production_facilities`
  ADD PRIMARY KEY (`pf_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `tbl_property_commodities`
--
ALTER TABLE `tbl_property_commodities`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `tbl_religion`
--
ALTER TABLE `tbl_religion`
  ADD PRIMARY KEY (`rel_id`);

--
-- Indexes for table `tbl_school`
--
ALTER TABLE `tbl_school`
  ADD PRIMARY KEY (`schl_id`);

--
-- Indexes for table `tbl_self_employed_details`
--
ALTER TABLE `tbl_self_employed_details`
  ADD PRIMARY KEY (`sed_id`);

--
-- Indexes for table `tbl_work_details`
--
ALTER TABLE `tbl_work_details`
  ADD PRIMARY KEY (`wd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbl_bmis_users`
--
ALTER TABLE `dbl_bmis_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_animal_products`
--
ALTER TABLE `tbl_animal_products`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_brgy_list`
--
ALTER TABLE `tbl_brgy_list`
  MODIFY `brgy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `tbl_educational_background`
--
ALTER TABLE `tbl_educational_background`
  MODIFY `eb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_employee_details`
--
ALTER TABLE `tbl_employee_details`
  MODIFY `ed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_family`
--
ALTER TABLE `tbl_family`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_family_head`
--
ALTER TABLE `tbl_family_head`
  MODIFY `fh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_house`
--
ALTER TABLE `tbl_house`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_household_head`
--
ALTER TABLE `tbl_household_head`
  MODIFY `hh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_other_products`
--
ALTER TABLE `tbl_other_products`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_personal_info`
--
ALTER TABLE `tbl_personal_info`
  MODIFY `pi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_production_facilities`
--
ALTER TABLE `tbl_production_facilities`
  MODIFY `pf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_property_commodities`
--
ALTER TABLE `tbl_property_commodities`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_religion`
--
ALTER TABLE `tbl_religion`
  MODIFY `rel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_school`
--
ALTER TABLE `tbl_school`
  MODIFY `schl_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_self_employed_details`
--
ALTER TABLE `tbl_self_employed_details`
  MODIFY `sed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_work_details`
--
ALTER TABLE `tbl_work_details`
  MODIFY `wd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
