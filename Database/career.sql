-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 03:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `career`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `fullname`, `email`, `password`) VALUES
(4, 'benson', 'bensonwambuadavid@gmail.com', '$2y$10$q1nkvSKw5U90vW18mX/G2ebWxfbIXrndJEPBRxJylrxMaG.euUPfO'),
(5, 'Benson David', 'benson@gmail.com', '$2y$10$rPeqB8b/e0hmXaqHWgtAJuR4pyM4QbWvQdJXQ4EzdbH522j9ULBmG'),
(6, 'Daniel Mwenda', 'mwenda@gmail.com', '$2y$10$ttlqD14LGjEivdRqFIJ37uqiJTXbqoNV89fO4A7V84ENGpGnuS4Su');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `applied_position` varchar(255) NOT NULL,
  `date_applied` date NOT NULL,
  `certificates` text DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `first_name`, `last_name`, `email`, `phone`, `applied_position`, `date_applied`, `certificates`, `resume`) VALUES
(1, 'Benson', 'David', 'bensonwambuadavid@gmail.com', '0712456290', 'graphic designer', '2024-03-21', 'uploads/certificates/PROPOSAL PRESENTATION.pptx', 'uploads/resumes/CASSANDRA.pptx'),
(2, 'Benson', 'David', 'bensonwambuadavid@gmail.com', '0712456290', 'graphic designer', '2024-03-21', '', ''),
(3, 'Benson', 'David', 'bensonwambuadavid@gmail.com', '0712456290', 'graphic designer', '2024-03-21', '', ''),
(4, 'ben', 'wambua', 'ben@gmail.com', '0712456290', 'network administrator', '2024-03-21', '', ''),
(5, 'slyvester ', 'muasya', 'muasya@gmail.com', '0712345678', 'graphic desiger', '2024-03-23', '', ''),
(6, 'slyvester ', 'muasya', 'muasya@gmail.com', '0712345678', 'graphic desiger', '2024-03-23', '', ''),
(7, 'slyvester ', 'muasya', 'muasya@gmail.com', '0712345678', 'graphic desiger', '2024-03-23', '', ''),
(8, 'Daniel', 'Mwenda', 'danielmwenda@gmail.com', '0712456290', 'Motion Graphics', '2024-04-04', '', ''),
(9, 'Daniel', 'Mwenda', 'danielmwenda@gmail.com', '0712456290', 'Motion Graphics', '2024-04-04', '', ''),
(10, 'Caroline ', 'Mwende', 'caroline@gmail.com', '0712345678', 'Motion Graphics', '2024-04-04', '', ''),
(11, 'Caroline ', 'Mwende', 'caroline@gmail.com', '0712345678', 'Motion Graphics', '2024-04-04', '', ''),
(12, 'Caroline ', 'Mwende', 'caroline@gmail.com', '0712345678', 'Motion Graphics', '2024-04-04', '', ''),
(13, 'Esther', 'Mutua', 'esther@gmail.com', '0789563421', 'graphic designer', '2024-04-04', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` varchar(100) NOT NULL,
  `application_deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `title`, `organization`, `description`, `duration`, `application_deadline`) VALUES
(1, 'internship available', 'Mabati Rolling MIlls', 'provide your resumes for the attachments', '3 months ', '2024-04-04'),
(2, 'Attachment', 'Imarika, mariakani', 'students from following fields: IT,Accounts, Computer sicience', '3 months ', '2024-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `attachment_applications`
--

CREATE TABLE `attachment_applications` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `county` varchar(100) NOT NULL,
  `education_qualifications` text NOT NULL,
  `application_letter` varchar(255) NOT NULL,
  `introduction_letter` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `insurance_cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `id` int(11) NOT NULL,
  `candidate_name` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`id`, `candidate_name`, `feedback`, `created_at`) VALUES
(1, 'benson wambua ', 'you application has been approved ,, get ready for interview on 15/03/2024', '2024-03-17 17:10:45'),
(2, 'benson wambua', 'approved, prepare for interview on monday', '2024-03-19 15:13:50'),
(3, 'joab', 'get ready for interview on monday\r\n', '2024-03-19 17:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `application_deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `requirements`, `application_deadline`) VALUES
(2, 'network admistrator ', 'good in cisco,CNN, COMPUTERNETWORKS', 'BEGREE IN INFORMATION TECHNOLOGY OR RELATED FIELD', '2024-03-28'),
(6, 'network admin', 'good in cisco', 'degree/diploma in networking', '2024-04-06'),
(7, 'Software Engineering', 'Computer literate', 'masters and any other relevant certificate ', '2024-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(15) DEFAULT NULL,
  `id_no` varchar(20) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `county` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `registration_date`, `phone`, `id_no`, `gender`, `dob`, `county`, `nationality`) VALUES
(2, 'wambua', 'wambua@gmail.com', '$2y$10$ZfSDdP4HUCXKksE4En/Pqeng3psswgA.V8Dv4nI2x/jPDx8t50ZMW', '2024-02-24 13:18:49', '0712345678', '12345678', 'male', '2017-01-24', 'Nakuru', 'Kenyan'),
(3, 'slyvester', 'sly@gmail.com', '$2y$10$tFxnT9BE7SqK0VDI1Kd/bevBowLuYr2Ej7bxNRRNEPEHxmpxdAaGu', '2024-02-24 21:54:55', '0798765432', '56789043', 'male', '2024-03-12', 'Machakos', 'Kenyan'),
(4, 'Faith Cleps', 'faith@gmail.com', '$2y$10$obAWOaNizxQD2cjwGC4D9OSE69UQ8izIJAm/q4jiVzjp71smX5zLe', '2024-02-25 22:34:45', '0712345678', '43245345', 'female', '2024-03-25', 'Nairobi', 'Kenyan'),
(5, 'teddy', 'teddymkiai@gmail.com', '$2y$10$Lj4FN6dLllUd.9KIHSA.b.lSeudQCJDpnAzMieGZ1aF4ZkFa4mX3K', '2024-03-11 09:37:57', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Benson Wambua ', 'benson@gmail.com', '$2y$10$FG0DSEctp6b3ZS43vdgcI.3Rv62GmY70KalZGBmYNHL5k7cAPQXTK', '2024-03-21 14:10:09', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'wambua', 'w@gmail.com', '$2y$10$.jnIvc65Cl5hGzPWtKorieNaOkG35UaaftbAD9.RDZpmTHAVKFhvq', '2024-03-21 14:11:38', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'slyvester muasya', 'muasya@gmail.com', '$2y$10$YXjNfvu.liodOA2o.K.BDeJLcGOLh2287Km2erOLqNBT6r7143fXu', '2024-03-22 21:49:21', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Daniel Mwenda', 'danielmwenda@gmail.com', '$2y$10$kTSyJVhz3viL7lXpuTBbauc3R0Er8zho2WhlaCw.hN7QBBmqFCYYe', '2024-03-24 18:36:32', '0712456290', NULL, 'male', '2004-02-24', 'Meru', 'Kenyan'),
(12, 'Albanus Kioko', 'kioko@gmail.com', '$2y$10$2sHjr8BlorQsN96/qZ9Y7u0WDx7wOb5A0mbsmnH4.bVc1r2ayfk76', '2024-03-24 18:40:26', '0112345678', '1234567', 'male', '2024-03-06', 'Meru', 'Kenyan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachment_applications`
--
ALTER TABLE `attachment_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attachment_applications`
--
ALTER TABLE `attachment_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
