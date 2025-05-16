-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 05:59 AM
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
(1, 1, '2025-03-15', 0, 0, 6),
(2, 1, '2025-03-16', 0, 0, 6),
(3, 1, '2025-03-17', 0, 0, 6),
(4, 1, '2025-03-18', 0, 0, 6),
(5, 1, '2025-03-19', 0, 0, 6),
(6, 1, '2025-03-20', 0, 0, 6),
(7, 1, '2025-03-21', 0, 0, 6),
(8, 1, '2025-03-22', 0, 0, 6),
(9, 1, '2025-03-23', 0, 0, 6),
(10, 1, '2025-03-24', 0, 0, 6),
(11, 1, '2025-03-25', 0, 0, 6),
(12, 1, '2025-03-26', 0, 0, 6),
(13, 1, '2025-03-27', 0, 0, 6),
(14, 1, '2025-03-28', 0, 0, 6),
(15, 1, '2025-03-29', 0, 0, 6),
(16, 1, '2025-03-30', 0, 0, 6),
(17, 1, '2025-03-31', 0, 0, 6),
(18, 1, '2025-04-01', 0, 0, 6),
(19, 1, '2025-04-02', 0, 0, 6),
(20, 1, '2025-04-03', 0, 0, 6),
(21, 1, '2025-04-04', 0, 0, 6),
(22, 1, '2025-04-05', 0, 0, 6),
(23, 1, '2025-04-06', 0, 0, 6),
(24, 1, '2025-04-07', 0, 0, 6),
(25, 1, '2025-04-08', 0, 0, 6),
(26, 1, '2025-04-09', 0, 0, 6),
(27, 1, '2025-04-10', 0, 0, 6),
(28, 1, '2025-04-11', 0, 0, 6),
(29, 1, '2025-04-12', 0, 0, 6),
(30, 1, '2025-04-13', 0, 0, 6),
(31, 1, '2025-04-14', 0, 0, 6),
(32, 1, '2025-04-15', 0, 0, 6),
(33, 1, '2025-04-16', 0, 0, 6),
(34, 1, '2025-04-17', 0, 0, 6),
(35, 1, '2025-04-18', 0, 0, 6),
(36, 1, '2025-04-19', 0, 0, 6),
(37, 1, '2025-04-20', 1, 0, 6),
(38, 1, '2025-04-21', 0, 0, 6),
(39, 1, '2025-04-22', 0, 0, 6),
(40, 1, '2025-04-23', 0, 0, 6),
(41, 1, '2025-04-24', 0, 0, 6),
(42, 1, '2025-04-25', 0, 0, 6),
(43, 1, '2025-04-26', 0, 0, 6),
(44, 1, '2025-04-27', 0, 0, 6),
(45, 1, '2025-04-28', 0, 0, 6),
(46, 1, '2025-04-29', 0, 0, 6),
(64, 3, '2025-03-16', 1, 0, 50),
(65, 3, '2025-03-17', 0, 0, 50),
(66, 3, '2025-03-18', 0, 0, 50),
(67, 3, '2025-03-19', 1, 0, 50),
(68, 4, '2025-03-20', 0, 0, 3),
(69, 4, '2025-03-21', 0, 0, 3),
(70, 4, '2025-03-22', 0, 0, 3),
(71, 4, '2025-03-23', 0, 0, 3),
(72, 4, '2025-03-24', 0, 0, 3),
(73, 4, '2025-03-25', 0, 0, 3),
(74, 5, '2025-04-13', 0, 0, 3),
(75, 5, '2025-04-14', 0, 0, 3),
(76, 5, '2025-04-15', 0, 0, 3),
(77, 5, '2025-04-16', 0, 0, 3),
(78, 5, '2025-04-17', 0, 0, 3),
(79, 5, '2025-04-18', 0, 0, 3),
(80, 5, '2025-04-19', 0, 0, 3),
(81, 5, '2025-04-20', 0, 0, 3),
(82, 5, '2025-04-21', 0, 0, 3),
(83, 5, '2025-04-22', 0, 0, 3),
(84, 5, '2025-04-23', 0, 0, 3),
(85, 5, '2025-04-24', 0, 0, 3),
(86, 5, '2025-04-25', 0, 0, 3),
(87, 5, '2025-04-26', 0, 0, 3),
(88, 5, '2025-04-27', 0, 0, 3),
(89, 5, '2025-04-28', 0, 0, 3),
(90, 5, '2025-04-29', 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `notification_logs`
--

CREATE TABLE `notification_logs` (
  `log_id` int(11) NOT NULL,
  `notification_type` varchar(50) NOT NULL,
  `scholarship_id` int(11) NOT NULL,
  `recipients_count` int(11) NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification_logs`
--

INSERT INTO `notification_logs` (`log_id`, `notification_type`, `scholarship_id`, `recipients_count`, `date_sent`) VALUES
(1, 'new_scholarship', 5, 0, '2025-04-20 00:15:39');

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
(1, 'DSWD-1024x536.webp', 'DSWD Scholarship Pro', '<p>List of Approved Applicants:<br>1. Doe, John</p><p>2. Hassan, Daud</p><p>3. Fe, Lyrra</p>');

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
  `sector` varchar(50) NOT NULL DEFAULT 'Government',
  `validity_period` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`scholarshipID`, `semesterID`, `name`, `date_start`, `date_end`, `description`, `scholarID`, `limitation`, `ctrl_status`, `reinburment`, `reimbursement_time`, `sector`, `validity_period`) VALUES
(1, 7, 'DSWD Scholarship 2025', '2025-03-15', '2025-04-29', '<p>DSWD Scholarship 2025</p>', 'PROG1220GRAM6648', 300, 1, '', 'AM', 'Government', '2025-04-30'),
(3, 7, 'DSWD Scholarship Pro Max', '2025-03-16', '2025-03-19', '<p>administrator@gmail.com</p>', 'PROG5851GRAM2331', 200, 1, '', 'AM', 'Government', '2025-03-19'),
(4, 6, 'alpha test', '2025-03-20', '2025-03-25', '<p>alpha test</p>', 'PROG9520GRAM7378', 20, 1, '', 'AM', 'Private', '2025-12-31'),
(5, 6, 'Ahmidserhan Halon', '2025-04-13', '2025-04-29', '<p>asdasdasd</p>', 'PROG6806GRAM3375', 55, 1, '', 'AM', 'Private', '2025-04-30');

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

--
-- Dumping data for table `scholarshipapplications_docs`
--

INSERT INTO `scholarshipapplications_docs` (`socdocsID`, `applicationsID`, `document_name`, `document_file`) VALUES
(3, 3, 'ArduinoCode (1) (1).docx', 'ArduinoCode (1) (1).docx'),
(4, 4, 'COR-202420252.pdf', 'COR-202420252.pdf');

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
  `denial_feedback` text DEFAULT NULL,
  `claimed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarship_applications`
--

INSERT INTO `scholarship_applications` (`applicationsID`, `userID`, `dailyscholarshipID`, `date_apply`, `application_status`, `scholarship_refences`, `denial_feedback`, `claimed`) VALUES
(2, 34, 64, '2025-03-15 17:35:19', 1, 'SCHOLAR1964REF5011', NULL, 0),
(3, 34, 2, '2025-03-15 17:35:25', 0, 'SCHOLAR7761REF2194', NULL, 0),
(4, 41, 67, '2025-03-19 00:47:46', 1, 'SCHOLAR3744REF8932', NULL, 0),
(5, 41, 37, '2025-04-20 15:23:53', 1, 'SCHOLAR7430REF4159', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_claims`
--

CREATE TABLE `scholarship_claims` (
  `claim_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `claim_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `claimed_amount` decimal(10,2) NOT NULL,
  `claim_status` enum('claimed','pending') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 1, 'Application Form', 'ArduinoCode.docx'),
(3, 3, 'Application Form', 'anintroductiontoreactjs-240311040708-7e3369b0.pdf'),
(4, 4, 'Application Form', '6da1bc26-75f0-49fa-baa8-26dee654e4a4.jpeg'),
(5, 5, 'Application Form', '2025-661109.png');

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
(1, 3, '2025-05-16 03:35:00', 'Southcom ', 5000.00, 'Tatay', 'pending', '2025-03-18 19:35:57');

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
(34, '2021-78945', '0c8740e2-bd4a-400c-b9fe-ea3e0624ce4d.jpg', NULL, 'Niiga', 'Higga', '', '', 'kmking023@gmail.com', '$2y$10$etV/J5qaQ5diEvoBgkYnZeSZOSgQX9bC6Y9ZgdYwVRnIW6JeDkIpG', 539329, 'verified', 3, 1, '2025-01-03 15:15:44'),
(40, '123321', 'logo.png', NULL, 'asdasd', 'asdasd', '', '', 'kmforce018@gmail.com', '$2y$10$G7XtLjZHaSIlxWg4PUp.OOF7B//5raTdTCBvJIjVb6kMn/VnxCXJq', 0, 'verified', 1, 0, '2025-03-18 19:04:47'),
(41, '2021-00657', 'logo.png', 'COR-202420252.pdf', 'Ahmidserhan', 'Halon', '', '', 'halonahmidserhan5@gmail.com', '$2y$10$N7oRflTPo5WdOyFUeocMUu65xSjaVtHDSHTobCXTbKIdzbHhrjX8O', 0, 'verified', 3, 1, '2025-03-18 21:16:33');

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
-- Indexes for table `notification_logs`
--
ALTER TABLE `notification_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `scholarship_id` (`scholarship_id`);

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
-- Indexes for table `scholarship_claims`
--
ALTER TABLE `scholarship_claims`
  ADD PRIMARY KEY (`claim_id`),
  ADD KEY `application_id` (`application_id`);

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
  MODIFY `dailyscholarshipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `notification_logs`
--
ALTER TABLE `notification_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `pubID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scholarship`
--
ALTER TABLE `scholarship`
  MODIFY `scholarshipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `scholarshipapplications_docs`
--
ALTER TABLE `scholarshipapplications_docs`
  MODIFY `socdocsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scholarship_applications`
--
ALTER TABLE `scholarship_applications`
  MODIFY `applicationsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `scholarship_claims`
--
ALTER TABLE `scholarship_claims`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholarship_docs`
--
ALTER TABLE `scholarship_docs`
  MODIFY `docsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_scholarship`
--
ALTER TABLE `daily_scholarship`
  ADD CONSTRAINT `fkfkscholarship` FOREIGN KEY (`scholarshipID`) REFERENCES `scholarship` (`scholarshipID`) ON DELETE CASCADE;

--
-- Constraints for table `notification_logs`
--
ALTER TABLE `notification_logs`
  ADD CONSTRAINT `notification_logs_ibfk_1` FOREIGN KEY (`scholarship_id`) REFERENCES `scholarship` (`scholarshipID`) ON DELETE CASCADE;

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
-- Constraints for table `scholarship_claims`
--
ALTER TABLE `scholarship_claims`
  ADD CONSTRAINT `fk_claims_applications` FOREIGN KEY (`application_id`) REFERENCES `scholarship_applications` (`applicationsID`) ON DELETE CASCADE;

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
