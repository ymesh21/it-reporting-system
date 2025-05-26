-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2022 at 02:19 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

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
  `year` varchar(4) NOT NULL,
  `month` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `type` enum('Desktop','Laptop','Printer','Photocopier','Scanner','Network Devices','Camera') NOT NULL,
  `amount` int(11) NOT NULL,
  `price` double NOT NULL,
  `year` varchar(4) NOT NULL,
  `month` varchar(15) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `month` varchar(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `year` varchar(4) NOT NULL,
  `month` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `fullname` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `category` int(11) UNSIGNED NOT NULL,
  `type` varchar(100) NOT NULL,
  `office` varchar(255) DEFAULT NULL,
  `year` varchar(4) NOT NULL,
  `month` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `woreda`, `fullname`, `sex`, `category`, `type`, `office`, `year`, `month`, `created`, `modified`) VALUES
(1, 36, 'አረጋኸኝ በዛብህ ከበደ', 'ወንድ', 3, 'መንግሥት ሠራተኛ', 'ዞን አስተዳደር ጽ/ቤት', '2022', 'Mar', '2022-04-01 16:40:07', NULL),
(2, 36, 'አንሙት አለነ ንጋት', 'ወንድ', 1, 'መንግሥት ሠራተኛ', 'ዞን አስተዳደር ጽ/ቤት', '2022', 'Mar', '2022-04-01 16:45:41', NULL),
(3, 3, 'Tsehay Geremew C', 'ሴት', 1, 'መምህር', 'Bahil', '2022', 'Mar', '2022-04-01 21:20:40', NULL),
(4, 24, 'Abebe Kebede', 'ሴት', 2, 'መምህር', 'Some office', '2022', 'Mar', '2022-04-01 21:56:01', NULL),
(6, 26, 'Henok Alemayehu', 'Male', 4, 'ተማሪ', 'College', '2022', 'Mar', '2022-04-02 03:12:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `training_categories`
--

CREATE TABLE `training_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `woreda` int(11) NOT NULL,
  `position` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `year` varchar(4) NOT NULL,
  `month` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `name` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
