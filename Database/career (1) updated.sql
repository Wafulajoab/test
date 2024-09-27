-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 07:46 PM
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
(6, 'Daniel Mwenda', 'mwenda@gmail.com', '$2y$10$ttlqD14LGjEivdRqFIJ37uqiJTXbqoNV89fO4A7V84ENGpGnuS4Su'),
(7, 'joabjob', 'a@gmail.com', '$2y$10$cxuTYJhLi4YM.0polD4n../eSezgs3zxjdHxetN45OptqOqr3o13u'),
(10, 'benson', 'ben@12gmail.com', '$2y$10$f81n/e8gOtl4vEvQLTnL8.mTOUBcy/0368E6UVx9Kwys36lS2yzZi'),
(11, 'slyvester', 'slyvester@gmail.com', '$2y$10$LARCJAhQSCzEiaN7rprWkOkfpPAKnHjtfD8EQ/WVixcHdP1y3jqWy');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `announcement_content` text NOT NULL,
  `announcement_date` datetime DEFAULT current_timestamp(),
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announcement_content`, `announcement_date`, `file`) VALUES
(1, 'hello', '2024-04-22 17:40:37', '');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_replies`
--

CREATE TABLE `announcement_replies` (
  `id` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `reply_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement_replies`
--

INSERT INTO `announcement_replies` (`id`, `announcement_id`, `reply_content`, `created_at`) VALUES
(1, 1, 'yes', '2024-04-17 23:56:01'),
(2, 1, 'thanks', '2024-04-18 00:26:33'),
(3, 1, 'thanks', '2024-04-18 09:01:07'),
(4, 1, 'very soon will be updated', '2024-04-18 09:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `applied_position` varchar(255) NOT NULL,
  `date_applied` date NOT NULL,
  `certificates` text DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_name`, `email`, `phone`, `applied_position`, `date_applied`, `certificates`, `resume`, `status`) VALUES
(1, 'Benson', 'bensonwambuadavid@gmail.com', '0712456290', 'graphic designer', '2024-03-21', 'uploads/certificates/PROPOSAL PRESENTATION.pptx', 'uploads/resumes/CASSANDRA.pptx', 'approved'),
(2, 'Benson', 'bensonwambuadavid@gmail.com', '0712456290', 'graphic designer', '2024-03-21', '', '', 'Approved'),
(3, 'Benson', 'bensonwambuadavid@gmail.com', '0712456290', 'graphic designer', '2024-03-21', '', '', 'rejected'),
(4, 'ben', 'ben@gmail.com', '0712456290', 'network administrator', '2024-03-21', '', '', 'approved'),
(5, 'slyvester ', 'muasya@gmail.com', '0712345678', 'graphic desiger', '2024-03-23', '', '', 'rejected'),
(6, 'slyvester ', 'muasya@gmail.com', '0712345678', 'graphic desiger', '2024-03-23', '', '', 'approved'),
(7, 'slyvester ', 'muasya@gmail.com', '0712345678', 'graphic desiger', '2024-03-23', '', '', 'rejected'),
(8, 'Daniel', 'danielmwenda@gmail.com', '0712456290', 'Motion Graphics', '2024-04-04', '', '', 'approved'),
(9, 'Daniel', 'danielmwenda@gmail.com', '0712456290', 'Motion Graphics', '2024-04-04', '', '', 'approved'),
(10, 'Caroline ', 'caroline@gmail.com', '0712345678', 'Motion Graphics', '2024-04-04', '', '', 'approved'),
(11, 'Caroline ', 'caroline@gmail.com', '0712345678', 'Motion Graphics', '2024-04-04', '', '', 'rejected'),
(12, 'Caroline ', 'caroline@gmail.com', '0712345678', 'Motion Graphics', '2024-04-04', '', '', 'approved'),
(13, 'Esther', 'esther@gmail.com', '0789563421', 'graphic designer', '2024-04-04', '', '', 'approved'),
(14, 'Esther', 'esther@gmail.com', '0712456290', 'Motion Graphics', '2024-04-02', NULL, 'uploads/CHAPTER TWO.docx', 'approved'),
(15, 'Abel', 'abel@gmail.com', '0712456290', 'network administrator', '2024-04-03', NULL, 'uploads/CHAPTER TWO.docx', 'approved'),
(16, 'Lisper', 'lisper@gmail.com', '0712456290', 'Motion Graphics', '2024-04-03', NULL, 'uploads/Apology letter.docx', 'rejected'),
(17, 'Daniel Mwenda', 'danielmwenda@gmail.com', '0712345678', 'Motion Graphics', '2024-04-03', NULL, 'uploads/my proposal.docx', 'approved'),
(18, 'Albanus Kioko', 'kioko@gmail.com', '0712456290', 'Motion Graphics', '2024-04-03', NULL, 'uploads/BENPROJECT.docx', 'approved'),
(19, 'slyvester mwendwa muasya', 'slyvestermuasya71@gmail.com', '0712456290', 'graphic designer', '2024-04-23', NULL, 'uploads/my restaurantpdf.pdf', 'approved'),
(20, 'benson david', 'wbenson681@gmail.com', '0712456290', 'web designer', '2024-04-23', NULL, 'uploads/menu restrot.pdf', 'approved'),
(21, 'benson david', 'wbenson681@gmail.com', '0712456290', 'IT CONSULTANT', '2024-04-23', NULL, 'uploads/Untitled-3.pdf', 'approved'),
(22, 'slyvester mwendwa muasya', 'slyvestermuasya71@gmail.com', '0712345678', 'IT CONSULTANT', '2024-04-23', NULL, 'uploads/my restaurantpdf.pdf', 'approved'),
(23, 'benson david', 'wbenson681@gmail.com', '0712456290', 'IT CONSULTANT', '2024-04-23', NULL, 'uploads/menu restrot.pdf', 'approved');

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
  `application_deadline` date NOT NULL,
  `attachment_limit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `title`, `organization`, `description`, `duration`, `application_deadline`, `attachment_limit`) VALUES
(1, 'internship available', 'Mabati Rolling MIlls', 'provide your resumes for the attachments', '3 months ', '0000-00-00', 10),
(2, 'Attachment', 'Imarika, mariakani', 'students from following fields: IT,Accounts, Computer sicience', '3 months ', '2024-04-04', NULL),
(3, 'Internship', 'Imarika, mariakani', 'students from IT Field,Data SCience, computer science', '3 months ', '2024-05-08', NULL);

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
  `insurance_cover` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attachment_applications`
--

INSERT INTO `attachment_applications` (`id`, `full_name`, `date_of_birth`, `id_number`, `gender`, `email`, `mobile_number`, `county`, `education_qualifications`, `application_letter`, `introduction_letter`, `resume`, `insurance_cover`, `status`) VALUES
(1, 'James David', '2024-04-03', '40123456', 'Male', 'james@gmail.com', '0712456290', 'Meru', 'Degree in Information Technology', 'uploads/Apology letter.docx', 'uploads/Apology letter.docx', 'uploads/Apology letter.docx', 'uploads/Apology letter.docx', 'rejected'),
(2, 'Judith Savali', '2000-05-25', '40123456', 'Female', 'judith@gmail.com', '0712456290', 'Meru', 'Degree in Education maths/chem', 'uploads/CHAPTER TWO.docx', 'uploads/Apology letter.docx', 'uploads/BENPROJECT.docx', 'uploads/Apology letter.docx', 'approved'),
(3, 'Judith Savali', '2000-05-25', '40123456', 'Female', 'judith@gmail.com', '0712456290', 'Meru', 'Degree in Education maths/chem', 'uploads/CHAPTER TWO.docx', 'uploads/Apology letter.docx', 'uploads/BENPROJECT.docx', 'uploads/Apology letter.docx', 'approved'),
(4, 'David Wambua', '2018-02-07', '40123456', 'Male', 'david@gmail.com', '0712456290', 'Meru', 'Degree in Data Science', 'uploads/CHAPTER TWO.docx', 'uploads/Apology letter.docx', 'uploads/Apology letter.docx', 'uploads/Apology letter.docx', 'rejected'),
(5, 'David Wambua', '2019-02-06', '40123456', 'Male', 'david@gmail.com', '0712456290', 'Meru', 'Degree in Data Science', 'uploads/CHAPTER TWO.docx', 'uploads/Apology letter.docx', 'uploads/BENPROJECT.docx', 'uploads/my proposal.docx', 'pending'),
(6, 'Albanus Kioko', '2005-06-08', '40123456', 'Male', 'kioko@gmail.com', '0712456290', 'Meru', 'Degree in Computer Science', 'uploads/Apology letter.docx', 'uploads/BENPROJECT.docx', 'uploads/my proposal.docx', 'uploads/BENSON WAMBUA DAVID.docx', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `sender_id`, `receiver_id`, `message`, `timestamp`) VALUES
(1, 1, 2, 'hello', '2024-04-18 10:08:09'),
(2, 1, 2, 'hello', '2024-04-18 10:08:10'),
(3, 1, 2, 'hello', '2024-04-18 10:08:11'),
(4, 1, 2, 'hello', '2024-04-18 10:08:11'),
(5, 1, 2, 'hello', '2024-04-18 10:08:11'),
(6, 1, 2, 'hello', '2024-04-18 10:08:11'),
(7, 1, 2, 'hello', '2024-04-18 10:08:12'),
(8, 1, 2, 'hello', '2024-04-18 10:08:12'),
(9, 1, 2, 'hello', '2024-04-18 10:08:12'),
(10, 1, 2, 'hello', '2024-04-18 10:08:13'),
(11, 1, 2, 'hello', '2024-04-18 10:08:13'),
(12, 1, 2, 'hello', '2024-04-18 10:08:13'),
(13, 1, 2, 'hello', '2024-04-18 10:08:14'),
(14, 1, 2, 'hello', '2024-04-18 10:08:14'),
(15, 1, 2, 'hello', '2024-04-18 10:08:15'),
(16, 1, 2, 'hello', '2024-04-18 10:08:16'),
(17, 1, 2, 'hello', '2024-04-18 10:08:19'),
(18, 1, 2, 'hello', '2024-04-18 10:08:20'),
(19, 1, 2, 'hello', '2024-04-18 10:08:20'),
(20, 1, 2, 'hello', '2024-04-18 10:08:21'),
(21, 1, 2, 'hello', '2024-04-18 10:08:21'),
(22, 1, 2, 'hello', '2024-04-18 10:08:21'),
(23, 1, 2, 'hello', '2024-04-19 22:08:21'),
(24, 1, 2, 'hello', '2024-04-19 22:08:21'),
(25, 1, 2, 'hello', '2024-04-19 22:08:22'),
(26, 1, 2, 'hello', '2024-04-19 22:08:22'),
(27, 2, 1, 'yes', '2024-04-19 22:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `submission_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `message`, `reply`, `submission_time`) VALUES
(1, 'benson david', 'tomnoezra@gmail.com', 'hello', '1234rtyuiopkjhgfdsdfghj,m', '2024-04-21 10:07:29'),
(2, 'benson david', 'bensonwambuadavid@gmail.com', 'hello', '678', '2024-04-21 10:08:42'),
(3, 'BEN', 'wbenson681@gmail.com', 'hello', 'hello,, you good?', '2024-04-21 11:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `submitted_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`, `submitted_at`) VALUES
(1, 'benson david', 'bensonwambuadavid@gmail.com', 'hello the system well designed', '2024-04-07 16:18:05'),
(2, 'benson david', 'bensonwambuadavid@gmail.com', 'hello very nice', '2024-04-21 03:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `interview_date` date NOT NULL,
  `interview_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`id`, `job_title`, `interview_date`, `interview_time`) VALUES
(1, 'web designer', '2024-05-07', '08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `application_deadline` date DEFAULT NULL,
  `job_limit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `requirements`, `application_deadline`, `job_limit`) VALUES
(2, 'network admistrator ', 'good in cisco,CNN, COMPUTERNETWORKS', 'BEGREE IN INFORMATION TECHNOLOGY OR RELATED FIELD', '2024-03-28', NULL),
(6, 'network admin', 'good in cisco', 'degree/diploma in networking', '2024-04-06', NULL),
(7, 'Software Engineering', 'Computer literate', 'masters and any other relevant certificate ', '2024-03-31', NULL),
(8, 'network administrator', 'individual with skills in networking', 'degree in networking or other related field', '2024-04-23', NULL),
(9, 'Web designer', 'person with skills in developing website', 'degree/diploma', '2024-05-28', NULL),
(10, 'graphic design', 'skills in adobe photoshop,adobe illustration,after effect', 'diploma/degree/', '2024-04-30', NULL),
(11, 'graphic design', 'skills in adobe photoshop,adobe illustration,after effect', 'diploma/degree/', '2024-04-30', NULL),
(12, 'Web designer', 'person with skills in developing website', 'degree/diploma', '2024-05-28', NULL),
(13, 'IT CONSULTANT', 'IT skills', 'DEGREE', '2024-04-30', 10);

-- --------------------------------------------------------

--
-- Table structure for table `normal_announcements`
--

CREATE TABLE `normal_announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `normal_announcements`
--

INSERT INTO `normal_announcements` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'New jobs', 'any vacancies available now?', '2024-04-17 23:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(20) NOT NULL,
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

INSERT INTO `users` (`User_id`, `fullname`, `email`, `password`, `registration_date`, `phone`, `id_no`, `gender`, `dob`, `county`, `nationality`) VALUES
(1, 'Joab job', 'wambua@gmail.com', '$2y$10$ZfSDdP4HUCXKksE4En/Pqeng3psswgA.V8Dv4nI2x/jPDx8t50ZMW', '2024-02-24 13:18:49', '0712345678', '12345', 'male', '2000-07-12', 'Nyeri', 'kenya'),
(2, 'Joab job', 'sly@gmail.com', '$2y$10$tFxnT9BE7SqK0VDI1Kd/bevBowLuYr2Ej7bxNRRNEPEHxmpxdAaGu', '2024-02-24 21:54:55', '0798765432', '12345', 'male', '2000-07-12', 'Nyeri', 'kenya'),
(3, 'Joab job', 'faith@gmail.com', '$2y$10$obAWOaNizxQD2cjwGC4D9OSE69UQ8izIJAm/q4jiVzjp71smX5zLe', '2024-02-25 22:34:45', '0712345678', '12345', 'male', '2000-07-12', 'Nyeri', 'kenya'),
(4, 'Joab job', 'teddymkiai@gmail.com', '$2y$10$Lj4FN6dLllUd.9KIHSA.b.lSeudQCJDpnAzMieGZ1aF4ZkFa4mX3K', '2024-03-11 09:37:57', NULL, '12345', 'male', '2000-07-12', 'Nyeri', 'kenya'),
(5, 'Joab job', 'benson@gmail.com', '$2y$10$FG0DSEctp6b3ZS43vdgcI.3Rv62GmY70KalZGBmYNHL5k7cAPQXTK', '2024-03-21 14:10:09', NULL, '12345', 'male', '2000-07-12', 'Nyeri', 'kenya'),
(6, 'Joab job', 'w@gmail.com', '$2y$10$.jnIvc65Cl5hGzPWtKorieNaOkG35UaaftbAD9.RDZpmTHAVKFhvq', '2024-03-21 14:11:38', NULL, '12345', 'male', '2000-07-12', 'Nyeri', 'kenya'),
(8, 'Joab job', 'danielmwenda@gmail.com', '$2y$10$kTSyJVhz3viL7lXpuTBbauc3R0Er8zho2WhlaCw.hN7QBBmqFCYYe', '2024-03-24 18:36:32', '0712456290', '12345', 'male', '2000-07-12', 'Nyeri', 'kenya'),
(9, 'Joab job', 'kioko@gmail.com', '$2y$10$2sHjr8BlorQsN96/qZ9Y7u0WDx7wOb5A0mbsmnH4.bVc1r2ayfk76', '2024-03-24 18:40:26', '0112345678', '12345', 'male', '2000-07-12', 'Nyeri', 'kenya'),
(10, 'Joab job', 'munene@gmail.com', '$2y$10$DmxrXF162UtzwMOeYpIHpei.pqnzCZtmc6AGs.6Qsvi4YxU2GgzR2', '2024-04-04 03:01:36', '0712456290', '12345', 'male', '2000-07-12', 'Nyeri', 'kenya'),
(11, 'Joab job', 'w@gmail.com', '$2y$10$0Wl5eRv5MLCdCX8emJx6Eu5F7LCFW/Wm.NynjuQin1cOoY3mWCr2e', '2024-04-16 16:54:00', '0712456290', '12345', 'male', '2000-07-12', 'Nyeri', 'kenya'),
(12, 'slyvester mwendwa muasya', 'slyvestermuasya71@gmail.com', '$2y$10$ChB4YCmBq5bqlECbXuCYRuxdPW7ccEWG.0RkA/0vW6PuvUV3iUr6S', '2024-04-21 01:47:50', '0712456290', '38923456', 'male', '2001-02-07', 'Kitui', 'Kenyan'),
(13, 'Faith Mutua', 'faith@gmail.com', '$2y$10$O1ibGAFqkq5Gi.CogGi8yeMXmj/xwYwDsIGJWIV0tJFB9.D0h/4GG', '2024-04-22 10:54:30', '0712456290', '406745', 'female', '2005-05-04', 'mombasa', 'KENYAN'),
(14, 'benson david', 'wbenson681@gmail.com', '$2y$10$n.RURgX53ftVoyuBTkDLfe0Tp3eWJUWhS2HQf/xCZW46bXvGha5NG', '2024-04-22 21:53:20', '0712456290', '406745', 'male', '2008-01-23', 'Meru', 'KENYAN'),
(15, 'david benson', 'wbenson681@gmail.com', '$2y$10$P5Xq.fTk/c40QbekFvzGBupPEzUFzW.A6l7yOqvsp.Dw/ssoqu6EO', '2024-04-23 13:50:21', '0712456290', '406745', 'male', '2000-05-09', 'Meru', 'KENYAN');

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
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement_replies`
--
ALTER TABLE `announcement_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcement_id` (`announcement_id`);

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
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
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
-- Indexes for table `normal_announcements`
--
ALTER TABLE `normal_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement_replies`
--
ALTER TABLE `announcement_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attachment_applications`
--
ALTER TABLE `attachment_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `normal_announcements`
--
ALTER TABLE `normal_announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement_replies`
--
ALTER TABLE `announcement_replies`
  ADD CONSTRAINT `announcement_replies_ibfk_1` FOREIGN KEY (`announcement_id`) REFERENCES `normal_announcements` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
