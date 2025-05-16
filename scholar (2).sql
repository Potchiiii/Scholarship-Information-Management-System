-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2025 at 06:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scholar`
--

-- --------------------------------------------------------

--
-- Table structure for table `buletin`
--

CREATE TABLE `buletin` (
  `buletID` int(11) NOT NULL,
  `descriptions` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `visiblity` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buletin`
--

INSERT INTO `buletin` (`buletID`, `descriptions`, `type`, `visiblity`, `date_created`) VALUES
(17, 'May Ayuda si Olaso the Ayuda Gods', 'Announcement', 1, '2025-01-05 14:56:44'),
(18, 'Wala na makain', 'Important', 1, '2025-01-05 23:38:02'),
(19, 'Tang ina mo mamatay ka nalang para may kaibigan kang dadalaw o di kaya mabuhay ka nalang para patay ka araw-araw.', 'Announcement', 1, '2025-01-05 23:40:04'),
(20, 'Miss ko na siya tang ina mo ', 'Announcement', 1, '2025-01-05 23:40:19'),
(21, 'Trashhhhhhhhhhhhhhhhhh', 'Important', 1, '2025-01-05 23:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `daily_scholarship`
--

CREATE TABLE `daily_scholarship` (
  `dailyscholarshipID` int(11) NOT NULL,
  `scholarshipID` int(11) NOT NULL,
  `sectioned_date` varchar(20) NOT NULL,
  `limit_counter` int(20) NOT NULL,
  `full_status` int(20) NOT NULL,
  `limits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daily_scholarship`
--

INSERT INTO `daily_scholarship` (`dailyscholarshipID`, `scholarshipID`, `sectioned_date`, `limit_counter`, `full_status`, `limits`) VALUES
(162, 29, '2025-01-09', 0, 0, 1),
(163, 29, '2025-01-10', 0, 0, 1),
(164, 29, '2025-01-11', 0, 0, 1),
(165, 29, '2025-01-12', 0, 0, 1),
(166, 29, '2025-01-13', 0, 0, 1),
(167, 29, '2025-01-14', 0, 0, 1),
(168, 29, '2025-01-15', 0, 0, 1),
(169, 29, '2025-01-16', 0, 0, 1),
(170, 29, '2025-01-17', 0, 0, 1),
(171, 29, '2025-01-18', 0, 0, 1),
(172, 29, '2025-01-19', 0, 0, 1),
(173, 29, '2025-01-20', 0, 0, 1),
(174, 29, '2025-01-21', 0, 0, 1),
(175, 29, '2025-01-22', 0, 0, 1),
(176, 29, '2025-01-23', 0, 0, 1),
(177, 1, '2025-02-26', 0, 0, 1),
(178, 1, '2025-02-27', 0, 0, 1),
(179, 1, '2025-02-28', 0, 0, 1),
(180, 1, '2025-03-01', 0, 0, 1),
(181, 1, '2025-03-02', 0, 0, 1),
(182, 1, '2025-03-03', 0, 0, 1),
(183, 1, '2025-03-04', 0, 0, 1),
(184, 1, '2025-03-05', 1, 1, 1),
(203, 3, '2025-03-08', 0, 0, 1),
(204, 3, '2025-03-09', 1, 1, 1),
(205, 3, '2025-03-10', 1, 1, 1),
(206, 3, '2025-03-11', 1, 1, 1),
(207, 3, '2025-03-12', 1, 1, 1),
(208, 3, '2025-03-13', 1, 1, 1),
(209, 3, '2025-03-14', 1, 1, 1),
(210, 3, '2025-03-15', 0, 0, 1),
(211, 3, '2025-03-16', 0, 0, 1),
(212, 3, '2025-03-17', 0, 0, 1),
(213, 3, '2025-03-18', 1, 1, 1),
(214, 3, '2025-03-19', 1, 1, 1),
(215, 3, '2025-03-20', 0, 0, 1),
(216, 3, '2025-03-21', 0, 0, 1),
(217, 3, '2025-03-22', 0, 0, 1),
(218, 3, '2025-03-23', 0, 0, 1),
(219, 3, '2025-03-24', 0, 0, 1),
(220, 3, '2025-03-25', 0, 0, 1),
(221, 3, '2025-03-26', 0, 0, 1),
(222, 3, '2025-03-27', 0, 0, 1),
(223, 3, '2025-03-28', 0, 0, 1),
(224, 3, '2025-03-29', 0, 0, 1),
(225, 3, '2025-03-30', 0, 0, 1),
(226, 3, '2025-03-31', 0, 0, 1),
(227, 3, '2025-04-01', 0, 0, 1),
(228, 3, '2025-04-02', 0, 0, 1),
(229, 3, '2025-04-03', 0, 0, 1),
(230, 3, '2025-04-04', 0, 0, 1),
(231, 3, '2025-04-05', 0, 0, 1),
(232, 3, '2025-04-06', 0, 0, 1),
(233, 3, '2025-04-07', 0, 0, 1),
(234, 3, '2025-04-08', 0, 0, 1),
(235, 3, '2025-04-09', 0, 0, 1),
(236, 3, '2025-04-10', 0, 0, 1),
(237, 3, '2025-04-11', 0, 0, 1),
(238, 3, '2025-04-12', 0, 0, 1),
(239, 3, '2025-04-13', 0, 0, 1),
(240, 3, '2025-04-14', 0, 0, 1),
(241, 3, '2025-04-15', 0, 0, 1),
(242, 3, '2025-04-16', 0, 0, 1),
(243, 3, '2025-04-17', 0, 0, 1),
(244, 3, '2025-04-18', 0, 0, 1),
(245, 3, '2025-04-19', 0, 0, 1),
(246, 3, '2025-04-20', 0, 0, 1),
(247, 3, '2025-04-21', 0, 0, 1),
(248, 3, '2025-04-22', 0, 0, 1),
(249, 3, '2025-04-23', 0, 0, 1),
(250, 3, '2025-04-24', 0, 0, 1),
(251, 3, '2025-04-25', 0, 0, 1),
(252, 3, '2025-04-26', 0, 0, 1),
(253, 3, '2025-04-27', 0, 0, 1),
(254, 3, '2025-04-28', 0, 0, 1),
(255, 3, '2025-04-29', 0, 0, 1),
(256, 3, '2025-04-30', 0, 0, 1),
(257, 3, '2025-05-01', 0, 0, 1),
(258, 3, '2025-05-02', 0, 0, 1),
(259, 3, '2025-05-03', 0, 0, 1),
(260, 3, '2025-05-04', 0, 0, 1),
(261, 3, '2025-05-05', 0, 0, 1),
(262, 3, '2025-05-06', 0, 0, 1),
(263, 3, '2025-05-07', 0, 0, 1),
(264, 3, '2025-05-08', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `pubID` int(11) NOT NULL,
  `banner` varchar(100) NOT NULL,
  `titles` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`pubID`, `banner`, `titles`, `description`) VALUES
(6, 'LCCAP_DIGI_PROD_492ef4bbda.png', 'Pubmat 0', '<p><span style=\"font-size: 15px;\">Event Details: Time: 9:00 AM - 5:00 PM Activities: Campus Tours Workshops and Demonstrations Student Organization Exhibits Admission Talks Contact Information: Email:'),
(7, 'bgnihalon.jpg', 'Pubmat 1', '<p>asdasdsadasdasdadasdasd fws gfg sv</p>'),
(8, 'autonomous_agtech_robot.webp', 'Pubmat 2', '<p>asdasdasdasdad</p>');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

CREATE TABLE `scholarship` (
  `scholarshipID` int(11) NOT NULL,
  `semesterID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_start` varchar(28) NOT NULL,
  `date_end` varchar(28) NOT NULL,
  `description` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `scholarID` varchar(28) NOT NULL,
  `limitation` int(28) NOT NULL,
  `ctrl_status` int(11) NOT NULL DEFAULT 0,
  `reinburment` varchar(28) NOT NULL,
  `reimbursement_time` enum('AM','PM') DEFAULT 'AM',
  `sector` varchar(50) NOT NULL DEFAULT 'Government'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`scholarshipID`, `semesterID`, `name`, `date_start`, `date_end`, `description`, `scholarID`, `limitation`, `ctrl_status`, `reinburment`, `reimbursement_time`, `sector`) VALUES
(1, 6, 'CHED Scholarship', '2025-02-26', '2025-03-05', '<p>CHED SCHOLARSHIP 2025</p>', '2025-04-26T05:08', 10, 1, '2025-04-26T05:08', 'AM', 'Government'),
(3, 7, 'BBM', '2025-03-08', '2025-05-08', '<p>bAGONG pILIPINAS</p>', '2025-06-24T14:23', 50, 1, '2025-04-10', 'AM', 'Government'),
(4, 6, 'aasdasd', '2025-03-10', '2025-03-10', '<p>asdadasd</p>', '2025-03-19T15:22', 78, 0, '2025-03-19T15:22', 'AM', 'Government'),
(5, 6, 'asdadasdasd', '2025-03-10', '2025-03-10', '<p>asdasda</p>', '2025-03-20T15:25', 23, 0, '2025-03-20T15:25', 'AM', 'Government'),
(6, 6, 'BBMasda', '2025-03-14', '2025-03-24', '<p>asdasda</p>', '2025-03-29T03:25', 68, 0, '2025-03-29T03:25', 'AM', 'Government');

-- --------------------------------------------------------

--
-- Table structure for table `scholarshipapplications_docs`
--

CREATE TABLE `scholarshipapplications_docs` (
  `socdocsID` int(11) NOT NULL,
  `applicationsID` int(11) NOT NULL,
  `document_name` varchar(100) NOT NULL,
  `document_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_applications`
--

CREATE TABLE `scholarship_applications` (
  `applicationsID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `dailyscholarshipID` int(11) NOT NULL,
  `date_apply` timestamp NOT NULL DEFAULT current_timestamp(),
  `application_status` int(11) DEFAULT 0,
  `scholarship_refences` varchar(88) NOT NULL,
  `denial_feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarship_applications`
--

INSERT INTO `scholarship_applications` (`applicationsID`, `userID`, `dailyscholarshipID`, `date_apply`, `application_status`, `scholarship_refences`, `denial_feedback`) VALUES
(1, 34, 213, '2025-03-10 06:03:57', 1, 'SCHOLAR5158REF2313', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_docs`
--

CREATE TABLE `scholarship_docs` (
  `docsID` int(11) NOT NULL,
  `scholarship` int(11) NOT NULL,
  `document_name` varchar(100) NOT NULL,
  `document` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarship_docs`
--

INSERT INTO `scholarship_docs` (`docsID`, `scholarship`, `document_name`, `document`) VALUES
(20, 3, '', '11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_stipends`
--

CREATE TABLE `scholarship_stipends` (
  `stipend_id` int(11) NOT NULL,
  `scholarship_id` int(11) NOT NULL,
  `release_date` datetime NOT NULL,
  `release_venue` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `requirements` text DEFAULT NULL,
  `status` enum('pending','ongoing','completed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarship_stipends`
--

INSERT INTO `scholarship_stipends` (`stipend_id`, `scholarship_id`, `release_date`, `release_venue`, `amount`, `requirements`, `status`, `created_at`) VALUES
(1, 3, '2025-06-15 07:43:00', 'Southcom ', 2000.00, '', 'pending', '2025-03-14 17:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semesterID` int(11) NOT NULL,
  `sememestrName` varchar(88) NOT NULL,
  `date_start` varchar(20) NOT NULL,
  `date_end` varchar(20) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semesterID`, `sememestrName`, `date_start`, `date_end`, `flag`) VALUES
(6, '2nd Semester', '2025-01-09', '2025-01-25', 0),
(7, '1st Semester', '2025-02-28', '2025-07-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settingsID` int(11) NOT NULL,
  `Logo` varchar(100) NOT NULL DEFAULT 'logo.png',
  `Name` varchar(1000) NOT NULL,
  `email` varchar(28) NOT NULL,
  `contact` varchar(80) NOT NULL,
  `address` varchar(180) NOT NULL,
  `color` varchar(28) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `text_color` varchar(28) NOT NULL,
  `abbreviation` varchar(28) NOT NULL,
  `hero_title` varchar(255) DEFAULT 'Transform Your Future with',
  `hero_subtitle` text DEFAULT 'Access life-changing scholarship opportunities and take control of your academic journey at.',
  `navbar_color` varchar(50) DEFAULT NULL,
  `navbar_font_color` varchar(50) DEFAULT '#2d3436'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settingsID`, `Logo`, `Name`, `email`, `contact`, `address`, `color`, `description`, `text_color`, `abbreviation`, `hero_title`, `hero_subtitle`, `navbar_color`, `navbar_font_color`) VALUES
(1, 'Western_Mindanao_State_University.png', 'Western Mindanao State University', 'westernmsu@gmail.com', '09358250452', 'Normal Rd, Baliwasan, Zamboanga City', '#de4a4a', 'Mission\r\nTo empower deserving students by providing equitable access to quality education through a transparent, inclusive, and efficient scholarship system that fosters academic excellence, personal growth, and community development.\r\n\r\n\r\nVision\r\nTo be a leading university scholarship system recognized for bridging educational opportunities, nurturing talent, and contributing to the development of future leaders who drive positive change in their communities and beyond.', '#ffffff', 'WMSU', 'Transform Your Future with WMSU Scholarship ', 'Access life-changing scholarship opportunities and take control of your academic journey at Western Mindanao State University', '#c74343', '#ffffff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `studentID` varchar(88) NOT NULL,
  `profile` varchar(88) NOT NULL DEFAULT 'logo.png',
  `cor` varchar(88) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `code` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `roles` int(11) NOT NULL DEFAULT 3,
  `account_verifyer` int(11) NOT NULL DEFAULT 0,
  `created_account` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `studentID`, `profile`, `cor`, `first_name`, `last_name`, `address`, `contact`, `email`, `password`, `code`, `status`, `roles`, `account_verifyer`, `created_account`) VALUES
(16, '00000000', 'logo.png', NULL, 'SIMS', 'ADMINISTATOR', 'Sinunuc Zamboanga City', '09358250452', 'administrator@gmail.com', '$2y$10$ngN2zU9egBLRO60nIq0VYeFsOtgFICPJB6xaqyHHUstTE0HBy.0Re', 0, 'verified', 1, 0, '2024-09-26 02:13:38'),
(32, '762934702384', 'logo.png', NULL, 'Atty', 'Escudero', '', '', 'argonfernando453@gmail.com', '$2y$10$jZOkzUUqnnAtw8wkjhHLueTpeJqF3RhF5JWb3EvXTDzLapFidVFlm', 189514, 'notverified', 3, 0, '2024-12-13 06:51:11'),
(33, '2021-00657', '0c8740e2-bd4a-400c-b9fe-ea3e0624ce4d.jpg', NULL, 'Ahmidserhan', 'Halon', 'Southcom Villages', '09917263899', 'halonahmidserhan@gmail.com', '$2y$10$3K3H5Kzzldx56XQCRRYDXenj8i7HFwK3LnRmQPW46hhzsIx40NdxC', 0, 'verified', 1, 0, '2024-12-25 08:59:43'),
(34, '2021-78945', '0c8740e2-bd4a-400c-b9fe-ea3e0624ce4d.jpg', NULL, 'Niiga', 'Higga', '', '', 'kmking023@gmail.com', '$2y$10$etV/J5qaQ5diEvoBgkYnZeSZOSgQX9bC6Y9ZgdYwVRnIW6JeDkIpG', 0, 'verified', 3, 1, '2025-01-03 15:15:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buletin`
--
ALTER TABLE `buletin`
  ADD PRIMARY KEY (`buletID`);

--
-- Indexes for table `daily_scholarship`
--
ALTER TABLE `daily_scholarship`
  ADD PRIMARY KEY (`dailyscholarshipID`,`scholarshipID`),
  ADD KEY `fkfkscholarship` (`scholarshipID`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`pubID`);

--
-- Indexes for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD PRIMARY KEY (`scholarshipID`,`semesterID`),
  ADD KEY `fkscholarship` (`semesterID`);

--
-- Indexes for table `scholarshipapplications_docs`
--
ALTER TABLE `scholarshipapplications_docs`
  ADD PRIMARY KEY (`socdocsID`,`applicationsID`),
  ADD KEY `fkappdocs` (`applicationsID`);

--
-- Indexes for table `scholarship_applications`
--
ALTER TABLE `scholarship_applications`
  ADD PRIMARY KEY (`applicationsID`,`userID`,`dailyscholarshipID`),
  ADD KEY `fkscholarapp` (`userID`),
  ADD KEY `fkscholarapp1` (`dailyscholarshipID`);

--
-- Indexes for table `scholarship_docs`
--
ALTER TABLE `scholarship_docs`
  ADD PRIMARY KEY (`docsID`,`scholarship`),
  ADD KEY `fkdocs` (`scholarship`);

--
-- Indexes for table `scholarship_stipends`
--
ALTER TABLE `scholarship_stipends`
  ADD PRIMARY KEY (`stipend_id`),
  ADD KEY `scholarship_id` (`scholarship_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semesterID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settingsID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buletin`
--
ALTER TABLE `buletin`
  MODIFY `buletID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `daily_scholarship`
--
ALTER TABLE `daily_scholarship`
  MODIFY `dailyscholarshipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `pubID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scholarship`
--
ALTER TABLE `scholarship`
  MODIFY `scholarshipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `scholarshipapplications_docs`
--
ALTER TABLE `scholarshipapplications_docs`
  MODIFY `socdocsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `scholarship_applications`
--
ALTER TABLE `scholarship_applications`
  MODIFY `applicationsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scholarship_docs`
--
ALTER TABLE `scholarship_docs`
  MODIFY `docsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `scholarship_stipends`
--
ALTER TABLE `scholarship_stipends`
  MODIFY `stipend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semesterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settingsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_scholarship`
--
ALTER TABLE `daily_scholarship`
  ADD CONSTRAINT `fkfkscholarship` FOREIGN KEY (`scholarshipID`) REFERENCES `scholarship` (`scholarshipID`) ON DELETE CASCADE;

--
-- Constraints for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD CONSTRAINT `fkscholarship` FOREIGN KEY (`semesterID`) REFERENCES `semester` (`semesterID`) ON DELETE CASCADE;

--
-- Constraints for table `scholarshipapplications_docs`
--
ALTER TABLE `scholarshipapplications_docs`
  ADD CONSTRAINT `fkappdocs` FOREIGN KEY (`applicationsID`) REFERENCES `scholarship_applications` (`applicationsID`) ON DELETE CASCADE;

--
-- Constraints for table `scholarship_applications`
--
ALTER TABLE `scholarship_applications`
  ADD CONSTRAINT `fkscholarapp` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fkscholarapp1` FOREIGN KEY (`dailyscholarshipID`) REFERENCES `daily_scholarship` (`dailyscholarshipID`) ON DELETE CASCADE;

--
-- Constraints for table `scholarship_docs`
--
ALTER TABLE `scholarship_docs`
  ADD CONSTRAINT `fkdocs` FOREIGN KEY (`scholarship`) REFERENCES `scholarship` (`scholarshipID`) ON DELETE CASCADE;

--
-- Constraints for table `scholarship_stipends`
--
ALTER TABLE `scholarship_stipends`
  ADD CONSTRAINT `scholarship_stipends_ibfk_1` FOREIGN KEY (`scholarship_id`) REFERENCES `scholarship` (`scholarshipID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
