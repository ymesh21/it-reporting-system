-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2022 at 04:26 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ict`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `id` int(11) NOT NULL,
  `woreda` int(11) NOT NULL,
  `ccms` int(11) NOT NULL DEFAULT 0,
  `ibex` int(11) NOT NULL DEFAULT 0,
  `payroll` int(11) NOT NULL DEFAULT 0,
  `pass` int(11) NOT NULL DEFAULT 0,
  `trls` int(11) NOT NULL DEFAULT 0,
  `mis` int(11) NOT NULL DEFAULT 0,
  `icsmis` int(11) NOT NULL DEFAULT 0,
  `sigtas` int(11) NOT NULL DEFAULT 0,
  `omas` int(11) NOT NULL DEFAULT 0,
  `pads` int(11) NOT NULL DEFAULT 0,
  `isla` int(11) NOT NULL DEFAULT 0,
  `others` int(11) NOT NULL DEFAULT 0,
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `woreda`, `ccms`, `ibex`, `payroll`, `pass`, `trls`, `mis`, `icsmis`, `sigtas`, `omas`, `pads`, `isla`, `others`, `year`, `month`) VALUES
(2, 12, 1, 1, 1, 1, 0, 0, 0, 1, 0, 0, 1, 0, '2022', 'Mar');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `woreda` int(11) NOT NULL,
  `type` enum('Desktop','Laptop','Printer','Photocopier','Scanner','Network Devices','Camera') COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` double NOT NULL,
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `woreda`, `type`, `amount`, `price`, `year`, `month`, `created`, `modified`) VALUES
(2, 1, 'Desktop', 5, 5000, '2022', 'Mar', '2022-03-30 12:37:10', NULL),
(3, 1, 'Laptop', 6, 2400, '2022', 'Mar', '2022-03-30 14:37:31', NULL),
(4, 3, 'Laptop', 14, 32000, '2022', 'Mar', '2022-03-31 11:54:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maintenances`
--

CREATE TABLE `maintenances` (
  `id` int(11) NOT NULL,
  `woreda` int(11) NOT NULL,
  `desktop` int(11) NOT NULL DEFAULT 0,
  `printer` int(11) DEFAULT 0,
  `laptop` int(11) NOT NULL DEFAULT 0,
  `photocopier` int(11) NOT NULL DEFAULT 0,
  `fax` int(11) NOT NULL DEFAULT 0,
  `scanner` int(11) NOT NULL DEFAULT 0,
  `switch` int(11) NOT NULL DEFAULT 0,
  `projector` int(11) NOT NULL DEFAULT 0,
  `server` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `month` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `maintenances`
--

INSERT INTO `maintenances` (`id`, `woreda`, `desktop`, `printer`, `laptop`, `photocopier`, `fax`, `scanner`, `switch`, `projector`, `server`, `price`, `year`, `month`, `created`, `modified`) VALUES
(4, 29, 4, 1, 2, 0, 0, 0, 0, 0, 0, 4186, 2022, 'Mar', '2022-04-01 22:59:45', NULL),
(5, 5, 16, 9, 11, 0, 0, 0, 0, 0, 0, 32400, 2022, 'Mar', '2022-04-01 23:03:11', NULL),
(7, 15, 73, 31, 40, 11, 0, 0, 0, 0, 0, 77500, 2022, 'Mar', '2022-04-01 23:30:11', NULL),
(8, 12, 40, 11, 6, 2, 0, 0, 0, 0, 0, 14950, 2022, 'Mar', '2022-04-01 23:31:45', NULL),
(9, 4, 81, 6, 7, 0, 0, 0, 0, 0, 0, 17600, 2022, 'Mar', '2022-04-01 23:33:15', NULL),
(10, 13, 61, 16, 10, 2, 0, 0, 10, 0, 0, 74500, 2022, 'Mar', '2022-04-01 23:34:23', NULL),
(11, 8, 21, 9, 15, 0, 0, 0, 0, 0, 0, 26536, 2022, 'Mar', '2022-04-01 23:35:15', NULL),
(12, 23, 17, 1, 19, 1, 0, 0, 0, 0, 0, 72000, 2022, 'Mar', '2022-04-01 23:36:15', NULL),
(13, 1, 21, 4, 14, 3, 0, 0, 0, 0, 0, 63000, 2022, 'Mar', '2022-04-01 23:38:21', NULL),
(14, 18, 27, 5, 1, 2, 0, 0, 0, 0, 0, 17500, 2022, 'Mar', '2022-04-01 23:40:27', NULL),
(15, 26, 66, 37, 45, 3, 0, 3, 0, 0, 0, 68150, 2022, 'Mar', '2022-04-01 23:42:12', NULL),
(16, 27, 7, 1, 8, 1, 0, 0, 0, 0, 0, 8400, 2022, 'Mar', '2022-04-01 23:45:33', NULL),
(17, 24, 11, 7, 1, 0, 0, 0, 0, 0, 0, 9500, 2022, 'Mar', '2022-04-01 23:46:17', NULL),
(18, 3, 5, 5, 3, 0, 0, 0, 0, 0, 0, 11500, 2022, 'Mar', '2022-04-01 23:47:18', NULL),
(19, 14, 29, 1, 10, 0, 0, 0, 0, 0, 0, 16000, 2022, 'Mar', '2022-04-01 23:49:11', NULL),
(20, 16, 56, 38, 46, 16, 7, 4, 6, 7, 0, 82963, 2022, 'Mar', '2022-04-01 23:50:09', NULL),
(21, 7, 14, 9, 9, 0, 0, 1, 0, 1, 0, 27200, 2022, 'Mar', '2022-04-01 23:50:52', NULL),
(22, 6, 34, 19, 9, 5, 0, 0, 0, 0, 0, 23115, 2022, 'Mar', '2022-04-01 23:51:35', NULL),
(23, 17, 4, 7, 0, 0, 0, 0, 0, 0, 0, 4800, 2022, 'Mar', '2022-04-01 23:52:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `open_sources`
--

CREATE TABLE `open_sources` (
  `id` int(11) NOT NULL,
  `woreda` int(11) NOT NULL,
  `ams` int(11) NOT NULL DEFAULT 0,
  `ipm` int(11) NOT NULL DEFAULT 0,
  `teamv` int(11) NOT NULL DEFAULT 0,
  `jaws` int(11) NOT NULL DEFAULT 0,
  `faxaw` int(11) NOT NULL DEFAULT 0,
  `simu` int(11) NOT NULL DEFAULT 0,
  `dms` int(11) NOT NULL DEFAULT 0,
  `bsca` int(11) NOT NULL DEFAULT 0,
  `arkdb` int(11) NOT NULL DEFAULT 0,
  `ebcd` int(11) NOT NULL DEFAULT 0,
  `others` int(11) NOT NULL DEFAULT 0,
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `open_sources`
--

INSERT INTO `open_sources` (`id`, `woreda`, `ams`, `ipm`, `teamv`, `jaws`, `faxaw`, `simu`, `dms`, `bsca`, `arkdb`, `ebcd`, `others`, `year`, `month`) VALUES
(2, 29, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, '2022', 'Mar');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(11) NOT NULL,
  `woreda` int(11) NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sex` varchar(50) CHARACTER SET utf8 NOT NULL,
  `category` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `office` varchar(255) CHARACTER SET utf8 NOT NULL,
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `woreda`, `fullname`, `sex`, `category`, `type`, `office`, `year`, `month`, `created`, `modified`) VALUES
(1, 5, 'ንጉስ ቅጣው', 'ወንድ', 1, 'መንግሥት ሠራተኛ', 'ትምህርት ጽ/ቤት', '2022', 'Apr', '2022-04-01 16:40:07', NULL),
(2, 5, 'እየሩስ ሲሳይ', 'ሴት', 4, 'ተማሪ', 'ቪክትሪ ኮሌጅ', '2022', 'Apr', '2022-04-01 16:45:41', NULL),
(3, 5, 'ወይንሸት ዘነበ', 'ሴት', 1, 'መንግሥት ሠራተኛ', 'ትምህርት ጽ/ቤት', '2022', 'Apr', '2022-04-01 21:20:40', NULL),
(4, 5, 'ተ/ማርያም ጀማነህ', 'Male', 1, 'መንግሥት ሠራተኛ', 'ትምህርት ጽ/ቤት', '2022', 'Mar', '2022-04-01 21:56:01', NULL),
(6, 5, 'አበበች ጎሽሜ', 'Female', 1, 'መንግሥት ሠራተኛ', 'ትምህርት ጽ/ቤት', '2022', 'Mar', '2022-04-02 03:12:34', NULL),
(7, 5, 'ሚስጥር ወንደሰን', 'Female', 4, 'ተማሪ', 'ቪክትሪ ኮሌጅ', '2022', 'Apr', '2022-04-02 11:09:12', NULL),
(359, 12, 'ማሙዬ ሞገሴ', 'ወንድ', 1, 'መንግሥት ሠራተኛ', 'ጤና ጥበቃ ጽ/ቤት', '2022', 'Mar', '2022-04-02 16:11:48', NULL),
(360, 12, 'ዋጋዬ ሺፈራ', 'ሴት', 1, 'መንግሥት ሠራተኛ', 'ጤና ጥበቃ ጽ/ቤት', '2022', 'Mar', '2022-04-02 16:11:48', NULL),
(361, 12, 'Solomon Amdemariam', 'Male', 1, 'Employee', 'Health Office', '2022', 'Mar', '2022-04-02 16:11:48', NULL),
(362, 12, 'Shewafera Tilahun', 'Male', 1, 'Employee', 'Technic', '2022', 'Mar', '2022-04-02 16:11:48', NULL),
(363, 12, 'Ermias Belete', 'Male', 1, 'Employee', 'Technic', '2022', 'Mar', '2022-04-02 16:11:48', NULL),
(364, 12, 'Yitagesu Ababu', 'Male', 1, 'Employee', 'Technic', '2022', 'Mar', '2022-04-02 16:11:48', NULL),
(365, 12, 'Getaneh Zenebe', 'Male', 1, 'Employee', 'Technic', '2022', 'Mar', '2022-04-02 16:11:48', NULL),
(366, 12, 'Tigist Asmare', 'Female', 1, 'Employee', 'Technic', '2022', 'Mar', '2022-04-02 16:11:48', NULL),
(367, 12, 'Alemnesh Yehualashet', 'Female', 1, 'Employee', 'Technic', '2022', 'Mar', '2022-04-02 16:11:48', NULL),
(368, 12, 'Kasa Alem', 'Male', 1, 'Employee', 'Technic', '2022', 'Mar', '2022-04-02 16:11:48', NULL),
(369, 12, 'Menbere Temeche', 'Female', 1, 'Management', 'PP', '2022', 'Mar', '2022-04-02 16:11:48', NULL),
(370, 12, 'Hailye Tadesse', 'Male', 1, 'Employee', 'Agriculture', '2022', 'Mar', '2022-04-02 16:11:48', NULL),
(371, 12, 'Papa Tadesse', 'Female', 1, 'Student', 'Ginager Secondary School', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(372, 12, 'Abeselom Begashaw', 'Male', 1, 'Student', 'Ginager Primary School', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(373, 12, 'Nardos Bedilu', 'Female', 1, 'Student', 'Ginager Secondary School', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(374, 12, 'Mitu Habene', 'Female', 1, 'Student', 'Ginager Primary School', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(375, 12, 'Alemu Simegn', 'Male', 1, 'Employee', 'Ginager Primary School', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(376, 12, 'Dereje Getachew', 'Male', 1, 'Employee', 'Investment Office', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(377, 12, 'Derese Eshete', 'Male', 1, 'Employee', 'Health Office', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(378, 12, 'Demsew', 'Male', 1, 'Management', 'Health Office', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(379, 12, 'Daniel Nigusie', 'Male', 1, 'Employee', 'Health Office', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(380, 12, 'Alegnta Belete', 'Female', 1, 'Employee', 'Public Grievance', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(381, 12, 'Tilaye Yosef', 'Male', 1, 'Community', 'Merchant', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(382, 12, 'Yeshanew Ayele', 'Male', 1, 'Community', 'Merchant', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(383, 12, 'Bedilu Belay', 'Male', 1, 'Student', 'Ginager Secondary School', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(384, 12, 'Kalye Debebe', 'Female', 1, 'Student', 'Ginager Secondary School', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(385, 12, 'Furehiwot Awugchew', 'Female', 1, 'Student', 'Ginager Secondary School', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(386, 12, 'Tibeb Haileyes', 'Male', 1, 'Student', 'Ginager Secondary School', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(387, 12, 'Tadesse Haile', 'Male', 1, 'Employee', 'Coopration Office', '2022', 'Mar', '2022-04-02 16:11:49', NULL),
(388, 12, 'Tewachew Amsale', 'Male', 1, 'Employee', 'Health Office', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(389, 12, 'Wegayehu Sileshi', 'Male', 1, 'Employee', 'Administration Office', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(390, 12, 'Alegnta Belay', 'Female', 1, 'Employee', 'Agriculture', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(391, 12, 'Mohamed Seid', 'Male', 1, 'Teacher', 'Tidesh Secondary School', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(392, 12, 'Yifru Debebe', 'Male', 1, 'Teacher', 'Civil Service', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(393, 12, 'Gezahegn Negese', 'Female', 1, 'Employee', 'Civil Service', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(394, 12, 'Tadesse Sahledingel', 'Male', 1, 'Employee', 'Agriculture', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(395, 12, 'T/Michael Ergete', 'Female', 1, 'Employee', 'Women and Childrn Office', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(396, 12, 'Minit Fikru', 'Female', 1, 'Employee', 'Afe Gubae', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(397, 12, 'Helen Shewangizaw', 'Female', 1, 'Student', 'University', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(398, 12, 'Demsew Tadesse', 'Male', 1, 'Management', 'Health Office', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(399, 12, 'Samuel Endale', 'Male', 1, 'Employee', 'Health Office', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(400, 12, 'Sileshi Alemu', 'Male', 1, 'Employee', 'Animal Resource', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(401, 12, 'Sileshi Tadesse', 'Male', 1, 'Employee', 'Land Administration', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(402, 12, 'Asegidew Banjaw', 'Male', 1, 'Employee', 'Land Administration', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(403, 12, 'Tigabie lakew', 'Male', 1, 'Management', 'Communication Office', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(404, 12, 'Tayework Birhanu', 'Male', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(405, 12, 'Aweke Getaneh', 'Male', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(406, 12, 'Mekdes Dagne', 'Female', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(407, 12, 'Etenesh Kitaw', 'Female', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(408, 12, 'Hebtewold teklu', 'Male', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(409, 12, 'Tigist Zebene', 'Female', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:50', NULL),
(410, 12, 'Tsedey Demsie', 'Female', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(411, 12, 'Mesfin Yeshewaynet', 'Male', 1, 'Employee', 'Coopration Office', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(412, 12, 'Tadesse Belete', 'Male', 1, 'Employee', 'Coopration Office', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(413, 12, 'Mulatu Fikire', 'Male', 1, 'Employee', 'Revenues Office', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(414, 12, 'Tigist Bekele', 'Female', 1, 'Employee', 'Administration Office', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(415, 12, 'Getie Getachew', 'Female', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(416, 12, 'Mestawet Tesfaye', 'Female', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(417, 12, 'Merete Gelagile', 'Male', 1, 'Management', 'Youth league', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(418, 12, 'Serkalem Minda', 'Female', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(419, 12, 'Kokobe Wubshet', 'Female', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(420, 12, 'Hana Wubshet', 'Female', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(421, 12, 'Erkua Engidawork', 'Female', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(422, 12, 'Weynareg Demsew', 'Female', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(423, 12, 'Weynshet Kebede', 'Female', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(424, 12, 'Aster Haile', 'Female', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(425, 12, 'Beletu Wedere', 'Female', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(426, 12, 'Aynye Atilaw', 'Female', 1, 'Student', 'College', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(427, 12, 'Solomon Teklu', 'Male', 1, 'Employee', 'Health Office', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(428, 12, 'Senait Goshime', 'Female', 1, 'Employee', 'Civil Service', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(429, 12, 'Fana Alemu', 'Female', 1, 'Employee', 'Civil Service', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(430, 12, 'Azmeraw Teklu', 'Male', 1, 'Employee', 'Health Office', '2022', 'Mar', '2022-04-02 16:11:51', NULL),
(431, 12, 'Tegegn dejen', 'Male', 1, 'Employee', 'Work and Training Office', '2022', 'Mar', '2022-04-02 16:11:52', NULL),
(432, 12, 'Mebratie G/Medhin', 'Female', 1, 'Employee', 'Investment Office', '2022', 'Mar', '2022-04-02 16:11:52', NULL),
(433, 12, 'Asegid Tefera', 'Male', 1, 'Teacher', 'Ginager Primary School', '2022', 'Mar', '2022-04-02 16:11:52', NULL),
(434, 12, 'Getnet Tegafaw', 'Male', 1, 'Teacher', 'Ginager Primary School', '2022', 'Mar', '2022-04-02 16:11:52', NULL),
(435, 12, 'Belayneh Bizuneh', 'Male', 1, 'Teacher', 'Ginager Secondary School', '2022', 'Mar', '2022-04-02 16:11:52', NULL),
(436, 12, 'Birze Ketema', 'Female', 1, 'Teacher', 'Ginager Secondary School', '2022', 'Mar', '2022-04-02 16:11:52', NULL),
(437, 12, 'Mikreselassie Girma', 'Male', 1, 'Employee', 'Health Office', '2022', 'Mar', '2022-04-02 16:11:52', NULL),
(438, 12, 'Desta Tirfe', 'Female', 1, 'Employee', 'Health Office', '2022', 'Mar', '2022-04-02 16:11:52', NULL),
(439, 12, 'Abebe Bayu', 'Male', 1, 'Management', 'PP', '2022', 'Mar', '2022-04-02 16:11:52', NULL),
(440, 12, 'Tesfaye Worku', 'Male', 1, 'Management', 'Youth league', '2022', 'Mar', '2022-04-02 16:11:52', NULL),
(441, 12, 'Kokobe Nigatu', 'Female', 1, 'Management', 'Culture and Tourism', '2022', 'Mar', '2022-04-02 16:11:52', NULL),
(442, 12, 'Kidist Goshime', 'Female', 1, 'Employee', 'Administration Office', '2022', 'Mar', '2022-04-02 16:11:52', NULL),
(443, 12, 'Lamrot Fantahun', 'Female', 1, 'Employee', 'Administration Office', '2022', 'Mar', '2022-04-02 16:11:52', NULL),
(444, 12, 'Beletu Degefu', 'Female', 1, 'Management', 'PP', '2022', 'Mar', '2022-04-02 16:11:52', NULL),
(445, 12, 'Dimru Belaygizaw', 'Male', 2, '', 'Court', '2023', 'Apr', '2022-04-02 16:11:52', NULL),
(446, 12, 'Belay Wesene', 'Male', 2, '', 'Justice office', '2024', 'May', '2022-04-02 16:11:52', NULL),
(447, 12, 'Yifru Abebe', 'Male', 2, '', 'Civil Service', '2025', 'Jun', '2022-04-02 16:11:52', NULL),
(448, 12, 'Gezashign Negese', 'Female', 2, '', 'Civil Service', '2026', 'Jul', '2022-04-02 16:11:52', NULL),
(449, 12, 'Marta Sidelel', 'Female', 3, '', 'Trade Office', '2036', 'May', '2022-04-02 16:11:52', NULL),
(450, 12, 'Kidist Nigusie', 'Female', 3, '', 'Agriculture', '2037', 'Jun', '2022-04-02 16:11:53', NULL),
(451, 12, 'Tenagne Wendiye', 'Female', 4, '', 'College', '2038', 'Jul', '2022-04-02 16:11:53', NULL),
(452, 12, 'Askale Mulat', 'Female', 4, '', 'College', '2039', 'Aug', '2022-04-02 16:11:53', NULL),
(453, 12, 'Tigist Lakew', 'Female', 4, '', 'College', '2040', 'Sep', '2022-04-02 16:11:53', NULL),
(454, 12, 'Masresha Kefyalew', 'Male', 4, '', 'College', '2041', 'Oct', '2022-04-02 16:11:53', NULL),
(455, 12, 'Akale Sigegn', 'Male', 4, '', 'College', '2042', 'Nov', '2022-04-02 16:11:53', NULL),
(456, 12, 'Habtewold Teklu', 'Male', 4, '', 'College', '2043', 'Dec', '2022-04-02 16:11:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `training_categories`
--

CREATE TABLE `training_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `training_categories`
--

INSERT INTO `training_categories` (`id`, `name`, `description`) VALUES
(1, 'መሠረታዊ ኮምፒዩተር', 'Basic Computer training that will be provided for employees and other community members to empower them in the daily usage of computer technologies.'),
(2, 'ሙያ ማሻሻያ (Advanced)', 'Advanced computer training for ICT related personnel to help them upgrade their skill and knowledge '),
(3, 'ቅድመ ስራ', 'Induction training that will be provided for new employees before they started work about how they will utilize computer technologies.'),
(4, 'ትብብር እና ኢንተርሺፕ', 'copperative training for college and university students');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `woreda` int(11) NOT NULL,
  `position` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `sex`, `woreda`, `position`, `username`, `phone`, `email`, `password`, `created`) VALUES
(1, 'Yohannes', 'Meshesha', 'Male', 1, 'Communication and IT', 'abatu21', '092 093 6560', 'sunylife21@gmail.com', '$2y$10$AYnbF3al.hfghvAYjnHOputHceFlcrVWWEYbh4JklMqdPQWBDTAjK', '2022-02-01 10:30:47'),
(3, 'Abebe', 'Kebede', 'Male', 28, 'System administrator', 'abebeke', '091 336 7190', 'abebek@gmail.com', '123456', '2022-03-31 15:34:21'),
(4, 'ተስፋሁን', 'እድሉ', 'Male', 26, 'ቡድን መሪ', 'tesfahune', '011 681 1345', 'sunylife21@gmail.com', '123456', '2022-03-31 17:36:34'),
(5, 'Lidiya', 'Asefa', 'Female', 1, 'Communication and IT', 'lidiya', '022 045 6702', 'lidiyaasefa24@gmail.com', '123456', '2022-03-31 17:39:04'),
(6, 'Zelalem', 'Desta', 'Male', 3, 'Communication and IT', 'zelamed', '091 232 4566', 'sunylife2120@gmail.com', '$2y$10$F6trN13Bxf3mABPrlkKCx.we1uv.ZGKys1CWlhP3D.ZnwL7lr0xUO', '2022-03-31 21:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` int(11) NOT NULL,
  `woreda` int(11) NOT NULL,
  `unavailable` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `developed` int(11) DEFAULT NULL,
  `disrupted` int(11) DEFAULT NULL,
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `woreda`, `unavailable`, `active`, `developed`, `disrupted`, `year`, `month`) VALUES
(1, 1, 1, 0, 0, 0, '2022', 'Mar'),
(4, 28, 1, 0, 0, 0, '2022', 'Mar');

-- --------------------------------------------------------

--
-- Table structure for table `woredas`
--

CREATE TABLE `woredas` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `woredas`
--

INSERT INTO `woredas` (`id`, `name`, `address`, `phone`, `type`) VALUES
(1, 'ሀገረ ማርያም', 'ሾላ ገበያ', '011 688 1234', 'ወረዳ'),
(3, 'መርሐቤቴ', 'ዓለም ከተማ', '011 132 0763', 'ወረዳ'),
(4, 'ባሶና ወራና', 'ደብረ ብርሃን', ' ', 'ወረዳ'),
(5, 'አንጎለላ ጠራ', 'ጫጫ', ' ', 'ወረዳ'),
(6, 'ሲያደብርና ዋዩ', 'ደነባ', ' ', 'ወረዳ'),
(7, 'ሞረትና ጅሩ', 'እነዋሪ', ' ', 'ወረዳ'),
(8, 'እንሳሮ', 'ለሚ', '011 131 2235', 'ወረዳ'),
(12, 'አሳግርት', 'ጊናገር', '011 686 2345', 'ወረዳ'),
(13, 'በረኸት', 'መጥተህ ብላ', '022 045 6702', 'ወረዳ'),
(14, 'ምንጃር ሸንኮራ', 'አረርቲ', '022 123 0908', 'ወረዳ'),
(15, 'አንኮበር', 'ጎረቤላ', '011 688 5678', 'ወረዳ'),
(16, 'ሞጃና ወደራ', 'ሰላ ድንጋይ', ' ', 'ወረዳ'),
(17, 'ጣርማበር', 'ደብረ ሲና', ' ', 'ወረዳ'),
(18, 'ቀወት', 'ሸዋሮቢት', ' ', 'ወረዳ'),
(19, 'ሸዋሮቢት', 'ሸዋሮቢት', ' ', 'ከተማ'),
(20, 'ኤፍራታና ግድም', 'አጣዬ', ' ', 'ወረዳ'),
(21, 'አጣዬ', 'አጣዬ', '00', 'ከተማ'),
(22, 'አንፆኪያ ገምዛ', 'መኮይ', ' ', 'ወረዳ'),
(23, 'ግሼራቤል', 'ራቤል', ' ', 'ወረዳ'),
(24, 'መንዝ ማማ', 'ሞላሌ', ' ', 'ወረዳ'),
(25, 'መንዝ ላሎ', 'ወገሬ', ' ', 'ወረዳ'),
(26, 'መንዝ ጌራ', 'መህል ሜዳ', ' ', 'ወረዳ'),
(27, 'መንዝ ቀያ', 'ዘመሮ', ' ', 'ወረዳ'),
(28, 'መህል ሜዳ', 'መህል ሜዳ', ' ', 'ከተማ'),
(29, 'ዓለም ከተማ', 'ዓለም ከተማ', ' ', 'ከተማ'),
(30, 'ሚዳ ወረሞ', 'መራኛ', ' ', 'ወረዳ'),
(31, 'አረርቲ', 'አረርቲ', ' ', 'ከተማ'),
(32, 'ሞላሌ', 'ሞላሌ', ' ', 'ከተማ'),
(33, 'እነዋሪ', 'እነዋሪ', ' ', 'ከተማ'),
(34, 'ደብረ ሲና', 'ደብረ ሲና', ' ', 'ከተማ'),
(35, 'ቡልጋ', 'ቡልጋ', ' ', 'ከተማ'),
(36, 'ሰሜን ሸዋ ዞን', 'ደብረ ብርሃን', '011 681 1215', '2022-04-01 16:39:14'),
(37, 'አብ', 'አብ', '09', 'ወረዳ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `woreda` (`woreda`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `woreda` (`woreda`);

--
-- Indexes for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `woredas_ibfk_1` (`woreda`);

--
-- Indexes for table `open_sources`
--
ALTER TABLE `open_sources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `woreda` (`woreda`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_ibfk_1` (`woreda`),
  ADD KEY `training_fbk2` (`category`);

--
-- Indexes for table `training_categories`
--
ALTER TABLE `training_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_ibfk_1` (`woreda`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `woreda` (`woreda`);

--
-- Indexes for table `woredas`
--
ALTER TABLE `woredas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `open_sources`
--
ALTER TABLE `open_sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=457;

--
-- AUTO_INCREMENT for table `training_categories`
--
ALTER TABLE `training_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `woredas`
--
ALTER TABLE `woredas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apps`
--
ALTER TABLE `apps`
  ADD CONSTRAINT `apps_ibfk_1` FOREIGN KEY (`woreda`) REFERENCES `woredas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD CONSTRAINT `woredas_ibfk_1` FOREIGN KEY (`woreda`) REFERENCES `woredas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `open_sources`
--
ALTER TABLE `open_sources`
  ADD CONSTRAINT `open_sources_ibfk_1` FOREIGN KEY (`woreda`) REFERENCES `woredas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `training_fbk2` FOREIGN KEY (`category`) REFERENCES `training_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trainings_ibfk_1` FOREIGN KEY (`woreda`) REFERENCES `woredas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`woreda`) REFERENCES `woredas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `websites`
--
ALTER TABLE `websites`
  ADD CONSTRAINT `websites_ibfk_1` FOREIGN KEY (`woreda`) REFERENCES `woredas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
